<style type="text/css">
   ::selection{ background-color: #E13300; color: white; }
   ::moz-selection{ background-color: #E13300; color: white; }
   ::webkit-selection{ background-color: #E13300; color: white; }
   body {
   background-color: #fff;
   padding: 15px;
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
  
   border: 1px solid #D0D0D0;
   -webkit-box-shadow: 0 0 8px #D0D0D0;
   }
   .center{text-align: center;}
   .left{
    text-align: left;

   }
   .right{
    text-align: right;
   }
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
      <meta charset="utf-8">
      <title>Quatation</title>
   </head>
   <body>
      <?php 
         $exact="-";
         $customer=get_customer($quote->customer_id);?>
      <div id="container">
      <h1 class="center"><b>Quotation</b></h1>
      <div id="body">
         <table>
            <tr>
               <th style="width: 50%;"></th>
               <th style="width: 50%;"></th>
            </tr>
            <tr>
               <th>
                <div class="center">
                  <img src="<?php echo img_path();?>aviation-logo.png" alt="tam-aviations">
                </div>
              </th>
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
         <div>
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
               
                 }
               
               ?>
            <table border="1" style="width: 100%">
               <thead>
                  <tr>
                     <th style="width: 10%;">Sl.no</th>
                     <th style="width: 70%">Aircraft Type</th>
                     <th>Amount Quoted</th>
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
                     <td><b><?php echo $air_data->ArName;?></b></td>
                     <td><b><?php echo (isset($prices[$value])?$prices[$value].' USD':'-');?></b></td>
                  </tr>
                  <?php 
                     $c++;
                     
                     endif;?>
                  <?php endforeach;?>
               </tbody>
            </table>
            <br>
            <table border="1" style="width: 100%">
               <thead>
                  <tr>
                     <th style="width: 10%;">Sl.no</th>
                     <th style="width: 20%">Aircraft Type</th>
                     <th>Details</th>
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
                     <td><b><?php echo $air_data->ArName;?></b></td>
                     <td>
                        <ol>
                           <li>MaxPax: <?php echo $air_data->ArmaxPax;?></li>
                           <li>Smoking: <?php echo $air_data->smoking;?></li>
                           <?php echo ($air_data->smoking=="Yes"?"<li>Smoking Charges: ".$air_data->smoking_charge." USD</li>":'');?> 
                           <li>Wifi: <?php echo $air_data->wifi;?></li>
                           <?php echo ($air_data->wifi=="Yes"?"<li>Wifi Charges: ".$air_data->wifi_charge." USD</li>":'');?>  
                           <li>Bedroom: <?php echo $air_data->ArBedroom;?></li>
                           <?php echo ($air_data->ArBedroom=="No"?"<li>Bed Setup: ".$air_data->ARBedStup." USD</li>":"<li>Bed Location: ".$air_data->ArBedroomLocation." USD</li>");?>  
                        </ol>
                     </td>
                  </tr>
                  <?php 
                     $c++;
                     
                     endif;?>
                  <?php endforeach;?>
               </tbody>
            </table>
            <br>
            <?php 
               $c=1;
               
               foreach($prefer_list as $value):
               
                     $present=aircraft_exists($value);
               
                     if($present>0):
               
                    $air_data=get_aircraft($value);
               
                  ?>
            <?php $images=get_aircraft_images($value);
               if($images!=NULL):
               
                $total_remain=count($images)%3;
               
                if($total_remain!=0)
               
                {
               
                  $new_count=count($images)-$total_remain+3;
               
                }
               
                else
               
                {
               
                  $new_count=count($images);
               
                }
               
                
               
                
               
               ?>
            <table border="1" style="width: 90%">
               <tr>
                  <td colspan="3">Aircraft Type: <b><?php echo $air_data->ArName;?></b></td>
               </tr>
               <?php $span=3;
                  for ($i=0 ;$i<$new_count;$i++) {
                  
                    $remain=$span%3;
                  
                    if($remain==0)
                  
                    {
                  
                      echo"<tr>";
                  
                    }
                  
                    ?>
               <td><?php if(isset($images[$i])):echo"<a href='".upload_url().$images[$i]->image."' ><img src='".upload_path().$images[$i]->image."' style='width50%;'></a>";endif;?></td>
               <?php
                  if($remain==2)
                  
                  {
                  
                    echo"</tr>";
                  
                  }
                  
                  $span++;
                  
                  }
                  
                  ?>
            </table>
            <?php 
               endif;
               
               $c++;
               
               endif;?>
            <?php endforeach;?>
            <?php endif;?>
         </div>
         <p class="footer">All Rights Reserved. <strong>@ Tam Aviation</strong>.</p>
      </div>
   </body>
</html>