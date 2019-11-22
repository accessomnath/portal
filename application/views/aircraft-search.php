<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
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
      </div>
   </div>
</div>