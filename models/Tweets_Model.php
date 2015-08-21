<?php
class Tweets_Model extends ActiveRecord\Model{
    static $table_name = 'tweets';
    static $belongs_to = array(
        array('user', 'foreign_key' => 'user_id', 'class_name' => 'Users_Model'),
    );

    const STATUS_NOT_SENDED = 0;
    const STATUS_SENDED     = 1;
    const STATUS_FILED      = 3;

    const TYPE_TIME         = 0;
    const TYPE_NOW          = 1;

    public function post_to()
    {
        $current_user = $this->user;
        require_once ABSPATH . "includes/plugins/twitter/twitteroauth.php";
        if ($current_user && ($current_user->type == Users_Model::USER_TYPE_HAS_TWITTER || $current_user->type == Users_Model::USER_TYPE_TWITTER)) {

            $verifier = array(
                'oauth_token' => $current_user->twitter_oauth_token,
                'oauth_token_secret' => $current_user->twitter_oauth_token_secret,
            );

            $twitter_config = get_config('twitter');

            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'], $verifier['oauth_token'], $verifier['oauth_token_secret']);
            $status = $connection->post('statuses/update', array(
                'status'       => $this->text,
            ));

            return $status;
        }
        return false;
    }

}