<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Sekati CodeIgniter Asset Helper
 *
 * @package     Sekati
 * @author      Jason M Horwitz
 * @copyright   Copyright (c) 2013, Sekati LLC.
 * @license     http://www.opensource.org/licenses/mit-license.php
 * @link        http://sekati.com
 * @version     v1.2.7
 * @filesource
 *
 * @usage       $autoload['config'] = array('asset');
 *              $autoload['helper'] = array('asset');
 * @example     <img src="<?=asset_url();?>imgs/photo.jpg" />
 * @example     <?=img('photo.jpg')?>
 *
 * @install     Copy config/asset.php to your CI application/config directory
 *              & helpers/asset_helper.php to your application/helpers/ directory.
 *              Then add both files as autoloads in application/autoload.php:
 *
 *              $autoload['config'] = array('asset');
 *              $autoload['helper'] = array('asset');
 *
 *              Autoload CodeIgniter's url_helper in application/config/autoload.php:
 *              $autoload['helper'] = array('url');
 *
 * @notes       Organized assets in the top level of your CodeIgniter 2.x app:
 *                  - assets/
 *                      -- css/
 *                      -- download/
 *                      -- img/
 *                      -- js/
 *                      -- less/
 *                      -- swf/
 *                      -- upload/
 *                      -- xml/
 *                  - application/
 *                      -- config/asset.php
 *                      -- helpers/asset_helper.php
 */

// ------------------------------------------------------------------------
// URL HELPERS

/**
 * Get asset URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('asset_url'))
{
    function asset_url()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        //return the full asset path
        return base_url() . $CI->config->item('asset_path');
    }
}

if ( ! function_exists('bcc_mail'))
{
    function bcc_mail()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        //return the full asset path
        return $CI->config->item('bcc_mail');
    }
}
if ( ! function_exists('css_url'))
{
    function css_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('css_path');
    }
}

/**
 * Get less URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('less_url'))
{
    function less_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('less_path');
    }
}

/**
 * Get js URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('js_url'))
{
    function js_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('js_path');
    }
}

/**
 * Get image URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('img_url'))
{
    function img_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('img_path');
    }
}

/**
 * Get SWF URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('swf_url'))
{
    function swf_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('swf_path');
    }
}

/**
 * Get Upload URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_url'))
{
    function upload_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('upload_path');
    }
}

/**
 * Get Download URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_url'))
{
    function download_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('download_path');
    }
}

/**
 * Get XML URL
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('xml_url'))
{
    function xml_url()
    {
        $CI =& get_instance();
        return base_url() . $CI->config->item('xml_path');
    }
}


// ------------------------------------------------------------------------
// PATH HELPERS

/**
 * Get asset Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('asset_path'))
{
    function asset_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('asset_path');
    }
}

/**
 * Get CSS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('css_path'))
{
    function css_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('css_path');
    }
}

/**
 * Get LESS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('less_path'))
{
    function less_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('less_path');
    }
}

/**
 * Get JS Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('js_path'))
{
    function js_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('js_path');
    }
}

/**
 * Get image Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('img_path'))
{
    function img_path()
    {
        //get an instance of CI so we can access our configuration
        $CI =& get_instance();
        return FCPATH . $CI->config->item('img_path');
    }
}

/**
 * Get SWF Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('swf_path'))
{
    function swf_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('swf_path');
    }
}

/**
 * Get XML Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('xml_path'))
{
    function xml_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('xml_path');
    }
}

/**
 * Get the Absolute Upload Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_path'))
{
    function upload_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('upload_path');
    }
}

/**
 * Get the Relative (to app root) Upload Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('upload_path_relative'))
{
    function upload_path_relative()
    {
        $CI =& get_instance();
        return './' . $CI->config->item('upload_path');
    }
}

/**
 * Get the Absolute Download Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_path'))
{
    function download_path()
    {
        $CI =& get_instance();
        return FCPATH . $CI->config->item('download_path');
    }
}

/**
 * Get the Relative (to app root) Download Path
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('download_path_relative'))
{
    function download_path_relative()
    {
        $CI =& get_instance();
        return './' . $CI->config->item('download_path');
    }
}


// ------------------------------------------------------------------------
// EMBED HELPERS

/**
 * Load CSS
 * Creates the <link> tag that links all requested css file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('css'))
{
    function css($file, $media='all')
    {
        return '<link rel="stylesheet" type="text/css" href="' . css_url() . $file . '" media="' . $media . '">'."\n";
    }
}

/**
 * Load LESS
 * Creates the <link> tag that links all requested LESS file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('less'))
{
    function less($file)
    {
        return '<link rel="stylesheet/less" type="text/css" href="' . less_url() . $file . '">'."\n";
    }
}

/**
 * Load JS
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @param   array   $atts Optional, additional key/value attributes to include in the SCRIPT tag
 * @return  string
 */
if ( ! function_exists('js'))
{
    function js($file, $atts = array())
    {
        $element = '<script type="text/javascript" src="' . js_url() . $file . '"';

        foreach ( $atts as $key => $val )
            $element .= ' ' . $key . '="' . $val . '"';
        $element .= '></script>'."\n";

        return $element;
    }
}

/**
 * Load Image
 * Creates an <img> tag with src and optional attributes
 * @access  public
 * @param   string
 * @param   array   $atts Optional, additional key/value attributes to include in the IMG tag
 * @return  string
 */
if ( ! function_exists('img'))
{
    function img($file,  $atts = array())
    {
        $url = '<img src="' . img_url() . $file . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= " />\n";
        return $url;
    }
}

/**
 * Load Minified JQuery CDN w/ failover
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('jquery'))
{
    function jquery($version='')
    {
        // Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline
        $out = '<script src="//ajax.googleapis.com/ajax/libs/jquery/'.$version.'/jquery.min.js"></script>'."\n";
        $out .= '<script>window.jQuery || document.write(\'<script src="'.js_url().'jquery-'.$version.'.min.js"><\/script>\')</script>'."\n";
        return $out;
    }
}

/**
 * Load Google Analytics
 * Creates the <script> tag that links all requested js file
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('google_analytics'))
{
    function google_analytics($ua='')
    {
        // Change UA-XXXXX-X to be your site's ID
        $out = "<!-- Google Webmaster Tools & Analytics -->\n";
        $out .='<script type="text/javascript">';
        $out .='    var _gaq = _gaq || [];';
        $out .="    _gaq.push(['_setAccount', '$ua']);";
        $out .="    _gaq.push(['_trackPageview']);";
        $out .='    (function() {';
        $out .="      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;";
        $out .="      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';";
        $out .="      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);";
        $out .="    })();";
        $out .="</script>";
        return $out;
    }
}

if ( ! function_exists('is_user_logged_in'))
{
    function is_user_logged_in()
    {
       if(isset($_SESSION['login_info']))
       {
        $data=$_SESSION['login_info'];
        return $data;
       }
       else
       {
        return false;
       }
    }
}


if ( ! function_exists('get_user'))
{
    function get_user($id)
    {
       $CI =& get_instance();
       $CI->load->model('Base_model');
       $info = $CI->Base_model->get_login_details($id);
       if($info!=NULL)
       {
        return $info;
       }
       else
       {
        return NULL;
       }
        
      
    }
}

if ( ! function_exists('get_current_pos'))
{
    function get_current_pos()
    {
      $ci =& get_instance();
      return $ci->router->fetch_class();
        
      
    }
}
if ( ! function_exists('get_cities'))
{
    function get_cities()
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_cities();
      return $info;  
      
    }
}
if ( ! function_exists('get_countries'))
{
    function get_countries()
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_countries();
      return $info;  
      
    }
}
if ( ! function_exists('get_customer'))
{
    function get_customer($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_customer($id);
      return $info;  
      
    }
}
function preg_trim($subject) {
    $regex = "/\s*(\.*)\s*/s";
    if (preg_match ($regex, $subject, $matches)) {
        $subject = $matches[1];
    }
    return $subject;
}
/* End of file asset_helper.php */
function random_password() 
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array(); 
    $alpha_length = strlen($alphabet) - 1; 
    for ($i = 0; $i < 12; $i++) 
    {
        $n = rand(0, $alpha_length);
        $password[] = $alphabet[$n];
    }
    return implode($password); 
}

if ( ! function_exists('get_employee_meta'))
{
    function get_employee_meta($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_employee_meta($id);
      return $info;  
      
    }
}

if ( ! function_exists('get_employee_login'))
{
    function get_employee_login($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_login_details($id);
      return $info;  
      
    }
}

if ( ! function_exists('get_employee_role'))
{
    function get_employee_role($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_employee_role($id);
      return $info;  
      
    }
}
if ( ! function_exists('get_emp_tab'))
{
    function get_emp_tab($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_emp_tab($id);
      return $info;  
      
    }
}


if ( ! function_exists('get_aircraft'))
{
    function get_aircraft($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->aircraft_details($id);
      return $info;  
      
    }
}

if ( ! function_exists('get_aircraft_images'))
{
    function get_aircraft_images($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_aircraft_images($id);
      return $info;  
      
    }
}

if ( ! function_exists('check_access'))
{
    function check_access($current_tab)
    {
      if(isset($_SESSION['login_info']))
       {
        $data=$_SESSION['login_info'];
        if($data['role']=="employee")
        {
            
            $emp_tab=get_emp_tab($data['uid']);
            if($emp_tab!=NULL):$tabs=unserialize($emp_tab->tabs);else:$tabs=array();endif;
            if(count($tabs)>0)
            {
                $flag=false;
                foreach ($tabs  as $tab) {
                    $temp_tab=explode("|", $tab);
                    if(in_array($current_tab, $temp_tab))
                    {
                        $flag=true;
                    }
                    
                }
                return $flag;
            }
            else
            {
                return false;
            }
        }
        elseif($data['role']=="admin")
        {
            return true;
        }
       }
       else
       {
        return false;
       } 
      
    }
}


if ( ! function_exists('check_cap'))
{
    function check_cap($cap)
    {
      if(isset($_SESSION['login_info']))
       {
            $data=$_SESSION['login_info'];
            if($data['role']=="employee")
            {
              $CI =& get_instance();
              $CI->load->model('Base_model');
              $info = $CI->Base_model->get_cap_status($data['uid'],$cap);
              return $info;
            }
            elseif($data['role']=="admin")
            {
                return 0;
            }
       }
       else
       {
        return false;
       }
      
    }
}


if ( ! function_exists('email_alert'))
{
    function email_alert($to,$from,$message)
    {
      
       $CI =& get_instance();
       $CI->load->library('email');

      $CI->email->from('vishakha@icraftsolutions.net', 'Vishakha');
      $CI->email->to('omkolkata33@gmail.com');
      $CI->email->cc('vishakha@icraftsolutions.net');


      $CI->email->subject('Email Test');
      $CI->email->message('Testing the email class.');

      $CI->email->send();
      
    }
}

if ( ! function_exists('get_city'))
{
    function get_city($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_city($id);
      return $info;  
      
    }
}

if ( ! function_exists('get_country'))
{
    function get_country($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info = $CI->Base_model->get_country($id);
      return $info;  
      
    }
}

if ( ! function_exists('aircrat_base_list'))
{
    function aircrat_base_list()
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $total=$CI->Base_model->total_aircraft_base();
      $info = $CI->Base_model->aircrat_base_list($total,0);
      return $info;  
      
    }
}
if ( ! function_exists('get_operator'))
{
    function get_operator($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_operator($id);
      return $info;  
      
    }
}

if ( ! function_exists('get_quote'))
{
    function get_quote($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_quote($id);
      return $info;  
      
    }
}


if ( ! function_exists('aircraft_exists'))
{
    function aircraft_exists($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->aircraft_exists($id);
      return $info;  
      
    }
}
if ( ! function_exists('relation'))
{
    function relation($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_broker_customer_relation($id);
      return $info;  
      
    }
}
if ( ! function_exists('group_list'))
{
    function group_list()
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_groups();
      
     if($info!=NULL)
     {
      ?>
      <select class="form-control" name="group_name">
      <?php foreach($info as $in):?>
        <option value="<?php echo $in->id;?>"><?php echo $in->group_name;?></option>
      <?php endforeach;?>
      </select>
      <?php
     }
     else {
       ?>
       <select class="form-control" name="group_name">
      <option value="none">None</option>
      </select>
       <?php
     }
      
    }
}

if ( ! function_exists('get_relation_table'))
{
    function get_relation_table()
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_relation();
      if($info!=NULL)
      {
        ?>
        <table class="table table-striped">
                     <thead class="text-primary">
                        <tr>
                           <th>Relations</th>
                           <th></th>
                           <th></th>
                      
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($info as $in):?>
                        <tr>
                        <td class="text-dark"><?php echo $in->relation;?></td>
                        <td>
                        <div class="form-container" style="display: none;">
                        <form action="<?php echo site_url('relations/update_relation');?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $in->id;?>">
                        <input type="text" name="relation" class="form-control" required value="<?php echo $in->relation;?>">
                        <input type="submit" value="Update Relation" class="btn btn-primary">
                        </form>
                        </div>
                        </td>
                        <td>
                        <a href="#" data-value="<?php echo $in->id;?>" class="edit-relation"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="#" data-value="<?php echo $in->id;?>" class="delete-relation"><i class="fa fa-trash" aria-hidden="true"></i></a></td> 

                        </tr>
                     <?php endforeach;?>
                     </tbody>
                  </table>
        <?php
      }
      else
      {
        return $msg="";
      }
      
    }
}
if ( ! function_exists('get_relation'))
{
    function get_relation()
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_relation();
      return $info;
      
    }
}
if ( ! function_exists('get_relationship'))
{
    function get_relationship($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_relationship($id);
      return $info;  
      
    }
}
if ( ! function_exists('get_group'))
{
    function get_group($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_group($id);
      if($info!=NULL)
      {
        return $info->group_name;
      }
      else
      {
        return $msg="";
      }
      
    }
}
if ( ! function_exists('get_relation_one'))
{
    function get_relation_one($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_relation_one($id);
      if($info!=NULL)
      {
        return $info->relation;
      }
      else
      {
        return $msg="";
      }
      
    }
}
if ( ! function_exists('aircraft_registration'))
{
    function aircraft_registration($id)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->aircraft_registration($id);
      return $info;
      
    }
}

if ( ! function_exists('get_meta_data'))
{
    function get_meta_data($unique_id,$type,$meta_key)
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_meta_data($unique_id,$type,$meta_key);
      return $info;
      
    }
}

if ( ! function_exists('get_group_table'))
{
    function get_group_table()
    {
      $CI =& get_instance();
      $CI->load->model('Base_model');
      $info=$CI->Base_model->get_groups();
      if($info!=NULL)
      {
        ?>
        <table class="table table-striped">
                     <thead class="text-primary">
                        <tr>
                           <th>Groups</th>
                           <th></th>
                           <th></th>
                      
                        </tr>
                     </thead>
                     <tbody>
                  
                        <?php foreach($info as $in):?>
                        <tr>
                        <td class="text-dark"><?php echo $in->group_name;?></td>
                        <td>
                        <div class="form-container" style="display: none;">
                        <form action="<?php echo site_url('groups/update_groups');?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $in->id;?>">
                        <input type="text" name="group_name" class="form-control" required value="<?php echo $in->group_name;?>">
                        <input type="submit" value="Update Group" class="btn btn-primary">
                        </form>
                        </div>
                        </td>
                        <td>
                        <a href="#" data-value="<?php echo $in->id;?>" class="edit-relation"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="#" data-value="<?php echo $in->id;?>" class="delete-group"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a href="<?php echo site_url('view_group_details/index/'.$in->id)?>"><i class="fa fa-link" aria-hidden="true"></i></a>
                        </td> 
						
                        </tr>
                     <?php endforeach;?>
                     </tbody>
                  </table>
        <?php
      }
      else
      {
        return $msg="";
      }
      
    }
}