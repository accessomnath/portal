<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-4">
            <div id="clock" class="light">
               <div class="display">
                  <div class="weekdays"></div>
                  <div class="ampm"></div>
                  <div class="alarm"></div>
                  <div class="digits"></div>
               </div>
               <center><h3><?php $now = new DateTime();
                     echo $now->format('d F Y');  ?></h3></center>
            </div>
         </div>
         <div class="col-md-2">
            <div class="card card-stats">
               <div class="card-header" data-background-color="orange">
                  <i class="material-icons">content_copy</i>
               </div>
               <div class="card-content">
                  <p class="category">Last QN</p>
                  <h3 class="title"><?php echo $total_quote;?>
                  </h3>
               </div>
               <div class="card-footer">
                  <div class="stats">
                     <a href="<?php echo site_url('checklist');?>">Create New Request</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="card card-stats">
               <div class="card-header" data-background-color="green">
                  <i class="material-icons">hourglass_empty</i>
               </div>
               <div class="card-content">
                  <p class="category">Empty Leg</p>
                  <h3 class="title">0</h3>
               </div>
               <div class="card-footer">
                  <div class="stats">
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="card card-stats">
               <div class="card-header" data-background-color="red">
                  <i class="material-icons">account_box</i>
               </div>
               <div class="card-content">
                  <p class="category">Operators</p>
                  <h3 class="title"><?php echo $total_operators?></h3>
               </div>
               <div class="card-footer">
                  <div class="stats">
                     <!-- <i class="material-icons">local_offer</i> Tracked from Github -->
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="card card-stats">
               <div class="card-header" data-background-color="blue">
                  <i class="material-icons">flight_takeoff</i>
               </div>
               <div class="card-content">
                  <p class="category">Aircraft</p>
                  <h3 class="title"><?php echo $total_aircraft;?></h3>
               </div>
               <div class="card-footer">
                  <div class="stats">
                     <a href="<?php echo site_url('all_aircraft');?>"><i class="fa fa-eye" aria-hidden="true"></i> View All</a> 
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--custom-search-->
      <div class="row">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">Aircraft Search</h4>
                  </div>
                  <div class="col-md-4"></div>
                  <p>&nbsp;</p>
               </div>
               <form action="" method='post' class="aircraft-filter">
                  <div class="card-content table-responsive">
                     <div class="row">
                        <div class="col-md-2 col-xs-12 col-md-12">
                           <div class="form-group label-floating">
                              <label class="control-label">Max Pax</label>
                              <input type="number" class="form-control" value="" name="ArmaxPax">
                           </div>
                        </div>
                        <div class="col-md-2 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Reg No.</label>
                              <input type="text" class="form-control registrtaion_list_text" value="" name="r_number" autocomplete="off">
                              <ul class="registrtaion_list lists_of_aircraft" style="display: none;"></ul>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Aircraft Type</label>
                              <input type="text" class="form-control" value="" name="ArName" >
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Aircraft Base</label>
                              <input type="text" class="form-control aircraft_base" name="ArBase" id="txtdepart" autocomplete="off">
                              <ul class="aircraft-base-list lists_of_aircraft" style="display: none;"></ul>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3 col-xs-12 col-md-12">
                           <div class="form-group label-floating">
                              <label class="control-label">Bedroom</label>
                              <select class="form-control" name="ArBedroom">
                                 <option value=""></option>
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Wifi</label>
                              <select class="form-control" name="wifi">
                                 <option value=""></option>
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Smoking</label>
                              <select class="form-control" name="smoking">
                                 <option value=""></option>
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-12">
                           <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                     </div>
                  </div>
               </form>
               <!--filter-->
               <div class="card-content table-responsive" id="aircraft-filter-res">
                  <nav aria-label="">
                  </nav>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <?php if($reminder!=NULL):?>
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">Quick Reminder</h4>
                  </div>
                  <div class="col-md-4"></div>
                  <p>&nbsp;</p>
               </div>
               <!--filter-->
               <div class="card-content table-responsive">
                  <table class="table table-striped">
                     <thead class="text-primary">
                        <tr>
                           <th>Quotation ID</th>
                           <th>Document Type</th>
                           <th>Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($reminder as $remind):?>
                        <tr>
                           <td><a data-toggle="tooltip" title="Pending" href="<?php echo site_url('edit_quote/index/'.$remind->quote_id)?>" target="_blank"><i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp; &nbsp;<?php echo ($remind->quote_id<100?'00'.$remind->quote_id:$remind->quote_id);?></a></td>
                           <td class="text-dark"><?php echo ucfirst($remind->type);?></td>
                           <td class="text-dark"><?php echo $remind->sending_date_time;?></td>
                           
                        </tr>
                     <?php endforeach;?>
                     </tbody>
                  </table>
               </div>
            </div>
            <?php endif;?>
         </div>
      </div>
      <!--custom search-->
   </div>
</div>