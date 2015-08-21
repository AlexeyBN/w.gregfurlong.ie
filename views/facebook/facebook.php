<div id="ajax-content">
    <?php if(!Users_Model::is_facebook_account()): ?>
    <div class="fb-add-account">
        <div id="dashboard-header" class="row dashboard-head">

            <div class="dashboard-headline">

                <div class="col-xs-12 col-sm-8 col-md-8">

                    <h3>Add a Facebook Account</h3>
                    <br>
                    <p>Please add you Facebook account to get information.</p>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row stats_wrap">
            <div class="col-xs-12 col-sm-8 col-md-8">

                <input type="button" class="btn btn-info add-facebook-account" value="Add an account">
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="col-xs-12 col-md-12 daily-progress">
            <div class="col-inner section">
                <h2 class="title">Facebook account information</h2>
                <p class="description"></p>

                <div class="pull-right timeline">

                    <div class="period_time pull-right">

                        <input type="text" class="form-control facebook_datepicker">
                        <div class="facebook_datepicker_dropdown"></div>

                    </div>

                </div>

                <div class="facebook-chart-info">
                    <?php echo $this->view('facebook/_facebook_chart', array(
                        'post_chart'        => $post_chart,
                        'likes_chart'       => $likes_chart,
                        'chart_categories'  => $chart_categories,
                        'startDate'         => $startDate,
                        'endDate'           => $endDate,
                    ), TRUE) ?>
                </div>
                <div id="facebook_chart" data-columns='[<?php echo json_encode($post_chart) ?>, <?php echo json_encode($likes_chart) ?>]' data-categories='<?php echo json_encode($chart_categories) ?>'></div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 first-col margin-top-25">
            <!--<div class="col-inner section">
                <h2>Posts</h2>
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
            </div>-->
        </div>
        <div class="col-xs-12 col-md-6 last-col margin-top-25">
            <div class="col-inner section facebook-post-table">
                <?php /*$this->view('facebook/_facebook_post_table', array(
                    'tweets' => $current_user->tweets
                ))*/ ?>
            </div>
        </div>
    <?php endif; ?>

</div>


<!--End Dashboard -->
