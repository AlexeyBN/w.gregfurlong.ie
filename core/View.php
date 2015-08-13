<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/15/2015
 * Time: 9:29 PM
 */

class View {
    function load($content = '', $array = array()){
        include_once(ABSPATH."views/".$content.".php");
    }
}