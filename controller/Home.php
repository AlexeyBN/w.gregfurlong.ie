<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 10:21 AM
 */

class Home extends Controller {
    public function index(){
        $dis = array();
        $dis['view'] = 'init/home';
        $this->view_front( $dis );
    }
}