<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Google_login extends MY_Controller {
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
        $this->load->view('google_login/index');
    }

    public function saveUserData() {
        
        // Preparing data for database insertion
        /*--- String To Array ---*/ 
        $fullname  = $this->input->post('name');
        $name = explode(" ",$fullname);
        /*--- End Of String To Array ---*/ 
        $userData['cust_oauth_provider']        = 'Google';
        $userData['cust_oauth_uid']             = $this->input->post('googleIdTocken');
        $userData['cust_fname']                 = $name[0];
        $userData['cust_lname']                 = $name[1];
        $userData['cust_email']                 = $this->input->post('email');
        $userData['cust_status']                = '0';
        $userData['cust_EmailVerifiedStatus']   = '0';
        print_r($userData);die;
        // Insert or update user data
        $userID = $this->Account->checkGoogleUser($userData);
        // Set User Session
        $this->session->set_userdata('logged_in_customer',$userID);
        
        return true;
    }
}