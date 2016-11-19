<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FaultCodeItemsDetail_model extends MY_Model {
	
	private $table 			= 'm_faultCodeItemDtl';
	private $column_order 	= array(null,'m_faultCodeItem.fName','m_faultCodeItemDtl.fCode','m_faultCodeItemDtl.fName',null);
	private $column_search 	= array('m_faultCodeItemDtl.id','m_faultCodeItemDtl.fCode','m_faultCodeItemDtl.fName',null);  
	private $order 			= array('m_faultCodeItemDtl.id' => 'DESC'); 
	public	$nama  	  		= '';
	public	$uri  	  		= '';
	public	$id_menu_induk  = '';
	public	$aktif 	  	  	= '';
	
    public function __construct(){
        parent::__construct();
        $this->load->database();
        /* updated by same */
        $this->tblName = $this->table;
        /* end */
    }
    
	private function _get_query() {
        $this->db->where($this->table .'.deleted_at =',null);
		$this->db->select('m_faultCodeItemDtl.id, m_faultCodeItemDtl.fCode, m_faultCodeItemDtl.fName, m_faultCodeItem.fName as catItem');
		$this->db->from($this->table);
		$this->db->join('m_faultCodeItem', 'm_faultCodeItemDtl.fType = m_faultCodeItem.fCode');
		
		$i = 0;
		foreach ($this->column_search as $item) {
			if($_POST['search']['value']) {
				if($i===0){ 
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else{
					$this->db->like($item, $_POST['search']['value']);
                    //die(print_r($item));
				}
				
				if(count($this->column_search) - 1 == $i) 
					$this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order'])){
            //die(print_r($_POST['order']));
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function is_code_exist($code) {
		$this->db->where('fCode', $code);
		$num = $this->db->get($this->table)->num_rows();
		if ($num > 0) return FALSE;
		return TRUE;
	}
}

/* End of file Model_ac_delivery_report.php */
/* Location: ./application/modules/aircraft_status/models/Model_ac_delivery_report.php */