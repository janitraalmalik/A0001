<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesPosDetail_model extends MY_Model {

	private $table 			= 'sa_t_posdetail'; 
	
    public function __construct(){
        parent::__construct();
        $this->load->database();
        /* updated by same */
        $this->_user_id = 0;
        $this->_username = '';
        $this->tblName = $this->table;
        $this->tblId = 'id';
        $roleSession = $this->session->userdata('roleSession');
        if(isset($roleSession['roleCd'])){
            $this->_roleCode = $roleSession['roleCd'];
        }else{
            $this->_roleCode = 0;
        }
        /* end */
    }
	
}
/* End of file Model_users.php */
/* Location: ./application/modules/back_office/models/Model_users.php */