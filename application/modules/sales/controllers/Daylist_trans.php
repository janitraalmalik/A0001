<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Daylist_trans extends MY_Controller {
    
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'List Transaksi Harian';
		$this->load->model('SalesPos_model');
		$this->load->model('SalesPosDetail_model');
		$this->load->model('Customer_model');                
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		$this->load->model('SalesKartuPiutang_model');
		$this->load->model('SalesPiutang_model');
		
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
        
        $this->page->view('pos/DailyReport', array (
	       'moduleTitle'      	=> $this->moduleTitle,
	       'moduleSubTitle'   	=> '',
           'linkPDF' 			=> 'salesdaily_listPDF',
           'linkExcel' 			=> 'salesdaily_listExcel',
	       'inputGet'   		=> $inputGet,
	       'listSales'   		=> $listSales,
		));
    } 
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */