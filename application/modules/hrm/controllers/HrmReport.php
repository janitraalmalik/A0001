<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class HrmReport extends MY_Controller {
    
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
		$this->load->model('CatBarang_model');
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
      
        
        $vendorsData = $this->Vendors_model->all();
        $grid_state = $this->process_grid_state();
        
        $this->page->view('PurchasingReport/PoListingReport', array (
	       'moduleTitle'      => $this->moduleTitle,
	       'moduleSubTitle'   => '',
           'linkPDF' => 'purchase_listPDF',
           'linkExcel' => 'purchase_listExcel',
	       'inputGet'   => $inputGet,
	       'listPurchasing'   => $listPurchasing,
           'contentDataSupplier' => $vendorsData,
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
    
    public function outstanding_list(){
        
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
            
            $wherePO .= " AND status_po_id = 1";
            $wherePO .= " ORDER BY id DESC";
            $listPurchasing = $this->PurchaseOrder_model->all($wherePO);
            $inputGet = $this->input->get();
              
        }
        
        
        $vendorsData = $this->Vendors_model->all();        
        $grid_state = $this->process_grid_state();
        
        $this->page->view('PurchasingReport/OutstandingReport', array (
	       'moduleTitle'      => 'Laporan Hutang',
	       'moduleSubTitle'   => '',
           'linkPDF' => 'outstanding_listPDF',
           'linkExcel' => 'outstanding_listExcel',
	       'inputGet'   => $inputGet,
	       'listPurchasing'   => $listPurchasing,
           'contentDataSupplier' => $vendorsData
		));
        
    }
    
    public function outstanding_listPDF(){
        
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
            $wherePO .= " AND status_po_id = 1";
            $wherePO .= " ORDER BY id DESC";
            $listPurchasing = $this->PurchaseOrder_model->all($wherePO);
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "OutStandingReport-" . date('dmY');
        
        $this->pdf->load_view('PurchasingReport/OutstandingReportPDF',array (
                                       'moduleTitle'      => 'Laporan Hutang',
                        	           'moduleSubTitle'   => '',
                     	               'inputGet'   => $inputGet,
                        	           'listPurchasing'   => $listPurchasing,
                        		      ));
                                  
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    public function outstanding_listExcel(){
        
       
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
            $wherePO .= " AND status_po_id = 1";
            $wherePO .= " ORDER BY id DESC";
            $listPurchasing = $this->PurchaseOrder_model->all($wherePO);
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "OutStandingReport-" . date('dmY');
      
        $this->load->view('PurchasingReport/OutstandingReportExcel',array (
                                   'moduleTitle'      => 'Laporan Hutang',
                        	       'fileName'   => $fileName,
                        	       'inputGet'   => $inputGet,
                        	       'listPurchasing'   => $listPurchasing,
                        		  ));
        
        
        
    }
    
    
    public function supplier_list(){
        
        $whereVendor = '';
        $contentData = '';
                
        $whereVendor .= " ORDER BY vend_kd ";
        $contentData = $this->Vendors_model->all($whereVendor);
            
        $grid_state = $this->process_grid_state();
        
        $this->page->view('PurchasingReport/VendorsReport', array (
	       'moduleTitle'      => 'Daftar Vendor',
	       'moduleSubTitle'   => '',
           'linkPDF' => 'supplier_listPDF',
           'linkExcel' => 'supplier_listExcel',
	       'contentData'   => $contentData
		));
        
    }
    
    public function supplier_listPDF(){
        
        $whereVendor = '';
        $contentData = '';
                
        $whereVendor .= " ORDER BY vend_kd ";
        $contentData = $this->Vendors_model->all($whereVendor);
        
        $fileName = "ListVendorsReport-" . date('dmY');
        
        $this->pdf->load_view('PurchasingReport/VendorsReportPDF',array (
	                                   'moduleTitle'      => 'Daftar Vendor',
                        	           'moduleSubTitle'   => '',
                        	           'contentData'   => $contentData,
                        		      ));
                                  
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    public function supplier_listExcel(){
        
       
        $whereVendor = '';
        $contentData = '';
                
        $whereVendor .= " ORDER BY vend_kd ";
        $contentData = $this->Vendors_model->all($whereVendor);
        $fileName = "ListVendorsReport-" . date('dmY');
      
        $this->load->view('PurchasingReport/VendorsReportExcel',array (
	                               'moduleTitle'      => 'Daftar Vendor',
                        	       'fileName'   => $fileName,
                    	           'contentData'   => $contentData,
                        		  ));
        
        
        
    }
    
    public function items_list(){
        
        $inputGet = '';
        $contentData = '';
        $whereContentData = '';
        if($this->input->get()){
            $kdBarang = $this->input->get('kdBarang');
            if($kdBarang != 0){
                $whereContentData .= " AND cat_barang_id = '" . $kdBarang . "'";
            }            
            $inputGet = $this->input->get(); 
        }
        
        $whereContentData .= " ORDER BY brg_kd ASC";
        $contentData = $this->Barang_model->all($whereContentData);
        $contentCategory = $this->CatBarang_model->all();                
        $grid_state = $this->process_grid_state();
        
        $this->page->view('PurchasingReport/ItemsReport', array (
	       'moduleTitle'      => 'Daftar Barang',
	       'moduleSubTitle'   => '',
           'linkPDF' => 'items_listPDF',
           'linkExcel' => 'items_listExcel',
	       'inputGet'   => $inputGet,
	       'contentData'   => $contentData,
           'contentCategory' => $contentCategory
		));
        
    }
    
    public function items_listPDF(){
        
        $inputGet = '';
        $contentData = '';
        $whereContentData = '';
        if($this->input->get()){
            $kdBarang = $this->input->get('kdBarang');
            if($kdBarang != 0){
                $whereContentData .= " AND cat_barang_id = '" . $kdBarang . "'";
            }            
            $inputGet = $this->input->get(); 
        }
        
        $whereContentData .= " ORDER BY brg_kd ASC";
        $contentData = $this->Barang_model->all($whereContentData);         
        
        $fileName = "ItemsReport-" . date('dmY');
        
        $this->pdf->load_view('PurchasingReport/ItemsReportPDF',array (
                                       'moduleTitle'      => 'Daftar Barang',
                        	           'moduleSubTitle'   => '',
                     	               'inputGet'   => $inputGet,
	                                   'contentData'   => $contentData,
                        		      ));
                                  
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    public function items_listExcel(){
        
       
        $inputGet = '';
        $contentData = '';
        $whereContentData = '';
        if($this->input->get()){
            $kdBarang = $this->input->get('kdBarang');
            if($kdBarang != 0){
                $whereContentData .= " AND cat_barang_id = '" . $kdBarang . "'";
            }            
            $inputGet = $this->input->get(); 
        }
        
        $whereContentData .= " ORDER BY brg_kd ASC";
        $contentData = $this->Barang_model->all($whereContentData);  
        
        $fileName = "ItemsReport-" . date('dmY');
      
        $this->load->view('PurchasingReport/ItemsReportExcel',array (
                                   'moduleTitle'      => 'Daftar Barang',
                        	       'fileName'   => $fileName,
                        	       'inputGet'   => $inputGet,
                        	       'contentData'   => $contentData,
                        		  ));
        
        
        
    }
    
    
	
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */