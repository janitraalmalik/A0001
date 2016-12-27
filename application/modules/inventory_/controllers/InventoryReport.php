<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class InventoryReport extends MY_Controller {
    
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Laporan Barang Masuk (PO)';
		$this->load->model('Inbound_model');  
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		$this->load->model('Vendors_model');
		$this->load->model('CatBarang_model');
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'inventory/inventoryReport';
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
    
    public function inbound_list() {
        
        
        $inputGet = '';
        $listInbound = '';
        $inbound = 'inbound';
        if($this->input->get()){
            $startDate = $this->input->get('start');
            $endDate = $this->input->get('end');
            
            $wherePO = '';
            if(!empty($startDate) && !empty($endDate)){
                $wherePO .= " AND date_in >= '" . dateTOSql($startDate) . "'";
                $wherePO .= " AND date_in <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $wherePO .= " AND date_in = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $wherePO .= " AND date_in = '" . dateTOSql($startDate) . "'";
                }
            }
            $wherePO .= " ORDER BY id_inbound DESC";
           
           $qeu  = "select * from v_i_inbound_grid Where deleted_by is null ".$wherePO; 
            
           $listInbound = $this->db->query($qeu)->result_array();
//            $listInbound = $this->Inbound_model->all($wherePO);
            //var_dump($listInbound);exit();
            $inputGet = $this->input->get();
              
        }
      
        
        $vendorsData = $this->Vendors_model->all();
        $grid_state = $this->process_grid_state();
        
        $this->page->view('InventoryReport/InboundListingReport', array (
	       'moduleTitle'      => $this->moduleTitle,
	       'moduleSubTitle'   => '',
           'linkPDF' => 'inbound_listPDF',
           'linkExcel' => 'inbound_listExcel',
	       'inputGet'   => $inputGet,
	       'listPurchasing'   => $listInbound
		));
    } 
    
    
    public function inbound_listPDF(){
        
        $inputGet = '';
        $listPurchasing = '';
        if($this->input->get()){
            $startDate = $this->input->get('start');
            $endDate = $this->input->get('end');
            $wherePO = '';
            if(!empty($startDate) && !empty($endDate)){
                $wherePO .= " AND date_in >= '" . dateTOSql($startDate) . "'";
                $wherePO .= " AND date_in <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $wherePO .= " AND date_in = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $wherePO .= " AND date_in = '" . dateTOSql($startDate) . "'";
                }
            }
           
            $wherePO .= " ORDER BY id_inbound DESC";
            $qeu  = "select * from v_i_inbound_grid Where deleted_by = 0 ".$wherePO; 
            
           $listInbound = $this->db->query($qeu)->result_array();
           
          // var_dump($listInbound);exit();
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "InventoryReport-" . date('dmY');
        
        $this->pdf->load_view('InventoryReport/InbounListingReportPDF',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'inputGet'   => $inputGet,
                        	       'listPurchasing'   => $listInbound,
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    public function inbound_listExcel(){
        $inputGet = '';
        $listPurchasing = '';
        if($this->input->get()){
            $startDate = $this->input->get('start');
            $endDate = $this->input->get('end');
            $supplier = $this->input->get('supplier');
            $wherePO = '';
            if(!empty($startDate) && !empty($endDate)){
                $wherePO .= " AND date_in >= '" . dateTOSql($startDate) . "'";
                $wherePO .= " AND date_in <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $wherePO .= " date_in  = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $wherePO .= " date_in  = '" . dateTOSql($startDate) . "'";
                }
            }
           
            $wherePO .= " ORDER BY id_inbound DESC";
             $qeu  = "select * from v_i_inbound_grid Where deleted_by = 0 ".$wherePO; 
            
           $listInbound = $this->db->query($qeu)->result_array();
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "InventoryReport-" . date('dmY');
      
        $this->load->view('InventoryReport/InbounListingReportExcel',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'fileName'   => $fileName,
                        	       'inputGet'   => $inputGet,
                        	       'listPurchasing'   => $listInbound,
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
