<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Dashboard</title>

    <meta name="description" content="description">

    <meta name="author" content="Dashboard">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo $base_url; ?>assets/admin/plugins/bootstrap/bootstrap.css" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>

    <?php foreach($csses as $css): ?>
        <link href="<?php echo $base_url; ?>assets/<?php echo $css['type'] . '/css/' . $css['file'] ?>" rel="stylesheet">
    <?php endforeach; ?>



    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

    <link href="<?php echo $base_url; ?>assets/admin/css/style_v1.css" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->

    <script src="<?php echo $base_url; ?>assets/admin/plugins/bootstrap/bootstrap.min.js"></script>



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>

    <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>

    <![endif]-->

    <?php if(!empty($js_variables)): ?>
        <script type="text/javascript">
            <?php foreach($js_variables as $var_key => $var_value): ?>
                <?php if(is_numeric($var_value)): ?>
                    window.<?= $var_key ?> = <?= $var_value ?>;
                <?php elseif(is_string($var_value)): ?>
                    window.<?= $var_key ?> = '<?= $var_value ?>';
                <?php elseif(is_array($var_value) || is_object($var_value)): ?>
                    window.<?= $var_key ?> = JSON.parse('<?= json_encode($var_value) ?>');
                <?php endif; ?>
            <?php endforeach; ?>
        </script>
    <?php endif; ?>

    <?php foreach($js_scripts as $script): ?>
        <?php if($script['location'] == 'header'): ?>
            <script src="<?php echo $base_url; ?>assets/<?php echo $script['type'] . '/js/' . $script['file'] ?>"></script>
        <?php endif; ?>
    <?php endforeach; ?>

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

                <a href="#" class="text-center text-uppercase">Dashboard</a>

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

                                    <img src="<?php echo $base_url; ?>assets/admin/images/bell.png" alt=""/>

                                    <span class="badge">8</span>

                                </a>

                            </li>

                            <li class="dropdown">

                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">

                                    <i class="fa fa-angle-down"></i>

                                    <div class="hh-avatar avatar">

                                        <span><?php if( !empty( $userlogin->avatar ) ) echo '<img src="'.$base_url.$userlogin->avatar.'" width="40" height="40" alt="Avatar" />'; else echo $userlogin->first_name;?></span>

                                    </div>

                                    <div class="user-mini pull-left">

                                        <span><?=$userlogin->first_name?></span>

                                    </div>

                                </a>

                                <ul class="dropdown-menu">

                                    <li>

                                        <a href="<?php echo $base_url; ?>Users/myaccount">

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

                                        <a href="<?php echo $base_url; ?>Users/settings">

                                            <i class="fa fa-cog"></i>

                                            <span>Settings</span>

                                        </a>

                                    </li>

                                    <li>

                                        <a href="<?=$base_url."Users/logout"?>">

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

<div id="main" class="container-fluid"><!--MAIN-->

    <div class="row"><!--ROW-->
        <div id="sidebar-left" class="col-xs-2 col-sm-2"><!--SIDEBAR-->
            <ul class="nav main-menu">
                <li class="active">
                    <a href="Dashboard" class="">
                        <img src="<?php echo $base_url; ?>assets/admin/images/dashboard.png" alt=""/>
                        <span class="hidden-xs">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <img src="<?php echo $base_url; ?>assets/admin/images/browser.png" alt=""/>
                        <span class="hidden-xs">Website</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="Facebook" class="dropdown-toggle">
                        <i class="fa fa-facebook"></i>
                        <span class="hidden-xs">Facebook</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/Twitter" class="dropdown-toggle">
                        <i class="fa fa-twitter"></i>
                        <span class="hidden-xs">Twitter Feeds</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <img src="<?php echo $base_url; ?>assets/admin/images/tag.png" alt=""/>
                        <span class="hidden-xs">Coupon</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <img src="<?php echo $base_url; ?>assets/admin/images/activity.png" alt=""/>
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
                        <img src="<?php echo $base_url; ?>assets/admin/images/newspaper.png" alt=""/>
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
        </div><!--#SIDEBAR-->

        <div id="content" class="col-xs-12 col-sm-10"><!--CONTENT-->