<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <div class="col-md-8">
                            <h4 class="title">Payments Status</h4>
                        </div>
                        <div class="col-md-4" style="margin-left: -112px;"></div>
                        <a href="<?php echo base_url(); ?>index.php/payments">
                            <button class="btn btn-info">
                                <i class="material-icons">add_circle_outline</i>Add
                                <div class="ripple-container"></div>
                            </button>
                        </a>

                    </div>
                    <?php if ($payment_list != NULL): ?>
                        <div class="card-content table-responsive">
                            <nav aria-label="">
                                <ul class="pagination">
                                    <?php foreach ($links as $link) {
                                        echo "<li>" . $link . "</li>";
                                    } ?>
                                </ul>
                            </nav>
                            <table class="table table-striped">
                                <thead class="text-dark">
                                <tr>
                                    <th>Client Number</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Payment link</th>
                                    <th>Status</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($payment_list as $customer): ?>
                                    <tr>
                                        <?php $id = $customer->id;
                                        if ($id < 10):$id = '0' . $id;endif;
                                        ?>
                                        <td><?php echo $id; ?></td>
                                        <td class="text-dark"><a class="text-dark"><?php echo $customer->customer_name; ?></a>
                                        </td>
                                        <td class="text-dark"><a class="text-dark"
                                                                 href="mailto:<?php echo $customer->customer_email; ?>"
                                                                 target="_blank"><?php echo $customer->customer_email; ?></a>
                                        </td>
                                        <td class="text-dark"><a class="text-dark"
                                                                 target="_blank"><?php echo "https://tamprivateaviation.com/do_payment/?_pay_name=". $customer->unique_id; ?></a>
                                        </td>
                                        <td class="text-dark"><a class="text-dark"
                                                                 target="_blank"><?php echo $customer->payment_status; ?></a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>