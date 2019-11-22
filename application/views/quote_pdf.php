   <style type="text/css">

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
<html lang="en"><head>
   <meta charset="utf-8">
   <title>Quatation</title></head>
<body>
<?php 
$exact="-";
$customer=get_customer($quote->customer_id);?>
<div id="container">
   <h1 class="center">Quotation</h1>
   <h2 class="center">Booking Request</h2>
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
               Sales Mob:+966500001002</p>
            </th>
            
         </tr>
      </table>

    

      <div style="width: 100%; border-style: solid;border-color: black;">
         <div class="content1">
         <strong>To :<br><?php echo $customer->name;?></strong>
         </div>
         <div class="content2">
          <strong >From :</strong>
          <strong >Tam Private Aviation<br></strong>
          <strong>Jeddah, Saudi Arabia<br>C.R:4030173198</strong>
           </div>
         </div>
         <div>
      
            <?php $date=$quote->booking_date.' '.$quote->booking_time;
                  $time = $date;
                  $dt = new DateTime($time);
            ?>
         <strong>Booking Date: <?php echo $dt->format('d M, Y h:i:s a');?></strong><br>
         <strong>Booking Number: <?php echo '000'.$quote->id;?></strong><br>
         <strong>No.of Passengers: <?php echo $quote->maxpax;?></strong><br>
         <strong>Royal Terminal: <?php echo $quote->royal_terminal;?></strong><br>


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
          <thead>
            <tr>
               <th style="width: 10%;">Sl.no</th>
            <th>Aircraft Type</th>
         </tr>
         </thead>
         <tbody>

            <?php 
            $c=1;
            foreach($prefer_list as $value):
                  $present=aircraft_exists($value);
                  if($present>0):
                 $air_data=get_aircraft($value);
               ?>
            <tr>
               <td><?php echo $c.'.';?></td>
               <td><b><?php echo $air_data->ArName;?></b></td></tr>
         <?php 
         $c++;
      endif;?>
         <?php endforeach;?>
         </tbody>
       </table>
    <?php endif;?>
         <code>
            Proposed Schedule:<br>
            Schedule subject to slots, parking, dry conditions in LSZR, LSZR RFF
            upgrade, Traffic Rights / Overflight clearances and any other necessary
            permits or authorizations, for the performance of the flights(s). 
         </code>
         
  
      
      
     

      

    <!--   <strong>Date:<?php date_default_timezone_set("Asia/Dhaka");echo date('d-m-Y');?></strong>
      <strong style="padding-left: 200px;">Quatation ID: <?php echo"0000".$quote->id;?></strong> -->
     <?php if(count($depart)>0 || count($arrive)>0):?>
      <table border="1">
         <thead>
            <tr>
            <th >Date</th>
            <th >From</th>
            <th >To</th>
            <th >Duration</th>

         </tr>
         </thead>
            <tbody>
             <?php 
             $max=(count($depart)>count($arrive)?count($depart):count($arrive));
             $duration=$quote->flight_duration;
             $date=$quote->departure_date;
             $departure_date=array();
             if(strlen($date)>0)
             {
              $departure_date=unserialize($date);
             }
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
            <td><?php 
            if(isset($departure_date[$i]))
            {
              $d = new DateTime($departure_date[$i]);
              $timestamp = $d->getTimestamp(); // Unix timestamp
              echo $formatted_date = $d->format('d F Y h:i:s A');
            }
            else
            {
              echo" ";
            }
            ?></td>
            <td><?php  echo (isset($depart[$i])?$depart[$i]:'');?></td>
            <td><?php  echo (isset($arrive[$i])?$arrive[$i]:'');?></td>
            <td><?php  echo $new_time;?></td>

         </tr>
      <?php }?>
            </tbody>
      </table>
   <?php endif;?>
   <code>Catering VIP: Catering suitable for the length of flight and time of day.<br>
         Handling Agents: TBA<br>

         I/We confirm the gross charter price to be <?php echo $exact;?>  (inclusive of 5% VAT),passengers taxes and
         security charges, which I/we confirm shall be paid to you.</code>

   <code>The total price shall be made in full, from the date and time of signing this booking request to the
following name cash or transfer.</code>
<table>
   <tr>
      <td>Account Name:</td>
      <td>TAM Flight Support Services Premium</td>

   </tr>
   <tr>
      <td>Address of the Beneficiary</td>
      <td>P.O Box 108 Code 21411 King Road Jeddah, Saudi Arabia</td>
      
   </tr><tr>
      <td>Bank Name:</td>
      <td>National Commercial Bank</td>
      
   </tr><tr>
      <td>Account IBAN Number</td>
      <td>SA66 1000 0013 6733 2600 0106</td>
      
   </tr><tr>
      <td>Bank address</td>
      <td>Saudi Arabia, Jeddah, Hail Branch, Hail Street</td>

</table>
<code>Payment received by credit card will incur an additional charge of 5%</code>

<table style="width: 90%" border="1">
   <tr>
      <td><br><br><br></td>
      <td><br><br><br></td>
      <td><br><br><br></td>

   </tr>
   <tr>
      <td>SIGNATURE</td>
      <td>NAME</td>
      <td>DATE</td>
      
   </tr>
</table>
<br>
<table>
   <tr>
      <td><img src="<?php echo img_path();?>aviation-logo.png" alt="tam-aviations" class="center"></td>

   </tr>
</table>

<h2 class="center">Cancellation Charges</h2>
<code>In addition, I/we accept that the following cancellation terms (or those of the Operator, whichever are the higher) will apply and which we shall pay to you upon demand<br>
   <h4 class="center">-50% Of the total charter price with immediate effect.</h4>
   <h4 class="center">-75% Of the total charter price if cancelled less than 07 days prior to departure.</h4>
   <h4 class="center">-100% Of the total charter price if cancelled less than 03 days prior to departure.</h4>
   <h4 class="center">-100% Of the total charter price if position out of base.</h4>
   <h4 class="center"></h4>
   <p>All  prices  exclude  any  changes  to  itinerary  as  listed  above,  aircraft  de-icing,  any  fuel surcharges levied by the Operator, war risk insurance costs, additional crew proceedings and any additional landings, re-routes, demurrage or flight hours plus any additional catering order,use of in-flight telephone or ground transportation and royalties (if applicable).</p>
   <p>In the event that any of the above apply, I/we shall pay the same to you within 7 days of receipt of your invoice in respect thereof.Otherwise, the flight(s) are to be operated subject to an approved operator’s Standard Terms and Conditions currently in force, which please sign on my/ our behalf, as my/our agent. </p>
   <p>Once you have confirmed the flight with the operator, please confirm the operator’s acceptance of the above details to us.</p>
   <p>I/We accept that TAM has no responsibility for the performance or otherwise of the flight and that all liability in respect of the performance or otherwise of the flights falls upon the operator; I/we shall hold you harmless against any claim brought against you by the operator caused by any act or omission on my/our part or that of any of my/our</p>
</code>

<table style="width: 90%" border="1">
   <tr>
      <td><br><br><br></td>
      <td><br><br><br></td>
      <td><br><br><br></td>

   </tr>
   <tr>
      <td>SIGNATURE</td>
      <td>NAME</td>
      <td>DATE</td>
      
   </tr>
</table>






























      
   </div>






















   <p class="footer">All Rights Reserved. <strong>@ Tam Aviation</strong>.</p>
</div>

</body>
</html>
