<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/16/2015
 * Time: 8:38 PM
 */
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);

class Cron
{
    private $path = '/home/g560072/public_html/w/';

    public function __construct()
    {
        require_once $this->path . "load.php";
    }

    public function post_tweets()
    {
        $tweets = Tweets_Model::find('all', array(
            'is_posted' => false,
        ));

        foreach ($tweets as $tweet) {
            if (time() > $tweet->date) {
                $status = $tweet->post_to();

                if (isset($status->id) && $status->id > 0) {
                    $tweet->is_posted = true;
                    $tweet->save();
                }
            }
        }
    }

}

$cron = new Cron();
$cron->post_tweets();