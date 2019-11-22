<style type="text/css">
  body { font-family: DejaVu Sans, sans-serif; }
   ::selection{ background-color: #E13300; color: white; }
   ::moz-selection{ background-color: #E13300; color: white; }
   ::webkit-selection{ background-color: #E13300; color: white; }
   body {
   background-color: #fff;
   margin: 40px;
   font: 13px/20px normal Helvetica, Arial, sans-serif;
   color: #4F5155;
   }
   a {
   color: #003399;
   background-color: transparent;
   font-weight: normal;
   }
   h1 {
   color: #444;
   background-color: transparent;
   border-bottom: 1px solid #D0D0D0;
   font-size: 19px;
   font-weight: normal;
   margin: 0 0 14px 0;
   padding: 14px 15px 10px 15px;
   }
   code {
   font-family: Consolas, Monaco, Courier New, Courier, monospace;
   font-size: 12px;
   background-color: #f9f9f9;
   border: 1px solid #D0D0D0;
   color: #002166;
   display: block;
   margin: 25px 0 14px 0;
   padding: 12px 10px 12px 10px;
   }
   /* #body{
   margin: 0 15px 0 15px;
   }*/
   p.footer{
   text-align: right;
   font-size: 11px;
   border-top: 1px solid #D0D0D0;
   line-height: 32px;
   padding: 0 10px 0 10px;
   margin: 20px 0 0 0;
   }
   #container{
   margin: 10px;
   border: 1px solid #D0D0D0;
   -webkit-box-shadow: 0 0 8px #D0D0D0;
   }
   .center{text-align: center;}
   table {
   margin: 0 auto; 
   border-collapse: collapse;/* or margin: 0 auto 0 auto */
   }
   img{    width: 150px;
   float: left;
   padding-right: 15px;}
   .content1 {
   float: left;
   width: 50%;
   }
   .content2 {
   margin-left: 300px;
   top: 311px;
   left:50px;
   width: 50%;
   position: absolute;
   }

</style>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>Quatation</title>
   </head>
   <body>
      <?php 
         $exact="-";
         $customer=get_customer($quote->customer_id);?>
      <div id="container">
      <h1 class="center">Quotation</h1>
      <h2 class="center">Booking No: <?php echo '000'.$quote->id;?></h2>
      <h3 class="center">FLIGHT BRIEFING</h3>
      <div id="body">
         <table>
            <tr>
               <th style="width: 50%;"></th>
               <th style="width: 50%;"></th>
            </tr>
            <tr>
               <th><img src="<?php echo img_path();?>aviation-logo.png" alt="tam-aviations"></th>
               <th>
                  <h2>Tam Private Aviation</h2>
                  <p>Prince Sultan Road<br>
                     Jeddah, KSA<br>
                     CR:4030173198<br>
                     Sales Mob:+966500001002
                  </p>
               </th>
            </tr>
         </table>
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
            <table border="1" style="width: 90%">
              <tr><td colspan="3"><h4 class="center">Flight Information</h4></tr>
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


            <?php if(count($depart)>0 || count($arrive)>0):?>
            <table border="1" style="width: 90%">
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
            <?php if(count($handling_data)>0):?>
              <table border="1" style="width: 90%">
                <tr><td colspan="3"><h4 class="center">Handling Info</h4></td></tr>
                <tr>
                  <td>Airport</td>
                  <td>Handling Name</td>
                  <td>Call Numbers</td>

                </tr>
                <?php for($i=0;$i<count($handling_data['0']);$i++){?>
                <tr>
                  <td><?php echo $handling_data['0'][$i];?></td>
                  <td><?php echo $handling_data['1'][$i];?></td>
                  <td><?php echo $handling_data['2'][$i];?></td>

                </tr>
                <?php }?>
              </table>
              <?php endif;?>
              <?php if(count($crew_data)>0):?>
                <table style="width: 90%" border="1">
                  <tr><td colspan="2"><h4 class="center">Crew Name and Position</h4></td></tr>
                  <?php foreach($crew_data as $key=>$data):?>
                    <tr>
                      <td><?php echo $data;?></td>
                      <td><?php echo $key;?></td>
                    </tr>
                  <?php endforeach;?>
                </table>
                <?php endif;?>
            <table border="1" style="width: 90%">
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
           <h4 class="center" style="color: red;">24/7 To communicate around the clock</h4>
           <h4 class="center" style="color: red;">+966 53 00000 50 </h4>
           <p class="center">We are here to make your flight a pleasurable experience. Please call us anytime for assistance on our 24 / 7 number</p>
        
        
         <p class="footer">All Rights Reserved. <strong>@ Tam Aviation</strong>.</p>
      </div>
   </body>
</html>