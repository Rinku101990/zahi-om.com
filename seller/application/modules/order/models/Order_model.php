<?php 
class Order_model extends MY_Model{	 

	function order_list($vnd_fld_id,$vnd_id,$table)
	{
        $this->db->select('pd.*,ord.ord_reference_no,ord.ord_pay_mode,ord.order_status');	       
	    $this->db->order_by('`pd`.`op_id`',"DESC");
	    $this->db->from($table .' pd');
	    $this->db->join('tbl_orders ord','ord.ord_id=pd.ord_id','LEFT');	
	    $this->db->where('`ord`.`order_status` !=','Waiting');
	    //$this->db->where('`ord`.`order_status` !=','Pending');
	    $this->db->where('`ord`.`status`','2');
	    $this->db->where(`pd`.$vnd_fld_id,$vnd_id);			 		
	    $query=$this->db->get();
	    //echo $this->db->last_query($query)	;
	  
	    if($query->num_rows() ==''){
			return '';
			}else{
			return $query->result();
		}
	}

function order_detail($op_fld_id,$op_id,$table){
	      $this->db->select('pd.*,ord.ord_reference_no,ord.ord_pay_mode,ord.order_status,ord.ord_deliver_charge');	       
		  $this->db->order_by('`pd`.`op_id`',"DESC");
		  $this->db->from($table .' pd');
		  $this->db->join('tbl_orders ord','ord.ord_id=pd.ord_id','LEFT');	
		    $this->db->where('`ord`.`order_status` !=','Waiting');
		  $this->db->where(`pd`.$op_fld_id,$op_id);			 		
		  $query=$this->db->get();
		 //echo $this->db->last_query($query)	;
		  
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->row();
			}
	}

function cancel_list($vnd_fld_id,$vnd_id,$table){
	      $this->db->select('cr.c_status,cr.c_comment,cr.c_created,pd.p_name,car.cr_name,ord.ord_reference_no');	      
		  $this->db->order_by('`cr`.`c_id`',"DESC");
		  $this->db->from($table .' cr');
		  $this->db->join('tbl_cancellation_reason car','car.cr_id=cr.c_reason_id','LEFT');	
		  $this->db->join('tbl_product pd','pd.p_id=cr.c_pro_id','LEFT');	
		  $this->db->join('tbl_orders ord','ord.ord_id=cr.c_order_id','LEFT');	
		  $this->db->where(`cr`.$vnd_fld_id,$vnd_id);			 		
		  $query=$this->db->get();
		 // echo $this->db->last_query($query)	;
		 //  exit();
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	
	
}