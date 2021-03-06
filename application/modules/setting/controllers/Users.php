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
        $this->moduleTitle = 'Users';
        
	}
	
	public function index() {
		$this->page->view('users_index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => 'List Users',
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
        $user_jnsUsaha = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add User';
		} elseif ($this->uri->segment(3) == 'edit') {
			$title = 'Edit User';
            $users_jns_usaha = $this->model_users->users_jns_usaha($id);
            $user_jnsUsaha = array();
            if(count($users_jns_usaha->result()) >= 1){
                foreach($users_jns_usaha->result() as $row){
                    $user_jnsUsaha[] = $row->jns_usaha_id;
                }
            }
		}
        
		$this->page->view('users_form', array (
			'ui_messages'      => $this->session->flashdata('ui_messages'),
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => $title,
			'jnsUsaha'         => $this->model_users->getAllJns(),
			'usersGroup'         => $this->model_users->get_users_group(),
			'back'		       => $this->agent->referrer(),
			'action'	=> $this->page->base_url("/{$action}/{$id}"),
			'users'		=> $this->model_users->by_id_users($id),
			'users_jns_usaha'		=> $user_jnsUsaha,
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
		if ( ! $this->input->post()) redirect('my404'); 
	   	
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('name_users', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]');
        $this->form_validation->set_rules("repassword", "Confirm Password", 'required');
        
        if(count(post('jnsUsaha')) == 0){  
		  $this->form_validation->set_rules('jnsUsaha', 'Jenis Usaha', 'required');
        }
        
		if($this->form_validation->run()){
		  
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
    		
            $insert_id =$this->model_users->add($data);
            
            $jnsUsaha = post('jnsUsaha');
            
            foreach($jnsUsaha as $key => $val){
                $data = array(
        			'user_id' 			=> $insert_id,
        			'jns_usaha_id'		=> $val
        		);
    		  $this->db->insert('users_jns_usaha', $data);
            }
                            
		}else{
			$ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => 'Isian Masih Salah',
				'message' => 'Silakan perbaiki isian sesuai yang tertera',
			);
            $this->session->set_flashdata('ui_messages',$ui_messages);
//            redirect('setting/users/add');       
            $this->form();
            return true;
		}
        redirect($this->page->base_url());
	}
	
	public function update($id){		
		if ( ! $this->input->post()) redirect('my404'); 
	
		$userfile = $_FILES['userfile']['name'];
		
		if(!empty($userfile)){
		  
            $this->form_validation->set_rules('username', 'username', 'required');
    		$this->form_validation->set_rules('name_users', 'Nama', 'required');
            
            if(count(post('jnsUsaha')) == 0){  
    		  $this->form_validation->set_rules('jnsUsaha', 'Jenis Usaha', 'required');
            }
            
    		if($this->form_validation->run()){
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
    			
                $this->model_users->update($id,$data,"id");
                
    			$this->db->delete('users_jns_usaha', array('user_id' => $id));
                
                $jnsUsaha = post('jnsUsaha');
            
                foreach($jnsUsaha as $key => $val){
                    $data = array(
            			'user_id' 			=> $id,
            			'jns_usaha_id'		=> $val
            		);
        		  $this->db->insert('users_jns_usaha', $data);
                }
                
            }else{
    			$ui_messages[] = array(
    				'severity' => 'ERROR',
    				'title' => 'Isian Masih Salah',
    				'message' => 'Silakan perbaiki isian sesuai yang tertera',
    			);
                $this->session->set_flashdata('ui_messages',$ui_messages);
    //            redirect('setting/users/add');       
                $this->form($id);
                return true;
    		}
			
		}
		else{		
		  
            $this->form_validation->set_rules('username', 'username', 'required');
    		$this->form_validation->set_rules('name_users', 'Nama', 'required');
            
            if(count(post('jnsUsaha')) == 0){  
    		  $this->form_validation->set_rules('jnsUsaha', 'Jenis Usaha', 'required');
            }
            
    		if($this->form_validation->run()){
    		  
                $data = array(
    				'username' 			=> $this->input->post('username'),
    				'name_users'		=> $this->input->post('name_users'),
    				'password' 			=> password($this->input->post('password')),
    				'id_users_group_fk'	=> $this->input->post('id_users_group_fk'),
    				'blockage'   		=> $this->input->post('blockage')
    			);		
                
                $this->model_users->update($id,$data,"id");
                
                $this->db->delete('users_jns_usaha', array('user_id' => $id));
                
                $jnsUsaha = post('jnsUsaha');
            
                foreach($jnsUsaha as $key => $val){
                    $data = array(
            			'user_id' 			=> $id,
            			'jns_usaha_id'		=> $val
            		);
        		  $this->db->insert('users_jns_usaha', $data);
                }
              
            }else{
    			$ui_messages[] = array(
    				'severity' => 'ERROR',
    				'title' => 'Isian Masih Salah',
    				'message' => 'Silakan perbaiki isian sesuai yang tertera',
    			);
                $this->session->set_flashdata('ui_messages',$ui_messages);
    //            redirect('setting/users/add');       
                $this->form($id);
                return true;
    		}
          
			
		}
		
		redirect($this->page->base_url());
	}
	
	public function delete($id){
		if ($this->agent->referrer() == '') redirect('my404');
		
		$this->db->delete('users', array('id_users' => $id));
		redirect($this->agent->referrer());
	}
    
    
    public function jnsusaha($data)
    {
        $this->form_validation->set_message('jnsusaha', 'The %s field is not a valid time');
       if(count($data) >= 1)
       {
         return TRUE;
       }
       else
       {
         return FALSE;
       }
    }

}

/* End of file Users.php */
/* Location: ./application/modules/master/controllers/Users.php */