<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <div class="col-md-8"><h4 class="title">aircarft Type List</h4></div>
                                    <div class="col-md-4"></div>
                                    <a href="<?php echo base_url();?>index.php/add_aircraft_type"><button class="btn btn-info"><i class="material-icons">add_circle_outline</i>Add<div class="ripple-container"></div></button></a>
<?php if($aircarft_type_list!=NULL):?>
                                    <a href="<?php echo base_url();?>index.php/aircraft_type_list/aircraft_type_exel"><button class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>Download<div class="ripple-container"></div></button></a>
<?php endif;?>
                                </div>
                                 <?php if($aircarft_type_list!=NULL):?>
                                <div class="card-content table-responsive">
                                    <nav aria-label="">
                                        <ul class="pagination">
                                       <?php foreach ($links as $link) {
                                        echo "<li>". $link."</li>";
                                        } ?>
                                    </ul>
                                    </nav>
                                    <table class="table table-striped">
                                        <thead class="text-primary">
                                            <th>Sl No.</th>
                                            <th>Aircraft Type</th>
                                            <th></th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $c=1;
                                            foreach($aircarft_type_list as $operator)
                                                    {
                                                ?>
                                            <tr>
                                                <td class="text-dark"><?php echo ($c<10?'0'.$c.'.':$c.'.');?></td>
                                                <td class="text-dark"><?php echo $operator->name;?></td>
                                                <td class="text-dark"></td>
                                                <td class="text-dark"><a href="<?php echo site_url('edit_aircraft_type/index/'.$operator->id);?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                                
                                            </tr>
                                            <?php 
                                                $c++;
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