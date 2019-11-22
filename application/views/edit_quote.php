<link rel="stylesheet" type="text/css" href="<?php echo css_url();?>jssocials.css" />
<link rel="stylesheet" type="text/css" href="<?php echo css_url();?>jssocials-theme-flat.css" />
<div class="content">
<!-- Default Class-->
<div class="container-fluid">
<!-- Bootstrap Class-->
<!-- page Starts Here -->
<div class="row">
   <div class="col-md-8">
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header" data-background-color="purple">
            <h4 class="title">Quotation Details For the Booking Number -00000<?php echo $quote->id;?></h4>
            <p id="share_url" style="display: none;"><?php echo site_url('edit_quote/quotation_web_view/'.$quote->id);?></p>
            <div id="share" style="float: right;"></div>
            <p class="category" style="padding-bottom:20px;"> 
            <a data-toggle="tooltip" title="Quote PDF" href="<?php echo site_url('edit_quote/quotation_briefing_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-pdf-o"></i></i></a>
               &nbsp;&nbsp;
               <a data-toggle="tooltip" title="Modify Quotation Pdf" href="<?php echo site_url('modify_quotation/index/'.$quote->id)?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a>
               &nbsp;&nbsp;
               <a data-toggle="tooltip" title="Quote Web View" href="<?php echo site_url('edit_quote/quotation_web_view/'.$quote->id);?>" target="_blank"><i class="fa fa-desktop"></i></i></a>
               &nbsp;&nbsp;
               
               
               <!-- <a data-toggle="tooltip" title="Quote PDF" href="<?php echo site_url('edit_quote/quote_briefing_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-pdf-o"></i></i></a>
               &nbsp;&nbsp; -->
               <a href="#" data-toggle="tooltip" title="Quote Mail" class="quote-briefing-aggrement" data-value="<?php echo $quote->id;?>"><i class="fa fa-share" aria-hidden="true"></i></a>
               &nbsp;&nbsp;
            <a data-toggle="tooltip" title="Contract PDF" href="<?php echo site_url('edit_quote/quote_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-text" ></i></a>&nbsp;&nbsp;
            <a data-toggle="tooltip" title="Contract Email" href="#" class="mail-quote" data-value="<?php echo $quote->id;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
            &nbsp;&nbsp;
            <a data-toggle="tooltip" title="Flight Brief PDF" href="<?php echo site_url('quote_log/agreement_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
            &nbsp;&nbsp;
            <a data-toggle="tooltip" title="Modify Flight Brief Pdf" href="<?php echo site_url('modify_aggrement/index/'.$quote->id)?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a>
            <a href="#" data-toggle="tooltip" title="Flight Brief Mail" class="mail-aggrement" data-value="<?php echo $quote->id;?>"><i class="fa fa-share" aria-hidden="true"></i></a>&nbsp;&nbsp;
               <a href="<?php echo site_url('quote_log/index/'.$quote->id);?>"><i class="fa fa-server" aria-hidden="true"></i></a>
            </p>

            <?php echo $this->session->flashdata('mail_msg');?>
         </div>
         <?php if($customers!=NULL):?>
         <div class="card-content">
            <form method="post" class="update_checklist">
               <input type="hidden" name="id" value="<?php echo $quote->id;?>">
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group label-floating ">
                        <label class="control-label">Booking Date</label>
                        <input type="text" class="form-control"  value="<?php echo $quote->booking_date;?>" required readonly/>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group label-floating is-focused">
                        <label class="control-label">Booking Time </label>
                        <input type="text" class="form-control"  value="<?php echo $quote->booking_time;?>" readonly required>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group label-floating ">
                        <label class="control-label">Booking By</label>
                        <input type="text" class="form-control"  value="<?php echo $quote->booking_by;?>" required readonly>
                        <span class="material-input"></span>
                     </div>
                  </div>
               </div>
               <div class="row client-filter">
                  <div class="col-md-3">
                     <div class="form-group label-floating ">
                        <?php $customer=get_customer($quote->customer_id);?>
                        <label class="control-label">Client Name <span class="imp"> *</span></label>
                        <input type="text" class="form-control cust_name" id="filter" value="<?php echo $customer->name;?>" required autocomplete="off" />
                        <input type="hidden" class="customer_id" name="customer_id" value="<?php echo $quote->customer_id;?>" required>
                        <ul class="lists_of_aircraft checklist-client-search" style="display: none;">
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group label-floating is-focused">
                        <label class="control-label">Client ID</label>
                        <?php $unique=($quote->customer_id<10?'000'.$quote->customer_id:'00'.$quote->customer_id) ;?>
                        <input type="text" class="form-control cust_phone"  value="<?php echo $unique;?>" readonly required>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group label-floating is-focused">
                        <label class="control-label">Client Type</label>
                        <input type="text" class="form-control"  value="<?php echo $quote->client_type;?>" name="client_type">
                     </div>
                  </div>
                  <div class="col-md-3 group-listing">
                     <?php if($members!=NULL):
                        $group=$quote->group_members;
                        $group_arr=array();
                        if(strlen($group)>0)
                        {
                          $group_arr=unserialize($group);
                        }
                        ?>
                     <!-- <div class="form-group label-floating is-focused">
                        <label  class="control-label">Other Group Members</label>
                        <select id="first" data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:auto;" tabindex="4" name="group_members[]">
                           <?php foreach($members as $member):
                           $get_customer=get_customer($member->customer_id);
                           ?>
                           <option value="<?php echo $member->customer_id;?>" <?php echo(in_array($member->customer_id, $group_arr)?'selected':'');?>><?php echo $get_customer->name;?></option>
                           <?php endforeach;?>
                        </select>
                        </div> -->
                     <div class="styled-select">
                        <div>
                           Other Group Members
                           <span class="fa fa-sort-desc"></span>
                        </div>
                        <select multiple name="group_members[]">
                           <?php foreach($members as $member):
                              $get_customer=get_customer($member->customer_id);
                                              ?>
                           <option value="<?php echo $member->customer_id;?>" <?php echo(in_array($member->customer_id, $group_arr)?'selected':'');?>><?php echo $get_customer->name;?></option>
                           <?php endforeach;?>
                        </select>
                     </div>
                     <?php endif;?>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-2">
                     <div class="form-group label-floating">
                        <label class="control-label">Direct Flight</label>
                        <select class="form-control" name="DirectFlight">
                           <option value="Yes" <?php echo ($quote->DirectFlight=="Yes"?"selected":"");?>>Yes</option>
                           <option value="No" <?php echo ($quote->DirectFlight=="No"?"selected":"");?>>No</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating ">
                        <label class="control-label">Full Bedroom</label>
                        <select class="form-control full-bedroom-change" name="ArBedroom" required>
                           <option value="Yes" <?php echo ($quote->ArBedroom=="Yes"?"selected":"");?>>Yes</option>
                           <option value="No" <?php echo ($quote->ArBedroom=="No"?"selected":"");?>>No</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating ">
                        <label class="control-label">Bedroom Location</label>
                        <select class="form-control" name="ArBedroomLocation">
                           <option value="" selected></option>
                           <option value="Front" <?php echo ($quote->ArBedroomLocation=="Front"?"selected":"");?>>Front</option>
                           <option value="Middle" <?php echo ($quote->ArBedroomLocation=="Middle"?"selected":"");?>>Middle</option>
                           <option value="Back" <?php echo ($quote->ArBedroomLocation=="Back"?"selected":"");?>>Back</option>
                           <option value="Any" <?php echo ($quote->ArBedroomLocation=="Any"?"selected":"");?>>Any</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating bed-setup-display" style="display: none;">
                        <label class="control-label">Bed Setup </label>
                        <select class="form-control ARBedStup" name="ARBedStup">
                           <option value="Yes" <?php echo ($quote->ARBedStup=="Yes"?"selected":"");?>>Yes</option>
                           <option value="No" <?php echo ($quote->ARBedStup=="No"?"selected":"");?>>No</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating ">
                        <label class="control-label">Pax Number <span class="imp"> *</span></label>
                        <input type="number" class="form-control" name="maxpax" value="<?php echo $quote->maxpax;?>" required>
                        <span class="material-input"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group label-floating">
                        <label class="control-label">Royal Terminal</label>
                        <select class="form-control" name="royal_terminal">
                           <option <?php echo ($quote->royal_terminal=="Yes"?"selected":"");?>>Yes</option>
                           <option <?php echo ($quote->royal_terminal=="No"?"selected":"");?>>No</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="radio">
                        <label><input type="radio" name="journey_type" id="oneway" value="oneway" onclick="show_hide(1)" <?php echo ($quote->journey_type=="oneway"?"checked":"");?>><span class="circle"></span><span class="check"></span>One Way</label>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="radio">
                        <label><input type="radio" name="journey_type" value="twoway" onclick="show_hide(2)" <?php echo ($quote->journey_type=="twoway"?"checked":"");?>><span class="circle"></span><span class="check"></span>Return</label>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="radio">
                        <label><input type="radio" name="journey_type" onclick="show_hide(3)" value="multi-leg" <?php echo ($quote->journey_type=="multi-leg"?"checked":"");?>><span class="circle"></span><span class="check"></span>Multi-Leg</label>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <input type="button" class="add-multi-city" value="Add City" style="display: none;" />
                  </div>
               </div>
               
               <?php $departure=$quote->departure_address;
                  $departure_address=array();
                  if(strlen($departure)>0)
                  {
                    $departure_address=unserialize($departure);
                  }
                  ?>
               <?php $arrival=$quote->arrival_address;
                  $arrival_address=array();
                  if(strlen($arrival)>0)
                  {
                    $arrival_address=unserialize($arrival);
                  }
                  $flight_duration=$quote->flight_duration;
                  $f_duration=array();
                  if(strlen($flight_duration)>0)
                  {
                    $f_duration=unserialize($flight_duration);
                  }
                  $departure_date=array();
                  $depart_dates=$quote->departure_date;
                  if(strlen($depart_dates)>0)
                  {
                    $departure_date=unserialize($depart_dates);
                  }
                  ?>
               
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-group label-floating ">
                        <label class="control-label">From <span class="imp"> *</span></label>
                        <input type="text" class="form-control" id="departure-address"  name="departure_address[]" value="<?php echo(isset($departure_address['0'])?$departure_address['0']:'');?>" autocomplete="from">
                        <ul class="lists_of_aircraft departure-list" style="display: none;">
                        </ul>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group label-floating ">
                        <label class="control-label">To <span class="imp"> *</span></label>
                        <input type="text" class="form-control" id="arrival-address" name="arrival_address[]" value="<?php echo(isset($arrival_address['0'])?$arrival_address['0']:'');?>" autocomplete="off">
                        <ul class="lists_of_aircraft arrival-list" style="display: none;">
                        </ul>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating is-focused">
                        <label class="control-label">Estimated Time Of Departure</label>
                        <input type="datetime-local" value="<?php echo(isset($departure_date['0'])?strftime('%Y-%m-%dT%H:%M:%S', strtotime($departure_date['0'])):'');?>" name="departure_date[]" class="form-control"/>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating is-focused date-flight" style="display: none;">
                        <label class="control-label">Date Of Flight</label>
                        <input type="datetime-local" value="<?php echo(strlen($quote->arrival_date)>0?$quote->arrival_date:'');?>" name="arrival_date" class="form-control"/>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating ">
                        <label class="control-label">Flight Duration</label>
                        <input type="time" class="form-control" name="flight_duration[]" value="<?php echo(isset($f_duration['0'])?$f_duration['0']:'');?>">
                     </div>
                  </div>
               </div>
               <div class="row multi-trip" >
                  <?php 
                     if(count($departure_address)>=2 || count($arrival_address)>=2):?>
                  <?php 
                     $addresses=array();
                     $address['depart']=$departure_address;
                     $address['arrive']=$arrival_address;
                     $depart_num=count($departure_address);
                     $arrive_num=count($arrival_address);
                     $max=($depart_num>$arrive_num?$depart_num:$arrive_num);
                     $depart_count=20;
                     $arival_count=30;
                     
                     for($i=1;$i<$max;$i++){?>
                  <div class="multi-parent-container">
                     <div class="col-md-3">
                        <div class="form-group label-floating parent">
                           <label class="control-label">From <span class="imp"> *</span></label>
                           <input type="text" class="form-control default-address add<?php echo $depart_count;?>"  name="departure_address[]" value="<?php echo(isset($address['depart'][$i])?$address['depart'][$i]:'')?>" autocomplete="from">
                           <ul class="lists_of_aircraft default-list<?php echo $depart_count;?>" style="display: none;"></ul>
                           <input type="hidden" class="count-num" value="<?php echo $depart_count;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group label-floating parent">
                           <label class="control-label">To <span class="imp"> *</span></label>
                           <input type="text" class="form-control default-address add<?php echo $arival_count;?>"  name="arrival_address[]" value="<?php echo(isset($address['arrive'][$i])?$address['arrive'][$i]:'')?>" autocomplete="off">
                           <ul class="lists_of_aircraft default-list<?php echo $arival_count;?>" style="display: none;"></ul>
                           <input type="hidden" class="count-num" value="<?php echo $arival_count;?>">                    
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                     <div class="form-group label-floating is-focused">
                        <label class="control-label">Estimated Time Of Departure</label>
                        <input type="datetime-local" value="<?php echo(isset($departure_date[$i])?strftime('%Y-%m-%dT%H:%M:%S', strtotime($departure_date[$i])):'');?>" name="departure_date[]" class="form-control"/>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating is-focused date-flight" style="display: none;">
                        <label class="control-label">Date Of Flight</label>
                        <input type="datetime-local" value="<?php echo(strlen($quote->arrival_date)>0?$quote->arrival_date:'');?>" name="arrival_date" class="form-control"/>
                     </div>
                  </div>
                     <div class="col-md-1">
                        <div class="form-group label-floating ">
                           <label class="control-label">Flight Duration</label>
                           <input type="time" class="form-control" name="flight_duration[]" value="<?php echo(isset($f_duration[$i])?$f_duration[$i]:'')?>">
                        </div>
                     </div>
                     <div class="col-md-1">
                        <a href="#" class="remove-multi-row"><i class="fa fa-times" aria-hidden="true"></i></a>
                     </div>
                  </div>
                  <?php 
                     $depart_count++;
                     $arival_count++;
                     }?>
                  <?php endif;
                     ?>
               </div>
               <div class="login-ajax">
                  <?php $aircraft_list=$quote->aircarft_list;
                     $our_price=$quote->our_price;
                     $our_price_arr=unserialize($our_price);
                     $sale_price=$quote->sale_price;
                     $sale_price_arr=unserialize($sale_price);

                     $prefer=$quote->prefer_list;
                     $prefer_list=array();
                     if(strlen($prefer)>0)
                     {
                       $prefer_list=unserialize($prefer);
                     }
                     if(strlen($aircraft_list)>0):?>
                  <div class='row'>
                     <div class="col-md-12">
                        <table border="1" class="cheklist-search-table">
                           <thead>
                              <tr>
                                 <td style="width: 5%;"></td>
                                 <!--<td style="width: 13%;"><b>Aaircraft ID</b></td>-->
                                 <td style="width: 15%;"><b>Aaircraft Type</b></td>
                                 <td ><b>Max Pax</b></td>
                                 <td ><b>Bedroom</b></td>
                                 <td ><b>Operator</b></td>
                                 <td><b>Our price</b></td>
                                 <td><b>Sale price</b></td>
                                 <td><b>Operator Link</b></td>
                                 <td><b>Aaircraft Link</b></td>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $aircrafts=unserialize($aircraft_list);
                                 foreach ($aircrafts as $key => $value) {
                                    $present=aircraft_exists($value);
                                    if($present>0):
                                   $air_data=get_aircraft($value);
                                 
                                   
                                 ?>
                              <tr>
                                 <td><input type="hidden" name="aircarft_list[]" value="<?php echo $air_data->id;?>">
                                    <input type="checkbox" name="prefer_list[]" value="<?php echo $air_data->id;?>" <?php echo(in_array($air_data->id,$prefer_list)?'checked':'');?>>
                                 </td>
                                 <!--<td>
                                    <?php $unique_aircarft_id=$air_data->id;
                                       $unique_aircarft_id=($unique_aircarft_id<10?'000'.$unique_aircarft_id:'00'.$unique_aircarft_id);
                                       ?>
                                    <b><?php echo $unique_aircarft_id;?></b></td>-->
                                 <td><b><?php echo $air_data->ArName;?></b></td>
                                 <td><b><?php echo $air_data->ArmaxPax;?></b></td>
                                 <td><b><?php echo $air_data->ArBedroom;?></b></td>
                                 <?php $get_operator=get_operator($air_data->operator_id);
                                    //$unique=($get_operator->id<10?'000'.$get_operator->id:'00'.$get_operator->id);
                                    ?>
                                 <td><b><?php echo $get_operator->name;?></b></td>
                                 <td><input type="number" name="our_price[]" class="form-control" value="<?php echo $our_price_arr[$air_data->id]?>"></td>
                                 <td><input type="number" name="sale_price[]" class="form-control" value="<?php echo $sale_price_arr[$air_data->id]?>"></td>
                                 <td><a href="<?php echo site_url('edit_operator/index/'.$get_operator->id)?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a href="#" class="operator-mail-resend" data-operator="<?php echo $get_operator->id;?>" data-quote="<?php echo $quote->id;?>"><i class="fa fa-envelope"></i></a>

                                 </td>
                                 <td><a href="<?php echo site_url('edit_aircraft/index/'.$air_data->id);?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a></td>
                              </tr>
                              <?php endif;}?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <?php endif;?>
               </div>
               <!-- <a href="<?php echo site_url('edit_quote/quote_pdf/'.$quote->id);?>" target="_blank">Show Contract</a> -->
               <button type="button" class="btn btn-primary pull-right search-checklist-update" >
               Search Aircrafts
               </button>
               <?php  $flag=check_cap('create');
                  if($flag==0):
                  ?>
               <button type="button" class="btn btn-primary pull-right submit-checklist" id="next" data-toggle="modal" data-target="#exampleModal" name="check_button">
               Process
               </button>
               <?php endif;?>
               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Are You Sure</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           Select the Desired Action
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <input type="hidden" name="booking_by" value="admin">
            </form>
            <div class="login-res">
               <img src="<?php echo img_url();?>30.gif" alt="loader" class="loader" style="display: none;">
               <?php else:?>
               <h3>Please Add Customers To Add A Check List</h3>
               <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="mailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="<?php echo site_url('quote/quote_email');?>" method="post" class="--quote-mail-form">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Please Add Recipient Address</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12 col-xs-12 col-md-12">
                     <div class="form-group label-floating">
                        <label class="control-label">Mail ID</label>
                        <input type="email" class="form-control mail-ids" multiple name="email" required>
                        <input type="hidden" name="aircarft_id" value="" class="aircarft_id">
                     </div>
                     <div id="search"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary" name="submit">Yes</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
         </div>
      </form>
   </div>
</div>


<div class="modal fade" id="aggrementmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <form action="<?php echo site_url('quote/aggrement_email');?>" method="post" class="--quote-mail-form">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Please Add Recipient Address</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-12 col-xs-12 col-md-12">
                                       <div class="form-group label-floating">
                                          <label class="control-label">Mail ID</label>
                                          <input type="email" class="form-control mail-ids" multiple name="email" required>
                                          <input type="hidden" name="aircarft_id" value="" class="aircarft_id">
                                          </div>
                                          <div id="search"></div>
                                    </div>
                                    
                                    
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                         </form>
                        </div>
                     </div>

<div class="modal fade" id="quote_briefing_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <form action="<?php echo site_url('quote/quote_briefing_email');?>" method="post" class="--quote-mail-form">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Please Add Recipient Address</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-12 col-xs-12 col-md-12">
                                       <div class="form-group label-floating">
                                          <label class="control-label">Mail ID</label>
                                          <input type="email" class="form-control mail-ids" multiple name="email" required>
                                          <input type="hidden" name="aircarft_id" value="" class="aircarft_id">
                                          </div>
                                          <div id="search"></div>
                                    </div>
                                    
                                    
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                         </form>
                        </div>
                     </div>

    