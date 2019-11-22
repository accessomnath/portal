<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_list extends CI_Controller {

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
				$this->load->library('pagination');
				$config = array();
				$config["base_url"] = base_url()."index.php/operator_list/index";
				$total_row=$this->Base_model->total_operators();
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
				$data["operator_list"] = $this->Base_model->operator_list($config["per_page"], $page);
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page']=$page;
				$this->load->view('header');
				$this->load->view('operator_list',$data);
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
	
	public function operator_list_exel()
	{
 	      $this->load->library("excel");
// // //            $this->load->library('IOFactory');
		   $this->excel->setActiveSheetIndex(0);
           $this->excel->getActiveSheet()->setTitle('Operator List');
        $this->load->model('Base_model');
        $total_row=$this->Base_model->total_operators();
        $operator_list = $this->Base_model->operator_list($total_row,0);
        $operators=array();
        $c=1;
        $data=array('Sl.no','Name','Phone','Email','City','Country','Prefer Contact','Relation','Address');
        $width=array('5','40','20','50','20','20','10','10','100');
        array_push($operators, $data);
        foreach($operator_list as $op)
        {
        	$data=array();
        	$sl=($c<10?'0'.$c.'.':$c.'.');
        	$data['Sl.no']=$sl;
        	$data['Name']=$op->name;
        	$data['Phone']=$op->phone;
        	$data['Email']=$op->email;
        	$city=get_city($op->city);
        	$data['City']=$city->name;
        	$country=get_country($op->country);
        	$data['Country']=$country->name;
        	$data['Prefer Contact']=$op->prefer_contact;
        	$data['Relation']=$op->relation.'%';
        	$data['Address']=$op->address;


        	$c++;
        	array_push($operators, $data);
        }

        $checkpoint=1;
        for($char=1;$char<9;$char++)
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
        $filename='Operatot-List.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $this->excel->save('php://output');

			
			

	}

	
}
