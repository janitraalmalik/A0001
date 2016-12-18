<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ReportPembayaran extends MY_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Report Pembayaran';
		//$this->load->model('Pinjaman_model');
	}
    
	public function index(){
		
		$title = '';
        $contentData = '';
		 
        
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'kary'		       => $this->db->query('select a.* from hr_m_karyawan a join hr_t_pinjam b on a.id = b.nik_kary')->result(),
            			'action'	       => $this->page->base_url(""),
            			'contentData'	   => $contentData
                        );
        
		$this->page->view('ReportHrm/rpt_pembayaran_form',$contect);
    } 
	
	public function print_pdf(){
        
        $fileName = "ReportPinjaman-" . date('dmY');
        if($this->input->post('per_pnj')=="0"){
			if(post('kary')==0){
			$data = $this->db->query("select a.*,b.nama_kary,b.nik_kary from hr_t_bayar a join hr_t_pinjam c on a.id_pinjam = c.id join hr_m_karyawan b on c.nik_kary = b.id")->result();
			}else{
			$data = $this->db->query("select a.*,b.nama_kary,b.nik_kary from hr_t_bayar a join hr_t_pinjam c on a.id_pinjam = c.id join hr_m_karyawan b on c.nik_kary = b.id where c.nik_kary ='".post('kary')."'")->result();	
			}
		}else{ 
			if(post('kary')==0){
			$data = $this->db->query("select a.*,b.nama_kary,b.nik_kary from hr_t_bayar a join hr_t_pinjam c on a.id_pinjam = c.id join hr_m_karyawan b on c.nik_kary = b.id where a.tgl_bayar >= '".date('Y-m-d', strtotime($this->input->post('start_from')))."' and a.tgl_bayar <= '".date('Y-m-d', strtotime($this->input->post('end_from')))."'")->result();
			}else{
			$data = $this->db->query("select a.*,b.nama_kary,b.nik_kary from hr_t_bayar a join hr_t_pinjam c on a.id_pinjam = c.id join hr_m_karyawan b on c.nik_kary = b.id where a.tgl_bayar >= '".date('Y-m-d', strtotime($this->input->post('start_from')))."' and a.tgl_bayar <= '".date('Y-m-d', strtotime($this->input->post('end_from')))."' and c.nik_kary = '".post('kary')."'")->result();	
			}
		}
		//var_dump($data);exit;
        $this->pdf->load_view('ReportHrm/PembayaranPDF',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'data'   => $data
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
	
	public function print_excel(){
        
        $fileName = "ReportPinjaman-" . date('dmY');
        if($this->input->post('start_from')=='' and $this->input->post('end_from')==''){
			$data = $this->db->query("select a.*,b.nama_kary from hr_t_absen a join hr_m_karyawan b on a.nik_kary = b.nik_kary")->result();
		}else{
			$data = $this->db->query("select a.*,b.nama_kary from hr_t_absen a join hr_m_karyawan b on a.nik_kary = b.nik_kary where a.tanggal >= '".date('Y-m-d', strtotime($this->input->post('start_from')))."' and a.tanggal <= '".date('Y-m-d', strtotime($this->input->post('start_from')))."'")->result();
		}
        $this->load->view('ReportHrm/AbsensiEXCEL',array (
	                               'moduleTitle'      => $this->moduleTitle,
								   
                        	       'data'   => $data
								   
                        		  ));
    }
	
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */