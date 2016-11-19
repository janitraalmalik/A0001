<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {
	
	var $gallerypath;
	var $gallery_path_url;
	
	public function __construct() {
		parent::__construct();
		
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
		$this->load->model('model_users');
		
		$this->gallerypath = realpath(APPPATH . '../assets/photo_user');
		$this->gallery_path_url = base_url().'assets/photo_user/';
	}
	
	public function index() {
		$this->page->view('users_index', array (
			'add'		=> $this->page->base_url('/add')
		));
	}
	
	public function ajax_get_users(){
		$list = $this->model_users->get_users();
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $rc) {			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $rc->username;
			$row[] = $rc->name_users;
			$row[] = $rc->name_group;
			$row[] = $rc->blockage;
			$row[] = '<a href="'.site_url('/setting/users/edit/'.$rc->id).'" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';

			$data[] = $row;
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->model_users->count_all(),
			"recordsFiltered" 	=> $this->model_users->count_filtered(),
			"data" 				=> $data,
		);
		
		//output to json format
		echo json_encode($output);
	}
	
	private function form($action = 'insert', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
		$title = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add';
		} else {
			$title = 'Edit';
		}
		
		$this->page->view('users_form', array (
			'ttl'		=> $title,
			'back'		=> $this->agent->referrer(),
			'action'	=> $this->page->base_url("/{$action}/{$id}"),
			'users'		=> $this->model_users->by_id_users($id),
			'aksi'		=> $action,
		));
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){		
		if ( ! $this->input->post()) show_404(); 
		
		$konfigurasi = array('allowed_types' =>'jpg|jpeg|gif|png|bmp',
							 'upload_path' => $this->gallerypath);
							 
		$this->load->library('upload', $konfigurasi);
		$this->upload->do_upload();
		$datafile = $this->upload->data();
	
		$konfigurasi = array('source_image' => $datafile['full_path'],
							 'new_image' => $this->gallerypath . '/thumbnails',
							 'maintain_ration' => true,
							 'width' => 110,
							 'height' =>100);

		$this->load->library('image_lib', $konfigurasi);
		$this->image_lib->resize();
		
		$data = array(
			'username' 			=> $this->input->post('username'),
			'name_users'		=> $this->input->post('name_users'),
			'password' 			=> password($this->input->post('password')),
			'photo'	   			=> $_FILES['userfile']['name'],
			'id_users_group_fk'	=> $this->input->post('id_users_group_fk'),
			'blockage'   		=> $this->input->post('blockage')
		);
		$this->db->insert('users', $data);
		
		redirect($this->page->base_url());
	}
	
	public function update($id){		
		if ( ! $this->input->post()) show_404(); 
	
		$userfile = $_FILES['userfile']['name'];
		
		if(!empty($userfile)){
			$konfigurasi = array('allowed_types' =>'jpg|jpeg|gif|png|bmp',
								 'upload_path' => $this->gallerypath);
							 
			$this->load->library('upload', $konfigurasi);
			$this->upload->do_upload();
			$datafile = $this->upload->data();
	
			$konfigurasi = array('source_image' => $datafile['full_path'],
								'new_image' => $this->gallerypath . '/thumbnails',
								'maintain_ration' => true,
								'width' => 110,
								'height' =>100);

			$this->load->library('image_lib', $konfigurasi);
			$this->image_lib->resize();
		
			$data = array(
				'username' 			=> $this->input->post('username'),
				'name_users'		=> $this->input->post('name_users'),
				'password' 			=> password($this->input->post('password')),
				'photo'	   			=> $_FILES['userfile']['name'],
				'id_users_group_fk'	=> $this->input->post('id_users_group_fk'),
				'blockage'   		=> $this->input->post('blockage')
			);		
			$this->db->where('id_users', $id);
			$this->db->update('users', $data);
		}
		else{		
			$data = array(
				'username' 			=> $this->input->post('username'),
				'name_users'		=> $this->input->post('name_users'),
				'password' 			=> password($this->input->post('password')),
				'id_users_group_fk'	=> $this->input->post('id_users_group_fk'),
				'blockage'   		=> $this->input->post('blockage')
			);		
			$this->db->where('id_users', $id);
			$this->db->update('users', $data);	
		}
		
		redirect($this->page->base_url());
	}
	
	public function delete($id){
		if ($this->agent->referrer() == '') show_404();
		
		$this->db->delete('users', array('id_users' => $id));
		redirect($this->agent->referrer());
	}

}

/* End of file Users.php */
/* Location: ./application/modules/master/controllers/Users.php */