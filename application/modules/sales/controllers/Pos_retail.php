<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Pos_retail extends MY_Controller {
    
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Penjualan Retail';
        $this->saletype = 'Retail';
		$this->load->model('SalesPos_model');
		$this->load->model('SalesPosDetail_model');
		$this->load->model('Customer_model');                
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');  
		
         
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'sales/pos_retail';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('pos/indexRetail', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
	
	function get_detail($barcode){
		echo json_encode($this->db->query("select * from p_m_barang where brg_kd = '$barcode'")->row());
	}
    
    public function get_data(){
        $this->SalesPos_model->set_variable($this->saletype);

        $grid_state = $this->process_grid_state();
		$list = $this->SalesPos_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
            $color = 'warning';
            $color2 = 'warning';
            $linkOutstanding = '';
         
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $grid->sale_no;
			$row[] = tgl_indo($grid->sale_tgl);
            $row[] = $grid->sale_type;
            $row[] = "<div style='text-align:right;'>" .numberFormat($grid->sale_total). "</div>";
            $row[] = "<div style='text-align:right;'>" .numberFormat($grid->sale_bayar). "</div>";
			$row[] = '<div style="text-align:center"><div class="btn-group">
                          <button type="button" class="btn btn-xs btn-flat btn-info">Action</button>
                          <button type="button" class="btn btn-xs btn-flat btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a  
                                href="'.site_url($grid_state . '/view/' .$grid->id).'" 
                                title="Lihat Data">Lihat</a></li>
                            <li><a 
                                target="_BLANK" 
                                href="'.site_url($grid_state . '/cetak/' .$grid->id).'" 
                                title="Cetak PO">Cetak</a></li>
                            <!--li><a  
                                href="'.site_url($grid_state . '/edit/' .$grid->id).'" 
                                title="Ubah Data">Ubah</a></li-->
                            ' . $linkOutstanding . '
                            <li><a 
                                onclick="return confirm(\'Apa Anda Yakin Untuk Menghapus Data ' . $grid->sale_no . ' ?\')" 
                                href="'.site_url($grid_state . '/delete/'.$grid->id).'" 
                                title="Hapus Data">Hapus</a></li>
                          </ul>
                        </div></div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->SalesPos_model->count_all(),
			"recordsFiltered" 	=> $this->SalesPos_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}       
    
    private function form($action = 'insert', $viewTPL='formRetail', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
        $grid_state = $this->process_grid_state();
		$title = '';
        $contentData = '';
        $vendorDataRow = '';
        $contentDataDetail = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add ';
		} elseif ($this->uri->segment(3) == 'view') {
			$title = 'View ';
            if($id != ''){
                $contentData = $this->SalesPos_model->find($id,'id');
                // -------------------------//
                $whereSalesDetail = " AND sale_no = '" . $contentData['sale_no'] . "'";
                $contentDataDetail = $this->SalesPosDetail_model->all($whereSalesDetail);
                // -------------------------//
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		}elseif ($this->uri->segment(3) == 'bayarRetail') {
			$title = 'Bayar ';
            if($id != ''){
                $contentData = $this->SalesPos_model->find($id,'id');
                // -------------------------//
                $whereSalesDetail = " AND sale_no = '" . $contentData['sale_no'] . "'";
                $contentDataDetail = $this->SalesPosDetail_model->all($whereSalesDetail);
                // -------------------------//
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		}elseif ($this->uri->segment(3) == 'edit' OR $this->uri->segment(3) == 'update') {
			$title = 'Edit ';
            if($id != ''){
                $contentData = $this->SalesPos_model->find($id,'id');
                // -------------------------//
                $whereSalesDetail = " AND sale_no = '" . $contentData['sale_no'] . "'";
                $contentDataDetail = $this->SalesPosDetail_model->all($whereSalesDetail);
                // -------------------------//
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} 
       
        
        $barangData = $this->Barang_model->all();
        $satuanData = $this->Satuan_model->all();
        
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'back'		       => $grid_state,
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData,
            			'barangData'	   => $barangData,
            			'satuanData'	   => $satuanData,
            			'contentDataDetail'  => $contentDataDetail
                        );
        
		$this->page->view('Pos/' . $viewTPL ,$contect);
	}
	
	public function add(){
		$this->form();
	}
    
    public function view($id){
		$this->form('#','formViewRetail', $id);
	}
	
	public function edit($id){
		$this->form('update','form', $id);
	}
    
    public function payOrder($id){
		$this->form('insertPayOrder','formPayOrder', $id);
	}
	
    public function bayarRetail($id){
		$this->form('insertBayar','formBayar', $id);
	}
	
	
	public function insert(){		
		if ( ! $this->input->post()) redirect('my404'); 
	   	
		$this->form_validation->set_rules('tgltrxPOS', 'Tgl Sale', 'required');
		
		if($this->form_validation->run()){
		
            $indexS  = post('index');
            $dtlProdukS  = post('dtlProduk');
            $dltKuantitasS  = post('dltKuantitas');
            $dtlNmSatuanS  = post('dtlNmSatuan');
            $dtlIdSatuanS  = post('dtlIdSatuan');
            $dltHargaS  = post('dltHarga');
            $dltTotalS  = post('dltTotal');
            $dtlJmlPajakS  = post('dtlJmlPajak');
            $dtlTotalbayarS  = post('totalSaleBayar');            
            $dtlPajakCheckS  = post('dtlPajakCheck');
            
            foreach($indexS AS $key => $val){
                
                $dtlProduk = $dtlProdukS[$key];
                
                if($dtlProduk == '' || !isset($dtlProduk)){                   
                    $indexS = array_splice($indexS, 0 ,$key);
                    $dtlProdukS = array_splice($dtlProdukS, 0 ,$key);
                    $dltKuantitasS = array_splice($dltKuantitasS, 0 ,$key);
                    $dtlNmSatuanS = array_splice($dtlNmSatuanS, 0 ,$key);
                    $dtlIdSatuanS = array_splice($dtlIdSatuanS, 0 ,$key);
                    $dltHargaS = array_splice($dltHargaS, 0 ,$key);
                    $dltTotalS = array_splice($dltTotalS, 0 ,$key);
                    $dtlJmlPajakS = array_splice($dtlJmlPajakS, 0 ,$key);                    
                    $dtlPajakCheckS = array_splice($dtlPajakCheckS, 0 ,$key);
                    
                }
               
            }
            
            $generateCodePos = generateCodePos($this->_roleCode,'posretail');
            
    		$insertContent = array(
                                'sale_no' => $generateCodePos,
                                'sale_tgl'    => dateTOSql(post('tgltrxPOS')),
								'sale_type'    => 'RETAIL',
                                'sale_bayar' => str_replace(",","",post('totalSaleBayar')),
								'sale_subtotal'   => post('subTotalInput'),
								'sale_ppn'    => post('ppnPOSInput'),
								'sale_total'   => post('totalPOSInput'),
								'kd_jns_usaha'  => $this->_roleCode,
                            );
                           
            $insert = $this->SalesPos_model->add($insertContent);
            
            saveGenerateCodePos($this->_roleCode,'posretail');
            
            $index = 1;
            foreach($indexS AS $key2 => $row2){
                
                $dtlProduk = $dtlProdukS[$key2];
                $dltKuantitas = str_replace(',', '', $dltKuantitasS[$key2]);
                $dtlNmSatuan = $dtlNmSatuanS[$key2];
                $dtlIdSatuan = $dtlIdSatuanS[$key2];
                $dltHarga = str_replace(',', '', $dltHargaS[$key2]);
                $dltTotal = str_replace(',', '', $dltTotalS[$key2]);
                $dtlPajakCheck = $dtlPajakCheckS[$key2];
                $dtlJmlPajak = str_replace(',', '', $dtlJmlPajakS[$key2]);
                
                
                $insertContentDetail = array(
                                            'sale_no' => $generateCodePos,
                                            'brg_kd' => $dtlProduk,
                                            'satuan_kd' => $dtlIdSatuan,
            								'qty'    => $dltKuantitas,
            								'harga_satuan'  => $dltHarga,
            								'ppn'   => $dtlPajakCheck,
            								'index' => $index,
            								'kd_jns_usaha'  => $this->_roleCode,
                                        );
                $this->SalesPosDetail_model->add($insertContentDetail);
                
                $index++;
            }
            if($insert == true){
                redirect($this->page->base_url('/'));
				
				
            }
                            
		}else{
  		
			$ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' => 'Field is required.',
			);
            $this->session->set_flashdata('ui_messages',$ui_messages);
//            redirect('setting/users/add');       
            $this->form();
            return true;
		}
        //redirect($this->page->base_url());

	}
	
	
    
    function validate_jumlahbayar($str)
    {
        
       $this->form_validation->set_message("validate_jumlahbayar","{No Transaksi : " . $str . ", Jumlah Bayar Tidak boleh melebihi Tagihan},");
       if(isset($str)){
            return FALSE;  
       }else{ 
            return TRUE;
       }
       
    }
    
    public function cetak($id){        
        
        $fileName = '';
        $contentData = '';
        //$vendorDataRow = '';
        $contentDataDetail = '';
        if(!empty($id)){
            $contentData = $this->SalesPos_model->find($id,'id');
            // -------------------------//
            $wherePOSDetail = " AND sale_no = '" . $contentData['sale_no'] . "'";
            $contentDataDetail = $this->SalesPosDetail_model->all($wherePOSDetail);
            // -------------------------//            // -------------------------//
            
            if(count($contentData) == 0){
                redirect($this->page->base_url('/'));
            }      
        }
        
        
        $this->pdf->load_view('Pos/PosRetailFormPDF.php',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'contentData'   => $contentData,
                        	       'contentDataDetail'   => $contentDataDetail
                        		  ));
                                  
        $this->pdf->set_paper('A4', 'portrait');
		$this->pdf->render();
		$this->pdf->stream($fileName .".pdf",array("Attachment"=>0));
        
    }
    
	public function delete($id){
		if ($this->agent->referrer() == '') redirect('my404');
        
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->SalesPos_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->SalesPos_model->delete($id,'id');
        $this->SalesPosDetail_model->delete($data_row['sale_no'],'sale_no');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */