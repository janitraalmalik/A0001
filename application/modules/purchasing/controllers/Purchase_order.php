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
		$this->load->model('PayOrder_model');                
		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		$this->load->model('Vendors_model');
		$this->load->model('InboundDetail_model');   
        
         
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
            $linkOutstanding = '';
            if($grid->status_po_id == 1){
                $color = 'danger';
                $linkOutstanding = '<li><a  
                                href="'.site_url($grid_state . '/payOrder/' .$grid->id).'" 
                                title="Pembayaran">Pembayaran</a></li>';
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
			$row[] = "<div style='text-align:right;'>" . numberFormat($grid->po_total-$grid->po_bayar) . "</div>";
			$row[] = "<div style='text-align:right;'>" . numberFormat($grid->po_total) . "</div>";
			$row[] = '<span class="label label-'.$color.'">' . getStatusPO($grid->status_po_id,$this->_roleCode) . '</span>';
			$row[] = '<div class="btn-group">
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
        $contentDataPay = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add ';
		} elseif ($this->uri->segment(3) == 'view') {
			$title = 'View ';
            if($id != ''){
                $contentData = $this->PurchaseOrder_model->find($id,'id');
                // -------------------------//
                $wherePODetail = " AND po_no = '" . $contentData['po_no'] . "'";
                $contentDataDetail = $this->PurchaseOrderDetail_model->all($wherePODetail);
                // -------------------------//
                $wherePayOrder = " AND po_no = '" . $contentData['po_no'] . "'";
                $contentDataPay = $this->PayOrder_model->all($wherePayOrder);
                // -------------------------//
                $vendorDataRow = $this->Vendors_model->find($contentData['kd_vendor_supplier'],'vend_kd');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} elseif ($this->uri->segment(3) == 'edit' OR $this->uri->segment(3) == 'update') {
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
		} elseif ($this->uri->segment(3) == 'payOrder' OR $this->uri->segment(3) == 'insertPayOrder') {
		  $title = 'Pembayaran ';
            if($id != ''){
                $contentData = $this->PurchaseOrder_model->find($id,'id');                
                // -------------------------//
                $wherePODetail = " AND po_no = '" . $contentData['po_no'] . "'";
                $contentDataDetail = $this->PurchaseOrder_model->all($wherePODetail);
                // -------------------------//
                $whereListPO = " AND kd_vendor_supplier = '" . $contentData['kd_vendor_supplier'] . "'";
                $whereListPO .= " AND po_no != '" . $contentData['po_no'] . "'";
                $whereListPO .= " AND status_po_id = 1";
                $contentListPO = $this->PurchaseOrder_model->all($whereListPO);
                
                //PayOrder_model
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
                        'contentListPO' => $contentListPO,
                        'contentDataPay' => $contentDataPay
                        );
        
		$this->page->view('PurchaseOrder/' . $viewTPL ,$contect);
	}
	
	public function add(){
		$this->form();
	}
    
    public function view($id){
		$this->form('#','formView', $id);
	}
	
	public function edit($id){
		$this->form('update','form', $id);
	}
    
    public function payOrder($id){
		$this->form('insertPayOrder','formPayOrder', $id);
	}
	
	public function insert(){		
		if ( ! $this->input->post()) redirect('my404'); 
	   	
		$this->form_validation->set_rules('nameVendors', 'Nama', 'required');
		$this->form_validation->set_rules('addressVendors', 'Alamat', 'required');
		$this->form_validation->set_rules('phoneVendors', 'No. Tlp', 'required');
		$this->form_validation->set_rules('picVendors', 'Nama Penanggung Jawab', 'required');
        
        $indexS  = post('index');
        $jmlBayarS  = post('jmlBayar');
        $noPOS  = post('noPO');
        $jmlSisaTagihanS  = post('jmlSisaTagihan');
        foreach($indexS as $key=>$val) 
        {
            $jmlBayar  = str_replace(',', '',$jmlBayarS[$key]);
            $noPO  = $noPOS[$key];
            $jmlSisaTagihan  = str_replace(',', '',$jmlSisaTagihanS[$key]);
            
            if($jmlBayar > $jmlSisaTagihan){
                $this->form_validation->set_rules("noPO[".$key."]", "", "callback_validate_jumlahbayar");
            }
            
        }
        
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
            
            foreach($indexS AS $key => $val){
                
                $dltTotal = $dltTotalS[$key];
                
                if($dltTotal == '' || $dltTotal == 0 || !isset($dltTotal)){   
                    unset($indexS[$key]);                   
                    unset($dtlProdukS[$key]);                   
                    unset($dltKuantitasS[$key]);                   
                    unset($dtlNmSatuanS[$key]);                   
                    unset($dtlIdSatuanS[$key]);                   
                    unset($dltHargaS[$key]);                   
                    unset($dltTotalS[$key]);                   
                    unset($dtlJmlPajakS[$key]);                
                    unset($dtlPajakCheckS[$key]);                
                }
            }
            
            $generateCodePO = generateCodePO($this->_roleCode);
           
    		$insertContent = array(
                                'po_no' => $generateCodePO,
                                'po_desc' => post('descPO'),
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
                           
            $insert = $this->PurchaseOrder_model->add($insertContent);
            
            saveGenerateCodePO($this->_roleCode);
            
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
            $noPO = post('codePO');
            
            
            foreach($indexS AS $key => $val){
                
                $dltTotal = $dltTotalS[$key];
                if($dltTotal == '' || $dltTotal == 0 || !isset($dltTotal)){   
                    unset($indexS[$key]);                   
                    unset($dtlProdukS[$key]);                   
                    unset($dltKuantitasS[$key]);                   
                    unset($dtlNmSatuanS[$key]);                   
                    unset($dtlIdSatuanS[$key]);                   
                    unset($dltHargaS[$key]);                   
                    unset($dltTotalS[$key]);                   
                    unset($dtlJmlPajakS[$key]);                
                    unset($dtlPajakCheckS[$key]);                
                    unset($dltIDS[$key]);                          
                }
                
            }
            
			$updateContent = array(
                                'po_desc' => post('descPO'),
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
                
                if(!empty($dltID) || $dltID != ''){
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
                }else{
                    $insertContentDetail = array(
                                                'po_no' => $noPO,
                                                'kd_barang' => $dtlProduk,
                                                'kd_satuan' => $dtlIdSatuan,
                								'jml_barang'    => $dltKuantitas,
                								'harga_satuan'  => $dltHarga,
                								'ppn'   => $dtlPajakCheck,
                								'index' => $index,
                								'kd_jns_usaha'  => $this->_roleCode,
                                            );
                    $this->PurchaseOrderDetail_model->add($insertContentDetail);
                }
                
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
    
    public function insertPayOrder($id){		
		if ( ! $this->input->post()) redirect('my404'); 

        
        $indexS  = post('index');
        $jmlBayarS  = post('jmlBayar');
        $noPOS  = post('noPO');
        $jmlSisaTagihanS  = post('jmlSisaTagihan');
        foreach($indexS as $key=>$val) 
        {
            $jmlBayar  = str_replace(',', '',$jmlBayarS[$key]);
            $noPO  = $noPOS[$key];
            $jmlSisaTagihan  = str_replace(',', '',$jmlSisaTagihanS[$key]);
            
            if($jmlBayar > $jmlSisaTagihan){
                $this->form_validation->set_rules("noPO[".$key."]", "", "callback_validate_jumlahbayar");
            }
            
        }
        $this->form_validation->set_rules('nameVendors', 'Nama', 'required');
        
        
		if($this->form_validation->run()){
           
            
            $tglPenagihanPO  = post('tglPenagihanPO');
            $indexS  = post('index');
            $noPOS  = post('noPO');
            $idPOS  = post('idPO');
            $jmlTagihanS  = post('jmlTagihan');
            $jmlSisaTagihanS  = post('jmlSisaTagihan');
            $jmlBayarS  = post('jmlBayar');
            $id  = post('id');
            
            //echo $jmlBayarS[2] . '<br />';

            foreach($indexS AS $key => $val){
                
                $jmlBayar = $jmlBayarS[$key];  
                
                if($jmlBayar == '' || $jmlBayar == 0 || !isset($jmlBayar)){
                    unset($indexS[$key]);
                    unset($noPOS[$key]);
                    unset($idPOS[$key]);
                    unset($jmlTagihanS[$key]);
                    unset($jmlSisaTagihanS[$key]);
                    unset($jmlBayarS[$key]);         
                }
               
            }
            
            $index = 1;
            
            $generateCodePayment = generateCodePayment($this->_roleCode);
            foreach($indexS AS $key2 => $row2){
                
                $noPO = $noPOS[$key2];
                $idPO = $idPOS[$key2];
                $jmlTagihan = str_replace(',', '', $jmlTagihanS[$key2]);
                $jmlSisaTagihan = str_replace(',', '', $jmlSisaTagihanS[$key2]);
                $jmlBayar = str_replace(',', '', $jmlBayarS[$key2]);
                
                $insertContent = array(
                                            'pembayaran_no' => $generateCodePayment,
                                            'po_no' => $noPO,
                                            'tgl_bayar' => dateTOSql($tglPenagihanPO),
            								'kd_vendor_supplier'    => post('nameVendors'),
            								'pembayaran_total'  => $jmlBayar,
            								'kd_jns_usaha'  => $this->_roleCode,
                                        );
                                        
                $this->PayOrder_model->add($insertContent);
                
                
                $data_rowPO = $this->PurchaseOrder_model->find($idPO,'id');
                
                $statusPO = 1;
                $terbayar = $data_rowPO['po_bayar']+$jmlBayar;
                if($data_rowPO['po_total'] == $terbayar){
                    $statusPO = 2;
                }
                
                $updateContentPO = array(
                                            'status_po_id' => $statusPO,
                                            'po_bayar' => $terbayar
                                        );
                $this->PurchaseOrder_model->update($idPO,$updateContentPO,"id");
                
                
                $index++;
            }
            
            saveCodePayment($this->_roleCode);
                                    
        }else{
            $ui_messages[] = array(
				'severity' => 'ERROR',
				'title' => '',
				'message' =>  strip_tags(validation_errors()),
			);
            
            $this->session->set_flashdata('ui_messages',$ui_messages);
//            redirect('setting/users/add');       
            $this->form('insertPayOrder','formPayOrder', $id);
            return true;
		}
			
		redirect($this->page->base_url());
                
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
        $vendorDataRow = '';
        $contentDataDetail = '';
        if(!empty($id)){
            $contentData = $this->PurchaseOrder_model->find($id,'id');
            // -------------------------//
            $wherePODetail = " AND po_no = '" . $contentData['po_no'] . "'";
            $contentDataDetail = $this->PurchaseOrderDetail_model->all($wherePODetail);
            // -------------------------//            // -------------------------//
            $vendorDataRow = $this->Vendors_model->find($contentData['kd_vendor_supplier'],'vend_kd');
            $fileName = "PurchaseOrder-" . $contentData['po_no'];
            
            if(count($contentData) == 0){
                redirect($this->page->base_url('/'));
            }      
        }
        
        
        $this->pdf->load_view('PurchaseOrder/PurchaseFormPDF',array (
	                               'moduleTitle'      => $this->moduleTitle,
                        	       'contentData'   => $contentData,
                        	       'contentDataDetail'   => $contentDataDetail,
                                   'vendorDataRow' => $vendorDataRow
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