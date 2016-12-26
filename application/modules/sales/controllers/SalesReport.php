<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class SalesReport extends MY_Controller {
    
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Daily Report Transaction';
		$this->load->model('SalesPos_model');
		$this->load->model('SalesPosDetail_model');
		$this->load->model('Customer_model');                
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		$this->load->model('SalesKartuPiutang_model');
		
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'purchasing/salesReport';
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
    
    public function salesdaily_list() {
        
        
        $inputGet = '';
        $listSales = '';
        if($this->input->get()){
            $startDate = $this->input->get('start');
            $endDate = $this->input->get('end');
            $sale_type = $this->input->get('sale_type');
            $whereSales = '';
            if(!empty($startDate) && !empty($endDate)){
                $whereSales .= " AND sale_tgl >= '" . dateTOSql($startDate) . "'";
                $whereSales .= " AND sale_tgl <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $whereSales .= " AND sale_tgl = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $whereSales .= " AND sale_tgl = '" . dateTOSql($startDate) . "'";
                }
            }
            if($sale_type != "0"){
                $whereSales .= " AND sale_type = '" . $sale_type . "'";
            }
			
            $whereSales .= " ORDER BY id DESC";

            $listSales = $this->SalesPos_model->all($whereSales);
            $inputGet = $this->input->get();
              
        }
      
        $grid_state = $this->process_grid_state();
        
        $this->page->view('SalesReport/SalesDailyReport', array (
	       'moduleTitle'      	=> $this->moduleTitle,
	       'moduleSubTitle'   	=> '',
           'linkPDF' 			=> 'salesdaily_listPDF',
           'linkExcel' 			=> 'salesdaily_listExcel',
	       'inputGet'   		=> $inputGet,
	       'listSales'   		=> $listSales,
		));
    } 
    
    
    public function salesdaily_listPDF(){
        
        $inputGet = '';
        $listSales = '';
        if($this->input->get()){
            $startDate 	= $this->input->get('start');
            $endDate 	= $this->input->get('end');
            $sale_type 	= $this->input->get('sale_type');
            $whereSales = '';
            if(!empty($startDate) && !empty($endDate)){
                $whereSales .= " AND sale_tgl >= '" . dateTOSql($startDate) . "'";
                $whereSales .= " AND sale_tgl <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $whereSales .= " AND sale_tgl = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $whereSales .= " AND sale_tgl = '" . dateTOSql($startDate) . "'";
                }
            }
            if($sale_type != "0"){
                $whereSales .= " AND sale_type = '" . $sale_type . "'";
            }
			
            $whereSales .= " ORDER BY id DESC";

            $listSales = $this->SalesPos_model->all($whereSales);
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "SalesDailyReport-" . date('dmY');
        
        $this->pdf->load_view('SalesReport/SalesDailyReportPDF',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'inputGet'   => $inputGet,
                        	       'listSales'   => $listSales,
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    public function salesdaily_listExcel(){
		
        $inputGet = '';
        $listSales = '';
        if($this->input->get()){
            $startDate = $this->input->get('start');
            $endDate = $this->input->get('end');
            $sale_type = $this->input->get('sale_type');
            $whereSales = '';
            if(!empty($startDate) && !empty($endDate)){
                $whereSales .= " AND sale_tgl >= '" . dateTOSql($startDate) . "'";
                $whereSales .= " AND sale_tgl <= '" . dateTOSql($endDate) . "'";
            }else{
                if(!empty($startDate) || $startDate != ''){
                    $whereSales .= " AND sale_tgl = '" . dateTOSql($startDate) . "'";
                }elseif(!empty($endDate) || $endDate != ''){
                    $whereSales .= " AND sale_tgl = '" . dateTOSql($startDate) . "'";
                }
            }
            if($sale_type != "0"){
                $whereSales .= " AND sale_type = '" . $sale_type . "'";
            }
			
            $whereSales .= " ORDER BY id DESC";

            $listSales = $this->SalesPos_model->all($whereSales);
            $inputGet = $this->input->get();
              
        }
        
        $fileName = "SalesDailyReport-" . date('dmY');
      
        $this->load->view('SalesReport/SalesDailyReportExcel',array (
	                               'moduleTitle'    => $this->moduleTitle,
                        	       'fileName'   	=> $fileName,
                        	       'inputGet'   	=> $inputGet,
                        	       'listSales' 		=> $listSales,
                        		  ));
        
        
        
    }
	
	
    public function kartupiutang() {
        
     

        $custData = $this->Customer_model->all();
        $grid_state = $this->process_grid_state();

        
        $this->page->view('SalesReport/KartuPiutangReport', array (
	       'moduleTitle'      	=> 'Kartu Piutang',
	       'moduleSubTitle'   	=> '',
           'linkPDF' 			=> 'kartupiutang_PDF',
           'linkExcel' 			=> 'kartupiutang_Excel',
           'contentDataCustomer'=> $custData,
		   'action'	       => $this->page->base_url(""),
		));
    } 
    
    
    public function kartupiutang_PDF(){
        
        $inputGet = '';
        $listKartu = '';
		$cust_id = '';
        if($this->input->post()){
            $endDate = $this->input->post('end');
            $cust_id = $this->input->post('cust_id');
            $whereSales = '';
			
            $whereSales .= " AND tgl_bayar <= '" . dateTOSql($endDate) . "'";

            if($cust_id != "0"){
                $whereSales .= " AND cust_id = '" . $cust_id . "'";
            }
			
            $whereSales .= " ORDER BY id";
			
            $listKartu = $this->SalesKartuPiutang_model->all($whereSales);
            $inputGet = $this->input->post();
 

              
        }
      
		
              
        $fileName = "KartuPiutang-" . date('dmY');
        
        $this->pdf->load_view('SalesReport/KartuPiutangReportPDF',array (
	                               'moduleTitle'      => 'Kartu Piutang',
                        	       'inputGet'   => $inputGet,
                        	       'listKartu'   => $listKartu,
                        		  ));
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
    }
    
    
    
    
    
    
	
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */