<?php 
class Blog_model extends MY_Model{
		 

	function get_blog_list($table){		
		$this->db->select('blg_id,blg_title,blg_title_slug,blg_author_name,blg_pictures,blg_additionals,blg_categories,blg_descriptions,blg_created');	   
	     $this->db->order_by('blg_id','desc');
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}
	function blog_list($blog_id,$table){		
		$this->db->select('blg_id,blg_title,blg_title_slug,blg_author_name,blg_pictures,blg_additionals,blg_categories,blg_descriptions,blg_created');	   
	     $this->db->where('blg_id',$blog_id);
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->row();
		else return false;
	}

	function blog($blog_id,$table){		
		$this->db->select('blg_id,blg_title,blg_title_slug,blg_author_name,blg_pictures,blg_additionals,blg_categories,blg_descriptions,blg_created');	   
	     $this->db->where('blg_status','0');
	      $this->db->where('blg_id !=',$blog_id);
	     $this->db->limit('3');
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	function recent_blog($table){		
		$this->db->select('blg_id,blg_title,blg_title_slug,blg_author_name,blg_pictures,blg_additionals,blg_categories,blg_descriptions,blg_created');	   
		$this->db->order_by('blg_id','desc');	   
	     $this->db->where('blg_status','0');
	     $this->db->limit('5');
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows() != 0) return $query->result();
		else return false;
	}

	
}