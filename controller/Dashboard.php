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
        $this->_js[] = array(
            'type'      => 'admin',
            'file'      => 'admin.js',
            'location'  => 'header',
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

    public function twitter(){
        $current_user       = Users_Model::get_current_user();
        $twitter_meta       = $current_user->get_usermeta('twitter_meta');
        $favorites          = $current_user->get_twitter_favorites();
        $favorites_chart    = array('Favorites');

        $date_now = time();
        $date_week_ago = strtotime('-7 DAYS');

        while ($date_week_ago <= $date_now) {
            $index = date('d.m', $date_week_ago);
            $favorites_chart[$index] = 0;

            foreach ($favorites as $favorite) {
                if (date('Y-m-d', strtotime($favorite->created_at)) == date('Y-m-d', $date_week_ago)) {
                    $favorites_chart[$index] ++;
                }
            }
            $date_week_ago = strtotime('+1 day', $date_week_ago);
        }
        $categories      = array_slice(array_keys($favorites_chart), 1);
        $favorites_chart = array_values($favorites_chart);

        $this->_js_variables = array(
            'favorites_chart'   => $favorites_chart,
            'chart_categories'  => $categories
        );

        $dis = array(
            'view'              => 'social/twitter',
            'current_user'      => $current_user,
            'twitter_meta'      => $twitter_meta,
            'favorites_chart'   => $favorites_chart,
        );
        $this->view_admin( $dis );
    }
}