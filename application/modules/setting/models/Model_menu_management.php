<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class model_menu_management extends CI_Model {
	
	private $table 			= 'menu';
	private $column_order 	= array(null,'nama','uri','id_menu_induk','aktif',null);
	private $column_search 	= array('nama','uri','id_menu_induk','aktif');  
	private $order 			= array('id_menu' => 'desc'); 
	public	$nama  	  		= '';
	public	$uri  	  		= '';
	public	$id_menu_induk  = '';
	public	$aktif 	  	  	= '';
	
	private function _get_query() {
		$this->db->from($this->table);
		$this->db->where('aktif','Y');

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
	
	public function get_menu_management() {
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
	
	public function by_id_menu_management($id){
		$datasrc = $this->db->get_where('menu', array('id_menu' => $id));
		return $datasrc->num_rows() > 0 ? $datasrc->row() : $this;
	}
	
}

/* End of file Model_menu_management.php */
/* Location: ./application/modules/back_office/models/Model_menu_management.php */