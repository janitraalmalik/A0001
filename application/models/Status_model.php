<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends MY_Model {

	private $table 			= 'p_m_status';
	private $column_order 	= array(null,'sts_nama',null);
	private $column_search 	= array('sts_nama');  
	private $order 			= array('id' => 'desc'); 
	
	public	$username  	  	= '';
	public	$password  	  	= '';
	public	$name_users	  	= '';
	public	$photo 	  	  	= '';
	public	$blockage 	  	= '';
	public  $id_users_group	= '';
	public  $name_group		= '';
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        /* updated by same */
        $this->_user_id = 0;
        $this->_username = '';
        $this->tblName = $this->table;
        $this->tblId = 'id';
        /* end */
    }
	
	private function _get_query() {
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
	
	public function get_users() {
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
}
/* End of file Model_users.php */
/* Location: ./application/modules/back_office/models/Model_users.php */