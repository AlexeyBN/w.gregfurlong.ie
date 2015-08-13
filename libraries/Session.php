<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 1:29 PM
 */

class Session {

    public function userdata($name=''){
        return $_SESSION[$name];
    }
    public function set_userdata($name='', $value=''){
        $_SESSION[$name] = $value;
    }
    public function unset_userdata($name){
        unset( $_SESSION[$name]);
    }
}