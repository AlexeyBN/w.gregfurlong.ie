<link href="<?php echo $base_url; ?>assets/admin/css/c3.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $base_url; ?>assets/admin/js/d3.v3.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/admin/js/c3.min.js"></script>
<div id="content" class="col-xs-12 col-sm-10">

    <!--<div id="about">

        <div class="about-inner">

            <h4 class="page-header">Open-source admin theme for you</h4>



            <p>DevOOPS team</p>



            <p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>



            <p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>



            <p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a>

            </p>



            <p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>

        </div>

    </div>-->
    <div id="ajax-content">

        <?php if(!$twitter_meta): ?>
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

                    <input type="button" class="btn btn-info add-facebook-account" value="Add an account">
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="col-xs-12 col-sm-8 col-md-8 daily-progress">

                <h3 class="title">Daily Progress</h3>
                <p class="description">Daily progress change to My Warble Snapshot</p>

                <div class="pull-right timeline">

                    <div class="period_time pull-right">

                        <span style="font-weight:bold">THIS WEEK</span>

                        <i class="fa fa-angle-down" style="font-weight:bold;margin-left:10px;"></i>

                    </div>

                </div>

                <p>
                </p><div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3" style="width:20%">
                        <div class="circle web-click"></div>
                        <div class="information">
                            <div class="count">1,490</div>
                            <div class="caption">Web Clicks</div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="circle coupon"></div>
                        <div class="information">
                            <div class="count">1,250</div>
                            <div class="caption">Coupon Downloads</div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3" style="width:27%">
                        <div class="circle social-mentions"></div>
                        <div class="information">
                            <div class="count">770</div>
                            <div class="caption">Social Media Mentions</div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3" style="width:21%">
                        <div class="circle new-followers"></div>
                        <div class="information">
                            <div class="count">250</div>
                            <div class="caption">New Followers</div>
                        </div>
                    </div>
                </div>
                <p></p>

                <div id="twitter_chart"></div>

            </div>

        <?php endif; ?>

    </div>
</div>

<script type="text/javascript">
    twitter_chart({
        columns: [favorites_chart],
        colors: {
            Favorites: '#59c2e6',
        },
        axis: {
            x: {
                categories: chart_categories
            }
        }
    });
</script>

<!--End Dashboard -->
