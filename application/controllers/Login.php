<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
			redirect('dashboard');
		}
		else
		{
		    
		    $this->load->view('login');
		}
		

	}
		public function test()
	{
		$this->load->library('curl');
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://test.api.amadeus.com/v1/security/oauth2/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POST, 3);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['grant_type'=>'client_credentials','client_id'=>'hGtXsDmHvyZpsFDG0P2qQMsu9J2EOiGm','client_secret'=>'nwAiz2nSA9uMnXwU']);    

        $output=curl_exec($ch);

        curl_close($ch);
       var_dump($output); 
	}
	public function login_action()
	{
		$data=$_POST['data'];
		$info=array();
		parse_str($data,$info);


		$flag=$this->Base_model->login($info);
	
		if($flag!=false)
		{
			echo $flag;
		}
		else
		{
			echo"<span style='color:red;'>Incorrect Credantials Please Try Again.<span>";
		}
	}
}
