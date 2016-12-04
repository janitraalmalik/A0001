<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase_order extends MY_Controller {
    
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Purchase Order';
		$this->load->model('PurchaseOrder_model');
		$this->load->model('PurchaseOrderDetail_model');        
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		$this->load->model('Vendors_model');       
         
	}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'purchasing/purchase_order';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('PurchaseOrder/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
    
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->PurchaseOrder_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
            $color = 'warning';
            if($grid->status_po_id == 1){
                $color = 'danger';
            }else{
                $color = 'success';
            }
          
          
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $grid->po_no;
			$row[] = getNameVendor($grid->kd_vendor_supplier,$this->_roleCode);
			$row[] = tgl_indo($grid->po_tgl);
			$row[] = tgl_indo($grid->po_tgl_tagihan);
			$row[] = numberFormat($grid->po_total);
			$row[] = '<span class="label label-'.$color.'">' . getStatusPO($grid->status_po_id,$this->_roleCode) . '</span>';
			$row[] = '<div class="btn-group">
                          <button type="button" class="btn btn-xs btn-flat btn-info">Action</button>
                          <button type="button" class="btn btn-xs btn-flat btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a  
                                href="'.site_url($grid_state . '/edit/' .$grid->id).'" 
                                title="Ubah Data">Ubah</a></li>
                            <li><a  
                                href="'.site_url($grid_state . '/payOrder/' .$grid->id).'" 
                                title="Pembayaran">Pembayaran</a></li>
                            <li><a 
                                onclick="return confirm(\'Apa Anda Yakin Untuk Menghapus Data ' . $grid->po_no . ' ?\')" 
                                href="'.site_url($grid_state . '/delete/'.$grid->id).'" 
                                title="Hapus Data">Hapus</a></li>
                          </ul>
                        </div>';
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->PurchaseOrder_model->count_all(),
			"recordsFiltered" 	=> $this->PurchaseOrder_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}       
    
    private function form($action = 'insert', $viewTPL='form', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
        $grid_state = $this->process_grid_state();
		$title = '';
        $contentData = '';
        $vendorDataRow = '';
        $contentDataDetail = '';
        $contentListPO = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add ';
		} elseif ($this->uri->segment(3) == 'edit') {
			$title = 'Edit ';
            if($id != ''){
                $contentData = $this->PurchaseOrder_model->find($id,'id');
                // -------------------------//
                $wherePODetail = " AND po_no = '" . $contentData['po_no'] . "'";
                $contentDataDetail = $this->PurchaseOrderDetail_model->all($wherePODetail);
                // -------------------------//
                $vendorDataRow = $this->Vendors_model->find($contentData['kd_vendor_supplier'],'vend_kd');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} elseif ($this->uri->segment(3) == 'payOrder') {
		  $title = 'Pembayaran ';
            if($id != ''){
                $contentData = $this->PurchaseOrder_model->find($id,'id');                
                // -------------------------//
                $wherePODetail = " AND po_no = '" . $contentData['po_no'] . "'";
                $contentDataDetail = $this->PurchaseOrder_model->all($wherePODetail);
                // -------------------------//
                $whereListPO = " AND kd_vendor_supplier = '" . $contentData['kd_vendor_supplier'] . "'";
                $whereListPO .= " AND po_no != '" . $contentData['po_no'] . "'";
                $contentListPO = $this->PurchaseOrder_model->all($whereListPO);
                // -------------------------//
                $vendorDataRow = $this->Vendors_model->find($contentData['kd_vendor_supplier'],'vend_kd');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		}
       
        $vendorsData = $this->Vendors_model->all();
        $barangData = $this->Barang_model->all();
        $satuanData = $this->Satuan_model->all();
        
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'back'		       => $grid_state,
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData,
                        'vendorsData'      => $vendorsData,
            			'barangData'	   => $barangData,
            			'satuanData'	   => $satuanData,
            			'vendorDataRow'	   => $vendorDataRow,
            			'contentDataDetail'  => $contentDataDetail,
                        'contentListPO' => $contentListPO
                        );
        
		$this->page->view('PurchaseOrder/' . $viewTPL ,$contect);
	}
	
	public function add(){
		$this->form();
	}
	
	public function edit($id){
		$this->form('update','form', $id);
	}
    
    public function payOrder($id){
		$this->form('payOrder','formPayOrder', $id);
	}
	
	public function insert(){		
		if ( ! $this->input->post()) redirect('my404'); 
	   	
		$this->form_validation->set_rules('nameVendors', 'Nama', 'required');
		$this->form_validation->set_rules('addressVendors', 'Alamat', 'required');
		$this->form_validation->set_rules('phoneVendors', 'No. Tlp', 'required');
		$this->form_validation->set_rules('picVendors', 'Nama Penanggung Jawab', 'required');
        
		if($this->form_validation->run()){
            //echo generateCodePO($this->_roleCode);
//            echo '<pre>';
//            print_r($this->input->post());
//            echo '</pre>';
//            
            $indexS  = post('index');
            $dtlProdukS  = post('dtlProduk');
            $dltKuantitasS  = post('dltKuantitas');
            $dtlNmSatuanS  = post('dtlNmSatuan');
            $dtlIdSatuanS  = post('dtlIdSatuan');
            $dltHargaS  = post('dltHarga');
            $dltTotalS  = post('dltTotal');
            $dtlJmlPajakS  = post('dtlJmlPajak');
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
            
            $generateCodePO = generateCodePO($this->_roleCode);
           
    		$insertContent = array(
                                'po_no' => $generateCodePO,
                                'po_tgl'    => dateTOSql(post('tgltrxPO')),
                                'po_tgl_tagihan'    => dateTOSql(post('tglPenagihanPO')),
								//'po_tgl_pengeriman' => post('addressVendors'),
								//'po_desc'   => post('phoneVendors'),
								'kd_vendor_supplier'    => post('nameVendors'),
								'status_po_id'  => 1,
								'kd_syarat_pembayaran'  => '',
								'po_subtotal'   => post('subTotalInput'),
								'po_ppn'    => post('ppnPOInput'),
								'po_total'   => post('totalPOInput'),
								'vend_pic'   => post('picVendors'),
								'kd_jns_usaha'  => $this->_roleCode,
                            );
                           
            $insert = $this->PurchaseOrder_model->add($insertContent);
            
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
                                            'po_no' => $generateCodePO,
                                            'kd_barang' => $dtlProduk,
                                            'kd_satuan' => $dtlIdSatuan,
            								'jml_barang'    => $dltKuantitas,
            								'harga_satuan'  => $dltHarga,
            								'ppn'   => $dtlPajakCheck,
            								'index' => $index,
            								'kd_jns_usaha'  => $this->_roleCode,
                                        );
                $this->PurchaseOrderDetail_model->add($insertContentDetail);
                
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
        redirect($this->page->base_url());
	}
	
	public function update($id){		
		if ( ! $this->input->post()) redirect('my404'); 

        $this->form_validation->set_rules('nameVendors', 'Nama', 'required');
		$this->form_validation->set_rules('addressVendors', 'Alamat', 'required');
		$this->form_validation->set_rules('phoneVendors', 'No. Tlp', 'required');
		$this->form_validation->set_rules('picVendors', 'Nama Penanggung Jawab', 'required');
        
		if($this->form_validation->run()){
		  
            $indexS  = post('index');
            $dtlProdukS  = post('dtlProduk');
            $dltKuantitasS  = post('dltKuantitas');
            $dtlNmSatuanS  = post('dtlNmSatuan');
            $dtlIdSatuanS  = post('dtlIdSatuan');
            $dltHargaS  = post('dltHarga');
            $dltTotalS  = post('dltTotal');
            $dtlJmlPajakS  = post('dtlJmlPajak');
            $dtlPajakCheckS  = post('dtlPajakCheck');
            $dltIDS  = post('dltID');
            $id  = post('id');
            
            
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
                    $dltIDS = array_splice($dltIDS, 0 ,$key);
                    
                }
               
            }
            
			$updateContent = array(
                                'po_tgl'    => dateTOSql(post('tgltrxPO')),
                                'po_tgl_tagihan'    => dateTOSql(post('tglPenagihanPO')),
								'kd_vendor_supplier'    => post('nameVendors'),
								'status_po_id'  => 1,
								'kd_syarat_pembayaran'  => '',
								'po_subtotal'   => post('subTotalInput'),
								'po_ppn'    => post('ppnPOInput'),
								'po_total'   => post('totalPOInput'),
								'vend_pic'   => post('picVendors'),
								'kd_jns_usaha'  => $this->_roleCode,
			);
            $this->PurchaseOrder_model->update($id,$updateContent,"id");
            
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
                $dltID = $dltIDS[$key2];
                
                $updateContentDetail = array(
                                            'kd_barang' => $dtlProduk,
                                            'kd_satuan' => $dtlIdSatuan,
            								'jml_barang'    => $dltKuantitas,
            								'harga_satuan'  => $dltHarga,
            								'ppn'   => $dtlPajakCheck,
            								'index' => $index,
            								'kd_jns_usaha'  => $this->_roleCode,
                                        );
                $this->PurchaseOrderDetail_model->update($dltID,$updateContentDetail,"id");
                
                $index++;
            }
            
            
        }else{
            $ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' => 'Field is required.',
			);
            
            $this->session->set_flashdata('ui_messages',$ui_messages);
//            redirect('setting/users/add');       
            $this->form($id);
            return true;
		}
			
		redirect($this->page->base_url());
                
	}
	
	public function delete($id){
		if ($this->agent->referrer() == '') redirect('my404');
        
        if(!isset($id) || $id == ''){
            redirect($this->page->base_url('/'));
        }
        $data_row = $this->PurchaseOrder_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->PurchaseOrder_model->delete($id,'id');
        $this->PurchaseOrderDetail_model->delete($data_row['po_no'],'po_no');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */