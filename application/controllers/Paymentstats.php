<?php
/**
 * Created by PhpStorm.
 * User: DEBASISH MONDAL
 * Date: 02-Mar-19
 * Time: 1:01 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentstats extends CI_Controller
{

    public function index($id = NULL)
    {
        if(is_user_logged_in())
        {

            $flag= get_current_pos();
            if(check_access($flag))
            {
                $this->load->library('pagination');
                $config = array();
                $config["base_url"] = base_url()."index.php/paymentstats/index";
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
                $data["payment_list"] = $this->Base_model->payment_list($config["per_page"], $page);
                $str_links = $this->pagination->create_links();
                $data["links"] = explode('&nbsp;',$str_links );
                // $data['page']=$page;
                $this->load->view('header');
                $this->load->view('paymentstats',$data);
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


}

?>
