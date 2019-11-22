<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {

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
    public function index($id=NULL)
    {
        if(is_user_logged_in())
        {
            
            $flag = get_current_pos();
            if(check_access($flag))
            {
                $this->load->library('pagination');
                $config = array();
                $config["base_url"] = base_url()."index.php/quote/index/".$id;
                if($id=="all")
                {
                    $total_row=$this->Base_model->total_quote();
                }
                else
                {
                    $total_row=$this->Base_model->total_quote_by_customer_id($id);
                }
                
                $config["total_rows"] = $total_row;
                $config["per_page"] = 5;
                $config['use_page_numbers'] = TRUE;
                $config['num_links'] = $total_row;
                $config['cur_tag_open'] = '&nbsp;<a class="current">';
                $config['cur_tag_close'] = '</a>';
                $config['next_link'] = 'Next';
                $config['prev_link'] = 'Previous';
                $this->pagination->initialize($config);
                if($this->uri->segment(4)){
                $page = ($this->uri->segment(4)) ;
                $page=$page-1;
                $page=$page*$config["per_page"];
                }
                else{
                $page = 0;
                }

                $data["quote_list"] = $this->Base_model->quote_list($config["per_page"], $page,$id);
                $str_links = $this->pagination->create_links();
                $data["links"] = explode('&nbsp;',$str_links );
                $this->load->view('header');
                $this->load->view('quote',$data);
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
    public function add_quote()
    {
        $data=$_POST['data'];
        $info=array();
        parse_str($data,$info);
        if(isset($info['departure_address']))
        {
        $info['departure_address']=serialize($info['departure_address']);
        }
        else
        {
            $info['departure_address']='';
        }
        if(isset($info['arrival_address']))
        {
            $info['arrival_address']=serialize($info['arrival_address']);
        }
        else
        {
            $info['arrival_address']='';
        }
    
        if(isset($info['flight_duration']))
        {
            $info['flight_duration']=serialize($info['flight_duration']);
           
        }
        else
        {
            $info['flight_duration']='';
        }
        if(isset($info['prefer_list']))
        {
        $info['prefer_list']=serialize($info['prefer_list']);
        }


        if(isset($info['noteCustomer']))
        {
            $info['noteCustomer']=serialize($info['noteCustomer']);
        }


        else
        {
            $info['prefer_list']='';
         }
        if(isset($info['aircarft_list']))
        {
            if(isset($info['our_price']))
            {
                $our_price=array_combine($info['aircarft_list'], $info['our_price']);
             
                $info['our_price']=serialize($our_price);
            }
            else
            {
                $info['our_price']='';
            }
            if(isset($info['sale_price']))
            {
                $sale_price=array_combine($info['aircarft_list'], $info['sale_price']);

                $info['sale_price']=serialize($sale_price);
            }
            else
            {
                $info['sale_price']='';
            }

            $info['aircarft_list']=serialize($info['aircarft_list']);
        }
        else
        {
        $info['aircarft_list']='';
        }

        if(isset($info['group_members']))
        {
            $info['group_members']=serialize($info['group_members']);
        }
        else
        {
            $info['group_members']='';
        }
        if(isset($info['departure_date']))
        {
            $info['departure_date']=serialize($info['departure_date']);
        }
        else
        {
            $info['departure_date']='';
        }
        foreach ($info as $key => $value) {
            if(strlen($value)<1)
            {
                $info[$key]='';
            }
        }
     	 if($info['journey_type']!='twoway'):$info['arrival_date']='';endif;
         $info['booking_date']=date("Y-m-d");
         $info['booking_time']=date("h:i:sa");
       
        
        $flag=$this->Base_model->add_new_quote($info);
        
         if(is_numeric($flag))
         {
            if(strlen($info['prefer_list'])>0)
             {
                $prefer_list=unserialize($info['prefer_list']);
                $this->operator_email($prefer_list,$flag);
             }
         }
         echo $flag;
         
         
    }
    public function update_quote()
    {
        $data=$_POST['data'];
        $info=array();
        parse_str($data,$info);
    	if(isset($info['departure_address']))
        {
        $info['departure_address']=serialize($info['departure_address']);
        }
    	else
    	{
			$info['departure_address']='';
    	}
        if(isset($info['arrival_address']))
        {
        	$info['arrival_address']=serialize($info['arrival_address']);
        }
    	else
        {
        	$info['arrival_address']='';
        }
    
        if(isset($info['flight_duration']))
        {
            $info['flight_duration']=serialize($info['flight_duration']);
           
        }
        else
        {
            $info['flight_duration']='';
        }
        if(isset($info['prefer_list']))
        {
        $info['prefer_list']=serialize($info['prefer_list']);
        }
    	else
    	{
    		$info['prefer_list']='';
   		 }
    	if(isset($info['aircarft_list']))
        {
        	if(isset($info['our_price']))
            {
                $our_price=array_combine($info['aircarft_list'], $info['our_price']);
             
                $info['our_price']=serialize($our_price);
            }
            else
            {
                $info['our_price']='';
            }
            if(isset($info['sale_price']))
            {
                $sale_price=array_combine($info['aircarft_list'], $info['sale_price']);

                $info['sale_price']=serialize($sale_price);
            }
            else
            {
                $info['sale_price']='';
            }

            $info['aircarft_list']=serialize($info['aircarft_list']);
        }
    	else
        {
        $info['aircarft_list']='';
        }

        if(isset($info['group_members']))
        {
            $info['group_members']=serialize($info['group_members']);
        }
        else
        {
            $info['group_members']='';
        }
        if(isset($info['departure_date']))
        {
            $info['departure_date']=serialize($info['departure_date']);
        }
        else
        {
            $info['departure_date']='';
        }
        foreach ($info as $key => $value) {
            if(strlen($value)<1)
            {
                $info[$key]='';
            }
        }
    // print_r($info);
		if($info['journey_type']!='twoway'):$info['arrival_date']='';endif;
        echo $flag=$this->Base_model->update_quote($info);
    }

	



    public function quote_exel()
    {
          $this->load->library("excel");
           $this->excel->setActiveSheetIndex(0);
           $this->excel->getActiveSheet()->setTitle('Operator List');
        $this->load->model('Base_model');
        $total_row=$this->Base_model->total_quote();
        $operator_list = $this->Base_model->quote_list($total_row,0,'all');

        $operators=array();
        $c=1;
        $data=array('Sl.no','Customer Id','Customer','Maxpax','Journey Type','Departure Address','Departure Date','Arrival Address','Arrival Date','Direct Flight','Ar Bedroom','Bedroom location','AR BedStup','Booking Date','Booking Time','Booking By','Royal Terminal','Estimated Time');
        array_push($operators, $data);
        foreach($operator_list as $op)
        {
            $data=array();
            $sl=($c<10?'0'.$c.'.':$c.'.');
            
            $cust_id=($op->customer_id<10?'0'.$op->customer_id:$op->customer_id);
      
            $get_customer=$this->Base_model->get_customer($op->customer_id);
            $data['Sl.no']=$sl;
            $data['Customer Id']=$cust_id;
            $data['Customer']=$get_customer->name;
            $data['Maxpax']=$op->maxpax;
            $data['Journey Type']=$op->journey_type;
            $departure_address=$op->departure_address;
            if(strlen($departure_address)>0):
                $depart=unserialize($departure_address);
                $add=implode(',', $depart);
            else:$add='N/A';
            endif;
            $data['Departure Address']=$add;
            //$data['Departure Address']=$op->departure_address;
           
            
            $data['Departure Date']=$op->departure_date;
            $arrive=$op->arrival_address;
            if(strlen($arrive)>0)
            {
                $arrival_address=unserialize($arrive);
                $add2=implode(',', $arrival_address);
            }
            else
            {
                $add2='N/A';
            }
            
            $data['Arrival Address']=$add2;
            
            $data['Arrival Date']=$op->arrival_date;
            $data['Direct Flight']=$op->DirectFlight;
            $data['Ar Bedroom']=$op->ArBedroom;
            $data['Bedroom location']=$op->ArBedroomLocation;
            $data['AR BedStup']=$op->ARBedStup;
            $data['Booking Date']=$op->booking_date;
            $data['Booking Time']=$op->booking_time;
            $data['Booking By']=$op->booking_by;
            $data['Royal Terminal']=$op->royal_terminal;
            $data['Estimated Time']=$op->etd;





            $c++;
            array_push($operators, $data);
        }
        
        $checkpoint=1;
        for($char=1;$char<24;$char++)   
        {
            $cel=chr($char+64).$checkpoint;
            $attr=chr($char+64);
            $pos=$char-1;
            $this->excel->getActiveSheet()->getStyle($cel)->getFont()->setSize(10);
            $this->excel->getActiveSheet()->getStyle($cel)->getFont()->setBold(true);
           
        }
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(100);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(100);


        $this->excel->getActiveSheet()->fromArray($operators);
        $this->excel->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
        $filename='Quote-List.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        $this->excel->save('php://output');

            
            

    }
    public function search_aircrafts_for_checklist()
    {
        $info['maxpax']=$_POST['maxpax'];
        $info['ArBedroom']=$_POST['ArBedroom'];
        $info['ARBedStup']=$_POST['ARBedStup'];
        $res=$this->Base_model->search_aircrafts_for_checklist($info);
        if($res!=NULL)
        {
            ?>
            <div class='row'>
               <div class="col-md-12">
                   <table border="1" class="cheklist-search-table">
                       <thead>
                           <tr>
                               <td style="width: 5%;"></td>
                               <!--<td style="width: 13%;"><b>Aaircraft ID</b></td>-->
                               <td style="width: 15%;"><b>Aaircraft Name</b></td>
                               <td ><b>Max Pax</b></td>
                               <td ><b>Bedroom</b></td>
                               <!--<td ><b>Operator</b></td>-->
                               <td ><b>Operator</b></td>
                               <td><b>Our price</b></td>
                               <td><b>Sale price</b></td>

                               <td><b>Operator Link</b></td>
                               <td><b>Aircraft Link</b></td>
                           </tr>
                       </thead>
                       <tbody>

               
            <?php
            foreach ($res as $value) {
               ?>
               <tr>
                   <td><input type="hidden" name="aircarft_list[]" value="<?php echo $value->id;?>">
                      <input type="checkbox" name="prefer_list[]" value="<?php echo $value->id;?>"></td>
                   <!--<td>
                    <?php //$unique_aircarft_id=$value->id;
                            //$unique_aircarft_id=($unique_aircarft_id<10?'000'.$unique_aircarft_id:'00'.$unique_aircarft_id);
                    ?>
                    <b><?php echo $unique_aircarft_id;?></b></td>-->
                   <td><b><?php echo $value->ArName;?></b></td>
                   <td><b><?php echo $value->ArmaxPax;?></b></td>
                   <td><b><?php echo $value->ArBedroom;?></b></td>
                   <?php $get_operator=get_operator($value->operator_id);
                                //$unique=($get_operator->id<10?'000'.$get_operator->id:'00'.$get_operator->id);
                        ?>
                   <td><b><?php echo $get_operator->name;?></b></td>
                   <td><input type="number" name="our_price[]" class="form-control"></td>
                   <td><input type="number" name="sale_price[]" class="form-control"></td>

                   <td><a href="<?php echo site_url('edit_operator/index/'.$get_operator->id)?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></td>
                   <td><a href="<?php echo site_url('edit_aircraft/index/'.$value->id);?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></td>

               </tr>
               <?php
            }
            ?>
            </tbody>
             </table>
               </div>
           </div>
            <?php
        }
        else
        {
            ?>
            <div class="row">
                <div class="col-md-12">
                    Sorry No Results Found
                </div>
            </div>
            <?php
        }


        
    }
    public function quote_email()
    {
    
       $info['aircarft_id']=$this->input->post('aircarft_id');
      $mail_ids=$this->input->post('email');
       
       $mails=explode(',', $mail_ids);
       
        $data2['quote']=$this->Base_model->get_quote($info['aircarft_id']);
        $data2['customers']=$this->Base_model->get_client_name_phone();
        $data2['aircraft_address']=$this->Base_model->get_aircraft_address();
        
        //$msg2 = $this->load->view('quote_email', $data2, TRUE);
        $msg2='Contract Details';
        $quote_contract=$this->quote_pdf($data2['quote']->id);

    
    
    		$bcc=bcc_mail();
         //$from_email = 'info@icraftsolutions.co.uk';
         $from_email = 'info@tamprivateaviation.com';
        $to_email = $mails;
        foreach ($to_email as $key => $value) {
            $subject_url = 'Contract Tam Aviations';
            $message = $msg2;
            $this->email->from($from_email);
            $this->email->to('somnath356@gmail.com');
//            $this->email->bcc($bcc);
            $this->email->subject($subject_url);
            $this->email->message($message);
            $this->email->attach($quote_contract, 'application/pdf', "Pdf File " . date("m-d H-i-s") . ".pdf", false);
            $this->email->set_mailtype('html');
            $r=$this->email->send();
        	
            
            }
			if (!$r) {
              $this->session->set_flashdata('mail_msg', '<span style="color:red;">Sorry There Was An Error while sending message Please Try again</span>');
            } else {
               
               $log_data=array('sending_date_time'=>date('d F Y H:i:s A'),
                                'receiving_time'=>'pending',
                                'type'=>'contract',
                                'mail_recipients'=>$mail_ids,
                               'quote_id'=>$data2['quote']->id

                );
               $log_flag=$this->Base_model->insert_log($log_data);
               if($log_flag=="success")
               {
               $this->session->set_flashdata('mail_msg', '<span style="color:green;">Successfully Sent Mail</span>');
               }
               else
               {
                $this->session->set_flashdata('mail_msg', '<span style="color:red;">Sorry There Was An Error while sending message Please Try again</span>');
               }
            $this->email->clear();
        }
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
        

    }

    public function operator_email($list,$quote)
    {
       $aircraft=array();
       if(!is_array($list))
       {
        $aircraft[]=$list;
       }
       else
       {
        $aircraft=$list;
       }
       $operators=array();
       foreach ($aircraft as $value) {
          $op_id=$this->Base_model->get_operator_by_aircraft($value);
          if($op_id!=NULL)
          {
            $op=get_operator($op_id->operator_id);
            array_push($operators, $op->email);
          }
       }
       $data2['quote']=$this->Base_model->get_quote($quote);

       $msg2 = $this->load->view('quote_email', $data2, TRUE);
        $bcc=bcc_mail();
        $from_email='info@tamprivateaviation.com';
    
        foreach ($operators as $key => $value) {
            $subject_url = 'Request For Quotation';
            $message = $msg2;
            $this->email->from($from_email);
            $this->email->to('somnath356@gmail.com');
//            $this->email->bcc($bcc);
            $this->email->subject($subject_url);
            $this->email->message($message);
            $this->email->set_mailtype('html');
            $r=$this->email->send();
            
            
            }
            $this->email->clear();
    }
    public function operator_email_resend($data)
    {
       $info=explode("-", $data);
       $operator_id=$info[0];
       $quote=$info[1];
       $operators=array();
       $op=get_operator($operator_id);
           
        
       $data2['quote']=$this->Base_model->get_quote($quote);
       // // $this->load->view('quote_email',$data2);
       $msg2 = $this->load->view('quote_email', $data2, TRUE);

       //$operators[]='vishakha@icraftsolutions.net';
       $operators[]=$op->email;

            
       $bcc=bcc_mail();
       //   //$from_email = 'info@icraftsolutions.co.uk';
       $from_email='info@tamprivateaviation.com';

       foreach ($operators as $key => $value) {
            $subject_url = 'Request For Quotation';
            $message = $msg2;
            $this->email->from($from_email);
            $this->email->to('somnath356@gmail.com');
//            $this->email->bcc($bcc);
            $this->email->subject($subject_url);
            $this->email->message($message);
            $this->email->set_mailtype('html');
            $r=$this->email->send();
            
            
            }
            $this->email->clear();
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
    }


    public function quote_pdf($id=NULL)
  {
    

    $data['quote']=$this->Base_model->get_quote($id);
    $data['customers']=$this->Base_model->get_client_name_phone();
    $data['aircraft_address']=$this->Base_model->get_aircraft_address();

     $departure_address=$data['quote']->departure_address;
     if(strlen($departure_address)>0)
     {
      $depart=unserialize($departure_address);
      
     }
     else
     {
      $depart='N/A';
     }
     $data['depart']=$depart;
     $arrival_address=$data['quote']->arrival_address;
     if(strlen($arrival_address)>0)
     {
      $arrive=unserialize($arrival_address);
      
     }
     else
     {
      $arrive='N/A';
     }
     $data['arrive']=$arrive;
                     


    $this->load->view('quote_pdf',$data);
    $html = $this->output->get_output();
    $this->load->library('Dompdf_gen');
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $pdf = $this->dompdf->output();
    return $pdf;
  }
    public function aggrement_email()
    {
        $info['aircarft_id']=$this->input->post('aircarft_id');
      $mail_ids=$this->input->post('email');
       
       $mails=explode(',', $mail_ids);
       
        $data2['quote']=$this->Base_model->get_quote($info['aircarft_id']);
        $data2['customers']=$this->Base_model->get_client_name_phone();
        $data2['aircraft_address']=$this->Base_model->get_aircraft_address();
        
        //$msg2 = $this->load->view('quote_email', $data2, TRUE);
        $msg2='The Flight Briefings';
        $quote_contract=$this->aggrement_pdf($data2['quote']->id);

    
    
    	$bcc=bcc_mail();
         //$from_email = 'info@icraftsolutions.co.uk';
         $from_email='info@tamprivateaviation.com';
        $to_email = $mails;
        foreach ($to_email as $key => $value) {
            $subject_url = 'Aggrement Tam Aviations';
            $message = $msg2;
            $this->email->from($from_email);
            $this->email->to('somnath356@gmail.com');
//        	$this->email->bcc($bcc);
            $this->email->subject($subject_url);
            $this->email->message($message);
            $this->email->attach($quote_contract, 'application/pdf', "Pdf File " . date("m-d H-i-s") . ".pdf", false);
            $this->email->set_mailtype('html');
            $r=$this->email->send();
            
            
            }
            if (!$r) {
              $this->session->set_flashdata('mail_msg', '<span style="color:red;">Sorry There Was An Error while sending message Please Try again</span>');
            } else {
               
               $log_data=array('sending_date_time'=>date('d F Y H:i:s A'),
                                'receiving_time'=>'pending',
                                'type'=>'aggrement',
                                'mail_recipients'=>$mail_ids,
                               'quote_id'=>$data2['quote']->id

                );
               $log_flag=$this->Base_model->insert_log($log_data);
               if($log_flag=="success")
               {
               $this->session->set_flashdata('mail_msg', '<span style="color:green;">Successfully Sent Mail</span>');
               }
               else
               {
                $this->session->set_flashdata('mail_msg', '<span style="color:red;">Sorry There Was An Error while sending message Please Try again</span>');
               }
            $this->email->clear();
        }
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
        
    }
    public function quote_briefing_email()
    {
        $aircarft_id=$this->input->post('aircarft_id');
      $mail_ids=$this->input->post('email');
       
       $mails=explode(',', $mail_ids);
       
        
        
        //$msg2 = $this->load->view('quote_email', $data2, TRUE);
        $msg2='The Flight Briefings';
        $quote_contract=$this->quote_briefing_pdf($aircarft_id);

    
    
        $bcc=bcc_mail();
         //$from_email = 'info@icraftsolutions.co.uk';
         $from_email='info@tamprivateaviation.com';
        $to_email = $mails;
        foreach ($to_email as $key => $value) {
            $subject_url = 'Aggrement Tam Aviations';
            $message = $msg2;
            $this->email->from($from_email);
            $this->email->to('somnath356@gmail.com');
//            $this->email->bcc($bcc);
            $this->email->subject($subject_url);
            $this->email->message($message);
            $this->email->attach($quote_contract, 'application/pdf', "Pdf File " . date("m-d H-i-s") . ".pdf", false);
            $this->email->set_mailtype('html');
            $r=$this->email->send();
            
            
            }
            if (!$r) {
              $this->session->set_flashdata('mail_msg', '<span style="color:red;">Sorry There Was An Error while sending message Please Try again</span>');
            } else {
               
               $log_data=array('sending_date_time'=>date('d F Y H:i:s A'),
                                'receiving_time'=>'pending',
                                'type'=>'quotation',
                                'mail_recipients'=>$mail_ids,
                               'quote_id'=>$aircarft_id

                );
               $log_flag=$this->Base_model->insert_log($log_data);
               if($log_flag=="success")
               {
               $this->session->set_flashdata('mail_msg', '<span style="color:green;">Successfully Sent Mail</span>');
               }
               else
               {
                $this->session->set_flashdata('mail_msg', '<span style="color:red;">Sorry There Was An Error while sending message Please Try again</span>');
               }
            $this->email->clear();
        }
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
        
    }
    public function aggrement_pdf($id)
    {
        $data['quote']=$this->Base_model->get_quote($id);
        $data['customers']=$this->Base_model->get_client_name_phone();
        $data['aircraft_address']=$this->Base_model->get_aircraft_address();

         $departure_address=$data['quote']->departure_address;
         if(strlen($departure_address)>0)
         {
            $depart=unserialize($departure_address);
            
         }
         else
         {
            $depart=NULL;
         }
         $data['depart']=$depart;
         $arrival_address=$data['quote']->arrival_address;
         if(strlen($arrival_address)>0)
         {
            $arrive=unserialize($arrival_address);
            
         }
         else
         {
            $arrive=NULL;
         }
         $data['arrive']=$arrive;
         $data['aggrement_details']=$this->Base_model->get_aggrement_details($id);             


        $this->load->view('agreement_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('Dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $pdf = $this->dompdf->output();
        return $pdf;
    }
    public function quote_briefing_pdf($id)
    {
        $data['quote']=$this->Base_model->get_quote($id);
        $data['customers']=$this->Base_model->get_client_name_phone();
        $data['aircraft_address']=$this->Base_model->get_aircraft_address();

         $departure_address=$data['quote']->departure_address;
         if(strlen($departure_address)>0)
         {
            $depart=unserialize($departure_address);
            
         }
         else
         {
            $depart='N/A';
         }
         $data['depart']=$depart;
         $arrival_address=$data['quote']->arrival_address;
         if(strlen($arrival_address)>0)
         {
            $arrive=unserialize($arrival_address);
            
         }
         else
         {
            $arrive='N/A';
         }
         $data['arrive']=$arrive;
                     


        $this->load->view('quotation_briefing_pdf',$data);
        $html = $this->output->get_output();
        $this->load->library('Dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $pdf = $this->dompdf->output();
        return $pdf;
    }
    
}
