<?php

if (!function_exists('base_url')) :
    function base_url($action = false) {
        $action = $action !== false? preg_replace('/^\/|\/$/', '', trim($action)): false;
        return $action === false? BASE_URL: BASE_URL . $action;
    }
endif;