<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SalesPos_model extends MY_Model {

	private $table 			= 'sa_t_pos';
	private $column_order 	= array(null,'sale_no','sale_tgl','cust_id','sale_type','sale_total',null);
	private $column_search 	= array('sale_no','sale_tgl','cust_id','sale_type','sale_total');  
	private $order 			= array('id' => 'desc'); 

	
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

    function set_variable($saletype) {
        $this->saletype = $saletype;
    }
	
	private function _get_query() {
	   
        $this->getWhere();
		$this->db->from($this->table);

		$i = 0;
		foreach ($this->column_search as $item) {
			if($_POST['search']['value']) {
				if($i===0){ 
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				
				if(count($this->column_search) - 1 == $i) 
					$this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order'])){
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
    
    public function get_data() {
		$this->_get_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function count_filtered() {
		$this->_get_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all() {
        $this->getWhere();
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
    
    public function getWhere(){
       
       $this->db->where('deleted_at =',null);
       $this->db->where('sale_type',$this->saletype);
       return $this->db->where('kd_jns_usaha',$this->_roleCode); 
        
    }
	
}
/* End of file Model_users.php */
/* Location: ./application/modules/back_office/models/Model_users.php */