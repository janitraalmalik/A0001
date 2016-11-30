<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
* Updated by SAM (Jun 23,2015)
* change logs
* add variable "by" to delete function
*
*/

class MY_Controller extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        /* updated by same */
        $roleSession = $this->session->userdata('roleSession');
        
        if(!isset($roleSession['roleName']) || $roleSession['roleName'] == ''){
            redirect(site_url('/dashboard/roles'));
        }
        /* end */
    }
    public function __call($method, $args){
        $return = call_user_func_array(array($this, $method), $args);
        return $return;
    }

}