<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 8:38 PM
 */

class Dashboard extends Controller{
    public function index(){
        $dis = array();
        $dis['view'] = 'init/home';
        $this->view_admin( $dis );
    }

    public function facebook(){
        $dis = array();
        $dis['view'] = 'social/facebook';
        $this->view_admin( $dis );
    }

    public function twitter(){
        $dis = array();
        $dis['view'] = 'social/twitter';
        $this->view_admin( $dis );
    }
}