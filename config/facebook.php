<?php

if (file_exists(ABSPATH . "config/facebook.local.php")) {
    return include ABSPATH . "config/facebook.local.php";
} else {
    return array(
        'app_id'        => '890446777698385',
        'app_secret'    => 'ff8a1306b818f54b2cd3a33d76429ed7',
    );
}