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
                'file'      => 'admin.js',
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

    public function twitter(){
        $current_user       = Users_Model::get_current_user();
        $twitter_meta       = $current_user->get_usermeta('twitter_meta');
        $favorites          = $current_user->get_twitter_favorites();
        $tweets             = $current_user->get_all_tweets();
        $favorites_chart    = array('Favorites');
        $retweets_chart     = array('Retweets');
        $favorites_count    = 0;
        $retweets_count     = 0;

        $date_start = $date_first = strtotime('-7 DAYS');
        $date_end = time();

        if ($this->is_ajax() && isset($_POST['startDate']) && isset($_POST['endDate'])) {
            $date_start = $_POST['startDate'];
            $date_end = $_POST['endDate'];
        }
            
        while ($date_start <= $date_end) {
            $index = date('d.m', $date_start);
            $favorites_chart[$index] = 0;
            $retweets_chart[$index] = 0;

            // Favorites
            foreach ($favorites as $favorite) {
                if (date('Y-m-d', strtotime($favorite->created_at)) == date('Y-m-d', $date_start)) {
                    $favorites_chart[$index] ++;
                    $favorites_count ++;
                }
            }
            // Retweets
            foreach ($tweets as $tweet) {
                if (date('Y-m-d', strtotime($tweet->created_at)) == date('Y-m-d', $date_start)) {
                    $retweets_chart[$index] += $tweet->retweet_count;
                    $retweets_count += $tweet->retweet_count;
                }
            }
            $date_start = strtotime('+1 day', $date_start);
        }
        $categories      = array_slice(array_keys($favorites_chart), 1);
        $favorites_chart = array_values($favorites_chart);
        $retweets_chart  = array_values($retweets_chart);

        if ($this->is_ajax() && isset($_POST['startDate']) && isset($_POST['endDate'])) {
            echo json_encode(array(
                'status'    => true,
                'html'      => $this->load->view('dashboard/social/_twitter_chart', array(
                    'favorites_chart'   => $favorites_chart,
                    'chart_categories'  => $categories,
                    'startDate'         => date('Y/d/m', $date_first),
                    'endDate'           => date('Y/d/m', $date_end),
                    'favorites_count'   => $favorites_count,
                    'retweets_count'    => $retweets_count,
                ), TRUE),
                'favorites_chart'   => $favorites_chart,
                'retweets_chart'    => $retweets_chart,
                'chart_categories'  => $categories,
            ));
            exit;
        } else {
            $this->view_admin( array(
                'view'              => 'social/twitter',
                'current_user'      => $current_user,
                'twitter_meta'      => $twitter_meta,
                'favorites_chart'   => $favorites_chart,
                'retweets_chart'    => $retweets_chart,
                'chart_categories'  => $categories,
                'startDate'         => date('Y/d/m', $date_first),
                'endDate'           => date('Y/d/m', $date_end),
                'favorites_count'   => $favorites_count,
                'retweets_count'    => $retweets_count,
            ) );
        }
    }
}