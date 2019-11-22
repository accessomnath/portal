<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_employee extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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
                $config["base_url"] = base_url()."index.php/all_employee/index";
                $total_row=$this->Base_model->total_employee();
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
                $data["employee_list"] = $this->Base_model->employee_list($config["per_page"], $page);
                $str_links = $this->pagination->create_links();
                $data["links"] = explode('&nbsp;',$str_links );
                // $data['page']=$page;
                $this->load->view('header');
                $this->load->view('all_employee',$data);
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
    public function emp_exel()
    {
          $this->load->library("excel");
           $this->excel->setActiveSheetIndex(0);
           $this->excel->getActiveSheet()->setTitle('Employee List');
        $this->load->model('Base_model');
        $total_row=$this->Base_model->total_employee();
        $operator_list = $this->Base_model->employee_list($total_row,0);
        $operators=array();
        $c=1;
        $data=array('Sl.no','First Name','Last Name','Phone','Email','Address','City','Country');
        $width=array('5','40','40','20','50','100','20','20');
        array_push($operators, $data);
        foreach($operator_list as $op)
        {
            $data=array();
            $sl=($c<10?'0'.$c.'.':$c.'.');
            $data['Sl.no']=$sl;
            $emp=get_employee_meta($op->id);
            $data['First Name']=$emp->fname;
            $data['Last Name']=$emp->lname;
            $data['Phone']=$emp->phone;
            $data['Email']=$emp->email;
            $data['Address']=$emp->address;
            $city=get_city($emp->city);
            $data['City']=$city->name;
            $country=get_country($emp->country);
            $data['Country']=$country->name;



            $c++;
            array_push($operators, $data);
        }

      $checkpoint=1;
        for($char=1;$char<9;$char++)
        {
            $cel=chr($char+64).$checkpoint;
            
            $this->excel->getActiveSheet()->getStyle($cel)->getFont()->setSize(10);
            $this->excel->getActiveSheet()->getStyle($cel)->getFont()->setBold(true);
        }
        $this->excel->getActiveSheet()->fromArray($operators);
        $this->excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
        $filename='Employee-List.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $this->excel->save('php://output');

            
            

    }

    
}
