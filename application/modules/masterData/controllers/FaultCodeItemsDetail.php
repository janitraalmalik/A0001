<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class FaultCodeItemsDetail extends MX_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
		$this->load->model('FaultCodeItemsDetail_model');
        $this->heading = 'Fault Code Items Detail';        
	}
	public function index() {
		$this->page->view('FaultCodeItemsDetail/view_index', array (
			'heading'	=> $this->heading,
			'act'		=> $this->page->base_url("/list_search"),
			'add'		=> $this->page->base_url('/add')
		));
	}
	public function get_data(){
		$list = $this->FaultCodeItemsDetail_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {			
			$no++;
            
			$row = array();
			$row[] = $no;
			$row[] = $grid->catItem;
			$row[] = $grid->fCode;
			$row[] = $grid->fName;
			$row[] = '<div style="width:100%;text-align:center;">
                        <a class="btn btn-xs btn-flat btn-info" href="'.site_url('/masterData/FaultCodeItemsDetail/update/'.$grid->id).'" title="Update Data">Update</a> &nbsp;
                        <a class="btn btn-xs btn-flat btn-danger" onclick="return confirm(\'Are you sure to delete data ' . $grid->fName . ' ?\')" href="'.site_url('/masterData/FaultCodeItemsDetail/delete/'.$grid->id).'" title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->FaultCodeItemsDetail_model->count_all(),
			"recordsFiltered" 	=> $this->FaultCodeItemsDetail_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}
	private function form($action = 'insert', $id = ''){
		$this->load->model('FaultCodeItems_model');
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		$title    = '';
		$data_row = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add';
		} elseif ($this->uri->segment(3) == 'update') {
			$title = 'Edit';
            if($id != ''){
                $data_row = $this->FaultCodeItemsDetail_model->find($id,'id');
                if(count($data_row) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} else {
            redirect($this->page->base_url('/'));
		}
        $data['heading']    = $this->heading;
        $data['ttl']        = $title;
        $data['back']       = $this->agent->referrer();
        $data['act']        = $this->page->base_url("/{$action}/{$id}"); 
        $data['data_row']   = $data_row;
        $data['data_cat']  = $this->FaultCodeItems_model->get_all();
		$this->page->view('FaultCodeItemsDetail/view_form', $data);
	}
	public function add(){
		$this->form();
	}
    public function update($id){
		$this->form('edit',$id);
	}
	public function insert(){
        if($this->input->post(NULL, TRUE)){            
            $data = $this->input->post(NULL, TRUE);
            $data_post = array(
                                'fCode'        => $this->input->post('code'),
                                'fName'        => $this->input->post('name'),
								'fDesc'        => $this->input->post('desc'),
								'fType'        => $this->input->post('category')	
                            );
			//print_r($data_post); exit();
            $insert = $this->FaultCodeItemsDetail_model->add($data_post);
            if($insert == true){
                redirect($this->page->base_url('/'));
            }
        }
		redirect($this->page->base_url('/add'));
	}
    public function edit($id){
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        if($this->input->post(NULL, TRUE)){            
            $data = $this->input->post(NULL, TRUE);
            $data_post = array(
                                'fCode'        => $this->input->post('code'),
                                'fName'        => $this->input->post('name'),
								'fDesc'        => $this->input->post('desc'),
								'fType'        => $this->input->post('category')
                            );
            
            $edit = $this->FaultCodeItemsDetail_model->update($id,$data_post,"id");
            redirect($this->page->base_url('/'));
        }
		redirect($this->page->base_url("/update/{$id}"));
	}
    public function delete($id){
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->FaultCodeItemsDetail_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->FaultCodeItemsDetail_model->delete($id,'id');
		redirect($this->page->base_url("/"));
	}
	public function is_code_exist() {
		$param = json_decode($this->input->raw_input_stream, TRUE);
		$validate = $this->FaultCodeItemsDetail_model->is_code_exist($param['param']);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($validate));
	}
}
/* End of file Ac_delivery_report.php */
/* Location: ./application/modules/aircraft_status/controllers/Ac_delivery_report.php */