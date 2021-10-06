<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Api extends REST_Controller {
    
	/**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() 
    {
        parent::__construct();
        $this->load->library("security");
        $this->load->helper('common');
        $this->load->model("Api_model","API");
        /* --- FOR MOBILE BANNERS TABEL --- */ 			
        $this->bnrid="slr_id";	
        $this->banner="tbl_banner";
        /*--- COUNTRY TABLE ---*/ 
        $this->cntryid="cnt_id";
        $this->country="tbl_country";
        /*--- STATE TABLE ---*/ 
        $this->stsid="st_id";
        $this->state="tbl_state";
        /*--- CITY TABLE ---*/ 
        $this->ctyid="ct_id";
        $this->city="tbl_city";
        /* --- FOR ZIPCODE --- */
	    $this->zpid="zc_id";	 			
		$this->pincode="tbl_zipcode";	
		/*--- USERS TABLE ---*/
        $this->cid="cust_id";
        $this->cemail="cust_email";
        $this->upassword="cust_password";
        $this->customer="tbl_customer"; 
        /*--- CATEGORY TABLE ---*/
        $this->cateid="cate_id";
        $this->category='tbl_category';
        /*-- SUB CATEGORY TABLE --*/
        $this->scid="scate_id";
        $this->scategory="tbl_sub_category";
        /*-- CHILD CATEGORY TABLE --*/
        $this->chid="child_id";
        $this->child="tbl_child_category";
        /*--- Vendor as Brand ---*/
		$this->brdid="vnd_id"; 
		$this->vendors="tbl_vendor";
        /*--- Coupon Code ---*/
        $this->cpnid="cup_id";
        $this->coupon="tbl_coupon";
        /*--- Wishlist ---*/
        $this->wsid="id";
        $this->wspid="pid";
        $this->urid="user_id";
        $this->wishlist="tbl_wishlist";
        /*--- Cart ---*/ 
        $this->crtid="cart_id";
        $this->crtpid="pro_id";
        $this->cart="tbl_cart";
        /*--- Review ---*/
        $this->rwid="id";
        $this->rwpid="p_id";
        $this->review="tbl_cmnts_reviews";
        /*-- PRODUCT TABLE --*/
        $this->pid="p_id";
        $this->pchild="p_child";
        $this->product="tbl_product";
        /*--- FOR ORDERS ---*/
        $this->ordid="ord_id";
        $this->refId="ord_reference_no";
        $this->orders="tbl_orders";
        /*--- FOR ORDER PRODUCTS ---*/
        $this->opid="pord_id";
        $this->order_products="tbl_orders_product";
         /*--- FOR TAX ---*/
        $this->txt_id="txt_id";         
        $this->tax="tbl_tax";
        /*--- CMS TABLE ---*/ 
        $this->pgid="pg_id";
        $this->cms="tbl_page";
        /*--- SHIPPING ADDRESS --- */
		$this->shipid="fld_id";	 		 	 			
		$this->shipping="tbl_shipping_address";
        /*--- Notification ---*/ 		
        $this->ntid="notification_id";
        $this->ntrid="notification_receiver_id";
        $this->notification="tbl_notification";
        
    }
    
    /*--- GET CURRENT LANGUAGE ---*/ 
    public function currentUrl()
    {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
			$myCurrentUrl = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		}else{
			$myCurrentUrl = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		}
		$url = explode('/', $myCurrentUrl);
        if($url[2]=='en'){
            $language = $url[2];
            return $language;
        }else if($url[2]=='ar'){
            $language = $url[2];
            return $language;
        }else{
            return "";
        }
		
    }
    
    /**
     * Get All Banner from this method.
     *
     * @return Response
    */
    
    public function banners_get()
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            // ENGLISH RELATED RECORD
            $data = $this->API->getBannersList($this->bnrid,$this->banner);
            if(!empty($data)){
                $arrayData=array();
                foreach($data as $bnrsvalue){
                    $arrayData[]=array(
                        'slr_id'=>$bnrsvalue->slr_id,
                        'slr_img'=>base_url('admin/uploads/banner/').$bnrsvalue->slr_img,
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'banners list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
            // ARABIC RELATED RECORD
            $data = $this->API->getBannersList($this->bnrid,$this->banner);
            if(!empty($data)){
                $arrayData=array();
                foreach($data as $bnrsvalue){
                    $arrayData[]=array(
                        'slr_id'=>$bnrsvalue->slr_id,
                        'slr_img'=>base_url('admin/uploads/banner/').$bnrsvalue->slr_img,
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'banners list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'Invalid request.'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    public function country_get()
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            $data = $this->API->getCountryList($this->cntryid,$this->country);
            if(!empty($data)){
                $arrayData=array();
                
                foreach($data as $cntryvalue){
                    $arrayData[]=array(
                        'id'=>$cntryvalue->cnt_id,
                        'name'=>$cntryvalue->cnt_name
                    );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'Country list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
            
            $data = $this->API->getCountryList($this->cntryid,$this->country);
            if(!empty($data)){
                $arrayData=array();
                
                foreach($data as $cntryvalue){
                    $arrayData[]=array(
                        'id'=>$cntryvalue->cnt_id,
                        'name'=>$cntryvalue->cnt_name
                    );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'Country list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }
        
    }
    
    public function state_get($countryid=0)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
        
            if(!empty($countryid)){
                $data = $this->API->getStateList($this->cntryid,$countryid,$this->state);
                $arrayData=array();
                foreach($data as $statevalue){
                    $arrayData[]=array(
                        'id'=>$statevalue->st_id,
                        'name'=>$statevalue->st_name
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'state list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
        }
            
        }else if($lang=='ar'){
            
            if(!empty($countryid)){
                $data = $this->API->getStateList($this->cntryid,$countryid,$this->state);
                $arrayData=array();
                foreach($data as $statevalue){
                    $arrayData[]=array(
                        'id'=>$statevalue->st_id,
                        'name'=>$statevalue->st_name
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'state list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }
    }
    
    public function city_get($stateid=0)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            if(!empty($stateid)){
                $data = $this->API->getCityList($this->stsid,$stateid,$this->city);
                $arrayData=array();
                foreach($data as $cityvalue){
                    $arrayData[]=array(
                        'id'=>$cityvalue->ct_id,
                        'name'=>$cityvalue->ct_name
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'city list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
            
            if(!empty($stateid)){
                $data = $this->API->getCityList($this->stsid,$stateid,$this->city);
                $arrayData=array();
                foreach($data as $cityvalue){
                    $arrayData[]=array(
                        'id'=>$cityvalue->ct_id,
                        'name'=>$cityvalue->ct_name
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'city list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }
        
    }
    
    public function pincode_get($cityid=0)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            if(!empty($cityid)){
                $data = $this->API->getPincodeByCityId($this->ctyid,$cityid,$this->pincode);
                $arrayData=array();
                foreach($data as $pincodevalue){
                    $arrayData[]=array(
                        'id'=>$pincodevalue->zc_id,
                        'pincode'=>$pincodevalue->zc_zipcode
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $arrayData['pincode'] = $this->API->getPincodeList($this->zpid,$this->pincode);
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
            
            if(!empty($cityid)){
                $data = $this->API->getPincodeByCityId($this->ctyid,$cityid,$this->pincode);
                $arrayData=array();
                foreach($data as $pincodevalue){
                    $arrayData[]=array(
                        'id'=>$pincodevalue->zc_id,
                        'pincode'=>$pincodevalue->zc_zipcode
                    );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $arrayData['pincode'] = $this->API->getPincodeList($this->zpid,$this->pincode);
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }
            
        }
        
    }
	
	/**
     * USER LOGIN API
     * -------------
     * @param: username or email
     * @param: password
     * -------------
     * @method: POST
     * @link: api/login
    */ 
    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('devicetype', '', '');
        $this->form_validation->set_rules('devicetoken', '', '');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            
            // Load Login Function
            $mail = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $output = $this->API->user_login($mail,$password,$this->customer);
            
            if(!empty($output) AND $output != FALSE)
            {
               
                
                // before login update
                $uemail = $output->cust_email;
                $data = array(
                    'cust_device_type' => $this->input->post('devicetype'),
                    'cust_device_token' => $this->input->post('devicetoken'),
                    'cust_updated' => date('Y-m-d H:i:s')
                );
                 
                
                $updated=$this->API->update_last_login($this->cemail,$uemail,$data,$this->customer);
                
                // Generate Token
                $token_data['cust_id'] = $output->cust_id;
                $token_data['cust_fname'] = $output->cust_fname;
                $token_data['cust_lname'] = $output->cust_lname;
                $token_data['cust_email'] = $output->cust_email;
                $token_data['cust_status'] = $output->cust_status;
                $token_data['time'] = time();

                if($output->cust_status=='0' && $output->cust_EmailVerifiedStatus=='0'){
                    $return_data = [
                        'cust_id' => $output->cust_id,
                        'cust_fname' => $output->cust_fname,
                        'cust_lname' => $output->cust_lname,
                        'cust_email' => $output->cust_email,
                        'cust_phone_code' => $output->cust_phone_code,
                        'cust_phone' => $output->cust_phone,
                        'cust_profile' => $output->cust_profile,
                        'cust_gender' => $output->cust_gender,
                        'cust_dob' => $output->cust_dob,
                        'cust_country' => $output->cust_country,
                        'cust_state' => $output->cust_state,
                        'cust_city' => $output->cust_city,
                        'cust_status' => $output->cust_status,
                        'cust_device_type' => $this->input->post('devicetype'),
                        'cust_device_token' => $this->input->post('devicetoken')
                    ];
                    // Login Success
                    $message = [
                        'status' => true,
                        'data' => $return_data,
                        'message' => 'User Login Successfully'
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                     // Account not verified
                    $message = [
                        'status' => false,
                        'data' => $return_data,
                        'message' => 'email address not verified'
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }
            else
            {
                // Login Error
                $message = [
                    'status' => FALSE,
                    'message' => 'Invalid Username or Password'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }
    }
    
    /**
     * User Signup
     * -----------
     * @method: POST
     * @return Response
    */
    public function signup_post() 
    {
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        $this->form_validation->set_rules('phonecode', 'Area Code', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');

        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            // CHECK IF GIVEN EMAIL ID EXISTS
            $email=$this->input->post('email');
            $check = $this->API->check_email($this->cemail,$email,$this->customer);
            if($check > 0){
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'email address already in use.'
                );
                $this->response($message, REST_Controller::HTTP_OK);

            }else{
                
                // Insert user data
                $savedData = array(
                    'cust_fname'=>$this->input->post('fname'),
					'cust_lname'=>$this->input->post('lname'),
					'cust_email'=>$email,
					'cust_phone_code'=>$this->input->post('phonecode'),
					'cust_phone'=>$this->input->post('phone'),
					'cust_password'=>md5($this->input->post('password')),
					'cust_status'=>'1',
					'cust_EmailVerifiedStatus'=>'1',
                    'cust_ipaddress'=>$this->input->post('ipaddress'),
					'cust_updated'=>date('Y-m-d H:i:s'),
					'cust_created'=>date('Y-m-d H:i:s')
                );
                $saved = $this->API->save($savedData, $this->customer);
                /*--- SEND MAIL AFTER REGISTRATION ---*/ 
                if(!empty($email)){
    			    $template=template(1);
        			if(!empty($template)){
            			$company=company_detail();				
            			$url=base_url("api/verify?email=")."". $email;
            			$name=$this->input->post('fname').' '.$this->input->post('lname');
            			$token=array(
            				'Company_Logo'=>$company['Company_Logo'],
            				'website_url'=>$company['website_url'],
            				'social_media_icons'=>$company['social_media_icons'],
            				'website_name'=>$company['website_name'],
            				'user_full_name'=>$name,
            				'verification_url'=>$url,
            				'contact_us_url'=>$company['website_url']
            			 );
            			 $pattern = '{%s}';
            			foreach($token as $key=>$val){
            				$varMap[sprintf($pattern,$key)] = $val;
            			}			
                        $get_msg=strtr($template->tp_body,$varMap);
            		    $subject=strtr($template->tp_subject,$varMap);	
            			$to=$email; 
            			email_send($to,$subject,$get_msg);
        			}
			    }
                /*-- CHECK IF THE USER DATA SAVED OR NOT ---*/
                if($saved){
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'success. verification link send on your email address',
                        'data' => $savedData
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }
        }
    }
    
    
    /**
     * Verify_email
     * -----------
     * @method: GET
     * @return Response
    */

    public function verify_get() 
    {
        $cust_email=$this->input->get('email');
		$check =$this->API->check_email($this->cemail,$cust_email,$this->customer);	
        //print_r($cust_email);die;
		if($check->cust_status=='1' && $check->cust_EmailVerifiedStatus=='1'){	
    		$data=array(
    			'cust_status'=>'0',
    			'cust_EmailVerifiedStatus'=>'0',
    			'cust_updated'=>date('Y-m-d H:i:s')
    		); 

            // start email
			if(!empty($cust_email)){
    			$template=template(8);
    			if(!empty($template)){
        			 $company=company_detail();		
        			 $token=array(
        				'Company_Logo'=>$company['Company_Logo'],
        				'website_url'=>$company['website_url'],
        				'social_media_icons'=>$company['social_media_icons'],
        				'website_name'=>$company['website_name'],
        				'user_full_name'=>$check->cust_fname.' '.$check->cust_lname,			
        				'contact_us_url'=>$company['website_url'],
        				'contact_us_email'=>$company['contact_us_email']
        			 );
    			    $pattern = '{%s}';
        			foreach($token as $key=>$val){
        				$varMap[sprintf($pattern,$key)] = $val;
        			}			
                    $get_msg=strtr($template->tp_body,$varMap);
        		    $subject=strtr($template->tp_subject,$varMap);	
        			$to=$cust_email;             		
        			email_send($to,$subject,$get_msg);
    			}
    		}
		    // end email 		
		    $result=$this->API->update($this->cemail,$cust_email,$data,$this->customer);
            if($result){
                $message = array(
                    'status' => TRUE,
                   'message' => 'Your account has been verified.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'Some problems occurred, please try again.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
		}else{
            // Set the response and exit
            $message = array(
                'status' => FALSE,
                'message' => 'Email address already verified.'
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    /**
     * Profile Detail
     * -----------
     * @method: GET
     * @return Response
    */

    public function profile_get() 
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            $email=$this->input->get('email');
            $result = $this->API->get_profile($email,$this->customer);
            if($result){
                // Set the response and exit
                $message = array(
                    'status' => TRUE,
                    'data' => $result
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'Invalid request.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
          
            $email=$this->input->get('email');
            $result = $this->API->get_profile($email,$this->customer);
            if($result){
                // Set the response and exit
                $message = array(
                    'status' => TRUE,
                    'data' => $result
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'Invalid request.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }
    }
    
    
    /**
     * User Profile Update
     * -----------
     * @method: POST
     * @return Response
    */

    public function profileupdate_post() 
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('cust_id', 'User Id', 'trim|required');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('phonecode', 'Area Code', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   
            $uid=$this->input->post('cust_id');
            $data=array(
                'cust_fname'=>$this->input->post('fname'),
                'cust_lname'=>$this->input->post('lname'),
                'cust_gender'=> $this->input->post('gender'),
                'cust_phone_code'=> $this->input->post('phonecode'),
                'cust_phone'=> $this->input->post('phone'),
                'cust_updated'=>date('Y-m-d H:i:s') 
            );   
            $update = $this->API->update($this->cid,$uid,$data,$this->customer);
            
           if($update){
                      
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'Profile has been successful updated.',
                        // 'ord_id' => $orderReferenceID
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
                

            
        }
    }
    
    /**
     * User Order List
     * -----------
     * @method: GET
     * @return Response
    */
    public function orderlist_get($custid=0)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            if(!empty($custid)){
                $oderlist = $this->API->getOrderList($this->cid,$custid,$this->orders);
                if(!empty($oderlist)){
                    // Set the response and exit
                    $message = array(
                        'orderlist' => $oderlist
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'no record found.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $message = array(
                    'status' => FALSE,
                    'message' => 'Invalid request.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
            
            if(!empty($custid)){
                $oderlist = $this->API->getOrderList($this->cid,$custid,$this->orders);
                if(!empty($oderlist)){
                    // Set the response and exit
                    $message = array(
                        'orderlist' => $oderlist
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'no record found.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $message = array(
                    'status' => FALSE,
                    'message' => 'Invalid request.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }
        
    }
    
    /**
     * User Order Detail
     * -----------
     * @method: GET
     * @return Response
    */
    public function orderdetail_get($custid=0, $ordid=0)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            if(!empty($custid) && !empty($ordid)){
                $ordInfo = $this->API->getOrderDetail($this->cid,$custid,$this->ordid,$ordid,$this->orders);
                if(!empty($ordInfo) || !empty($orderProductList)){
                    $orderProductList = $this->API->getPurchasedProductList($this->ordid,$ordid,$this->order_products);
                    // Set the response and exit
                    $message = array(
                        'orderInfo' => $ordInfo,
                        'orderProductList' => $orderProductList
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'no record found.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $message = array(
                    'status' => FALSE,
                    'message' => 'Invalid request.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
            
            if(!empty($custid) && !empty($ordid)){
                $ordInfo = $this->API->getOrderDetail($this->cid,$custid,$this->ordid,$ordid,$this->orders);
                if(!empty($ordInfo) || !empty($orderProductList)){
                    $orderProductList = $this->API->getPurchasedProductList($this->ordid,$ordid,$this->order_products);
                    // Set the response and exit
                    $message = array(
                        'orderInfo' => $ordInfo,
                        'orderProductList' => $orderProductList
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'no record found.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $message = array(
                    'status' => FALSE,
                    'message' => 'Invalid request.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }
        
    }
    
    /**
     * User Shipping Address
     * -----------
     * @method: POST
     * @return Response
    */
    public function address_post()
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('cust_id', 'User Id', 'trim|required');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('address', 'Complete Address', 'trim|required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required');
        $this->form_validation->set_rules('type', 'Address Type', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   
            $savedData=array(	 
				"cust_id"=>$this->input->post('cust_id'),
				"shippingFirstName"=>$this->input->post('fname'),
				"shippingLastName"=>$this->input->post('lname'),
				"shippingEmail"=>$this->input->post('email'),
				"shippingNumber"=>$this->input->post('phone'),
				"shippingCountry"=>$this->input->post('country'), 
				"shippingState"=>$this->input->post('state'), 
				"shippingCity"=>$this->input->post('city'), 
				"shippingPincode"=>$this->input->post('pincode'), 
				"shippingAddress"=>$this->input->post('address'), 
				"addressType"=>$this->input->post('type'),    
				'shippingCreated' => date('Y-m-d H:i:s')
			); 
			$saved = $this->API->save($savedData, $this->shipping);
			/*-- CHECK IF THE USER DATA SAVED OR NOT ---*/
            if($saved){
                // Set the response and exit
                $message = array(
                    'status' => TRUE,
                    'message' => 'saved address successfully'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'Some problems occurred, please try again.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }
    }
    
    public function updateaddress_post()
    {
         # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('cust_id', 'User Id', 'trim|required');
        $this->form_validation->set_rules('ship_id', 'Shipping Id', 'trim|required');
        $this->form_validation->set_rules('fname', 'First Name', '');
        $this->form_validation->set_rules('lname', 'Last Name', '');
        $this->form_validation->set_rules('email', 'Email Address', '');
        $this->form_validation->set_rules('phone', 'Mobile Number', '');
        $this->form_validation->set_rules('country', 'Country', '');
        $this->form_validation->set_rules('state', 'State', '');
        $this->form_validation->set_rules('city', 'City', '');
        $this->form_validation->set_rules('address', 'Complete Address', '');
        $this->form_validation->set_rules('pincode', 'Pincode', '');
        $this->form_validation->set_rules('type', 'Address Type', '');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   
            $uid=$this->input->post('cust_id');
            $shipid=$this->input->post('ship_id');
            $data=array(
                	"cust_id"=>$this->input->post('cust_id'),
    				"shippingFirstName"=>$this->input->post('fname'),
    				"shippingLastName"=>$this->input->post('lname'),
    				"shippingEmail"=>$this->input->post('email'),
    				"shippingNumber"=>$this->input->post('phone'),
    				"shippingCountry"=>$this->input->post('country'), 
    				"shippingState"=>$this->input->post('state'), 
    				"shippingCity"=>$this->input->post('city'), 
    				"shippingPincode"=>$this->input->post('pincode'), 
    				"shippingAddress"=>$this->input->post('address'), 
    				"addressType"=>$this->input->post('type')
            );   
            $update = $this->API->update($this->shipid,$shipid,$data,$this->shipping);
            
           if($update){
                      
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'address successfully updated.',
                        // 'ord_id' => $orderReferenceID
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
        }    
    }
    
    public function addresslist_get($custid=0)
    {
        if(!empty($custid)){
            $data = $this->API->getAddressList($this->cid,$custid,$this->shipping);
            // $arrayData=array();
            // foreach($data as $shipvalue){
            //     $arrayData[]=array(
            //         'slr_id'=>$shipvalue->fld_id
            //     );
            // }
            // $dataReturn=$arrayData;
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'banners list not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    public function deleteaddress_delete($shipid=null)
    {
        $checkRecord = $this->API->checkShipping($this->shipid,$shipid,$this->shipping);
        if(!empty($checkRecord))
        {
            $remove = $this->API->delete($this->shipid,$shipid,$this->shipping);
            if($remove)
            {
                $message = array(
                    'status' => TRUE,
                    'message' => 'address successfully removed.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = array(
                'status' => FALSE,
                'message' => 'address not found.'
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    /**
     * User Forgot Password
     * -----------
     * @method: POST
     * @return Response
    */
    public function forgot_post() 
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {
            // CHECK IF GIVEN EMAIL ID EXISTS
            $email=$this->input->post('email');
            $check = $this->API->check_email($this->cemail,$email,$this->customer);
            //print_r($check);die;
            if($check > 0){
                // Update password
                $password=rand(10,1000000);
                $data=array($this->upassword=>md5($password)); 
                $updated = $this->API->update($this->cemail,$email,$data, $this->customer);
                 /*--- SEND MAIL AFTER REGISTRATION ---*/ 
                if(!empty($email)){
    			    $template=template(4);
        			if(!empty($template)){
            			$company=company_detail();				
        			 $login_url=base_url();
        			 $token=array(
        				'Company_Logo'=>$company['Company_Logo'],
        				'website_url'=>$company['website_url'],
        				'social_media_icons'=>$company['social_media_icons'],
        				'website_name'=>$company['website_name'],
        				'user_full_name'=>$check->cust_fname.' '.$check->cust_lname,
        				'new_password'=>$password,
        				'login_link'=>$login_url,
        				'contact_us_url'=>$company['website_url'],
        				'contact_us_email'=>$company['contact_us_email']
        			 );
        			$pattern = '{%s}';
        			foreach($token as $key=>$val){
        				$varMap[sprintf($pattern,$key)] = $val;
        			}			
                    $get_msg=strtr($template->tp_body,$varMap);
        		    $subject=strtr($template->tp_subject,$varMap);	
        			$to=$email;
        			email_send($to,$subject,$get_msg);
        			}
        		}
			
		// end email 
		
		 /*-- CHECK IF THE USER DATA updated OR NOT ---*/
                if($updated){
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'Password reset. Reset link send on your email.',
                        //'data' => $data
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
                

            }else{
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'Email address Invalid .'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }
    }
    
    /**
     * User Change Password
     * -----------
     * @method: POST
     * @return Response
    */

    public function changepassword_post() 
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('cust_id', 'Customer Id', 'trim|required');
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]|Max_length[100]');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   
            $uid=$this->input->post('cust_id'); 
            $old_password=md5($this->input->post('old_password'));
            $user_password = $this->API->check_password($this->cid,$uid,$this->upassword,$old_password,$this->customer);           
            if($user_password){
            $data=array('cust_password' => md5($this->input->post('new_password')));
            $result = $this->API->update($this->cid,$uid,$data,$this->customer);
            
           if($result){                      
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'Password change successfully.',                        
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Old Password doesn`t match Password.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
        }
    }
    
    /**
     * PRODUCT CATEGORY API
     * -------------
     * @param: category subcategory and child category list
     * -------------
     * @method: POST
     * @link: api/category
    */
    
    public function categories_get()
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            // ENGLISH RECORD
            $category = $this->API->getCategoryList($this->cateid,$this->category); // CATEGORY LIST
            if(!empty($category)){
                $arrayData=array();
                foreach($category as $catevalue){
                    $arrayData[]=array(
                         'cate_id'=>$catevalue->cate_id,
                         'cate_name'=>$catevalue->cate_name,
                         'subcategory'=>$this->get_sub_categories_list($catevalue->cate_id)
                     );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'category list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else if($lang=='ar'){
            // ARABIC RECORD
            $category = $this->API->getCategoryList($this->cateid,$this->category); // CATEGORY LIST
            if(!empty($category)){
                $arrayData=array();
                foreach($category as $catevalue){
                    $arrayData[]=array(
                         'cate_id'=>$catevalue->cate_id,
                         'cate_name'=>$catevalue->cate_name_ar,
                         'subcategory'=>$this->get_sub_categories_list($catevalue->cate_id)
                     );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'category list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'Invalid request.'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
        
    }
    public function get_sub_categories_list($categoryid)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            $this->db->select('cate_id,scate_id,scate_name');
            $this->db->where('cate_id', $categoryid);
            $child = $this->db->get('tbl_sub_category');
            $subcategories = $child->result();
            
        }else if($lang=='ar'){
            
            $this->db->select('cate_id,scate_id,scate_name_ar AS scate_name');
            $this->db->where('cate_id', $categoryid);
            $child = $this->db->get('tbl_sub_category');
            $subcategories = $child->result();
            
        }
        
        $i=0;
        foreach($subcategories as $scat){

            $subcategories[$i]->childcategory = $this->child_categories_list($scat->scate_id);
            $i++;
        }
        return $subcategories; 
    }
    public function child_categories_list($scateid)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            $this->db->select('scate_id,child_id,child_name');
            $this->db->where('scate_id', $scateid);
            $query = $this->db->get('tbl_child_category');
            return $query->result();
        }else if($lang=='ar'){
            
            $this->db->select('scate_id,child_id,child_name_ar AS child_name');
            $this->db->where('scate_id', $scateid);
            $query = $this->db->get('tbl_child_category');
            return $query->result();
        }
        
    }
    
    public function brands_get()
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            $brand = $this->API->getBrandList($this->brdid,$this->vendors); // Brand LIST
            if(!empty($brand)){
                $arrayData=array();
                foreach($brand as $brandvalue){
                    $arrayData[]=array(
                         'id'=>$brandvalue->vnd_id,
                         'name'=>$brandvalue->vnd_name,
                         'image'=> base_url('seller/uploads/profile/').$brandvalue->vnd_picture
                     );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'brand list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else if($lang=='ar'){
            
            $brand = $this->API->getBrandList($this->brdid,$this->vendors); // Brand LIST
            if(!empty($brand)){
                $arrayData=array();
                foreach($brand as $brandvalue){
                    $arrayData[]=array(
                         'id'=>$brandvalue->vnd_id,
                         'name'=>$brandvalue->vnd_name,
                         'image'=> base_url('seller/uploads/profile/').$brandvalue->vnd_picture
                     );
                }
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'brand list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'Invalid request.'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
        
    }
    
    public function coupon_get()
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($lang=='en'){
            
            $coupon = $this->API->getCouponCodeList($this->cpnid,$this->coupon); // Coupon LIST
            if(!empty($coupon)){
                $arrayData=array();
                foreach($coupon as $couponvalue){
                    $arrayData[]=array(
                         'id'=>$couponvalue->cup_id,
                         'couponcode'=>$couponvalue->cup_code,
                         'discount'=> $couponvalue->cup_discount,
                         'minorder'=> $couponvalue->cup_min_order,
                         'start'=> $couponvalue->cup_start_date,
                         'end'=> $couponvalue->cup_end_date,
                     );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'coupon list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else if($lang=='ar'){
            
            $coupon = $this->API->getCouponCodeList($this->cpnid,$this->coupon); // Coupon LIST
            if(!empty($coupon)){
                $arrayData=array();
                foreach($coupon as $couponvalue){
                    $arrayData[]=array(
                         'id'=>$couponvalue->cup_id,
                         'couponcode'=>$couponvalue->cup_code,
                         'discount'=> $couponvalue->cup_discount,
                         'minorder'=> $couponvalue->cup_min_order,
                         'start'=> $couponvalue->cup_start_date,
                         'end'=> $couponvalue->cup_end_date,
                     );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'coupon list not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'Invalid request.'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
        
    }
    
    /**
     * PRODUCT LIST
     * -------------
     * @param: feature product list
     * -------------
     * @method: GET
     * @link: api/featureproducts
    */
    
    public function products_get($custid=0,$proid=0)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if($custid!=0 && $proid!=0){
            $wishlistByUser = $this->API->getProductWishlistByUserByProduct($this->urid,$custid,$this->wspid,$proid,$this->wishlist);
        }
        
        if($custid!=0){
            $cartByUser = $this->API->getCartProductByUser($this->cid,$custid,$this->crtpid,$proid,$this->cart); // CART LIST
        }
        
        $reviewlist = $this->API->getReviewList($this->cid,$custid,$this->rwpid,$proid,$this->review); // REVIEW LIST
        if(!empty($reviewlist)){
            $productReviewList=array();
            foreach($reviewlist as $rwvalue){
                $productReviewList[]=array(
                    'id'=>$rwvalue->id,
                    'rating'=>$rwvalue->star,
                    'message'=>$rwvalue->message
                 );
            }
        }
        
        
        if($lang=='en'){
            
            if(!empty($proid)){
                $info = $this->API->getProductDetail($this->pid,$proid,$this->product);
                if(!empty($info)){
                    
                    $pimages = explode(',',$info->pg_image);
                    $idsArray = array();
                    foreach($pimages as $pimg){
                        $idsArray[]['image'] = base_url('seller/uploads/').slug($info->cate_name).'/'.slug($info->scate_name).'/'.slug($info->child_name).'/'.$pimg;
                    }
                    $productImages = $idsArray;
                    
                    //$multimg = $this->getMultipleImage($proid);
                    $inventory = $this->getInventory($proid);
                    //print_r($inventory);die;
                    
                    if(!empty($wishlistByUser)){
                        if($info->p_id==$wishlistByUser->pid){
                            $favourite = $wishlistByUser->id;
                        }else{
                            $favourite = 0;
                        }   
                    }else{
                        $favourite = 0;
                    }
                    
                    if(!empty($cartByUser)){
                        if($info->p_id==$cartByUser->pro_id){
                            $cart = $cartByUser->cart_id;
                        }else{
                            $cart = 0;
                        }   
                    }else{
                        $cart = 0;
                    }
                    
                    if(!empty($productReviewList)){
                        $reviewByCustomer = $productReviewList;
                    }else{
                        $reviewByCustomer = [];
                    }
                    
                    if(!empty($reviewlist)){
                        $overallCount = count($reviewlist);
                    }else{
                        $overallCount = 0;
                    }
                    
                    $data=array(
                        'p_id' => $info->p_id,
                        'p_vnd_id' => $info->p_vnd_id,
                        'p_cate' => $info->p_cate,
                        'cate_slug' => $info->cate_slug,
                        'scate_slug' => $info->scate_slug,
                        'child_slug' => $info->child_slug,
                        'cate_name' => $info->cate_name,
                        'scate_name' => $info->scate_name,
                        'child_name' => $info->child_name,
                        'p_reference_no' => $info->p_reference_no,
                        'p_name' => $info->p_name,
                        'p_model' => $info->p_model,
                        //'p_lenght' => $info->p_lenght,
                        //'p_width' => $info->p_width,
                        //'p_height' => $info->p_height,
                        //'p_weight' => $info->p_weight,
                        //'p_barcode' => $info->p_barcode,
                        'p_short_description' => strip_tags($info->p_short_description),
                        'p_description' => strip_tags($info->p_description),
                        'p_warranty_policy' => $info->p_warranty_policy,
                        'p_return_policy' => $info->p_return_policy,
                        'ut_dime_name' => $info->ut_dime_name,
                        'ut_weight_name' => $info->ut_weight_name,
                        // 'p_option_group' => $info->p_option_group,
                        // 'option_grop' => $info->option_grop,
                        // 'option_grop_add' => $info->option_grop_add,
                        'int_stock' => $info->int_stock,
                        'int_available_qty' => $info->int_available_qty,
                        'int_min_purchase_qty' => $info->int_min_purchase_qty,
                        'int_custom' => $info->int_custom,
                        'p_selling_price' => $info->p_selling_price,
                        'sp_special_price' => $info->sp_special_price,
                        'sp_end_date' => $info->sp_end_date,
                        'sp_start_date' => $info->sp_start_date,
                        'pg_image' => $productImages,
                        'inventory' =>  $inventory ,
                        // 'size' => $sizeArray,
                        'overallReview'=>$overallCount,
                        'brd_name' => $info->brd_name,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart,
                        'p_review'=>$reviewByCustomer
                    );
                    $this->response($data, REST_Controller::HTTP_OK);
                }else{
                    $data='data not found.';
                    $this->response($data, REST_Controller::HTTP_OK);
                }
            }else{
                $arrayData['notificationCount'] = $this->API->getNotificationCountByUser($this->ntrid,$custid,$this->notification);
                $arrayData['data'][] = $this->API->getNewArrivalProductList($lang,$custid,$this->product);
                $arrayData['data'][] = $this->API->getHotProductsProductList($lang,$custid,$this->product);
                $arrayData['data'][] = $this->API->getFeatureProductsProductList($lang,$custid,$this->product);
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }
            
        }else if($lang=='ar'){
            
            if(!empty($proid)){
                $info = $this->API->getProductDetail($this->pid,$proid,$this->product);
                if(!empty($info)){
                    
                    $pimages = explode(',',$info->pg_image);
                    $idsArray = array();
                    foreach($pimages as $pimg){
                        $idsArray[]['image'] = base_url('seller/uploads/').slug($info->cate_name).'/'.slug($info->scate_name).'/'.slug($info->child_name).'/'.$pimg;
                    }
                    $productImages = $idsArray;
                    
                    //$multimg = $this->getMultipleImage($proid);
                    $inventory = $this->getInventory($proid);
                    //print_r($inventory);die;
                    
                    if(!empty($wishlistByUser)){
                        if($info->p_id==$wishlistByUser->pid){
                            $favourite = $wishlistByUser->id;
                        }else{
                            $favourite = 0;
                        }   
                    }else{
                        $favourite = 0;
                    }
                    
                    if(!empty($cartByUser)){
                        if($info->p_id==$cartByUser->pro_id){
                            $cart = $cartByUser->cart_id;
                        }else{
                            $cart = 0;
                        }   
                    }else{
                        $cart = 0;
                    }
                    
                    if(!empty($productReviewList)){
                        $reviewByCustomer = $productReviewList;
                    }else{
                        $reviewByCustomer = [];
                    }
                    
                    if(!empty($reviewlist)){
                        $overallCount = count($reviewlist);
                    }else{
                        $overallCount = 0;
                    }
                    
                    $data=array(
                        'p_id' => $info->p_id,
                        'p_vnd_id' => $info->p_vnd_id,
                        'p_cate' => $info->p_cate,
                        'cate_slug' => $info->cate_slug,
                        'scate_slug' => $info->scate_slug,
                        'child_slug' => $info->child_slug,
                        'cate_name' => $info->cate_name_ar,
                        'scate_name' => $info->scate_name_ar,
                        'child_name' => $info->child_name_ar,
                        'p_reference_no' => $info->p_reference_no,
                        'p_name' => $info->p_name_ar,
                        'p_model' => $info->p_model_ar,
                        //'p_lenght' => $info->p_lenght,
                        //'p_width' => $info->p_width,
                        //'p_height' => $info->p_height,
                        //'p_weight' => $info->p_weight,
                        //'p_barcode' => $info->p_barcode,
                        'p_short_description' => strip_tags($info->p_short_description_ar),
                        'p_description' => strip_tags($info->p_description_ar),
                        'p_warranty_policy' => $info->p_warranty_policy,
                        'p_return_policy' => $info->p_return_policy,
                        'ut_dime_name' => $info->ut_dime_name,
                        'ut_weight_name' => $info->ut_weight_name,
                        // 'p_option_group' => $info->p_option_group,
                        // 'option_grop' => $info->option_grop,
                        // 'option_grop_add' => $info->option_grop_add,
                        'int_stock' => $info->int_stock,
                        'int_available_qty' => $info->int_available_qty,
                        'int_min_purchase_qty' => $info->int_min_purchase_qty,
                        'int_custom' => $info->int_custom,
                        'p_selling_price' => $info->p_selling_price,
                        'sp_special_price' => $info->sp_special_price,
                        'sp_end_date' => $info->sp_end_date,
                        'sp_start_date' => $info->sp_start_date,
                        'pg_image' => $productImages,
                        'inventory' =>  $inventory ,
                        // 'size' => $sizeArray,
                        'overallReview'=>$overallCount,
                        'brd_name' => $info->brd_name,
                        'p_favourite'=>$favourite,
                        'p_cart'=>$cart,
                        'p_review'=>$reviewByCustomer
                    );
                    $this->response($data, REST_Controller::HTTP_OK);
                }else{
                    $data='data not found.';
                    $this->response($data, REST_Controller::HTTP_OK);
                }
            }else{
                $arrayData['notificationCount'] = $this->API->getNotificationCountByUser($this->ntrid,$custid,$this->notification);
                $arrayData['data'][] = $this->API->getNewArrivalProductList($lang,$custid,$this->product);
                $arrayData['data'][] = $this->API->getHotProductsProductList($lang,$custid,$this->product);
                $arrayData['data'][] = $this->API->getFeatureProductsProductList($lang,$custid,$this->product);
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }
            
        }
        
    }
    
    public function childcategory_get($custid=0,$childid=0)
    {
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        if(!empty($childid)){
            if($lang=='en'){
             
                $productData['data'][] = $this->API->getChildCategorProductsList($lang,$custid,$this->pchild,$childid,$this->product);
                $productData['filter'] = $this->API->getChildCategoryFilterList($lang,$this->pchild,$childid,$this->product);
                $productData['sort'] = $this->API->getChildCategorySort();
                
            }else if($lang=='ar'){
                
                $productData['data'][] = $this->API->getChildCategorProductsList($lang,$custid,$this->pchild,$childid,$this->product);
                $productData['filter'] = $this->API->getChildCategoryFilterList($lang,$this->pchild,$childid,$this->product);
                $productData['sort'] = $this->API->getChildCategorySort();
                
            }
            
            $productDataReturn = $productData;
            $this->response($productDataReturn, REST_Controller::HTTP_OK);
            
        }else{
            $message = [
                'status' => TRUE,
                'message' => 'products not found.'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
        
    }
    
    public function getInventory($pid)
    { 
        $product_link=$this->API->get_product_link($pid);
        $option_group=explode(', ',$product_link);
        $inventory=array();
        foreach($option_group as $option){
            if(!empty($this->option_name($option))){
                $inventory['name']=$this->option_name($option);
            }
            if(!empty($this->get_color($pid))){
                $inventory['color']=$this->get_color($pid);
            }else if(!empty($this->get_size($pid))){
                $inventory['size']=$this->get_size($pid);
            }
        }
       
        return $inventory; 
    }
    public function get_size($pid)
    { 
      
        $this->db->select('int_size,size,int_selleing_price,int_available_qty');
        $this->db->where('int_pid', $pid);
        $query = $this->db->get('tbl_inventory');
        $result = $query->result();
        $get_size=array();
         
        foreach($result as $option){
            if(!empty($option->int_size)){
            if(!empty($this->size_all($pid,$option->int_size)))
            {
                $get_size[]=array(
                   'name_size'=>$option->int_size,
                   'size'=>$this->size_all($pid,$option->int_size),
                   'selleing_price'=>$option->int_selleing_price,
                   'available_qty'=>$option->int_available_qty
                );
            }else{
                $get_size[]=array(
                   'size'=>$option->int_size,
                   'selleing_price'=>$option->int_selleing_price,
                   'available_qty'=>$option->int_available_qty
                );
           }
        }
        }
        return  $get_size; 
    }
    public function size_all($pid,$size)
    { 
        $this->db->select('size,int_selleing_price,int_available_qty');
        $this->db->where('int_pid', $pid);
        $this->db->where('int_size', $size);
        $this->db->where('size !=', '');
        $query = $this->db->get('tbl_inventory');
        $result = $query->result();
        return  $result; 
    }
    public function get_color($pid)
    { 
        $this->db->select('int_color');
        $this->db->where('int_pid', $pid);
        $this->db->where('int_color !=', '');
        $query = $this->db->get('tbl_inventory');
        $result = $query->result();
         $get_color=array();
         foreach($result as $clr_val){
           $get_color[]=array(
                'color'=>$clr_val->int_color,
               'size'=>$this->get_size($pid)
           );
        }
        return  $get_color; 
       
    }
    public function option_name($option)
    { 
        $this->db->select('opt_name');
        $this->db->where('opt_id', $option);
        $query = $this->db->get('tbl_option');
        $option_name = $query->row();
        return  $option_name->opt_name; 
    }
    
    
    
    /**
     * User Product Order Place
     * -----------
     * @method: POST
     * @return Response
    */
    public function orderplace_post() 
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');
        $this->form_validation->set_rules('address_id', 'Shipping Address Id', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   
            $custid = $this->input->post('customer_id');
            $aid    = $this->input->post('address_id');
            $checkAddress = $this->API->checkShippingAddressByCustomerId($this->cid,$custid,$this->shipid,$aid,$this->shipping);
            //print_r($checkAddress);die;
            if(!empty($checkAddress)){
                $cartlist = $this->API->getCartListForOrderplaceByCustomer($this->cid,$custid,$this->cart); // CART LIST
                //print_r($cartlist);die;
                if(!empty($cartlist)){
                    
                    /*--- Manage Cart Data For Order ---*/ 
                    date_default_timezone_set('Asia/Dubai'); 
                    $year = date('y');
        			$month = date('m');
        			$random = rand(1000, 9999);
        			$orderReferenceID = $year.$month.$random; // Order Reference Number
        			
                    //$product_id=explode(',',implode(",",$this->input->post('product_id')));
                    //$qty=explode(',',implode(",",$this->input->post('quantity')));
                    
                    $data=array();
                    $price=0;
                    foreach($cartlist as $key=>$value){
                        //$product = $this->API->getSingleProduct($this->pid,$value,$this->product);
                        //print_r($product);die;
                        if(!empty($value['cart_offer_price'])){
                            $priceValue = $value['cart_offer_price'];
                        }else{
                            $priceValue = $value['cart_selling_price'];
                        }
                        $price+= $priceValue*$value['cart_qty'];
                    }
                    /*--- Tax Calculation ---*/ 
                    $taxList = $this->API->tax_list($this->tax);
                    //print_r($taxList);die;
                    $totalTax=0;
                    if($taxList==true){ 
                        foreach ($taxList as $taxVal) {
                            $txt=$taxVal->txt_per*$price/100;                  
                            $totalTax+=$txt;
                        }
                    }
                    //print_r($totalTax);die;
                    $orderTotalAmounts=$price+$totalTax;
                    //print_r($orderTotalAmounts);die;
                
                    $orderArray = array(
                        'ord_reference_no' => $orderReferenceID,
                        'cust_id' => $custid,
                        'ord_gst_sum' => $totalTax,
                        'ord_total_amounts' =>$orderTotalAmounts,
                        'ord_created_date' =>date('Y-m-d h:i:s'),
                    );
                    $ordid=$this->API->SaveOrderInformation($orderArray,$this->orders);
                    if($ordid){
                        $orderProducts = array();               
                        foreach($cartlist as $cartKey=>$cartValue){   
                            //$product_val = $this->API->getSingleProduct($this->pid,$data_val,$this->product);
                            if(!empty($cartValue['cart_offer_price'])){
                                $priceValue = $cartValue['cart_offer_price'];
                            }else{
                                $priceValue = $cartValue['cart_selling_price'];
                            }
                            
                            $orderProducts[] = array(
                                'ord_id' => $ordid,
                                'pro_id' => $cartValue['cart_proid'],                        
                                'pro_name' => $cartValue['cart_name'],
                                'pro_price' => $priceValue,
                                'pro_qty' => $cartValue['cart_qty']
                            );
                        }
                        $check = $this->API->SaveOrderProduct($orderProducts,$this->order_products);
                        $message = array(
                            'status' => TRUE,
                            'message' => 'Order has been saved',
                            'order_id' => $orderReferenceID
                        );
                        $this->response($message, REST_Controller::HTTP_OK);
                    }else{
                        // Set the response and exit
                        $message = array(
                            'status' => FALSE,
                            'message' => 'Some error occurred, please try again.'
                        );
                        $this->response($message, REST_Controller::HTTP_OK);
                    }
                    /*--- End Of Cart Data ---*/    
                    
                }else{
                    $message = array(
                        'status' => FALSE,
                        'message' => 'cart is empty'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $message = array(
                    'status' => FALSE,
                    'message' => 'something went wrong.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
            
//             date_default_timezone_set('Asia/Dubai'); 
//             $year = date('y');
// 			$month = date('m');
// 			$random = rand(1000, 9999);
// 			$orderReferenceID = $year.$month.$random;
//             $uid=$this->input->post('cust_id');
//             $product_id=explode(',',implode(",",$this->input->post('product_id')));
//             $qty=explode(',',implode(",",$this->input->post('quantity')));
//             $data=array();
//             $price=0;
//             //print_r($product_id);die;
            
//             foreach($product_id as $key=>$value){
//                 $product = $this->API->getSingleProduct($this->pid,$value,$this->product);
//                 //print_r($product);die;
//                 $price+= $product->p_selling_price*$qty[$key];
//             }
//             //tax 
//             $tax_array = $this->API->tax_list($this->tax);
//             $total_tax=0;
//             if($tax_array==true){ 
//                 foreach ($tax_array as $tx_val) {
//                     $txt=$tx_val->txt_per*$price/100;                  
//                     $total_tax+=$txt;
//               }
//             }
//             $ord_total_amounts=$price+$total_tax;
            
//             $orderArray = array(
//                 'ord_reference_no' => $orderReferenceID,
//                 'cust_id' => $uid,
//                 'ord_gst_sum' => $total_tax,
//                 'ord_total_amounts' =>$ord_total_amounts,
//                 'ord_created_date' =>date('Y-m-d h:i:s'),
//             );
//             $ordid=$this->API->SaveOrderInformation($orderArray,$this->orders);
//             if($ordid){
//                 $orderProducts = array();               
//                 foreach($product_id as $key=>$data_val)
//                 {   
//                     $product_val = $this->API->getSingleProduct($this->pid,$data_val,$this->product);
//                     $orderProducts[] = array(
//                         'ord_id' => $ordid,
//                         'pro_id' => $data_val,                        
//                         'pro_name' => $product_val->p_name,
//                         'pro_price' => $product_val->p_selling_price,
//                         'pro_qty' => $qty[$key]
//                     );
//                 }
//                 $check = $this->API->SaveOrderProduct($orderProducts,$this->order_products);
//                 // Set the response and exit
//                 $message = array(
//                     'status' => TRUE,
//                     'message' => 'Order has been saved',
//                     'order_id' => $orderReferenceID
//                 );
//                 $this->response($message, REST_Controller::HTTP_OK);
//             }else{
//                 // Set the response and exit
//                 $message = array(
//                     'status' => FALSE,
//                     'message' => 'Some problems occurred, please try again.'
//                 );
//                 $this->response($message, REST_Controller::HTTP_OK);
//             }
        }
    }
    
    public function orderupdate_post()
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('order_id', 'Order Id', 'trim|required');
        $this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|required');
        $this->form_validation->set_rules('transection_status', 'Status', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {   
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);

        }else{
        
            $customerId = $this->input->post('cust_id');
            $orderReferenceId = $this->input->post('order_id');
            $transectionId = $this->input->post('transaction_id');
            $transactionStatus = $this->input->post('transection_status');
            
            if($transactionStatus=='paid'){
            
                $orderUpdate = array(
                    'ord_pay_mode'=>'ONLINE',
                    'ord_txt_id'=> $transectionId,
                    'ord_txt_status' => $transactionStatus,
                    'order_status' => 'InProcess'
                );
                $data['orderDetail']=$this->API->getOrderInfo($orderReferenceId);
                //print_r($data['orderDetail']->ord_id);die;
                if(!empty($data['orderDetail']->ord_reference_no)){
                    $data['orderProductDetail']=$this->API->getOrderProductList($data['orderDetail']->ord_id); /*--- Get Order Product List ---*/ 
                    $updatestatus = $this->API->UpdateOrderInformation($this->refId,$orderReferenceId,$orderUpdate,$this->orders);
                    //print_r($updatestatus);die;
                    
                    foreach ($data['orderProductDetail'] as $ord_value) {
        	    	    $inventory=get_inventory($ord_value->int_id)-$ord_value->pro_qty;
        	    	    if(!empty($inventory)){
        	    	        $data_invent= array('int_available_qty' =>$inventory);
        		        }else{
        		        	$data_invent= array('int_available_qty' =>'0','int_stock' =>'0');
        		        }
        	            $Updateinventory = $this->API->Update_inventory($data_invent,$ord_value->int_id);
        	            
        	            // Vendor SMS API 
        	            if(!empty(vendor_phone($ord_value->ord_vendors)->vnd_phone_code)){
        	    	        $vnd_name=vendor_phone($ord_value->ord_vendors)->vnd_name;
        	                $vendorphone='+'.code(vendor_phone($ord_value->ord_vendors)->vnd_phone_code).''.vendor_phone($ord_value->ord_vendors)->vnd_phone;
        		            $vndSmsMsg='Dear '.$vnd_name.' , You have received new order #'.$data['orderDetail']->ord_reference_no.'.  kindly check and confirm order deliver time and collection. ';
        		            
        		            $this->load->library('twilio');
        			        $sms_from = '+447723561455';
        			        $vndSmsTo = $vendorphone;
        			        $vndsmsresponse = $this->twilio->sms($sms_from, $vndSmsTo, $vndSmsMsg);
        			    }   /*--- End Vendor SMS API ---*/
        
        	        } /*-- End Of Foreach Loop --*/ 
        	        
        	       /*--- Manage Customer Cart ---*/
        	       $checkCustomerCartData = $this->API->getCartListForOrderplaceByCustomer($this->cid,$customerId,$this->cart);
        	       
        	       if(!empty($checkCustomerCartData)){
        	           foreach($checkCustomerCartData as $key=>$value){
        	               $cartid = $value['cart_id'];
        	               $this->API->delete($this->crtid,$cartid,$this->cart);
        	           }
        	       }
        	       /*--- End Of Customer Cart ---*/
        	        
        	        /*--- Customer SMS API ---*/ 
        	        $name=$data['orderDetail']->cust_fname.' '.$data['orderDetail']->cust_lname;
        	        if(!empty($data['orderDetail']->cust_phone_code)){
        	            $phone='+'.code($data['orderDetail']->cust_phone_code).''.$data['orderDetail']->cust_phone;
        		        $smsMsg='Dear '.$name.' , We have received your order #'.$data['orderDetail']->ord_reference_no.' & we will provide your tracking number once your order is shipped.';
        		        
        		        $this->load->library('twilio');
        	            $sms_from = '+447723561455';
        	            $smsTo = $phone;
        	            $smsresponse = $this->twilio->sms($sms_from, $smsTo, $smsMsg);
        	
        	        }   /*--- End Of Customer SMS API ---*/
        	        
        	        /*--- Admin SMS API ---*/  
        	        $adminSmsMsg='New order placed by '.$name.' with order number #'.$data['orderDetail']->ord_reference_no.'.';
        	        $this->load->library('twilio');
        	        $sms_from = '+447723561455';
        	        $adminSmsTo = '+96893993412';
        	        $smsresponse = $this->twilio->sms($sms_from, $adminSmsTo, $adminSmsMsg);		
        		    /*--- End Of Admin SMS API ---*/
        		    
        		    /*====================Start email send===========*/ 
        			$emailSubject='Order Detail from Zahi.com';
        			$toEmail=$cust_email; 
        			$emailMsg=$this->load->view('api/email_order/emailOrder',$data,true);
        			$fromEmail = "zahi@mycvone.com";
                    $this->load->library('email');
                    $config = array (
                        'mailtype' => 'html',
                        'charset'  => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from($fromEmail, "ZAHI");
                    $this->email->to($toEmail);
                    $this->email->subject($emailSubject);
                    $this->email->message($emailMsg);
                    $this->email->send();	 
        			/*====================End email send ===========*/
        
        			/*====================Start email send to team===========*/ 
        			$emailSubjectTeam='New Order Received';
        			$toTeamEmail='zahi@mycvone.com'; 
        			$emailMsgTeam=$this->load->view('api/email_order/teamOrder',$data,true);
        			$fromEmailTeam = "zahi@mycvone.com";
                    $this->load->library('email');
                    $config = array (
                        'mailtype' => 'html',
                        'charset'  => 'utf-8',
                        'priority' => '1'
                    );
                    $this->email->initialize($config);
                    $this->email->from($fromEmailTeam, "ZAHI");
                    $this->email->to($toTeamEmail);
                    $this->email->subject($emailSubjectTeam);
                    $this->email->message($emailMsgTeam);
                    $this->email->send();	  
        			/*====================End email send ===========*/
        			
        			$message = array(
                        'status' => TRUE,
                        'message' => 'Order has been received',
                        'transaction_id' => $transectionId
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    $message = array(
                        'status' => FALSE,
                        'message' => 'order not found'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $message = array(
                    'status' => FALSE,
                    'message' => 'bad request'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
		      
        }
    }
    
    /**
     * User Wishlist
     * -----------
     * @method: POST
     * @return Response
    */
    public function wishlist_get($custid=null)
    {
        if(!empty($custid)){
            $wishlist = $this->API->getWishList($this->urid,$custid,$this->wishlist); // WISHLIST LIST
            if(!empty($wishlist)){
                $arrayData=array();
                foreach($wishlist as $wishvalue){
                    $arrayData[]=array(
                        'ws_id'=>$wishvalue->id,
                        'p_id'=>$wishvalue->p_id,
                        'p_cate'=>$wishvalue->cate_name,
                        'p_subcate'=>$wishvalue->scate_name,
                        'p_childcate'=>$wishvalue->child_name,
                        'p_name'=>$wishvalue->p_name,
                        'p_img'=>base_url('seller/uploads/').slug($wishvalue->cate_name).'/'.slug($wishvalue->scate_name).'/'.slug($wishvalue->child_name).'/'.$wishvalue->pg_img,
                        'p_selling_price'=>$wishvalue->p_selling_price,
                        'p_offer_price'=>$wishvalue->sp_special_price,
                        'p_favourite'=>'0',
                        'p_vendor'=>$wishvalue->vnd_name,
                     );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'wishlist not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'user not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    public function wishlist_post()
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('cust_id', 'Customer Id', 'trim|required');
        $this->form_validation->set_rules('product_id', 'Product Id', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   $proid = $this->input->post('product_id');
            $custid = $this->input->post('cust_id');
            $checkWishlist = $this->API->checkWishlistExistByUser($this->urid,$custid,$this->wspid,$proid,$this->wishlist);
            if(empty($checkWishlist)){
                
                $savedData=array(	 
    				"user_id"=>$this->input->post('cust_id'),
    				"pid"=>$this->input->post('product_id')
    			); 
    			$saved = $this->API->save($savedData, $this->wishlist);
    			/*-- CHECK IF THE USER DATA SAVED OR NOT ---*/
                if($saved){
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'saved wishlist'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
                
            }else{
                 $message = array(
                    'status' => FALSE,
                    'message' => 'wishlist updated'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
            
        }
    }
    
    public function deletewishlist_delete($wishid=null)
    {
        $checkRecord = $this->API->checkWishlist($this->wsid,$wishid,$this->wishlist);
        if(!empty($checkRecord))
        {
            $remove = $this->API->delete($this->wsid,$wishid,$this->wishlist);
            if($remove)
            {
                $message = array(
                    'status' => TRUE,
                    'message' => 'wishlist removed.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = array(
                'status' => FALSE,
                'message' => 'wishlist not found.'
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    /**
     * Product Review
     * -----------
     * @method: POST
     * @return Response
    */
    public function review_get($custid=null, $pid=null)
    {
        if(!empty($custid) && !empty($pid)){
            $reviewlist = $this->API->getReviewList($this->cid,$custid,$this->rwpid,$pid,$this->review); // WISHLIST LIST
            if(!empty($reviewlist)){
                $arrayData=array();
                foreach($reviewlist as $rwvalue){
                    $arrayData[]=array(
                        'id'=>$rwvalue->id,
                        'cust_id'=>$rwvalue->cust_id,
                        'p_id'=>$rwvalue->p_id,
                        'rating'=>$rwvalue->star,
                        'message'=>$rwvalue->message
                     );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'review not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'user not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    public function addreview_post()
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('cust_id', 'Customer Id', 'trim|required');
        $this->form_validation->set_rules('product_id', 'Product Id', 'trim|required');
        $this->form_validation->set_rules('rating', 'Rating', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   
            $savedData=array(	 
				"cust_id" => $this->input->post('cust_id'),
				"p_id" => $this->input->post('product_id'),
				"type" => '1',
				"star" => $this->input->post('rating'),
				"message" => $this->input->post('message'),
				"created" => date('Y-m-d h:i:s')
			); 
			$saved = $this->API->save($savedData, $this->review);
			/*-- CHECK IF THE USER DATA SAVED OR NOT ---*/
            if($saved){
                // Set the response and exit
                $message = array(
                    'status' => TRUE,
                    'message' => 'saved review'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }else{
                // Set the response and exit
                $message = array(
                    'status' => FALSE,
                    'message' => 'Some problems occurred, please try again.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }
    }
    
    /**
     * Notification
     * -----------
     * @method: GET,POST
     * @return Response
    */
    public function notification_get($custid=null)
    {
        if(!empty($custid)){
            $notificationlist = $this->API->getNotificationList($this->ntrid,$custid,$this->notification); // Notification LIST
            if(!empty($notificationlist)){
                $arrayData=array();
                foreach($notificationlist as $notify){
                    $arrayData[]=array(
                        'notify_id'=>$notify->notification_id,
                        'notify_type'=>$notify->notification_type,
                        'notify_message'=>$notify->notification_text,
                        'notify_read_unread'=>$notify->notification_read,
                        'notify_date'=>$notify->notification_create
                     );
                }
                
                $dataReturn=$arrayData;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'notification not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'receiver not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    /**
     * Search
     * -----------
     * @method: GET,POST
     * @return Response
    */
    
    public function search_get($keyword=null)
    {
        if($keyword === null){
            $message = [
                'status' => FALSE,
                'message' => 'data not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }else{
            $p_name='p_name';
    		$p_brand='p_brand';
    		$p_cate='p_cate';
    		$p_scate='p_scate';
    		$p_child='p_child';
    		
    		$productName = $this->API->productKeywordSearch($p_name,$keyword,$this->product);
    		$productBrand = $this->API->productBrandKeywordSearch($p_brand,$keyword,$this->product);
    		$productCate = $this->API->productCategoryKeywordSearch($p_cate,$keyword,$this->product);
    		$productScate = $this->API->productSubcategoryKeywordSearch($keyword,$keyword,$this->product);
    		$productChild = $this->API->productChildKeywordSearch($p_child,$keyword,$this->product);
    	
    	 	if(!empty($productName)){
    		 	$product=$productName;
    	 	}elseif(!empty($productBrand)){	
         		$product=$productBrand;
    	 	}elseif(!empty($productCate)){	
         		$product=$productCate;
    	 	}elseif(!empty($productScate)){
    	 		$product=$productScate;
    	 	}else{
    	 		$product=$productChild;
    	 	} 
    	 	
    	 	if(!empty($product)){
    	 	    $searchResult = $product;
    	 	    $myCustomSearch = array();
    	 	    /*--- Search Result ---*/
    	 	    foreach ($product as $row){ 
           			if(!empty($row->pg_image)){
            			$img='<img src="'.base_url('seller/uploads/').slug($row->cate_name).'/'.slug($row->scate_name).'/'.slug($row->child_name).'/'.explode(',',$row->pg_image)[0].'" alt="'.$row->p_name.'" style="object-fit: contain;width:50px !important; height: 50px !important;">';
               		}else{
            			$img='<img src="'.base_url('seller/uploads/default-image.png').'" alt="'.$row->p_name.'" style="object-fit: contain;width:70px !important; height: 70px !important;">';
             		}
             		if(!empty($row->sp_special_price) && $row->sp_start_date <= $date && $row->sp_end_date >= $date){
             			$price=//currency($this->website->web_currency).''.$row->p_selling_price;
                 			currency($this->website->web_currency).''.$row->sp_special_price;
            		}else{
            			$price=currency($this->website->web_currency).''.$row->p_selling_price;
           			}  
       			    $count_user=get_star($row->p_id)->count;
       			    $star_count=get_star($row->p_id)->star_count;
       			    if(!empty($star_count)){
       			        $getStar=$star_count;
       			    }else{
       			        $getStar='0';
       			    }
       			    
             		if($star_count){
          				$GetStar=GetStar1(round($star_count/$count_user,1));
           			}else{$GetStar=GetStar1(0);}
         		
             		if($row->int_stock=='1'){
             			$stock='In stock';
             			$class='bg-green';
             		}else{
             			$stock='Out of stock';
             			$class='bg-red';
             		}
             		
             		$myCustomSearch[] = array(
             		        'p_id'=>$row->p_id,
             		        'p_name'=>$row->p_name,
             		        'p_image'=>base_url('seller/uploads/').'/'.slug($row->cate_name).'/'.slug($row->scate_name).'/'.slug($row->child_name).'/'.explode(',',$row->pg_image)[0],
             		        'p_price'=>$price,
             		        'p_star'=>$getStar,
             		        'p_stock'=>$stock
             		    );
        	 	}
    	 	    
                $this->response($myCustomSearch, REST_Controller::HTTP_OK);
    	 	}else{
    	 	    $message = [
                    'status' => FALSE,
                    'message' => 'data not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
    	 	}
        }
    }
    
    /**
     * Search
     * -----------
     * @method: GET,POST
     * @return Response
    */
    public function cart_post($custid=null)
    {
        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);
        # Form Validation
        $this->form_validation->set_rules('customerid', 'Customer Id', 'trim|required');
        $this->form_validation->set_rules('productid', 'Product Id', 'trim|required');
        $this->form_validation->set_rules('quantity', 'Product Quantity', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // Form Validation Errors
            $message = array(
                'status' => False,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
        else
        {   
            $custid = $this->input->post('customerid');
            $proid = $this->input->post('productid');
            $checkCartlist = $this->API->checkCartExistByUser($this->cid,$custid,$this->crtpid,$proid,$this->cart);
            if(empty($checkCartlist)){
                
                $savedData=array(	 
    				"cust_id"=>$this->input->post('customerid'),
    				"pro_id"=>$this->input->post('productid'),
    				"pro_qty"=>$this->input->post('quantity'),
    				"pro_created"=>date('Y-m-d h:i:s')
    			); 
    			$saved = $this->API->save($savedData, $this->cart);
    			/*-- CHECK IF THE USER DATA SAVED OR NOT ---*/
                if($saved){
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'cart added'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $updateData=array(	 
    				"pro_qty"=>$this->input->post('quantity')
    			); 
    			$update = $this->API->updateCart($this->cid,$custid,$this->crtpid,$proid,$updateData, $this->cart);
    			/*-- CHECK IF THE USER DATA SAVED OR NOT ---*/
                if($update){
                    // Set the response and exit
                    $message = array(
                        'status' => TRUE,
                        'message' => 'cart updated'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }else{
                    // Set the response and exit
                    $message = array(
                        'status' => FALSE,
                        'message' => 'Some problems occurred, please try again.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }
        }
    }
    
    public function cartlist_get($custid=null)
    {
        if(!empty($custid)){
            $cartlist = $this->API->getCartList($this->cid,$custid,$this->cart); // CART LIST
            if(!empty($cartlist)){
                $dataReturn=$cartlist;
                $this->response($dataReturn, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => FALSE,
                    'message' => 'cartlist not found'
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'user not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }   
    }
    
    public function deletecart_delete($cartid=null)
    {
        if(!empty($cartid) && $cartid!==0){
            $checkCartRecord = $this->API->checkCartlist($this->crtid,$cartid,$this->cart);
            if(!empty($checkCartRecord))
            {
                $remove = $this->API->delete($this->crtid,$cartid,$this->cart);
                if($remove)
                {
                    $message = array(
                        'status' => TRUE,
                        'message' => 'cart item removed.'
                    );
                    $this->response($message, REST_Controller::HTTP_OK);
                }
            }else{
                $message = array(
                    'status' => FALSE,
                    'message' => 'cart not found.'
                );
                $this->response($message, REST_Controller::HTTP_OK);
            }
        }else{
            $message = array(
                'status' => FALSE,
                'message' => 'invalid request'
            );
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    /*--- Terms and conditions ---*/ 
    public function privacy_get()
    {
        $pageid = '4';
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        $pginfo = $this->API->getPageInfo($this->pgid,$pageid,$this->cms);
        if(!empty($pginfo)){
            if($lang=='en'){
                
                $data=array(
                    'p_id' => $pginfo->pg_id,
                    'pg_title' => $pginfo->pg_title,
                    'content1' => strip_tags($pginfo->content1)
                );
                
            }else if($lang=='ar'){
                $data=array(
                    'p_id' => $pginfo->pg_id,
                    'pg_title' => $pginfo->pg_title_ar,
                    'content1' => strip_tags($pginfo->content2)
                );
            }
            
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'banners list not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
    
    /*--- terms and conditions ---*/
    public function terms_get()
    {
        $pageid = '2';
        $lang = $this->currentUrl(); // CHECK CURRENT URL ENGLISH OR ARABIC
        $pginfo = $this->API->getPageInfo($this->pgid,$pageid,$this->cms);
        if(!empty($pginfo)){
            
            if($lang=='en'){
                
                $data=array(
                    'p_id' => $pginfo->pg_id,
                    'pg_title' => $pginfo->pg_title,
                    'content1' => strip_tags($pginfo->content1)
                );
                
            }else if($lang=='ar'){
                $data=array(
                    'p_id' => $pginfo->pg_id,
                    'pg_title' => $pginfo->pg_title_ar,
                    'content1' => strip_tags($pginfo->content2)
                );
            }
            
            $this->response($data, REST_Controller::HTTP_OK);
        }else{
            $message = [
                'status' => FALSE,
                'message' => 'banners list not found'
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        }
    }
       	
}