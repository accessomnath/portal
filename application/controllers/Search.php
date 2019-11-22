<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

  public function index($id=NULL)
  {
    if(is_user_logged_in())
    {
      
      if(isset($_POST['search_field']) && isset($_POST['search_type']))
      {
          
      
      $search_field=$this->input->post('search_field');
      $search_type=$this->input->post('search_type');


      $country_possible_search_page=array('operator_list','add_operator','edit_operator','all_customers','add_customer','edit_customer');
      if(in_array($search_type, $country_possible_search_page))
      {
        switch ($search_type) {
          
            case "operator_list":
                        $country=$this->input->post('search-country');
                    if($country==0)
                    {
                            $data['list']=$this->Base_model->search($search_field,'operators');
                            $data['url']=site_url('edit_operator/index/');
                            $data['table']="op";
                    }
                    else
                    {
                          $data['list']=$this->Base_model->search_by_country($search_field,'operators',$country);
                            $data['url']=site_url('edit_operator/index/');
                            $data['table']="op";
                    }
                  
                break;
              case "add_operator":
                        $country=$this->input->post('search-country');
                    if($country==0)
                    {
                    $data['list']=$this->Base_model->search($search_field,'operators');
                            $data['url']=site_url('edit_operator/index/');
                            $data['table']="op";
                        }
                        else
                    {
                          $data['list']=$this->Base_model->search_by_country($search_field,'operators',$country);
                            $data['url']=site_url('edit_operator/index/');
                            $data['table']="op";
                    }
                    
                break;
              case "edit_operator":
                $country=$this->input->post('search-country');
                    if($country==0)
                    {
                    $data['list']=$this->Base_model->search($search_field,'operators');
                            $data['url']=site_url('edit_operator/index/');
                            $data['table']="op";
                        }
                        else
                    {
                          $data['list']=$this->Base_model->search_by_country($search_field,'operators',$country);
                            $data['url']=site_url('edit_operator/index/');
                            $data['table']="op";
                    }
                break;
            case "all_customers":
                    $country=$this->input->post('search-country');
                    if($country==0)
                    {
                $data['list']=$this->Base_model->search($search_field,'customer');
                $data['url']=site_url('edit_customer/index/');
                $data['table']="cu";
                        }
                    else
                        {
                        $data['list']=$this->Base_model->search_by_country($search_field,'customer',$country);
                $data['url']=site_url('edit_customer/index/');
                $data['table']="cu";
                        }
                break;
            case "add_customer":
                $country=$this->input->post('search-country');
                    if($country==0)
                    {
                $data['list']=$this->Base_model->search($search_field,'customer');
                $data['url']=site_url('edit_customer/index/');
                $data['table']="cu";
                        }
                    else
                        {
                        $data['list']=$this->Base_model->search_by_country($search_field,'customer',$country);
                $data['url']=site_url('edit_customer/index/');
                $data['table']="cu";
                        }
                break;
            case "edit_customer":
                $country=$this->input->post('search-country');
                    if($country==0)
                    {
                $data['list']=$this->Base_model->search($search_field,'customer');
                $data['url']=site_url('edit_customer/index/');
                $data['table']="cu";
                        }
                    else
                        {
                        $data['list']=$this->Base_model->search_by_country($search_field,'customer',$country);
                $data['url']=site_url('edit_customer/index/');
                $data['table']="cu";
                        }
                break;
          
            default:
                $data['list']=$this->Base_model->search($search_field,'operators');
                $data['url']=site_url('edit_operator/index/');
                $data['table']="op";
                
        }
      }
      elseif(strlen($search_field)>0)
      {
        
        switch ($search_type) {
          case "search":
            $data['list']=$this->Base_model->search($search_field,'operators');
                $data['url']=site_url('edit_operator/index/');
                $data['table']="op";
                break;
            
          case "register_aircraft":
                $data['list']=$this->Base_model->search($search_field,'aircraft');
                $data['url']=site_url('edit_aircraft/index/');
                $data['table']="ar";
                break;
            case "all_aircraft":
                $data['list']=$this->Base_model->search($search_field,'aircraft');
                $data['url']=site_url('edit_aircraft/index/');
                $data['table']="ar";
                break;
              case "edit_aircraft":
                $data['list']=$this->Base_model->search($search_field,'aircraft');
                $data['url']=site_url('edit_aircraft/index/');
                $data['table']="ar";
                break;
              case "all_brokers":
                $data['list']=$this->Base_model->search($search_field,'broker');
                $data['url']=site_url('edit_broker/index/');
                $data['table']="br";
                break;
            case "add_broker":
                $data['list']=$this->Base_model->search($search_field,'broker');
                $data['url']=site_url('edit_broker/index/');
                $data['table']="br";
                break;
            case "edit_broker":
                $data['list']=$this->Base_model->search($search_field,'broker');
                $data['url']=site_url('edit_broker/index/');
                $data['table']="br";
                break;
            
            case "checklist":
                $data['list']=$this->Base_model->search($search_field,'quote');
                $data['url']=site_url('edit_quote/index/');
                $data['table']="qu";
                break;
            case "quote":
                $data['list']=$this->Base_model->search($search_field,'quote');
                $data['url']=site_url('edit_quote/index/');
                $data['table']="qu";
                break;
            case "edit_quote":
                $data['list']=$this->Base_model->search($search_field,'quote');
                $data['url']=site_url('edit_quote/index/');
                $data['table']="qu";
                break;
            case "all_employee":
                $data['list']=$this->Base_model->search($search_field,'employee_meta');
                $data['url']=site_url('edit_employee/index/');
                $data['table']="em";
                break;
            case "add_employee":
                $data['list']=$this->Base_model->search($search_field,'employee_meta');
                $data['url']=site_url('edit_employee/index/');
                $data['table']="em";
                break;
            case "edit_employee":
                $data['list']=$this->Base_model->search($search_field,'employee_meta');
                $data['url']=site_url('edit_employee/index/');
                $data['table']="em";
                break;
            case "aircraft_type_list":
                $data['list']=$this->Base_model->search($search_field,'aircraft_type');
                $data['url']=site_url('edit_aircraft_type/index/');
                $data['table']="air_type";
                break;
            case "add_aircraft_type":
                $data['list']=$this->Base_model->search($search_field,'aircraft_type');
                $data['url']=site_url('edit_aircraft_type/index/');
                $data['table']="air_type";
                break;
            case "edit_aircraft_type":
                $data['list']=$this->Base_model->search($search_field,'aircraft_type');
                $data['url']=site_url('edit_aircraft_type/index/');
                $data['table']="air_type";
                break;


            
            default:
                $data['list']=$this->Base_model->search($search_field,'operators');
                $data['url']=site_url('edit_operator/index/');
                $data['table']="op";
                
        }
        
      }
      else
      {
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
      }
      
      $this->load->view('header');
      $this->load->view('search',$data);
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
