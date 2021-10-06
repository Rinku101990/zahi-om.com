<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook_login extends MY_Controller {
    function __construct() 
    {
        parent::__construct();
        // Load user model
        $this->load->model('User');
        /* ========FOR LOGIN =========== */
		$this->cstid="cust_id"; 
		$this->cstemail="cust_email"; 		
		$this->customer="tbl_customer";
    }
    
    public function index(){
        // Load login & profile view
        $this->load->view('facebook_login/index');
    }

    public function saveUserData() {
        // Decode json data and get user profile data
        $postData = json_decode($_POST['userData']);
        
        // Preparing data for database insertion
        $userData['cust_oauth_provider']        = $_POST['oauth_provider'];
        $userData['cust_oauth_uid']             = $postData->id;
        $userData['cust_fname']                 = $postData->first_name;
        $userData['cust_lname']                 = $postData->last_name;
        $userData['cust_email']                 = $postData->email;
        $userData['cust_status']                = '0';
        $userData['cust_EmailVerifiedStatus']   = '0';
        // $userData['locale']           = $postData->locale;
        // $userData['cover']            = $postData->cover->source;
        // $userData['picture']          = $postData->picture->data->url;
        // $userData['link']             = $postData->link;
        // Insert or update user data
        $userID = $this->User->checkUser($userData);
        // Set User Session
        $this->session->set_userdata('logged_in_customer',$userID);
        
        return true;
    }
}