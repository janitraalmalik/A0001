<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class CabinItems extends MX_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
		$this->load->model(array(
                                'AircraftType_model',
                                'AircraftManufacture_model',
                                'AircraftReg_model',
                                'CabinItems_model'
                            ));
        $this->heading = 'Cabin Items';        
	}
	public function index() {
		$this->page->view('CabinItems/view_index', array (
			'heading'	=> $this->heading,
			'act'		=> $this->page->base_url("/list_search"),
			'add'		=> $this->page->base_url('/add')
		));
	}
	public function get_data(){
		$list = $this->CabinItems_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {			
			$no++;
            
			$row = array();
			$row[] = $no;
			$row[] = $grid->name_type;
			$row[] = '<div style="width:100%;text-align:center;">
                        <a class="btn btn-xs btn-flat btn-info" href="'.site_url('//masterData/CabinItems/update/'.$grid->id).'" title="Update Data">Update</a> &nbsp;
                        <a class="btn btn-xs btn-flat btn-danger" onclick="return confirm(\'Are you sure to delete data ' . $grid->name_type . ' ?\')" href="'.site_url('//masterData/CabinItems/delete/'.$grid->id).'" title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->CabinItems_model->count_all(),
			"recordsFiltered" 	=> $this->CabinItems_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}
	private function form($action = 'insert', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		$title    = '';
		$data_row = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add';
		} elseif ($this->uri->segment(3) == 'update') {
			$title = 'Edit';
            if($id != ''){
                $data_row = $this->CabinItems_model->find($id,'id');
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
        $data['data_manf']  = $this->AircraftManufacture_model->all();
        $data['data_type']  = $this->AircraftType_model->all();
		$this->page->view('CabinItems/view_form', $data);
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
                                'name_type'        => $this->input->post('name'),
                                'desc_type'        => $this->input->post('desc')
                            );
            $insert = $this->CabinItems_model->add($data_post);
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
                                'name_type'        => $this->input->post('name'),
                                'desc_type'        => $this->input->post('desc')
                            );
            
            $edit = $this->CabinItems_model->update($id,$data_post,"id");
            redirect($this->page->base_url('/'));
        }
		redirect($this->page->base_url("/update/{$id}"));
	}
    public function delete($id){
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->CabinItems_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->CabinItems_model->delete($id,'id');
		redirect($this->page->base_url("/"));
	}
    
    public function select_data(){
 
        if($this->input->post(NULL, TRUE)){            
            $manuf = $this->input->post('manuf');
            $custom_where = ' AND id_aircraft_manufacture_fk = ' . $manuf . '';
            $data  = $this->AircraftType_model->all($custom_where);
            
            foreach($data as $row){
                $data_format[] = array(
                                    'id' => $row['id'],
                                    'name' => $row['name_aircraft'],
                                );    
            }
            die(json_encode($data_format));
        } else {
            echo "error";
        }   
        
    }
    
    
	public function pdf($id){		
		$this->load->library('pdf');
		$content = $this->load->view('ac_delivery_report_pdf', array (
			'rc' 	=> $this->db->get_where('ac_delivery_report', array('id_ac_delivery' => $id))->row(),
		), TRUE);
		$this->pdf->create($content, 'ac_delivery_report_pdf');
	}
	public function download($id) {
		$this->load->helper('download');
		$data = file_get_contents(site_url('/aircraft_status/ac_delivery_report/pdf/'.$id));
		force_download('ac_delivery_report_pdf_'.$id.'.pdf', $data); 
	}
	
}
/* End of file Ac_delivery_report.php */
/* Location: ./application/modules/aircraft_status/controllers/Ac_delivery_report.php */