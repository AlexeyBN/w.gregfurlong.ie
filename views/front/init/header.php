<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>

    <link href="<?php echo BASE_URL; ?>assets/front/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/front/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/front/css/bootstrap-social.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/front/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/front/css/style.css"> <!-- Gem style -->

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/front/font-awesome-4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>



    <!-- Latest compiled and minified JavaScript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/front/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/front/js/main-script.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/front/js/modernizr.js"></script> <!-- Modernizr -->
    <script src="<?php echo BASE_URL; ?>assets/front/js/jquery.validate.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
<header id="top" role="banner">
    <div class="header-bg">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">Warbble<sup>TM</sup></a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="need_help"><a href="#">Need Help?</a></li>
                    <?php if( !isset( $userlogin ) or sizeof( $userlogin ) <= 0) : ?>
                        <li class="header_login"><a href="<?php echo BASE_URL; ?>login">Log in</a></li>
                        <li class="header_signup"><a href="<?php echo BASE_URL; ?>singup">Sign up</a></li>
                    <?php else: ?>
                        <li class="header_name"><a href="<?php echo BASE_URL; ?>Dashboard">Hi, <strong><?=@$userlogin->first_name?></strong></a></li>
                        <li class="header_logout"><a href="<?php echo BASE_URL; ?>logout">Logout</a></li>
                    <?php endif; ?>
                </ul>

            </nav>


        </div>
    </div>
</header>