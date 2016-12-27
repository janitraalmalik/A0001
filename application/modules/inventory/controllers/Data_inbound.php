<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_inbound extends MY_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Data Inbound';
                      
		$this->load->model('InboundDetail_model');
		$this->load->model('Barang_model');
		$this->load->model('Inbound_model');
			}
    
    private function process_grid_state(){
		$segments = $this->uri->rsegment_array();
		$grid_state = 'inventory/data_inbound';
		foreach($segments as $segment){
			if(strrpos($segment, ':') !== FALSE){
				$grid_state .= $segment.'/';
			}
		}	
		return $grid_state;
	}
    
	public function index() {
	   //$grid_state = $this->process_grid_state();
      
	   $this->page->view('Inbound/index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    } 
    
    public function get_data(){
        
        $grid_state = $this->process_grid_state();
		$list = $this->Inbound_model->get_data();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $grid) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $grid->id_inbound;
			$row[] = tgl_indo($grid->date_in);
			$row[] = $grid->po_no;
			$row[] = $grid->brg_nama;
			$row[] = number_format($grid->jml_in);
			$row[] = number_format($grid->refund);
			$row[] = number_format($grid->sisa);
			
			$row[] = '<div style="width:100%;text-align:center;">
                        <a 
                            class="btn btn-xs btn-flat btn-info" 
                            href="'.site_url($grid_state . '/edit/' .$grid->id_inbound).'" 
                            title="Update Data">Update</a> &nbsp;
                    </div>'; 
			$data[] = $row;
		}
		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Inbound_model->count_all(),
			"recordsFiltered" 	=> $this->Inbound_model->count_filtered(),
			"data" 				=> $data,
		);
		//output to json format
		echo json_encode($output);
	}       
    
    private function form($action = 'simpan', $viewTPL='form', $id = ''){
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
        $grid_state = $this->process_grid_state();
		$title = '';
        $contentData = '';
		if($this->uri->segment(3) == 'add'){ 
			$title = 'Add ';
		} elseif ($this->uri->segment(3) == 'edit') {
			$title = 'Edit ';
            if($id != ''){
                $contentData = $this->Barang_model->find($id,'id');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));0
                }           
            }
		} 
        
        $getPO = $this->Inbound_model->getPO();
        $barangData = $this->Barang_model->all();
        //var_dump($getPO);exit();
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'back'		       => $grid_state,
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData,
            			'barangData'	   => $barangData,
            			'getPO'			   => $getPO			
                        );
        
		$this->page->view('Inbound/' . $viewTPL ,$contect);
	}
	
	public function simpan(){

        $poNo  = post('poNo');
        $noReff  = post('noReff');
        $tgltrxPO  = post('tgltrxPO');
        $jml_inS  = post('jml_in');
        $refundS  = post('refund');
        $sisaS  = post('sisa');
        $brg_namaS  = post('brg_nama');		
		
        foreach($brg_namaS AS $key=> $val1){
            
            $jmlin = $jml_inS[$key];  
            
            if($jmlin == '' || $jmlin == 0 || !isset($jmlin)){
                unset($brg_namaS[$key]);
                unset($jml_inS[$key]);
                unset($refundS[$key]);
                unset($sisaS[$key]);
               
<<<<<<< HEAD
=======
            } 	

          //var_dump($jml_inS);exit();  

		  foreach($brg_namaS AS $key => $val){
                
                $brg_nama = $val;
                $jml_in = str_replace(',', '', $jml_inS[$key]);
                $refund = str_replace(',', '', $refundS[$key]);
                $sisa = str_replace(',', '', $sisaS[$key]);
                
                $generateCodeInbound = generateCodeInbound($this->_roleCode);
				//echo $val . '<br />';
				$insertContentDetail = array(
											'id_inbound'	=> $generateCodeInbound,
                                            'po_no' => $poNo,
                                            'no_ref_vendor' => $noReff,
                                            'date_in' => dateTOSql($tgltrxPO),
                                            'barang_kd' => $brg_nama,
                                            'jml_in' => $jml_in,
                                            'refund' => $refund,
                                            'sisa' => $sisa,
                                            'kd_jns_usaha'  => $this->_roleCode,
                                            //'sudah'  => 1
                                        );
                $this->InboundDetail_model->add($insertContentDetail);
                saveGenerateCodeInbound($this->_roleCode);

                $last 		= $this->InboundDetail_model->getLastStock($brg_nama);

                $lastStok 	= $last->stok + $jml_in; 
                //var_dump($lastStok);

                $sto = array(
                	'stok' => $lastStok
                	);
                 $this->db->where('brg_kd',$brg_nama);
                 $this->db->update('p_m_barang',$sto);
>>>>>>> a57d3e217b7f1fd153501e3fe953bf0cdf1bd1d3
            }
           
        } 	

        foreach($brg_namaS AS $key => $val){
            
            $brg_nama = $val;
            $jml_in = $jml_inS[$key];
            $refund = $refundS[$key];
            $sisa = $sisaS[$key];
            
            $generateCodeInbound = generateCodeInbound($this->_roleCode);
        	//echo $val . '<br />';
        	$insertContentDetail = array(
        								'id_inbound'	=> $generateCodeInbound,
                                        'po_no' => $poNo,
                                        'no_ref_vendor' => $noReff,
                                        'date_in' => dateTOSql($tgltrxPO),
                                        'barang_kd' => $brg_nama,
                                        'jml_in' => $jml_in,
                                        'refund' => $refund,
                                        'sisa' => $sisa,
                                        'kd_jns_usaha'  => $this->_roleCode,
                                        //'sudah'  => 1
                                    );
            $this->InboundDetail_model->add($insertContentDetail);
            saveGenerateCodeInbound($this->_roleCode);
        
            $last 		= $this->InboundDetail_model->getLastStock($brg_nama);
        
            $lastStok 	= $last->stok + $jml_in;
        
            $sto = array(
            	'stok' => $lastStok
            	);
             $this->db->where('brg_kd',$brg_nama);
             $this->db->update('p_m_barang',$sto);
        }
            
            $lastInboundPOValue		= $this->InboundDetail_model->getLastInboundValue($poNo)->jml_in;
            $lastPOdetailValue 		= $this->InboundDetail_model->getLastPOdetailValue($poNo)->jml_barang;

	            if($lastInboundPOValue == $lastPOdetailValue){
	            		$a  = array('status_po_id' => 2 );
	                   $this->db->where('po_no',$poNo);
	                   $this->db->update('p_t_po',$a);

	            }
         /*  foreach($sisaS AS $key1=> $val11){
                
                $sisah = $sisaS[$key1];  
                
                if($sisah ==  0){
                  	$a  = array('status_po_id' => 2 );
                   $this->db->where('po_no',$poNo);
                   $this->db->update('p_t_po',$a);

                }
               
            } */	
            
         // die();
         redirect('inventory/data_inbound/add');
		
	}
	
	public function add(){
		//die('tes');
		//$this->load->view('inventory/Inbound/form');
		$this->form();
	}
	
	public function inbound_in($poNo){
		
	}
	
	public function showPOitem($po){
			
		$sqld = "select * from (select a.kd_barang,
						c.brg_nama,
						a.kd_satuan,
						b.satuan_name,
						a.jml_barang,
		            IFNULL((select sum(d.jml_in) from i_t_inbound d where d.po_no = a.po_no and a.kd_barang = d.barang_kd),0) masuk,
                (a.jml_barang - IFNULL((select sum(d.jml_in) from i_t_inbound d where d.po_no = a.po_no and a.kd_barang = d.barang_kd),0)) saldo_barang
							from p_t_podetail  a
							left join p_m_satuan b on (a.kd_satuan = b.id and b.kd_jns_usaha = a.kd_jns_usaha)
							left join p_m_barang c on (c.brg_kd = a.kd_barang and c.kd_jns_usaha = a.kd_jns_usaha)
		   		where a.po_no = '".$po."' and a.kd_jns_usaha = '".$this->_roleCode."') t where t.saldo_barang <> 0";
		$sql = $this->db->query($sqld)->result();
							
		die(json_encode($sql));
		
	}
	
	public function edit($id){
		$this->form('update', $id);
	}
	
		
	public function update($id){		
		if ( ! $this->input->post()) redirect('my404'); 

        $this->form_validation->set_rules('codeBarang', 'Code', 'required');
		$this->form_validation->set_rules('nameBarang', 'Name', 'required');
		$this->form_validation->set_rules('catBarang', 'Category', 'required');
        
		if($this->form_validation->run()){
		    
			$updateContent = array(
                                'brg_kd'     => post('codeBarang'),
                                'brg_nama'   => post('nameBarang'),
								'brg_desc'   => post('descBarang'),
								'cat_barang_id'   => post('catBarang'),
                                'kd_jns_usaha'  => 'JU001',
			);		
			
            $this->Barang_model->update($id,$updateContent,"id");
            
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
        $data_row = $this->Barang_model->find($id,'id');
        if(count($data_row) == 0){
            redirect($this->page->base_url('/'));
        }
        $this->Barang_model->delete($id,'id');
		redirect($this->page->base_url("/"));
		
	}
    
    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */
