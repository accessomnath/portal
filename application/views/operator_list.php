<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <div class="col-md-8"><h4 class="title">Operators</h4></div>
                                    <div class="col-md-4"></div>
                                    <a href="<?php echo base_url();?>index.php/add_operator"><button class="btn btn-info"><i class="material-icons">add_circle_outline</i>Add<div class="ripple-container"></div></button></a>
<?php if($operator_list!=NULL):?>
                                    <a href="<?php echo base_url();?>index.php/operator_list/operator_list_exel"><button class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Download<div class="ripple-container"></div></button></a>
<?php endif;?>
                                </div>
                                 <?php if($operator_list!=NULL):?>
                                <div class="card-content table-responsive">
                                    <nav aria-label="">
                                        <ul class="pagination">
                                       <?php foreach ($links as $link) {
                                        echo "<li>". $link."</li>";
                                        } ?>
                                    </ul>
                                    </nav>
                                    <table class="table table-striped">
                                        <thead class="text-dark">
                                            <th>Operator Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Prefered Contact Type</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($operator_list as $operator)
                                                    {
                                                ?>
                                            <tr>
                                                <td class="text-dark"><a class="text-dark" href="<?php echo base_url();?>index.php/edit_operator/index/<?php echo $operator->id;?>"><?php echo $operator->name;?></a></td>
                                                <td class="text-dark"><a class="text-dark" href="tel:<?php echo $operator->phone;?>"><?php echo $operator->phone;?></a></td>
                                                <td class="text-dark"><a href="mailto:<?php echo $operator->email;?>"><?php echo $operator->email;?></a></td>
                                                <td><?php echo $operator->prefer_contact;?></td>
                                                <td>
                                                    <td><?php  $flag=check_cap('create');
                                                        if($flag==0):
                                                        ?>
                                                    <a class="text-dark" href="<?php echo base_url();?>index.php/register_aircraft/index/<?php echo $operator->id;?>"><button class="btn btn-default">Add Aircraft<div class="ripple-container"></div></button></a>
                                                    <?php endif;?>&nbsp;&nbsp;
                                                    <td><?php  $flag=check_cap('delete');
                                                    if($flag==0):
                                                    ?>
                                                    <a href="#" data-value="<?php echo $operator->id;?>" class="delete-operator" data-page="<?php echo $page?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <?php endif;?>
                                                </td>
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