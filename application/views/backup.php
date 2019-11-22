<!--cient row-->
<div class="row">
                        <div class="col-md-6">
                           <div class="form-group label-floating ">
                              <label class="control-label">Client Name <span class="imp"> *</span></label>
                              <input type="text" class="form-control cust_name" id="filter" value="" required autocomplete="off" />
                              <input type="hidden" class="customer_id" name="customer_id" value="" required>
                              
                                  <ul class="lists_of_aircraft checklist-client-search" style="display: none;">
                                    
                                  </ul>
                             
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group label-floating is-focused">
                              <label class="control-label">Client ID</label>
                              <input type="text" class="form-control cust_phone"  value="" readonly required>
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
                     <br>
                     <!--cient row-->

                     <!--filter properties-->
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <label class="control-label">Direct Flight</label>
                              <select class="form-control" name="DirectFlight">
                                 <option>Yes</option>
                                 <option>No</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating ">
                              <label class="control-label">Full Bedroom</label>
                              <select class="form-control full-bedroom-change" name="ArBedroom">
                                 <option></option>
                                 <option>Yes</option>
                                 <option>No</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating ">
                              <label class="control-label">Bedroom Location</label>
                              <select class="form-control" name="ArBedroomLocation">
                                 <option></option>
                                 <option>Front</option>
                                 <option>Middle</option>
                                 <option>Back</option>
                                 <option>Any</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating bed-setup-display" style="display: none;">
                              <label class="control-label">Bed Setup <span class="imp">*</span></label>
                              <select class="form-control ARBedStup" name="ARBedStup">
                                 <option></option>
                                 <option>Yes</option>
                                 <option>No</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <label class="control-label">Royal Terminal</label>
                              <select class="form-control" name="royal_terminal">
                                 <option>Yes</option>
                                 <option>No</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating">
                              <label class="control-label">Estimated Time Of Departure</label>
                              <input id="timepicker2" type="text" class="form-control input-small time" name="etd">
                              <span class="material-input"></span>
                           </div>
                        </div>
                      </div>
                     <!--filter properties-->
