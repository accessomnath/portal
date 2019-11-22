<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_model extends CI_Model
{

    public function login($data)
    {
        $this->db->where('email', $data['Username']);
        $this->db->where('password', $data['Password']);
        $query = $this->db->get('login');
        if ($query->num_rows() > 0) {
            $query_res = $query->result();

            $info['uid'] = $query_res['0']->id;
            $info['role'] = $query_res['0']->role;

            if (isset($data['remember_me'])) {
                $time = 60 * 60 * 5;
                $cookie = array(
                    'name' => 'remember_me',
                    'value' => $info,
                    'expire' => $time,
                    'secure' => TRUE

                );
                $this->input->set_cookie($cookie);

            }
            $this->session->set_userdata('login_info', $info);
            return $query_res['0']->role;
        } else {
            return false;
        }
    }

    public function get_login_details($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('login');
        if ($query->num_rows() > 0) {
            $query_res = $query->row();
            return $query_res;
        } else {
            return NULL;
        }
    }

    public function max_operator_id()
    {
        $this->db->select_max('id');
        $query = $this->db->get('operators');
        return $query->row();


    }

    public function get_cities()
    {
        $query = $this->db->get('cities');
        return $query->result_array();
    }

    public function get_countries()
    {
        $query = $this->db->get('countries');
        return $query->result_array();
    }

    public function get_cities_by_country($country_id)
    {
        // return $country_id;
        $this->db->select('id')->from('states');
        $this->db->where('country_id', $country_id);
        $subQuery = $this->db->get_compiled_select();

        // #Create main query
        return $this->db->select('*')
            ->from('cities')
            ->where("state_id IN ($subQuery)", NULL, FALSE)
            ->get()
            ->result();
    }

    public function add_new_operator($data)
    {
        $count = $this->unique_operator($data['email']);
        if ($count == "0") {
            $data['address'] = '';
            $this->db->insert('operators', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        } else {
            return $msg = "duplicate";
        }


    }

    public function unique_operator($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('operators');
        return $query->num_rows();
    }

    public function total_operators()
    {

        $query = $this->db->get('operators');
        return $query->num_rows();
    }

    public function operator_list($limit, $page)
    {
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("operators");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function add_new_aircraft($data)
    {
        $count = $this->unique_operator($data['r_number']);
        if ($count == "0") {
            $this->db->insert('aircraft', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $this->db->insert_id();

            } else {
                return $msg = "error";
            }
        } else {
            return $msg = "duplicate";
        }
    }

    public function add_new_payments($data)
    {
        $count = $this->unique_operator($data['unique_id']);
        if ($count == "0") {
            $this->db->insert('payment', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                $insert_id = $this->db->insert_id();

                $query1 = "select unique_id, customer_name, customer_email from payment where id=" . $insert_id;
                $sql1 = $this->db->query($query1);
                $res1 = $sql1->result();

                $unique_id = $res1[0]->unique_id;
                $customer_name = $res1[0]->customer_name;
                $customer_email = $res1[0]->customer_email;

                $res1['unique_id'] = $unique_id;
                $res1['customer_name'] = $customer_name;
                $res1['customer_email'] = $customer_email;

                echo json_encode($res1);

            } else {
                return $msg = "error";
            }
        } else {
            return $msg = "duplicate";
        }
    }

    public function unique_aircraft($register_id)
    {
        $this->db->where('r_number', $register_id);
        $query = $this->db->get('aircraft');
        return $query->num_rows();
    }

    public function get_operator($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('operators');
        return $query->row();
    }

    public function operator_update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('operators', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function total_aircrafts($id)
    {
        $this->db->where('operator_id', $id);
        $query = $this->db->get('aircraft');
        return $query->num_rows();
    }

    public function total_aircraft_count()
    {
        $query = $this->db->get('aircraft');
        return $query->num_rows();
    }

    public function count_aircraft()
    {
        $query = $this->db->get('aircraft');
        return $query->num_rows();
    }

    public function aircraft_list($limit, $page, $id)
    {
        $this->db->where('operator_id', $id);
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("aircraft");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function aircraft_details($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('aircraft');
        return $query->row();
    }

    public function update_aircraft($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('aircraft', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function delete_operator($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('operators');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_customer($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customer');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            $this->delete_quote_by_customer_id($id);
            return true;
        } else {
            return false;
        }
    }

    public function delete_quote_by_customer_id($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('quote');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_quote($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('quote');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_broker($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('broker');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            $this->update_customer_by_broker($id);
            return true;
        } else {
            return false;
        }
    }

    public function update_customer_by_broker($id)
    {
        $data = array('broker' => 0);
        $this->db->where('broker', $id);
        $this->db->update('customer', $data);
        $afftectedRows = $this->db->affected_rows();
        return true;
    }

    public function delete_aircraft_by_operator($id)
    {
        $this->db->where('operator_id', $id);
        $this->db->delete('aircraft');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function add_new_broker($data)
    {
        $count = $this->unique_broker($data['email']);
        if ($count == "0") {
            $this->db->insert('broker', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        } else {
            return $msg = "duplicate";
        }
    }

    public function unique_broker($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('broker');
        return $query->num_rows();
    }

    public function total_brokers()
    {
        $query = $this->db->get('broker');
        return $query->num_rows();
    }

    public function broker_list($limit, $page)
    {
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("broker");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function aircraft_list_total($limit, $page)
    {
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("aircraft");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_broker($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('broker');
        return $query->row();

    }

    public function update_broker($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('broker', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function max_customer()
    {
        $this->db->select_max('id');
        $query = $this->db->get('customer');
        return $query->row();
    }

    public function get_all_brokers()
    {
        $query = $this->db->get('broker');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function add_new_customer($data, $broker)
    {
        $count = $this->unique_customer($data['email']);
        if ($count == "0") {

            $this->db->insert('customer', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                $insert_id = $this->db->insert_id();
                if (is_array($broker) > 0) {
                    $this->add_broker_customer_relation($broker, $insert_id);
                }


                return $msg = "success";
            } else {
                return $msg = "error";
            }
        } else {
            return $msg = "duplicate";
        }
    }

    public function add_broker_customer_relation($data, $cust_id)
    {
        foreach ($data as $value) {
            if ($value != 0) {
                $info = array('broker' => $value, 'customer' => $cust_id);
                $this->db->insert('broker_customer_relation', $info);
            }

        }
    }

    public function count_broker_customer_relation($cust_id)
    {
        $this->db->where('customer', $cust_id);
        $query = $this->db->get('broker_customer_relation');
        return $query->num_rows();
    }

    public function unique_customer($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('customer');
        return $query->num_rows();
    }

    public function total_customer()
    {
        $query = $this->db->get('customer');
        return $query->num_rows();
    }

    public function total_customer_by_broker($id)
    {
        $this->db->where('broker', $id);
        $query = $this->db->get('broker_customer_relation');
        return $query->num_rows();
    }

    public function customer_list($limit, $page)
    {

        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("customer");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function customer_select()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get("customer");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function customer_select_ajax($id)
    {

        $query1 = "select * from customer where id=" . $id;
        $sql1 = $this->db->query($query1);
        $res1 = $sql1->result();


        $query = "select name from countries where id=(select country from customer where id='$id')";
        $sql = $this->db->query($query);
        $res = $sql->result();


        $query2 = "select name from cities where id=(select city from customer where id='$id')";
        $sql2 = $this->db->query($query2);
        $res2 = $sql2->result();


        $country_name = $res[0]->name;
        $city_name = $res2[0]->name;

        $res1['country'] = $country_name;
        $res1['city'] = $city_name;

        echo json_encode($res1);

    }


    public function customer_list_by_broker($limit, $page, $id)
    {
        $this->db->where('broker', $id);
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("broker_customer_relation");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_customer($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('customer');
        return $query->row();
    }

    public function customer_update($data)
    {


        $this->db->where('id', $data['id']);
        $this->db->update('customer', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function get_broker_customer_relation($cust_id)
    {

        $this->db->where('customer', $cust_id);
        $query = $this->db->get('broker_customer_relation');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function delete_broker_customer_relation($cust_id)
    {

        $this->db->where('customer', $cust_id);
        $this->db->delete('broker_customer_relation');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_client_name_phone()
    {

        $this->db->select('id');
        $this->db->select('name');
        $this->db->select('phone');
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_aircraft_address()
    {
        $this->db->select('id');
        $this->db->select('ArBase');
        $query = $this->db->get('aircraft');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function add_new_quote($data)
    {

        $this->db->insert('quote', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return $msg = "error";
        }

    }

    public function quote_list($limit, $page, $id)
    {

        if ($id != "all") {
            $this->db->where('customer_id', $id);
        }

        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("quote");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function total_quote()
    {
        $query = $this->db->get('quote');
        return $query->num_rows();
    }

    public function total_quote_by_customer_id($id)
    {
        $this->db->where('customer_id', $id);
        $query = $this->db->get('quote');
        return $query->num_rows();
    }

    public function get_quote($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('quote');
        return $query->row();
    }

    public function update_quote($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('quote', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function search($id, $table)
    {
        if (is_numeric($id)) {
            if ($table == "employee_meta") {
                $this->db->where('emp_id', $id);
            } else {
                $this->db->where('id', $id);
            }

            $query = $this->db->get($table);
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        } else {
            if ($table != "aircraft" && $table != "quote" && $table != "employee_meta") {
                $this->db->like('name', $id);
            } elseif ($table == "aircraft") {
                $this->db->like('ArName', $id);
            } elseif ($table == "employee_meta") {
                $this->db->like('fname', $id);
            }
            $query = $this->db->get($table);
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }

        }
    }

    public function search_by_country($id, $table, $country)
    {

        if (strlen($id) > 1) {
            if (is_numeric($id)) {
                $this->db->where('id', $id);
            } else {
                $this->db->like('name', $id);
            }
        }
        $this->db->where('country', $country);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }


    }

    public function total_employee()
    {
        $this->db->where('role', 'employee');
        $query = $this->db->get('login');
        return $query->num_rows();
    }

    public function employee_list($limit, $page)
    {
        $this->db->where('role', 'employee');
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("login");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    public function add_new_employee($data)
    {
        $flag = $this->duplicate_employee($data['email']);
        $pass = '';
        if ($flag == 0) {

            $info1['username'] = $data['fname'] . '_' . $data['lname'];
            $info1['email'] = $data['email'];
            $info1['password'] = md5($data['pass']);
            $info1['status'] = 0;
            $info1['display_name'] = $data['fname'] . ' ' . $data['lname'];
            $info1['role'] = 'employee';
            $this->db->insert('login', $info1);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                $insert_id = $this->db->insert_id();
                $info = $data;
                $pass = $info['pass'];
                unset($info['pass']);
                $info['emp_id'] = $insert_id;
                $f = $this->add_employee_meta_data($info);
                if ($f == false) {
                    $this->delete_employee($insert_id);
                    $return_data['msg'] = "error";
                    $return_data['id'] = '';
                    $return_data['pass'] = $pass;
                    return $return_data;
                } else {
                    $cap['emp_id'] = $insert_id;
                    $cap['edit_cap'] = 1;
                    $cap['delete_cap'] = 1;
                    $cap['create_cap'] = 1;
                    $this->add_employee_role($cap);
                    $return_data['msg'] = "success";
                    $return_data['id'] = $insert_id;
                    $return_data['pass'] = $pass;

                    return $return_data;
                }
            } else {
                $return_data['msg'] = "error";
                $return_data['id'] = '';
                $return_data['pass'] = $pass;

                return $return_data;
            }

        } else {
            $return_data['msg'] = "duplicate";
            $return_data['id'] = '';
            $return_data['pass'] = $pass;

            return $return_data;
        }

    }

    public function duplicate_employee($email)
    {
        $this->db->where('email', $email);
        $this->db->where('role', 'employee');
        $query = $this->db->get("login");
        return $query->num_rows();
    }

    public function add_employee_meta_data($data)
    {
        $this->db->insert('employee_meta', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function add_employee_role($cap)
    {
        $this->db->insert('employee_role', $cap);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function duplicate_employee_role($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('employee_role');
        return $query->num_rows();
    }

    public function get_employee_login($id)
    {
        $this->db->where('id', $id);
        $this->db->where('role', 'employee');
        $query = $this->db->get("login");
        return $query->row();
    }

    public function get_employee_meta($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('employee_meta');
        return $query->row();
    }

    public function update_employee($data)
    {
        if (isset($data['tabs'])) {
            $tab_flag = $this->check_tab_exists($data['id']);
            $tabs_array['emp_id'] = $data['id'];
            $serialze_tab = serialize($data['tabs']);
            $tabs_array['tabs'] = $serialze_tab;
            if ($tab_flag == 0) {
                $this->insert_tab($tabs_array);
            } else {
                $this->update_tab($tabs_array);
            }
        }
        unset($data['tabs']);
        $cap['edit_cap'] = isset($data['edit_cap']) ? $data['edit_cap'] : '1';
        $cap['delete_cap'] = isset($data['delete_cap']) ? $data['delete_cap'] : '1';
        $cap['create_cap'] = isset($data['create_cap']) ? $data['create_cap'] : '1';
        $cap['emp_id'] = $data['id'];
        $this->update_employee_role($cap);
        unset($data['edit_cap']);
        unset($data['delete_cap']);
        unset($data['create_cap']);
        $duplicate_employee_flag = $this->duplicate_existings_employee($data['email'], $data['id']);
        if ($duplicate_employee_flag < 1) {
            $dup = $this->update_employee_email($data['email'], $data['id']);
            if ($dup == false) {
                unset($data['email']);
            } else {
                $info1['email'] = $data['email'];
            }
        } else {
            unset($data['email']);
        }

        $info1['username'] = $data['fname'] . '_' . $data['lname'];
        if (isset($data['pass'])) {
            $info1['password'] = md5($data['pass']);
        }
        $info1['display_name'] = $data['fname'] . ' ' . $data['lname'];
        $this->db->where('id', $data['id']);
        $this->db->update('login', $info1);
        $info = $data;
        if (isset($data['pass'])) {
            unset($info['pass']);
        }

        $info['emp_id'] = $data['id'];
        $f = $this->update_employee_meta_data($info);
        return $msg = "success";
    }

    public function update_user($data)
    {
        $duplicate_employee_flag = $this->duplicate_existings_employee($data['email'], $data['id']);
        if ($duplicate_employee_flag < 1) {
            $dup = $this->update_employee_email($data['email'], $data['id']);
            if ($dup == false) {
                unset($data['email']);
            } else {
                $info1['email'] = $data['email'];
            }
        } else {
            unset($data['email']);
        }

        $info1['username'] = $data['fname'] . '_' . $data['lname'];
        if (isset($data['pass'])) {
            $info1['password'] = md5($data['pass']);
        }
        $info1['display_name'] = $data['fname'] . ' ' . $data['lname'];
        $this->db->where('id', $data['id']);
        $this->db->update('login', $info1);
        $info = $data;
        if (isset($data['pass'])) {
            unset($info['pass']);
        }

        $info['emp_id'] = $data['id'];
        $f = $this->update_employee_meta_data($info);
        return $msg = "success";
    }

    public function duplicate_existings_employee($email, $id)
    {
        $this->db->where('id!= ', $id);
        $this->db->where('email', $email);
        $query = $this->db->get("login");
        return $query->num_rows();
    }

    public function update_employee_meta_data($data)
    {
        $this->db->where('emp_id', $data['emp_id']);
        $this->db->update('employee_meta', $data);
        return true;
    }

    public function update_employee_email($email, $id)
    {
        $data = array('email' => $email);
        $this->db->where('id', $id);
        $this->db->update('login', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function get_employee_role($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('employee_role');
        return $query->row();
    }

    public function update_employee_role($data)
    {
        $this->db->where('emp_id', $data['emp_id']);
        $this->db->update('employee_role', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function check_tab_exists($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('employee_tab');
        return $query->num_rows();
    }

    public function insert_tab($data)
    {
        $this->db->insert('employee_tab', $data);
        return true;
    }

    public function update_tab($data)
    {
        $this->db->where('emp_id', $data['emp_id']);
        $this->db->update('employee_tab', $data);
        return true;
    }

    public function get_emp_tab($id)
    {
        $this->db->where('emp_id', $id);
        $query = $this->db->get('employee_tab');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function get_cap_status($id, $cap)
    {
        if ($cap == "edit") {
            $attr = 'edit_cap';
            $this->db->select($attr);
        } elseif ($cap == "delete") {
            $attr = 'delete_cap';
            $this->db->select('delete_cap');
        } elseif ($cap == "create") {
            $attr = 'create_cap';
            $this->db->select('create_cap');
        }
        $this->db->where('emp_id', $id);
        $query = $this->db->get('employee_role');
        if ($query->num_rows() > 0) {
            $res = $query->row();
            return $res->$attr;
        } else {
            return false;
        }
    }

    public function delete_employee($id)
    {
        $this->delete_emp_role($id);
        $this->delete_emp_tab($id);
        $this->delete_emp_meta($id);
        $this->db->where('id', $id);
        $this->db->delete('login');
        return true;
    }

    public function delete_emp_role($id)
    {
        $this->db->where('emp_id', $id);
        $this->db->delete('employee_role');
        return true;
    }

    public function delete_emp_tab($id)
    {
        $this->db->where('emp_id', $id);
        $this->db->delete('employee_tab');
        return true;
    }

    public function delete_emp_meta($id)
    {
        $this->db->where('emp_id', $id);
        $this->db->delete('employee_meta');
        return true;
    }

    public function get_city($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('cities');
        return $query->row();
    }

    public function get_country($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('countries');
        return $query->row();
    }

    public function add_aircraft_image($data)
    {
        $this->db->insert('aircraft_images', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function get_aircraft_images($aircraft_id)
    {
        $this->db->where('aircraft_id', $aircraft_id);
        $this->db->order_by("img_order", "asc");
        $query = $this->db->get('aircraft_images');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function delete_aircraft_image($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('aircraft_images');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function get_aircraft_image($id)
    {

        $this->db->where('id', $id);
        $query = $this->db->get('aircraft_images');
        return $query->row();

    }

    public function add_aircraft_base($data)
    {
        $flag = $this->duplicate_aircraft_base($data['aircraft_base']);
        if ($flag < 1) {
            $this->db->insert('aircraft_base', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        } else {
            return $mg = "duplicate";
        }

    }

    public function duplicate_aircraft_base($airbase_name)
    {
        $this->db->where('aircraft_base', $airbase_name);
        $query = $this->db->get('aircraft_base');
        return $query->num_rows();
    }

    public function total_aircraft_base()
    {
        $query = $this->db->get('aircraft_base');
        return $query->num_rows();
    }

    public function aircrat_base_list($limit, $page)
    {
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("aircraft_base");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_aircraft_base($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('aircraft_base');
        return $query->row();
    }

    public function update_base($data)
    {
        $flag = $this->unique_base_for_existing($data);
        if ($flag < 1) {
            $this->db->where('id', $data['id']);
            $this->db->update('aircraft_base', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "success";
            }
        } else {
            return $msg = "duplicate";
        }
    }

    public function unique_base_for_existing($data)
    {
        $this->db->where('id!=', $data['id']);
        $this->db->where('aircraft_base', $data['aircraft_base']);
        $query = $this->db->get('aircraft_base');
        return $query->num_rows();
    }

    public function delete_aircraft_base($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('aircraft_base');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function airport_filter($airport_name)
    {
        $airport_name = strtoupper($airport_name);
        $query = $this->db->query("SELECT * FROM airports WHERE `FIELD5` LIKE '$airport_name%' OR `FIELD3` LIKE '$airport_name%' ");

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    /* public function airport_filter($airport_name)
     {
       $airport_name=strtoupper($airport_name);
       $this->db->where('FIELD5',$airport_name,'after');
       $this->db->or_like('FIELD6',$airport_name,'after');
       $query=$this->db->get('airports');
       if($query->num_rows()>0)
       {
         return $query->result();
       }
       else
       {
         return NULL;
       }
     }*/
    public function unique_airport_type($name, $type, $id)
    {
        if ($type != "new") {
            $this->db->where('id!=', $id);
        }
        $this->db->where('name', $name);
        $query = $this->db->get('aircraft_type');
        return $query->num_rows();
    }

    public function insert_aircraft_type($data)
    {

        $flag = $this->unique_airport_type($data['name'], 'new', 0);
        if ($flag < 1) {
            $this->db->insert('aircraft_type', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        } else {
            return $msg = "duplicate";
        }

    }

    public function total_aircarft_type()
    {
        $query = $this->db->get('aircraft_type');
        return $query->num_rows();
    }

    public function aircarft_type_list($limit, $page)
    {
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("aircraft_type");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function get_aircraft_type($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get("aircraft_type");
        return $query->row();
    }

    public function update_aircraft_type($data)
    {
        $flag = $this->unique_airport_type($data['name'], 'old', $data['id']);
        if ($flag < 1) {
            $this->db->where('id', $data['id']);
            $this->db->update('aircraft_type', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "success";
            }
        } else {
            return $msg = "duplicate";
        }
    }

    public function aircraft_type_filter($data)
    {
        $this->db->like('name', $data, 'after');
        $query = $this->db->get("aircraft_type");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }

    }

    public function customer_filter($data)
    {
        $this->db->select('id');
        $this->db->select('name');
        $this->db->select('phone');
        $this->db->like('name', $data, 'after');
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function search_aircrafts_for_checklist($data)
    {

        $this->db->where('ArmaxPax>=', $data['maxpax']);
        if (strlen($data['ArBedroom']) > 0) {

            $this->db->having('ArBedroom', $data['ArBedroom']);
        }
        if (strlen($data['ARBedStup']) > 1) {


            $this->db->having('ARBedStup', $data['ARBedStup']);
        }
        $query = $this->db->get('aircraft');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }


    }

    public function delete_aircraft($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('aircraft');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function aircraft_exists($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('aircraft');
        return $query->num_rows();
    }

    public function filter_aircraft($data)
    {
        $c = 1;
        foreach ($data as $key => $value) {
            if ($key == 'ArBase') {
                $this->db->where($key, $value);
            }
            if ($key == 'ArmaxPax') {
                $this->db->where($key . '>=', $value);
            } else {
                $this->db->or_where($key, $value);
            }

            $c++;
        }
        $query = $this->db->get('aircraft');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function create_group($data)
    {
        $flag = $this->check_group_exists($data);
        if ($flag > 0) {
            return $msg = "duplicate";
        } else {
            $this->db->insert('groups', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        }
    }

    public function check_group_exists($data)
    {
        $this->db->where('group_name', $data['group_name']);
        $query = $this->db->get('groups');
        return $query->num_rows();
    }

    public function get_groups()
    {
        $query = $this->db->get('groups');
        if ($query->num_rows() > 0) {
            return $query->result();

        } else {
            return NULL;
        }
    }

    public function add_relation($data)
    {
        $flag = $this->check_relation_exists($data);
        if ($flag > 0) {
            return $msg = "duplicate";
        } else {
            $this->db->insert('relation', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }

        }
    }

    public function check_relation_exists($data)
    {
        $this->db->where('relation', $data['relation']);
        $query = $this->db->get('relation');
        return $query->num_rows();
    }

    public function get_relation()
    {
        $query = $this->db->get('relation');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function update_relation($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('relation', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function add_relationship2($data)
    {
        $flag = $this->check_customer_relationship_exists($data['customer_id']);
        if ($flag > 0) {
            $this->update_customer_relationship($data);
            return $msg = "success";
        } else {
            $this->db->insert('customer_relationship', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        }
    }

    public function check_customer_relationship_exists($cust_id)
    {
        $this->db->where('customer_id', $cust_id);
        $query = $this->db->get('customer_relationship');
        return $query->num_rows();
    }

    public function update_customer_relationship($data)
    {
        $this->db->where('customer_id', $data['customer_id']);
        $this->db->update('customer_relationship', $data);
        return true;
    }

    public function get_relationship($cust_id)
    {
        $this->db->where('customer_id', $cust_id);
        $query = $this->db->get('customer_relationship');
        if ($query->num_rows() < 1) {
            return NULL;
        } else {
            return $query->row();
        }
    }

    public function get_group($group_id)
    {
        $this->db->where('id', $group_id);
        $query = $this->db->get('groups');
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return NULL;
        }
    }

    public function get_relation_one($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('relation');
        if ($query->num_rows() > 0) {
            return $query->row();

        } else {
            return NULL;
        }
    }

    public function get_customers_by_group($id)
    {
        $this->db->select('customer_id');
        $this->db->where('group_name', $id);
        $query = $this->db->get('customer_relationship');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function aircraft_registration($data)
    {
        $this->db->like('r_number', $data, 'after');
        $query = $this->db->get('aircraft');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function insert_log($data)
    {
        $this->db->insert('contract_log', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "error";
        }
    }

    public function get_log($quote_id)
    {
        $this->db->where('quote_id', $quote_id);
        $query = $this->db->get('contract_log');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function update_log_status($data)
    {
        $this->db->where('quote_id', $data['quote_id']);
        $this->db->where('type', $data['type']);
        $this->db->update('contract_log', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function quick_reminder()
    {
        $this->db->where('receiving_time', 'pending');
        $this->db->group_by('type');
        $this->db->limit(10);
        $query = $this->db->get('contract_log');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function delete_log_status($id)
    {
        $this->db->where('quote_id', $id);
        $this->db->delete('contract_log');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function check_group($id)
    {
        $this->db->where('customer_id', $id);
        $query = $this->db->get('customer_relationship');
        return $query->num_rows();
    }

    public function get_other_group_members($id)
    {
        $flag = $this->check_group($id);
        if ($flag > 0) {
            $this->db->where('customer_id!=', $id);
            $query = $this->db->get('customer_relationship');
            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }

    }

    public function insert_aggrement_details($data)
    {
        $flag = $this->check_aggrement_details($dataa['quote_id']);
        if ($flag < 1) {
            $this->db->insert('agrrement_details', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        } else {
            $this->db->where('quote_id', $data['quote_id']);
            $this->db->update('agrrement_details', $data);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows == 1) {
                return $msg = "success";
            } else {
                return $msg = "error";
            }
        }
    }

    public function check_aggrement_details($quote_id)
    {
        $this->db->where('quote_id', $quote_id);
        $query = $this->db->get('agrrement_details');
        return $query->num_rows();
    }

    public function get_aggrement_details($quote_id)
    {
        $this->db->where('quote_id', $quote_id);
        $query = $this->db->get('agrrement_details');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function update_group($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('groups', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function delete_group($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('groups');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows > 0) {
            $this->delete_relation_group($id);
        } else {
            return $msg = "success";
        }
    }

    public function delete_relation_group($id)
    {
        $this->db->where('group_name', $id);
        $this->db->delete('customer_relationship');
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            return $msg = "success";
        } else {
            return $msg = "success";
        }
    }

    public function delete_relaton($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('relation');
        return true;
    }

    public function get_operator_by_aircraft($id)
    {
        $this->db->select('operator_id');
        $this->db->where('id', $id);
        $query = $this->db->get('aircraft');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function manage_meta_data($unique_id, $data, $type)
    {
        foreach ($data as $key => $value) {
            $check = $this->check_meta_data($unique_id, $type, $key);
            if ($check > 0) {
                $this->db->set('meta_value', $value);
                $this->db->where('unique_id', $unique_id);
                $this->db->where('type', $type);
                $this->db->where('meta_key', $key);
                $this->db->update('meta_data');
            } else {
                $info = array('meta_key' => $key, 'meta_value' => $value, 'unique_id' => $unique_id, 'type' => $type);
                $this->db->insert('meta_data', $info);
            }
        }
        return true;
    }

    public function check_meta_data($unique_id, $type, $meta_key)
    {

        $this->db->where('unique_id', $unique_id);
        $this->db->where('type', $type);
        $this->db->where('meta_key', $meta_key);
        $query = $this->db->get('meta_data');
        return $query->num_rows();

    }

    public function get_meta_data($unique_id, $type, $meta_key)
    {
        $this->db->where('unique_id', $unique_id);
        $this->db->where('type', $type);
        $this->db->where('meta_key', $meta_key);
        $query = $this->db->get('meta_data');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return NULL;
        }
    }

    public function get_max_order($aircraft_id, $operator_id)
    {
        $this->db->select_max('img_order');
        $this->db->where('aircraft_id', $aircraft_id);
        $this->db->where('operator_id', $operator_id);

        $query = $this->db->get('aircraft_images');

        $result = $query->row();
        if (strlen($result->img_order) > 0) {
            $num = $result->img_order;
            $num = $num + 1;
            return $num;
        } else {
            $num = 1;
            return $num;
        }


    }

    public function update_order($image_ids)
    {
        $c = 1;
        foreach ($image_ids as $value) {
            $this->db->set('img_order', $c);
            $this->db->where('id', $value);
            $this->db->update('aircraft_images');
            $c++;
        }
    }
    public function payment_list($limit, $page)
    {

        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $page);
        $query = $this->db->get("payment");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
}


