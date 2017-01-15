<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends MY_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Report Rugi Laba';
        $this->load->model('PurchaseOrder_model');
		$this->load->model('PurchaseOrderDetail_model');
		$this->load->model('PayOrder_model');                
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		$this->load->model('Vendors_model');
		$this->load->model('CatBarang_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'report';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
 
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
      
        
        $vendorsData = $this->Vendors_model->all();
        $grid_state = $this->process_grid_state();
        
        $this->page->view('Report/view_index', array (
	       'moduleTitle'      => $this->moduleTitle,
	       'moduleSubTitle'   => '',
           'linkPDF' => 'profitnlostPDF',
           'linkExcel' => 'profitnlostExcel',
	       'inputGet'   => $inputGet,
	       'listPurchasing'   => $listPurchasing,
           'contentDataSupplier' => $vendorsData,
		));
        
    }   
    
    public function profitnlostPDF(){
        
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
        
        $fileName = "ProfitnLoss-" . date('dmY');
        
        $this->pdf->load_view('Report/ProfitnLossPDF',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'inputGet'   => $inputGet
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    public function profitnlostExcel(){
        
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
        
        $fileName = "ProfitnLoss-" . date('dmY');
      
        $this->load->view('Report/ProfitnLossExcel',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'fileName'   => $fileName,
                        	       'inputGet'   => $inputGet
                        		  ));
        
        
        
    }
         
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */