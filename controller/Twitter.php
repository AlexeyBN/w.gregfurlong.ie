<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 8:38 PM
 */

class Twitter extends Controller{

    public function __construct()
    {
        parent::__construct();

        $this->_js = array(
            array(
                'type'      => 'admin',
                'file'      => 'd3.v3.min.js',
                'location'  => 'footer',
            ),array(
                'type'      => 'admin',
                'file'      => 'c3.min.js',
                'location'  => 'footer',
            ),array(
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
            array(
                'type'      => 'admin',
                'file'      => 'c3.min.css',
            ),
        );
    }

    public function index(){
        $current_user       = Users_Model::get_current_user();

        /*if ($current_user && $current_user->twitter_oauth_token != NULL && $current_user->twitter_oauth_token_secret != NULL) {
            $current_user->update_token(base_url('Twitter/index'));
        }*/

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
                'html'      => $this->load->view('twitter/_twitter_chart', array(
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
            $this->layout('admin', 'twitter/twitter', array(
                'current_user'      => $current_user,
                'favorites_chart'   => $favorites_chart,
                'retweets_chart'    => $retweets_chart,
                'chart_categories'  => $categories,
                'startDate'         => date('Y/d/m', $date_first),
                'endDate'           => date('Y/d/m', $date_end),
                'favorites_count'   => $favorites_count,
                'retweets_count'    => $retweets_count
            ));
        }
    }
    public function add_tweet()
    {
        if ($this->is_ajax() && isset($_POST['date']) && isset($_POST['text']) && isset($_POST['offset'])) {
            $current_user       = Users_Model::get_current_user();
            $tweet              = new Tweets_Model();
            $tweet->user_id     = $current_user->user_id;
            $tweet->text        = $_POST['text'];
            $tweet->date        = strtotime($_POST['date']);
            $tweet->offset      = $_POST['offset'];
            $tweet->is_posted   = false;
            $status             = $tweet->save();
            $html               = $this->load->view('twitter/_tweets_table', array('tweets' => $current_user->tweets), TRUE);
            echo json_encode(array('status' => $status, 'html' => $html));
        }
        exit;
    }

    public function remove_tweet()
    {
        if ($this->is_ajax() && isset($_POST['id'])) {
            $current_user       = Users_Model::get_current_user();
            $tweet              = Tweets_Model::first(array('id' => $_POST['id']));

            if ($tweet && $tweet->user_id == $current_user->user_id) {
                $tweet->delete();
                $html = $this->load->view('twitter/_tweets_table', array('tweets' => $current_user->tweets), TRUE);
                echo json_encode(array('status' => true, 'html' => $html));
            } else {
                echo json_encode(array('status' => false));
            }
        }
        exit;
    }

    public function add_account()
    {
        $response = Users_Model::attach_twitter_account(base_url('Twitter/add_account'));
        switch ($response['status']) {
            case "redirect":
            case "redirect_error":
            case "success":
                redirect($response['url']);
                break;
            case "error":
                $dis['message'] = '<p class="error">'.$response['message'].'</p>';
                break;
        }
    }

}