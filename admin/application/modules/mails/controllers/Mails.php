<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mails extends MY_Controller {
	 
	public function __construct() {
		parent::__construct(); 
		$this->load->helper("common");	
		$this->login = $this->session->userdata('logged_in_admin');			
		if(empty($this->login)){
			redirect('login','refresh');
		} 	
		$this->load->model("Mails_model",'Mails');
		// TABLE ORDER TABLE //
		$this->msgid="msg_id";
		$this->mails="tbl_message";
		// FOR ORDER PRODUCT TABLE //
		$this->vndrid="vnd_id";
		$this->vendors="tbl_vendor";
	}
	
	/*--- CUSTOMER ORDER LIST ---*/ 
	public function index()
	{
		$permission=unserialize($this->login->mst_permission);
		if($this->login->mst_role=='0' || !empty($permission['mail_services'])){
		$content['admin']=admin_profile($this->login->mst_email);
		$content['newMsg'] = $this->Mails->get_new_message_list($this->msgid,$this->mails);
		$content['Msglist'] = $this->Mails->get_all_message_list($this->msgid,$this->mails);		
		$content['subview']="mails/mails_list";
		$this->load->view('layout', $content);
	    }else{
	    	redirect('dashboard');
	    }
	}

	public function compose()
	{
		$content['admin']=admin_profile($this->login->mst_email);
		$content['newMsg'] = $this->Mails->get_new_message_list($this->msgid,$this->mails);
		$content['vndrlist'] = $this->Mails->get_sellers_list($this->vndrid,$this->vendors);
		$content['subview']="mails/composeMail";
		$this->load->view('layout', $content);
	}

	public function sendMessage()
	{
		if(isset($_POST)){
			$createdDate = date('Y-m-d H:i:s');
			$receiverlist = $this->input->post('receiverlist');

			foreach($receiverlist as $rlist){
				$textMessage = array(
					'msg_sender'   => '0', 
					'msg_receiver' => $rlist,
					'msg_subject'  => $this->input->post('subject'),
					'msg_message'  => $this->input->post('summernote'),
					'msg_type'	   => '0',
					'msg_star'     => '0',
					'msg_status'   => '0',
					'msg_updated'  => $createdDate,
					'msg_created'  => $createdDate
				);

				$sendMessageToDB = $this->Mails->send_message($textMessage,$this->mails);
			}
			if($sendMessageToDB){
				$message = "success";  
				echo json_encode($message);
			}else{
				$message = "failed"; 
				echo json_encode($message);
			}
			
		}else{
			$message = "unauthrize"; 
			echo json_encode($message);
		}
	}

	public function replyMessage($replyid=null)
	{
		if(!empty($replyid)){
			$msgid = decode($this->input->post('message_id'));
			$receiver = decode($this->input->post('receiver'));
			$createdDate = date('Y-m-d H:i:s');
			$replyArray = array(
				'msg_sender'   => '0',
				'msg_receiver' => $receiver,
				'msg_message'  => $this->input->post('replyMessage'),
				'msg_reply'    => $msgid,
				'msg_updated'  => $createdDate,
				'msg_created'  => $createdDate,
			);
			$replied = $this->Mails->replyOnMessage($replyArray,$this->mails);
			if($replied){
				redirect('mails/read/'.$replyid);
			}else{
				redirect('mails');	
			}
		}else{
			redirect('mails');
		}
	}

	public function read($readid=null)
	{	
		if(!empty($readid)){

			$readId = decode($readid);
			$content['admin']=admin_profile($this->login->mst_email);
			$readArray = array(
				'msg_type' => '1' 
			);
			$this->Mails->update_message_read($this->msgid,$readId,$readArray,$this->mails);
			$content['newMsg'] = $this->Mails->get_new_message_list($this->msgid,$this->mails);
			$content['msgInfo'] = $this->Mails->get_message_info($this->msgid,$readId,$this->mails);
			$content['msgReply'] = $this->Mails->get_message_reply($this->msgid,$readId,$this->mails);
			$content['subview']="mails/readMail";
			$this->load->view('layout', $content);
		}else{
			$content['admin']=admin_profile($this->login->mst_email);
			$content['subview']="mails/badrequest";
			$this->load->view('layout', $content);
		}	
	}
    
    public function sent()
	{
		$content['admin']=admin_profile($this->login->mst_email);	
				$content['newMsg'] = $this->Mails->get_new_message_list($this->msgid,$this->mails);
		$content['SentList'] = $this->Mails->get_sent_message_list($this->msgid,$this->mails);
		$content['subview']="mails/sent_list";
		$this->load->view('layout', $content);
	}
	public function starred()
	{
		$content['admin']=admin_profile($this->login->mst_email);
		$content['newMsg'] = $this->Mails->get_new_message_list($this->msgid,$this->mails);
		$content['starredList'] = $this->Mails->get_starred_message_list($this->msgid,$this->mails);
		$content['subview']="mails/starred_list";
		$this->load->view('layout', $content);
	}

	public function makeAsRead()
	{
		$msgReadId = $this->input->post('selectedCheckBox');
		$msgExplode = explode(",",$msgReadId);
		foreach ($msgExplode as $msgId) {
			$readArray = array(
				'msg_type' => '1' 
			);
			$responseRead = $this->Mails->update_message_read($this->msgid,$msgId,$readArray,$this->mails);	
		}
		if($responseRead){
			echo "success";
		}else{
			echo "failed";
		}
	}

	public function makeAsStar()
	{
		$rowid = decode($this->input->post('rowid'));
		$star  = $this->input->post('starValue');
		if($star=='0'){
			$starArray = array(
				'msg_star'=> '1'
			);
			$setStar = $this->Mails->make_message_star($this->msgid,$rowid,$starArray,$this->mails);
			// $star='<i class="fa fa-star inbox-started"></i>';
			$content['myStar'] = '<i class="fa fa-star inbox-started" style="color: #ffab00;"></i>';
			$content['star'] = '1';
			echo json_encode($content);
		}else{
			$starArray = array(
				'msg_star'=> '0'
			);
			$setStar = $this->Mails->make_message_star($this->msgid,$rowid,$starArray,$this->mails);
			// $star='<i class="fa fa-star"></i>';
			$content['myStar'] = '<i class="fa fa-star-o"></i>';
			$content['star'] = '0';
			echo json_encode($content);
		}
	}

	public function removeMessage()
	{
		$msgReadId = $this->input->post('selectedCheckBox');
		$msgExplode = explode(",",$msgReadId);
		foreach ($msgExplode as $msgRemoveId) {
			$responseRemove = $this->Mails->remove_message($this->msgid,$msgRemoveId,$this->mails);	
		}
		if($responseRemove){
			echo "success";
		}else{
			echo "failed";
		}
	}



	/*--- UNAUTHRIZE ACCESS ---*/
	public function badrequest()
	{
		$content['admin']=admin_profile($this->login->mst_email);
		$content['subview']="orders/badrequest";
		$this->load->view('layout', $content);
	}
	
	
}
