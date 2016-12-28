<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pembayaran_pos  extends CI_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Pembayaran Pembelian';
		$this->load->model('Pembayaran_pos_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'sales/Pembayaran_pos';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('Pembayaran/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
	
	function get_gaji($kry){
			echo json_encode($this->db->query("select * from hr_m_gaji where id_kary ='$kry'")->row());
    }
	
	function get_bayar($id){
		$row = $this->db->query("SELECT * FROM hr_t_bayar WHERE id_pinjam ='$id' ORDER BY  created_at DESC LIMIT 1")->row();
		echo json_encode($row);
	}
	
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->Pembayaran_pos_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
			$no++;
			$row = array();
			
			$row[] = $no;
			$row[] = $grid->sale_no;
			$row[] = $grid->cust_nama;
			
			$row[] = number_format($grid->sale_total);
			$row[] = number_format($grid->nilai_bayar);
			$row[] = tgl_indo($grid->tgl_bayar);
			$row[] = number_format($grid->sale_total-$grid->nilai_bayar);
			$row[] = '<div style="width:100%;text-align:center;">
                        <a 
                            class="btn btn-xs btn-flat btn-danger" 
                            onclick="return confirm(\'Are you sure to delete data ' . $grid->id . ' ?\')" 
                            href="'.site_url($grid_state . '/delete/'.$grid->id).'" 
                            title="Delete Data">Delete</a>
                    </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Pembayaran_pos_model->count_all(),
			"recordsFiltered" 	=> $this->Pembayaran_pos_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}       
	
	function get_beli($saleno){
		echo json_encode($this->db->query("select * from sa_t_pos where sale_no = '$saleno'")->row());
	}
    
    private function form($action = 'insert', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
        $grid_state = $this->process_grid_state();
		$title = '';
        $contentData = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add ';
			$contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'back'		       => $grid_state,
            			'sale'		       => $this->db->query('select * from sa_t_pos where sale_total > sale_bayar')->result(),
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData
                        );
		} elseif ($this->uri->segment(3) == 'edit') {
			$title = 'Edit ';
            if($id != ''){
                $contentData = $this->Pembayaran_pos_model->find($id,'id');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
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
            }
		} 
        
        
        
        
		$this->page->view('Pembayaran/form',$contect);
	}
	
	public function add(){
		$this->form();
	}
	
	function get_pinjam($kary){
		$this->db->where('nik_kary',$kary);
		$q = $this->db->get('hr_t_pinjam')->result();
		$data = '<option value="">-- Choose --</option>';
		foreach($q as $row){
			$data.= '<option value="'.$row->id.'-'.$row->nilai_pinjam.'-'.$row->frequensi.'">'.angka($row->nilai_pinjam).' - '.$row->keterangan_pinjam.'</option>';
		}
		echo $data;
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
								'sale_no'     => post('sale_no'),
								'nilai_bayar'     => str_replace(',','',post('nilai_bayar')),
								'tgl_bayar'      => date('Y-m-d', strtotime(post('tgl_bayar')))
                            );
            $insert = $this->Pembayaran_pos_model->add($insertContent);
		
                            
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
								'nilai_pinjam'     => str_replace(',','',post('nilai_pinjam')),
								'frequensi'     => str_replace(',','',post('frequensi')),
								'tgl_pinjam'     => date('Y-m-d', strtotime(post('tgl_pinjam'))),
								'keterangan_pinjam'      => post('keterangan_pinjam'),
								'status'=> 0,
								'created_at' => DATE('Y-m-d h:i:s'),
                   				'kd_jns_usaha'  => 'JU001'
			);		
			
            $this->Pembayaran_pos_model->update($id,$updateContent,"id");
            
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
        $data_row = $this->Pembayaran_pos_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->Pembayaran_pos_model->delete($id,'id');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */