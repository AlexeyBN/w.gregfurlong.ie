OTwitter = {
    create_date: false,
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

    /**
     * Datepicker
     */
    daterange: function () {
        $('.twitter_datepicker').daterangepicker(
            {
                locale: {
                    format: "YYYY/DD/MM"
                },
            },
            function(start, end, label){
                var offset = moment(start).utcOffset();

                var m_start   = moment(start).add(offset, 'minutes'),
                    m_end     = moment(end).add(offset, 'minutes');

                var startDate = moment(m_start.valueOf()).unix(),
                    endDate = moment(m_end.valueOf()).unix(),
                    overlay = false;

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
            }
        );
    },
    single_datepicker: function() {
         $('.single-datepiker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                timePicker: true,
            },
            function(start, end, label) {}
        );
        OTwitter.create_date = $('.single-datepiker').data('daterangepicker');
    },
    new_tweet: function(e) {
        e.preventDefault();
        var $form       = $(this),
            offset      = moment(OTwitter.create_date.startDate).utcOffset(),
            startDate   = moment(OTwitter.create_date.startDate).format('MMMM Do YYYY, h:mm:ss a');

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
                if (data.status) {
                    $form.find('#tweet_text').val('');
                    $('.tweets-table').html(data.html)
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
    }
};

/**
 * Main process
 */
$(document).ready(function(){
    OTwitter.chart();
    OTwitter.daterange();
    OTwitter.single_datepicker();
    $(document).on('submit', '#new-tweet', OTwitter.new_tweet)
    $(document).on('click', '.remove-tweet', OTwitter.remove_tweet)
})