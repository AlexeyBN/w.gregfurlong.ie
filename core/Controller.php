<?php
/**
 * Created by PhpStorm.
 * User: HuuHien
 * Date: 5/15/2015
 * Time: 9:20 PM
 */

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

class Controller {

    private static $instance;
    public $menu_active = 'home';
    public $submenu_active = 'home';
    public $admin_menus = null;
    public $page_title = 'Codeigniter CMS';
    public $site_title = 'Codeigniter CMS';
    public $_js_variables = array();
    /**
     * array ('type' => admin | front, 'file' => 'script.js', 'location' => header | footer)
     * @var array
     */
    public $_js = array();
    /**
     * array ('type' => admin | front, 'file' => 'style.css')
     * @var array
     */
    public $_css = array();

    public function __construct()
    {
        self::$instance =& $this;
        $this->load = new Loader();
        $this->load->library('Session');
        $this->session = new Session();
        $this->load->helper('config');
        $this->load->helper('url');
        $this->load->model('Users_Model');

        if ($login_info = $_SESSION['login']) {
            Users_Model::set_current_user(Users_Model::first(array('user_id' => $login_info['user_id'])));
        }

        if (!Users_Model::is_loged_in()) {
            $uri = $this->load->get_uri();
            if ($uri[0] != 'login' && $uri[0] != 'logout' && current_url() != base_url()) {
                redirect(base_url('/'));
            }
        }
    }

    public static function &get_instance()
    {
        return self::$instance;
    }

    function view_front($dis, $include = true){
        $dis['this'] = $this;
        $dis['page_title'] = $this->page_title;
        $dis['site_title'] = $this->site_title;
        $admin_login = $this->session->userdata('login');
        $dis['userlogin'] = Users_Model::find_by_user_id( $admin_login['user_id'] );
        $dis['js_variables'] = $this->_js_variables;
        $dis['js_scripts'] = $this->_js;
        $dis['csses'] = $this->_css;

        if (!isset($dis['menu_active']) || empty($dis['menu_active'])) {
            $dis['menu_active'] = $this->menu_active;
        }
        if( $include ) {
            $this->load->view('front/init/header', $dis);
            $this->load->view('front/'.$dis['view'],$dis);
            $this->load->view('front/init/footer',$dis);
        }else{
            $this->load->view($dis['view'], $dis );
        }
    }
    function view_admin($dis, $include = true){
        $dis['base_url'] = BASE_URL;
        $dis['this'] = $this;
        $dis['page_title'] = $this->page_title;
        $dis['site_title'] = $this->site_title;
        $dis['js_variables'] = $this->_js_variables;
        $dis['js_scripts'] = $this->_js;
        $dis['csses'] = $this->_css;
        $admin_login = $this->session->userdata('login');
        $this->load->model('Users_Model');
        if( empty( $admin_login ) ) redirect( BASE_URL."Users/login");
        $dis['userlogin'] = Users_Model::find_by_user_id( $admin_login['user_id'] );

        if (!isset($dis['menu_active']) || empty($dis['menu_active'])) {
            $dis['menu_active'] = $this->menu_active;
        }
        if( $include ) {
            $this->load->view('dashboard/init/header', $dis);
            $this->load->view('dashboard/init/menu');
            $this->load->view('dashboard/'.$dis['view']);
            $this->load->view('dashboard/init/footer');
        }else{
            $this->load->view($dis['view'], $dis );
        }
    }

    public function layout($type = '', $views = '', $data = array())
    {
        $dis['base_url']        = BASE_URL;
        $dis['this']            = $this;
        $dis['page_title']      = $this->page_title;
        $dis['site_title']      = $this->site_title;
        $dis['js_variables']    = $this->_js_variables;
        $dis['js_scripts']      = $this->_js;
        $dis['csses']           = $this->_css;
        $login                  = $this->session->userdata('login');

        $this->load->model('Users_Model');
        $dis['userlogin'] = Users_Model::find_by_user_id( $login['user_id'] );

        if (!isset($dis['menu_active']) || empty($dis['menu_active'])) {
            $dis['menu_active'] = $this->menu_active;
        }

        $data = array_merge($dis, $data);

        $this->load->view("layout/$type/header", $data);
        $this->load->view($views, $data);
        $this->load->view("layout/$type/footer", $data);
    }

    /**
     * Return is ajax request
     * @return bool
     */
    public function is_ajax()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest");
    }
}