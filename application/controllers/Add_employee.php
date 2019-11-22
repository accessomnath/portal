<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_employee extends CI_Controller {

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
				$this->load->view('add_employee');
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
	public function add_new_employee()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);
		foreach ($info as $key => $value) {
			if(strlen($value)<1)
			{
				$info[$key]='';
			}
		}
		$flag=$this->Base_model->add_new_employee($info);
		if($flag['msg']=="success")
		{
			$emp_id=$flag['id'];
			$pass=$flag['pass'];
			$this->employee_email($emp_id,$pass);
		}
		echo $flag['msg'];
		//$flag=$this->Base_model->add_new_broker($info);

	}
	public function employee_email($emp_id,$pass)
	{
		
		$emp_data=$this->Base_model->get_employee_login($emp_id);
        $mails=array($emp_data->email);
       
       
        $data2['emp']=$emp_data;
        $data2['pass']=$pass;
        
        
        //$this->load->view('emp_mail', $data2);
        $msg2 = $this->load->view('emp_mail', $data2, TRUE);

        
         $from_email = 'info@tamprivateaviation.com';
        $to_email = $mails;
        foreach ($to_email as $key => $value) {
            $subject_url = 'Employee Registration';
            $message = $msg2;
            $this->email->from($from_email);
            $this->email->to($value);
            $this->email->subject($subject_url);
            $this->email->message($message);
            $this->email->set_mailtype('html');
            $this->email->send();

            $this->email->clear();
        }
        
	}

	
}
