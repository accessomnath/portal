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
                  <h4 class="title">Edit Operator Profile Profile</h4>
                  <p class="category">Complete this profile</p>
               </div>
               <div class="card-content">
                  <form method="post" id="form" class="edit-operator">
                     <div class="row">
                        <div class="col-md-2">
                           <div class="form-group label-floating">
                              <label class="control-label">Operator Id</label>
                              <input type="text" class="form-control" name="id" value="000<?php echo $operator->id;?>" readonly="readonly">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <div class="form-group label-floating">
                              <label class="control-label">Full Name <span class="imp"> *</span></label>
                              <input type="text" class="form-control" name="name" readonly="" value="<?php echo $operator->name;?>">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <label class="control-label">Mobile number <span class="imp">*</span></label>
                              <input type="text" class="form-control number" name="phone" value="<?php echo $operator->phone;?>">
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <label class="control-label">E-mail Address <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="email" value="<?php echo $operator->email;?>">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group label-floating ">
                              <label class="control-label">Adress</label>
                              <input type="text" class="form-control" name="address" value="<?php echo $operator->address;?>">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <?php $get_countries=get_countries();?>
                              <select class="form-control country-select" name="country" >
                                  <?php foreach($get_countries as $country):?>
                                  <option value="<?php echo $country['id'];?>" <?php if($operator->country==$country['id']):echo"selected";endif;?>><?php echo $country['name'];?></option>
                                  <?php endforeach;?>
                              </select>

                              <span class="material-input"></span>
                           </div>
                        </div>
                        
                     </div>
                     
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group label-floating">
                             <input type="hidden" class="city" value="<?php echo $operator->city;?>">
                              <select class="form-control city-select edit-city" name="city">
                                  
                              </select>

                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group label-floating">
                              <label class="control-label">Prefered Contact</label>
                              <select class="form-control" name="prefer_contact" value="E-Mail">
                                 <option <?php if($operator->prefer_contact=="E-Mail"):echo"selected";endif;?>>E-Mail</option>
                                 <option <?php if($operator->prefer_contact=="Call"):echo"selected";endif;?>>Call</option>
                                 <option <?php if($operator->prefer_contact=="Whats App"):echo"selected";endif;?>>Whats App</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group label-floating">
                              <label class="control-label">Relation in Percentage</label>
                              <input type="number" class="form-control" name="relation" value="<?php echo $operator->relation;?>">
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <td><?php  $flag=check_cap('edit');
                            if($flag==0):
                            ?>
                     <button type="button" class="btn btn-primary pull-right" id="History" data-toggle="modal" data-target="#exampleModal">
                     Update
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
                  </form>
                  <div class="login-ajax"><img src="<?php echo img_url();?>30.gif" alt="loader" class="loader" style="display: none;">
               </div>
            </div>
         </div>
      </div>
      <?php if($aircraft_list!=NULL):?>
      <div class="card">
         <div class="card-header" data-background-color="purple">
            <h4 class="title"><?php echo $operator->name;?></h4>
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
            <table class="table table-striped">
               <thead class="text-primary_me">
                  <tr>
                     <th>Aircraft</th>
                     <th>Max Pax</th>
                     <th>Bedroom</th>
                     <th>Base</th>
               		 <th></th>
                  </tr>
               </thead>
               <tbody>
                 <?php foreach($aircraft_list as $aircraft):?>
                  <tr>
                     <td><a href="<?php echo base_url();?>index.php/edit_aircraft/index/<?php echo $aircraft->id;?>"><?php echo $aircraft->ArName;?></a></td>
                     <td><?php echo $aircraft->ArmaxPax;?></td>
                     <td><?php echo $aircraft->ArBedroom;?></td>
                     <td><?php echo $aircraft->ArBase;?></td>
                     <td><a href="#" data-value="<?php echo $aircraft->id;?>" class="delete-aircraft"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  </tr>
                  <?php endforeach;?>
               </tbody>
            </table>
         </div>
      </div>
   <?php endif;?>
      <!-- Page Ends Here -->
   </div>
   <!--Container-fluid Ends-->
</div>