<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_broker extends CI_Controller {

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
				$this->load->library('pagination');
				$config = array();
				$config['base_url'] = site_url('edit_broker/index/' . $id);
				$total_row=$this->Base_model->total_customer_by_broker($id);
				$config["total_rows"] = $total_row;
				$config["per_page"] = 5;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = $total_row;
				$config['cur_tag_open'] = '&nbsp;<a class="current">';
				$config['cur_tag_close'] = '</a>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$config['uri_segment'] = 4;
				$this->pagination->initialize($config);
				if($this->uri->segment(4)){
				$page = ($this->uri->segment(4)) ;
				$page=$page-1;
				$page=$page*$config["per_page"];
				}
				else{
				$page = 0;
				}
				$data["customer_list"] = $this->Base_model->customer_list_by_broker($config["per_page"], $page,$id);
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page']=$page;

				$data['broker']=$this->Base_model->get_broker($id);
				
				$this->load->view('header');
				$this->load->view('edit_broker',$data);
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
	public function update_broker()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);
		echo $flag=$this->Base_model->update_broker($info);
	}
	public function delete_broker($id=NULL)
	{
		$flag=$this->Base_model->delete_broker($id);
		if($flag==true)
		{
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
