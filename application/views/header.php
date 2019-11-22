<?php 
   if(is_user_logged_in())
   {
      $data=is_user_logged_in();
      $user=get_user($data['uid']);
   }
   else
   {
      redirect('login');
   }
   
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo img_url();?>apple-icon.png" />
      <link rel="icon" type="image/png" href="<?php echo img_url();?>favicon.png" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Tam Aviations</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width" />
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="https://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.css">
      <link href="<?php echo css_url();?>datetimepicker.css" rel="stylesheet">
      <link href="<?php echo css_url();?>material-dashboard.css?v=1.2.0" rel="stylesheet" />
      <link href="<?php echo css_url();?>demo.css" rel="stylesheet" />
      <link href="<?php echo css_url();?>summernote.css" rel="stylesheet" />
      
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css" rel="stylesheet" type="text/css"/>
      <script src="<?php echo js_url();?>jquery-3.2.1.min.js" type="text/javascript"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
       
   </head>
   <body>
      <input type="hidden" class="url" value="<?php echo base_url();?>">
      <div class="wrapper">
      <div class="sidebar" data-color="purple" data-image="<?php echo img_url();?>sidebar-1.jpg">
         <div class="logo">
            <a href="<?php echo base_url();?>" class="simple-text">
            Tam Aviations
            </a>
         </div>
         <div class="sidebar-wrapper">
            <ul class="nav">
               <li <?php if(get_current_pos()=="dashboard"):echo"class='active'";endif;?>>
                  <a href="<?php echo base_url();?>index.php/dashboard">
                     <i class="material-icons">dashboard</i>
                     <p>Dashboard</p>
                  </a>
               </li>
               <li <?php if(get_current_pos()=="checklist"):echo"class='active'";endif;?>>
                  <a href="<?php echo base_url();?>index.php/checklist">
                     <i class="fa fa-check"></i>
                     <p>Check List</p>
                  </a>
               </li>
               <li class="dropdown side_view">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>Profile</a>
                  <ul class="dropdown-menu side_view">
                     <li <?php if(get_current_pos()=="operator_list"):echo"class='active'";endif;?>>
                        <a href="<?php echo base_url();?>index.php/operator_list">
                           <i class="material-icons">flight</i>
                           <p>Operator</p>
                        </a>
                     </li>
                     <li <?php if(get_current_pos()=="all_customers"):echo"class='active'";endif;?>>
                        <a href="<?php echo base_url();?>index.php/all_customers/">
                           <i class="material-icons">people</i>
                           <p>Customers</p>
                        </a>
                     </li>
                     <li <?php if(get_current_pos()=="groups"):echo"class='active'";endif;?>>
                        <a href="<?php echo base_url();?>index.php/groups/">
                           <i class="material-icons">people</i>
                           <p>Customers Groups</p>
                        </a>
                     </li>
                     <li <?php if(get_current_pos()=="all_brokers"):echo"class='active'";endif;?>>
                        <a href="<?php echo base_url();?>index.php/all_brokers">
                           <i class="fa fa-black-tie" aria-hidden="true"></i>
                           <p>Broker</p>
                        </a>
                     </li>
                     <li <?php if(get_current_pos()=="all_employee"):echo"class='active'";endif;?>>
                        <a href="<?php echo base_url();?>index.php/all_employee">
                           <i class="fa fa-user" aria-hidden="true"></i>
                           <p>Employee</p>
                        </a>
                     </li>
                  </ul>
               </li>
               
                     
               <li <?php if(get_current_pos()=="relations"):echo"class='active'";endif;?>>
                  <a href="<?php echo base_url();?>index.php/relations/">
                     <i class="fa fa-grav" ></i>
                     <p>Relations</p>
                  </a>
               </li>
                 
               <li class="dropdown side_view">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plane"></i>Aircraft</a>
                  <ul class="dropdown-menu side_view">
                  <li <?php if(get_current_pos()=="add_aircraft"):echo"class='active'";endif;?>>
                        <a href="<?php echo site_url('add_aircraft');?>">
                           <i class="fa fa-paper-plane"></i>
                           <p>Add Aircraft</p>
                        </a>
                     </li>
                     <li <?php if(get_current_pos()=="aircraft_search"):echo"class='active'";endif;?>>
                        <a href="<?php echo site_url('aircraft_search');?>">
                           <i class="fa fa-paper-plane"></i>
                           <p>Aircraft Search</p>
                        </a>
                     </li>
                     <li <?php if(get_current_pos()=="all_aircraft"):echo"class='active'";endif;?>>
                        <a href="<?php echo site_url('all_aircraft');?>">
                           <i class="fa fa-paper-plane"></i>
                           <p>All Aircraft</p>
                        </a>
                     </li>
                     <li <?php if(get_current_pos()=="aircraft_type_list"):echo"class='active'";endif;?>>
                        <a href="<?php echo site_url('aircraft_type_list');?>">
                           <i class="fa fa-plane"></i>
                           <p>Aircraft Type</p>
                        </a>
                     </li>
                  </ul>
               </li>
               <li <?php if(get_current_pos()=="quote"):echo"class='active'";endif;?>>
                  <a href="<?php echo base_url();?>index.php/quote/index/all">
                     <i class="material-icons">content_copy</i>
                     <p>Quotation</p>
                  </a>
               </li>
               <li>
                  <a href="">
                     <i class="material-icons">monetization_on</i>
                     <p>Invoice</p>
                  </a>
               </li>

                <li>
                    <a href="<?php echo base_url();?>index.php/payments/index">
                        <i class="material-icons">monetization_on</i>
                        <p>Payments</p>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>index.php/paymentstats/index">
                        <i class="material-icons">monetization_on</i>
                        <p>Payments Status</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/emptyleg/index">
                        <i class="material-icons">monetization_on</i>
                        <p>Empty Leg</p>
                    </a>
                </li>

               <!--<li <?php if(get_current_pos()=="locations"):echo"class='active'";endif;?>>
                  <a href="">
                     <i class="fa fa-map-marker"></i>
                     <p>Locations</p>
                  </a>
                  </li>-->
               <!--<li <?php if(get_current_pos()=="locations"):echo"class='active'";endif;?>>
                  <a href="<?php echo site_url('aircraft_base');?>">
                     <i class="fa fa-plane"></i>
                     <p>Aircraft Base</p>
                  </a>
                  </li>-->
            
                     
                     
               <li>
                  <a href="<?php echo base_url();?>index.php/logout">
                     <i class="material-icons">power_settings_new</i>
                     <p>Logout</p>
                  </a>
               </li>
            </ul>
         </div>
      </div>
      <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand">Hellow  <?php echo $user->display_name;?></a>
            </div>
            <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                  <li>
                     <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                     </a>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cogs"></i>
                        <!--  <span class="notification"></span> -->
                        <p class="hidden-lg hidden-md">Notifications</p>
                     </a>
                     <ul class="dropdown-menu">
                        <li>
                           <a href="<?php echo base_url();?>index.php/logout">Log Out</a>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="<?php echo site_url('user_profile');?>" >
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                     </a>
                  </li>
               </ul>
               <form class="navbar-form navbar-right" role="search" method="post" action="<?php echo site_url('search');?>">
                  <div class="form-group  is-empty">
                     <input type="text" class="form-control" placeholder="Search" name="search_field">
                     <input type="hidden" name="search_type" value="<?php echo get_current_pos();?>">
                     <?php  //echo get_current_pos();?>
                     <span class="material-input"></span>
                     <?php
                        $pos=get_current_pos();
                        if($pos=='operator_list' || $pos=='add_operator' || $pos=='edit_operator' || $pos=='all_customers' || $pos=='add_customer' || $pos=='edit_customer'):
                        ?>      
                     <select class="form-control" name="search-country">
                        <option value="0">Select Country</option>
                        <?php 
                           $get_countries=get_countries();
                           foreach($get_countries as $country):?>
                        <option value="<?php  echo $country['id'];?>"><?php  echo $country['name'];?></option>
                        <?php endforeach;?>
                     </select>
                     <?php endif;?>
                  </div>
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                     <i class="material-icons">search</i>
                     <div class="ripple-container"></div>
                  </button>
               </form>
               <a href="#" class="navbar-right back-icon"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
            </div>
         </div>
      </nav>