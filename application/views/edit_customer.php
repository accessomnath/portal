<div class="content">
<!-- Default Class-->
<div class="container-fluid">
   <!-- Bootstrap Class-->
   <!-- page Starts Here -->
   <div class="row">
      <div class="col-md-8">
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header" data-background-color="purple">
               <h4 class="title">Edit <?php echo $customer->name;?></h4>
               <p class="category"></p>
            </div>
            <div class="card-content">
               <form method="post" id="form" class="edit_customer">
                  <div class="row">
                     <div class="col-md-5">
                        <input type="hidden" name="id" value="<?php echo $customer->id;?>">
                        <div class="form-group label-floating ">
                           <label class="control-label">Full Name <span class="imp"> *</span></label>
                           <input type="text" class="form-control" name="name" value="<?php echo $customer->name;?>" required>
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group label-floating ">
                           <label class="control-label">Mobile number </label>
                           <input type="text" class="form-control number" name="phone" value="<?php echo $customer->phone;?>" >
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group label-floating ">
                           <label class="control-label">Nationality</label>
                           <input type="text" class="form-control" name="nationality" value="<?php echo $customer->nationality;?>" >
                           <span class="material-input"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group label-floating ">
                           <label class="control-label">E-mail Address </label>
                           <input type="text" class="form-control" name="email" value="<?php echo $customer->email;?>" >
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group label-floating ">
                           <label class="control-label">Adress</label>
                           <input type="text" class="form-control" name="address" value="<?php echo $customer->address;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group label-floating ">
                           <label class="control-label">Country</label>
                           <?php $get_countries=get_countries();?>
                           <select class="form-control country-select" name="country" >
                              <?php foreach($get_countries as $country):?>
                              <option value="<?php echo $country['id'];?>" <?php if($country['id']==$customer->country):echo"selected";endif;?>><?php echo $country['name'];?></option>
                              <?php endforeach;?>
                           </select>
                           <span class="material-input"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group label-floating city-float is-focused">
                           <label class="control-label">City</label>
                           <select class="form-control city-select city" name="city">
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Postal Code</label>
                           <input type="text" class="form-control" name="postalcode" value="<?php echo $customer->postalcode;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Favourite Color</label>
                           <input type="text" class="form-control" name="fcolor" value="<?php echo $customer->fcolor;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                  </div>
                  <!-- <hr class="golden"> -->
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Client Nature</label>
                           <input type="text" class="form-control" name="cnature" value="<?php echo $customer->cnature;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Reference</label>
                           <input type="text" class="form-control" name="reference" value="<?php echo $customer->postalcode;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Preferred Aircraft</label>
                           <input type="text" class="form-control" name="prefered_aircraft" value="<?php echo $customer->prefered_aircraft;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Broker Name if any</label>
                           <?php $relation=relation($customer->id);
                              if($relation!=NULL)
                              {
                                  $broker_array=array();
                                  foreach ($relation as  $value) {
                                     array_push($broker_array, $value->broker);
                                  }
                              }
                              else
                              {
                                  $broker_array=array();
                              }
                              
                              ?>
                           <select  id="dates-field2" class="multiselect-ui form-control" name="broker[]" multiple>
                              <option value="0" <?php if(in_array(0, $broker_array)):echo"selected";endif;?>>None</option>
                              <?php if($brokers!=NULL):
                                 foreach($brokers as $broker):
                                 ?>
                              <option value="<?php echo $broker->id;?>" <?php if(in_array($broker->id, $broker_array)):echo"selected";endif;?>><?php echo $broker->name;?></option>
                              <?php 
                                 endforeach;
                                 endif;?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Date of Birth</label>
                           <input type="text" class="form-control" name="dob" value="<?php echo $customer->dob;?>" id="datepicker" readonly>
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Passport</label>
                           <input type="text" class="form-control" name="passport" value="<?php echo $customer->passport;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                  </div>
                  <?php  $flag=check_cap('edit');
                     if($flag==0):
                     ?>
                  <button type="button" class="btn btn-primary pull-right" id="next" data-toggle="modal" data-target="#exampleModal" name="check_button">
                     Save
                     <div class="ripple-container"></div>
                  </button>
                  <?php endif;?>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Aye You Sure</h5>
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
                  <!-- Modal -->
                  <div class="clearfix"></div>
               </form>
               <div class="login-ajax"><img src="<?php echo img_url();?>30.gif" alt="loader" class="loader" style="display: none;">
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <h4 class="title">Edit <?php echo $customer->name;?> Group</h4>
                  <?php $get_relationship=get_relationship($customer->id);
                        $get_group='';
                        $relation='';
                        if($get_relationship!=NULL):
                            $get_group=get_group($get_relationship->group_name);
                            $relation=get_relation_one($get_relationship->relation);
                  ?>    

                  <p class="category"><a href="<?php echo site_url('view_group_details/index/'.$get_relationship->group_name)?>"><i class="fa fa-link" aria-hidden="true"></i>View <?php echo $get_group;?> Group Members</a></p>
              <?php endif;?>
               </div>
               <div class="card-content">
                  <form method="post" id="form" class="create_group">
                  <b>Select From the bottom list or Create One Now If not available</b>
                     <div class="row">
                        <div class="col-md-7">
                           
                           <div class="form-group label-floating ">
                              <label class="control-label">Group Name </label>
                              <input type="text" name="group_name" class="form-control" required>
                              <span class="material-input"></span><span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="form-group label-floating">
                              <button type="submit" class="btn btn-primary pull-right" >Create Group</button>
                           </div>
                        </div>
                     </div>

                    </form>
                    <div class="row ">
                    <?php
                    $get_relation=get_relation();
                     if($get_relation!=NULL):?>
                     <form action="" method="post" class="update_customer_group">
                 <?php endif;?>
                    <div class="col-md-6">
                    <label><?php echo(strlen($get_group)>0?'(Group: '.$get_group.')':'');?></label>
                        <div class="form-group group_ajax_res">
                            <?php group_list();?>
                        </div>
                     </div>
                     
                     <?php if($get_relation!=NULL):?>
                        <input type="hidden" name="customer_id" value="<?php echo $customer->id;?>">
                        <div class="col-md-6">
                        <label><?php echo(strlen($relation)>0?'(Relation: '.$relation.')':'');?></label>
                        <div class="form-group">
                        <select name="relation" class="form-control">
                            <?php foreach($get_relation as $relation):?>
                                <option value="<?php echo $relation->id?>"><?php echo $relation->relation;?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                     </div>
                        <div class="col-md-6">
                        <div class="form-group">
                           <input type="submit" value="Update Customer Groups" class="btn btn-primary">
                        </div>
                     </div>
                     </form>
                 <?php endif;?>
                 <span class="reply"></span>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
         <!-- page Ends Here -->
      </div>
   </div>
   <!--Container-fluid Ends-->
</div>
<script>
   $("#datepicker").datepicker({  
       maxDate: new Date() ,
       changeMonth: true,
       changeYear: true,
       yearRange: "-100:+0",
   });
</script>