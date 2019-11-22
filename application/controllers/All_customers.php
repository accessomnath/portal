<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_customers extends CI_Controller {

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
				$config["base_url"] = base_url()."index.php/all_customers/index";
				$total_row=$this->Base_model->total_customer();
				$config["total_rows"] = $total_row;
				$config["per_page"] = 5;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = $total_row;
				$config['cur_tag_open'] = '&nbsp;<a class="current">';
				$config['cur_tag_close'] = '</a>';
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Previous';
				$this->pagination->initialize($config);
				if($this->uri->segment(3)){
				$page = ($this->uri->segment(3)) ;
				$page=$page-1;
				$page=$page*$config["per_page"];
				}
				else{
				$page = 0;
				}
				$data["customer_list"] = $this->Base_model->customer_list($config["per_page"], $page);
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				// $data['page']=$page;
				$this->load->view('header');
				$this->load->view('all_customers',$data);
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
	public function customer_exel()
	{
 	      $this->load->library("excel");
		   $this->excel->setActiveSheetIndex(0);
           $this->excel->getActiveSheet()->setTitle('Customer List');
        $this->load->model('Base_model');
        $total_row=$this->Base_model->total_customer();
        $list = $this->Base_model->customer_list($total_row,0);
        $operators=array();
        $c=1;
        $data=array('Sl.no','Name','Phone','Email','Address','City','Country','Postal Code','Favourite Color','Customer Nature','Reference','Prefered Aircraft','Broker','DOB','Creation Date Time','Passport');
        $width=array('5','40','20','50','100','40','40','10','20','100','50','50','50','40','40','40','40');
        array_push($operators, $data);
        foreach($list as $op)
        {
        	$data=array();
        	$sl=($c<10?'0'.$c.'.':$c.'.');
        	$data['Sl.no']=$sl;
        	$data['Name']=$op->name;
        	$data['Phone']=$op->phone;
        	$data['Email']=$op->email;
        	$data['Address']=$op->address;
        	$city=get_city($op->city);
        	$data['City']=$city->name;
        	$country=get_country($op->country);
        	$data['Country']=$country->name;
        	$data['Postal Code']=$op->postalcode;
        	$data['Favourite Color']=$op->fcolor;
        	$data['Customer Nature']=$op->cnature;
        	$data['Reference']=$op->reference;
        	$data['Prefered Aircraft']=$op->prefered_aircraft;
        	if($op->broker!=0)
        	{
        		$get_broker=$this->Base_model->get_broker($op->broker);
        		$data['Broker']=$get_broker->name;
        	}
        	else
        	{
        		$data['Broker']='None';
        	}
        	$data['DOB']=$op->dob;
        	$data['Creation Date Time']=$op->creation_date_time;
        	$data['passport']=$op->passport;
        	
        	
        	


        	$c++;
        	array_push($operators, $data);
        }

        $checkpoint=1;
        for($char=1;$char<17;$char++)
        {
            $cel=chr($char+64).$checkpoint;
            $attr=chr($char+64);
            $pos=$char-1;
            $this->excel->getActiveSheet()->getStyle($cel)->getFont()->setSize(10);
            $this->excel->getActiveSheet()->getStyle($cel)->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getColumnDimension($attr)->setWidth($width[$pos]);
        }
        $this->excel->getActiveSheet()->fromArray($operators);
        $this->excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
        $filename='Customer-List.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $this->excel->save('php://output');


			
			

	}
	
}
