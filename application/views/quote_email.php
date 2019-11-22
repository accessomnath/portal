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

   #body{
      margin: 0 15px 0 15px;
   }
   
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
   </style>
<!DOCTYPE html>
<html lang="en"><head>
   <meta charset="utf-8">
   <title>Tam Aviation</title></head>
<body>
<!-- <?php print_r($quote);?> -->

<div id="container">
   <p>Dear Partner,</p>
   <br>
   <p>Greetings.</p>
   <br>
      <p>Could you please provide a quote for the following request:</p>
      <br>
   
      <table border="1" style="width: 100%">
        <tr>
               <td style="width: 50%;"><p class="center"><strong>Date</strong></p></td>
<!--               <td style="width: 50%;"><p class="center"><strong>--><?php //echo $quote->maxpax;?><!--</strong></p></td>-->
               <td style="width: 50%;"><p class="center"><strong><?php echo $quote->maxpax;?></strong></p></td>
            </tr>
            <tr>
               <td style="width: 50%;"><p class="center"><strong>Royal Terminal</strong></p></td>
               <td style="width: 50%;"><p class="center"><strong><?php echo $quote->royal_terminal;?></strong></p></td>

            </tr>
      </table>
      
            
        
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
            $departure_date=array();
                  $depart_dates=$quote->departure_date;
                  if(strlen($depart_dates)>0)
                  {
                    $departure_date=unserialize($depart_dates);
                  }


                     ?>
      <?php 
                      
                     if(count($departure_address)>=1 || count($arrival_address)>=1):
                        $addresses=array();
                        $address['depart']=$departure_address;
                        $address['arrive']=$arrival_address;
                        $depart_num=count($departure_address);
                        $arrive_num=count($arrival_address);
                        $max=($depart_num>$arrive_num?$depart_num:$arrive_num);
                        $depart_count=20;
                        $arival_count=30;

                        ?>
      
      <table border="1" style="width: 100%">
         <thead>
            <tr>
               <td style="width: 50%;"><p class="center"><strong>Departure Airport</strong></p></td>
               <td style="width: 50%;"><p class="center"><strong>Arrival Airport</strong></p></td>
        



            </tr>
         </thead>
         <tbody>
            <?php for($i=0;$i<$max;$i++){
                if(isset($departure_date[$i]))
                {
                  if(strlen($departure_date[$i])>0)
                  {
                    $date = new DateTime($departure_date[$i]);
                  $d= $date->format('h:i A');
                  } // 31.07.2012
                  else
                  {
                    $d='';
                  }
                }
                else
                {
                  $d='-';
                }
            ?>
            <tr>
               <td><p class="center"><?php echo(isset($address['depart'][$i])?$address['depart'][$i]:'')?></p><br>
                  <p class="center"><strong>ETD:</strong> <?php echo $d;?></p>
               </td>
               <td><p class="center"><?php echo(isset($address['arrive'][$i])?$address['arrive'][$i]:'')?></p></td>
             
               


            </tr>
         <?php }?>
         </tbody>
         
      </table>
   <?php endif;?>
 
<br>
<p>Your prompt response in this regard his highly appreciated.</p>
<br>
<p>Thank you.</p>
     
    
      
     

      

      
   </div>

   <p class="footer">All Rights Reserved. <strong>@ Tam Aviation</strong>.</p>
</div>

</body>
</html>
