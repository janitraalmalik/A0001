<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_barang extends MY_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Data Items';
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'purchasing/data_barang';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
      
	   $this->page->view('Barang/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
    
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->Barang_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $grid->brg_kd;
			$row[] = $grid->brg_nama;
			$row[] = getNameCategory($grid->cat_barang_id);
			$row[] = '<div style="width:100%;text-align:center;">
                        <a 
                            class="btn btn-xs btn-flat btn-info" 
                            href="'.site_url($grid_state . '/edit/' .$grid->id).'" 
                            title="Update Data">Update</a> &nbsp;
                        <a 
                            class="btn btn-xs btn-flat btn-danger" 
                            onclick="return confirm(\'Are you sure to delete data ' . $grid->brg_nama . ' ?\')" 
                            href="'.site_url($grid_state . '/delete/'.$grid->id).'" 
                            title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Barang_model->count_all(),
			"recordsFiltered" 	=> $this->Barang_model->count_filtered(),
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
        $contentSatuan = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add ';        
		} elseif ($this->uri->segment(3) == 'edit') {
			$title = 'Edit ';
            if($id != ''){
                $contentData = $this->Barang_model->find($id,'id');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} 
        //$contentSatuan = $this->Satuan_model->all();    
        
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'back'		       => $grid_state,
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData
                        //'contentSatuan'    => $contentSatuan
                        );
        
		$this->page->view('Barang/form',$contect);
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
	public function insert(){		
		if ( ! $this->input->post()) redirect('my404'); 
        
		$this->form_validation->set_rules('codeBarang', 'Code', 'required');
		$this->form_validation->set_rules('nameBarang', 'Name', 'required');
		$this->form_validation->set_rules('catBarang', 'Category', 'required');
        
		if($this->form_validation->run()){
		  
    		$insertContent = array(
                                'brg_kd'     => post('codeBarang'),
                                'brg_nama'   => post('nameBarang'),
								'brg_desc'   => post('descBarang'),
                                //'brg_satuan' => post('satuanBarang'),
								'cat_barang_id'   => post('catBarang'),
								'kd_jns_usaha'  => $this->_roleCode,
                            );
            $insert = $this->Barang_model->add($insertContent);
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
            $this->form();
            return true;
		}
        redirect($this->page->base_url());
	}
	
	public function update($id){		
		if ( ! $this->input->post()) redirect('my404'); 

        $this->form_validation->set_rules('codeBarang', 'Code', 'required');
		$this->form_validation->set_rules('nameBarang', 'Name', 'required');
		$this->form_validation->set_rules('catBarang', 'Category', 'required');
        
		if($this->form_validation->run()){
		    
			$updateContent = array(
                                'brg_kd'     => post('codeBarang'),
                                'brg_nama'   => post('nameBarang'),
								'brg_desc'   => post('descBarang'),
                                //'brg_satuan' => post('satuanBarang'),
								'cat_barang_id'   => post('catBarang'),
                                'kd_jns_usaha'  => $this->_roleCode,
			);		
			
            $this->Barang_model->update($id,$updateContent,"id");
            
        }else{
            $ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' => 'Field is required.',
			);
            
            $this->session->set_flashdata('ui_messages',$ui_messages);
            $this->form($id);
            return true;
		}
			
		redirect($this->page->base_url());
                
	}
    
    //public function detail($id){
//		if ($this->agent->referrer() == '') redirect('my404');
//        
//        if(!isset($id) || $id == ''){
//            $message_code = '003'; //Not Found Data
//            die(json_encode($message_code));
//        }
//        
//        $dataBarang = $this->Barang_model->find($id,"brg_kd");
//        $data_row = $this->Satuan_model->find($dataBarang['brg_satuan'],'id');
//        $data_arr = array(
//                            'id'=> $data_row['id'],
//                            'kode'=> $data_row['satuan_kd'],
//                            'nama'=> $data_row['satuan_name']
//                        );
//        die(json_encode($data_arr));
//    }
	
	public function delete($id){
		if ($this->agent->referrer() == '') redirect('my404');
        
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->Barang_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->Barang_model->delete($id,'id');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */