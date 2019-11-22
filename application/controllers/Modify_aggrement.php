<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modify_aggrement extends CI_Controller {

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
					
					$data['quote']=$this->Base_model->get_quote($id);
			        $data['customers']=$this->Base_model->get_client_name_phone();
			        $data['aircraft_address']=$this->Base_model->get_aircraft_address();

			         $departure_address=$data['quote']->departure_address;
			         if(strlen($departure_address)>0)
			         {
			            $depart=unserialize($departure_address);
			            
			         }
			         else
			         {
			            $depart=NULL;
			         }
			         $data['depart']=$depart;
			         $arrival_address=$data['quote']->arrival_address;
			         if(strlen($arrival_address)>0)
			         {
			            $arrive=unserialize($arrival_address);
			            
			         }
			         else
			         {
			            $arrive=NULL;
			         }
			         $data['arrive']=$arrive;
			         $data['aggrement_details']=$this->Base_model->get_aggrement_details($id);
			        
			        $this->load->view('header');
					$this->load->view('modify_aggrement',$data);
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

	public function update_aggrement()
	{
		$error=false;
		$airport_name=$this->input->post('airport_name');
		$handling_name=$this->input->post('handling_name');
		$contact_numbers=$this->input->post('contact_numbers');
		
		$handling_data=array($airport_name,$handling_name,$contact_numbers);
		$data['handling_data']=serialize($handling_data);
		$designation=$this->input->post('designation');
		$crew_name=$this->input->post('crew_name');
		
		$crew=array_combine($crew_name, $designation);
		$crew_data=serialize($crew);
		$data['crew_data']=$crew_data;
		$data['quote_id']=$this->input->post('quote_id');
		$flag=$this->Base_model->insert_aggrement_details($data);
		if($flag=="success")
		{
			$this->session->set_flashdata('aggrement_msg', '<span style="color:green;">Successfully Modified Aggrement</span>');
		}
		else
		{
			$this->session->set_flashdata('aggrement_msg', '<span style="color:red;">Oops! looks like something went wrong please try again</span>');
		}
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
			
		 		
		

	}


	
}
