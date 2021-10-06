<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Model{
    function __construct() {
        $this->tableName = 'tbl_customer';
        $this->primaryKey = 'cust_id';
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('cust_id,cust_fname,cust_lname,cust_email,cust_status');
            $this->db->from($this->tableName);
            $this->db->where(array('cust_oauth_provider'=>$userData['cust_oauth_provider'], 'cust_oauth_uid'=>$userData['cust_oauth_uid']));
            //echo $this->db->last_query();
            $prevQuery = $this->db->get();
            
            if($prevQuery->num_rows() > 0){
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $userData['cust_updated'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('cust_id'=>$prevResult['cust_id']));
                
                //get user ID
                $userID = $prevQuery->row_array();
            }else{
                //insert user data
                $userData['cust_created']  = date("Y-m-d H:i:s");
                $userData['cust_updated'] = date("Y-m-d H:i:s");
                $insert = $this->db->insert($this->tableName,$userData);
                
                //get user ID
                $userID = $prevQuery->row_array();
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
}