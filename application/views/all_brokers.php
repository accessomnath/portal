<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">Brokers</h4>
                  </div>
                  <div class="col-md-4"></div>
                  <a href="<?php echo base_url();?>index.php/add_broker">
                     <button class="btn btn-info">
                        <i class="material-icons">add_circle_outline</i>Add
                        <div class="ripple-container"></div>
                     </button>
                  </a>
					<?php if($broker_list!=NULL):?>
					<a href="<?php echo base_url();?>index.php/all_brokers/broker_exel">
                     <button class="btn btn-info">
                       <i class="fa fa-download" aria-hidden="true"></i>Download
                        <div class="ripple-container"></div>
                     </button>
                  </a>
                    <?php endif;?>
               </div>
               <?php if($broker_list!=NULL):?>
               <div class="card-content table-responsive">
                  <nav aria-label="">
                      <ul class="pagination">
                     <?php foreach ($links as $link) {
                      echo "<li>". $link."</li>";
                      } ?>
                  </ul>
                  </nav>
                  <table class="table table-striped">
                     <thead class="text-primary">
                        <tr>
                     	   <th>Unique ID</th>
                           <th>Operator Name</th>
                           <th>Mobile Number</th>
                           <th>Email</th>
                           <th></th>
                      
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($broker_list as $broker):?>
                        <tr>
                        <?php $unique=($broker->id<10?'000'.$broker->id:'00'.$broker->id);?>
                           <td class="text-primary"><a href="<?php echo base_url();?>index.php/edit_broker/index/<?php echo $broker->id;?>"><?php echo $unique;?></a></td>
                           <td class="text-primary"><a href="<?php echo base_url();?>index.php/edit_broker/index/<?php echo $broker->id;?>"><?php echo $broker->name;?></a></td>
                           <td class="text-primary"><a href="tel:<?php echo $broker->phone;?>" target="_blank"><?php echo $broker->phone;?></a></td>
                           <td class="text-primary"><a href="mailto:<?php echo $broker->email;?>" target="_blank"><?php echo $broker->email;?></a></td>
                           <td>
                              <?php  $flag=check_cap('delete');
                            if($flag==0):
                            ?>
                              <a href="#" data-value="<?php echo $broker->id;?>" class="delete-broker"><i class="fa fa-trash" aria-hidden="true"></i></a>
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