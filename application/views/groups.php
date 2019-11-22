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
                  <h4 class="title">All Groups</h4>
                  <p class="category"></p>
               </div>
               <div class="card-content">
                  <form method="post" class="create_group2">
                     <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-12">
                           <div class="form-group label-floating is-empty">
                              <label class="control-label">Add Group Name <span class="imp">*</span></label>
                              <input type="text" class="form-control group_name" name="group_name" value="" required>
                              <span class="material-input"></span>
                           </div>
                        </div>
                        
                     </div>
                    
                     <div class="clearfix"></div>
                     <?php  $flag=check_cap('create');
                            if($flag==0):
                            ?>
                     <button type="submit" > Create New Group </button>
                  <?php endif;?>
                    
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
              
               <div class="card-content table-responsive group_ajax_res">
                  
                 <?php get_group_table();?>
               </div>
              
            </div>
         </div>
   </div>
</div>