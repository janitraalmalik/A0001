<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class PurchasingReport extends MY_Controller {
    
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Laporan Pembelian';
		$this->load->model('PurchaseOrder_model');
		$this->load->model('PurchaseOrderDetail_model');
		$this->load->model('PayOrder_model');                
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		$this->load->model('Vendors_model');       
         
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'purchasing/purchasingReport';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
   
    
	public function index() {
	   redirect('/');
    } 
    
    public function purchase_list() {
        
        
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
      
        $grid_state = $this->process_grid_state();
        
        $this->page->view('PurchasingReport/PoListingReport', array (
	       'moduleTitle'      => $this->moduleTitle,
	       'moduleSubTitle'   => '',
	       'inputGet'   => $inputGet,
	       'listPurchasing'   => $listPurchasing,
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
        
        $this->pdf->load_view('PurchasingReport/PoListingReportPDF',array (
                        	       'inputGet'   => $inputGet,
                        	       'listPurchasing'   => $listPurchasing,
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream("name-file.pdf",array("Attachment"=>0));
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
        
      
        $this->load->view('PurchasingReport/PoListingReportExcel',array (
                        	       'inputGet'   => $inputGet,
                        	       'listPurchasing'   => $listPurchasing,
                        		  ));
        
        
        
    }
    
    
    
	
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */