<style>
  .highlight{
            font-weight:bold;
            color:green;
}
</style>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">Quotations</h4>
                  </div>
                  <div class="col-md-4"></div>
                  <a href="<?php echo base_url();?>index.php/checklist"><button class="btn btn-info"><i class="material-icons">add_circle_outline</i>Issue New</button></a>
<?php if($quote_list!=NULL):?>
<a href="<?php echo base_url();?>index.php/quote/quote_exel"><button class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Download</button></a>
<?php endif;?>
               </div>
               <?php if($quote_list!=NULL):?>
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
                           <th>Booking Number</th>
                           <th>Client ID</th>
                           <th>Full Name</th>
                           <th>Departure Airport</th>
                           <th>Arrival Airport</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($quote_list as $quote):?>
                        <tr>
                           <td> <a href="<?php echo base_url();?>index.php/edit_quote/index/<?php echo $quote->id;?>">00000<?php echo $quote->id;?></a></td>
                           <td>0<?php echo $quote->customer_id;?></td>
                           <td>
                            <?php $customer=get_customer($quote->customer_id);?>
                           <?php echo $customer->name;?> </td>
                           <td><?php $departure= $quote->departure_address;
                                    if(strlen($departure)>0):
                                      $departure_address=unserialize($departure);
                                      echo $add=implode(',', $departure_address);
                                    endif;
                           ?></td>
                           <td><?php $arrive= $quote->arrival_address;
                                      if(strlen($arrive)>0):
                                      $arrival_address=unserialize($arrive);
                                      echo $add2=implode(',', $arrival_address);
                                    endif;
                           ?></td>
                           <td>

                            <a href="#" class="mail-quote" data-value="<?php echo $quote->id;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            <?php  $flag=check_cap('delete');
                            if($flag==0):
                            ?>
                            <a href="#" data-value="<?php echo $quote->id;?>" class="delete-quote"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <?php endif;?>
                          </td>
                        </tr>
                        <?php endforeach;?>
                     </tbody>
                  </table>
                  
               </div>
           <?php else:?>
            <h3>Sorry No Quatations Found...</h3>
           <?php endif; ?>
            </div>
         </div>
         
      </div>
   </div>
</div>
<div class="modal fade" id="mailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <form action="<?php echo site_url('quote/quote_email');?>" method="post" class="--quote-mail-form">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Please Add Recipient Address</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-12 col-xs-12 col-md-12">
                                       <div class="form-group label-floating">
                                          <label class="control-label">Mail ID</label>
                                          <input type="email" class="form-control mail-ids" multiple name="email" required>
                                          <input type="hidden" name="aircarft_id" value="" class="aircarft_id">
                                          </div>
                                          <div id="search"></div>
                                    </div>
                                    
                                    
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                         </form>
                        </div>
                     </div>