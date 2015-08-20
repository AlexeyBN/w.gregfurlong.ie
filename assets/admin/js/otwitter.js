OTwitter = {
    /**
     * Twitter chart
     * @param columns
     * @param categories
     */
    chart: function (columns, categories) {
        var $el = $('#twitter_chart'),
            columns = columns || $el.data('columns'),
            categories = categories || $el.data('categories');

        if (!$el.length) return;

        var twitter_chart = c3.generate({bindto: '#twitter_chart',
            data: {
                columns: columns,
                colors: {
                    Favorites: '#59c2e6',
                    Retweets: '#ac8fef',
                },
            },
            axis : {
                x : {
                    type : 'category',
                    categories: categories
                },
                y : {}
            }
        });
    },
    show_alert: function (message, type) {
        type = type || 'danger';
        var $alert = $('<div class="alert alert-'+type+' alert-dismissible alert-fixed" role="alert">\
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>\
                            '+message+'\
                        </div>');
        $('.alerts-container').append($alert);

        var timer = setTimeout(function(){
            $alert.remove();
            clearTimeout(timer);
        }, 4000)

    },

    close_alert: function (e) {
        $(this).closest('alert').remove();
    },

    update_graph: function(startDate, endDate) {
        var overlay = false;
        $('#twitter_chart').append(overlay = $('<div class="background-overlay"></div>'))
        $('.twitter_datepicker').attr({disabled: true});
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(data){
                overlay.remove();
                $('.twitter_datepicker').attr({disabled: false});
                if (data.status) {
                    $('.twitter-chart-info').html(data.html)
                    OTwitter.chart([
                        data.favorites_chart,
                        data.retweets_chart,
                    ], data.chart_categories);
                }
            }
        })
    },

    /**
     * Datepicker
     */
    daterange: function (type) {
        $('.twitter_datepicker').daterangepicker(
            {
                locale: {
                    format: "DD/MM/YY"
                },
                parentEl: '.twitter_datepicker_dropdown',
                opens: 'left',
                singleDatePicker: type == 'single',
                startDate: moment().subtract(7, 'days'),
                endDate: type == 'single'? null: moment(),
                autoApply: true,
            },
            function(start, end, label){
                var offset = moment(start).utcOffset();

                var m_start   = moment(start).add(offset, 'minutes'),
                    m_end     = moment(end).add(offset, 'minutes');

                var startDate = moment(m_start.valueOf()).unix(),
                    endDate = moment(m_end.valueOf()).unix();

                OTwitter.update_graph(startDate, endDate);

            }
        );
        $('.twitter_datepicker').on('showCalendar.daterangepicker', function(ev, picker) {
            if (!$('.twitter_datepicker_dropdown .dropdown-menu .twitter_datepicker_type').length) {
                var single = $('.twitter_datepicker').data('daterangepicker').singleDatePicker;

                $('.twitter_datepicker_dropdown .calendar.left').before('<select class="form-control twitter_datepicker_type">\
                                                                        <option '+(single? '': 'selected')+' value="range">Range</option>\
                                                                        <option '+(single? 'selected': '')+' value="single">Single</option>\
                                                                  </select>');
            }

        });

    },
    single_datepicker: function() {
         $('.single-datepiker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                timePicker: true,
                minDate: new Date(),
                locale: {
                    format: "hh:mm a on DD/MM/YY"
                },
            },
            function(start, end, label) {}
        );
    },
    new_tweet: function(e) {
        e.preventDefault();
        var $form       = $(this),
            offset      = moment($('.single-datepiker').data('daterangepicker').startDate).utcOffset(),
            startDate   = moment($('.single-datepiker').data('daterangepicker').startDate).format('MMMM Do YYYY, h:mm:ss a');

        $.ajax({
            type: "POST",
            url: '/Twitter/add_tweet',
            dataType: "json",
            data: {
                date: startDate,
                text: $form.find('#tweet_text').val(),
                offset: offset,
            },
            success: function(data){
                if (data.status && !data.errors) {
                    OTwitter.show_alert('New tweet has added.', 'success');
                    $form.find('#tweet_text').val('');
                    $('.tweets-table').html(data.html);
                } else {
                    $.each (data.errors, function(index, item){
                        OTwitter.show_alert(item, 'danger')
                    })
                }
            }
        })
        return false;
    },
    remove_tweet: function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            type: "POST",
            url: '/Twitter/remove_tweet',
            dataType: "json",
            data: {
                id: $this.data('id'),
            },
            success: function(data){
                if (data.status) {
                    $('.tweets-table').html(data.html)
                }
            }
        })
    },
    tweet_count_left: function(e) {
        var max_length = parseInt($(this).attr('maxlength')),
            str_length = $(this).val().length;
        $('.tweet-text-count-left').html(max_length - str_length);
    },
};

/**
 * Main process
 */
$(document).ready(function(){
    OTwitter.chart();
    OTwitter.daterange();
    OTwitter.single_datepicker();
    $(document).on('keydown', '#tweet_text', OTwitter.tweet_count_left);
    $(document).on('submit', '#new-tweet', OTwitter.new_tweet);
    $(document).on('click', '.remove-tweet', OTwitter.remove_tweet);
    $(document).on('click', '.alert .close', OTwitter.close_alert);
    $(document).on('change', '.twitter_datepicker_type', function(){
        var type = $(this).val();
        OTwitter.daterange(type)
        $('.twitter_datepicker').data('daterangepicker').setStartDate(false);
        $('.twitter_datepicker').data('daterangepicker').setEndDate(false);
        $('.twitter_datepicker').data('daterangepicker').show();
    });
})