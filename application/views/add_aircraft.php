<div class="content">
   <!-- Default Class-->
   <div class="container-fluid">
      <!-- Bootstrap Class-->
      <!-- page Starts Here -->
      
      <?php if(count($operator_list)>0):?>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <h4 class="title">Add New Aircraft</h4>
                  <p class="category"></p>
               </div>
               <div class="card-content">
                  <form method="post" enctype="multipart/form-data"  action="<?php echo site_url('add_aircraft/add_new_aircraft');?>">
              <!--        <input type="hidden" name="operator_id" value="<?php echo $operator_id;?>"> -->
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group label-floating ">
                              <label class="control-label"> Aircraft Type <span class="imp">*</span></label>
                              <input type="text" class="form-control aircraft_type" name="ArName" id="jetname" autocomplete="off" required>
                              <ul class="aircraft-type-list lists_of_aircraft" style="display: none;">
                                
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Registration Number <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="r_number" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Range</label>
                              <input type="text" class="form-control" name="a_range">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Max Pax <span class="imp">*</span></label>
                              <input type="number" class="form-control" name="ArmaxPax" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">YOM</label>
                              <input type="text" class="form-control" name="yom">
                              <span class="material-input"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Refurb Date</label>
                              <input type="text" class="form-control" name="refurb">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Smoking</label>
                              <select class="form-control smoking" name="smoking">
                                 <option value="No" selected>No</option>
                                 <option value="Yes">Yes</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating smoking-charge-container" style="display: none;">
                              <label class="control-label">Smoking Charges</label>
                              <input type="number" name="smoking_charge" class="form-control">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Wifi</label>
                              <select class="form-control wifi-change" name="wifi">
                                 <option value="No" selected>No</option>
                                 <option value="Yes">Yes</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating wifi-charge-container" style="display: none;">
                              <label class="control-label">Wifi Charge</label>
                              <input type="number" name="wifi_charge" class="form-control wifi_charge">
                              <span class="material-input"></span>
                           </div>
                        </div>
                       
                        
                        
                     </div>
                     <div class="row">
                      <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Bedroom</label>
                              <select class="form-control full-bedroom-change" name="ArBedroom">
                                 <option value="No" selected>No</option>
                                 <option value="Yes">Yes</option>
                                 
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                     <div class="col-md-2">
                           <div class="form-group label-floating bed-setup-display">
                              <label class="control-label">Bed Setup</label>
                              <select class="form-control ARBedStup" name="ARBedStup">
                                 <option value=""></option>
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating  bed-location-display" style="display: none;">
                              <label class="control-label">Bedroom Location</label>
                              <select class="form-control ArBedroomLocation" name="ArBedroomLocation">
                                 <option value=""></option>
                                 <option value="Front">Front</option>
                                 <option value="Middle">Middle</option>
                                 <option value="Back">Back</option>
                              </select>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group label-floating ">
                              <label class="control-label">Price Per Hour </label>
                              <input type="number" class="form-control" name="ArPrice">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group label-floating ">
                              <label class="control-label">OverNight Charges </label>
                              <input type="number" class="form-control" name="ArCharges">
                              <span class="material-input"></span>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group label-floating ">
                              <label class="control-label">Aircraft base <span class="imp">*</span></label>
                              <input type="text" class="form-control aircraft_base" name="ArBase" id="txtdepart" autocomplete="off" required>
                  				<ul class="aircraft-base-list lists_of_aircraft" style="display: none;"></ul>
                              
                           </div>
                        </div>

                        <div class="col-md-4">
                           <div class="form-group label-floating ">
                              <label class="control-label">Operator <span class="imp">*</span></label>
                              <select class="form-control" name="operator_id">
                                <?php foreach($operator_list as $list):?>
                                  <option value="<?php echo $list->id;?>"><?php echo $list->name;?></option>
                                <?php endforeach;?>
                              </select>
                              
                           </div>
                        </div>
                     </div>
                      <div class="row">
                        <div class="col-md-12">
                           <div class="form-group label-floating is-focused">
                               
                  			  <div class="add-img-box">
                              	
                  			  		<button class="btn btn-primary">
                  							<span>Aircrart Images</span>
                  							<!--<input type="file" name="usefile[]" class="form-control add-img" multiple>-->
                  							 <input type="file" name="userfile[]" multiple="multiple">
                  					</button>
                  				</div>
                              
                           </div>
                        </div>
                    </div>
                     <div class="row">
			              <div class="col-md-12">
			                <div id="img-previews"></div>
			              </div>
			            </div>
                     <button type="button" class="btn btn-primary pull-right" id="btn_aircraft" data-toggle="modal" data-target="#ModalAircraft">
                     Save
                     </button>
                     <div class="modal fade" id="ModalAircraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  </form>
          <span style="color: green;"><?php echo $this->session->flashdata('success').'<br>'.$this->session->flashdata('success_img');?>
          <span style="color: red;"><?php echo $this->session->flashdata('error_msg').'<br>'.$this->session->flashdata('error_msg_img');?>
                  <div class="login-ajax"><img src="<?php echo img_url();?>30.gif" alt="loader" class="loader" style="display: none;">
               </div>
            </div>
            <!--Row Close-->
         </div>
      </div>
    <?php else:?>
      <div class="row">
        <center><h4>Please Add Operators Before Adding Aircraft</h4></center>
      </div>
    <?php endif;?>
   </div>
</div>
<script>
function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    document.getElementById('img-previews').innerHTML = '';
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
        // Only process image files.
        if (!f.type.match('image.*')) {
            continue;
        }
        $('.img-preview-wrapper').removeClass('hidden');
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                // Render thumbnail.
                var figure = document.createElement('figure');
                figure.innerHTML = ['<img class="img-preview" style="width: 10%;" src="', e.target.result,
                    '" title="', escape(theFile.name), '"/>'].join('');
                document.getElementById('img-previews').insertBefore(figure, null);
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
}


$("input[type=file]").bind('change', handleFileSelect);
</script> 