<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">Customers</h4>
                  </div>
                  <div class="col-md-4"></div>
                  <a href="<?php echo base_url();?>index.php/add_customer">
                     <button class="btn btn-info">
                        <i class="material-icons">add_circle_outline</i>Add
                        <div class="ripple-container"></div>
                     </button>
                  </a>
<?php if($customer_list!=NULL):?>
					<a href="<?php echo base_url();?>index.php/all_customers/customer_exel">
                     <button class="btn btn-info">
                       <i class="fa fa-download" aria-hidden="true"></i>Download
                        <div class="ripple-container"></div>
                     </button>
                  </a>
<?php endif;?>
               </div>
               <?php if($customer_list!=NULL):?>
               <div class="card-content table-responsive">
                  <nav aria-label="">
                      <ul class="pagination">
                     <?php foreach ($links as $link) {
                      echo "<li>". $link."</li>";
                      } ?>
                  </ul> 
                  </nav>
                  <table class="table table-striped">
                     <thead class="text-dark">
                        <tr>
                           <th>Client Number</th>
                           <th>Full Name</th>
                           <th>Mobile Number</th>
                           <th>Email</th>
                           <th></th>

                        </tr>
                     </thead>
                     <tbody>
                         <?php foreach($customer_list as $customer):?>
                        <tr>
                           <?php $id=$customer->id;
                                 if($id<10):$id='0'.$id;endif;
                           ?>
                           <td><?php echo $id;?></td>
                           <td class="text-dark"><a class="text-dark" href="<?php echo base_url();?>index.php/edit_customer/index/<?php echo $customer->id;?>"><?php echo $customer->name;?></a></td>
                           <td class="text-dark"><a class="text-dark" href="tel:<?php echo $customer->phone;?>" target="_blank"><?php echo $customer->phone;?></a></td>
                           <td class="text-dark"><a class="text-dark" href="mailto:<?php echo $customer->email;?>" target="_blank"><?php echo $customer->email;?></a></td>
                         
                           <td>
                              <a  href="<?php echo base_url();?>index.php/quote/index/<?php echo $customer->id;?>"><button class="btn btn-default">Histroy<div class="ripple-container"></div></button></a>
                              <?php  $flag=check_cap('delete');
                            if($flag==0):
                            ?>
                              <a  href="#" data-value="<?php echo $customer->id;?>" class="delete-customer"><i class="fa fa-trash" aria-hidden="true"></i></a>
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