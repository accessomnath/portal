<div class="content">
   <!-- Default Class-->
   <div class="container-fluid">
      <!-- Bootstrap Class-->
      <!-- page Starts Here -->
      <style>#btn_aircraft {display:none;}</style>
      <div class="row">
         <div class="col-md-8">
         </div>
      </div>
      <div class="row" id="opform">
         <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <h4 class="title">Edit <?php echo $broker->name;?></h4>
                  <p class="category">Complete this profile</p>
               </div>
               <div class="card-content">
                  <form method="post" class="edit_broker">
                     <div class="row">
                        <input type="hidden" name="id" value="<?php echo $broker->id;?>">
                        <div class="col-md-5 col-xs-12 col-sm-12">
                           <div class="form-group label-floating ">

                              <label class="control-label">Broker Name <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="name" value="<?php echo $broker->name;?>" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating ">
                              <label class="control-label">Mobile Number <span class="imp">*</span></label>
                              <input type="text" class="form-control number" name="phone" value="<?php echo $broker->phone;?>" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating ">
                              <label class="control-label">Passport </label>
                              <input type="text" class="form-control" name="passport" value="<?php echo $broker->passport;?>" >
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group label-floating ">
                              <label class="control-label">Email <span class="imp">*</span></label>
                              <input type="email" class="form-control" name="email" value="<?php echo $broker->email;?>" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        
                        <div class="col-md-3">
                           <div class="form-group label-floating ">
                              <label class="control-label">Country</label>
                              <?php $get_countries=get_countries();?>
                              <select class="form-control country-select" name="country" >
                                  <?php foreach($get_countries as $country):?>
                                  <option value="<?php echo $country['id'];?>" <?php if($country['id']==$broker->country):echo"selected";endif;?>><?php echo $country['name'];?></option>
                                  <?php endforeach;?>
                              </select>
                           </div>
                        </div>
                       <div class="col-md-3">
                           <div class="form-group label-floating ">
                              <input type="hidden" class="city" value="<?php echo $broker->city;?>">
                            <select class="form-control city-select city" >
                                 
                            </select>
                             
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <label class="control-label">Broker Relation in Percentage <span class="imp">*</span></label>
                              <input type="number" class="form-control" name="relation" required value="<?php echo $broker->relation;?>">
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                    
                     <div class="clearfix"></div>
                     <?php  $flag=check_cap('edit');
                            if($flag==0):
                            ?>
                     <button type="button" class="btn btn-primary pull-right" id="next" data-toggle="modal" data-target="#exampleModal" name="check_button">
                     Save
                     </button>
                  <?php endif;?>
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                            
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Are You Sure</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 Select the Desired Action
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                         
                           </div>
                        </div>
                     </div>
                  </form>
                  <div class="login-ajax"><img src="<?php echo img_url();?>30.gif" alt="loader" class="loader" style="display: none;">
               </div>
            </div>
         </div>
      </div>

      <?php if($customer_list!=NULL):?>
         <div class="card">
         <div class="card-header" data-background-color="purple">
            <h4 class="title"><?php echo $broker->name;?> Customer List</h4>
            <p class="category"></p>
         </div>
               <div class="card-content table-responsive">
                  <nav aria-label="">
                      <ul class="pagination">
                     <?php foreach ($links as $link) {
                      echo "<li>". $link."</li>";
                      } ?>
                  </ul> 
                  </nav>
                  <table class="table">
                     <thead class="text-primary">
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
                           <?php $id=$customer->customer;
                                 $cust=get_customer($id);
                                 $id=($id<10?'000'.$id:'00'.$id);

                           ?>
                           <td><?php echo $id;?></td>
                           <td class="text-primary"><a href="<?php echo base_url();?>index.php/edit_customer/index/<?php echo $cust->id;?>"><?php echo $cust->name;?></a></td>
                           <td class="text-primary"><a href="tel:<?php echo $cust->phone;?>" target="_blank"><?php echo $cust->phone;?></a></td>
                           <td class="text-primary"><a href="mailto:<?php echo $cust->email;?>" target="_blank"><?php echo $cust->email;?></a></td>
                         
                           <td>
                              <a href="<?php echo base_url();?>index.php/quote/index/<?php echo $cust->id;?>" data-page="<?php echo $page?>"><button class="btn btn-default">Histroy<div class="ripple-container"></div></button></a>
                           </td>
                        </tr>
                     <?php endforeach;?> 
                     </tbody>
                  </table>
               </div>
            </div>
            <?php endif;?>
   </div>
   <!--Container-fluid Ends-->
</div>