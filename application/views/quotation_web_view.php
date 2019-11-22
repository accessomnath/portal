<!doctype html>
<html lang="en">
<head>
  <title>Tam Aviation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="https://portal.tamprivateaviation.com/assets/img/favicon.png" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <style type="text/css">

    html{
      font-family: 'Open Sans', sans-serif;
      font-size: 90%;
    }
    a{
      color: #d4931b!important;
    }
    a.active{
      color:#000!important;
    }
    span i{
      color: #d4931b;
    }
    header{
      background: #efefef;
      padding-bottom: 0.5rem;

    }
    .logo{
      max-height: 180px;
    }
    .content h3,
    .content h4,
    .content h5,
    .content h6{
      color: #d4931b;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
      color: #495057;
      background-color: #edc364;
      border-color: #be9215 #dee2e6 #fff;
    }

    section.destinations .item .destination-des-short-name{
      transform: translateY(-50%);

      width: 80%;

      margin: 0 auto;
      padding-bottom: 0.25rem;
    } 
    section.destinations .item .destination-des-short-name .row{
      border:0.5px solid #333;
      background: #efefef;
      border-radius: 100px;
      box-shadow: 0 0 5px rgba(0,0,0,0.3);
    }
    section.destinations .item .destination-des-short-name .row .col span{
      color:#d4931b ;
    }
    .bg-gray{
      background: #e1e1e1e1;
    }
    .bg-lightgray{
      background:#efefef;
    }
    [id$="-gallery"]{
      max-height: 600px;
      overflow-y: auto;
    }
    .jurny-full-name span.name{
      width: max-content;
      margin: 0 auto;
      display: block;
    }
    @media(max-width: 540px){
      html{
        font-size: 62.5%;
      }
      .jurny-full-name span.name{
        width: auto;
        min-height: 70px;
        display: flex;
        align-items: center;
      }
    }
  </style>
</head>
<body>
  <?php
  $exact = "-";
  $customer = get_customer($quote->customer_id); ?>
  <div class="app-tam-aviation">
    <header>
      <div class="container">
        <div class="row">
         <div class="col-md-12 text-center pt-3 pt-2 border-bottom border-dark">
          <h1>Quotation</h1>
        </div>
        <div class="col-md-6 col-6">
          <div class="logo text-left w-md-50">
            <?php $logo_visible = get_meta_data($quote->id, 'quote', 'logo_visible');
            echo ($logo_visible != NULL ? ($logo_visible->meta_value == "Yes" ? '<img src="'.img_url().'aviation-logo.png" class="logo img-fluid">' : '') : '<img src="'.img_url().'aviation-logo.png" class="logo img-fluid">');
            ?>

          </div>
        </div>
        <?php $contact_number = get_meta_data($quote->id, 'quote', 'contact_number');
        $phone = ($contact_number != NULL ? 'Sales Mob:' . $contact_number->meta_value : 'Sales Mob:+966500001002');
        ?>
        <div class="col-md-6 col-6 text-right pt-2">
          <?php $contact_visible = get_meta_data($quote->id, 'quote', 'contact_visible');
          echo ($contact_visible != NULL ? ($contact_visible->meta_value == "Yes" ? '<h2>Tam Private Aviation</h2><address>Prince Sultan Road<br>Jeddah, KSA?<br>CR:4030173198<br>'.$phone.'</address>' : '') : '<h2>Tam Private Aviation</h2><address>Prince Sultan Road<br>Jeddah, KSA?<br>CR:4030173198<br>'.$phone.'</address>');
          ?>
          <?php $date_booking=new DateTime($quote->booking_date);?>
          <p><strong>Booking ID</strong>&nbsp;&nbsp;&nbsp;&nbsp;<span class="h2"><?php echo '0000'.$quote->id;?></span></p>
          <p><strong>Booking Date</strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date_booking->format('D, d M Y');?></p>


        </div>
      </div>
    </div>
  </header>
  <section class="destinations border-top border-dark pt-5 pb-5">
    <div class="container">
    <div class="content">
    <h4>Hey <?php echo $customer->name;?></h4>
    <p>Thank you for booking with Tam Aviation</p>
    <p>Please Find the link to view the Quotation for your journey below</p>
    <span><i class="fas fa-print"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="<?php echo site_url('edit_quote/quotation_briefing_pdf/'.$quote->id)?>" target="_blank">View Quotation</a>/<a href="<?php echo site_url('edit_quote/quotation_briefing_pdf/'.$quote->id)?>" download>Download Quotation</a> 
  </div>
    <div class="content">
    <h4>Package Itinerary</h4><br>
    
    <table border="1">
      <tr>
        <td colspan="3">Traveller's Details</td>
      </tr>
      <tr>
        <td><span><i class="fas fa-user"></i></span> <?php echo $customer->name;?></td>
        <td><span><i class="fas fa-phone"></i> Registered Phone</span> <?php echo $customer->phone;?></td>
        <td><span><i class="far fa-envelope"></i> Registered Email</span> <?php echo $customer->email;?></td>

      </tr>
    </table>
    </div>
      <?php $top_content = get_meta_data($quote->id, 'quote', 'top_content');
      if ($top_content != NULL):
        ?> 
      <div class="content">
        <?php echo $top_content->meta_value; ?>
      </div>
    <?php else:?>
      <h4>Proposed Schedule:</h4>
      <p>Schedule subject to the original flight date, time and any circumstances that might appear,
    subject to slots, Traffic Rights / Over flight clearances and any other necessary permits or
    authorizations, for the performance of the flights(s)<br></p> 
      <?php
      endif; ?>
      <?php if (count($depart) > 0 || count($arrive) > 0): ?>
        <div class="row">
          <?php
          $max = (count($depart) > count($arrive) ? count($depart) : count($arrive));
          $date = $quote->departure_date;
          $departure_date = array();
          if (strlen($date) > 0) {
            $departure_date = unserialize($date);
          }
          $duration = $quote->flight_duration;
          $flight_duration = array();
          if (strlen($duration) > 0) {
            $flight_duration = unserialize($duration);
          }
          for ($i = 0;$i < $max;$i++) {
            $time = (isset($flight_duration[$i]) ? $flight_duration[$i] : '');
            $new_time = '';
            if (strlen($time) > 0) {
              $tot_time = explode(":", $time);
              $new_time = $tot_time['0'] . 'Hrs ' . $tot_time['1'] . 'mins';
            }
            if(isset($depart[$i]) && isset($arrive[$i])):
              $depart_param=explode(',', $depart[$i]);
            $arrive_param=explode(',', $arrive[$i]);
            ?>  
            <div class="col-md-12 p-0 mt-5">
              <div class="item border border-dark rounded shadow-sm  m-2">
                <div class="destination-des-short-name">
                  <div class="row m-0">
                    <div class="col p-0 text-center pt-1 pb-2">
                      <span class="h5">(<?php echo $depart_param['0'];?>)</span>
                    </div>
                    <div class="col p-0 text-center">
                      <img src="<?php echo img_url();?>flight-mark.png"/ alt="flight" class="img-fluid">
                    </div>
                    <div class="col p-o text-center pt-1 pb-2">
                      <span class="h5">(<?php echo $arrive_param['0'];?>)</span>
                    </div>
                  </div>
                </div>
                <div class="date text-center">
                  <h5> 
                    <?php
                    if (isset($departure_date[$i])) {
                      $d = new DateTime($departure_date[$i]);
                            $timestamp = $d->getTimestamp(); // Unix timestamp
                            echo $formatted_date = '<span class="h2"><i class="far fa-calendar-alt"></i> </span>'.$d->format('d/ m/ Y');
                          }
                          ?>&nbsp;&nbsp;&nbsp;&nbsp;
                          <?php
                        if (isset($departure_date[$i])) {
                      $d = new DateTime($departure_date[$i]);
                            $timestamp = $d->getTimestamp(); // Unix timestamp
                            echo $formatted_date = '<span class="h2"><i class="far fa-clock"></i> </span>'.$d->format('H:m A');
                          }
                          ?>
                          &nbsp;&nbsp;&nbsp;&nbsp;
                          <span class="h2"><i class="fas fa-hourglass-half"></i></span> <?php echo $new_time; ?>

                        </h5>

                      </div>
                      <div class="jurny-full-name p-2 mb-2 ">
                        <div class="row m-0">
                          <div class="col p-0 text-center">
                            <h5><span class="h2"> <i class="fas fa-plane-departure"></i></span> Deprature </h5>
                            <span class="border name rounded p-1"><?php echo (isset($depart[$i]) ? $depart[$i] : ''); ?></span>
                          </div>
                          <div class="col p-0 text-center">
                            <h5><span class="h2"> <i class="fas fa-plane-arrival"></i> </span> Arrival</h5>
                            <span class="border name rounded p-1"><?php echo (isset($arrive[$i]) ? $arrive[$i] : ''); ?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
                  endif;
                }?>
              </div> 
            <?php endif;?>
          </div>
        </section>
        <?php
        $prefer = $quote->prefer_list;
        $prefer_list = array();
        if (strlen($prefer) > 0) {
         $prefer_list = unserialize($prefer);
       }
       if (count($prefer_list) > 0):
         $our_price = $quote->our_price;
       $prices = array();
       if (strlen($our_price) > 0) {
         $prices = unserialize($our_price);
       }
      

       ?>
       <section class="flights pt-5 pb-5">
        <div class="container">
          <div class="heading w-75 border-top border-bottom mx-auto border-dark text-center">
            <h2>Please Find The Aircraft Configuration Below</h2>
          </div>

          <div class="row mt-4">
            <div class="col-md-12 p-0">
              <ul class="nav nav-tabs" role="tablist">
                <?php 
              $active=319;
              foreach ($prefer_list as $value):
                    $present = aircraft_exists($value);
                   if ($present > 0):
                    $air_data = get_aircraft($value);
              ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($active==319?'active':'');?>" data-toggle="tab" href="#airbus-<?php echo $active?>"><?php echo $air_data->ArName; ?></a>
                </li>
                
               <?php 
                $active++;
                endif;
                endforeach;?>
              </ul>
              <div class="tab-content shadow bg-gray">
              <?php 
              $active_tab=319;
              foreach ($prefer_list as $value):
                    $present = aircraft_exists($value);
                   if ($present > 0):
                    $air_data = get_aircraft($value);
              ?>
               <?php $images = get_aircraft_images($value);
               if ($images != NULL):
                   $total_remain = count($images) % 2;
                   if ($total_remain != 0) {
                       $new_count = count($images) - $total_remain + 2;
                   } else {
                       $new_count = count($images);
                   }
                   
                 ?>
                <div id="airbus-<?php echo $active_tab;?>" class="tab-pane <?php echo ($active_tab==319?'active':'fade');?>">
                  <div class="row m-0">
                    <div class="col-md-2 p-0">
                       <ul class="nav nav-tabs flex-column mt-3" role="tablist">
                       
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#airbus-<?php echo $active_tab;?>-gallery">Photo Gallery</a>
                        </li>
                       
                       </ul>
                    </div>
                    <div class="col-md-10 p-0 border-left">
                      <div class="tab-content bg-lightgray">
                       
                        <div id="airbus-<?php echo $active_tab;?>-gallery" class="tab-pane pb-3 active">
                          <div class="heading text-center pt-3 mb-3">
                            <h4><?php echo $air_data->ArName; ?> Images</h4>
                          </div>
                          <div class="row m-0">
                          <?php for ($i = 0;$i < $new_count;$i++) {?>
                          <?php if (isset($images[$i])):?>
                            <a class="col-md-4 col-6 p-1" data-toggle="lightbox" data-gallery="airbus-<?php echo $active_tab;?>-gallery"  href="<?php echo upload_url() . $images[$i]->image;?>">
                              <img src="<?php echo upload_url() . $images[$i]->image;?>" class="img-fluid img-thumbnail rounded shadow-sm" />
                            </a>
                          <?php endif;?>
                           <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <?php 
                endif;
                $active_tab++;
                endif;
                endforeach;?>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php endif;?>
    </div>
    <link rel="stylesheet" type="text/css" href="<?php echo css_url();?>ekko-lightbox.css"/>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo js_url();?>ekko-lightbox.js"></script>
    <script type="text/javascript">
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
      });

    </script>
  </body>
  </html>