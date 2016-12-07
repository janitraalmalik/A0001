<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbound_model extends MY_Model {

	private $table 			= 'v_i_inbound_grid';
	private $column_order 	= array('id_inbound','date_in',null,'brg_nama',null,null,null,null,null);
	private $column_search 	= array('id_inbound','brg_nama','date_in');  
	private $order 			= array('date_in' => 'desc'); 
    
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
       
       $this->db->where('deleted_by =',0);
       return $this->db->where('kd_jns_usaha',$this->_roleCode); 
        
    }
    
   public function getPO(){
	 $sql =   $this->db->select('po_no,po_desc')
				->where('kd_jns_usaha',$this->_roleCode)
				->where('status_po_id','1')
				->get('p_t_po')
				->result();
	   return $sql; 
   }
   
   
   public function itemPO($poNO){
	$sqld = "select a.kd_barang,
						a.kd_satuan,
						b.satuan_name,
						a.jml_barang
			from p_t_podetail  a
			left join p_m_satuan b on a.kd_satuan = b.id
			where a.po_no = '".$poNO."' ";
	$sql = $this->db->query($sqld);
	return $sql->result();			
	   
   }
   
   
   
	
}
/* End of file Model_users.php */
/* Location: ./application/modules/back_office/models/Model_users.php */
