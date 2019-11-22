<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_operator extends CI_Controller {

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
			
			if($id!=NULL)
			{
				$flag= get_current_pos();
				if(check_access($flag))
				{
					$this->load->library('pagination');
					$config = array();
					$config["base_url"] = base_url()."index.php/edit_operator/index/".$id;
					$total_row=$this->Base_model->total_aircrafts($id);
					$config["total_rows"] = $total_row;
					$config["per_page"] = 5;
					$config['use_page_numbers'] = TRUE;
					$config['num_links'] = $total_row;
					$config['cur_tag_open'] = '&nbsp;<a class="current">';
					$config['cur_tag_close'] = '</a>';
					$config['next_link'] = 'Next';
					$config['prev_link'] = 'Previous';
					$this->pagination->initialize($config);
					if($this->uri->segment(4)){
					$page = ($this->uri->segment(4)) ;
					$page=$page-1;
					$page=$page*$config["per_page"];
					}
					else{
					$page = 0;
					}
					$data["aircraft_list"] = $this->Base_model->aircraft_list($config["per_page"], $page,$id);
					$str_links = $this->pagination->create_links();
					$data["links"] = explode('&nbsp;',$str_links );
					$data['operator_id']=$id;
					$data['operator']=$this->Base_model->get_operator($id);

					$this->load->view('header');
					$this->load->view('edit_operator',$data);
					$this->load->view('footer');
					}
				else
				{
					redirect('dashboard');
				}
			}
			else
			{
				$this->load->library('user_agent');
				redirect($this->agent->referrer());
			}
		}
		else
		{
			redirect('login');
		}
	}
	public function operator_update()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);
		echo $flag=$this->Base_model->operator_update($info);
	}
	public function delete_operator($id=NULL)
	{
		$flag=$this->Base_model->delete_operator($id);
		if($flag==true)
		{
			$this->Base_model->delete_aircraft_by_operator($id);
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		else
		{
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		
	}


	
}
