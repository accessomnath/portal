<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Modify_quotation extends CI_Controller {
    
    public function index($id = NULL) {
        if (is_user_logged_in()) {
            if ($id != NULL) {
                $flag = get_current_pos();
                if (check_access($flag)) {
                    $data['quote']=$this->Base_model->get_quote($id);
                    $this->load->view('header');
                    $this->load->view('modify_quotation',$data);
                    $this->load->view('footer');
                } else {
                    redirect('dashboard');
                }
            } else {
                $this->load->library('user_agent');
                redirect($this->agent->referrer());
            }
        } else {
            redirect('login');
        }
    }
    public function update_quotation()
    {
    	
    	$unique_id=$_POST['unique_id'];
    	$info=array(
    		'logo_visible'=>$_POST['logo_visible'],
    		'contact_visible'=>$_POST['contact_visible'],
    		'contact_number'=>$_POST['contact_number'],
    		'top_content'=>$_POST['top_content'],
    		'bottom_content'=>$_POST['bottom_content']
    		);
    	
    	foreach ($info as $key => $value) {
    		$check=strip_tags($value);
    		if(strlen($check)<1)
    		{
    			unset($info[$key]);
    		}
    	}
    	
    	$flag=$this->Base_model->manage_meta_data($unique_id,$info,'quote');
    	$this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
  
}
