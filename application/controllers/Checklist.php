<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends CI_Controller {

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
				$data['customers']=$this->Base_model->get_client_name_phone();
				$data['aircraft_address']=$this->Base_model->get_aircraft_address();
				$this->load->view('header');
				$this->load->view('checklist',$data);
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
	
	public function client_filter()
	{

		$data=$_POST['data'];
		$classes=$_POST['classes'];
		$customers=$this->Base_model->customer_filter($data);

		if($customers!=NULL)
		{
			foreach ($customers as $key => $cust) {
				$id=($cust->id<10?'000'.$cust->id:'00'.$cust->id);
				echo"<li><a href='#' class='".$classes."' data-value='".$cust->id."' data-phone='".$id."'>".$cust->name."</a></li>";
			}
		}
		
	}
	public function airbase_filter()
	{
		$data=$_POST['data'];
		$classes=$_POST['classes'];
		$num=(isset($_POST['count'])?$_POST['count']:'');
		$airport=$this->Base_model->airport_filter($data);
		if($airport!=NULL)
		{
			foreach ($airport as $key => $value) {
    			echo"<li><a href='#' class='".$classes."' data-num='".$num."'>".$value->FIELD2.','.$value->FIELD3.','.$value->FIELD4.','.$value->FIELD5."</a></li>";
    		}
		}
	}
	public function check_group()
	{
		$id=$_POST['id'];
		$flag=$this->Base_model->get_other_group_members($id);
		if($flag!=NULL)
		{
			?>
			<!--<div class="form-group label-floating is-focused">
                        <label class="control-label">Other Group Members</label>
                        <select id="dates-field2" name="group_members[]" class="form-control" multiple="multiple">-->
                           <?php //foreach($flag as $member):
                           		//$get_customer=get_customer($member->customer_id);
                           ?>
                           <!--<option value="<?php //echo $member->customer_id;?>"><?php //echo $get_customer->name;?></option>-->
                           <?php //endforeach;?>
                        <!--</select>
                     </div>-->
           	<div class="styled-select">
  <div>
    Other Group Members
    <span class="fa fa-sort-desc"></span>
  </div>
  <select multiple name="group_members[]">
    <?php foreach($flag as $member):
           $get_customer=get_customer($member->customer_id);
                           ?>
           <option value="<?php echo $member->customer_id;?>"><?php echo $get_customer->name;?></option>
        <?php endforeach;?>
  </select>

</div>




			<?php
		}
	}



	
}
