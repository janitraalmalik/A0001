<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_group extends MX_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
		$this->load->model('model_users');
	}
	
	public function index() {
		$this->page->view('users_group_index', array (
			'add'		=> $this->page->base_url('/add'),
			'grid'		=> $this->model_users->get_users_group(),
		));
	}
	
	private function form($action = 'insert', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
		$title = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add';
		} else {
			$title = 'Edit';
		}
		
		$this->page->view('users_group_form', array (
			'ttl'			=> $title,
			'back'			=> $this->agent->referrer(),
			'action'		=> $this->page->base_url("/{$action}/{$id}"),
			'users_group'	=> $this->model_users->by_id_users_group($id),
			'aksi'			=> $action,
			'menu'			=> $this->model_users->get_menu($id),
			'submenu'		=> $this->model_users->get_submenu($id),
		));
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){		
		$data = array('name_group' => $this->input->post('name_group'));
		
		$this->db->insert('users_group', $data);
		$id_users_group = $this->db->insert_id();
		
		$menu = $this->input->post('id_menu');
		if($menu != ''){
			foreach ($menu as $p){
				if($p != '0'){
					$this->db->insert('menu_akses', array('id_menu_fk' => $p, 'id_users_group_fk' => $id_users_group));
				}			
			}
		}
		
		redirect($this->page->base_url());
	}
	
	public function update($id){
		$data = array('name_group' => $this->input->post('name_group'));
		
		$this->db->where('id_users_group', $id);
		$this->db->update('users_group', $data);
		
		$menu = $this->input->post('id_menu');
		if($menu != ''){
			$this->db->delete('menu_akses',array('id_users_group_fk' => $id));
			foreach ($menu as $p) {
				if($p != '0')
				{					
					$this->db->insert('menu_akses', array('id_menu_fk' => $p,'id_users_group_fk' => $id));
				}			
			}
		}	
		
		redirect($this->page->base_url());
	}
	
	public function options_users_group($id){
		$users_group = $this->db->order_by('name_group')->get('users_group');
		return options($users_group, 'id_users_group', $id, 'name_group');
	}

}

/* End of file users_group.php */
/* Location: ./application/modules/master/controllers/users_group.php */