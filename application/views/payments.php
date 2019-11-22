<?php
?>
<div class="content">
    <div class="container-fluid">
        <!--custom-search-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <div class="col-md-8">
                            <h4 class="title">Select Customer</h4>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <select class="form-control" id="selected_customer">
                                    <?php foreach ($customer_select as $customer): ?>
                                        <option value="<?php echo $customer->id; ?>"><?php echo $customer->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <p id="oopo">&nbsp;</p>
                    </div>
                    <form method='post' class="add_new_payment" id="oppi">
                        <div class="card-content table-responsive">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control customer_name" value=""
                                               name="customer_name">
                                    </div>
                                </div>
                                <div class=" col-xs-12 col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control customer_email" value=""
                                               name="customer_email">
                                    </div>
                                </div>
                                <div class=" col-xs-12 col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Phone Number</label>
                                        <input type="text" class="form-control customer_phone" value=""
                                               name="customer_phone">
                                    </div>
                                </div>
                                <div class=" col-xs-12 col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nationality</label>
                                        <input type="text" class="form-control customer_nationality" value=""
                                               name="customer_nationality">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h3>Billing Address</h3>
                                </div>
                                <div class=" col-xs-12 col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="form-control customer_address" value=""
                                               name="customer_address">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">City</label>
                                        <input type="text" class="form-control customer_city" value=""
                                               name="customer_city">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Country</label>
                                        <input type="text" class="form-control customer_country" value=""
                                               name="customer_country">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Postal Code</label>
                                        <input type="text" class="form-control customer_postalcode" value=""
                                               name="customer_postalcode">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h3>Shipping Address</h3>
                                </div>
                                <div class=" col-xs-12 col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="form-control" value="" name="customer_ship_address">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">City</label>
                                        <input type="text" class="form-control" value="" name="customer_ship_city">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Country</label>
                                        <input type="text" class="form-control" value="" name="customer_ship_country">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Postal Code</label>
                                        <input type="text" class="form-control" value=""
                                               name="customer_ship_postalcode">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                                <div class="col-md-9 col-xs-12 col-sm-12">
                                    <p class="result"></p>
                                </div>

                            </div>
                        </div>
                    </form>

                    <div class="card-content table-responsive" id="aircraft-filter-res">
                        <nav aria-label="">
                        </nav>
                    </div>
                </div>
            </div>

        </div>
        <!--custom search-->
    </div>
</div>