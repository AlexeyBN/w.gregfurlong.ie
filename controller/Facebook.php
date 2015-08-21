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
        $current_user       = Users_Model::get_current_user();
        $posts              = Users_Model::get_facebook_posts();
        $post_chart         = array('Posts');
        $post_count         = 0;



        $likes              = Users_Model::get_facebook_likes();
        $likes_chart        = array('Likes');
        $likes_count        = 0;

        $date_start = $date_first = strtotime('-7 DAYS');
        $date_end = time();

        if ($this->is_ajax() && isset($_POST['startDate']) && isset($_POST['endDate'])) {
            $date_start = $_POST['startDate'];
            $date_end = $_POST['endDate'];
        }

        while ($date_start <= $date_end) {
            $index = date('d.m', $date_start);
            $post_chart[$index] = 0;
            $likes_chart[$index] = 0;

            // Posts
            if (!empty($posts)) {
                foreach ($posts['data'] as $post) {
                    if (date('Y-m-d', strtotime($post->created_time)) == date('Y-m-d', $date_start)) {
                        $post_chart[$index] ++;
                        $post_count ++;
                    }
                }
            }

            // Likes
            if (!empty($likes->data)) {
                foreach ($likes->data as $like) {
                    if (date('Y-m-d', strtotime($like->created_time)) == date('Y-m-d', $date_start)) {
                        $likes_chart[$index] ++;
                        $likes_count ++;
                    }
                }
            }
            $date_start = strtotime('+1 day', $date_start);
        }
        $categories         = array_slice(array_keys($post_chart), 1);
        $post_chart         = array_values($post_chart);
        $likes_chart        = array_values($likes_chart);

        if ($this->is_ajax() && isset($_POST['startDate']) && isset($_POST['endDate'])) {
            echo json_encode(array(
                'status'    => true,
                'html'      => $this->load->view('facebook/_facebook_chart', array(
                    'chart_categories'  => $categories,
                    'post_count'        => $post_count,
                    'post_chart'        => $post_chart,
                    'likes_count'       => $likes_count,
                    'likes_chart'       => $likes_chart,
                    'startDate'         => date('d/m/y', $date_first),
                    'endDate'           => date('d/m/y', $date_end),
                ), TRUE),
                'chart_categories'  => $categories,
                'post_chart'        => $post_chart,
                'likes_chart'        => $likes_chart,
            ));
            exit;
        } else {
            $this->layout('admin', 'facebook/facebook', array(
                'current_user'      => $current_user,
                'post_count'        => $post_count,
                'post_chart'        => $post_chart,
                'likes_count'       => $likes_count,
                'likes_chart'       => $likes_chart,
                'chart_categories'  => $categories,
                'startDate'         => date('d/m/y', $date_first),
                'endDate'           => date('d/m/y', $date_end),
            ));
        }
    }
}