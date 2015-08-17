<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="description" content="description">
    <meta name="author" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="css/style_v1.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
    <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            //jQuery('.progress .progress-bar').progressbar();
        });
    </script>
</head>
<body>
<!--Start Header-->
<div id="screensaver">
    <canvas id="canvas"></canvas>
    <i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
    <div class="devoops-modal">
        <div class="devoops-modal-header">
            <div class="modal-header-name">
                <span>Basic table</span>
            </div>
            <div class="box-icons">
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="devoops-modal-inner">
        </div>
        <div class="devoops-modal-bottom">
        </div>
    </div>
</div>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                <a href="#" class="text-center text-uppercase">Warbble</a>
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        <div id="search">
                            <i class="fa fa-search"></i>
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">
                            <li class="hidden-xs">
                                <a href="#" class="modal-link">
                                    <img src="images/bell.png" alt=""/>
                                    <span class="badge">8</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                    <i class="fa fa-angle-down"></i>

                                    <div class="avatar">
                                        <span>J</span>
                                    </div>
                                    <div class="user-mini pull-left">
                                        <span>Josh B.</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="">
                                            <i class="fa fa-envelope"></i>
                                            <span>Messages</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="">
                                            <i class="fa fa-picture-o"></i>
                                            <span>Albums</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="">
                                            <i class="fa fa-tasks"></i>
                                            <span>Tasks</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-cog"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-power-off"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
            <ul class="nav main-menu">
                <li class="active">
                    <a href="#" class="">
                        <img src="images/dashboard.png" alt=""/>
                        <span class="hidden-xs">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <img src="images/browser.png" alt=""/>
                        <span class="hidden-xs">Website</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-facebook"></i>
                        <span class="hidden-xs">Facebook</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-twitter"></i>
                        <span class="hidden-xs">Twitter Feeds</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <img src="images/tag.png" alt=""/>
                        <span class="hidden-xs">Coupon</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <img src="images/activity.png" alt=""/>
                        <span class="hidden-xs">Analytics</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="" href="#">Feed</a></li>
                        <li><a class=" add-full" href="#">Messages</a></li>
                        <li><a class="" href="#">Pricing</a></li>
                        <li><a class="" href="#">Product</a></li>
                        <li><a class="" href="#">Invoice</a></li>
                        <li><a class="" href="#">Search Results</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <img src="images/newspaper.png" alt=""/>
                        <span class="hidden-xs">Blogs</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-thumbs-up"></i>
                        <span class="hidden-xs">Other Social Media </span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-trophy"></i>
                        <span class="hidden-xs">Upgrade</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">First level menu</a></li>
                        <li><a href="#">First level menu</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-plus-square"></i>
                                <span class="hidden-xs">Second level menu group</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Second level menu</a></li>
                                <li><a href="#">Second level menu</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-plus-square"></i>
                                        <span class="hidden-xs">Three level menu group</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Three level menu</a></li>
                                        <li><a href="#">Three level menu</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-plus-square"></i>
                                                <span class="hidden-xs">Four level menu group</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Four level menu</a></li>
                                                <li><a href="#">Four level menu</a></li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle">
                                                        <i class="fa fa-plus-square"></i>
                                                        <span class="hidden-xs">Five level menu group</span>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Five level menu</a></li>
                                                        <li><a href="#">Five level menu</a></li>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle">
                                                                <i class="fa fa-plus-square"></i>
                                                                <span class="hidden-xs">Six level menu group</span>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="#">Six level menu</a></li>
                                                                <li><a href="#">Six level menu</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Three level menu</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--Start Content-->
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
                        <img class="img-responsive" src="images/offers.png" alt=""/>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 pull-right">
                        <img class="img-responsive" src="images/graphic.png" alt=""/>
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
                            <img class="img-responsive" src="images/travel.png" alt=""/>

                            <h3>My Website</h3>

                            <p>Last updated <span>Today at 4:24 AM</span></p>
                            <ul class="sm_avtar">
                                <li><a href="#"><img src="images/f1.png" alt=""/></a></li>
                                <li><a href="#"><img src="images/f2.png" alt=""/></a></li>
                                <li><a href="#"><img src="images/f3.png" alt=""/></a></li>
                                <li class="sm_avatar_more"><a href="#">+</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="overview_container">
                            <img class="img-responsive" src="images/travel_2.png" alt=""/>

                            <h3>My Social Media Actions</h3>

                            <p>Last updated <span>Today at 4:24 AM</span></p>
                            <ul class="sm_avtar">
                                <li><a href="#"><img src="images/f4.png" alt=""/></a></li>
                                <li><a href="#"><img src="images/f5.png" alt=""/></a></li>
                                <li><a href="#"><img src="images/f6.png" alt=""/></a></li>
                                <li class="sm_avatar_more sm_avatar_more_blue"><a href="#">+</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="overview_container">
                            <img class="img-responsive" src="images/travel_3.png" alt=""/>

                            <h3>facebook.com/company</h3>

                            <p>Last updated <span>Today at 4:24 AM</span></p>
                            <ul class="sm_avtar">
                                <li><a href="#"><img src="images/f7.png" alt=""/></a></li>
                                <li class="sm_avatar_more"><a href="#">+</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="overview_container">
                            <img class="img-responsive" src="images/travel_4.png" alt=""/>

                            <h3>twitter.com/company</h3>

                            <p>Last updated <span>Today at 4:24 AM</span></p>
                            <ul class="sm_avtar">
                                <li><a href="#"><img src="images/f1.png" alt=""/></a></li>
                                <li><a href="#"><img src="images/f8.png" alt=""/></a></li>
                                <li><a href="#"><img src="images/f9.png" alt=""/></a></li>
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
                                <a href="#"><img class="img-responsive" src="images/adwords.png" alt=""/></a>
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
                                <a href="#"><img class="img-responsive" src="images/adwords_2.png" alt=""/></a>
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
                                <a href="#"><img class="img-responsive" src="images/adwords_3.png" alt=""/></a>
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
                                <a href="#"><img class="img-responsive" src="images/adwords_4.png" alt=""/></a>
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
        <!--End Content-->
    </div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<!--<script src="js/devoops.js"></script>-->
</body>
</html>
