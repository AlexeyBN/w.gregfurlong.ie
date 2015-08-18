<?php
class Users_Model extends ActiveRecord\Model{

    const USER_TYPE_BY_EMAIL        = 2;
    const USER_TYPE_TWITTER         = 3;
    const USER_TYPE_HAS_TWITTER     = 4;

    static private $current_user = false;

    static $table_name = 'users';
    static $has_many = array(
        array('usermeta', 'foreign_key' => 'user_id', 'class_name' => 'Usermetum'),
        array('tweets', 'foreign_key' => 'user_id', 'class_name' => 'Tweets_Model'),
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

    static function is_loged_in()
    {
        return isset($_SESSION['login']) && $_SESSION['login']['user_id'];
    }

    static function get_current_user()
    {
        return self::$current_user;
    }

    static function set_current_user($current_user = false)
    {
        self::$current_user = $current_user;
    }

    static function has_twitter_account()
    {
        $current_user = self::get_current_user();
        return $current_user && $current_user->type == self::USER_TYPE_HAS_TWITTER && ($current_user->twitter_oauth_token !== NULL && $current_user->twitter_oauth_token_secret !== NULL);
    }


    static function is_twitter_account()
    {
        $current_user = self::get_current_user();
        return $current_user && $current_user->type == self::USER_TYPE_TWITTER;
    }

    function get_twitter_favorites()
    {
        $current_user = self::get_current_user();
        if ($current_user && ($current_user->type == self::USER_TYPE_HAS_TWITTER || $current_user->type == self::USER_TYPE_TWITTER)) {
            switch ($current_user->type) {
                case self::USER_TYPE_HAS_TWITTER:
                    $verifier = array(
                        'oauth_token' => $current_user->twitter_oauth_token,
                        'oauth_token_secret' => $current_user->twitter_oauth_token_secret,
                    );
                    break;
                case self::USER_TYPE_TWITTER:
                    $verifier = $_SESSION['login']['oauth_verifier'];
                    break;
                default:
                    return false;
                    break;
            }

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

    function get_all_tweets()
    {
        $current_user = self::get_current_user();
        if ($current_user && ($current_user->type == self::USER_TYPE_HAS_TWITTER || $current_user->type == self::USER_TYPE_TWITTER)) {
            switch ($current_user->type) {
                case self::USER_TYPE_HAS_TWITTER:
                    $verifier = array(
                        'oauth_token' => $current_user->twitter_oauth_token,
                        'oauth_token_secret' => $current_user->twitter_oauth_token_secret,
                    );
                    break;
                case self::USER_TYPE_TWITTER:
                    $verifier = $_SESSION['login']['oauth_verifier'];
                    break;
                default:
                    return false;
                    break;
            }
            $twitter_config = get_config('twitter');
            require_once (ABSPATH . "/includes/plugins/twitter/twitteroauth.php");
            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'], $verifier['oauth_token'], $verifier['oauth_token_secret']);
            $tweets = $connection->get('statuses/user_timeline', array(
                'user_id'       => $verifier['user_id'],
                'screen_name'   => $verifier['screen_name'],
            ));
            return $tweets;
        }
        return false;
    }

    static function attach_twitter_account ($redirect_url)
    {
        $response = array(
            'status' => false,
        );
        if (!self::is_loged_in()) {
            $response = array(
                'status'    => 'redirect_error',
                'url'       => base_url('login'),
                'message'   => 'User is not logged in.',
            );
        }

        require_once (ABSPATH . "/includes/plugins/twitter/twitteroauth.php");
        $tokens = $_SESSION['tokens'];
        $twitter_config = get_config('twitter');

        if ($tokens === null) {
            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret']);
            $request_token = $connection->getRequestToken($redirect_url);
            $_SESSION['tokens'] = array(
                'oauth_token'        => $request_token['oauth_token'],
                'oauth_token_secret' => $request_token['oauth_token_secret'],
            );
            switch ($connection->http_code) {
                case 200:
                    $url = $connection->getAuthorizeURL($request_token['oauth_token']);
                    $response = array(
                        'status'    => 'redirect',
                        'url'       => $url,
                    );
                    return $response;
                    break;
                default:
                    $response = array(
                        'status'    => 'error',
                        'message'   => 'Could not connect to Twitter. Refresh the page or try again later.',
                    );
                    return $response;
                    break;
            }
        } else {
            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'],$tokens['oauth_token'], $tokens['oauth_token_secret']);
            $oauth_verifier = $connection->getAccessToken($_REQUEST['oauth_verifier']);

            $current_user = self::get_current_user();
            $current_user->twitter_oauth_token = $oauth_verifier['oauth_token'];
            $current_user->twitter_oauth_token_secret = $oauth_verifier['oauth_token_secret'];
            $current_user->type = self::USER_TYPE_HAS_TWITTER;
            $current_user->save();

            $response = array(
                'status'    => 'success',
                'url'       => base_url('Twitter'),
            );
        }

        return $response;
    }

    function token_is_expired()
    {
        require_once (ABSPATH . "/includes/plugins/twitter/twitteroauth.php");
        $tokens = array(
            'oauth_token' => $this->twitter_oauth_token,
            'oauth_token_secret' => $this->twitter_oauth_token_secret,
        );
        $twitter_config = get_config('twitter');
        $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'],$tokens['oauth_token'], $tokens['oauth_token_secret']);
        $user_info = $connection->get('account/verify_credentials');
        return isset($user_info->error) || isset($user_info->errors);
    }

    function update_token($redirect_url)
    {
        require_once (ABSPATH . "/includes/plugins/twitter/twitteroauth.php");
        if ($this->token_is_expired() && $this->type == self::USER_TYPE_HAS_TWITTER) {
            $tokens = $_SESSION['tokens'];
            $twitter_config = get_config('twitter');
            if ($tokens === null) {
                $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret']);
                $request_token = $connection->getRequestToken($redirect_url);
                $_SESSION['tokens'] = array(
                    'oauth_token'        => $request_token['oauth_token'],
                    'oauth_token_secret' => $request_token['oauth_token_secret'],
                );
                switch ($connection->http_code) {
                    case 200:
                        $url = $connection->getAuthorizeURL($request_token['oauth_token']);
                        redirect($url);
                        break;
                    default:
                        break;
                }
            } else {
                $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'],$tokens['oauth_token'], $tokens['oauth_token_secret']);
                $oauth_verifier = $connection->getAccessToken($_REQUEST['oauth_verifier']);
                $this->twitter_oauth_token        = $oauth_verifier['oauth_token'];
                $this->twitter_oauth_token_secret = $oauth_verifier['oauth_token_secret'];
                $this->save();
            }
        }
    }

    static function create_twitter_account($redirect_url)
    {
        $response = array(
            'status' => false,
        );
        if (isset($_SESSION['login'])) unset ($_SESSION['login']);

        require_once (ABSPATH . "/includes/plugins/twitter/twitteroauth.php");
        $tokens = $_SESSION['tokens'];
        $twitter_config = get_config('twitter');
        if ($tokens === null) {

            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret']);

            $request_token = $connection->getRequestToken($redirect_url);

            $_SESSION['tokens'] = array(
                'oauth_token'        => $request_token['oauth_token'],
                'oauth_token_secret' => $request_token['oauth_token_secret'],
            );

            switch ($connection->http_code) {

                case 200:

                    $url = $connection->getAuthorizeURL($request_token['oauth_token']);
                    $response = array(
                        'status'    => 'redirect',
                        'url'       => $url,
                    );
                    return $response;
                    break;

                default:
                    $response = array(
                        'status'    => 'error',
                        'message'   => 'Could not connect to Twitter. Refresh the page or try again later.',
                    );
                    return $response;
                    break;
            }
        } else {

            $connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'],$tokens['oauth_token'], $tokens['oauth_token_secret']);

            $oauth_verifier = $connection->getAccessToken($_REQUEST['oauth_verifier']);

            // Let's get the user's info

            $user_info = $connection->get('account/verify_credentials');
            $followers = $user_info->followers_count;

            // Print user's info

            if(isset($user_info->error) || isset($user_info->errors)){

                // Something's wrong, go back to square 1

                $response = array(
                    'status'    => 'redirect_error',
                    'url'       => base_url('login'),
                    'message'   => $user_info->error,
                );
                return $response;

            } else {

                $user = Users_Model::find_by_email($user_info->id);

                if(sizeof($user)<=0){

                    $user = new Users_Model();

                }

                $user->first_name = $user_info->screen_name;

                $user->last_name = $user_info->screen_name;

                $user->email = $user_info->id;
                $user->type  = self::USER_TYPE_TWITTER;

                $user->registration_date = date("Y-m-d H:i:s");

                $user->save();

                /**

                 * Update social meta key

                 */

                $UserMeta = Usermetum::find_by_user_id_and_meta_key_and_meta_value( $user->user_id,'social_type','twitter');

                if( sizeof($UserMeta)<=0){

                    $UserMeta = new Usermetum();

                }

                $UserMeta->user_id = $user->user_id;

                $UserMeta->meta_key = 'social_type';

                $UserMeta->meta_value = 'twitter';

                $UserMeta->save();


                /**

                 * Update social meta value

                 */


                $UserMeta = Usermetum::find_by_user_id_and_meta_key_and_meta_value( $user->user_id,'social_id',$user_info->id );

                if( sizeof($UserMeta)<=0){

                    $UserMeta = new Usermetum();

                }

                $UserMeta->user_id = $user->user_id;

                $UserMeta->meta_key = 'social_id';

                $UserMeta->meta_value = $user_info->id;

                $UserMeta->save();


                /**
                 * Save twitter user meta
                 */

                $UserMeta = Usermetum::find('first', array(
                    'user_id'   => $user->user_id,
                    'meta_key'  => 'twitter_meta',
                ));

                if( sizeof($UserMeta)<=0){

                    $UserMeta = new Usermetum();

                }

                $UserMeta->user_id = $user->user_id;

                $UserMeta->meta_key = 'twitter_meta';

                $UserMeta->meta_value = serialize($user_info);

                $UserMeta->save();

                /**

                 * Update graph table content

                 */

                $graph = Graph::find_by_user_id_and_date($user->user_id , date("Y-m-d"));

                if( sizeof($graph) <= 0) {

                    $graph = new Graph();

                    $graph->user_id = $user->user_id;

                    $graph->followers = $followers;

                    $graph->social = 10;

                    $graph->webclicks = 10;

                    $graph->coupon = 10;

                    $graph->date = date("Y-m-d");

                    $graph->save();
                } else {

                    $graph->followers = $followers;

                    $graph->save();

                }

                // see if we have a session

                $_SESSION['login'] = array(

                    'user_id' => $user->user_id,

                    'email' => $user_info->id,

                    'user_level' => 1,

                    'first_name' => $user_info->screen_name,

                    'last_name' => $user_info->screen_name,

                    'social_type' => 'twitter',

                    'oauth_verifier' => $oauth_verifier,

                );

                $response = array(
                    'status'    => 'success',
                    'url'       => base_url('Twitter'),
                );
            }

        }
        return $response;
    }

    public static function login()
    {
        if(isset($_POST['email']) && isset($_POST['password'])) {

            $users = Users_Model::find_by_email_and_pass_and_active($_POST['email'], MD5($_POST['password']), NULL);

            if( sizeof( $users ) > 0 ){

                $userdata = array(

                    'user_id' => $users->user_id,

                    'email' => $users->email,

                    'user_level' => $users->user_level,

                    'first_name' => $users->first_name,

                    'last_name' => $users->last_name,

                    'account_type' => $users->type

                );

                $_SESSION['login'] = $userdata;
                return true;

            }else{
                return false;
            }
        }
    }
}