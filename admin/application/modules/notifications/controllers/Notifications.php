<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends MY_Controller {
	 
	public function __construct()
	{
        parent::__construct(); 
		$this->load->helper("common");	
		$this->load->library('fcm');
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		}  	
        $this->load->model("Notification_model",'Notification');	
       	/* ========FOR MASTER TABEL=========== */ 			
        $this->pushid="push_id";		
        $this->template="tbl_push_notification_template";
        /*--- ---*/
        $this->andid="push_id";		
        $this->android="tbl_push_notification_android";
        /* ========FOR USER TABEL=========== */ 	
        $this->uid="cust_id";
        $this->users="tbl_customer";
    }
    
    /*-- IOS PUSH NOTIFICATION --*/ 
    
    public function index(){
        $content['admin']=admin_profile($this->login->mst_email);
        $content['templates'] = $this->Notification->get_list($this->pushid,$this->template);	      
		$content['subview']="notifications/push_notification";
		$this->load->view('layout', $content);   
	}	
	
	public function send(){
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
		if($REQUESTMETHOD== "POST"){   
			// Image
         	  $path=FCPATH . 'uploads/notifications';
    		  $image_name='push_picture';
    		  $image_data=$this->Notification->images_upload($image_name,$path);  
            
            // Image Url
            $img_url=base_url('uploads/notifications/').$image_data;
			$createdDate = date('Y-m-d H:i:s');
			/*-- Check User --*/
			$deviceType = $this->input->post('devicetype');
 			$out1 = $this->Notification->check_device_token($deviceType,$this->users);
			foreach($out1 as $out2){
			    $out3=$out2->cust_device_token_ios;
     			$registrationIds=array($out3);
                //$out1='cLgHUjxMEUXkgnshHtKNBe:APA91bFioAeMsaNG2H54W4s3_lFl8NwOR3sbpiPSaSAKmHrbR3A3VplRK8BkurQCyMzYuyDOsRbMW7e7nL0A0Y8y_ThERunYyR0tdq2YEagJot2BSEWNktmWm5yANr9-lwviZmRagSSQ';
                //$registrationIds=json_encode($out1);
                //$registrationIds = array($out1);
    
                //print_r($registrationIds);//die;
    			$data = array(
    				'push_title' => $this->input->post('notification_title'), 
    				'push_picture' => $image_data,
    				'push_picture_url' => $img_url,
    				'push_description' => $this->input->post('description'),
    				'push_type'=>$this->input->post('devicetype'),
    				'push_created' => date('Y-m-d H:i:s')
    			);
    			
    			
    			/*-- Push Notification --*/
    			//$serverKey = 'AAAA6T0E5dA:APA91bGc3dyNW_GZaX1OdIRws3-wS9ShRH-pSM2afRLxpjfoS4Ac4DTTmEYmOTuL6IrBGamyp7gantk7CZZ7B54OOLkZud7PfkLIWYPpSIoO5oqscyqM6-NJnjCig67KDMY4gqEdBMcG';
    			$serverKey = 'AAAAHUjk1ng:APA91bFL6FLF8zDwey8jmVYULfBAxhjC_PT6frrM1Gg59tRcIEnivcZWEfVZGlOaG-C_2IfRrc6W6Mz963j9Ja7ghnJgXWqAWbvzmIzZboN8XXf2yDL8N8R_gTBanuDzVn_YkmuFbZuo';
        		$title       = $this->input->post('notification_title');
        		$body        = $this->input->post('description');
        		$image       = $img_url;
        		$push_datanotf   = array('title' => $title, 'timestamp' => time(), 'body' => $body, 'image' => $image, 'type' => 'request');
        		$push_data   = array('message' => $title, 'attachment' => $image, 'media_type' => 'image');
        		$arrayToSend = array('registration_ids' => $registrationIds, 'notification' => $push_datanotf,'data'=>$push_data, 'priority' => 'high','mutable_content' =>true,'content_available' =>true);
        
        		$json        = json_encode($arrayToSend);
                //	print_r($json);//die;
        
        		$headers   = array();
        		$headers[] = 'Content-Type: application/json';
        		$headers[] = 'Authorization: key=' . $serverKey;
        		$ch        = curl_init();
        		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        		curl_setopt($ch, CURLOPT_POST, true);
        		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        		$result = curl_exec($ch);
        		curl_close($ch);
        	    //	echo json_encode($result);//die;
    			/*-- End Push notification --*/
			}
			$result = $this->Notification->save($data,$this->template);
			if($result){
				$this->session->set_flashdata('msg',array('message' => 'Notification send successfully.','class' => 'success','type'=>'Ok!'));
				redirect('notifications/send');
			}else{
				$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('notifications/send');
			} 
		}  

		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="notifications/add_notification";
		$this->load->view('layout', $content);
	}

	public function send_message(){
		$serverKey = 'AAAAHUjk1ng:APA91bFL6FLF8zDwey8jmVYULfBAxhjC_PT6frrM1Gg59tRcIEnivcZWEfVZGlOaG-C_2IfRrc6W6Mz963j9Ja7ghnJgXWqAWbvzmIzZboN8XXf2yDL8N8R_gTBanuDzVn_YkmuFbZuo';
		$title       = 'Payment Recieved';
		$body        = auth()->user()->first_name.' sent INR '.$amount;
		$image       = 'http://164.52.192.94/custom/img/logo.png';
		$push_data   = array('title' => $title, 'timestamp' => time(), 'message' => $body, 'image' => $image, 'type' => 'request');
		$arrayToSend = array('registration_ids' => $registrationIds, 'notification' => $push_data, 'priority' => 'high');

		$json        = json_encode($arrayToSend);

		$headers   = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: key=' . $serverKey;
		$ch        = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		curl_close($ch);
		echo json_encode($result);
	}
	
	public function trash() {         	
		$p_id=$this->uri->segment(3);		 
	    $path=FCPATH . 'uploads/notifications';
	    $productimg= $this->Notification->single_template($this->pushid,$p_id,$this->template);
	    $img1= $path.'/'. $productimg->push_picture;  
        if (!unlink($img1)) {} else { }
		$this->Notification->remove_tmp($this->pushid,$p_id,$this->template);	
		$this->session->set_flashdata('msg',array('message' => 'Data has been successfully Delete.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
		redirect('notifications');
	}
	
    
    /*-- ANDROID PUSH NOTIFICATION --*/ 
    
    public function android(){
        $content['admin']=admin_profile($this->login->mst_email);
        $content['templates'] = $this->Notification->get_list($this->andid,$this->android);	      
		$content['subview']="notifications/push_notification_android";
		$this->load->view('layout', $content);   
	}
	
	public function send_android()
	{
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
		if($REQUESTMETHOD== "POST"){   
			// Image
         	  $path=FCPATH . 'uploads/notifications';
    		  $image_name='push_picture';
    		  $image_data=$this->Notification->images_upload($image_name,$path);  
            
            // Image Url
            $img_url=base_url('uploads/notifications/').$image_data;
			$createdDate = date('Y-m-d H:i:s');
			/*-- Check User --*/
			$deviceTypeAndroid = $this->input->post('devicetype');
 			$out1 = $this->Notification->check_device_token_android($deviceTypeAndroid,$this->users);
 			//print("<pre>".print_r($out1,true)."</pre>");die;
			foreach($out1 as $out2)
			{
			    $out3=$out2->cust_device_token_android;
     			$registrationIds=array($out3);
    			
    			$data = array(
    				'push_title' => $this->input->post('notification_title'), 
    				'push_picture' => $image_data,
    				'push_picture_url' => $img_url,
    				'push_description' => $this->input->post('description'),
    				'push_type'=>$this->input->post('devicetype'),
    				'push_created' => date('Y-m-d H:i:s')
    			);
    			//print("<pre>".print_r($data,true)."</pre>");die;
    			
    			/*-- Push Notification --*/
                $serverKey = 'AAAAHUjk1ng:APA91bFL6FLF8zDwey8jmVYULfBAxhjC_PT6frrM1Gg59tRcIEnivcZWEfVZGlOaG-C_2IfRrc6W6Mz963j9Ja7ghnJgXWqAWbvzmIzZboN8XXf2yDL8N8R_gTBanuDzVn_YkmuFbZuo';
        		$title       = $this->input->post('notification_title');
        		$body        = $this->input->post('description');
        		$image       = $img_url;
        		$push_datanotf   = array('title' => $title, 'timestamp' => time(), 'body' => $body, 'image' => $image, 'type' => 'request');
        		$push_data   = array('message' => $title, 'attachment' => $image, 'media_type' => 'image');
        		$arrayToSend = array('registration_ids' => $registrationIds, 'notification' => $push_datanotf,'data'=>$push_data, 'priority' => 'high','mutable_content' =>true,'content_available' =>true);
        
        		$json        = json_encode($arrayToSend);
        
        		$headers   = array();
        		$headers[] = 'Content-Type: application/json';
        		$headers[] = 'Authorization: key=' . $serverKey;
        		$ch        = curl_init();
        		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        		curl_setopt($ch, CURLOPT_POST, true);
        		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        		$result = curl_exec($ch);
        		curl_close($ch);
    			/*-- End Push notification --*/
			}
			$result = $this->Notification->save($data,$this->android);
			if($result){
				$this->session->set_flashdata('msg',array('message' => 'Notification send successfully.','class' => 'success','type'=>'Ok!'));
				redirect('notifications/send_android');
			}else{
				$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('notifications/send_android');
			} 
		}  

		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="notifications/add_notification_android";
		$this->load->view('layout', $content);
	}
	
    /*--- Send Push Notification Using Email ---*/ 	
	public function email(){
	    
	    $content['user'] = $this->Notification->user_list($this->uid,$this->users);
		$REQUESTMETHOD=$this->input->server('REQUEST_METHOD'); 
		if($REQUESTMETHOD== "POST"){  
			// Image
         	  $path=FCPATH . 'uploads/notifications';
    		  $image_name='push_picture';
    		  $image_data=$this->Notification->images_upload($image_name,$path);  
            
            // Image Url
            $img_url=base_url('uploads/notifications/').$image_data;
			$createdDate = date('Y-m-d H:i:s');
			/*-- Check User --*/
			$email=$this->input->post('usr_email');
			if(count($email)<=2){
			 //email   
			foreach($email as $get_email)
			{
			$deviceType = $this->input->post('devicetype');
			if($deviceType=='ANDROID'){
     			$out1 = $this->Notification->check_device_token_android_email($get_email,$deviceType,$this->users);
     			//print("<pre>".print_r($out1,true)."</pre>");die;
    			foreach($out1 as $out2)
    			{
    			    $out3=$out2->usr_devicetoken_android;
         			$registrationIds=array($out3);
        			
        			$data = array(
        				'push_title' => $this->input->post('notification_title'), 
        				'push_picture' => $image_data,
        				'push_picture_url' => $img_url,
        				'push_description' => $this->input->post('description'),
        				'push_type'=>$this->input->post('devicetype'),
        				'push_created' => date('Y-m-d H:i:s')
        			);
        			
        			
        			/*-- Push Notification --*/
                    $serverKey = 'AAAAHUjk1ng:APA91bFL6FLF8zDwey8jmVYULfBAxhjC_PT6frrM1Gg59tRcIEnivcZWEfVZGlOaG-C_2IfRrc6W6Mz963j9Ja7ghnJgXWqAWbvzmIzZboN8XXf2yDL8N8R_gTBanuDzVn_YkmuFbZuo';
            		$title       = $this->input->post('notification_title');
            		$body        = $this->input->post('description');
            		$image       = $img_url;
            		$push_datanotf   = array('title' => $title, 'timestamp' => time(), 'body' => $body, 'image' => $image, 'type' => 'request');
            		$push_data   = array('message' => $title, 'attachment' => $image, 'media_type' => 'image');
            		$arrayToSend = array('registration_ids' => $registrationIds, 'notification' => $push_datanotf,'data'=>$push_data, 'priority' => 'high','mutable_content' =>true,'content_available' =>true);
            
            		$json        = json_encode($arrayToSend);
            
            		$headers   = array();
            		$headers[] = 'Content-Type: application/json';
            		$headers[] = 'Authorization: key=' . $serverKey;
            		$ch        = curl_init();
            		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            		curl_setopt($ch, CURLOPT_POST, true);
            		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            		$result = curl_exec($ch);
            		curl_close($ch);
        			/*-- End Push notification --*/
    			}
    			$result = $this->Notification->save($data,$this->template);
			}elseif($deviceType=='IOS'){
			    $out1 = $this->Notification->check_device_token_email($get_email,$deviceType,$this->users);
			 //   echo "<pre>";
			 //   print_r($out1);die;
    			foreach($out1 as $out2){
    			    $out3=$out2->usr_devicetoken;
         			$registrationIds=array($out3);
                    //$out1='cLgHUjxMEUXkgnshHtKNBe:APA91bFioAeMsaNG2H54W4s3_lFl8NwOR3sbpiPSaSAKmHrbR3A3VplRK8BkurQCyMzYuyDOsRbMW7e7nL0A0Y8y_ThERunYyR0tdq2YEagJot2BSEWNktmWm5yANr9-lwviZmRagSSQ';
                    //$registrationIds=json_encode($out1);
                    //$registrationIds = array($out1);
        
                    //print_r($registrationIds);//die;
        			$data = array(
        				'push_title' => $this->input->post('notification_title'), 
        				'push_picture' => $image_data,
        				'push_picture_url' => $img_url,
        				'push_description' => $this->input->post('description'),
        				'push_type'=>$this->input->post('devicetype'),
        				'push_created' => date('Y-m-d H:i:s')
        			);
        			
        			
        			/*-- Push Notification --*/
        			//$serverKey = 'AAAA6T0E5dA:APA91bGc3dyNW_GZaX1OdIRws3-wS9ShRH-pSM2afRLxpjfoS4Ac4DTTmEYmOTuL6IrBGamyp7gantk7CZZ7B54OOLkZud7PfkLIWYPpSIoO5oqscyqM6-NJnjCig67KDMY4gqEdBMcG';
        			$serverKey = 'AAAAHUjk1ng:APA91bFL6FLF8zDwey8jmVYULfBAxhjC_PT6frrM1Gg59tRcIEnivcZWEfVZGlOaG-C_2IfRrc6W6Mz963j9Ja7ghnJgXWqAWbvzmIzZboN8XXf2yDL8N8R_gTBanuDzVn_YkmuFbZuo';
            		$title       = $this->input->post('notification_title');
            		$body        = $this->input->post('description');
            		$image       = $img_url;
            		$push_datanotf   = array('title' => $title, 'timestamp' => time(), 'body' => $body, 'image' => $image, 'type' => 'request');
            		$push_data   = array('message' => $title, 'attachment' => $image, 'media_type' => 'image');
            		$arrayToSend = array('registration_ids' => $registrationIds, 'notification' => $push_datanotf,'data'=>$push_data, 'priority' => 'high','mutable_content' =>true,'content_available' =>true);
            
            		$json        = json_encode($arrayToSend);
                    //	print_r($json);//die;
            
            		$headers   = array();
            		$headers[] = 'Content-Type: application/json';
            		$headers[] = 'Authorization: key=' . $serverKey;
            		$ch        = curl_init();
            		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            		curl_setopt($ch, CURLOPT_POST, true);
            		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            		$result = curl_exec($ch);
            		curl_close($ch);
            	    //echo json_encode($result);die;
        			/*-- End Push notification --*/
    			}
    			}
			    $result = $this->Notification->save($data,$this->android);
			}
			if($result){
				$this->session->set_flashdata('msg',array('message' => 'Notification send successfully.','class' => 'success','type'=>'Ok!'));
				redirect('notifications/email');
			}else{
				$this->session->set_flashdata('msg',array('message' => 'Unable to Added.Some error occurred.','class' => 'danger','type'=>'Oops!'));
				redirect('notifications/email');
			} 
			}else{
			    $this->session->set_flashdata('msg',array('message' => 'Maximum Email 50 ','class' => 'danger','type'=>'Oops!'));
				redirect('notifications/email');
			    
			}
		}  

		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="notifications/add_notification_email";
		$this->load->view('layout', $content);
	}
	
	/**
     * Send to a single device
     */
    public function sendToSingle(){
        
        $token = 'd3Fb2OUNUUsxnry-5DMw2q:APA91bHQ_hvBvSSNLD64yHe5ny-ibvv2I5v0g_gCObqRJEuoRnGllwfhuSU4ot3eEBan9ZB6-JJFMl9j0tzKdJb_LOKbM7GfY57Z-LhWBmcxejES2x8HlO9ICSabGv3IfJ8Rx_UXAUT0'; // push token
        $message = "Test notification message";
        //$this->load->library('fcm');
        $this->fcm->setTitle('Test FCM Notification');
        $this->fcm->setMessage($message);

        /**
         * set to true if the notificaton is used to invoke a function
         * in the background
         */
        $this->fcm->setIsBackground(false);

        /**
         * payload is userd to send additional data in the notification
         * This is purticularly useful for invoking functions in background
         * -----------------------------------------------------------------
         * set payload as null if no custom data is passing in the notification
         */
        $payload = array('notification' => '');
        $this->fcm->setPayload($payload);

        /**
         * Send images in the notification
         */
        $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');
        /**
         * Get the compiled notification data as an array
         */
        $json = $this->fcm->getPush();
        $p = $this->fcm->send($token, $json);
        print_r($p);
    }
    /**
     * Send to multiple devices
     */
    public function sendToMultiple(){
        $token = array('d3Fb2OUNUUsxnry-5DMw2q:APA91bHQ_hvBvSSNLD64yHe5ny-ibvv2I5v0g_gCObqRJEuoRnGllwfhuSU4ot3eEBan9ZB6-JJFMl9j0tzKdJb_LOKbM7GfY57Z-LhWBmcxejES2x8HlO9ICSabGv3IfJ8Rx_UXAUT0'); // array of push tokens
        $message = "Test notification message";

        $this->load->library('fcm');
        $this->fcm->setTitle('Test FCM Notification');
        $this->fcm->setMessage($message);
        $this->fcm->setIsBackground(false);
        // set payload as null
        $payload = array('notification' => '');
        $this->fcm->setPayload($payload);
        $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');
        $json = $this->fcm->getPush();

        /** 
         * Send to multiple
         * 
         * @param array  $token     array of firebase registration ids (push tokens)
         * @param array  $json      return data from getPush() method
         */
        $result = $this->fcm->sendMultiple($token, $json);
        print_r($result);
    } 
	
	public function remove() {         	
		$p_id=$this->uri->segment(3);		 
	    $path=FCPATH . 'uploads/notifications';
	    $productimg= $this->Notification->single_template($this->andid,$p_id,$this->android);
	    $img1= $path.'/'. $productimg->push_picture;  
        if (!unlink($img1)) {} else { }
		$this->Notification->remove_tmp($this->andid,$p_id,$this->android);	
		$this->session->set_flashdata('msg',array('message' => 'Data has been successfully Delete.','class' => 'success','type'=>'Ok!','icon'=>'thumbs-up'));
		redirect('notifications/android');
	}
	
	public function badrequest()
	{ 
		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="notifications/badrequest";
		$this->load->view('layout', $content);
	}			
	
}
