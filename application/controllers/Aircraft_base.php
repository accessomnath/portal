<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aircraft_base extends CI_Controller {

	
	public function index()
	{
		if(is_user_logged_in())
		{
			$flag= get_current_pos();
			if(check_access($flag))
			{
				$this->load->library('pagination');
				$config = array();
				$config["base_url"] = base_url()."index.php/aircraft_base/index";
				$total_row=$this->Base_model->total_aircraft_base();
				$config["total_rows"] = $total_row;
				$config["per_page"] = 10;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = $total_row;
				$config['cur_tag_open'] = '&nbsp;<a class="current">';
				$config['cur_tag_close'] = '</a>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$this->pagination->initialize($config);
				if($this->uri->segment(3)){
				$page = ($this->uri->segment(3)) ;
				$page=$page-1;
				$page=$page*$config["per_page"];
				}
				else{
				$page = 0;
				}
				$data["aircrat_base_list"] = $this->Base_model->aircrat_base_list($config["per_page"], $page);
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page']=$page;
				$this->load->view('header');
				$this->load->view('aircraft_base',$data);
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
	public function delete_base($id=NULL)
    {
    	$this->Base_model->delete_aircraft_base($id);
    	$this->load->library('user_agent');
		redirect($this->agent->referrer());
    
    }
	public function airport_filter()
	{
    $data=$_POST['data'];
    if(strlen($data)>0)
    {
    $res=$this->Base_model->airport_filter($data);
    if($res!=NULL)
    	{
    		foreach ($res as $key => $value) {
    			echo"<li><a href='#' class='base-detail'>".$value->FIELD5.','.$value->FIELD6.','.$value->FIELD2.','.$value->FIELD3.','.$value->FIELD4."</a></li>";
    		}
    	}
    	else{
    		echo"<li>None Found</li>";
    	}
    }
	}	
	

	
}
