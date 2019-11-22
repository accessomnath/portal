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
               <?php $meta=get_employee_meta($emp_login->id);
                  
               ?>
               <div class="card-content">
                  <form method="post" class="edit_employee">
                     <div class="row">
                       <input type="hidden" name="id" value="<?php echo $emp_login->id;?>">
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
                              <input type="email" class="form-control" name="email" value="<?php echo $emp_login->email;?>" required>
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
                     <?php $roles=get_employee_role($emp_login->id);?>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Edit Capability</label>
                              <input type="checkbox" class="form-control" name="edit_cap" value="0" <?php echo($roles->edit_cap==0?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Delete Capability</label>
                              <input type="checkbox" class="form-control" name="delete_cap" value="0" <?php echo($roles->delete_cap==0?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                         <div class="col-md-3">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Create Capability</label>
                              <input type="checkbox" class="form-control" name="create_cap" value="0" <?php echo($roles->create_cap==0?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <?php 
                     
                     $tabs_list=get_emp_tab($emp_login->id);
                     if($tabs_list!=NULL):$tabs=unserialize($tabs_list->tabs);else:$tabs=array();endif;
                     
                     
                     ?>
                     <div class="row">
                        <div class="col-md-4"><h5>Employee Tabs Access Capabilities</h5></div>
                        <div class="col-md-1">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Check List</label>
                              <input type="checkbox" class="form-control" name="tabs[]" value="checklist|quote|edit_quote" <?php echo(in_array('checklist|quote|edit_quote',$tabs)?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Operator list</label>
                              <input type="checkbox" class="form-control" name="tabs[]" value="operator_list|add_operator|edit_operator|register_aircraft|edit_aircraft" <?php echo(in_array('operator_list|add_operator|edit_operator|register_aircraft|edit_aircraft',$tabs)?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                         <div class="col-md-1">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Employee List</label>
                              <input type="checkbox" class="form-control" name="tabs[]" value="all_employee|add_employee|edit_employee" <?php echo(in_array('all_employee|add_employee|edit_employee',$tabs)?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Broker List</label>
                              <input type="checkbox" class="form-control" name="tabs[]" value="all_brokers|add_broker|edit_broker" <?php echo(in_array('all_brokers|add_broker|edit_broker',$tabs)?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Customer</label>
                              <input type="checkbox" class="form-control" name="tabs[]" value="all_customers|add_customer|edit_customer" <?php echo(in_array('all_customers|add_customer|edit_customer',$tabs)?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>
                        </div>
                     <div class="col-md-1">
                           <!--<div class="form-group label-floating is-focused">
                              <label class="control-label">Aircraft Base</label>
                              <input type="checkbox" class="form-control" name="tabs[]" value="aircraft_base|add_base|edit_base" <?php echo(in_array('aircraft_base|add_base|edit_base',$tabs)?"checked":"");?>>
                              <span class="material-input"></span>
                           </div>-->
                        </div>
                        
                        <!-- <div class="col-md-1">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Invoice</label>
                              <input type="checkbox" class="form-control" name="create_cap" value="0" >
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-1">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Locations</label>
                              <input type="checkbox" class="form-control" name="create_cap" value="0" >
                              <span class="material-input"></span>
                           </div>
                        </div> -->
                     </div>
                     <div class="clearfix"></div>
                     <td><?php  $flag=check_cap('edit');
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
   </div>
</div>