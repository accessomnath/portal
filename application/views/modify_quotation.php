<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <h4 class="title">Quotation Details For the Booking Number -00000</h4>
                  <p class="category"> </p>
                  <?php echo $this->session->flashdata('mail_msg'); ?>
               </div>
               
               <form action="<?php echo site_url('modify_quotation/update_quotation');?>" method="post" class="modify_quotation">
               <input type="hidden" name="unique_id" value="<?php echo $quote->id;?>">
               <div class="card-content">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="col-md-12">Logo Visibility</div>
                        <div class="col-md-6">
                        <?php $logo_visible=get_meta_data($quote->id,'quote','logo_visible');?>
                           <div class="form-group label-floating">
                              <input type="radio" class="form-control" name="logo_visible" value="Yes" style="height:20px;" <?php echo($logo_visible!=NULL?($logo_visible->meta_value=="Yes"?'checked':''):'checked');?>>Yes
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <input type="radio" class="form-control" name="logo_visible" value="No" style="height:20px;"
                              <?php echo($logo_visible!=NULL?($logo_visible->meta_value=="No"?'checked':''):'checked');?>>No
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="col-md-12">Contact Information Visibility</div>
                        <div class="col-md-6">
                        <?php $contact_visible=get_meta_data($quote->id,'quote','contact_visible');?>
                           <div class="form-group label-floating">
                              <input type="radio" class="form-control" name="contact_visible" value="Yes" checked style="height:20px;" <?php echo($contact_visible!=NULL?($contact_visible->meta_value=="Yes"?'checked':''):'checked');?>>Yes
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group label-floating">
                              <input type="radio" class="form-control" name="contact_visible" value="No" style="height:20px;" <?php echo($contact_visible!=NULL?($contact_visible->meta_value=="No"?'checked':''):'');?>>No
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group label-floating ">
                           <label class="control-label">Contact Number</label>
                           <?php $contact_number=get_meta_data($quote->id,'quote','contact_number');?>
                           <input type="text" class="form-control"  value="<?php echo($contact_number!=NULL?$contact_number->meta_value:'');?>" name="contact_number"/>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                     <?php $top_content=get_meta_data($quote->id,'quote','top_content');?>
                        <label class="control-label">Top Content</label>
                        <textarea class="summernote" name="top_content"><?php echo($top_content!=NULL?$top_content->meta_value:'');?></textarea>
                     </div>
                     <div class="col-md-6">
                        <label class="control-label">Bottom Content</label>
                        <?php $bottom_content=get_meta_data($quote->id,'quote','bottom_content');?>
                        <textarea class="summernote" name="bottom_content"><?php echo($bottom_content!=NULL?$bottom_content->meta_value:'');?></textarea>
                     </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right" >
                  Modify Quotation
                  </button>
                  <div class="login-res">
                     <img src="<?php echo img_url(); ?>30.gif" alt="loader" class="loader" style="display: none;">
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>