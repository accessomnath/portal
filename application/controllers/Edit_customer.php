<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_customer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($id=NULL)
	{
		if(is_user_logged_in())
		{
			$flag= get_current_pos();
			if(check_access($flag))
			{
				$data['brokers']=$this->Base_model->get_all_brokers();
				$data['customer']=$this->Base_model->get_customer($id);
				$this->load->view('header');
				$this->load->view('edit_customer',$data);
				$this->load->view('footer');
			}
			else
			{
				redirect('dashboard');
			}
		}
		else
		{
			redirect('login');
		}
	}
	public function customer_update()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);

		if(isset($info['broker']))
	      {
	        $broker=$info['broker'];
	        $count_relation=$this->Base_model->count_broker_customer_relation($info['id']);
	        if($count_relation>0)
	        {
	        	$del =$this->Base_model->delete_broker_customer_relation($info['id']);
	        	if($del==true)
	    		{
	    			$add=$this->Base_model->add_broker_customer_relation($broker,$info['id']);
	    		}
	        }
	        else
	        {
	        	$add=$this->Base_model->add_broker_customer_relation($broker,$info['id']);
	        }
	        
    		
	      }
	    
      	unset($info['broker']);

		echo $flag=$this->Base_model->customer_update($info);
	}
	public function delete_customer($id)
	{
		$flag=$this->Base_model->delete_customer($id);
		if($flag==true)
		{
			$del =$this->Base_model->delete_broker_customer_relation($id);
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		else
		{
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
	}
	public function create_group()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);
		$flag=$this->Base_model->create_group($info);
		if($flag=="success")
		{
			group_list();
		}
		else
		{
			echo $flag;
		}
	}

	
}
