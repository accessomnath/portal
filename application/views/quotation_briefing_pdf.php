<style type="text/css">
   ::selection{ background-color: #E13300; color: white; }
   ::moz-selection{ background-color: #E13300; color: white; }
   ::webkit-selection{ background-color: #E13300; color: white; }
   body {
   background-color: #fff;
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
  
   -webkit-box-shadow: 0 0 8px #D0D0D0;
   }
   .center{text-align: center;}
   .left{
    text-align:left;
   }
   .right{
    text-align: right;
   }
   .border-heading{
    border-bottom: 1px solid #b08844;
     border-top: 1px solid #b08844;
     margin-top: 15px;
     margin-bottom: 15px;
  }
  .border-heading h3{
    margin: 0;
    padding-top:10px;
    padding-bottom: 10px;
    padding-left: 15px;
  }
   table {
   margin: 0 auto; 
   border-collapse: collapse;/* or margin: 0 auto 0 auto */
   border-color: #757575;
   }
   img{    width: 150px;
   float: left;
   padding-right: 15px;}
   .content{
    padding: 0 15px;
   }
   .clear{
    height: 20px;
    border: none;
   }
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
      <meta charset="utf-8">
      <title>Quatation</title>
   </head>
   <body>
      <?php
         $exact = "-";
         $customer = get_customer($quote->customer_id); ?>
      <div id="container">
      <h1 class="center" style="background-color: #000; color:#fff;">Quotation</h1>
      <div id="body">
         <table>
            <tr>
               <th style="width: 50%;"></th>
               <th style="width: 50%;"></th>
            </tr>
            <tr>
               <?php $logo_visible = get_meta_data($quote->id, 'quote', 'logo_visible');
                  echo ($logo_visible != NULL ? ($logo_visible->meta_value == "Yes" ? '<th><div class="left" style="padding-left:15px;"><img src="' . img_path() . 'aviation-logo.png" alt="tam-aviations"></div></th>' : '') : '<th><div class="left" style="padding-left:15px;"><img src="' . img_path() . 'aviation-logo.png" alt="tam-aviations"></div></th>');
                  ?>
               <?php $contact_number = get_meta_data($quote->id, 'quote', 'contact_number');
                  $phone = ($contact_number != NULL ? 'Sales Mob:' . $contact_number->meta_value : 'Sales Mob:+966500001002');
                  ?>
               <?php $contact_visible = get_meta_data($quote->id, 'quote', 'contact_visible');
                  echo ($contact_visible != NULL ? ($contact_visible->meta_value == "Yes" ? '<th><h2>Tam Private Aviation</h2>
                                    <p>Prince Sultan Road<br>Jeddah, KSA<br>CR:4030173198<br>' . $phone . '</p>
                                    </th>' : '') : '<th><h2>Tam Private Aviation</h2>
                                    <p>Prince Sultan Road<br>Jeddah, KSA<br>CR:4030173198<br>' . $phone . '</p>
                                    </th>');
                  ?>
            </tr>
         </table>
         <div class="clear"></div>
         <?php $top_content = get_meta_data($quote->id, 'quote', 'top_content');
            if ($top_content != NULL):
            ?> 
         <div class="content">
            <?php echo $top_content->meta_value; ?>
         </div>
         <?php else:?>
         <h2>Proposed Schedule:</h2>
<p>Schedule subject to the original flight date, time and any circumstances that might appear,
subject to slots, Traffic Rights / Over flight clearances and any other necessary permits or
authorizations, for the performance of the flights(s)<br></p>
         <?php
            endif; ?>
         <div class="clear"></div>
         <?php if (count($depart) > 0 || count($arrive) > 0): ?>
         <table border="1" style="width: 90%">
            <thead style="background-color:#757575 ; border: 1px solid #757575;">
               <tr>
                  <th style="padding: 7px 0 ; color: #fff;">Date Time</th>
                  <th style="padding: 7px 0 ; color: #fff;">Departure Airport</th>
                  <th style="padding: 7px 0 ; color: #fff;">Arrival Airport</th>
                  <th style="padding: 7px 0 ; color: #fff;">Duration</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  $max = (count($depart) > count($arrive) ? count($depart) : count($arrive));
                  $date = $quote->departure_date;
                  $departure_date = array();
                  if (strlen($date) > 0) {
                      $departure_date = unserialize($date);
                  }
                  $duration = $quote->flight_duration;
                  $flight_duration = array();
                  if (strlen($duration) > 0) {
                      $flight_duration = unserialize($duration);
                  }
                  for ($i = 0;$i < $max;$i++) {
                      $time = (isset($flight_duration[$i]) ? $flight_duration[$i] : '');
                      $new_time = '';
                      if (strlen($time) > 0) {
                          $tot_time = explode(":", $time);
                          $new_time = $tot_time['0'] . 'Hrs ' . $tot_time['1'] . 'mins';
                      }
                  ?>  
               <tr>
                  <td style="padding:3px 5px;">
                     <?php
                        if (isset($departure_date[$i])) {
                            $d = new DateTime($departure_date[$i]);
                            $timestamp = $d->getTimestamp(); // Unix timestamp
                            echo $formatted_date = $d->format('d F Y l').'<hr>'.$d->format('H:m A');
                        } else {
                            echo "-";
                        }
                        ?>
                  </td>
                  <td style="padding:3px 5px;"><?php echo (isset($depart[$i]) ? $depart[$i] : ''); ?><br>
                  </td>
                  <td style="padding:3px 5px;"><?php echo (isset($arrive[$i]) ? $arrive[$i] : ''); ?>
                     <?php $arrival = $quote->arrival_date;
                        if (strlen($arrival) > 0) {
                            $arrival_date = new DateTime($arrival);
                            echo '<b>Date: ' . $arrival_date->format('d F, Y') . '</b>';
                        }
                        ?>
                  </td>
                  <td style="padding:3px 5px;"><?php echo $new_time; ?></td>
               </tr>
               <?php
                  } ?>
            </tbody>
         </table>
         <?php
            endif; ?>
            <div class="content" style="padding-top: 20px;">
              <a target="_blank" href="<?php echo site_url('edit_quote/quotation_web_view/'.$quote->id);?>" target="_blank"><img src="<?php echo img_path()?>ticket.png" style="width: 20px">View The itinerary details</a>
            </div>
         <div class="clear"></div>
         <div class="border-heading">
         <h3>Please Find The Aircraft Configuration Below</h3>
         </div>
         <div>
            <?php
               $prefer = $quote->prefer_list;
               $prefer_list = array();
               if (strlen($prefer) > 0) {
                   $prefer_list = unserialize($prefer);
               }
               if (count($prefer_list) > 0):
                   $our_price = $quote->our_price;
                   $prices = array();
                   if (strlen($our_price) > 0) {
                       $prices = unserialize($our_price);
                   }
               ?>
            <?php
               $c = 1;
               foreach ($prefer_list as $value):
                   $present = aircraft_exists($value);
                   if ($present > 0):
                       $air_data = get_aircraft($value);?>
            <?php $images = get_aircraft_images($value);
               if ($images != NULL):
                   $total_remain = count($images) % 2;
                   if ($total_remain != 0) {
                       $new_count = count($images) - $total_remain + 2;
                   } else {
                       $new_count = count($images);
                   }
                 ?>
                 <div class="clear"></div>
            <table border="1" border-color="#757575" style="width: 90%">
               <thead style="background-color: #757575;">
                  <tr>
                     <td style="padding: 7px 0 ; color: #fff; text-align: center;">Option</td>
                     <td style="padding: 7px 0 ; color: #fff; text-align: center;">Aircraft Type</td>
                     <td style="padding: 7px 0 ; color: #fff; text-align: center;">Max Pax</td>
                     <td style="padding: 7px 0 ; color: #fff; text-align: center;">Price</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td style="padding:3px 5px;" ><?php echo $c.'.';?></td>
                     <td style="padding:3px 5px;" ><?php echo $air_data->ArName; ?></td>
                     <td style="padding:3px 5px;" ><?php echo $air_data->ArmaxPax; ?></td>
                     <td style="padding:3px 5px;" ><?php echo (isset($prices[$value])?$prices[$value].' USD':'-');?></td>
                  </tr>
               </tbody>
            </table>
            <table  style="width: 90%">
               <tr>
                  <td colspan="2">
                     <!-- Aircraft Type: <b><?php echo $air_data->ArName; ?></b> -->
                     <?php if (isset($images[0])):
                        echo "<center><a href='" . upload_url() . $images[0]->image . "' ><img src='" . upload_path() . $images[0]->image . "' style='width:550px;'></a></center>";
                        endif; ?>
                  </td>
               </tr>
               <?php $span = 2;
                  for ($i = 1;$i < $new_count;$i++) {
                      $remain = $span % 2;
                      if ($remain == 0) {
                          echo "<tr>";
                      }
                  ?>
               <td><?php if (isset($images[$i])):
                  echo "<a href='" . upload_url() . $images[$i]->image . "' ><img src='" . upload_path() . $images[$i]->image . "' style='width:280px;'></a>";
                  endif; ?></td>
               <?php
                  if ($remain == 2) {
                      echo "</tr>";
                  }
                  $span++;
                  }
                  ?>
            </table>
            <?php
               endif;
               $c++;
               endif; ?>
            <?php
               endforeach; ?>
            <?php
               endif; ?>
            <div class="clear"></div>
            <?php $bottom_content = get_meta_data($quote->id, 'quote', 'bottom_content');
               if ($bottom_content != NULL):
               ?>
            <div class="content">
               <?php echo $bottom_content->meta_value; ?>
            </div>
            <?php else:?>
            <h3><span style="font-weight: bold; text-decoration-line: underline;">Terms and Conditions</span>&nbsp;</h3>
<p></p>
<ul>
<li><span style="color: rgb(156, 0, 0);">Price,	Date	and	aircraft	type	depends	on	the	availability	of	flight	at	the	time	of	confirmation	only.&nbsp;</span></li>
<li><span style="color: rgb(156, 0, 0);">Payment	received	by	Credit	Card	will	incur	an	additional	charge	of	5%.</span></li>
<li><span style="color: rgb(156, 0, 0);">subject	to	slots,	overflight	and	landing	permissions.</span></li>
<li><span style="color: rgb(156, 0, 0);">All	Prices	are	based	on	 currency	 rates	of	exchange	at	the	time	of	submitting	this	quotation</span><br></li>
</ul>
<p></p>
            <?php
               endif; ?>
            <div class="clear"></div>
            <h3><u>Customer Acceptance </u></h3>
            <table style="width: 90%">
               <colgroup>
                 <col width="1">
                 <col>
               </colgroup>
               <tr>
                  <td style="min-width: 200px; padding-top: 15px;">Option Number Accepted:-</td>
                  <td style="width: 400px;"><span style="display: block; border-bottom: 1px solid #000;"></span></td>
                </tr>
                <tr>
                  <td style=" min-width: 200px padding-top: 15px;;">Name:-</td>
                  <td style="width: 400px;"><span style="display: block; border-bottom: 1px solid #000;"></span></td>
                </tr>
                <tr>
                  <td style=" min-width: 200px; padding-top: 15px;">Signature:-</td>
                   <td style="width: 400px;"><span style="display: block; border-bottom: 1px solid #000;"></span></td>
               </tr>
            </table>
         </div>
         <p class="footer">All Rights Reserved. <strong>@ Tam Aviation</strong>.</p>
      </div>
   </body>
</html>