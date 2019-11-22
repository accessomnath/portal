<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <div class="col-md-8"><h4 class="title">Aircraft Base</h4></div>
                                    <div class="col-md-4"></div>
                                    <a href="<?php echo base_url();?>index.php/add_base"><button class="btn btn-info"><i class="material-icons">add_circle_outline</i>Add<div class="ripple-container"></div></button></a>
                                    
                                </div>
                                 <?php if($aircrat_base_list!=NULL):?>
                                <div class="card-content table-responsive">
                                    <nav aria-label="">
                                        <ul class="pagination">
                                       <?php foreach ($links as $link) {
                                        echo "<li>". $link."</li>";
                                        } ?>
                                    </ul>
                                    </nav>
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Sl no.</th>
                                            <th>Aircraft Base</th>
                                            <th></th>
                                       		<th></th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $c=1;
                                            foreach($aircrat_base_list as $base)
                                                    {
                                                ?>
                                            <tr>
                                                <td class="text-primary"><?php echo ($c<10?'0'.$c.'.':$c.'.');?></td>
                                                <td class="text-primary"><?php echo $base->aircraft_base;?></td>
                                                <td class="text-primary"><a href="<?php echo site_url('edit_base/index/'.$base->id);?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                                <td><?php  $flag=check_cap('delete');
                                                    if($flag==0):
                                                    ?><a href="#" class="delete_base" data-value="<?php echo $base->id;?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    <?php endif;?>
                                                    </td>
                                                
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