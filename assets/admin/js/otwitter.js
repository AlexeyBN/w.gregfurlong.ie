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
                            twitter_chart([
                                data.favorites_chart,
                                data.retweets_chart,
                            ], data.chart_categories);
                        }
                    }
                })
            }
        );
    },
};

/**
 * Main process
 */
$(document).ready(function(){
    OTwitter.chart();
    OTwitter.daterange();
})