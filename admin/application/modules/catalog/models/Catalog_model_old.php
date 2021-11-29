<?php 
class Catalog_model extends MY_Model{
	
	  
	 function getlist($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"desc");
		  $query=$this->db->get($table);
		   $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	

	function featured_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"desc");
		  	 $this->db->where('p_feature','1');	
		  $query=$this->db->get($table);		
		 $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}


 function getfeatured($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"desc");
		  	 $this->db->where('p_feature','0');	
		  $query=$this->db->get($table);		
		 $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	function trending_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"desc");
		    $this->db->where('p_trending','1');	
		  $query=$this->db->get($table);		 
		   $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function single_record($fld_id,$id,$tabel){
		 $this->db->order_by($fld_id,"desc");
		 $this->db->where($fld_id,$id);	
		 $this->db->limit(1);	
		 $query=$this->db->get($tabel);
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	 }
	function profiledata($fld_email,$email,$tabel){
		 
		 $this->db->where($fld_email,$email);	
		 $this->db->limit(1);	
		 $query=$this->db->get($tabel);
		 if($query->num_rows()== 1){
			return $query->row();
		 }else{
			 return false;
		 }
		 
	 }
	 
	function check_password($fld_email,$fld_password,$email,$password,$tabel){
	  
        $this->db->where($fld_email,$email);		
		$this->db->where($fld_password,$password);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);	 
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }	  
		
	}

	function check($fld_name,$fld_id,$tabel){
	   //$this->db->where($fld_name1,$fld_id1);
        $this->db->where($fld_name,$fld_id);
        $this->db->limit(1);		
		$query=$this->db->get($tabel);
	 $this->db->last_query($query);
		if($query->num_rows()== 1)
	    {
		 return $query->row();
	    }
	    else
	    {
		 return false;
	    }	  
		
	}

	public function save($data,$table)
    {
        $this->db->insert($table , $data);
        return $this->db->insert_id();
    }

    public function inventry_save($data,$table)
    {
        $this->db->insert_batch($table , $data);
        return $this->db->insert_id();
    }

	 
	public function update($fld_email,$email,$data,$table) {
        $this->db->where($fld_email, $email);
        $query=$this->db->update($table, $data);
        if($query){
			return true;
		}else{
			return false;
		}
    } 

     public function delete($fld_email,$email,$table) {
        $this->db->where($fld_email, $email);
        $this->db->delete($table);
    } 

	 
	function images_upload($image_name,$path) {	
		$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $path,
			'file_name' => date('YmdHms').'_'.rand(1,999999),
			'max_size' => 20000
		);		 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);	
		if($this->upload->do_upload($image_name))
			{
				$uploaded = $this->upload->data();
				$arr[$image_name] = $uploaded['file_name'];
			}
        $createdDate = strtotime(date('Y-m-d H:i:s'));	 
		return $names=$arr[$image_name]; 	    
        
	}

	function location_list($fld_name,$fld_status,$table){
		  $this->db->order_by($fld_name,"asc");
	      $this->db->where($fld_status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function get_inventry($fld,$id,$tabel)
	{
		$this->db->order_by('int_id','asc');
		 $this->db->where($fld,$id);
		$query=$this->db->get($tabel);
		$this->db->last_query($query);
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->result();
			}
	 }

	function single_product($fld,$id,$tabel)
	{
		 $this->db->where($fld,$id);
		 $this->db->order_by($fld,'asc');
		$query=$this->db->get($tabel);
		//$this->db->last_query($query);
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->row();
			}
	 }

	function get_single_product($id)
	{

	$this->db->select('PD.p_id,PD.p_cate,PD.p_scate,PD.p_child,PD.p_reference_no,PD.p_name,PD.p_model,PD.p_brand,PD.p_selling_price,CT.cate_id,CT.cate_name AS cate_name,SCT.scate_id,SCT.scate_name AS scate_name,CHT.child_id,CHT.child_name AS child_name,BT.brd_id,BT.brd_name AS brand_name');
    $this->db->from('tbl_product AS PD');
    $this->db->where('PD.p_id', $id);
    $this->db->join('tbl_category AS CT', 'CT.cate_id = PD.p_cate', 'left');
    $this->db->join('tbl_sub_category AS SCT', 'SCT.scate_id = PD.p_scate', 'left');
    $this->db->join('tbl_child_category AS CHT', 'CHT.child_id = PD.p_child', 'left'); 
    $this->db->join('tbl_brand AS BT', 'BT.brd_id = PD.p_brand', 'left');    
    $query = $this->db->get();   
	 $this->db->last_query($query);
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->row();
			}
	 }

 function category_list($fld,$id,$tabel)
	{
		 $this->db->where($fld,$id);
		$query=$this->db->get($tabel);
		$this->db->last_query($query);
          if($query->num_rows() ==''){
		     return '';
			}else{		
		     return $query->row();
			}
	 }

	 function cate_list($fld_id,$remove,$status,$table){	
	
		  $this->db->order_by($fld_id,"asc");
		  $this->db->where($remove,'0');
		  $this->db->where($status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}
	function unit_list($fld_name,$fld_status,$table){
		  $this->db->order_by($fld_name,"asc");
	      $this->db->where($fld_status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function policy_list($table){		    
		  $this->db->order_by('pp_id',"asc");		  	
		  $this->db->where('pp_status','1');		
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}


	function seller_list(){		   
	  $this->db->select('vnd_id,vnd_name');	 
		  $this->db->order_by('vnd_name',"asc");		  	
		  $this->db->where('vnd_status','1');		
		  $query=$this->db->get('tbl_vendor');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	 function brd_list($table){		    
		  $this->db->order_by('brd_name',"asc");
		  $this->db->where('brd_status','1');	
		  $this->db->where('brd_remove','0');		
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}
	 function option_list($table){		      
		  $this->db->order_by('opt_id',"asc");
		  $this->db->where('opt_status','1');
		  	   // $this->db->where('vnd_id','0');	
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	 function option_gorup_list(){
		  $this->db->order_by('opt_id',"asc");
		  $this->db->where('opt_status','1');
		   // $this->db->where('vnd_id','0');
		  $query=$this->db->get('tbl_option');
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function getCateList($fld_id,$id,$name,$remove,$status,$table){	
	
		  $this->db->order_by($name,"asc");
		  $this->db->where($fld_id,$id);
		  $this->db->where($remove,'0');
		  $this->db->where($status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}
	function get_Cate_filter($fld_id,$id,$name,$remove,$status,$table){	
	
		  $this->db->order_by($name,"asc");
		  $this->db->like($fld_id,$id);
		  $this->db->where($remove,'0');
		  $this->db->where($status,'1');
		  $this->db->limit(5);
		  $query=$this->db->get($table);
		// echo $this->db->last_query($query);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

	function cate_export_list($select,$fld_id,$remove,$status,$table){	
		  $this->db->select($select);
		  $this->db->order_by($fld_id,"asc");
		  $this->db->where($remove,'0');
		  $this->db->where($status,'1');
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function scate_export_list($select,$fld_id,$remove,$status,$table)
	{	
		
	      $this->db->select($select);
		  $this->db->order_by($fld_id,"asc");
		  $this->db->where($remove,'0');
		  $this->db->where($status,'1');		 	
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function Product_export_list($table)
	{	
		  $this->db->order_by('p_id',"DESC");		  
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function export_list($fld_id,$table)
	{	
		  $this->db->order_by($fld_id,"DESC");		
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
	}

	function get_location_list($fld_id,$table){	
	
		  $this->db->order_by($fld_id,"asc");		
		  $query=$this->db->get($table);
		   if($query->num_rows() ==''){
				return '';
				}else{
				return $query->result();
			}
		
	}

public function main_images_upload($path) {
	$config = array(
			'allowed_types' => 'jpg|jpeg|gif|png|webp',
			'upload_path' => $path,
			'file_name' => date('YmdHms').'_'.rand(1,999999),
			'max_size' => 200000
		);		 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);	
		if($this->upload->do_upload('img'))
			{
				$uploaded = $this->upload->data();
				$arr['img'] = $uploaded['file_name'];
				$this->resize_image_large($uploaded['file_name'],'311','420',$path,$path);
			//$this->resize_image_large($uploaded['file_name'], '800', '1080', $path, $path);
				//$this->watermark_image($uploaded['file_name'],$path);
			}
        $createdDate = strtotime(date('Y-m-d H:i:s'));	 
		return $names=@$arr['img']; 
	}

 function resize_image_large($file_path,$width,$height,$old_path,$new_path){
    $this->load->library('image_lib');
    $configlarge['image_library'] = 'gd2';
    $configlarge['source_image'] = $old_path.'/'.$file_path;
    $configlarge['new_image'] = $new_path.'/'.$file_path;
    $configlarge['maintain_ratio'] = TRUE;
    $configlarge['width'] = $width;
    $configlarge['height'] = $height;
    $this->image_lib->clear();
    $this->image_lib->initialize($configlarge);
    $this->image_lib->resize();
}

 function watermark_image($file_path,$path){
 $this->load->library('image_lib');
 $new_path=FCPATH .'assets/fonts/feather/texb.ttf';
 	$config['source_image'] = $path.'/'.$file_path;
        //The image path,which you would like to watermarking
        $config['wm_text'] = 'ZAHI-OM.COM';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = $new_path;
        $config['wm_font_size'] = 16;
        $config['wm_font_color'] = 'c19450';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '10';
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();      

}


function watermark_image1($file_path,$path){
 $this->load->library('image_lib');
 $new_path=FCPATH .'assets/fonts/feather/texb.ttf';
 	$config['source_image'] = $path.'/'.$file_path;
        //The image path,which you would like to watermarking
        $config['wm_text'] = 'ZAHI-OM.COM';
        $config['wm_type'] = 'text';
        $config['wm_font_path'] = $new_path;
        $config['wm_font_size'] = 56;
        $config['wm_font_color'] = 'c19450';
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '10';
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();      

}


	
	
}