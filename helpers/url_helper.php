<?php

if (!function_exists('base_url')) :
    function base_url($action = false) {
        $action = $action !== false? preg_replace('/^\/|\/$/', '', trim($action)): false;
        return $action === false? BASE_URL: BASE_URL . $action;
    }
endif;

if (!function_exists('current_url')) :
    function current_url(){
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );
    }
endif;