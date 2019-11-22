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
         <div class="col-md-6 col-xs-12 col-sm-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <h4 class="title">Add New Relation</h4>
                  <p class="category"></p>
               </div>
               <div class="card-content">
                  <form method="post" class="add_relation">
                     <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Relation <span class="imp">*</span></label>
                              <input type="text" class="form-control" name="relation" value="" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        
                     </div>
                    
                     <div class="clearfix"></div>
                     <?php  $flag=check_cap('create');
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
                  <span class="reply"></span>
               </div>
            </div>
         </div>
         
      </div>
      <div class="col-md-6">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">All Relations</h4>
                  </div>
                  <div class="col-md-4"></div>
                  &nbsp;
                  
               </div>
              
               <div class="card-content table-responsive relation-add-ajax">
                  
                 <?php get_relation_table();?>
               </div>
              
            </div>
         </div>
   </div>
</div>