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
                  <h4 class="title">Edit Employee</h4>
                  <p class="category"></p>
               </div>
               <?php $meta=get_employee_meta($uid);
                  
               ?>
               <div class="card-content">
                  <form method="post" class="edit_user">
                     <div class="row">
                       <input type="hidden" name="id" value="<?php echo $meta->id;?>">
                        <div class="col-md-4 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Employee First Name <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="fname" value="<?php echo $meta->fname;?>" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Employee Last Name <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="lname" value="<?php echo $meta->lname;?>" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Mobile Number <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="phone" value="<?php echo $meta->phone;?>" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Email <span class="imp">*</span></label>
                              <input type="email" class="form-control" name="email" value="<?php echo $meta->email;?>" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        
                        <div class="col-md-4">
                           <div class="form-group label-floating is-focused">

                              <!-- <label class="control-label">Country</label> -->
                              <?php $get_countries=get_countries();?>
                              <select class="form-control country-select" name="country" >
                                  <?php foreach($get_countries as $country):?>
                                  <option value="<?php echo $country['id'];?>" <?php if($country['id']==$meta->country):echo"selected";endif;?>><?php echo $country['name'];?></option>
                                  <?php endforeach;?>
                              </select>
                           </div>
                        </div>
                       <div class="col-md-4">
                           <div class="form-group label-floating is-focused">
                              <input type="hidden" class="city" value="<?php echo $meta->city;?>">
                            <select class="form-control city-select" name="city">
                                 
                            </select>
                             
                           </div>
                        </div>
                        
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <label class="control-label">Address</label>
                              <input type="text" class="form-control" name="address" value="<?php echo $meta->address;?>">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <label class="control-label">Password Regenarate</label>
                           <a href="#" class="regenerate_pass_request"><i class="fa fa-repeat" aria-hidden="true"></i></a>
                           <div class="form-group label-floating is-focused regenerate_pass">
                             
                           </div>
                        </div>
                     </div>
                    
                     
                     <div class="clearfix"></div>
                     <td>
                     <button type="button" class="btn btn-primary pull-right" id="next" data-toggle="modal" data-target="#exampleModal" name="check_button">
                     Save
                     </button>
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
   </div>
</div>