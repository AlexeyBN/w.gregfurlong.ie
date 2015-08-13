<?php

/**

 * Created by PhpStorm.

 * User: HuuHien

 * Date: 5/14/2015

 * Time: 6:28 AM

 */

//require 'functions.php';

use Facebook\FacebookSession;

use Facebook\FacebookRedirectLoginHelper;

use Facebook\FacebookRequest;

use Facebook\FacebookResponse;

use Facebook\FacebookSDKException;

use Facebook\FacebookRequestException;

use Facebook\FacebookAuthorizationException;

use Facebook\GraphObject;

use Facebook\Entities\AccessToken;

use Facebook\HttpClients\FacebookCurlHttpClient;

use Facebook\HttpClients\FacebookHttpable;

class Users extends Controller{

    public $hybridauth;

    public function __construct(){

        parent::__construct();

        $this->load->model('Users_Model');
        $this->load->helper('url');

        // init app with app id and secret

        FacebookSession::setDefaultApplication( '638909079579449','d4066e645f9db3d0fa962f0c6e0096c7' );

        $config_file_path = ABSPATH.'includes/plugins/hybridauth/config.php';



        require_once( ABSPATH.'includes/plugins/twitter/OAuth.php' );

        require_once( ABSPATH.'includes/plugins/twitter/twitteroauth.php' );



        //$this->hybridauth = new Hybrid_Auth( $config_file_path );

    }

    public function index()

    {

        $dis = array();

        $dis['view'] = 'init/home';

        $this->view_front( $dis );

    }

    public function payment()
    {
        $dis = array();

        $dis['view'] = 'users/payment';

        $this->view_front( $dis );
    }

    public function login( $social = NULL ){

        $dis = array();

        if( $social != NULL ){

            switch( $social ){

                case "facebook":

                    $helper = new FacebookRedirectLoginHelper('http://w.gregfurlong.ie/login/facebook/' );

                    $session = $helper->getSessionFromRedirect();

                    $userdata = $this->session->userdata('check_login');

                    if ( isset( $session ) && $userdata ) {

                        // graph api request for user data

                        $request = new FacebookRequest( $session, 'GET', '/me' );

                        $response = $request->execute();

                        // get response

                        $graphObject = $response->getGraphObject();

                        $user = Users_Model::find_by_email($graphObject->getProperty('email'));

                        if(sizeof($user)<=0){

                            $user = new Users_Model();

                        }

                        $user->first_name = $graphObject->getProperty('first_name');

                        $user->last_name = $graphObject->getProperty('last_name');

                        $user->email = $graphObject->getProperty('email');

                        $user->registration_date = date("Y-m-d H:i:s");

                        $user->save();

                        /**

                         * Update social meta key

                         */

                        $UserMeta = Usermetum::find_by_user_id_and_meta_key_and_meta_value( $user->user_id,'social_type','facebook');

                        if( sizeof($UserMeta)<=0){

                            $UserMeta = new Usermetum();

                        }

                        $UserMeta->user_id = $user->user_id;

                        $UserMeta->meta_key = 'social_type';

                        $UserMeta->meta_value = 'facebook';

                        $UserMeta->save();



                        /**

                         * Update social meta value

                         */



                        $UserMeta = Usermetum::find_by_user_id_and_meta_key_and_meta_value( $user->user_id,'social_id',$graphObject->getProperty('id') );

                        if( sizeof($UserMeta)<=0){

                            $UserMeta = new Usermetum();

                        }

                        $UserMeta->user_id = $user->user_id;

                        $UserMeta->meta_key = 'social_id';

                        $UserMeta->meta_value = $graphObject->getProperty('id');

                        $UserMeta->save();

                        // see if we have a session

                        $userdata = array(

                            'user_id' => $user->user_id,

                            'email' => $graphObject->getProperty('email'),

                            'user_level' => 1,

                            'first_name' => $graphObject->getProperty('first_name'),

                            'last_name' => $graphObject->getProperty('last_name'),

                        );

                        $this->session->set_userdata('login', $userdata);

                        redirect( BASE_URL."Dashboard" );

                    } else {

                        $permissions = array(

                            'publish_actions',

                            'email',

                            'user_location',

                            'user_birthday',

                            'user_likes',

                            'public_profile',

                            'user_friends'

                        );

                        $this->session->set_userdata('check_login', true);

                        $loginUrl = $helper->getLoginUrl($permissions);

                        redirect($loginUrl);

                    }

                    break;

                case "twitter":

                    if( !isset( $_SESSION['oauth_token'] ) ) {

                        $connection = new TwitterOAuth('rroVKOhzUkPxAN3pweL8jCsEN', 'u80Q7SN5d9Br0QW35o5W026iCiDOGHrQigbp8uhvVCCBbYzHrz');

                        $request_token = $connection->getRequestToken(base_url('login/twitter'));

                        $_SESSION['oauth_token'] = $token = $request_token['oauth_token'];

                        $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

                        switch ($connection->http_code) {

                            case 200:

                                $url = $connection->getAuthorizeURL($request_token['oauth_token']);

                                header('Location: ' . $url);

                                break;

                            default:

                                $error = 'Could not connect to Twitter. Refresh the page or try again later.';

                        }

                    }else{

                        $connection = new TwitterOAuth('rroVKOhzUkPxAN3pweL8jCsEN', 'u80Q7SN5d9Br0QW35o5W026iCiDOGHrQigbp8uhvVCCBbYzHrz',$_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

                        $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

                        // Save it in a session var

                        $_SESSION['access_token'] = $access_token;

                        // Let's get the user's info

                        $user_info = $connection->get('account/verify_credentials');


                        $followers = sizeof($connection->get('followers/ids' , array('screen_name' => $user_info->screen_name)));

                        // Print user's info

                        if(isset($user_info->error)){

                            // Something's wrong, go back to square 1

                            header(sprintf('Location: %s', base_url('login/twitter')));

                        } else {

                            $user = Users_Model::find_by_email($user_info->id);

                            if(sizeof($user)<=0){

                                $user = new Users_Model();

                            }

                            $user->first_name = $user_info->screen_name;

                            $user->last_name = $user_info->screen_name;

                            $user->email = $user_info->id;

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

                            $userdata = array(

                                'user_id' => $user->user_id,

                                'email' => $user_info->id,

                                'user_level' => 1,

                                'first_name' => $user_info->screen_name,

                                'last_name' => $user_info->screen_name,

                            );

                            $this->session->set_userdata('login', $userdata);

                            redirect( BASE_URL."Dashboard" );

                        }

                    }


                    $dis['message'] = '<p class="error">'.$error.'</p>';

                    break;
            }

        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

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

                $this->session->set_userdata('login', $userdata);

                redirect( BASE_URL."Dashboard");

            }else{

                $dis['message'] = '<p class="error">The email or password do not match those on file. Or you have not activated your account.</p>';

            }



        }

        $dis['view'] = 'users/login';

        $this->view_front( $dis );

    }

    public function singup(){

        $dis = array();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = Users_Model::find_by_email($_POST['email']);

            if( sizeof( $user ) > 0){

                $dis['mes'] = '<p class="error">The email was already used previously. Please use another email address.</p>';

            }else{

                $active = MD5(time());

                $user = new Users_Model();

                $account_type = $_POST['account_type'];

                $user->first_name = $_POST['first_name'];

                $user->last_name = $_POST['last_name'];

                $user->email = $_POST['email'];

                $user->pass = MD5($_POST['password1']);

                $user->active = $active;

                $user->registration_date = date("Y-m-d H:i:s");

                if($account_type == "customer") {

                    $user->type = 1;

                } else {

                    $user->type = 2;
                    $user->company = $_POST['company_name'];

                }

                $user->save();

                $body = "Thank you for registering izCMS page. An activation email has been sent to the email address you provided. Session you click the link to activate your account \n\n ";

                $body .= BASE_URL . "users/active/".str_replace("'", "", $active);

                if(mail( $_POST['email'], 'Activate account at izCMS', $body, 'FROM: localhost')) {

                    $message = "<p class='success'>Your account has been successfully registered. Email has been sent to your address. You must click the link to activate your account before using it.</p>";

                } else {

                    $message = "<p class='error'>Can not send an email to you. We apologize for this inconvenience.</p>";

                }

                $dis['mes'] = $message;



            }

        }



        $dis['view'] = 'users/singup';

        $this->view_front( $dis );

    }

    function logout(){

        $this->session->unset_userdata( 'login' );

        $_SESSION['oauth_token'] = NULL;

        redirect( BASE_URL );

    }

    function forgot(){

        $dis = array();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = Users_Model::find_by_email($_POST['email']);

            if( sizeof($user) > 0 ) {

                $user->user_key = md5( $_POST['email'] );

                $subject = 'Please reset your password';

                $to = $_POST['email'];

                $body = "<p>We heard that you lost your password. Sorry about that!</p>



<p>But don't worry! You can use the following link within the next day to reset your password:</p>



<p>".base_url()."change-password/".md5($to) ."</p>



<p>If you don't use this link within 24 hours, it will expire. To get a new password reset link, visit ".base_url()."forgot</p>



<p>Thanks,<br />

Your friends</p>";

                mail($to, $subject, $body);

                $dis['message'] = '<p class="success">We\'ve sent you an email containing a link that will allow you to reset your password for the next 24 hours.<br ><br >

                                                      Please check your spam folder if the email doesn\'t appear within a few minutes.</p>';

            }else{

                $dis['message'] = '<p class="error">Can\'t find that email, sorry.</p>';

            }

        }

        $dis['view'] = 'users/forgot';

        $this->view_front( $dis );

    }

    function active( $active){

        $dis = array();

        $user = Users_Model::find_by_active($active);

        $user->active = NULL;

        $user->save();

        // $message = '<p class="success">Your acccount has been activated successfully. You may <a href="'.base_url().'login">login </a> now.</p>';
        $message = '<p class="success">Your acccount has been activated successfully. You may <a href="'.BASE_URL.'login">login </a> now.</p>';

        $dis['message'] = $message;

        $dis['view'] = 'users/active';

        $this->view_front( $dis );

    }

    function close( $close){

        $dis = array();

        $users = Users_Model::find('all',array('active' => $close));

        foreach ($users as $user) {

            $user->delete();

        }

        $message = '<p class="success">Your acccount has been deleted successfully.You may <a href="'.BASE_URL.'singup">Sign Up </a> now.</p>';

        $dis['message'] = $message;

        $dis['view'] = 'users/close';

        $this->view_front( $dis );

    }

    function change_password( $user_id = '' ){

        $dis = array();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //if ($_SESSION['captcha'] == $this->input->post('captcha')) {

                $user = Users_Model::find_by_user_id($user_id);

                $user->pass = md5($_POST['pass']);

                $user->user_key = '';

                $user->save();

                $dis['message'] = '<p class="success">Change password success!</p>';

            /*} else {

                $dis['message'] = '<p class="error">The Captcha not math!</p>';

            }*/

        }

        $dis['view'] = 'users/change-password';

        $this->view_front($dis);

    }

    function myaccount(){

        $this->load->library('Upload');

        $dis = array();

        $admin_login = $this->session->userdata('login');

        if( !empty( $admin_login ) ) {

            $user = Users_Model::find_by_user_id($admin_login['user_id']);

            $dis['user'] = $user;

        }else{

            redirect(BASE_URL."login");

        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if( isset( $_FILES['avatar'] )) {

                @move_uploaded_file( $_FILES['avatar']['tmp_name'],'uploads/avatars/'.$_FILES['avatar']['name']);

                $user->avatar = 'uploads/avatars/'.$_FILES['avatar']['name'];

            }

            $user->first_name = $_POST['first_name'];

            $user->last_name = $_POST['last_name'];

            $user->email = $_POST['email'];

            $user->website = $_POST['website'];

            $user->bio = $_POST['bio'];

            $user->save();

            $dis['mes'] = '<p class="success">Update success!</p>';

        }

        $dis['view'] = 'users/profile';

        $this->view_front($dis);

    }

    function settings(){

        $dis = array();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $active = MD5(time());

            $admin_login = $this->session->userdata('login');

            $user = Users_Model::find_by_user_id($admin_login['user_id']);

            if($user->type == 2) {

                $user->delete();

                $message = "<p class='success'>Your account was successfully closed.</p>";
                $dis['mes'] = $message;

            } elseif ($user->type == 1) {

                $user->active = $active;

                $user->save();

                $users_in_company = Users_Model::find('all',array('company' => $user->email));

                foreach ($users_in_company as $customer) {

                    $customer->active = $active;

                    $customer->save();

                }

                $admin_user = Users_Model::find_by_type(0);

                $body = "You are about to close your account. An activation email has been sent to the email address you provided. Session you click the link to Close your account \n\n ";

                $body .= BASE_URL . "users/close/".str_replace("'", "", $active);

                if(mail( $admin_user->email, 'Close account at izCMS', $body, 'FROM: localhost')) {

                    $message = "<p class='success'>Email has been sent to your address. You must click the link to close your account.</p>";

                } else {

                    $message = "<p class='error'>Can not send an email to you. We apologize for this inconvenience.</p>";

                }

                $dis['mes'] = $message;

            } else {
                $message = "<p class='error'>You are the administrator. Your account can't be closed !!!</p>";
                $dis['mes'] = $message;
            }

        }

        $dis['view'] = 'users/settings';

        $this->view_front($dis);

    }

}