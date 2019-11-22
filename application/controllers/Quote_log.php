<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Quote_log extends CI_Controller {



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

				if($id==NULL)

				{

					$this->load->library('user_agent');

        			redirect($this->agent->referrer());

				}

				else

				{

					$data['quote_id']=$id;

					$data['logs']=$this->Base_model->get_log($id);

					$this->load->view('header');

					$this->load->view('quote_log',$data);

					$this->load->view('footer');

				}

				

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

	public function update_receiving_status()

	{

		$data['quote_id']=$this->input->post('quote_id');
		$data['type']=$this->input->post('type');
		$data['receiving_time']=$this->input->post('receiving_time');

		$flag=$this->Base_model->update_log_status($data);

		$this->load->library('user_agent');

        redirect($this->agent->referrer());

	}

	 public function agreement_pdf($id=NULL)

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





        $this->load->view('agreement_pdf',$data);

        $html = $this->output->get_output();

        $this->load->library('Dompdf_gen');

        $this->dompdf->load_html($html);

        $this->dompdf->render();

        $this->dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

        exit(0);

  }



	

}

