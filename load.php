<?php
require_once "core/Common.php";
require_once "config.php";
require_once 'includes/plugins/php-activerecord/ActiveRecord.php';
require_once 'core/B_Model.php';

ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory(ABSPATH.'models');
    $cfg->set_connections(array(
        'development' => 'mysql://'.DB_USER.':'.DB_PASSWORD.'@'.DB_HOST.'/'.DB_NAME));
});
require_once (dirname(__FILE__)."/core/Loader.php");
require_once (dirname(__FILE__)."/core/Controller.php");