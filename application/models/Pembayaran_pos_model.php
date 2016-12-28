<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_pos_model extends MY_Model {

	private $table 			= 'sa_t_pos_h_pembayaran';
	private $column_order 	= array(null,'sale_no','cust_nama','nilai_beli','nilai_bayar','tgl_bayar','sisa',null);
	private $column_search 	= array('sale_no','cust_nama','nilai_beli','nilai_bayar','tgl_bayar','sisa');  
	private $order 			= array('sa_t_pos_h_pembayaran.id' => 'desc'); 
	
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
		$this->db->select('sa_t_pos_h_pembayaran.*,sa_t_pos.sale_total,sa_m_customer.cust_nama');
		$this->db->from($this->table);
		 $this->db->where('sa_t_pos_h_pembayaran.deleted_at =',null);
	   
	   
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
		$this->db->join('sa_t_pos','sa_t_pos_h_pembayaran.sale_no = sa_t_pos.sale_no');
	   $this->db->join('sa_m_customer','sa_t_pos.cust_id = sa_m_customer.cust_id','left');
       return $this->db->where('sa_t_pos.sale_type','GROSIR'); 
        
    }
	
}
/* End of file Model_users.php */
/* Location: ./application/modules/back_office/models/Model_users.php */