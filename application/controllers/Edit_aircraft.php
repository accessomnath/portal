<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_aircraft extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
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
      
      if($id!=NULL)
      {
        $flag= get_current_pos();
        if(check_access($flag))
        {
          $data['aircraft']=$this->Base_model->aircraft_details($id);
          $data['aircraft_images']=$this->Base_model->get_aircraft_images($id);
                
          $this->load->view('header');
          $this->load->view('edit_aircraft',$data);
          $this->load->view('footer');
        }
        else
        {
          redirect('dashboard');
        }
      }
      else
      {
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
      }

      
    }
    else
    {
      redirect('login');
    }
  }
  public function update_aircraft()
  {
    $info['id']=$this->input->post('id');
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
        $d=array();
        foreach($info as $k=>$in)
        {
          if(strlen($in)<1)
          {
            $d[$k]='';
          }
          else
          {
            $d[$k]=$in;
          }
        }
        $flag=$this->Base_model->update_aircraft($d);
      if($flag=="success")
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
                    $this->upload->do_upload();
                    $dataInfo[] = $this->upload->data();
                }
                $format=array('.gif','.jpg','.jpeg','.png');
                 $c=$this->Base_model->get_max_order($info['id'],$info['operator_id']);

                
                foreach($dataInfo as $in)
                {
                    
                    if(in_array($in['file_ext'], $format))
                    {
                        
                        $data = array(
                    
                    'image' => $in['file_name'],
                    'aircraft_id' => $info['id'],
                    'operator_id' => $info['operator_id'], 
                    'img_order'=>$c
                    );
                    $img_res=$this->Base_model->add_aircraft_image($data);
                    if($img_res!=true)
                    {
                        $this->session->set_flashdata('error_msg_img', 'Oops! Looks Like Something Went Wronfg Please Try Again.');
                    }
                    else
                    {
                        $this->session->set_flashdata('success_img', 'All Images Were Added Successfully');
                        $c++;
                    }
                    }
                    
                }
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
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;

        return $config;
    }

  public function delete_aircraft_image()
  {
    $data=$_POST['data'];
    $info=array();
    parse_str($data,$info);
    foreach($info['id'] as $value)
    {
    $image=$this->Base_model->get_aircraft_image($value);    
    $flag=$this->Base_model->delete_aircraft_image($value);
      if($flag==true)
        {
          unlink(upload_path().$image->image);
        }
    }
   
    
  }
  public function delete_aircraft($id)
  {
    $flag=$this->Base_model->delete_aircraft($id);
    if($flag==true)
    {
      $image=$this->Base_model->get_aircraft_images($id);
      foreach ($image as $value) {
        $flag=$this->Base_model->delete_aircraft_image($value->id);
        if($flag==true)
          {
            unlink(upload_path().$value->image);
          }
      }
    }
    $this->load->library('user_agent');
    $refer =  $this->agent->referrer();
    redirect($refer);   

  }
  public function reorder_images()
  {
    $ids=$_POST['data'];
   
    $image_ids=explode(',', $ids);
    $this->Base_model->update_order($image_ids);

  }



  
}
