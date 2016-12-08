<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_pettycash extends CI_Controller {

    public function __construct() {

        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');
        $this->page->use_directory();
        $this->moduleTitle = 'Data Kas Kecil';
        $this->load->model('Kaskecil_model');
    }

    private function process_grid_state(){
        $segments = $this->uri->rsegment_array();
        $grid_state = 'hrm/data_pettycash';
        foreach($segments as $segment){
            if(strrpos($segment, ':') !== FALSE){
                $grid_state .= $segment.'/';
            }
        }
        return $grid_state;
    }

    public function index() {
        //$grid_state = $this->process_grid_state();

        $this->page->view('Kaskecil/index', array (
            'moduleTitle'      => $this->moduleTitle,
            'moduleSubTitle'   => '',
            'add'		=> $this->page->base_url('/add_opening'),
			'add_reimb'	=> $this->page->base_url('/add_reimb')
        ));
    }

    public function get_data(){

        $grid_state = $this->process_grid_state();
        $list = $this->Kaskecil_model->get_data();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $grid) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $grid->claim_date;
            $row[] = $grid->Type;
            $row[] = $grid->claim_no;
            $row[] = $grid->acc_name;
            $row[] = $grid->period_s;
            $row[] = $grid->period_e;
            $row[] = number_format($grid->debet,0);
            $row[] = number_format($grid->credit,0);
            $row[] = $grid->petty_desc;
            $row[] = '<div style="width:100%;text-align:center;">
                        <a 
                            class="btn btn-xs btn-flat btn-info" 
                            href="'.site_url($grid_state . '/edit/' .$grid->pettycash_id).'" 
                            title="Update Data">Update</a> &nbsp;
                        <a 
                            class="btn btn-xs btn-flat btn-danger" 
                            onclick="return confirm(\'Are you sure to delete data ' . $grid->petty_desc. ' ?\')" 
                            href="'.site_url($grid_state . '/delete/'.$grid->pettycash_id).'" 
                            title="Delete Data">Delete</a>
                    </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" 				=> $_POST['draw'],
            "recordsTotal" 		=> $this->Kaskecil_model->count_all(),
            "recordsFiltered" 	=> $this->Kaskecil_model->count_filtered(),
            "data" 				=> $data,
        );
        //output to json format
        echo json_encode($output);
    }


	////////begin type=opening
	
	
	public function add_opening(){
		$this->form_opening();
	}
	
	
	private function form_opening($action = 'insert', $id = ''){
	
			$this->moduleTitle = 'Kas Kecil Opening';
	
        if ($this->agent->referrer() == '') redirect($this->page->base_url());

        $grid_state = $this->process_grid_state();
        $title = '';
        $contentData = '';

        if($this->uri->segment(3) == 'add_opening'){
            $title = 'Add ';

        } elseif ($this->uri->segment(3) == 'edit') {
            $title = 'Edit ';
            if($id != ''){
                $contentData = $this->Kaskecil_model->find($id,'id');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }
            }
        }


        $contect = array(
            'ui_messages'      => $this->session->flashdata('ui_messages'),
            'moduleTitle'      => $this->moduleTitle,
            'moduleSubTitle'   => $title,
            'back'		       => $grid_state,
            'action'	       => $this->page->base_url("/{$action}/{$id}"),
            'contentData'	   => $contentData
        );

        $this->page->view('Kaskecil/formopening',$contect);
    }

	
	public function insert(){
	
		
        if ( ! $this->input->post()) show_404();

        $this->form_validation->set_rules('claim_date', 'Claim Date', 'required');
        $this->form_validation->set_rules('Type', 'Type', 'required');
        $this->form_validation->set_rules('period_s', 'Periode Start', 'required');
        $this->form_validation->set_rules('period_e', 'Periode End', 'required');
        $this->form_validation->set_rules('credit', 'Amount', 'required');
        $this->form_validation->set_rules('saldo', 'Sisa Saldo', 'required');
        $this->form_validation->set_rules('petty_desc', 'Description', 'required');


        if($this->form_validation->run()){
		
		
			$claim_date = dateTOSql(post('claim_date'));
			$period_s 	= dateTOSql(post('period_s'));
			$period_e 	= dateTOSql(post('period_e'));
		    $credit		= str_replace(',', '', post('credit'));
			$saldo		= str_replace(',', '', post('saldo'));

            $insertContent = array(
                'claim_date'    => $claim_date,
                'Type'          => post('Type'),
                'period_s'      => $period_s,
                'period_e'      => $period_e,
                'credit'        => $credit,
                'saldo'         => $saldo,
                'petty_desc'    => post('petty_desc'),

            );
            $insert = $this->Kaskecil_model->add($insertContent);
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
	
	
		////////end type=opening
		////////begin type=reimbursh
	
	
    private function form_reimb($action = 'insert_reimb', $id = ''){
	
	     $this->moduleTitle = 'Kas Kecil Reimbursh';
	
	
		if ($this->agent->referrer() == '') redirect($this->page->base_url());
		
        $grid_state = $this->process_grid_state();
		$title = '';
        $contentData = '';
		if($this->uri->segment(3) == 'add_reimb'){ 
			$title = 'Add ';
		} elseif ($this->uri->segment(3) == 'edit_reimb') {
			$title = 'Edit ';
            if($id != ''){
                $contentData = $this->Kaskecil_model->find($id,'pettycash_id');
                if(count($contentData) == 0){
                    redirect($this->page->base_url('/'));
                }           
            }
		} 
        
		
        
        $contect = array(
                        'ui_messages'      => $this->session->flashdata('ui_messages'),
                        'moduleTitle'      => $this->moduleTitle,
            			'moduleSubTitle'   => $title,
            			'back'		       => $grid_state,
						'divisi'		   => $this->db->get('hr_m_bagian')->result(),
            			'action'	       => $this->page->base_url("/{$action}/{$id}"),
            			'contentData'	   => $contentData
                        );
        
		$this->page->view('Kaskecil/formreimb',$contect);
	}
	
	public function add_reimb(){
		$this->form_reimb();
	}
	
	
	public function insert_reimb(){		
		if ( ! $this->input->post()) redirect('my404'); 
	   
        
		$this->form_validation->set_rules('claim_date', 'Tgl. Trans.', 'required');
		$this->form_validation->set_rules('Type', 'Type', 'required');
		$this->form_validation->set_rules('bagian_kary', 'Divisi', 'required');
		$this->form_validation->set_rules('acc_name', 'Akun', 'required');
		$this->form_validation->set_rules('debet', 'Amount Debet', 'required');
		$this->form_validation->set_rules('petty_desc', 'Deskripsi', 'required');
		$this->form_validation->set_rules('request', 'Request', 'required');
		
        
		if($this->form_validation->run()){
		  
		    //echo '<pre>';
            //print_r($this->input->post());
            //echo '</pre>';
		  
			$claim_date = dateTOSql(post('claim_date'));
		    $debet 		= str_replace(',', '', post('debet'));
			
			
    		$insertContent = array(
                                'claim_date'    => $claim_date,
								'Type'     		=> post('Type'),
								'acc_name'   	=> post('acc_name'),
								'debet'      	=> $debet,
								'petty_desc'    => post('petty_desc')
                   				/*'kd_jns_usaha'  => 'JU001'*/
                            );
            $insert = $this->Kaskecil_model->add($insertContent);
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
            $this->form_reimb();
            return true;
		}
        redirect($this->page->base_url());
	}
	
	////////end type=reimbursh
	

    
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */