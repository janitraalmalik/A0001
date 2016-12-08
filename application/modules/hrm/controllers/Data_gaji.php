<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_gaji extends CI_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Data Gaji';
		$this->load->model('Gaji_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'hrm/data_gaji';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('Gaji/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
    
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->Gaji_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
			$no++;
			$row = array();
			
			$row[] = $no;
			$row[] = $grid->nama_kary;
<<<<<<< HEAD
			$row[] = number_format($grid->gaji_kary);
			$row[] = number_format($grid->naik_gaji_kary);
			$row[] = number_format($grid->tunjangan_kary);
			$row[] = number_format($grid->pph_kary);
=======
			$row[] = $grid->gaji_kary;
			//$row[] = $grid->naik_gaji_kary;
			$row[] = $grid->tunjangan_kary;
			$row[] = $grid->pph_kary;
>>>>>>> 3392c921a8de0281d77c023a6f99cf6058112476
			$row[] = '<div style="width:100%;text-align:center;">
                        <a 
                            class="btn btn-xs btn-flat btn-info" 
                            href="'.site_url($grid_state . '/edit/' .$grid->id).'" 
                            title="Update Data">Update</a> &nbsp;
                        <a 
                            class="btn btn-xs btn-flat btn-danger" 
                            onclick="return confirm(\'Are you sure to delete data ' . $grid->nama_kary . ' ?\')" 
                            href="'.site_url($grid_state . '/delete/'.$grid->id).'" 
                            title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Gaji_model->count_all(),
			"recordsFiltered" 	=> $this->Gaji_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}       
    
    private function form($action = 'insert', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
        $grid_state = $this->process_grid_state();
		$title = '';
        $contentData = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add ';
		} elseif ($this->uri->segment(3) == 'edit') {
			$title = 'Edit ';
            if($id != ''){
                $contentData = $this->Gaji_model->find($id,'id');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} 
        
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'back'		       => $grid_state,
            			'kary'		       => $this->db->query('select * from hr_m_karyawan where deleted_at is null')->result(),
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData
                        );
        
		$this->page->view('Gaji/form',$contect);
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){		
		if ( ! $this->input->post()) redirect('my404'); 
	   
        
		/*$this->form_validation->set_rules('nik_kary', 'NIK', 'required');
		$this->form_validation->set_rules('nama_kary', 'Nama Gaji', 'required');
		$this->form_validation->set_rules('alamat_kary', 'Alamat', 'required');
		$this->form_validation->set_rules('bagian_kary', 'Divisi', 'required');
		$this->form_validation->set_rules('telp_kary', 'Telp', 'required');
		$this->form_validation->set_rules('agama_kary', 'Agama', 'required');
		$this->form_validation->set_rules('sex_kary', 'Jenis Kelamin', 'required');
	
        
		if($this->form_validation->run()){*/
		  
    		$insertContent = array(
                                'id_kary'     	=> post('id_kary'),
								'gaji_kary'     => str_replace(',','',post('gaji')),
								//'naik_gaji_kary'   =>str_replace(',','', post('naik_gaji_kary')),
								'tunjangan_kary'      => str_replace(',','',post('tunjangan_kary')),
								'pph_kary'      => str_replace(',','',post('pph_kary')),
								'status'=> 0,
								'created_at' => DATE('Y-m-d h:i:s'),
                   				'kd_jns_usaha'  => 'JU001'
                            );
            $insert = $this->Gaji_model->add($insertContent);
            if($insert == true){
                redirect($this->page->base_url('/'));
            }
                            
		/*}else{
  		
			$ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' => 'Field is required.',
			);
            $this->session->set_flashdata('ui_messages',$ui_messages);
//            redirect('setting/users/add');       
            $this->form();
            return true;
		}*/
        redirect($this->page->base_url());
	}
	
	public function update($id){		
		if ( ! $this->input->post()) redirect('my404'); 

      /*  $this->form_validation->set_rules('nik_kary', 'NIK', 'required');
		$this->form_validation->set_rules('nama_kary', 'Nama Gaji', 'required');
		$this->form_validation->set_rules('alamat_kary', 'Alamat', 'required');
		$this->form_validation->set_rules('bagian_kary', 'Divisi', 'required');
		$this->form_validation->set_rules('telp_kary', 'Telp', 'required');
		$this->form_validation->set_rules('agama_kary', 'Agama', 'required');
		$this->form_validation->set_rules('sex_kary', 'Jenis Kelamin', 'required');
        
		if($this->form_validation->run()){*/
		    
			$updateContent = array(
                               'id_kary'     	=> post('id_kary'),
								'gaji_kary'     => str_replace(',','',post('gaji')),
								//'naik_gaji_kary'   =>str_replace(',','', post('naik_gaji_kary')),
								'tunjangan_kary'      => str_replace(',','',post('tunjangan_kary')),
								'pph_kary'      => str_replace(',','',post('pph_kary')),
								'status'=> 0,
								'created_at' => DATE('Y-m-d h:i:s'),
                   				'kd_jns_usaha'  => 'JU001'
			);		
			
            $this->Gaji_model->update($id,$updateContent,"id");
            
       /* }else{
            $ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' => 'Field is required.',
			);
            
            $this->session->set_flashdata('ui_messages',$ui_messages);
//            redirect('setting/users/add');       
            $this->form($id);
            return true;
		}*/
			
		redirect($this->page->base_url());
                
	}
	
	public function delete($id){
		if ($this->agent->referrer() == '') redirect('my404');
        
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->Gaji_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->Gaji_model->delete($id,'id');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */