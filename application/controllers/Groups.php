<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

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
				
				$this->load->view('header');
				$this->load->view('groups');
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
	public function create_group()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);

		$flag=$this->Base_model->create_group($info);
		if($flag=="success")
		{
			get_group_table();
		}
		else
		{
			echo $flag;
		}
	}
	public function update_groups()
	{
		$data['id']=$this->input->post('id');
		$data['group_name']=$this->input->post('group_name');
		$flag=$this->Base_model->update_group($data);
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
	public function delete_group($id=NULL)
	{
		$this->Base_model->delete_group($id);
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}

	
}
