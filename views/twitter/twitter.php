<div id="ajax-content">
    <?php if(!Users_Model::is_twitter_account() && !Users_Model::has_twitter_account()): ?>
    <div class="tw-add-account">
        <div id="dashboard-header" class="row dashboard-head">

            <div class="dashboard-headline">

                <div class="col-xs-12 col-sm-8 col-md-8">

                    <h3>Add a Twitter Account</h3>
                    <br>
                    <p>Please add you Twitter account to get feed.</p>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row stats_wrap">
            <div class="col-xs-12 col-sm-8 col-md-8">
                <a href="/Twitter/add_account" class="btn btn-info add-twitter-account">Add an account</a>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="col-xs-12 col-md-12 daily-progress">
            <div class="col-inner section">
                <h2 class="title">Twitter account information</h2>
                <p class="description"></p>

                <div class="pull-right timeline">

                    <div class="period_time pull-right">

                        <input type="text" class="form-control twitter_datepicker">
                        <div class="twitter_datepicker_dropdown"></div>

                    </div>

                </div>

                <div class="twitter-chart-info">
                    <?php echo $this->view('dashboard/social/_twitter_chart', array(
                        'favorites_chart'   => $favorites_chart,
                        'chart_categories'  => $chart_categories,
                        'startDate'         => $startDate,
                        'endDate'           => $endDate,
                    ), TRUE) ?>
                </div>
                <div id="twitter_chart" data-columns='[<?php echo json_encode($favorites_chart) ?>, <?php echo json_encode($retweets_chart) ?> ]' data-categories='<?php echo json_encode($chart_categories) ?>'></div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 first-col margin-top-25">
            <div class="col-inner section">
                <h2>Tweets</h2>
                <form id="new-tweet" role="form">
                    <div class="form-group">
                        <label for="tweet_date">Date</label>
                        <input type="text" name="tweet[date]" id="tweet_date" class="form-control single-datepiker">
                    </div>
                    <div class="form-group">
                        <label for="tweet_text">Tweet Text</label>
                        <textarea name="tweet[text]" id="tweet_text" maxlength="140" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Tweet</button>
                </form>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 last-col margin-top-25">
            <div class="col-inner section tweets-table">
                <?php $this->view('twitter/_tweets_table', array(
                    'tweets' => $current_user->tweets
                )) ?>
            </div>
        </div>
    <?php endif; ?>

</div>


<!--End Dashboard -->
