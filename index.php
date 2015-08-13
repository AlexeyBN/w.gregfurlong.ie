<?php session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
require_once "load.php";
/**
 * Process Router
 */
require_once(ABSPATH."core/Router.php");
$router = new Router();
/**
 * End Process Router
 */
