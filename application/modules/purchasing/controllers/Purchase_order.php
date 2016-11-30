<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase_order extends MY_Controller {
    
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Purchase Order';
		$this->load->model('PurchaseOrder_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'purchasing/purchase_order';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('PurchaseOrder/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
    
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->PurchaseOrder_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $grid->po_no;
			$row[] = getNameVendor($grid->kd_vendor_supplier);
			$row[] = tgl_indo($grid->po_tgl);
			$row[] = tgl_indo($grid->po_tgl_tagihan);
			$row[] = numberFormat($grid->po_total);
			$row[] = getStatusPO($grid->status_po_id);
			$row[] = '<div style="width:100%;text-align:center;">
                        <a 
                            class="btn btn-xs btn-flat btn-info" 
                            href="'.site_url($grid_state . '/edit/' .$grid->id).'" 
                            title="Update Data">Update</a> &nbsp;
                        <a 
                            class="btn btn-xs btn-flat btn-danger" 
                            onclick="return confirm(\'Are you sure to delete data ' . $grid->po_no . ' ?\')" 
                            href="'.site_url($grid_state . '/delete/'.$grid->id).'" 
                            title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->PurchaseOrder_model->count_all(),
			"recordsFiltered" 	=> $this->PurchaseOrder_model->count_filtered(),
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
                $contentData = $this->PurchaseOrder_model->find($id,'id');
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
        
		$this->page->view('PurchaseOrder/form',$contect);
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){		
		if ( ! $this->input->post()) show_404(); 
	   	
		$this->form_validation->set_rules('nameVendors', 'Name', 'required');
		$this->form_validation->set_rules('phoneVendors', 'Phone', 'required');
		$this->form_validation->set_rules('picVendors', 'PIC', 'required');
        
		if($this->form_validation->run()){
		  
    		$insertContent = array(
                                'vend_kd'     => generateCodeVendor(),
                                'vend_name'   => post('nameVendors'),
								'vend_alamat'   => post('addressVendors'),
								'vend_tlp'   => post('phoneVendors'),
								'vend_pic'   => post('picVendors'),
								'kd_jns_usaha'  => 'JU001',
                            );
            $insert = $this->PurchaseOrder_model->add($insertContent);
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
		if ( ! $this->input->post()) show_404(); 

        $this->form_validation->set_rules('nameVendors', 'Name', 'required');
		$this->form_validation->set_rules('phoneVendors', 'Phone', 'required');
		$this->form_validation->set_rules('picVendors', 'PIC', 'required');
        
		if($this->form_validation->run()){
		    
			$updateContent = array(
                                'vend_name'   => post('nameVendors'),
								'vend_alamat'   => post('addressVendors'),
								'vend_tlp'   => post('phoneVendors'),
								'vend_pic'   => post('picVendors'),
                                'kd_jns_usaha'  => 'JU001',
			);		
			
            $this->PurchaseOrder_model->update($id,$updateContent,"id");
            
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
		if ($this->agent->referrer() == '') show_404();
        
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->PurchaseOrder_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->PurchaseOrder_model->delete($id,'id');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */