<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aircraft_search extends CI_Controller {

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
	public function index()
	{
		if(is_user_logged_in())
		{
			$flag= get_current_pos();
			if(check_access($flag))
			{
				
				$this->load->view('header');
				$this->load->view('aircraft-search');
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
	public function reg_search()
	{
		$data=$_POST['data'];
		$class=(isset($_POST['classes'])?$_POST['classes']:'');
		$res=$this->Base_model->aircraft_registration($data);
		if($res!=NULL)
		{
			foreach($res as $r)
			{
				echo"<li>";
				echo "<a href='#' class='".$class."'>".$r->r_number.'</a>';
				echo"</li>";
			}
		}
	}
	

	
}
