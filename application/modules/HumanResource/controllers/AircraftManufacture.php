<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class AircraftManufacture extends MX_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
		$this->load->model('AircraftManufacture_model');
	}
	public function index() {
		$this->page->view('Manufacture/view_index', array (
			'act'		=> $this->page->base_url("/list_search"),
			'add'		=> $this->page->base_url('/add')
		));
	}
	public function get_data(){
		$list = $this->AircraftManufacture_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $grid->name_manf;
			$row[] = '<div style="width:100%;text-align:center;">
                        <a class="btn btn-xs btn-flat btn-info" href="'.site_url('//masterData/AircraftManufacture/update/'.$grid->id).'" title="Update Data">Update</a> &nbsp;
                        <a class="btn btn-xs btn-flat btn-danger" onclick="return confirm(\'Are you sure to delete data ' . $grid->name_manf . ' ?\')" href="'.site_url('//masterData/AircraftManufacture/delete/'.$grid->id).'" title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->AircraftManufacture_model->count_all(),
			"recordsFiltered" 	=> $this->AircraftManufacture_model->count_filtered(),
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
                $data_row = $this->db->where('id',$id)->get('m_aircraft_manufacture')->row();
                if(count($data_row) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} else {
            redirect($this->page->base_url('/'));
		}
		$this->page->view('Manufacture/view_form', array (
			'ttl'		=> $title,
			'back'		=> $this->agent->referrer(),
			'act'		=> $this->page->base_url("/{$action}/{$id}"),
			'data_row'	=> $data_row
		));
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
                                'name_manf'        => $this->input->post('name'),
                                'desc_manf'     => $this->input->post('desc')
                            );
            $insert = $this->AircraftManufacture_model->add($data_post);
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
                                'name_manf'        => $this->input->post('name'),
                                'desc_manf'     => $this->input->post('desc')
                            );
            
            $edit = $this->AircraftManufacture_model->update($id,$data_post,"id");
            redirect($this->page->base_url('/'));
        }
		redirect($this->page->base_url("/update/{$id}"));
	}
    public function delete($id){
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        
        $data_row = $this->db->where('id',$id)->get('m_aircraft_manufacture')->row();
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }      
        
        $this->AircraftManufacture_model->delete($id,'id');             
        
		redirect($this->page->base_url("/"));
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