<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_quote extends CI_Controller {

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
				$data['quote']=$this->Base_model->get_quote($id);
				$data['customers']=$this->Base_model->get_client_name_phone();
				$data['aircraft_address']=$this->Base_model->get_aircraft_address();
				$data['members']=$this->Base_model->get_other_group_members($data['quote']->customer_id);
				$this->load->view('header');
				$this->load->view('edit_quote',$data);
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
	public function quote_pdf($id=NULL)
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
		 	$depart='N/A';
		 }
		 $data['depart']=$depart;
		 $arrival_address=$data['quote']->arrival_address;
		 if(strlen($arrival_address)>0)
		 {
		 	$arrive=unserialize($arrival_address);
		 	
		 }
		 else
		 {
		 	$arrive='N/A';
		 }
		 $data['arrive']=$arrive;
                     


		$this->load->view('quote_pdf',$data);
		$html = $this->output->get_output();
		$this->load->library('Dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
		exit(0);
	}

	public function quote_briefing_pdf($id=NULL)
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
		 	$depart='N/A';
		 }
		 $data['depart']=$depart;
		 $arrival_address=$data['quote']->arrival_address;
		 if(strlen($arrival_address)>0)
		 {
		 	$arrive=unserialize($arrival_address);
		 	
		 }
		 else
		 {
		 	$arrive='N/A';
		 }
		 $data['arrive']=$arrive;
                     


		$this->load->view('quote_briefing_pdf',$data);
		$html = $this->output->get_output();
		$this->load->library('Dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
		exit(0);
	}

	public function delete_quote($id)
	{
		$flag=$this->Base_model->delete_quote($id);
    	$this->Base_model->delete_log_status($id);
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

	public function quotation_briefing_pdf($id=NULL)
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
		 	$depart='N/A';
		 }
		 $data['depart']=$depart;
		 $arrival_address=$data['quote']->arrival_address;
		 if(strlen($arrival_address)>0)
		 {
		 	$arrive=unserialize($arrival_address);
		 	
		 }
		 else
		 {
		 	$arrive='N/A';
		 }
		 $data['arrive']=$arrive;
                     


		$this->load->view('quotation_briefing_pdf',$data);
		$html = $this->output->get_output();
		$this->load->library('Dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Quotation.pdf", array("Attachment" => false));
		exit(0);
	}
	public function quotation_web_view($id=NULL)
	{
		if($id==NULL)
		{
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		else
		{	$data['quote']=$this->Base_model->get_quote($id);
	$departure_address=$data['quote']->departure_address;
		 if(strlen($departure_address)>0)
		 {
		 	$depart=unserialize($departure_address);
		 	
		 }
		 else
		 {
		 	$depart='N/A';
		 }
		 $data['depart']=$depart;
		 $arrival_address=$data['quote']->arrival_address;
		 if(strlen($arrival_address)>0)
		 {
		 	$arrive=unserialize($arrival_address);
		 	
		 }
		 else
		 {
		 	$arrive='N/A';
		 }
		 $data['arrive']=$arrive;
			$this->load->view('quotation_web_view',$data);
		}
	}


	
}
