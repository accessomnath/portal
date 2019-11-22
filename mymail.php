<?php
    ini_set('display_errors', 1);
    error_reporting(-1);
    mail ('shahrukhvoip@gmail.com', 'SSl Test', 'A test email') || print_r(error_get_last());
?>
