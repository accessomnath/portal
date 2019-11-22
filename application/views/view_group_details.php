<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                  <?php $group_detail=get_group($group);?>
                     <h4 class="title"><?php echo $group_detail;?> Group Members</h4>
                  </div>
                  <div class="col-md-4"></div>
                  &nbsp;
               </div>
               
                
               <?php if($customers!=NULL):?>
               <div class="card-content table-responsive" id="aircraft-filter-res">
                  
                  <table class="table table-striped">
                     <thead class="text-dark">
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th></th>
                     </thead>
                     <tbody>
                        <?php
                        foreach ($customers as  $cust) {?>
                        <tr>
                        <?php $get_customer=get_customer($cust->customer_id);?>
                        <td><?php echo ($cust->customer_id<10?'00'.$cust->customer_id.'.':$cust->customer_id.'.');?></td>
                        <td><?php echo $get_customer->name;?></td>
                        <td><a href="<?php echo site_url('edit_customer/index/'.$cust->customer_id)?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>

                        </tr>
                        <?php }?>
                     </tbody>
                  </table>
               </div>
            <?php endif;?>
              
            </div>
         </div>
      </div>
   </div>
</div>