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
                  <h4 class="title">Add New Broker</h4>
                  <p class="category">Complete this profile</p>
               </div>
               <div class="card-content">
                  <form method="post" class="add_broker">
                     <div class="row">
                        <div class="col-md-5 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Broker Name <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="name" value="" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Mobile Number <span class="imp">*</span></label>
                              <input type="text" class="form-control number" name="phone" value="" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Passport </label>
                              <input type="text" class="form-control" name="passport" value="" >
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Email <span class="imp">*</span></label>
                              <input type="email" class="form-control" name="email" value="" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        
                        <div class="col-md-3">
                           <div class="form-group label-floating is-empty">
                              <!-- <label class="control-label">Country</label> -->
                              <?php $get_countries=get_countries();?>
                              <select class="form-control country-select" name="country" >
                                  <?php foreach($get_countries as $country):?>
                                  <option value="<?php echo $country['id'];?>" <?php if($country['id']==191):echo"selected";endif;?>><?php echo $country['name'];?></option>
                                  <?php endforeach;?>
                              </select>
                           </div>
                        </div>
                       <div class="col-md-3">
                           <div class="form-group label-floating is-empty">
                            <select class="form-control city-select city" name="city">
                                 
                            </select>
                             
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <label class="control-label">Broker Relation in Percentage <span class="imp">*</span></label>
                              <input type="number" class="form-control" name="relation" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                    
                     <div class="clearfix"></div>
                     <?php  $flag=check_cap('create');
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
      <!--Form Close-->
      <!-- page Ends Here -->
   </div>
   <!--Container-fluid Ends-->
</div>