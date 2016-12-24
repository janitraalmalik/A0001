<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Absensi  extends CI_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Absensi';
		$this->load->model('Absensi_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'hrm/Absensi';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('Absensi/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
	
	function get_gaji($kry){
			echo json_encode($this->db->query("select * from hr_m_gaji where id_kary ='$kry'")->row());
    }
	
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->Absensi_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
			$no++;
			$row = array();
			
			$row[] = '<input type="checkbox" name="rowcheck[]" value="'.$grid->id.'">';
			$row[] = $no;
			$row[] = $grid->nik_kary;
			$row[] = $grid->nama_kary;
			$row[] = tgl_indo($grid->tanggal);
			$row[] = $grid->jam_masuk;
			$row[] = $grid->jam_keluar;
			$row[] = $grid->jam_keluar-$grid->jam_masuk;
			/*$row[] = '<div style="width:100%;text-align:center;">
                        <button type="button" 
                            class="btn btn-xs btn-flat btn-danger" id="rowDelete"
                            title="Delete Data">Delete</button>
                    </div>';*/
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Absensi_model->count_all(),
			"recordsFiltered" 	=> $this->Absensi_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}    

	function upload($data,$rename){
		$file = $data;
		$folder = "./assets/document/";
		$folder = $folder . basename($rename);
		move_uploaded_file($data['tmp_name'], $folder);	
	}	
	
	function upload_absen(){
		$doc = 'ABSEN'.date('Ym').'_'.str_replace(' ','_',$_FILES['absen']['name']);
		$this->upload($_FILES['absen'],$doc);
		$this->load->file('assets/lib/phpexcel/PHPExcel.php');
		$this->load->file('assets/lib/phpexcel/PHPExcel/IOFactory.php');
			
		
			
			// Path file upload
			$path = FCPATH.'/assets/document/'.$doc;
		 
			// Load PHPExcel
			$objPHPExcel = PHPExcel_IOFactory::load($path);
			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
				$worksheetTitle = $worksheet->getTitle();
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
				$nrColumns = ord($highestColumn) - 64;
				//echo '<br>Data: <table border="1"><tr>';
				$date = date('Y-m-d');
				for ($row = 2; $row <= $highestRow; ++$row) { 
					$val = array();
					for ($col = 0; $col < $highestColumnIndex; ++$col) {
						$cell = $worksheet->getCellByColumnAndRow($col, $row);
						$val[] = $cell->getValue();
					}
					
						$rowData = array(
						'nik_kary'		=> $val[1],
						'nama_kary'		=> $val[2],
						'tanggal'		=> date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($val[0])),
						'jam_masuk'		=> PHPExcel_Style_NumberFormat::toFormattedString($val[3], 'hh:mm:ss'),
						'jam_keluar'	=> PHPExcel_Style_NumberFormat::toFormattedString($val[4], 'hh:mm:ss'),
						'status'		=> 0,
						'kd_jns_usaha'	=> 'JU001',
						'created_at'	=> $date
						);
						//var_dump($rowData);exit;
						$this->db->insert('hr_t_absen',$rowData);
				}
	
			}
			redirect('hrm/absensi');
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
                $contentData = $this->Absensi_model->find($id,'id');
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
        
		$this->page->view('Absensi/form',$contect);
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
                                'nik_kary'     	=> post('id_kary'),
								'nilai_gaji'     => str_replace(',','',post('nilai_gaji')),
								'nilai_tunjangan'     => str_replace(',','',post('nilai_tunjangan')),
								'tgl_gaji'     => date('Y-m-d', strtotime(post('tgl_gaji'))),
								'nilai_lembur'   =>str_replace(',','', post('nilai_lembur')),
								'nilai_pph'      => str_replace(',','',post('nilai_pph')),
								'keterangan_gaji'      => post('keterangan_gaji'),
								'status'=> 1,
								'created_at' => DATE('Y-m-d h:i:s'),
                   				'kd_jns_usaha'  => 'JU001'
                            );
            $insert = $this->Absensi_model->add($insertContent);
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
                               'nik_kary'     	=> post('id_kary'),
								'nilai_gaji'     => str_replace(',','',post('nilai_gaji')),
								'nilai_tunjangan'     => str_replace(',','',post('nilai_tunjangan')),
								'tgl_gaji'     => date('Y-m-d', strtotime(post('tgl_gaji'))),
								'nilai_lembur'   =>str_replace(',','', post('nilai_lembur')),
								'nilai_pph'      => str_replace(',','',post('nilai_pph')),
								'keterangan_gaji'      => post('keterangan_gaji'),
								'status'=> 1,
								'created_at' => DATE('Y-m-d h:i:s'),
                   				'kd_jns_usaha'  => 'JU001'
			);		
			
            $this->Absensi_model->update($id,$updateContent,"id");
            
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
        $data_row = $this->Absensi_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->Absensi_model->delete($id,'id');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */