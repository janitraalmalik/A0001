<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Inventory extends CI_Controller {
    
	public function __construct() {
	   
		parent::__construct();
        
		date_default_timezone_set('Asia/Jakarta');
		$this->page->use_directory();
        $this->moduleTitle = 'Inventory';
	}
    
	public function index() {
	          
	   $this->page->view('Inventory/view_index', array (
			'moduleTitle'      => $this->moduleTitle,
			'moduleSubTitle'   => '',
			'add'		=> $this->page->base_url('/add')
		));
    }        
}
/* End of file Purchasing.php */
/* Location: ./application/modules/purchasing/controllers/Purchasing.php */