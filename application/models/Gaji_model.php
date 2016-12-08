<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends MY_Model {

	private $table 			= 'hr_m_gaji';
	private $column_order 	= array(null,'hr_m_karyawan.nama_kary','hr_m_gaji.gaji_kary','hr_m_gaji.tunjangan_kary','hr_m_gaji.pph_kary',null);
	private $column_search 	= array('hr_m_karyawan.nik_kary','hr_m_gaji.nama_kary','hr_m_gaji.gaji_kary','hr_m_gaji.tunjangan_kary');  
	private $order 			= array('hr_m_gaji.id' => 'desc'); 
	
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
	   
        $this->getWhere();
		$this->db->from($this->table);
		 $this->db->where('hr_m_karyawan.deleted_at =',null);
	   $this->db->join('hr_m_karyawan','hr_m_karyawan.id = hr_m_gaji.id_kary');

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
       return $this->db->where('hr_m_gaji.kd_jns_usaha','JU001'); 
        
    }
	
}
/* End of file Model_users.php */
/* Location: ./application/modules/back_office/models/Model_users.php */