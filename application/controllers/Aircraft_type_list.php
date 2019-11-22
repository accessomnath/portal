<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aircraft_type_list extends CI_Controller {

	
	public function index()
	{
		if(is_user_logged_in())
		{
			$flag= get_current_pos();
			if(check_access($flag))
			{
				$this->load->library('pagination');
				$config = array();
				$config["base_url"] = base_url()."index.php/aircraft_type_list/index";
				$total_row=$this->Base_model->total_aircarft_type();
				$config["total_rows"] = $total_row;
				$config["per_page"] = 10;
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
				$data["aircarft_type_list"] = $this->Base_model->aircarft_type_list($config["per_page"], $page);
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				$data['page']=$page;
				$this->load->view('header');
				$this->load->view('aircraft_type_list',$data);
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
	
	public function aircraft_type_exel()
	{
 	      $this->load->library("excel");
		   $this->excel->setActiveSheetIndex(0);
           $this->excel->getActiveSheet()->setTitle('Aircraft Type List');
        $this->load->model('Base_model');
        $total_row=$this->Base_model->total_aircarft_type();
        $operator_list = $this->Base_model->aircarft_type_list($total_row,0);
        $operators=array();
        $c=1;
        $data=array('Sl.no','Name');
        array_push($operators, $data);
        foreach($operator_list as $op)
        {
        	$data=array();
        	$sl=($c<10?'0'.$c.'.':$c.'.');
        	$data['Sl.no']=$sl;
        	$data['Name']=$op->name;
        	


        	$c++;
        	array_push($operators, $data);
        }

        $checkpoint=1;
        for($char=1;$char<3;$char++)
        {
        	$cel=chr($char+64).$checkpoint;
        	$attr=chr($char+64);
        	$pos=$char-1;
        	$this->excel->getActiveSheet()->getStyle($cel)->getFont()->setSize(10);
       	    $this->excel->getActiveSheet()->getStyle($cel)->getFont()->setBold(true);
        }
        $this->excel->getActiveSheet()->fromArray($operators);
        $this->excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(40);
        $filename='Aircraft-List.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $this->excel->save('php://output');

			
			

	}

	
}
