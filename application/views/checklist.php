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
            <h4 class="title">Initial Request Check List</h4>
            <p class="category">When we Recieve a new Request</p>
         </div>
         <?php if($customers!=NULL):?>
         <div class="card-content">
            <div class="row">
               <div class="col-md-12">
                  <ul class="nav nav-tabs">
                     <li class="active"><a data-toggle="tab" href="#one">One Way</a></li>
                     <li><a data-toggle="tab" href="#return">Return</a></li>
                     <li><a data-toggle="tab" href="#multi">Multi-Leg</a></li>
                  </ul>
               </div>
               <div class="col-md-12">
                  <div class="tab-content">
                     <div id="one" class="tab-pane fade in active">
                     <form method="post" class="add_checklist">
                     <input type="hidden" name="journey_type"  value="oneway">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">From <span class="imp"> *</span></label>
                                 <input type="text" class="form-control" list="list1" id="departure-address113"  onkeyup="getCity(this.value)" name="departure_address[]" value="" autocomplete="off">
                                  <datalist id="list1">
                                      
                                      
                                  </datalist>
                                 <span class="material-input"></span>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">To <span class="imp"> *</span></label>
                                 <input type="text" class="form-control" id="arrival-address" name="arrival_address[]" value="" autocomplete="off">
                                 <ul class="lists_of_aircraft arrival-list" style="display: none;">
                                 </ul>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Estimated Time Of Departure</label>
                                 <div id="picker"> </div>
                                 <input type="hidden" id="result" value="" name="departure_date[]"/>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Flight Duration</label>
                                 <input type="time" class="form-control" name="flight_duration[]" id="">
                              </div>
                              
                           </div>
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
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Full Bedroom</label>
                                 <select class="form-control full-bedroom-change" name="ArBedroom" required>
                                    <option selected value="">Please Select One</option>
                                    <option>No</option>
                                    <option>Yes</option>
                                 </select>
                                 <span class="material-input"></span>
                              </div>
                           </div>
                  
                           <div class="col-md-2">
                              <div class="form-group label-floating bed-setup-display">
                                 <label class="control-label">Bed Setup </label>
                                 <select class="form-control ARBedStup" name="ARBedStup">
                                    <option value=" " selected>Select</option>
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
                              <div class="form-group label-floating is-focused">
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
                              <div class="form-group label-floating is-focused">
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
                        <button type="submit" name="check_button" class="btn btn-primary pull-right submit-checklist" style="display: none;">
                        Process
                        </button>
                        </form>
                        <div class="login-res"></div>

                     </div>
                     <div id="return" class="tab-pane fade">
                     <form method="post" class="add_checklist_return">
                     <input type="hidden" name="journey_type"  value="twoway">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">From <span class="imp"> *</span></label>
                                 <input type="text" class="form-control default-address addarrivefrom"  name="departure_address[]" value="" autocomplete="off">
                                 <ul class="lists_of_aircraft default-listarrivefrom" style="display: none;">
                                 </ul>
                                 <input type="hidden" class="count-num" value="arrivefrom">
                                 <span class="material-input"></span>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">To <span class="imp"> *</span></label>
                                 <input type="text" class="form-control default-address addarriveto" name="arrival_address[]" value="" autocomplete="off">
                                 <ul class="lists_of_aircraft default-listarriveto" style="display: none;">
                                 </ul>
                                 <input type="hidden" class="count-num" value="arriveto">

                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Estimated Time Of Departure</label>
                                 <div id="picker2"> </div>
                                 <input type="hidden" id="result2" value="" name="departure_date[]"/>
                              </div>
                           </div>
                           <div class="col-md-2">
                             <label class="control-label">Date Of Flight</label>
                              <div id="picker3"> </div>
                              <input type="hidden" value="" id="result3" name="arrival_date"/>
                              
                             
                           </div>
                           <div class="col-md-2">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Flight Duration</label>
                                 <input type="time" class="form-control" name="flight_duration[]" id="">
                              </div>
                              
                           </div>
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
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Full Bedroom</label>
                                 <select class="form-control full-bedroom-change" name="ArBedroom" required>
                                    <option selected value="">Please Select One</option>
                                    <option >No</option>
                                    <option>Yes</option>
                                 </select>
                                 <span class="material-input"></span>
                              </div>
                           </div>
                  
                           <div class="col-md-2">
                              <div class="form-group label-floating bed-setup-display">
                                 <label class="control-label">Bed Setup </label>
                                 <select class="form-control ARBedStup" name="ARBedStup">
                                    <option value=" " selected>Select</option>
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
                              <div class="form-group label-floating is-focused">
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
                        <div class="login-ajax-return"></div>
                        <div class="row client-filter-return" style="display: none;">
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Client Name <span class="imp"> *</span></label>
                                 <input type="text" class="form-control cust_name" id="filter2" value="" required autocomplete="off" />
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
                        <button type="button" class="btn btn-primary pull-right search-checklist-return" >
                        Search Aircrafts
                        </button>
                        <button type="submit" name="check_button" class="btn btn-primary pull-right submit-checklist-return" style="display: none;">
                        Process
                        </button>
                        </form>
                        <div class="login-res-return"></div>
                     </div>
                     <div id="multi" class="tab-pane fade">
                        <form method="post" class="add_checklist_multi">
                        <input type="hidden" name="journey_type" value="multi-leg">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">From <span class="imp"> *</span></label>
                                 <input type="text" class="form-control default-address addmultifrom" onkeyup="getCity()" name="departure_address[]" value="" autocomplete="off">
                                 <ul class="lists_of_aircraft default-listmultifrom" style="display: none;">
                                 </ul>
                                 <input type="hidden" class="count-num" value="multifrom">
                                 <span class="material-input"></span>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">To <span class="imp"> *</span></label>
                                 <input type="text" class="form-control default-address addmultito" name="arrival_address[]" value="" autocomplete="off">
                                 <ul class="lists_of_aircraft default-listmultito" style="display: none;">
                                 </ul>
                                 <input type="hidden" class="count-num" value="multito">

                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Estimated Time Of Departure</label>
                                 <div id="picker4"> </div>
                                 <input type="hidden" id="result4" value="" name="departure_date[]"/>
                              </div>
                           </div>
                           
                           <div class="col-md-2">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Flight Duration</label>
                                 <input type="time" class="form-control" name="flight_duration[]" id="">
                              </div>
                              
                           </div>
                           <div class="col-md-2">
                           <input type="button" class="add-multi-city add-check" value="Add City" />
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
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Full Bedroom</label>
                                 <select class="form-control full-bedroom-change" name="ArBedroom" required>
                                    <option selected value="">Please Select One</option>
                                    <option>No</option>
                                    <option>Yes</option>
                                 </select>
                                 <span class="material-input"></span>
                              </div>
                           </div>
                  
                           <div class="col-md-2">
                              <div class="form-group label-floating bed-setup-display">
                                 <label class="control-label">Bed Setup </label>
                                 <select class="form-control ARBedStup" name="ARBedStup">
                                    <option value=" " selected>Select</option>
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
                              <div class="form-group label-floating is-focused">
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
                        <div class="login-ajax-multi"></div>
                        <div class="row client-filter-multi" style="display: none;">
                           <div class="col-md-3">
                              <div class="form-group label-floating is-focused">
                                 <label class="control-label">Client Name <span class="imp"> *</span></label>
                                 <input type="text" class="form-control cust_name" id="filter2" value="" required autocomplete="off" />
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
                        <button type="button" class="btn btn-primary pull-right search-checklist-multi" >
                        Search Aircrafts
                        </button>
                        <button type="submit" name="check_button" class="btn btn-primary pull-right submit-checklist-multi" style="display: none;">
                        Process
                        </button>
                        </form>
                        <div class="login-res-multi"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php else:?>
         <h3>Please Add Customers To Add A Check List</h3>
         <?php endif;?>
      </div>
      
   </div>
</div>
<script>
    
    function getCity(q)
    {
         //$("#list1").empty();
        $.ajax({
        url: 'https://portal.tamprivateaviation.com/index.php/checklist/getCity/',
        data:{q:q},
        dataType: 'json', 
        type: 'post',
        success: function(data) {
            //response = jQuery.parseJSON(data);
            var st='';
            data.forEach(function(v){
                s=v['name']+" "+v['country_name']+" "+v['code'];
                st+="<option  value='"+s+"'>";
                
                
            });
            console.log(st);
            $("#list1").html(st);
             //$(".departure-list").css('display','block');
        }             
    });
        
        
    }
    
</script>
