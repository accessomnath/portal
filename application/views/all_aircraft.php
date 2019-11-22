<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">All Aircraft</h4>
                  </div>
                  <div class="col-md-4"></div>
                  <?php if($aircraft_list!=NULL):?>
                  <a href="<?php echo base_url();?>index.php/all_aircraft/aircraft_exel">
                     <button class="btn btn-info">
                        <i class="fa fa-download" aria-hidden="true"></i>Download
                        <div class="ripple-container"></div>
                     </button>
                  </a>
                  <?php endif;?>
               </div>
               <?php if($aircraft_list!=NULL):?>
                
               <!--filter-->
               <div class="card-content table-responsive" id="aircraft-filter-res">
                  <nav aria-label="">
                     <ul class="pagination">
                        <?php foreach ($links as $link) {
                           echo "<li>". $link."</li>";
                           } ?>
                     </ul>
                  </nav>
                  <table class="table table-striped">
                     <thead class="text-dark">
                        <th>Operator name</th>
                        <th>Aircraft Name</th>
                        <th>Registration Number</th>
                        <th>Max Pax</th>
                        <th>Airport Base</th>
                        <th></th>
                     </thead>
                     <tbody>
                        <?php
                        echo count($aircraft_list);
                        foreach($aircraft_list as $aircraft)
                           {
                           ?>
                        <td><?php $operator=get_operator($aircraft->operator_id);
                           echo '<a class="text-dark" href="'.site_url('edit_operator/index/'.$operator->id).'" target="_blank">'.$operator->name.'</a>';
                           ?></td>
                        <td class="text-dark"><?php echo $aircraft->ArName;?></a></td>
                        <td class="text-dark"><?php echo $aircraft->r_number;?></td>
                        <td class="text-dark"><?php echo $aircraft->ArmaxPax;?></td>
                        <td class="text-dark"><?php echo $aircraft->ArBase;?></td>
                        <td><a href="<?php echo base_url();?>index.php/edit_aircraft/index/<?php echo $aircraft->id;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php 
                           }
                           
                           ?>
                     </tbody>
                  </table>
               </div>
               <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</div>