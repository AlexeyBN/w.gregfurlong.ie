<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 8:38 PM
 */

class Dashboard extends Controller{

    public function __construct()
    {
        parent::__construct();

        $this->_js = array(
            array(
                'type'      => 'admin',
                'file'      => 'moment.min.js',
                'location'  => 'footer',
            ),
            array(
                'type'      => 'admin',
                'file'      => 'daterangepicker.js',
                'location'  => 'footer',
            ),
            array(
                'type'      => 'admin',
                'file'      => 'otwitter.js',
                'location'  => 'footer',
            ),
        );

        $this->_css = array(
            array(
                'type'      => 'admin',
                'file'      => 'daterangepicker.css',
            ),
        );
    }

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

}