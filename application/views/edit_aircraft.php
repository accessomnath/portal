<style>
   
</style>
<div class="content">
<!-- Default Class-->
<div class="container-fluid">
   <!-- Bootstrap Class-->
   <!-- page Starts Here -->
   <div class="row">
      <div class="col-md-8">
      </div>
   </div>
   <!--Starts Here-->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header" data-background-color="purple">
               <h4 class="title">Edit Details for <?php echo $aircraft->ArName;?></h4>
               <?php $get_operator=get_operator($aircraft->operator_id);
                  $unique=($get_operator->id<10?'000'.$get_operator->id:'00'.$get_operator->id);
                  ?>
               <p class="category">For Operator <b><?php echo $get_operator->name;?></b></p>
               <p class="category">Operator ID <?php echo $unique;?> --<a href="<?php echo site_url('edit_operator/index/'.$get_operator->id)?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i>Visit Profile</a></p>
            </div>
            <div class="card-content">
               <form method="post" enctype="multipart/form-data" action="<?php echo site_url('edit_aircraft/update_aircraft')?>" class="edit_aircraft">
                  <input type="hidden" name="id" value="<?php echo $aircraft->id;?>">
                  <input type="hidden" name="operator_id" value="<?php echo $aircraft->operator_id;?>">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group label-floating">
                           <label class="control-label">Aircraft Type </label>
                           <input type="text" class="form-control aircraft_type" name="ArName" value="<?php echo $aircraft->ArName;?>" autocomplete="off" required>
                           <ul class="aircraft-type-list lists_of_aircraft" style="display: none;">
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating">
                           <label class="control-label">Registration Number</label>
                           <input type="text" class="form-control" name="r_number" value="<?php echo $aircraft->r_number;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating">
                           <label class="control-label">Range</label>
                           <input type="text" class="form-control" name="a_range" value="<?php echo $aircraft->a_range;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating">
                           <label class="control-label">Max Pax </label>
                           <input type="text" class="form-control" name="ArmaxPax" value="<?php echo $aircraft->ArmaxPax;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating">
                           <label class="control-label">YOM</label>
                           <input type="text" class="form-control" name="yom" value="<?php echo $aircraft->yom;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-2">
                        <div class="form-group label-floating">
                           <label class="control-label">Refurb Date</label>
                           <input type="text" class="form-control" name="refurb" value="<?php echo $aircraft->refurb;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <?php $smoking=$aircraft->smoking;
                           if(strlen($smoking)<1)
                           {
                               $smoking="No";
                           }
                           ?>
                        <div class="form-group label-floating">
                           <label class="control-label">Smoking</label>
                           <select class="form-control smoking" name="smoking">
                              <option value="Yes" <?php echo ($smoking=="Yes"?"selected":"");?>>Yes</option>
                              <option value="No" <?php echo ($smoking=="No"?"selected":"");?>>No</option>
                           </select>
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating smoking-charge-container" style="display: none;">
                           <label class="control-label">Smoking Charges</label>
                           <input type="number" name="smoking_charge" class="form-control" value="<?php echo $aircraft->smoking_charge;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating">
                           <label class="control-label">Wifi</label>
                           <select class="form-control wifi-change" name="wifi" value="">
                              <?php $wifi=$aircraft->wifi;
                                    $wifi=(strlen($wifi)<1?"No":$wifi);
                              ?>
                              <option value="Yes" <?php echo ($wifi=="Yes"?"selected":"");?>>Yes</option>
                              <option value="No" <?php echo ($wifi=="No"?"selected":"");?>>No</option>
                           </select>
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating wifi-charge-container" style="display: none;">
                           <label class="control-label">Wifi Charge</label>
                           <input type="number" name="wifi_charge" value="<?php echo $aircraft->wifi_charge;?>" class="form-control wifi_charge">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     
                  </div>
                  <div class="row">
                  <div class="col-md-2">
                        <div class="form-group label-floating">
                           <label class="control-label">Bedroom</label>
                           <select class="form-control full-bedroom-change" name="ArBedroom">
                              <?php $bedroom=$aircraft->ArBedroom;
                                    $bedroom=(strlen($bedroom)<1?"No":$bedroom);
                              ?>
                              <option value="Yes" <?php echo ($bedroom=="Yes"?"selected":"");?>>Yes</option>
                              <option value="No" <?php echo ($bedroom=="No"?"selected":"");?>>No</option>
                           </select>
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating bed-setup-display">
                           <label class="control-label">Bed Setup</label>
                           <select class="form-control ARBedStup" name="ARBedStup" value="">
                              <option value=""></option>
                              <option value="Yes" <?php echo ($aircraft->ARBedStup=="Yes"?"selected":"");?>>Yes</option>
                              <option value="No" <?php echo ($aircraft->ARBedStup=="No"?"selected":"");?>>No</option>
                           </select>
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <div class="form-group label-floating bed-location-display" style="display: none;">
                           <label class="control-label">Bedroom Location</label>
                           <select class="form-control ArBedroomLocation" name="ArBedroomLocation">
                              <option value=""></option>
                              <option value="Front" <?php echo ($aircraft->ArBedroomLocation=="Front"?"selected":"");?>>Front</option>
                              <option value="Middle" <?php echo ($aircraft->ArBedroomLocation=="Middle"?"selected":"");?>>Middle</option>
                              <option value="Back" <?php echo ($aircraft->ArBedroomLocation=="Back"?"selected":"");?>>Back</option>
                           </select>
                           <span class="material-input"></span>
                        </div>
                     </div>
                     
                     <div class="col-md-2">
                        <div class="form-group label-floating ">
                           <label class="control-label">Price Per Hour </label>
                           <input type="number" class="form-control" name="ArPrice" value="<?php echo $aircraft->ArPrice;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group label-floating ">
                           <label class="control-label">OverNight Charges </label>
                           <input type="number" class="form-control" name="ArCharges" value="<?php echo $aircraft->ArCharges;?>">
                           <span class="material-input"></span>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating">
                           <label class="control-label">Aircraft base</label>
                           <input type="text" class="form-control aircraft_base" name="ArBase" id="txtdepart" autocomplete="off" value="<?php echo $aircraft->ArBase;?>">      
                           <ul class="aircraft-base-list lists_of_aircraft" style="display:none;"></ul>
                           <!-- <nav style="display: none;" class="aircraft-base-list">
                              <ul>
                              <?php $aircrat_base_list=aircrat_base_list();
                                 ?>
                                  <?php if($aircrat_base_list!=NULL):?>
                                <?php foreach($aircrat_base_list as $aircraft):?>
                                  <li><a href="#" class="base-detail" data-value='<?php echo $aircraft->id;?>'><?php echo $aircraft->aircraft_base;?></a></li>
                                  <?php endforeach;?>
                                  <?php endif;?>
                              </ul>
                              </nav> -->
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group label-floating is-focused">
                              <div class="add-img-box">
                                 <button class="btn btn-primary">
                                    <span>Aircrart Images</span>
                                    <!--<input type="file" name="userfile[]" class="form-control add-img" multiple>-->
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
                     <?php  $flag=check_cap('edit');
                        if($flag==0):
                            ?>
                     <button type="button" class="btn btn-primary pull-right" id="btn_aircraft" data-toggle="modal" data-target="#ModalAircraft">
                     Update
                     </button>
                     <?php endif;?>
                     <div class="modal fade" id="ModalAircraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
               <span style="color: green;"><?php echo $this->session->flashdata('success').'<br>'.$this->session->flashdata('success_img');?>
               <span style="color: red;"><?php echo $this->session->flashdata('error_msg').'<br>'.$this->session->flashdata('error_msg_img');?>
               <div class="login-ajax"><img src="<?php echo img_url();?>30.gif" alt="loader" class="loader" style="display: none;">
               </div>
               </div>
               <!--Row Close-->
            </div>
         </div>
      </div>
      <?php if($aircraft_images!=NULL):?>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <h4 class="title">Images for Aircraft</h4>
                  <p class="category">For Operator </p>
               </div>
               <div class="card-content">
                  <form action="" class="delete_aircraft_image">
                     <div class="row">
                        <?php foreach($aircraft_images as $image):?>
                        <div class="col-md-1 img_block">
                           <figure>
                              <a href="<?php echo upload_url().$image->image;?>" target="_blank"><img src="<?php echo upload_url().$image->image;?>" alt="image" style="width: 100%;"></a>
                              <input type="checkbox" class="chkbox" name="id[]" value="<?php echo $image->id;?>"/>
                           </figure>
                        </div>
                        <?php endforeach;?>
                     </div>
                     <button type="submit" class="btn btn-primary pull-right">
                        Delete<i class="fa fa-trash" aria-hidden="true" style="margin-left: 15px;"></i>
                        <div class="ripple-container"></div>
                     </button>
                  </form>
               </div>
            </div>
            <!--Row Close-->
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
         <div class="card">
         <br>
         <br>
         <center><a href="javascript:void(0);" class="reorder_link" id="saveReorder">reorder photos</a></center>
         <br>
          <center><span id="reorderHelper" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.</span></center>        
    
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
       <div class="gallery">
      <ul class="reorder_ul reorder-photos-list">
        <?php
        foreach($aircraft_images as $row){
        ?>
            <li id="image_li_<?php echo $row->id; ?>" class="ui-sortable-handle">
                <a href="javascript:void(0);" style="float:none;" class="image_link">
                    <img src="<?php echo upload_url().$row->image;?>" alt="">
                </a>
            </li>
        <?php } ?>
        </ul>
    </div>
    </div>
    <div class="col-md-1"></div>
    </div>
</div>
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



