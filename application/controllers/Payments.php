<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller
{

    public function index($id = NULL)
    {
        if (is_user_logged_in()) {
            $data["customer_select"] = $this->Base_model->customer_select();
            $this->load->view('header');
            $this->load->view('payments', $data);
            $this->load->view('footer');
        }
    }

    public function ajaxget_value()
    {
        $id = $this->input->post('id');
        $data["customer_ajax_data"] = $this->Base_model->customer_select_ajax($id);
    }

    public function add_new_payment()
    {

//        $datafields = $_POST['data'];
        $info['customer_name'] = $this->input->post('customer_name');
        $info['customer_email'] = $this->input->post('customer_email');
        $info['customer_phone'] = $this->input->post('customer_phone');
        $info['customer_nationality'] = $this->input->post('customer_nationality');
        $info['customer_address'] = $this->input->post('customer_address');
        $info['customer_city'] = $this->input->post('customer_city');
        $info['customer_country'] = $this->input->post('customer_country');
        $info['customer_postalcode'] = $this->input->post('customer_postalcode');
        $info['customer_ship_address'] = $this->input->post('customer_ship_address');
        $info['customer_ship_city'] = $this->input->post('customer_ship_city');
        $info['customer_ship_country'] = $this->input->post('customer_ship_country');
        $info['customer_ship_postalcode'] = $this->input->post('customer_ship_postalcode');

        $arr = "<p style='color: red;'> Please fill Require fields </p>";
        if ($info['customer_name'] == NULL || $info['customer_email'] == NULL || $info['customer_phone'] == NULL || $info['customer_nationality'] == NULL || $info['customer_address'] == NULL || $info['customer_city'] == NULL || $info['customer_country'] == NULL || $info['customer_postalcode'] == NULL) {
            echo json_encode($arr);
            return false;
        } else {
            $this->load->helper('string');
            $uid = random_string('alnum', 5);
            $info['unique_id'] = $uid;
            $info['created_date'] = date('Y-m-d H:i:s');;
            $d = array();
            foreach ($info as $k => $in) {
                if (strlen($in) < 1) {
                    $info[$k] = '';
                }
            }
            $flag = $this->Base_model->add_new_payments($info);

            $err1 = "<p style='color: red;'>Oops! Looks Like Something Went Wrong Please Try Again.</p>";
            $_err_exits = "<p style='color: red;'>Oops! Looks Like payments Already Exists Please Try Again.</p>";
            $_success = "<p style='color: green;'>Successfully Added New Payment Details...<br><span style='font-size: 16px;'>Payment Link :  </span></p>";
            if ($flag == "error") {
                echo json_encode($err1);

            } elseif ($flag == "duplicate") {
                echo json_encode($_err_exits);

            } else {

            }
        }

    }
}

?>
