<?php $quote=get_quote($quote_id);

?>

<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="row card-header" data-background-color="purple">
                  <div class="col-md-8">
                     <h4 class="title">Log Details For Quote ID <a href="<?php echo site_url('edit_quote/index/'.$quote->id)?>"><u>000<?php echo $quote->id;?></u></a></h4>

                  </div>
                  <div class="col-md-4"></div>

                  
                  
               </div>
               <div class="card-content table-responsive">
               <?php if($logs!=NULL):?>
                  <table class="table table-striped">
                     <thead class="text-dark">
                        <tr>
                           <th>Slno.</th>
                           <th>Processing Time</th>
                           <th>Receiving Status</th>
                           <th>Log Type</th>
                           <th>Mail Recipients</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php 
                     $c=1;
                     foreach($logs as $log):?>
                        <tr>
                           <td class="text-dark"><?php echo $c.'.';?></td>
                           <td class="text-dark"><?php echo $log->sending_date_time;?></td>
                           <td class="text-dark"><?php echo ucfirst($log->receiving_time);?>&nbsp;&nbsp;
                           <a href="#" class="update-status"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                               <div class="edit-receiving-time" style="display: none;">
                               <form action="<?php echo site_url('quote_log/update_receiving_status');?>" method="post">
                               <select class="form-control" name="receiving_time">
                                   <option value="pending" <?php echo ($log->receiving_time=="pending"?'selected':'');?>>Pending</option>
                                   <option value="processed" <?php echo ($log->receiving_time=="processed"?'selected':'');?>>Processed</option>

                               </select>
                               <input type="hidden" name="type" value="<?php echo $log->type;?>">
                               <input type="hidden" name="quote_id" value="<?php echo $log->quote_id;?>">
                               <button type="submit" class="btn btn-primary pull-right submit-checklist" >Update Status
                     <div class="ripple-container"></div></button>
                               </form>
                               </div>
                           </td>
                           <td class="text-dark"><?php echo ucfirst($log->type);?></td>
                           <td class="text-dark">
                           <?php $recipeint=$log->mail_recipients;
                                $recip=explode(",", $recipeint);
                           ?>
                           <ol>
                           <?php foreach($recip as $re):?>
                               <li><?php echo $re;?></li>
                               <?php endforeach;?>

                           </ol></td>
                           <td>
                           <a data-toggle="tooltip" title="Quote PDF" href="<?php echo site_url('edit_quote/quotation_briefing_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-pdf-o"></i></i></a>
               &nbsp;&nbsp;
               <a data-toggle="tooltip" title="Modify Quotation Pdf" href="<?php echo site_url('modify_quotation/index/'.$quote->id)?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a>
               &nbsp;&nbsp;
               
               
               
               <!-- <a data-toggle="tooltip" title="Quote PDF" href="<?php echo site_url('edit_quote/quote_briefing_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-pdf-o"></i></i></a>
               &nbsp;&nbsp; -->
               <a href="#" data-toggle="tooltip" title="Quote Mail" class="quote-briefing-aggrement" data-value="<?php echo $quote->id;?>"><i class="fa fa-share" aria-hidden="true"></i></a>
               &nbsp;&nbsp;
            <a data-toggle="tooltip" title="Contract PDF" href="<?php echo site_url('edit_quote/quote_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-text" ></i></a>&nbsp;&nbsp;
            <a data-toggle="tooltip" title="Contract Email" href="#" class="mail-quote" data-value="<?php echo $quote->id;?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
            &nbsp;&nbsp;
            <a data-toggle="tooltip" title="Flight Brief PDF" href="<?php echo site_url('quote_log/agreement_pdf/'.$quote->id);?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
            &nbsp;&nbsp;
            <a data-toggle="tooltip" title="Modify Flight Brief Pdf" href="<?php echo site_url('modify_aggrement/index/'.$quote->id)?>" target="_blank"><i class="fa fa-pencil-square-o"></i></a>
            <a href="#" data-toggle="tooltip" title="Flight Brief Mail" class="mail-aggrement" data-value="<?php echo $quote->id;?>"><i class="fa fa-share" aria-hidden="true"></i></a>&nbsp;&nbsp;
               
                           </td>
                        </tr>
                        <?php 
                         $c++;
                        endforeach;
                               
                        ?>
                     </tbody>
                  </table>
              <?php else:?>
                <h4>Sorry No Logs Present...</h4>
              <?php endif;?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="mailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <form action="<?php echo site_url('quote/quote_email');?>" method="post" class="--quote-mail-form">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Please Add Recipient Address</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-12 col-xs-12 col-md-12">
                                       <div class="form-group label-floating">
                                          <label class="control-label">Mail ID</label>
                                          <input type="email" class="form-control mail-ids" multiple name="email" required>
                                          <input type="hidden" name="aircarft_id" value="" class="aircarft_id">
                                          </div>
                                          <div id="search"></div>
                                    </div>
                                    
                                    
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                         </form>
                        </div>
                     </div>
<div class="modal fade" id="aggrementmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <form action="<?php echo site_url('quote/aggrement_email');?>" method="post" class="--quote-mail-form">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Please Add Recipient Address</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-12 col-xs-12 col-md-12">
                                       <div class="form-group label-floating">
                                          <label class="control-label">Mail ID</label>
                                          <input type="email" class="form-control mail-ids" multiple name="email" required>
                                          <input type="hidden" name="aircarft_id" value="" class="aircarft_id">
                                          </div>
                                          <div id="search"></div>
                                    </div>
                                    
                                    
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                         </form>
                        </div>
                     </div>
<div class="modal fade" id="quote_briefing_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <form action="<?php echo site_url('quote/quote_briefing_email');?>" method="post" class="--quote-mail-form">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Please Add Recipient Address</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-12 col-xs-12 col-md-12">
                                       <div class="form-group label-floating">
                                          <label class="control-label">Mail ID</label>
                                          <input type="email" class="form-control mail-ids" multiple name="email" required>
                                          <input type="hidden" name="aircarft_id" value="" class="aircarft_id">
                                          </div>
                                          <div id="search"></div>
                                    </div>
                                    
                                    
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="submit" class="btn btn-primary" name="submit">Yes</button>
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                         </form>
                        </div>
                     </div>