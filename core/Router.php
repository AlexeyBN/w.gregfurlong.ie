<?php
/**
 * Created by PhpStorm.
 * User: enclaveit
 * Date: 5/21/15
 * Time: 8:25 AM
 */
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
class Router {

    public $controller = 'Home';
    public $method = 'index';
    public $param = array();
    public $routers = array();
    public $include = '';

    public function __construct(){
        $this->parseUrl();
    }

    public function parseUrl(){
        $uri = '';
        $url = array();
        if( isset( $_GET['url'] ) ){
            $uri = filter_var( rtrim( $_GET['url'], "/" ), FILTER_SANITIZE_URL );
            $url = explode( "/", filter_var( rtrim( $_GET['url'], "/" ), FILTER_SANITIZE_URL ));
        }
        if( sizeof( $url ) >=2){
            if( file_exists( ABSPATH."controller/".$url[0].".php" ) || file_exists( ABSPATH."controller/".ucfirst($url[0]).".php" ) ){
                $this->controller = ucfirst($url[0]);
                $this->method = $url[1];
                $this->include = "controller/".$this->controller.".php";
                unset($url[0]);
                unset($url[1]);
            }elseif(file_exists( ABSPATH."controller/".$url[0]."/".$url[1].".php" ) || file_exists( ABSPATH."controller/".$url[0]."/".ucfirst($url[1]).".php" )){
                $this->controller = ucfirst($url[1]);
                $this->include = "controller/".$url[0]."/".$this->controller.".php";
                $this->method = $url[2];
                unset($url[0]);
                unset($url[1]);
                unset($url[2]);
            }else{
                $this->include = "controller/".$this->controller.".php";
                unset($url);
            }
            $param = $url ? array_values( $url ) : array();
            $this->param = $param;
        }
        include(ABSPATH."config/router.php");
        $this->routers = isset($route) && !empty($route) ? $route : $this->routers;
        // Loop through the route array looking for wildcards
        foreach($this->routers as $k=>$v){
            //$c = str_replace( array(':any',':num'), array('[a-zA-Z0-9]', '[0-9]'), rtrim($k, "/") );
            //if(preg_match('/'.$k.'/', $uri)) {
            if($k == $uri) {
                $s = explode( "/", rtrim( $v, "/" ));
                if( file_exists( ABSPATH."controller/".$s[0].".php" ) || file_exists( ABSPATH."controller/".ucfirst($s[0]).".php" ) ){
                    $this->controller = ucfirst($s[0]);
                    $this->method = $s[1];
                    $this->include = "controller/".$this->controller.".php";
                    unset($s[0]);
                    unset($s[1]);
                }elseif(file_exists( ABSPATH."controller/".$s[0]."/".$s[1].".php" ) || file_exists( ABSPATH."controller/".$s[0]."/".ucfirst($s[1]).".php" )){
                    $this->controller = ucfirst($s[1]);
                    $this->include = "controller/".$s[0]."/".$this->controller.".php";
                    $this->method = $s[2];
                    unset($s[0]);
                    unset($s[1]);
                    unset($s[2]);
                }else{
                    $this->include = "controller/".$this->controller.".php";
                }
                $pr = explode( "/", rtrim($uri,"/"));
                unset($pr[0]);
                $param = $pr ? array_values( $pr ) : array();
                $this->param = $param;
            }
        }
        if(empty($this->include)){
            $this->include = "controller/".$this->controller.".php";
        }
        include( ABSPATH.$this->include );

        /*
         * Load Controller
         */

         $controller = new $this->controller;


        call_user_func_array(array($controller,$this->method), $this->param);
    }
} 