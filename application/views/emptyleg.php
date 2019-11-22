<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <div class="col-md-8">
                            <h4 class="title">Empty Leg</h4>
                        </div>
                        <div class="col-md-4" style="margin-left: -112px;"></div>
                        <a href="<?php echo base_url(); ?>">
                            <button class="btn btn-info">
                                <i class="material-icons">add_circle_outline</i>View Journey
                                <div class="ripple-container"></div>
                            </button>
                        </a>

                    </div>
<!--                    --><?php //if ($payment_list != NULL): ?>
                        <div class="card-content table-responsive">
                            <nav aria-label="">
                                <ul class="pagination">
<!--                                    --><?php //foreach ($links as $link) {
//                                        echo "<li>" . $link . "</li>";
//                                    } ?>
                                </ul>
                            </nav>
                            <form method="post" class="add_emptyleg">
                                <input type="hidden" name="journey_type" value="oneway">
                                <div class="row">




                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-focused is-empty">
                                            <label class="control-label">From <span class="imp"> *</span></label>
                                            <input type="text" class="form-control autocomplete" id="departure-address113"  name="departure_address[]" value="">

                                            <span class="material-input"></span>
                                            <span class="material-input"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-focused is-empty">
                                            <label class="control-label">To <span class="imp"> *</span></label>
                                            <input type="text" class="form-control autocomplete" id="arrival-address" name="arrival_address[]" value="" >
<!--                                            <ul class="lists_of_aircraft arrival-list" style="display: none;">-->
<!--                                            </ul>-->
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-focused">
                                            <label class="control-label">Estimated Date Of Departure</label>
                                            <div id="picker" class="dtp_main"><span></span><i class="fa fa-calendar ico-size"></i><span>11:11</span><i class="fa fa-clock-o ico-size"></i></div>
                                            <input type="hidden" id="result" value="" name="departure_date[]">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Operator <span class="imp">*</span></label>
                                            <select class="form-control" name="operator_id">
                                                <option selected value="n">Please Select one</option>
                                                <?php foreach($operator_list as $list):?>
                                                    <option value="<?php echo $list->id;?>"><?php echo $list->name;?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <span class="material-input"></span>
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-focused is-empty">
                                            <label class="control-label">AirCraft</label>
                                            <input type="text" class="form-control aircraft_type" name="ArName" id="jetname" autocomplete="off" required>
                                            <ul class="aircraft-type-list lists_of_aircraft" style="display: none;">

                                            </ul>
                                            <span class="material-input"></span>
                                            <span class="material-input"></span></div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-focused is-empty">
                                            <label class="control-label">Price<span class="imp"> *</span></label>
                                            <input type="number" class="form-control" name="maxpax" value="" required="">
                                            <span class="material-input"></span>
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group label-floating is-focused is-empty">
                                            <label class="control-label">Note<span class="imp"> *</span></label>
                                            <textarea type="number" class="form-control" name="empty_pNote" value="" required=""></textarea>
                                            <span class="material-input"></span>
                                            <span class="material-input"></span></div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary pull-right search-checklist">
                                    Save Journey
                                </button>
<!--                                <button type="submit" name="check_button" class="btn btn-primary pull-right submit-checklist" style="display: none;">-->
<!--                                    Process-->
<!--                                </button>-->
                            </form>
                        </div>
<!--                    --><?php //endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>