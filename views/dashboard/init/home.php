<link href="<?php echo $base_url; ?>assets/admin/css/c3.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $base_url; ?>assets/admin/js/d3.v3.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/admin/js/c3.min.js"></script>
<div id="content" class="col-xs-12 col-sm-10">

    <div id="about">

        <div class="about-inner">

            <h4 class="page-header">Open-source admin theme for you</h4>



            <p>DevOOPS team</p>



            <p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>



            <p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>



            <p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a>

            </p>



            <p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>

        </div>

    </div>

    <div id="ajax-content">

        <!--Start Dashboard 1-->

        <div id="dashboard-header" class="row dashboard-head">

            <div class="dashboard-headline">

                <div class="col-xs-12 col-sm-8 col-md-8">

                    <h3>Monthly stats</h3>



                    <p>See how your projects are progressing via the new statistics engine.</p>

                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-xs-12 col-sm-4 col-md-4 pull-right">

                    <div class="pull-right timeline">

                        <span>Timeline:</span>



                        <div class="period_time pull-right">

                            <span>30 days</span>

                            <i class="fa fa-angle-down"></i>

                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>

            </div>

        </div>

        <!--End Dashboard 1-->

        <div class="row stats_wrap">

            <div class="col-xs-12 col-sm-4 col-md-4">

                <img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/offers.png" alt=""/>

            </div>

            <div class="col-xs-12 col-sm-8 col-md-8 pull-right daily-progress">

                <h3 class="title">Daily Progress</h3>
                <p class="description">Daily progress change to My Warble Snapshot</p>

                <div class="pull-right timeline">

                    <div class="period_time pull-right">

                        <span style="font-weight:bold">THIS WEEK</span>

                        <i class="fa fa-angle-down" style="font-weight:bold;margin-left:10px;"></i>

                    </div>

                </div>

                <p>
                    <div class="row">
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

                        <div class="col-xs-3 col-sm-3 col-md-3"  style="width:27%">
                            <div class="circle social-mentions"></div>
                            <div class="information">
                                <div class="count">770</div>
                                <div class="caption">Social Media Mentions</div>
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-3"  style="width:21%">
                            <div class="circle new-followers"></div>
                            <div class="information">
                                <div class="count">250</div>
                                <div class="caption">New Followers</div>
                            </div>
                        </div>
                    </div>
                </p>

                <div id="chart"></div>

            </div>

            <div class="clearfix"></div>

        </div>

        <div class="row dashboard-head">

            <div class="dashboard-headline">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <h3>Your Warbble overview</h3>



                    <p>Checkout your latest projects and their progress.</p>

                </div>

                <div class="clearfix"></div>

            </div>

        </div>

        <div class="row-fluid overview_wrap">

            <div class="col-sm-3 col-xs-12">

                <div class="overview_container">

                    <img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/travel.png" alt=""/>



                    <h3>My Website</h3>



                    <p>Last updated <span>Today at 4:24 AM</span></p>

                    <ul class="sm_avtar">

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f1.png" alt=""/></a></li>

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f2.png" alt=""/></a></li>

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f3.png" alt=""/></a></li>

                        <li class="sm_avatar_more"><a href="#">+</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-sm-3 col-xs-12">

                <div class="overview_container">

                    <img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/travel_2.png" alt=""/>



                    <h3>My Social Media Actions</h3>



                    <p>Last updated <span>Today at 4:24 AM</span></p>

                    <ul class="sm_avtar">

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f4.png" alt=""/></a></li>

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f5.png" alt=""/></a></li>

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f6.png" alt=""/></a></li>

                        <li class="sm_avatar_more sm_avatar_more_blue"><a href="#">+</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-sm-3 col-xs-12">

                <div class="overview_container">

                    <img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/travel_3.png" alt=""/>



                    <h3>facebook.com/company</h3>



                    <p>Last updated <span>Today at 4:24 AM</span></p>

                    <ul class="sm_avtar">

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f7.png" alt=""/></a></li>

                        <li class="sm_avatar_more"><a href="#">+</a></li>

                    </ul>

                </div>

            </div>

            <div class="col-sm-3 col-xs-12">

                <div class="overview_container">

                    <img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/travel_4.png" alt=""/>



                    <h3>twitter.com/company</h3>



                    <p>Last updated <span>Today at 4:24 AM</span></p>

                    <ul class="sm_avtar">

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f1.png" alt=""/></a></li>

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f8.png" alt=""/></a></li>

                        <li><a href="#"><img src="<?php echo $base_url; ?>assets/admin/images/f9.png" alt=""/></a></li>

                        <li class="sm_avatar_more"><a href="#">+</a></li>

                        <li class="sm_avatar_more sm_avatar_more_hide"><a href="#">+8</a></li>

                    </ul>

                </div>

            </div>

            <div class="clearfix"></div>

        </div>

        <div class="row dashboard-head">

            <div class="dashboard-headline">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <h3>Whats happening next</h3>



                    <p>Here you can see your upcoming scheduled campaigns.</p>

                </div>

                <div class="clearfix"></div>

            </div>

        </div>

        <!--Start Dashboard 2-->

        <div class="row-fluid campaign_wrap">

            <div class="col-xs-12">

                <div class="campaign_container">

                    <div class="col-xs-12 col-sm-1 col-sm-1-img">

                        <a href="#"><img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/adwords.png" alt=""/></a>

                    </div>

                    <div class="col-xs-12 col-sm-4">

                        <h3>Adwords Campaigns</h3>



                        <p>Upcoming Google Adwords Campaigns</p>

                    </div>

                    <div class="col-xs-12 col-sm-3 col-sm-3-updated">

                        <p>Last updated <span>Today at 4:24 AM</span></p>

                    </div>

                    <div class="col-xs-12 col-sm-2">

                        <i class="fa fa-clock-o"></i>



                        <p>26:30</p>

                        <i class="fa fa-comment-o"></i>



                        <p>624</p>

                    </div>

                    <div class="col-xs-12 col-sm-2 col-sm-2-progress">

                        <div class="progress">

                            <div class="progress-bar progress-bar-fc4c7a" role="progressbar" aria-valuenow="20"

                                 aria-valuemin="0" aria-valuemax="100" style="width: 20%;">

                                <span class="sr-only">&nbsp;</span>

                            </div>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

            <div class="col-xs-12">

                <div class="campaign_container">

                    <div class="col-xs-12 col-sm-1 col-sm-1-img">

                        <a href="#"><img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/adwords_2.png" alt=""/></a>

                    </div>

                    <div class="col-xs-12 col-sm-4">

                        <h3>Upcoming Coupon Offers</h3>



                        <p>A detailed view of your upcoming coupon campaigns</p>

                    </div>

                    <div class="col-xs-12 col-sm-3 col-sm-3-updated">

                        <p>Last updated <span>Today at 4:24 AM</span></p>

                    </div>

                    <div class="col-xs-12 col-sm-2">

                        <i class="fa fa-clock-o"></i>



                        <p>26:30</p>

                        <i class="fa fa-comment-o"></i>



                        <p>624</p>

                    </div>

                    <div class="col-xs-12 col-sm-2 col-sm-2-progress">

                        <div class="progress">

                            <div class="progress-bar progress-bar-4bcf99" role="progressbar" aria-valuenow="80"

                                 aria-valuemin="0" aria-valuemax="100" style="width: 80%;">

                                <span class="sr-only">&nbsp;</span>

                            </div>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

            <div class="col-xs-12">

                <div class="campaign_container">

                    <div class="col-xs-12 col-sm-1 col-sm-1-img">

                        <a href="#"><img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/adwords_3.png" alt=""/></a>

                    </div>

                    <div class="col-xs-12 col-sm-4">

                        <h3>Approval Area</h3>



                        <p>Here you can see what is awaiting your approval from our design team</p>

                    </div>

                    <div class="col-xs-12 col-sm-3 col-sm-3-updated">

                        <p>Last updated <span>Today at 4:24 AM</span></p>

                    </div>

                    <div class="col-xs-12 col-sm-2">

                        <i class="fa fa-clock-o"></i>



                        <p>26:30</p>

                        <i class="fa fa-comment-o"></i>



                        <p>624</p>

                    </div>

                    <div class="col-xs-12 col-sm-2 col-sm-2-progress">

                        <div class="progress">

                            <div class="progress-bar progress-bar-59c2e6" role="progressbar" aria-valuenow="50"

                                 aria-valuemin="0" aria-valuemax="100" style="width: 50%;">

                                <span class="sr-only">&nbsp;</span>

                            </div>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

            <div class="col-xs-12">

                <div class="campaign_container">

                    <div class="col-xs-12 col-sm-1 col-sm-1-img">

                        <a href="#"><img class="img-responsive" src="<?php echo $base_url; ?>assets/admin/images/adwords_4.png" alt=""/></a>

                    </div>

                    <div class="col-xs-12 col-sm-4">

                        <h3>Social Media Comments</h3>



                        <p>here you will find a list of Social Media comments that will need some response.</p>

                    </div>

                    <div class="col-xs-12 col-sm-3 col-sm-3-updated">

                        <p>Last updated <span>Today at 4:24 AM</span></p>

                    </div>

                    <div class="col-xs-12 col-sm-2">

                        <i class="fa fa-clock-o"></i>



                        <p>26:30</p>

                        <i class="fa fa-comment-o"></i>



                        <p>624</p>

                    </div>

                    <div class="col-xs-12 col-sm-2 col-sm-2-progress">

                        <div class="progress">

                            <div class="progress-bar progress-bar-fe6d4b" role="progressbar" aria-valuenow="30"

                                 aria-valuemin="0" aria-valuemax="100" style="width: 30%;">

                                <span class="sr-only">&nbsp;</span>

                            </div>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

            <div class="clearfix"></div>

        </div>

        <!--End Dashboard 2 -->

        <div style="height: 40px;"></div>

    </div>

</div>
<script type="text/javascript">

    var current_date = new Date();

    var day_arrays = [];

    for(var i = 0 ; i < 7 ; i++){

        var date = new Date(current_date.getTime() - 86400000 * i);
        var month = date.getMonth()+1;
        if(month < 10) {
            month = "0" + month ; 
        }
        var day = date.getDate();

        if(day < 10) {
            day = "0" + day ;
        }

        var day_string  = day+"."+month;

        day_arrays.push(day_string);
    }
    

    var chart = c3.generate({bindto: '#chart', 
     data: {  
        columns: [
             ['Clicks', 1740, 1700, 1260, 1650, 1470, 1490] ,
             ['Coupon', 1250, 1100, 1200, 1200, 1050, 1250],
             ['Social', 1050, 740, 720, 980, 750, 770],
             ['Followers', 330, 350 , 200, 300, 240, 250,],
         ],
         colors: {
            Clicks: '#59c2e6',
            Coupon: '#4bcf99',
            Social: '#fc4c7a',
            Followers: '#ac8fef'
        }, 
     },
    axis : {
            x : {
                type : 'category',
                categories:[ day_arrays[5], day_arrays[4] ,day_arrays[3] ,day_arrays[2] ,day_arrays[1] ,day_arrays[0]]
            },

            y : {


            }
        }
    }); 

</script>

<!--End Content-->