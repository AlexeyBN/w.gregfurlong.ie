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
    public function view($view='', $dis = array(), $return = false ){
        if ( ! file_exists(ABSPATH."views/".$view.'.php'))
        {
            return;
        }
        unset( $dis['view']);
        $this->var = array_merge( $this->var, $dis );
        extract( $this->var );
        if (!$return) {
            include(ABSPATH."views/".$view.'.php');
        } else {
            ob_start();
            include(ABSPATH."views/".$view.'.php');
            $html = ob_get_contents();
            ob_end_clean();
            return $html;
        }
    }
    public function library($library){
        if ( ! file_exists(ABSPATH."libraries/".$library.'.php'))
        {
            return;
        }
        require(ABSPATH."libraries/".$library.'.php');
    }

    /**
     * Include helper file
     * @param $name
     */
    public function helper($name)
    {
        $helper_file = ABSPATH . "helpers/{$name}_helper.php";
        if (file_exists($helper_file)) {
            require_once $helper_file;
        }
    }

    public function get_uri()
    {
        return explode('/', preg_replace('/^\/|\/$/', '', trim($_SERVER['REQUEST_URI'])));
    }
}