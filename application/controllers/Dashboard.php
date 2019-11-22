<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		
        $data['total_operators']=$this->Base_model->total_operators();
			$data['total_aircraft']=$this->Base_model->count_aircraft();
            $data['total_quote']=$this->Base_model->total_quote();
            $data['reminder']=$this->Base_model->quick_reminder();
			$this->load->view('header');
			$this->load->view('dashboard',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect('login');
		}
	}
	
}
