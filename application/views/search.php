<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-6">
                     <h4 class="title">Seach Results</h4>
                  </div>
                  <div class="col-md-4"></div>
                  &nbsp;
               </div>
               <?php if($list!=NULL):?>
               <div class="card-content table-responsive">
                  
                  <table class="table">
                     <thead class="text-primary">
                        <tr>
                           <th>Unique ID</th>
                           <th>Name</th>
               <th></th>

                          
                      
                        </tr>
                     </thead>
                     <tbody>
                         <?php foreach($list as $lis):?>
                        <tr>
                           
                           <td><a href="<?php echo $url;?><?php echo $lis->id;?>">000<?php echo $lis->id;?></td>
                           <td class="text-primary">
                           	<?php if($table!="ar" && $table!="qu" && $table!="em"):?>
                           		<?php echo $lis->name;?>
                           		<?php elseif($table=="ar"):?>
                           		<?php echo $lis->ArName;?>	
                           		<?php elseif($table=="qu"):?>
                           			<strong>Date</strong>:<?php echo $lis->departure_date;?><br>
                           			<strong>From: </strong><?php echo $lis->departure_address;?><br>
                           			<strong>To: </strong><?php echo $lis->arrival_address;?>
                                <?php elseif($table=="em"):?>
                                <?php echo $lis->fname." ".$lis->lname;?>
                           	<?php endif;?>
                           	<!-- <a href="<?php echo base_url();?>index.php/edit_customer/index/<?php echo $customer->id;?>"><?php echo $customer->name;?></a> --></td>
                            <td><?php if($table=="op"):?>
                            	<?php  $flag=check_cap('create');
                                                        if($flag==0):
                                                        ?>
                                                    <a href="<?php echo base_url();?>index.php/register_aircraft/index/<?php echo $lis->id;?>"><button class="btn btn-default">Add Aircraft<div class="ripple-container"></div></button></a>
                                                    <?php endif;?>
                                                 <?php endif;?>
                            </td>
                        </tr>
                     <?php endforeach;?> 
                     </tbody>
                  </table>
               </div>
            <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</div>