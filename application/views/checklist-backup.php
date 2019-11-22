<div class="card-content">
            <form method="post" class="add_checklist">
               <div class="row">
                  <div class="col-md-3">
                     <div class="radio">
                        <label><input type="radio" name="journey_type" id="oneway" value="oneway" onclick="show_hide(1)" checked=""><span class="circle"></span><span class="check"></span>One Way</label>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="radio">
                        <label><input type="radio" name="journey_type" value="twoway" onclick="show_hide(2)"><span class="circle"></span><span class="check"></span>Return</label>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="radio">
                        <label><input type="radio" name="journey_type" onclick="show_hide(3)" value="multi-leg"><span class="circle"></span><span class="check"></span>Multi-Leg</label>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <input type="button" class="add-multi-city" value="Add City" style="display: none;" />
                  </div>
               </div>
               <div class="row" id="Sigle_trip">
                  <div class="col-md-5">

                     <label class="control-label">Estimated Time Of Departure</label>
                     <div id="picker"> </div>
                     <input type="hidden" id="result" value="" name="departure_date"/>
                     
                     
                  </div>
                  <div class="col-md-5">
                    <label class="control-label">Date Of Flight</label>
                     <div id="picker2"> </div>
                     <input type="hidden" id="result2" value="" name="arrival_date"/>
                     
                    
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                        <label class="control-label">From <span class="imp"> *</span></label>
                        <input type="text" class="form-control" id="departure-address"  name="departure_address[]" value="" autocomplete="off">
                        
                        <ul class="lists_of_aircraft departure-list" style="display: none;">
                        </ul>
                        <span class="material-input"></span>
                     </div>
                     </div>
                      <div class="col-md-4">
                        <div class="form-group label-floating ">
                        <label class="control-label">To <span class="imp"> *</span></label>
                        <input type="text" class="form-control" id="arrival-address" name="arrival_address[]" value="" autocomplete="off">
                        <ul class="lists_of_aircraft arrival-list" style="display: none;">
                        </ul>
                     </div> 
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating ">
                        <label class="control-label">Flight Duration</label>
                        <input type="time" class="form-control" name="flight_duration[]" >
                     </div> 
                     </div>
                  </div>
                  
               </div>
               <div class="row multi-trip" >
               </div>
               <div class="row">
                  <div class="col-md-2">
                     <div class="form-group label-floating">
                        <label class="control-label">Direct Flight</label>
                        <select class="form-control" name="DirectFlight">
                           <option>No</option>
                           <option>Yes</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating ">
                        <label class="control-label">Full Bedroom</label>
                        <select class="form-control full-bedroom-change" name="ArBedroom" required>
                           <option selected>No</option>
                           <option>Yes</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  
                  <div class="col-md-2">
                     <div class="form-group label-floating bed-setup-display">
                        <label class="control-label">Bed Setup </label>
                        <select class="form-control ARBedStup" name="ARBedStup">
                           <option value="" disabled default>Select</option>
                           <option>Yes</option>
                           <option>No</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating bed-location-display" style="display: none;">
                        <label class="control-label">Bedroom Location</label>
                        <select class="form-control ArBedroomLocation" name="ArBedroomLocation">
                           <option value="" selected></option>
                           <option>Front</option>
                           <option>Middle</option>
                           <option>Back</option>
                           <option>Any</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group label-floating ">
                        <label class="control-label">Pax Number <span class="imp"> *</span></label>
                        <input type="number" class="form-control" name="maxpax" value="" required>
                        <span class="material-input"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group label-floating">
                        <label class="control-label">Royal Terminal</label>
                        <select class="form-control" name="royal_terminal">
                           <option>Yes</option>
                           <option>No</option>
                        </select>
                        <span class="material-input"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
               </div>
               <div class="login-ajax"></div>
               <div class="row client-filter" style="display: none;">
                  <div class="col-md-3">
                     <div class="form-group label-floating ">
                        <label class="control-label">Client Name <span class="imp"> *</span></label>
                        <input type="text" class="form-control cust_name" id="filter" value="" required autocomplete="off" />
                        <input type="hidden" class="customer_id" name="customer_id" value="" required>
                        <ul class="lists_of_aircraft checklist-client-search" style="display: none;">
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group label-floating is-focused">
                        <label class="control-label">Client ID</label>
                        <input type="text" class="form-control cust_phone"  value="" readonly required>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group label-floating is-focused">
                        <label class="control-label">Client Type</label>
                        <input type="text" name="client_type" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-3 group-listing">
                     
                  </div>
               </div>
               <button type="button" class="btn btn-primary pull-right search-checklist" >
               Search Aircrafts
               </button>
               <?php  $flag=check_cap('create');
                  if($flag==0):
                  ?>
               <button type="button" class="btn btn-primary pull-right submit-checklist" id="next" data-toggle="modal" data-target="#exampleModal" name="check_button" style="display: none;">
               Process
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
               <div class="clearfix"></div>
               <input type="hidden" name="booking_by" value="admin">
            </form>
            <div class="login-res">
               <img src="<?php echo img_url();?>30.gif" alt="loader" class="loader" style="display: none;">
               <?php else:?>
               <h3>Please Add Customers To Add A Check List</h3>
               <?php endif;?>
            </div>
         </div>