<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <h4 class="title">Quotation</h4>
                  <h5 class="title">Booking No: <?php echo '000'.$quote->id;?></h5>
                  <p class="category">FLIGHT BRIEFING</p>
                  <?php echo $this->session->flashdata('aggrement_msg');?>
               </div>
               <div class="card-content">
                  <div class="row">
                     <div class="col-md-2"></div>
                     <div class="col-md-8">
                        <img src="<?php echo img_url();?>aviation-logo.png" alt="tam-aviations" style="width: 25%;
                           float: right;margin-right: 142px;">
                        <h3>Tam Private Aviation</h3>
                        <p>Prince Sultan Road<br>
                           Jeddah, KSA<br>
                           CR:4030173198<br>
                           Sales Mob:+966500001002
                        </p>
                     </div>
                     <div class="col-md-4"></div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <?php
                           $prefer=$quote->prefer_list;
                                                  $prefer_list=array();
                                                  if(strlen($prefer)>0)
                                                  {
                                                    $prefer_list=unserialize($prefer);
                                                  }
                           if(count($prefer_list)>0):
                             $our_price=$quote->our_price;
                             $prices=array();
                             
                             if(strlen($our_price)>0)
                             {
                                $prices=unserialize($our_price);
                                $exact=$prices[$prefer_list['0']].'USD';
                             }
                           ?>
                        <table border="1" style="width: 100%">
                           <tr>
                              <td colspan="3">
                                 <h4 class="center">Flight Information</h4>
                           </tr>
                           <tr>
                              <td><strong>Aircarft Type</strong></td>
                              <td><strong>Registration Number</strong></td>
                              <td><strong>Passenger Number</strong></td>
                           </tr>
                           <?php 
                              $c=1;
                              foreach($prefer_list as $value):
                                    $present=aircraft_exists($value);
                                    if($present>0):
                                   $air_data=get_aircraft($value);
                                 ?>
                           <tr>
                              <td><b><?php echo $air_data->ArName;?></b></td>
                              <td><b><?php echo $air_data->r_number;?></b></td>
                              <td><b><?php echo $quote->maxpax;?></b></td>
                           </tr>
                           <?php 
                              $c++;
                              endif;?>
                           <?php endforeach;?>
                        </table>
                        <?php endif;?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <?php if(count($depart)>0 || count($arrive)>0):?>
                        <table border="1" style="width: 100%">
                           <thead>
                              <tr>
                                 <th >Departure Airport</th>
                                 <th >Arrival Airport</th>
                                 <th >Duration</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $max=(count($depart)>count($arrive)?count($depart):count($arrive));
								$date=$quote->departure_date;
                    			 $departure_date=array();
                     			if(strlen($date)>0)
                     			{
                      				$departure_date=unserialize($date);
                     			}
                                 $duration=$quote->flight_duration;
                                 $flight_duration=array();
                                 if(strlen($duration)>0)
                                 {
                                   $flight_duration=unserialize($duration);
                                 }
                                 for($i=0;$i<$max;$i++)
                                 {
                                 
                                   $time=(isset($flight_duration[$i])?$flight_duration[$i]:'');
                                   $new_time='';
                                   if(strlen($time)>0)
                                   {
                                      $tot_time=explode(":", $time);
                                      $new_time=$tot_time['0']. 'Hrs '.$tot_time['1'].'mins';
                                   }
                                 ?>  
                              <tr>
                                 <td><?php  echo (isset($depart[$i])?$depart[$i]:'');?><br>
                                    <b>Date: <?php 
            						if(isset($departure_date[$i]))
            						{
             						 $d = new DateTime($departure_date[$i]);
              						 $timestamp = $d->getTimestamp(); // Unix timestamp
              						 echo $formatted_date = $d->format('d F Y h:i:s A');
            						}
            						else
            						{
              							echo"-";
            						}
            						?></b>
                                 </td>
                                 <td><?php  echo (isset($arrive[$i])?$arrive[$i]:'');?>
                                    <?php $arrival=$quote->arrival_date;
                                       if(strlen($arrival)>0)
                                       {
                                         $arrival_date=new DateTime($arrival);
                                         echo '<b>Date: '.$arrival_date->format('d F, Y').'</b>';
                                       }
                                       ?>
                                 </td>
                                 <td><?php  echo $new_time;?></td>
                              </tr>
                              <?php }?>
                           </tbody>
                        </table>
                        <?php endif;?>
                     </div>
                  </div>
                  <?php 
                     $handling_data=array();
                     $crew_data=array();
                     if($aggrement_details!=NULL)
                           {
                     
                             $handling=$aggrement_details->handling_data;
                             $handling_data=unserialize($handling);
                             $crew=$aggrement_details->crew_data;
                             $crew_data=unserialize($crew);
                           }?>
                  <form class="modify-aggrement-form" action="<?php echo site_url('modify_aggrement/update_aggrement');?>" method="post">
                     <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                           <h4><strong>Handling Information</strong></h4>
                        </div>
                        <div class="col-md-4"><a href="#" class="add-hadling"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Handling Data</a></div>
                     </div>
                     <div class="handling-container">
                        <?php 
                           if(count($handling_data)<1):?>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Airport</label>
                                 <input type="text" class="form-control" id="departure-address" value="" name="airport_name[]" autocomplete="from" required>
                                 <ul class="lists_of_aircraft departure-list" style="display: none;"></ul>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Handling Name</label>
                                 <input type="text" class="form-control" value="" name="handling_name[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Contact Numbers</label>
                                 <input type="text" class="form-control" value="" name="contact_numbers[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-2">
                           </div>
                        </div>
                        <?php else:?>
                        <?php 
                           for($i=0;$i<count($handling_data['0']);$i++){
                           
                             ?>
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Airport</label>
                                 <input type="text" class="form-control" id="departure-address" value="<?php echo $handling_data['0'][$i];?>" name="airport_name[]" autocomplete="from" required>
                                 <ul class="lists_of_aircraft departure-list" style="display: none;"></ul>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Handling Name</label>
                                 <input type="text" class="form-control" value="<?php echo $handling_data['1'][$i];?>" name="handling_name[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Contact Numbers</label>
                                 <input type="text" class="form-control" value="<?php echo $handling_data['2'][$i];?>" name="contact_numbers[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-2">
                           </div>
                        </div>
                        <?php }?>
                        <?php endif;?>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                           <h4><strong>Crew Name and Position</strong></h4>
                        </div>
                        <div class="col-md-4"><a href="#" class="add-crew"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Crew Members</a></div>
                     </div>
                     <div class="crew-container">
                        <?php if(count($crew_data)<1):?>
                        <div class="row">
                           <div class="col-md-5">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Designation</label>
                                 <input type="text" class="form-control" value="" name="designation[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Crew Name</label>
                                 <input type="text" class="form-control" value="" name="crew_name[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-2">
                           </div>
                        </div>
                        <?php else:?>
                        <?php foreach($crew_data as $key=>$data):?>
                        <div class="row">
                           <div class="col-md-5">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Designation</label>
                                 <input type="text" class="form-control" value="<?php echo $data;?>" name="designation[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-group label-floating ">
                                 <label class="control-label">Crew Name</label>
                                 <input type="text" class="form-control" value="<?php echo $key;?>" name="crew_name[]" autocomplete="from" required>
                              </div>
                           </div>
                           <div class="col-md-2">
                           </div>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                     </div>
                     <input type="hidden" name="quote_id" value="<?php echo $quote->id;?>">
                     <button type="submit" class="btn btn-primary pull-right">Save</button>
                  </form>
                  <div class="row">
                  <?php 
         $exact="-";
         $customer=get_customer($quote->customer_id);?>
                  <table border="1" style="width: 100%">
              <thead>
                <tr>
                  <td>Sl.no</td>
                  <td>Name Of Passenger</td>
                  <td>Nationality</td>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td><?php echo $customer->name;?></td>
                  <td><?php echo $customer->nationality;?></td>
                </tr>
                <?php $group=$quote->group_members;
                      if(strlen($group)>0)
                      {
                        $c=2;
                        $members=unserialize($group);
                        foreach ($members as $member) {
                         $detail=get_customer($member); 
                        ?>
                        <tr>
                        <td><?php echo $c;?>.</td>
                        <td><?php echo $detail->name;?></td>
                        <td><?php echo $detail->nationality;?></td>
                        </tr>
                        <?php
                        $c++;
                        }
                      }
                ?>
              </tbody>
            </table>
           <h4 style="color: red;">24/7 To communicate around the clock</h4>
           <h4 style="color: red;">+966 53 00000 50 </h4>
           <p>We are here to make your flight a pleasurable experience. Please call us anytime for assistance on our 24 / 7 number</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>