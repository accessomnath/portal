<div class="content">
    <!-- Default Class-->
    <div class="container-fluid">
        <!-- Bootstrap Class-->
        <!-- page Starts Here -->

        <div class="row">
            <div class="col-md-8">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Add New Client</h4>
                        <p class="category">Complete this profile</p>
                    </div>
                    <div class="card-content">
                        <form method="post" id="form" class="add_customer">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Full Name <span class="imp"> *</span></label>
                                        <input type="text" class="form-control" name="name" value="" required>
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Mobile number </label>
                                        <input type="text" class="form-control number" name="phone" value="">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" value="">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">E-mail Address <span class="imp"> *</span></label>
                                        <input type="email" class="form-control" name="email" value="" required>
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Adress</label>
                                        <input type="text" class="form-control" name="address" value="">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Country</label>
                                        <?php $get_countries = get_countries(); ?>
                                        <select class="form-control country-select" name="country">
                                            <?php foreach ($get_countries as $country): ?>
                                                <option value="<?php echo $country['id']; ?>" <?php if ($country['id'] == 191):echo "selected";endif; ?>><?php echo $country['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="material-input"></span></div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating city-float is-focused">
                                        <label class="control-label">City</label>
                                        <select class="form-control city-select city" name="city">

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Postal Code</label>
                                        <input type="text" class="form-control" name="postalcode" value="">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Favourite Color</label>
                                        <input type="text" class="form-control" name="fcolor" value="">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>
                            <!-- <hr class="golden"> -->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Client Nature</label>
                                        <input type="text" class="form-control" name="cnature" value="">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Reference</label>
                                        <input type="text" class="form-control" name="reference" value="">
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Preferred Aircraft</label>
                                        <input type="text" class="form-control" name="prefered_aircraft" value="">
                                        <span class="material-input"></span></div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group label-floating ">

                                        <select id="dates-field2" name="broker[]" class="multiselect-ui form-control"
                                                multiple="multiple">
                                            <!--  <select class="form-control" name="broker[]"  multiple> -->

                                            <option value="0">None</option>
                                            <?php if ($brokers != NULL):
                                                foreach ($brokers as $broker):
                                                    ?>
                                                    <option value="<?php echo $broker->id; ?>"><?php echo $broker->name; ?></option>
                                                <?php
                                                endforeach;
                                            endif; ?>
                                            <option selected>Broker Name if any</option>
                                        </select>
                                        <!-- <p><b>Please Use Ctrl+Up Arrow or Ctrl+Down Arrow To select Broker</b></p> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Date of Birth</label>
                                        <input type="text" class="form-control" name="dob" value=" " id="datepicker"
                                               readonly>
                                        <span class="material-input"></span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating ">
                                        <label class="control-label">Passport</label>
                                        <input type="text" class="form-control" name="passport" value=" ">
                                        <span class="material-input"></span></div>
                                </div>

                            </div>
                            <?php $flag = check_cap('create');
                            if ($flag == 0):
                                ?>
                                <button type="button" class="btn btn-primary pull-right" id="next" data-toggle="modal"
                                        data-target="#exampleModal">
                                    Save
                                </button>
                            <?php endif; ?>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancel
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->

                            <div class="clearfix"></div>
                            <input type="hidden" name="creation_date_time" value="<?php echo date("Y-m-d h:i:sa") ?>">
                        </form>
                        <div class="login-ajax"><img src="<?php echo img_url(); ?>30.gif" alt="loader" class="loader"
                                                     style="display: none;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- page Ends Here -->

        </div>
        <!--Container-fluid Ends-->
    </div>
    <script>
        $("#datepicker").datepicker({
            maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
        });


    </script>