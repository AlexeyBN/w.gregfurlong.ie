/**
 * Twitter chart
 */
function twitter_chart($config) {
    $config.selector = $config.selector || '#twitter_chart';

    var twitter_chart = c3.generate({bindto: $config.selector,
        data: {
            columns: $config.columns || [],
            colors: $config.colors || {},
        },
        axis : {
            x : {
                type : 'category',
                categories: $config.axis.x.categories || []
            },
            y : {}
        }
    });
}

