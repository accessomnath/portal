


$(function(){

  // Cache some selectors

  var clock = $('#clock'),
    alarm = clock.find('.alarm'),
    ampm = clock.find('.ampm');

  // Map digits to their names (this will be an array)
  var digit_to_name = 'zero one two three four five six seven eight nine'.split(' ');

  // This object will hold the digit elements
  var digits = {};

  // Positions for the hours, minutes, and seconds
  var positions = [
    'h1', 'h2', ':', 'm1', 'm2', ':', 's1', 's2'
  ];

  // Generate the digits with the needed markup,
  // and add them to the clock

  var digit_holder = clock.find('.digits');

  $.each(positions, function(){

    if(this == ':'){
      digit_holder.append('<div class="dots">');
    }
    else{

      var pos = $('<div>');

      for(var i=1; i<8; i++){
        pos.append('<span class="d' + i + '">');
      }

      // Set the digits as key:value pairs in the digits object
      digits[this] = pos;

      // Add the digit elements to the page
      digit_holder.append(pos);
    }

  });

  // Add the weekday names

  var weekday_names = 'MON TUE WED THU FRI SAT SUN'.split(' '),
    weekday_holder = clock.find('.weekdays');

  $.each(weekday_names, function(){
    weekday_holder.append('<span>' + this + '</span>');
  });

  var weekdays = clock.find('.weekdays span');


  // Run a timer every second and update the clock

  (function update_time(){

    // Use moment.js to output the current time as a string
    // hh is for the hours in 12-hour format,
    // mm - minutes, ss-seconds (all with leading zeroes),
    // d is for day of week and A is for AM/PM

    var now = moment().format("hhmmssdA");

    digits.h1.attr('class', digit_to_name[now[0]]);
    digits.h2.attr('class', digit_to_name[now[1]]);
    digits.m1.attr('class', digit_to_name[now[2]]);
    digits.m2.attr('class', digit_to_name[now[3]]);
    digits.s1.attr('class', digit_to_name[now[4]]);
    digits.s2.attr('class', digit_to_name[now[5]]);

    // The library returns Sunday as the first day of the week.
    // Stupid, I know. Lets shift all the days one position down, 
    // and make Sunday last

    var dow = now[6];
    dow--;
    
    // Sunday!
    if(dow < 0){
      // Make it last
      dow = 6;
    }

    // Mark the active day of the week
    weekdays.removeClass('active').eq(dow).addClass('active');

    // Set the am/pm text:
    ampm.text(now[7]+now[8]);

    // Schedule this function to be run again in 1 sec
    setTimeout(update_time, 1000);

  })();

  // Switch the theme

  $('a.button').click(function(){
    clock.toggleClass('light dark');
  });

});




 (function($) {
$.fn.donetyping = function(callback){
    var _this = $(this);
    var x_timer;    
    _this.keyup(function (){
        clearTimeout(x_timer);
        x_timer = setTimeout(clear_timer, 200);
    }); 

    function clear_timer(){
        clearTimeout(x_timer);
        callback.call(_this);
    }
}
})(jQuery);

 $(document).ready( function () {
    //var journey_type=$("input[type=radio][name='journey_type']:checked").val();
    $('#picker').dateTimePicker();
    $('#picker2').dateTimePicker();
    $('#picker3').dateTimePicker();
    $('#picker4').dateTimePicker();


    // if(journey_type=="twoway")
    //     {
    //     $('#picker2').dateTimePicker();
    //     }
    // else
    //     {
    //       $('#picker2').html('<br><br>');
    //     }

    var result=$("#result").val();
   
    if(result!== undefined)
    {
      var res=result.split(" ");
        $('#picker span').first().html(res['0']);
        $('#picker span').last().html(res['1']);
    }
    
     var result2=$("#result2").val();
     if(result2!==undefined)
     {
       var res2=result2.split(" "); 
      $('#picker2 span').first().html(res2['0']);
      $('#picker2 span').last().html(res2['1']);
          }

      var result3=$("#result3").val();
     if(result3!==undefined)
     {
       var res3=result3.split(" "); 
      $('#picker3 span').first().html(res3['0']);
      $('#picker3 span').last().html(res3['1']);
          }
      var result4=$("#result4").val();
     if(result4!==undefined)
     {
       var res4=result4.split(" "); 
      $('#picker4 span').first().html(res4['0']);
      $('#picker4 span').last().html(res4['1']);
          }


      });

   

$('input.number').on('keyup', function (event) {
  if (event.which >= 37 && event.which <= 40) return;

  this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '-');
});

$('body').on("contextmenu",function(e){

        //return false;
});


$(document).ready(function(){
    var journey_type=$("input[type=radio][name='journey_type']:checked").val();
    if(journey_type=="multi-leg")
    {
      $("#Sigle_trip").hide();
      $("#Sigle_trip input").val("");
      $(".add-multi-city").show();

    }
    else
    {   
      if($(".add-multi-city").hasClass("add-check"))
      {

        $(".add-multi-city").show();
      }
      else
      {
        $(".add-multi-city").hide();
      }
      
    }

    $("#picker2").click(function(){
      // if(journey_type!="twoway")
      //   {
            
      //       return false;
      //   }
        });

    if(journey_type=="twoway")
    {
        
        $(".arrival_date").prop('disabled', false);
        $(".date-flight").show();
    }
    else
    {
        $(".date-flight").hide();
        $(".arrival_date").prop('disabled', true);
    }
    
    var bedroom=$('select[name=ArBedroom]').find(':selected').text();
    if(bedroom=="Yes")
    {
        $(".bed-setup-display").show();
    }
});


  function live_search(filter,list_class,url,classes)
  {
    
    if(filter.length>0)
        {
          $(".content").find(list_class).show();
          // $(list_class).show();
          $.ajax({
            url: url,
            type: 'POST',
            data: {
                data: filter,classes: classes
            },
            success: function(data) {

                if(data.length>0)
                {
                    
                    $(list_class).html(data);
                }
                
                

            }
        });
        }
        
  }


  $(document).ready(function(){

    $(".content").on('keyup','#filter',function(){
        var filter = $(this).val();
        var list_class=".checklist-client-search";
        var url=$(".url").val();
        var classes="cust-detail";
        url=url+'index.php/checklist/client_filter';
        live_search(filter,list_class,url,classes);
    });
    
    $(".content").on('keyup','#filter2',function(){
        var filter = $(this).val();
        var list_class=".checklist-client-search";
        var url=$(".url").val();
        var classes="cust-detail";
        url=url+'index.php/checklist/client_filter';
        live_search(filter,list_class,url,classes);
    });


    $("#departure-address").keyup(function(){
      var filter = $(this).val();
      var list_class=".departure-list";
      var url=$(".url").val();
      var classes="departure-detail";
      url=url+'index.php/checklist/airbase_filter';
      live_search(filter,list_class,url,classes);
    });

    $(".registrtaion_list_text").keyup(function(){
      var filter = $(this).val();
      var list_class=".registrtaion_list";
      var url=$(".url").val();
      var classes="reg-detail";
      url=url+'index.php/aircraft_search/reg_search';
      live_search(filter,list_class,url,classes);
    });

    $("#arrival-address").keyup(function(){
      var filter = $(this).val();
      var list_class=".arrival-list";
      var url=$(".url").val();
      var classes="arrival-detail";
      url=url+'index.php/checklist/airbase_filter';
      live_search(filter,list_class,url,classes);
    });

    $(".aircraft_base").keyup(function(){
      var filter = $(this).val();
      var list_class=".aircraft-base-list";
      var url = $(".url").val();
      $.ajax({
        url: url + 'index.php/aircraft_base/airport_filter',
        type: 'POST',
        data: {
            data: filter
        },
        success: function(data) {

            if(data.length>0)
            {
                $(list_class).show();
                $(list_class).html(data);
            }
            else
            {
                $(list_class).hide();
            }
            

        }
    });
      
    });
    $(".aircraft_type").keyup(function(){
      var filter = $(this).val();
      var list_class=".aircraft-type-list";
      var url = $(".url").val();
      $.ajax({
        url: url + 'index.php/register_aircraft/aircraft_type_filter',
        type: 'POST',
        data: {
            data: filter
        },
        success: function(data) {
            $(list_class).show();
            $(list_class).html(data);

        }
    });
      
    });
    $(".content").on('click','.type-filter-name',function(e){
    e.preventDefault();
  var text=$(this).text();
  $(".aircraft_type").val(text);
  $(".aircraft-type-list").fadeOut();
  });

  $(".content").on('click','.base-detail',function(e){
    e.preventDefault();
  var text=$(this).text();
  $(".aircraft_base").val(text);
  $(".lists_of_aircraft").fadeOut();
  });
  $(".content").on('click','.reg-detail',function(e){
    e.preventDefault();
  var text=$(this).text();
  $(".registrtaion_list_text").val(text);
  $(".registrtaion_list").fadeOut();
  });

    $(".content").on('click','.departure-detail',function(e){
        e.preventDefault();
      var id=$(this).data('value');
      var departure_address=$(this).text();
      $(".departure_airport").val(id);
      $("#departure-address").val(departure_address);
      $(".departure-list").fadeOut();
    });
    $(".content").on('click','.arrival-detail',function(e){
        e.preventDefault();
      var id=$(this).data('value');
      var arrival_address=$(this).text();
      $(".arrival_airport").val(id);
      $("#arrival-address").val(arrival_address);
      $(".arrival-list").fadeOut();
    });
    
   

    $(".content").on('click','.cust-detail',function(e){
        e.preventDefault();
      var id=$(this).data('value');
      var phone=$(this).data('phone');
      var name=$(this).text();

      var url=$(".url").val();  
      url=url+'index.php/checklist/check_group';
    $.ajax({
            url: url,
            type: 'POST',
            data: {
                id: id
            },
            success: function(data) {

                if(data.length>0)
                {
                   
                    $('.group-listing').html(data);

                }
                else
                {
                  $(".group-listing").html('');
                }
            }
        });



      $(".customer_id").val(id);
      $(".cust_name").val(name);
      $(".cust_phone").val(phone);
    });
    $(".add_checklist_return .full-bedroom-change").on('change',function(){
        var val=$(this).val();

        if(val=="No")
        {
            $(".add_checklist_return .bed-setup-display").fadeIn();
            $(".add_checklist_return .bed-location-display").fadeOut();
            $(".add_checklist_return .ArBedroomLocation").val('');
        }
        else if(val=="Yes")
        {
            $(".add_checklist_return .bed-setup-display").fadeOut();
            $(".add_checklist_return .ARBedStup").val('');
            $(".add_checklist_return .bed-location-display").fadeIn();
        }
        
    });

    $(".register-aircraft .full-bedroom-change").on('change',function(){
        var val=$(this).val();

        if(val=="No")
        {
            $(".register-aircraft .bed-setup-display").fadeIn();
            $(".register-aircraft .bed-location-display").fadeOut();
            $(".register-aircraft .ArBedroomLocation").val('');
        }
        else if(val=="Yes")
        {
            $(".register-aircraft .bed-setup-display").fadeOut();
            $(".register-aircraft .ARBedStup").val('');
            $(".register-aircraft .bed-location-display").fadeIn();
        }
        
    });

    $(".edit_aircraft .full-bedroom-change").on('change',function(){
        var val=$(this).val();

        if(val=="No")
        {
            $(".edit_aircraft .bed-setup-display").fadeIn();
            $(".edit_aircraft .bed-location-display").fadeOut();
            $(".edit_aircraft .ArBedroomLocation").val('');
        }
        else if(val=="Yes")
        {
            $(".edit_aircraft .bed-setup-display").fadeOut();
            $(".edit_aircraft .ARBedStup").val('');
            $(".edit_aircraft .bed-location-display").fadeIn();
        }
        
    });


    $(".add_checklist_multi .full-bedroom-change").on('change',function(){
        var val=$(this).val();

        if(val=="No")
        {
            $(".add_checklist_multi .bed-setup-display").fadeIn();
            $(".add_checklist_multi .bed-location-display").fadeOut();
            $(".add_checklist_multi .ArBedroomLocation").val('');
        }
        else if(val=="Yes")
        {
            $(".add_checklist_multi .bed-setup-display").fadeOut();
            $(".add_checklist_multi .ARBedStup").val('');
            $(".add_checklist_multi .bed-location-display").fadeIn();
        }
        
    });

    $(".add_checklist .full-bedroom-change").on('change',function(){
        var val=$(this).val();

        if(val=="No")
        {
            $(".add_checklist .bed-setup-display").fadeIn();
            $(".add_checklist .bed-location-display").fadeOut();
            $(".add_checklist .ArBedroomLocation").val('');
        }
        else if(val=="Yes")
        {
            $(".add_checklist .bed-setup-display").fadeOut();
            $(".add_checklist .ARBedStup").val('');
            $(".add_checklist .bed-location-display").fadeIn();
        }
        
    });

    $(".wifi-change").on('change',function(){
      var val=$(this).val();
      if(val=="No")
      {
        $(".wifi-charge-container").fadeOut();
        $(".wifi_charge").val('');
      }
      else
      {
        $(".wifi-charge-container").fadeIn();

      }
    });
    $(".smoking").on('change',function(){
      var val=$(this).val();
      if(val=="No")
      {
        $(".smoking-charge-container").fadeOut();
        $(".smoking_charge").val('');
        
      }
      else
      {
        $(".smoking-charge-container").fadeIn();
      }
    });


    
});

$(document).ready(function(){
 var smoking= $(".smoking").val();
 if(smoking=="No")
      {
        $(".smoking-charge-container").fadeOut();
        $(".smoking_charge").val('');
        
      }
      else if(smoking=="Yes")
      {
        $(".smoking-charge-container").fadeIn();
      }
  var wifi=$(".wifi-change").val();
  if(wifi=="No")
      {
        $(".wifi-charge-container").fadeOut();
        $(".wifi_charge").val('');
      }
      else if(wifi="Yes")
      {
        $(".wifi-charge-container").fadeIn();

      }
  var bed=$(".add_checklist .full-bedroom-change").val();
  if(bed=="No")
        {
            $(".add_checklist .bed-setup-display").fadeIn();
            $(".add_checklist .bed-location-display").fadeOut();
            $(".add_checklist .ArBedroomLocation").val('');
        }
        else if(bed=="Yes")
        {
            $(".add_checklist .bed-setup-display").fadeOut();
            $(".add_checklist .ARBedStup").val('');
            $(".add_checklist .bed-location-display").fadeIn();
        }
  var bed2=$(".add_checklist_return .full-bedroom-change").val();
  if(bed2=="No")
        {
            $(".add_checklist_return .bed-setup-display").fadeIn();
            $(".add_checklist_return .bed-location-display").fadeOut();
            $(".add_checklist_return .ArBedroomLocation").val('');
        }
        else if(bed2=="Yes")
        {
            $(".add_checklist_return .bed-setup-display").fadeOut();
            $(".add_checklist_return .ARBedStup").val('');
            $(".add_checklist_return .bed-location-display").fadeIn();
        }
  var bed3=$(".add_checklist_multi .full-bedroom-change").val();
  if(bed3=="No")
        {
            $(".add_checklist_multi .bed-setup-display").fadeIn();
            $(".add_checklist_multi .bed-location-display").fadeOut();
            $(".add_checklist_multi .ArBedroomLocation").val('');
        }
        else if(bed3=="Yes")
        {
            $(".add_checklist_multi .bed-setup-display").fadeOut();
            $(".add_checklist_multi .ARBedStup").val('');
            $(".add_checklist_multi .bed-location-display").fadeIn();
        }
});


function show_hide(x)
         {
         if (x==1) {
            //  document.getElementById('date_return').disabled=true;
            // $("#Multi-Leg,#Multi-Leg2,#Multi-Leg3,#Multi-Leg4").hide();
            $("#Sigle_trip").show();  
            $(".add-multi-city").hide(); 
            $(".arrival_date").prop('disabled', true);
            $('#picker2').html('<br><br>');
            $('#picker2').removeClass('dtp_main');
            $(".multi-trip").html('');
             $(".date-flight").hide();

         }
         else if (x==2) {
             //$("#Multi-Leg,#Multi-Leg2,#Multi-Leg3,#Multi-Leg4").hide();
              // $("#Sigle_trip").show();
              
              $(".add-multi-city").hide();
              $(".arrival_date").prop('disabled', false);
              $('#picker2').dateTimePicker();
              $(".multi-trip").html('');
             $(".date-flight").show();

             // document.getElementById('date_return').disabled=false;
             // document.getElementById('txtarrive').style.display="block";
             // document.getElementById('colmuxto').style.display="block";
             
         }
         else if (x==3) {
             //  $("#Multi-Leg,#Multi-Leg2,#Multi-Leg3,#Multi-Leg4").show();
             //    $("#Sigle_trip input").val("");
             $('#picker2').html('<br><br>');
             $('#picker2').removeClass('dtp_main');
             $(".add-multi-city").show();
             $(".arrival_date").prop('disabled', true);
             $(".date-flight").hide();
         }
         }

$(document).ready(function(){
    var count=1;
    var k=5;
    $(".add-multi-city").click(function(){

    var html='<div class="multi-parent-container"><div class="col-md-3"><div class="form-group label-floating parent">';
    html=html+'<label class="control-label">From <span class="imp"> *</span></label>';
    html=html+'<input type="text" class="form-control default-address add'+count+'"  name="departure_address[]" value="" autocomplete="from">';
    html=html+'<ul class="lists_of_aircraft default-list'+count+'" style="display: none;"></ul>';
    html=html+'<input type="hidden" class="count-num" value="'+count+'">';
    html=html+'<span class="material-input"></span>';
    html=html+'</div></div>';
    count++;
    html=html+'<div class="col-md-3"><div class="form-group label-floating parent">';
    html=html+'<label class="control-label">To <span class="imp"> *</span></label>';
    html=html+'<input type="text" class="form-control default-address add'+count+'"  name="arrival_address[]" value="" autocomplete="off">';
    html=html+'<ul class="lists_of_aircraft default-list'+count+'" style="display: none;"></ul>';
    html=html+'<input type="hidden" class="count-num" value="'+count+'">';                     
    html=html+'<span class="material-input"></span></div></div>';
    html=html+'<div class="col-md-2"><div class="form-group label-floating is-focused">';
    html=html+'<label class="control-label">Estimated Time Of Departure</label>';
    html=html+'<input type="datetime-local" class="form-control" name="departure_date[]">';
    html=html+'</div></div>';

    html=html+'<div class="col-md-2">';
    html=html+'<div class="form-group label-floating is-focused">';
    html=html+'<label class="control-label">Flight Duration</label>';
    html=html+'<input type="time" class="form-control" name="flight_duration[]">';
    html=html+'</div>';
    html=html+'</div>';
    html=html+'<div class="col-md-2"><a href="#" class="remove-multi-row"><i class="fa fa-times" aria-hidden="true"></i></a></div>';

    html=html+'</div>';    
                      
    count++;
    k++;
    $('.multi-trip').append(html);  
    var picker_id="#picker"+k;
    $("body").find(picker_id).html("hellow");
    // $(".content").on('find',picker_id,function(){
    //   // $(this).dateTimePicker();
    //   alert("hellow");
    // });

});
$('.content').on('click','.remove-multi-row',function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
});

$('.content').on('keyup','.default-address',function(){
    var filter = $(this).val();
    var num=$(this).parent().children('.count-num').val();
    var list_class=$(this).parent().children('.count-num').val();
    var classes="default-detail"+list_class+' default-detail-click';
    var list_class='.default-list'+list_class;
    var url=$(".url").val();  
    url=url+'index.php/checklist/airbase_filter';
    
    $('body').find(list_class).show();
    $.ajax({
            url: url,
            type: 'POST',
            data: {
                data: filter,classes: classes,count:num
            },
            success: function(data) {

                if(data.length>0)
                {
                    
                    $('body').find(list_class).html(data);

                }
                
                

            }
        });
});

$('.content').on('click','.default-detail-click',function(e){
    e.preventDefault();
    var departure_address=$(this).text();
    var count_num=$(this).data('num');
    $(".add"+count_num).val(departure_address);
});





});




$(document).ready(function() {
    var referrer = document.referrer;
    $(".back-icon").click(function(e) {
        e.preventDefault();
        window.location.href = referrer;
    });

});

function delete_data(url,msg)
{
   var r = confirm(msg);
    if (r != false) {
        window.location.href = url;
    } else {
        return false;
    } 
}

$(".delete-aircraft").click(function(e) {
    e.preventDefault();
    var msg = "Are You Sure You Want to DELETE the Aircraft doing so you will loose all the data";
    var url = $(".url").val();
    var id = $(this).data('value');
    url=url + 'index.php/edit_aircraft/delete_aircraft/' + id;
    delete_data(url,msg);    

});


$(".delete-operator").click(function(e) {
    e.preventDefault();
    var msg = "Are You Sure You Want to DELETE the operator doing so you will loose all the data";
    var url = $(".url").val();
    var id = $(this).data('value');
    url=url + 'index.php/edit_operator/delete_operator/' + id;
    delete_data(url,msg);    

});


$(".delete-employee").click(function(e) {
    e.preventDefault();
    var msg = "Are You Sure You Want to DELETE the employee doing so you will loose all the data";
    var url = $(".url").val();
    var id = $(this).data('value');
    url=url + 'index.php/edit_employee/delete_employee/' + id;
    delete_data(url,msg);    

});

$(".delete-broker").click(function(e) {
    e.preventDefault();
    var msg = "Are You Sure You Want to DELETE the BROKER doing so you will make all the customer have no broker associated with it";
    var url = $(".url").val();
    var id = $(this).data('value');
    url= url + 'index.php/edit_broker/delete_broker/' + id;
    delete_data(url,msg);
});
$(".delete-quote").click(function(e) {
    e.preventDefault();
    var msg = "Are You Sure You Want to DELETE the Quote doing so you will loose all the data.";
    var url = $(".url").val();
    var id = $(this).data('value');
    url= url + 'index.php/edit_quote/delete_quote/' + id;
    delete_data(url,msg);
});

$(".delete_base").click(function(e) {
    e.preventDefault();
    var msg = "Are You Sure You Want to DELETE the Airport Base doing so you will loose all the data.";
    var url = $(".url").val();
    var id = $(this).data('value');
    url= url + 'index.php/aircraft_base/delete_base/' + id;
    delete_data(url,msg);
});


$(".delete-customer").click(function(e){
    e.preventDefault();
    var msg = "Are You Sure You Want to DELETE the Customer doing so you will loose all the data and The QUOTES";
    var url = $(".url").val();
    var id = $(this).data('value');
    url= url + 'index.php/edit_customer/delete_customer/' + id;
    delete_data(url,msg);
});


$("#add_operator").submit(function(e) {
    e.preventDefault();
    var data = $("#add_operator").serialize();
    var url = $(".url").val();
    $(".loader").show();
    var op_id = $(".operator-id").val();
    op_id = parseInt(op_id) + 1;
    $.ajax({
        url: url + 'index.php/add_operator/add_new_operator',
        type: 'POST',
        data: {
            data: data
        },
        success: function(data) {
            if (data == "success") {
                $(".login-ajax").html("<span style='color:green;'>Successfully added new Operator.</span>");
                op_id = '000' + op_id;
                $("#add_operator").trigger("reset");
                $('input[readonly]').val(op_id);
            }
            if (data == "error") {
                $(".login-ajax").html("<span style='color:red;'>Oops! looks like something went wrong .Please try again.</span>");
                $("#add_operator").trigger("reset");
            }
            if (data == "duplicate") {
                $(".login-ajax").html("<span style='color:red;'>Email already exists...</span>");
                $("#add_operator").trigger("reset");
            }
            $("#exampleModal").modal("hide");

        }
    });
});

function basic_ajax(url, data, success_class, modal, form_class) {
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            data: data
        },
        success: function(data) {
          alert(data);
           //$(success_class).html(data);
            // if (data == "success") {
            //     $(success_class).html("<span style='color:green;'>Successfully Executed.</span>");
            // }
            // if (data == "error") {
            //     $(success_class).html("<span style='color:red;'>Oops! looks like something went wrong .Please try again.</span>");
            // }
            // if (data == "duplicate") {
            //     $(success_class).html("<span style='color:red;'>Data already exists...</span>");
            // }
            // $(form_class).trigger("reset");
            //  $(modal).modal("hide");

        }
    });
}


$(".regenerate_pass_request").click(function(e){
    e.preventDefault();
    var url = $(".url").val();
    url = url + 'index.php/edit_employee/regenrate_pass';
    $.ajax({
        url: url,
        type: 'POST',
        success: function(data) {
           $(".regenerate_pass").html(data);
        }
    });
});



$(".add_employee").submit(function(e){
    e.preventDefault();
    var data = $(".add_employee").serialize();
    var url = $(".url").val();
    $(".loader").show();
    url = url + 'index.php/add_employee/add_new_employee';
    basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_employee");
});
$(".edit_employee").submit(function(e){
    e.preventDefault();
    var data = $(".edit_employee").serialize();
    var url = $(".url").val();
    $(".loader").show();
    url = url + 'index.php/edit_employee/update_employee';
    basic_ajax(url, data, '.login-ajax', '#exampleModal', "");
});

$(".edit_user").submit(function(e){
    e.preventDefault();
    var data = $(".edit_user").serialize();
    var url = $(".url").val();
    $(".loader").show();
    url = url + 'index.php/user_profile/update_user';
    basic_ajax(url, data, '.login-ajax', '#exampleModal', "");
});


$(".search-checklist-update").click(function(){
    
    var maxpax = $(".update_checklist input[name=maxpax]").val();
    var ArBedroom = $(".update_checklist select[name=ArBedroom]").val();
    var ARBedStup = $(".update_checklist select[name=ARBedStup]").val();

    var url = $(".url").val();
    var success_class='.login-ajax';
    url = url + 'index.php/quote/search_aircrafts_for_checklist';
    
    if( (maxpax.length>0))
    {
      $.ajax({
        url: url,
        type: 'POST',
        data: {
            maxpax: maxpax,ArBedroom:ArBedroom,ARBedStup:ARBedStup
        },
        success: function(data) {
            $(success_class).html(data);
            $(".client-filter").show();
            $(".submit-checklist").show();

        }
    });
   }
    else
    {
      $(".client-filter").show();
      $(".submit-checklist").show();
      return false;
    }
    //basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_checklist");
});


$(".search-checklist").click(function(){
    
    var maxpax = $(".add_checklist input[name=maxpax]").val();
    var ArBedroom = $(".add_checklist select[name=ArBedroom]").val();
    var ARBedStup = $(".add_checklist select[name=ARBedStup]").val();

    var url = $(".url").val();
    var success_class='.login-ajax';
    url = url + 'index.php/quote/search_aircrafts_for_checklist';
    
    if( (maxpax.length>0))
    {
      $.ajax({
        url: url,
        type: 'POST',
        data: {
            maxpax: maxpax,ArBedroom:ArBedroom,ARBedStup:ARBedStup
        },
        success: function(data) {
            $(success_class).html(data);
            $(".client-filter").show();
            $(".submit-checklist").show();

        }
    });
   }
    else
    {
      $(".client-filter").show();
      $(".submit-checklist").show();
      return false;
    }
    //basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_checklist");
});

$(".search-checklist-return").click(function(){
    
    var maxpax = $(".add_checklist_return input[name=maxpax]").val();
    var ArBedroom = $(".add_checklist_return select[name=ArBedroom]").val();
    var ARBedStup = $(".add_checklist_return select[name=ARBedStup]").val();
    alert(maxpax);
    var url = $(".url").val();
    var success_class='.login-ajax-return';
    url = url + 'index.php/quote/search_aircrafts_for_checklist';
    
    if( (maxpax.length>0))
    {
      $.ajax({
        url: url,
        type: 'POST',
        data: {
            maxpax: maxpax,ArBedroom:ArBedroom,ARBedStup:ARBedStup
        },
        success: function(data) {
            $(success_class).html(data);
            $(".client-filter-return").show();
            $(".submit-checklist-return").show();

        }
    });
   }
    else
    {
      $(".client-filter-return").show();
      $(".submit-checklist-return").show();

      return false;
    }
    //basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_checklist");
});

$(".search-checklist-multi").click(function(){
    
    var maxpax = $(".add_checklist_multi input[name=maxpax]").val();
    var ArBedroom = $(".add_checklist_multi select[name=ArBedroom]").val();
    var ARBedStup = $(".add_checklist_multi select[name=ARBedStup]").val();

    var url = $(".url").val();
    var success_class='.login-ajax-multi';
    url = url + 'index.php/quote/search_aircrafts_for_checklist';
    
    if( (maxpax.length>0))
    {
      $.ajax({
        url: url,
        type: 'POST',
        data: {
            maxpax: maxpax,ArBedroom:ArBedroom,ARBedStup:ARBedStup
        },
        success: function(data) {
            $(success_class).html(data);
            $(".client-filter-multi").show();
            $(".submit-checklist-multi").show();

        }
    });
   }
    else
    {
      $(".client-filter-multi").show();
      $(".submit-checklist-multi").show();
      return false;
    }
    //basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_checklist");
});


$(".add_checklist").submit(function(e){
    e.preventDefault();

    var success_class='.login-res';
    var modal='#exampleModal';
    var cust_phone=$(".cust_phone").val();
    if(cust_phone.length<1)
    {
        $(modal).modal("hide");
        alert("Please Enter Customer Name Properly");
        return false;
    }
    var data=$(".add_checklist").serialize();
    var url = $(".url").val();
    $(".loader").show();
    var url_new=url + 'index.php/quote/add_quote';
    
    $.ajax({
        url: url_new,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
            //$(success_class).html(data);
           
            if($.isNumeric(data))
            {
                 $(success_class).html("<span style='color:green;'>Successfully Executed. <a href='"+url+"index.php/edit_quote/index/"+data+"'>Check Quotation 000"+data+"</a></span>");
                 //window.location.href=url+'index.php/edit_quote/index/'+data;
            }
                
            
            if (data == "error") {
                $(success_class).html("<span style='color:red;'>Oops! looks like something went wrong .Please try again.</span>");
            }
            if (data == "duplicate") {
                $(success_class).html("<span style='color:red;'>Data already exists...</span>");
            }
            $(form_class).trigger("reset");
             $(modal).modal("hide");
            

        }
    });
    //basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_checklist");
});

$(".add_checklist_return").submit(function(e){
    e.preventDefault();

    var success_class='.login-res-return';
    var cust_phone=$(".cust_phone").val();
    if(cust_phone.length<1)
    {
        $(modal).modal("hide");
        alert("Please Enter Customer Name Properly");
        return false;
    }
    var data=$(".add_checklist_return").serialize();
    var url = $(".url").val();
    $(".loader").show();
    var url_new=url + 'index.php/quote/add_quote';
    
    $.ajax({
        url: url_new,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
            //$(success_class).html(data);
           
            if($.isNumeric(data))
            {
                $(success_class).html("<span style='color:green;'>Successfully Executed. <a href='"+url+"index.php/edit_quote/index/"+data+"'>Check Quotation 000"+data+"</a></span>");
                 //window.location.href=url+'index.php/edit_quote/index/'+data;
            }
                
            
            if (data == "error") {
                $(success_class).html("<span style='color:red;'>Oops! looks like something went wrong .Please try again.</span>");
            }
            if (data == "duplicate") {
                $(success_class).html("<span style='color:red;'>Data already exists...</span>");
            }
            $(form_class).trigger("reset");
             $(modal).modal("hide");
            

        }
    });
    //basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_checklist");
});

$(".add_checklist_multi").submit(function(e){
    e.preventDefault();

    var success_class='.login-res-multi';
    var cust_phone=$(".cust_phone").val();
    if(cust_phone.length<1)
    {
        $(modal).modal("hide");
        alert("Please Enter Customer Name Properly");
        return false;
    }
    var data=$(".add_checklist_multi").serialize();
    var url = $(".url").val();
    $(".loader").show();
    var url_new=url + 'index.php/quote/add_quote';
    
    $.ajax({
        url: url_new,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
            //$(success_class).html(data);
           
            if($.isNumeric(data))
            {
                 $(success_class).html("<span style='color:green;'>Successfully Executed. <a href='"+url+"index.php/edit_quote/index/"+data+"'>Check Quotation 000"+data+"</a></span>");
                 //window.location.href=url+'index.php/edit_quote/index/'+data;
            }
                
            
            if (data == "error") {
                $(success_class).html("<span style='color:red;'>Oops! looks like something went wrong .Please try again.</span>");
            }
            if (data == "duplicate") {
                $(success_class).html("<span style='color:red;'>Data already exists...</span>");
            }
            $(form_class).trigger("reset");
             $(modal).modal("hide");
            

        }
    });
    //basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_checklist");
});


$(".update_checklist").submit(function(e){
    e.preventDefault();
    var success_class='.login-res';
    var modal='#exampleModal';
    var cust_phone=$(".cust_phone").val();
    if(cust_phone.length<1)
    {
        $(modal).modal("hide");
        alert("Please Enter Customer Name Properly");
        return false;
    }
    var data = $(".update_checklist").serialize();

    var url = $(".url").val();
    //$(".loader").show();
    url = url + 'index.php/quote/update_quote';
    
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
             //$(success_class).html(data);
           
            if(data=="success")
            {
                    $(success_class).html("<span style='color:green;'>Successfully Executed.</span>");
            //      window.location.href=url+'index.php/edit_quote/index/'+data;
            }
                
            
            if (data == "error") {
                $(success_class).html("<span style='color:red;'>Oops! looks like something went wrong .Please try again.</span>");
            }
            if (data == "duplicate") {
                $(success_class).html("<span style='color:red;'>Data already exists...</span>");
            }
            // $(form_class).trigger("reset");
             $(modal).modal("hide");
            

        }
    });
});

$(".add_customer").submit(function(e){
    e.preventDefault();
    var data = $(".add_customer").serialize();
    var url = $(".url").val();
    $(".loader").show();
    url = url + 'index.php/add_customer/add_new_customer';
    basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_customer");
});

$(".edit_customer").submit(function(e){
    e.preventDefault();
    var data = $(".edit_customer").serialize();
    var url = $(".url").val();
    $(".loader").show();
    url = url + 'index.php/edit_customer/customer_update';
    basic_ajax(url, data, '.login-ajax', '#exampleModal', "");
});


$(".add_broker").submit(function(e) {
    e.preventDefault();
    var data = $(".add_broker").serialize();
    var url = $(".url").val();
    $(".loader").show();
    url = url + 'index.php/add_broker/add_new_broker';
    basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_broker");
});


$(".edit_broker").submit(function(e) {
    e.preventDefault();
    var data = $(".edit_broker").serialize();
    var url = $(".url").val();
    $(".loader").show();
    url = url + 'index.php/edit_broker/update_broker';
    basic_ajax(url, data, '.login-ajax', '#exampleModal', "");
});


$(".register_aircratft").submit(function(e) {
    e.preventDefault();
    var data = $(".register_aircratft").serialize();
    var url = $(".url").val();
    url = url + 'index.php/register_aircraft/add_new_aircraft';
    $(".loader").show();
    basic_ajax(url, data, '.login-ajax', '#ModalAircraft', ".register_aircratft");

});

$(".update-aircraft").submit(function(e) {
    e.preventDefault();
    var data = $(".update-aircraft").serialize();
    var url = $(".url").val();
    url = url + 'index.php/edit_aircraft/update_aircraft';
    $(".loader").show();
    basic_ajax(url, data, '.login-ajax', '#ModalAircraft', "");

});

$(".edit-operator").submit(function(e) {
    e.preventDefault();
    var data = $(".edit-operator").serialize();
    var url = $(".url").val();
    url = url + 'index.php/edit_operator/operator_update';
    $(".loader").show();
    basic_ajax(url, data, '.login-ajax', '#exampleModal', "");

});


$(".add_aircraft_base").submit(function(e) {
    e.preventDefault();
    var data = $(".add_aircraft_base").serialize();
    var url = $(".url").val();
    url = url + 'index.php/add_base/add_new_base';
    $(".loader").show();
    basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_aircraft_base");

});

$(".add_aircraft_type").submit(function(e) {
    e.preventDefault();
    var data = $(".add_aircraft_type").serialize();
    var url = $(".url").val();
    url = url + 'index.php/add_aircraft_type/add_new_type';
    $(".loader").show();
    basic_ajax(url, data, '.login-ajax', '#exampleModal', ".add_aircraft_type");

});

$(".add_relation").submit(function(e){
  e.preventDefault();
  var data=$(".add_relation").serialize();
  var url=$(".url").val();
    url = url + 'index.php/relations/add_relation';
    $(".loader").show();
     $.ajax({
        url: url,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
          if(data=="duplicate")
          {
            $(".reply").css('color','red');
            $(".reply").html("Looks like Relation Already Exists");
            
          }
          if(data=="error")
          {
            $(".reply").css('color','red');
            $(".reply").html("<span style='color:red;'>Oops! Looks Like something went wrong please try again</span>");
          }
          if(data!="duplicate" && data!="error")
          {
            $(".reply").css('color','green');
            
            $(".reply").html("<span style='color:green;'>Successfully added New Relation</span>");
            $('.relation-add-ajax').html(data);
          }
          $(".loader").hide();
          $("#exampleModal").modal('hide');

        }
    });
});

$(".update_customer_group").submit(function(e){
  e.preventDefault();
  var data=$('.update_customer_group').serialize();
  var url=$(".url").val();
  url = url + 'index.php/relations/update_customer_group';
   $.ajax({
        url: url,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
          //$(".update_customer_group").after(data);
          if(data=="duplicate")
          {
            $(".reply").css('color','red');
            $(".reply").html("Looks like Relation Already Exists");
            
          }
          if(data=="error")
          {
            $(".reply").css('color','red');
            $(".reply").html("<span style='color:red;'>Oops! Looks Like something went wrong please try again</span>");
          }
          if(data!="duplicate" && data!="error")
          {
            $(".reply").css('color','green');
            
            $(".reply").html("<span style='color:green;'>Successfully added New Relation</span>");
            //$('.relation-add-ajax').html(data);
          }

        }
    });
});

// $(".registrtaion_list_text").keyup(function(){
//   var val=$(this).val();

// });



$(".content").on('click','.edit-relation',function(e){
  e.preventDefault();
  $(this).parents('tr').find('.form-container').stop(true,true).slideDown(600);
  $(this).parents('tr').siblings('tr').find('.form-container').stop(true,true).slideUp(600);
});

$(".content").on('click','.delete-relation',function(e){
  e.preventDefault();
  var r=confirm("Are You Sure You Want to delete this Relation Doing So will DELETE all the related data");
  if(r!=true)
  {
    return false;
  }
  else
  {
    var id=$(this).data('value');
    var url = $(".url").val();
    url = url + 'index.php/relations/delete_relation/'+id;
    window.location.href=url;
  }
});

$(".update_aircraft_type").submit(function(e) {
    e.preventDefault();
    var data = $(".update_aircraft_type").serialize();
    var url = $(".url").val();
    url = url + 'index.php/edit_aircraft_type/update_type';
    $(".loader").show();
    basic_ajax(url, data, '.login-ajax', '#exampleModal',);

});

$(".update_aircraft_base").submit(function(e) {
    e.preventDefault();
    var data = $(".update_aircraft_base").serialize();
    var url = $(".url").val();
    url = url + 'index.php/edit_base/update_base';
    $(".loader").show();
    basic_ajax(url, data, '.login-ajax', '#exampleModal', "");

});

$(".create_group").submit(function(e){
  e.preventDefault();
  var data=$(".create_group").serialize();

  var url = $(".url").val();
  url = url + 'index.php/edit_customer/create_group';
  $.ajax({
        url: url,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
          if(data=="duplicate")
          {
            $(".create_group").after("<span style='color:red;'>Looks like Group Already Exists</span>");
            
          }
          if(data=="error")
          {
            $(".create_group").after("<span style='color:red;'>Oops! Looks Like something went wrong please try again</span>");
          }
          if(data!="duplicate" && data!="error")
          {
            $(".create_group").after("<span style='color:green;'>Successfully added New Group</span>");
            $('.group_ajax_res').html(data);
            $(".group_name").val('');
          }

        }
    });
});


$(".create_group2").submit(function(e){
  e.preventDefault();
  var data=$(".create_group2").serialize();

  var url = $(".url").val();
  url = url + 'index.php/groups/create_group';
  $.ajax({
        url: url,
        type: 'POST',
        data: {
            data:data
        },
        success: function(data) {
          if(data=="duplicate")
          {
            $(".create_group2").after("<span style='color:red;'>Looks like Group Already Exists</span>");
            
          }
          if(data=="error")
          {
            $(".create_group2").after("<span style='color:red;'>Oops! Looks Like something went wrong please try again</span>");
          }
          if(data!="duplicate" && data!="error")
          {
            
            $('.group_ajax_res').html(data);
            $(".group_name").val('');
          }

        }
    });
});

$(".content").on('click','.delete-group',function(e){
  e.preventDefault();
  var r=confirm("Are you sure you want to delete the group doing so will DELETE all te related DATA");
  if(r!=true)
  {
    return false;
  }
  var id=$(this).data('value');
  var url = $(".url").val();
  url = url + 'index.php/groups/delete_group/'+id;
  window.location.href=url;
});

function country(url, country_id, html_class, city) {

    if (typeof(city) === "undefined") {
        var c = '';
    } else {
        var c = city;
    }
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            country_id: country_id,
            city: c
        },
        success: function(res) {

            $(html_class).html(res);
        }
    });
}

$(document).ready(function() {
    var country_id = $(".country-select").val();
    var url = $(".url").val();
    url = url + 'index.php/add_operator/get_cities';
    var html_class = ".city-select";
    var city = $(".city").val();
    country(url, country_id, html_class, city);

});

$(".country-select").change(function() {
    var country_id = $(this).val();
    var url = $(".url").val();
    url = url + 'index.php/add_operator/get_cities';
    var html_class = ".city-select";
    var city = $(".city").val();
    country(url, country_id, html_class, city);
});


$(".delete_aircraft_image").submit(function(e){
    e.preventDefault();
    var data=$(".delete_aircraft_image").serialize();
    var url = $(".url").val();
    var r=confirm("Are You sure You want To Delete The Images");
    if(r!=true)
    {
    return false;
    }
    url=url+'index.php/edit_aircraft/delete_aircraft_image';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            data: data
        },
        success: function(res) {

            window.location.reload();
        }
    });



});

$(document).mouseup(function (e)
                    {
  var container = $('.lists_of_aircraft'); // YOUR CONTAINER SELECTOR

  if (!container.is(e.target) // if the target of the click isn't the container...
      && container.has(e.target).length === 0) // ... nor a descendant of the container
  {
    container.hide();
  }
});

$(".aircraft-filter").submit(function(e){
  e.preventDefault();
  var data=$(".aircraft-filter").serialize();
  var url = $(".url").val();
  url=url+'index.php/all_aircraft/filter_aircraft';
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            data: data
        },
        success: function(res) {

            
            $("#aircraft-filter-res").html(res);
            //window.location.reload();
        }
    });

});

$(".mail-quote").click(function(e){
  e.preventDefault();
  var id=$(this).data('value');
  $("#mailmodal").modal('show');
  $(".aircarft_id").val(id);
});

$(".mail-aggrement").click(function(e){
  e.preventDefault();
  var id=$(this).data('value');
  $("#aggrementmodal").modal('show');
  $(".aircarft_id").val(id);
});

$(".quote-briefing-aggrement").click(function(e){
  e.preventDefault();
  var id=$(this).data('value');
  $("#quote_briefing_modal").modal('show');
  $(".aircarft_id").val(id);
});



$(".content").on('click','.update-status',function(e){
  e.preventDefault();
  $(this).parents('tr').find('.edit-receiving-time').stop(true,true).slideDown(600);
  $(this).parents('tr').siblings('tr').find('.edit-receiving-time').stop(true,true).slideUp(600);
});

$(".quote-mail-form").submit(function(e){
  e.preventDefault();
  var data=$(".quote-mail-form").serialize();
  var url = $(".url").val();
  url=url+'index.php/quote/quote_email/';
 
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            data: data
        },
        success: function(res) {

           // alert(res); 
           //  // $("#aircraft-filter-res").html(res);
            window.location.reload();
        }
    });
});
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
$(".chosen-select").chosen();
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


$( document ).ready(function() {
  //var selection = "";
  var dropdownWidth = $('body').find('.styled-select select').width();
  $('body').find('.styled-select div').width(dropdownWidth - 11);
	$('body').on('click','.styled-select div',function(){
    	$('body').find('.styled-select select').show();	
    });
  //$('.styled-select div').click(function(){
    
    //$(this).addClass("open");
  //});
  
  $('body').on('change','.styled-select select',function() {
    selection = $('body').find(".styled-select option:selected").text();
  });
	
	$('body').on('focusout','.styled-select select',function(){
    	$('body').find('.styled-select select').hide();
    });

  
});

$(document).ready(function(){
  var count=1;
  $(".add-hadling").click(function(e){
  e.preventDefault();
  var html='<div class="row">';
  html=html+'<div class="col-md-4">';
  html=html+'<div class="form-group label-floating ">';
  html=html+'<label class="control-label">Airport</label>';
  html=html+'<input type="text" class="form-control default-address add'+count+'" value="" id="departure-address" name="airport_name[]" autocomplete="from" required>';
  html=html+'<ul class="lists_of_aircraft default-list'+count+'" style="display: none;"></ul>';
  html=html+'<input type="hidden" class="count-num" value="'+count+'">';
  html=html+'</div>';
  html=html+'</div>';
  html=html+'<div class="col-md-3">';
  html=html+'<div class="form-group label-floating ">';
  html=html+'<label class="control-label">Handling Name</label>';
  html=html+'<input type="text" class="form-control" value="" name="handling_name[]" autocomplete="from" required>';
  html=html+'</div>';
  html=html+'</div>';
   html=html+'<div class="col-md-3">';
   html=html+'<div class="form-group label-floating ">';
   html=html+'<label class="control-label">Contact Numbers</label>';
   html=html+'<input type="text" class="form-control" value="" name="contact_numbers[]" autocomplete="from" required>';
   html=html+'</div>';
   html=html+'</div>';
   html=html+'<div class="col-md-2">';
   html=html+'<a href="#" class="remove-crew-container"><i class="fa fa-times" aria-hidden="true"></i></a>';
   html=html+'</div>';
   html=html+'</div>';
  $(".handling-container").append(html);
  count++;
});

});



$(".add-crew").click(function(e){
  e.preventDefault();
  var html='<div class="row">';
   html=html+'<div class="col-md-5">';
   html=html+'<div class="form-group label-floating ">';
   html=html+'<label class="control-label">Designation</label>';
   html=html+'<input type="text" class="form-control" value="" name="designation[]" autocomplete="from" required>';
   html=html+'</div>';
   html=html+'</div>';
   html=html+'<div class="col-md-5">';
   html=html+'<div class="form-group label-floating ">';
   html=html+'<label class="control-label">Crew Name</label>';
   html=html+'<input type="text" class="form-control" value="" name="crew_name[]" autocomplete="from" required>';
   html=html+'</div>';
   html=html+'</div>';
   html=html+'<div class="col-md-2">';
   html=html+'<a href="#" class="remove-crew-container"><i class="fa fa-times" aria-hidden="true"></i></a>';
   html=html+'</div>';
   html=html+'</div>';
  $(".crew-container").append(html);
});

$('.content').on('click','.remove-crew-container',function(e){
  e.preventDefault();
  $(this).parent().parent().remove();
});


$(".content").on('click','.operator-mail-resend',function(e){
  e.preventDefault();
  var operator=$(this).data('operator');
  var quote=$(this).data('quote');
  var data=operator+'-'+quote;
  var url=$(".url").val();
  url=url+'index.php/quote/operator_email_resend/'+data;
  window.location.href=url;
});

$(document).ready(function(){
      var share=$("#share_url").html();
  
      $("#share").jsSocials({
    url: share,
    showCount: "inside",
    shares: ["whatsapp","email"]
});
    });

$(document).ready(function(){
   
    $('.reorder_link').on('click',function(){
      var url=$(".url").val();
      url=url+'index.php/edit_aircraft/reorder_images';
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('save reordering');
        $('.reorder_link').attr("id","saveReorder");
        $('#reorderHelper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        $("#saveReorder").click(function( e ){
            if( !$("#saveReorder i").length ){
                //$(this).html('').prepend('<img src="images/refresh-animated.gif"/>');
                $("ul.reorder-photos-list").sortable('destroy');
                $("#reorderHelper").html( "Reordering Photos - This could take a moment. Please don't navigate away from this page." ).removeClass('light_box').addClass('notice notice_error');
    
                var h = [];
                $("ul.reorder-photos-list li").each(function() {  h.push($(this).attr('id').substr(9));  });
                var id=h.toString();
                $.ajax({
                url: url,
                type: 'POST',
                data: {
                    data: id
                },
                success: function(data) {

                   window.location.reload();
                    

                }
            });
                 
               
                return false;
            }   
            e.preventDefault();     
        });
    });
});

