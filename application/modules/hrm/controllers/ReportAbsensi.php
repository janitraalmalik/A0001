<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ReportAbsensi  extends MY_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Report Absensi';
		$this->load->model('Absensi_model');
	}
    
	public function index() {
		
		$title = '';
        $contentData = '';
		 
        
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'kary'		       => $this->db->query('select * from hr_m_karyawan where deleted_at is null')->result(),
            			'action'	       => $this->page->base_url(""),
            			'contentData'	   => $contentData
                        );
        
		$this->page->view('ReportHrm/rpt_absen_form',$contect);
    } 
	
	public function print_pdf(){
        
        $fileName = "ReprtAbsen-" . date('dmY');
        if(post('jns_lap')==2){
			$data = $this->db->query("select a.*,b.nama_kary from hr_t_absen a join hr_m_karyawan b on a.nik_kary = b.nik_kary")->result();
		}else{
			$data = $this->db->query("select a.*,b.nama_kary from hr_t_absen a join hr_m_karyawan b on a.nik_kary = b.nik_kary where a.tanggal >= '".date('Y-m-d', strtotime(post('start_from')))."' and a.tanggal <= '".date('Y-m-d', strtotime(post('end_from')))."'")->result();
		}
		//var_dump($data);exit;
        $this->pdf->load_view('ReportHrm/AbsensiPDF',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'data'   => $data
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
	
	public function print_excel(){
        
        $fileName = "ReprtAbsen-" . date('dmY');
        if(post('start_from')=='' and post('end_from')==''){
			$data = $this->db->query("select a.*,b.nama_kary from hr_t_absen a join hr_m_karyawan b on a.nik_kary = b.nik_kary")->result();
		}else{
			$data = $this->db->query("select a.*,b.nama_kary from hr_t_absen a join hr_m_karyawan b on a.nik_kary = b.nik_kary where a.tanggal >= '".date('Y-m-d', strtotime(post('start_from')))."' and a.tanggal <= '".date('Y-m-d', strtotime(post('start_from')))."'")->result();
		}
        $this->load->view('ReportHrm/AbsensiEXCEL',array (
	                               'moduleTitle'      => $this->moduleTitle,
								   
                        	       'data'   => $data
								   
                        		  ));
    }
	
	public function purchase_listPDF(){
        
        $inputGet = '';
        $listPurchasing = '';
        if($this->input->get()){
            $startDate = $this->input->get('start');
            $endDate = $this->input->get('end');
            $supplier = $this->input->get('supplier');
            $wherePO = '';
            if(!empty($startDate) && !empty($endDate)){
                $wherePO .= " AND po_tgl >= '" . dateTOSql($startDate) . "'";
                $wherePO .= " AND po_tgl <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $wherePO .= " AND po_tgl = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $wherePO .= " AND po_tgl = '" . dateTOSql($startDate) . "'";
                }
            }
            if($supplier != 0){
                $wherePO .= " AND kd_vendor_supplier = '" . $supplier . "'";
            }
            $wherePO .= "ORDER BY id DESC";
            $listPurchasing = $this->PurchaseOrder_model->all($wherePO);
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "PurchaseReport-" . date('dmY');
        
        $this->pdf->load_view('PurchasingReport/PoListingReportPDF',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'inputGet'   => $inputGet,
                        	       'listPurchasing'   => $listPurchasing,
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    public function purchase_listExcel(){
        $inputGet = '';
        $listPurchasing = '';
        if($this->input->get()){
            $startDate = $this->input->get('start');
            $endDate = $this->input->get('end');
            $supplier = $this->input->get('supplier');
            $wherePO = '';
            if(!empty($startDate) && !empty($endDate)){
                $wherePO .= " AND po_tgl >= '" . dateTOSql($startDate) . "'";
                $wherePO .= " AND po_tgl <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $wherePO .= " AND po_tgl = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $wherePO .= " AND po_tgl = '" . dateTOSql($startDate) . "'";
                }
            }
            if($supplier != 0){
                $wherePO .= " AND kd_vendor_supplier = '" . $supplier . "'";
            }
            $wherePO .= "ORDER BY id DESC";
            $listPurchasing = $this->PurchaseOrder_model->all($wherePO);
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "PurchaseReport-" . date('dmY');
      
        $this->load->view('PurchasingReport/PoListingReportExcel',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'fileName'   => $fileName,
                        	       'inputGet'   => $inputGet,
                        	       'listPurchasing'   => $listPurchasing,
                        		  ));
        
        
        
    }
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */