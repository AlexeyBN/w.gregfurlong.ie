<?php

class Facebook extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->_js = array(
            array(
                'type' => 'admin',
                'file' => 'd3.v3.min.js',
                'location' => 'footer',
            ), array(
                'type' => 'admin',
                'file' => 'c3.min.js',
                'location' => 'footer',
            ), array(
                'type' => 'admin',
                'file' => 'moment.min.js',
                'location' => 'footer',
            ),
            array(
                'type' => 'admin',
                'file' => 'daterangepicker.js',
                'location' => 'footer',
            ),
            array(
                'type' => 'admin',
                'file' => 'ofacebook.js',
                'location' => 'footer',
            ),
        );

        $this->_css = array(
            array(
                'type' => 'admin',
                'file' => 'daterangepicker.css',
            ),
            array(
                'type' => 'admin',
                'file' => 'c3.min.css',
            ),
        );
    }

    function index()
    {
        $data = Users_Model::get_facebook_data();
    }
}