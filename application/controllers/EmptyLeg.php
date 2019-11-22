<?php
/**
 * Created by PhpStorm.
 * User: DEBASISH MONDAL
 * Date: 10-Apr-19
 * Time: 10:47 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class EmptyLeg extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index($id = NULL)
    {
        if (is_user_logged_in()) {

            $flag = get_current_pos();
            if (check_access($flag)) {

                $total_row=$this->Base_model->total_operators();
                $data["operator_list"] = $this->Base_model->operator_list($total_row, 0);

                $this->load->view('header');
                $this->load->view('emptyleg', $data);
                $this->load->view('footer');
            } else {
                redirect('dashboard');
            }
        } else {
            redirect('login');
        }

    }


}