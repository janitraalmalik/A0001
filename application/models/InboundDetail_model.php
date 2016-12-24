<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InboundDetail_model extends MY_Model {

	private $table 			= 'i_t_inbound'; 
	
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

    public function getLastStock($kd_barang){
       $sql =   $this->db->select('stok')
                ->where('brg_kd',$kd_barang)
                ->where('kd_jns_usaha',$this->_roleCode)
                ->get('p_m_barang')
                ->row();
       return $sql; 

    }

    public function getLastInboundValue($poNo){
        $sql =   $this->db->select_sum('jml_in')
                ->where('po_no',$poNo)
                ->where('kd_jns_usaha',$this->_roleCode)
                ->get('i_t_inbound')
                ->row();
        return $sql; 

    }

    public function getLastPOdetailValue($poNos){
        $sql =   $this->db->select_sum('jml_barang')
                ->where('po_no',$poNos)
                ->where('kd_jns_usaha',$this->_roleCode)
                ->get('p_t_podetail')
                ->row();
        return $sql; 

    }
	
}
/* End of file Model_users.php */
/* Location: ./application/modules/back_office/models/Model_users.php */
