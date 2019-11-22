<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_operator extends CI_Controller {

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
				$last_id=$this->Base_model->max_operator_id();
				if($last_id->id!=NULL){ $max=$last_id->id+1; }else{ $max=1;}
				$data['max']=$max;


				$this->load->view('add_operator',$data);
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
	public function get_cities()
	{
		$country_id=$_POST['country_id'];
		echo $country_id;
		$cities=$this->Base_model->get_cities_by_country($country_id);
		if(count($cities)>0)
		{
			foreach($cities as $city):
				if($city->id==$_POST['city']):$select="selected";else:$select='';endif;
			echo"<option value='".$city->id."' ".$select.">".$city->name."</option>";
			endforeach;
		}
		else
		{
			echo"<option value='0'></option>";
		}
		

	}
	public function add_new_operator()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);
		echo $flag=$this->Base_model->add_new_operator($info);
		
	}

	
}
