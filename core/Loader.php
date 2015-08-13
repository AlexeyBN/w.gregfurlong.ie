<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 6:46 AM
 */

class Loader {
    public $var = array();
    public function __construct(){

    }
    public function model($model = ''){

        if ( ! file_exists(ABSPATH."models/".$model.'.php'))
        {
            return;
        }

        require_once(ABSPATH."models/".$model.'.php');
    }
    public function view($view='', $dis = array() ){
        if ( ! file_exists(ABSPATH."views/".$view.'.php'))
        {
            return;
        }
        unset( $dis['view']);
        $this->var = array_merge( $this->var, $dis );
        extract( $this->var );
        include(ABSPATH."views/".$view.'.php');
    }
    public function library($library){
        if ( ! file_exists(ABSPATH."libraries/".$library.'.php'))
        {
            return;
        }
        require(ABSPATH."libraries/".$library.'.php');
    }
}