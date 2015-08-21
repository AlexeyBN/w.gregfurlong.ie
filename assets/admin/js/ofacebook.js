OFacebook  = {
    /**
     * Twitter chart
     * @param columns
     * @param categories
     */
    chart: function (columns, categories) {
        var $el = $('#facebook_chart'),
            columns = columns || $el.data('columns'),
            categories = categories || $el.data('categories');

        if (!$el.length) return;

        var twitter_chart = c3.generate({bindto: '#facebook_chart',
            data: {
                columns: columns,
                colors: {
                    Posts: '#59c2e6',
                    Likes: '#4bcf99',
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
    update_graph: function(startDate, endDate) {
        var overlay = false;
        $('#facebook_chart').append(overlay = $('<div class="background-overlay"></div>'))
        $('.facebook_datepicker').attr({disabled: true});
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                startDate: startDate,
                endDate: endDate
            },
            success: function(data){
                overlay.remove();
                $('.facebook_datepicker').attr({disabled: false});
                if (data.status) {
                    $('.facebook-chart-info').html(data.html)
                    OFacebook.chart([
                        data.post_chart,
                        data.likes_chart,
                    ], data.chart_categories);
                }
            }
        })
    },
    /**
     * Datepicker
     */
    daterange: function (type) {
        $('.facebook_datepicker').daterangepicker(
            {
                locale: {
                    format: "DD/MM/YY"
                },
                parentEl: '.facebook_datepicker_dropdown',
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

                OFacebook.update_graph(startDate, endDate);

            }
        );
        $('.facebook_datepicker').on('showCalendar.daterangepicker', function(ev, picker) {
            if (!$('.facebook_datepicker_dropdown .dropdown-menu .facebook_datepicker_type').length) {
                var single = $('.facebook_datepicker').data('daterangepicker').singleDatePicker;

                $('.facebook_datepicker_dropdown .calendar.left').before('<select class="form-control facebook_datepicker_type">\
                                                                                <option '+(single? '': 'selected')+' value="range">Range</option>\
                                                                                <option '+(single? 'selected': '')+' value="single">Single</option>\
                                                                          </select>');
            }

        });

    },
};
$(document).ready(function(){
    OFacebook.chart();
    OFacebook.daterange();
})