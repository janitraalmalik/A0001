<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_customer extends MY_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Data Customer';
		$this->load->model('Customer_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'sales/data_customer';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('Customer/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
    
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->Customer_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
			$no++;
			$row = array();
			
			$row[] = $no;
			$row[] = $grid->cust_id;
			$row[] = $grid->cust_nama;
			$row[] = $grid->cust_hp;
			$row[] = $grid->cust_alamat;
			$row[] = $grid->cust_status;
			$row[] = '<div style="width:100%;text-align:center;">
                        <a 
                            class="btn btn-xs btn-flat btn-info" 
                            href="'.site_url($grid_state . '/edit/' .$grid->id).'" 
                            title="Update Data">Update</a> &nbsp;
                        <a 
                            class="btn btn-xs btn-flat btn-danger" 
                            onclick="return confirm(\'Are you sure to delete data ' . $grid->cust_nama . ' ?\')" 
                            href="'.site_url($grid_state . '/delete/'.$grid->id).'" 
                            title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Customer_model->count_all(),
			"recordsFiltered" 	=> $this->Customer_model->count_filtered(),
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
                $contentData = $this->Customer_model->find($id,'id');
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
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData
                        );
        
		$this->page->view('Customer/form',$contect);
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){		
		if ( ! $this->input->post()) redirect('my404'); 
	   
        
		$this->form_validation->set_rules('cust_nama', 'Nama Customer', 'required');
		$this->form_validation->set_rules('cust_hp', 'Telp', 'required');
		$this->form_validation->set_rules('cust_alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('cust_status', 'Status', 'required');
	
        
		if($this->form_validation->run()){
		  
			$generateCodeCustomer = generateCodeCustomer($this->_roleCode);
			
    		$insertContent = array(
                                'cust_id'     	=> $generateCodeCustomer,
								'cust_nama'     => post('cust_nama'),
								'cust_hp'       => post('cust_hp'),
								'cust_alamat'   => post('cust_alamat'),
								'cust_status'   => post('cust_status'),
                   				'kd_jns_usaha'  => $this->_roleCode
                            );
            $insert = $this->Customer_model->add($insertContent);
			
			saveGenerateCodeCustomer($this->_roleCode);
			
            if($insert == true){
                redirect($this->page->base_url('/'));
            }
                            
		}else{
  		
			$ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' => 'Field is required.',
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

		$this->form_validation->set_rules('cust_nama', 'Nama Customer', 'required');
		$this->form_validation->set_rules('cust_hp', 'Telp', 'required');
		$this->form_validation->set_rules('cust_alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('cust_status', 'Status', 'required');
        
		if($this->form_validation->run()){
		    
			$updateContent = array(
                                
								'cust_nama'     => post('cust_nama'),
								'cust_hp'   	=> post('cust_hp'),
								'cust_alamat'   => post('cust_alamat'),
								'cust_status'   => post('cust_status'),
                   				'kd_jns_usaha'  => $this->_roleCode
			);		
			
            $this->Customer_model->update($id,$updateContent,"id");
            
        }else{
            $ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' => 'Field is required.',
			);
            
            $this->session->set_flashdata('ui_messages',$ui_messages);
//            redirect('setting/users/add');       
            $this->form($id);
            return true;
		}
			
		redirect($this->page->base_url());
                
	}
	
	public function delete($id){
		if ($this->agent->referrer() == '') redirect('my404');
        
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->Customer_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->Customer_model->delete($id,'id');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */