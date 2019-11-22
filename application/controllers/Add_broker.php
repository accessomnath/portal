<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_broker extends CI_Controller {

   /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    *       http://example.com/index.php/welcome
    * - or -
    *       http://example.com/index.php/welcome/index
    * - or -
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
            $this->load->view('add_broker');
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
   public function add_new_broker()
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
      echo $flag=$this->Base_model->add_new_broker($info);
      //$flag=$this->Base_model->add_new_broker($info);

   }

   
}
