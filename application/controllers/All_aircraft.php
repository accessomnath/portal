<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_aircraft extends CI_Controller {

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
				$config["base_url"] = base_url()."index.php/all_aircraft/index";
				$total_row=$this->Base_model->total_aircraft_count();
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
				$data["aircraft_list"] = $this->Base_model->aircraft_list_total($config["per_page"], $page);
				$str_links = $this->pagination->create_links();
				$data["links"] = explode('&nbsp;',$str_links );
				// $data['page']=$page;
				$this->load->view('header');
				$this->load->view('all_aircraft',$data);
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
	public function aircraft_exel()
	{
 	    $this->load->library("excel");
	    $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Aircraft List');
        $this->load->model('Base_model');
        $total_row=$this->Base_model->total_aircraft_count();
        $operator_list = $this->Base_model->aircraft_list_total($total_row,0);
        $operators=array();
        $c=1;
        $data=array('Sl.no','Aircraft Name','Operator Name','Operator Phone','Operator Email','Registration Number','Aircraft Range','Aircraft Max Pax','Aircraft YOM','Refurb Date','Smoking','Wifi','Wifi Charge','Bedroom','Bedroom Location','Bed Setup','Price Per Hour','Overnight Charges','Aircraft Base');
        array_push($operators, $data);
        foreach($operator_list as $op)
        {
        	$data=array();
        	$sl=($c<10?'0'.$c.'.':$c.'.');
        	$data['Sl.no']=$sl;
        	$data['Aircraft Name']=$op->ArName;
        	$operator=get_operator($op->operator_id);
        	$data['Operator Name']=$operator->name;
        	$data['Operator Phone']=$operator->phone;
        	$data['Operator Email']=$operator->email;
        	$data['Registration Number']=$op->r_number;
        	$data['Aircraft Range']=$op->a_range;
        	$data['Aircraft Max Pax']=$op->ArmaxPax;
        	$data['Aircraft YOM']=$op->yom;
        	$data['Refurb Date']=$op->refurb;
        	$data['Smoking']=$op->smoking;
        	$data['Wifi']=$op->wifi;
        	$data['Wifi Charge']=$op->wifi_charge;
        	$data['Bedroom']=$op->ArBedroom;
        	$data['Bedroom Location']=$op->ArBedroomLocation;
        	$data['Bed Setup']=$op->ARBedStup;
        	$data['Price Per Hour']=$op->ArPrice;
        	$data['Overnight Charges']=$op->ArCharges;
        	$data['Aircraft Base']=$op->ArBase;
        	$c++;
        	array_push($operators, $data);
        }
        $checkpoint=1;
        for($char=1;$char<24;$char++)
        {
        	$cel=chr($char+64).$checkpoint;
        	
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
	public function filter_aircraft()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);
		foreach ($info as $key => $value) {
			if(strlen($value)<1)
			{
				unset($info[$key]);
			}
		}

		$res=$this->Base_model->filter_aircraft($info);
		if($res!=NULL)
		{
			?>
			<table class="table table-striped">
                     <thead class="text-primary">
                        <th>Operator name</th>
                        <th>Aircraft Type</th>
                        <th>Registration Number</th>
                        <th>Max Pax</th>
                        <th>Airport Base</th>
                        <th></th>
                     </thead>
                     <tbody>
			<?php
			foreach ($res as  $aircraft) {
				?>

                      
            <tr>
            <td><?php $operator=get_operator($aircraft->operator_id);
               echo '<a href="'.site_url('edit_operator/index/'.$operator->id).'" target="_blank">'.$operator->name.'</a>';
               ?></td>
            <td class="text-dark"><?php echo $aircraft->ArName;?></a></td>
            <td class="text-dark"><?php echo $aircraft->r_number;?></td>
            <td class="text-dark"><?php echo $aircraft->ArmaxPax;?></td>
            <td class="text-dark"><?php echo $aircraft->ArBase;?></td>
            <td><a href="<?php echo base_url();?>index.php/edit_aircraft/index/<?php echo $aircraft->id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            </tr>
                       
                     
				<?php
			}
			?>
			</tbody>
                  </table>
			<?php
		}
	}

	
}
