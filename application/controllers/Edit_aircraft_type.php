<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_aircraft_type extends CI_Controller {

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
				$data['aircraft_type']=$this->Base_model->get_aircraft_type($id);
            	$this->load->view('header');
				$this->load->view('edit_aircraft_type',$data);
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
	public function update_type()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);
		echo $flag=$this->Base_model->update_aircraft_type($info);

	}

	
}
