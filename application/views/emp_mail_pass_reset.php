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
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Employee Password Reset Tam Private Aviations</title>
   </head>
   <body>
      <!-- <?php print_r($quote);?> -->
      <div id="container">
         <h1 class="center">Employee Password Reset Tam Private Aviations </h1>
         <h4 class="center">Your Password was reset Successfully</h4>
         <div id="body">
            <h1 class="center">Welcome <?php echo $emp->display_name;?></h1>
            <p class="center">Please log In Using The Following Data</p>
            <table border="1" style="width: 100%;">
               <thead>
                  <tr>
                     <td style="width: 50%;">
                        <h3 class="center">Username</h3>
                     </td>
                     <td style="width: 50%;">
                        <h3 class="center">Password</h3>
                     </td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>
                        <h3 class="center"><?php echo $emp->email;?></h3>
                     </td>
                     <td>
                        <h3 class="center"><?php echo $pass;?></h3>
                     </td>
                  </tr>
               </tbody>
            </table>
            <p class="footer">Please follow the link below to login <strong><a href="<?php echo base_url();?>" target="_blank">@ Tam Aviation</a></strong>.</p>
         </div>
         <p class="footer">All Rights Reserved. <strong>@ Tam Aviation</strong>.</p>
      </div>
   </body>
</html>