<footer class="footer" style="position:relative;">
    <div class="container-fluid">


    </div>
</footer>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="<?php echo js_url(); ?>datetimepicker.js"></script>


<script src="<?php echo js_url(); ?>bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo js_url(); ?>summernote/summernote.js"></script>

<script src="<?php echo js_url(); ?>material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="<?php echo js_url(); ?>chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="<?php echo js_url(); ?>arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="<?php echo js_url(); ?>perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo js_url(); ?>bootstrap-notify.js"></script>


<script src="<?php echo js_url(); ?>material-dashboard.js?v=1.2.0"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>maltiselect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.min.js"></script>
<script src="<?php echo js_url(); ?>demo.js"></script>

<script src="<?php echo js_url(); ?>main.js"></script>
<script src="<?php echo js_url(); ?>jssocials.min.js"></script>


<script type="text/javascript" src="<?php echo js_url(); ?>plugin.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<style>
    .error{color:red!important;}
    .result{margin-top: 23px;}

</style>
<script>
    $(document).ready(function () {

        $('.add_new_payment').validate({ // initialize the plugin
            rules: {
                customer_name: {
                    required: true,
                },
                customer_email: {
                    required: true,
                    email: true
                },
                customer_phone: {
                    required: true,
                },
                customer_address: {
                    required: true,
                },
                customer_nationality: {
                    required: true,
                },
                customer_city: {
                    required: true,
                },
                customer_country: {
                    required: true,
                },
                customer_postalcode: {
                    required: true,
                },
            }
        });

        $(".add_new_payment").submit(function (e) {
            e.preventDefault();
            var data = $(".add_new_payment").serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/payments/add_new_payment",
                data: data,
                dataType: "json",
                cache: "false",
                success: function (retdata) {
                    console.log(retdata);
                    $( "p.result" ).html(retdata);
                    // document.getElementsByClassName("add_new_payment").reset();
                    $("#oppi")[0].reset();
                }
            });
        });
    });


    $(document).ready(function () {
        $('#selected_customer').change(function () {
            var selected_value = $('#selected_customer option:selected').val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url()?>index.php/payments/ajaxget_value",
                data: {"id": selected_value},
                dataType: "json",
                cache: "false",
                success: function (customer_data) {
                    // console.log(customer_data);
                    $('.customer_name').val(customer_data[0]['name']);
                    $('.customer_email').val(customer_data[0]['email']);
                    $('.customer_phone').val(customer_data[0]['phone']);
                    $('.customer_nationality').val(customer_data[0]['nationality']);
                    $('.customer_address').val(customer_data[0]['address']);
                    $('.customer_city').val(customer_data['city']);
                    $('.customer_country').val(customer_data['country']);
                }
            });
            $('.form-group').each(function () {
                var inpuFeild = $(this).find('input');
                if (inpuFeild.val() == '') {
                    inpuFeild.parent().removeClass('is-empty').addClass('xxx');
                }
            });
        });

    });
</script>
<script>




</script>


</body>
</html>