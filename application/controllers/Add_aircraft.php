<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_aircraft extends CI_Controller
{
    
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
    public function index($id = NULL)
    {
        if (is_user_logged_in()) {
            $flag = get_current_pos();
            if (check_access($flag)) {
                $total_row=$this->Base_model->total_operators();
                $data["operator_list"] = $this->Base_model->operator_list($total_row, 0);
                $this->load->view('header');
                $this->load->view('add_aircraft',$data);
                $this->load->view('footer');
            } else {
                redirect('dashboard');
            }
        } else {
            redirect('login');
        }
    }
    public function add_new_aircraft()
    {
        $info['ArName']            = $this->input->post('ArName');
        $info['r_number']          = $this->input->post('r_number');
        $info['a_range']           = $this->input->post('a_range');
        $info['ArmaxPax']          = $this->input->post('ArmaxPax');
        $info['yom']               = $this->input->post('yom');
        $info['refurb']            = $this->input->post('refurb');
        $info['smoking']           = $this->input->post('smoking');
        $info['wifi']              = $this->input->post('wifi');
        $info['wifi_charge']       = $this->input->post('wifi_charge');
        $info['ArBedroom']         = $this->input->post('ArBedroom');
        $info['ArBedroomLocation'] = $this->input->post('ArBedroomLocation');
        $info['ARBedStup']         = $this->input->post('ARBedStup');
        $info['ArPrice']           = $this->input->post('ArPrice');
        $info['ArCharges']         = $this->input->post('ArCharges');
        $info['ArBase']            = $this->input->post('ArBase');
        $info['operator_id']       = $this->input->post('operator_id');
        $info['smoking_charge']    = $this->input->post('smoking_charge');
        
        if($info['ArName']==NULL || $info['r_number']==NULL || $info['ArmaxPax']==NULL || $info['ArBase']==NULL)
        {
          $this->load->library('user_agent');
          $refer =  $this->agent->referrer();
          redirect($refer);   

        }
   

        $d=array();
        foreach($info as $k=>$in)
        {
            if(strlen($in)<1)
            {
                $info[$k]='';
            }
        }
       $flag=$this->Base_model->add_new_aircraft($info);
        if($flag=="error")
        {
            $this->session->set_flashdata('error_msg', 'Oops! Looks Like Something Went Wrong Please Try Again.');
        }
        elseif ($flag=="duplicate") {
            $this->session->set_flashdata('error_msg', 'Oops! Looks Like Aircraft Already Exists Please Try Again.');
        }
        else
        {
                $this->session->set_flashdata('success', 'Successfully Added Aircraft Details');
                $this->load->library('upload');
                $dataInfo = array();
                $files = $_FILES;

                $cpt = count($_FILES['userfile']['name']);
                for($i=0; $i<$cpt; $i++)
                {           
                    $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                    $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                    $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

                    $this->upload->initialize($this->set_upload_options());
                    // if ( ! $this->upload->do_upload())
                    //  {
                    //        echo $this->upload->display_errors('<p>', '</p>');
                    //  }
                    $this->upload->do_upload();
                    $dataInfo[] = $this->upload->data();
                    
                }
                $format=array('.gif','.jpg','.jpeg','.png');
                
                // die;
                foreach($dataInfo as $in)
                {
                    if(in_array($in['file_ext'], $format))
                    {
                        $data = array(
                        
                        'image' => $in['file_name'],
                        'aircraft_id' => $flag,
                        'operator_id' => $info['operator_id'], );
                        $img_res=$this->Base_model->add_aircraft_image($data);
                        if($img_res!=true)
                        {
                            $this->session->set_flashdata('error_msg_img', 'Oops! Looks Like Something Went Wronfg Please Try Again.');
                        }
                        else
                        {
                            $this->session->set_flashdata('success_img', 'All Images Were Added Successfully');
                        }
                    }
                }
                redirect(site_url('edit_aircraft/index/'.$flag));
       
        
        }
        $this->load->library('user_agent');
        $refer =  $this->agent->referrer();
        redirect($refer);   

    
    }
   

   private function set_upload_options()
    {   
        //upload an image options
        $config = array();
        $config['upload_path'] = upload_path();
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }
    public function aircraft_type_filter()
    {
        $data=$_POST['data'];
        if(strlen($data)>0)
        {
            $res=$this->Base_model->aircraft_type_filter($data);
            if($res!=NULL)
            {
                foreach ($res as $key => $value) {
                    echo"<li><a href='#' class='type-filter-name'>".$value->name."</a></li>";
                }
            }
            else
            {
                echo"<li>None</li>";
            }
        }
        
    }
}