<?php 
class Mails_model extends MY_Model{
	
	public function get_sellers_list($vndrid,$table)
	{
		$this->db->select('vnd_id,vnd_name,vnd_email');
		$this->db->where('vnd_status','1');
		$this->db->order_by($vndrid,'DESC');
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_all_message_list($msgid,$table)
	{
		$this->db->where('msg_receiver','0');	
	    $this->db->where('msg_status','0');	
		$this->db->where('msg_reply','0');			
		$this->db->order_by($msgid,'DESC');
		$query = $this->db->get($table);
	    //echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

     public function get_sent_message_list($msgid,$table)
	{
		 $this->db->where('msg_sender','0');
		 $this->db->where('msg_status','0');
		  $this->db->where('msg_reply','0');		
		$this->db->order_by($msgid,'DESC');
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	} 

	public function get_starred_message_list($msgid,$table)
	{
		$this->db->where("(msg_sender='0' OR msg_receiver = '0')");	 
		$this->db->where('msg_status','0');
		$this->db->where('msg_reply','0');
		$this->db->where('msg_star','1');		
		$this->db->order_by($msgid,'DESC');
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


	public function get_new_message_list($msgid,$table)
	{
		$this->db->select('COUNT(msg_id) AS new');
		$this->db->where('msg_type','0');
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function send_message($textMessage,$table)
	{
		$this->db->insert($table , $textMessage);
        return $this->db->insert_id();
	}

	public function replyOnMessage($replyArray,$table)
	{
		$this->db->insert($table,$replyArray);
        return $this->db->insert_id();
	}

	public function get_message_info($msgid,$readId,$table)
	{
		$this->db->select('vnd.vnd_name,vnd.vnd_email,vnd_picture, msg.*');
		$this->db->join('tbl_vendor vnd','msg.msg_receiver=vnd.vnd_id','LEFT');
		$this->db->where('msg.'.$msgid,$readId);
		$query = $this->db->get($table.' msg');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function get_message_reply($msgid,$readId,$table)
	{
		$this->db->select('vnd.vnd_name,vnd.vnd_email,vnd_picture, msg.*');
		$this->db->join('tbl_vendor vnd','msg.msg_receiver=vnd.vnd_id','LEFT');
		$this->db->where('msg.msg_reply',$readId);
		$this->db->order_by('msg.'.$msgid,'ASC');
		$query = $this->db->get($table.' msg');
		// echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function update_message_read($msgid,$msgId,$readArray,$table)
	{
		$this->db->where($msgid,$msgId);
		$query=$this->db->update($table, $readArray);
		//cho $this->db->last_query();
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function make_message_star($msgid,$rowid,$starArray,$table)
	{
		$this->db->where($msgid,$rowid);
		$query=$this->db->update($table, $starArray);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	public function remove_message($msgid,$msgRemoveId,$table)
	{
		$this->db->where($msgid,$msgRemoveId);
		$query=$this->db->delete($table);
		if($query){
			return true;
		}else{
			return false;
		}
	}









	public function get_order_info($ordid,$incvid,$table)
	{
		$this->db->select('ship.shippingFirstName,ship.shippingLastName,ship.shippingNumber,ship.shippingEmail,ship.shippingAddress,ord.*');
		$this->db->join('tbl_shipping_address ship','ord.ord_delivery_address=ship.fld_id','LEFT');
		$this->db->where('ord.'.$ordid, $incvid);
		$this->db->order_by('ord.'.$ordid, 'DESC');
		$query = $this->db->get($table.' ord');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function get_order_product($ordid,$incvid,$table)
	{
		$this->db->select('*');
		$this->db->where($ordid, $incvid);
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function update_order_status($ordid, $uordid, $status, $table)
	{
		$this->db->where($ordid, $uordid);
        $query=$this->db->update($table, $status);
        if($query){
			return true;
		}else{
			return false;
		}
	}
	
}