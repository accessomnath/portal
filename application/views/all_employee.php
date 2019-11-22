<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">Employees</h4>
                  </div>
                  <div class="col-md-4"></div>
                  <a href="<?php echo site_url('add_employee');?>"><button class="btn btn-info"><i class="material-icons">add_circle_outline</i>Add</button></a>
<?php if($employee_list!=NULL):?>
 <a href="<?php echo site_url('all_employee/emp_exel');?>"><button class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Download</button></a>
<?php endif;?>
               </div>
               <?php if($employee_list!=NULL):?>
               <div class="card-content table-responsive">
                <nav aria-label="">
                      <ul class="pagination">
                     <?php foreach ($links as $link) {
                      echo "<li>". $link."</li>";
                      } ?>
                  </ul>
                  </nav>
                  <table class="table table-striped">
                     <thead class="text-primary_me">
                        <tr>
                           <th>Employee ID</th>
                           <th>Employee Name</th>
                           <th>Employee Number</th>
                           <th>Email</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($employee_list as $list):?>
                        <tr></tr>
                        <tr>
                           <td>000<?php echo $list->id;?></td>
                           <td><a href="<?php echo site_url('edit_employee/index/'.$list->id);?>"><?php echo $list->display_name;?></a></td>
                           <?php $emp=get_employee_meta($list->id);?>
                           <td> <a href="tel:<?php echo $emp->phone;?>" target="_blank"><?php echo $emp->phone;?></a></td>
                           <td> <a href="mailto:<?php echo $list->email;?>" target="_blank"><?php echo $list->email;?></a></td>
                           <td><?php  $flag=check_cap('delete');
                            if($flag==0):
                            ?>
                              <a href="#" data-value="<?php echo $list->id;?>" class="delete-employee"><i class="fa fa-trash" aria-hidden="true"></i></a>
                           <?php endif;?></td>
                        </tr>
                        <tr></tr>
                        <?php endforeach;?>
                     </tbody>
                  </table>
                 
               </div>
               <?php endif;?>
            </div>
         </div>
      </div>
   </div>
</div>