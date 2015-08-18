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
    private $path = '/home/dev10/www/gregfurlong.local/';

    public function __construct()
    {
        require_once $this->path . "includes/plugins/twitter/twitteroauth.php";
        require_once $this->path . "helpers/config_helper.php";
        require_once $this->path . "load.php";
        require_once $this->path . "models/Tweets_Model.php";
        require_once $this->path . "models/Users_Model.php";
    }

    public function post_tweets()
    {

        $tweets = Tweets_Model::find('all', array(
            'is_posted' => false,
        ));

        foreach ($tweets as $tweet) {
            if (time() + $tweet->offset * 60 > $tweet->date) {
                $status = $this->post_to($tweet);
                if (isset($status->id) && $status->id > 0) {
                    $tweet->is_posted = true;
                    $tweet->save();
                }
            }
        }
    }

    public function post_to($tweet)
    {
        $current_user = $tweet->user;

        if ($current_user && ($current_user->type == Users_Model::USER_TYPE_HAS_TWITTER || $current_user->type == Users_Model::USER_TYPE_TWITTER)) {

            $verifier = array(
                'oauth_token' => $current_user->twitter_oauth_token,
                'oauth_token_secret' => $current_user->twitter_oauth_token_secret,
            );

            $twitter_config = get_config('twitter');

            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'], $verifier['oauth_token'], $verifier['oauth_token_secret']);
            $status = $connection->post('statuses/update', array(
                'status'       => $tweet->text,
            ));
            return $status;
        }
        return false;
    }

}

$cron = new Cron();
$cron->post_tweets();