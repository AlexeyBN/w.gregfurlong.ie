<?php

if (!function_exists('get_config')) :
    function get_config($config = false) {
        $file = ABSPATH . "config/$config.php";
        if (file_exists($file)) {
            return include ($file);
        }
        return false;
    }
endif;