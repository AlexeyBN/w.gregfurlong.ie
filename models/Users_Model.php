<?php
class Users_Model extends ActiveRecord\Model{
    static $table_name = 'users';
    static $has_many = array(
        array('usermeta', 'foreign_key' => 'user_id', 'class_name' => 'Usermetum'),
    );

    function get_usermeta($meta_key = false)
    {
        if (!$meta_key) return false;

        foreach ($this->usermeta as $usermeta) {
            if ($usermeta->meta_key == $meta_key) {
                $prepared_data = @unserialize($usermeta->meta_value);
                $usermeta->meta_value = $prepared_data !== FALSE? $prepared_data: $usermeta->meta_value;
                return $usermeta;
            }
        }
        return false;
    }

    static function get_current_user()
    {
        $login_info = isset($_SESSION['login'])? $_SESSION['login']: FALSE;

        if ($login_info) {
            return self::find_by_user_id( $login_info['user_id'] );
        }

        return FALSE;
    }

    static function is_twitter_account()
    {
        return isset($_SESSION['login']['social_type']) && $_SESSION['login']['social_type'] === 'twitter';
    }

    function get_twitter_favorites()
    {
        if (!isset($_SESSION['login']['oauth_verifier'])) return false;
        $verifier = $_SESSION['login']['oauth_verifier'];

        if (self::is_twitter_account()) {
            $twitter_config = get_config('twitter');
            require_once (ABSPATH . "/includes/plugins/twitter/twitteroauth.php");
            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'], $verifier['oauth_token'], $verifier['oauth_token_secret']);
            $favorites = $connection->get('favorites/list', array(
                'user_id'       => $verifier['user_id'],
                'screen_name'   => $verifier['screen_name'],
            ));
            return $favorites;
        }
        return false;
    }
}