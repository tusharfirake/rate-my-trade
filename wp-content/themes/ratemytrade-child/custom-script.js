jQuery(document).ready(function(){

 //    // apply active class to selected td
    jQuery(document).on('click', '#personal_details_submit',function(e)
    {   e.preventDefault();
        var first_name = jQuery(this).parent().parent().parent().find("#tradesmen_first_name").val();
        var last_name = jQuery(this).parent().parent().parent().find("#tradesmen_last_name").val();
        var trading_name = jQuery(this).parent().parent().parent().find("#tradesmen_trading_name").val();
        var email = jQuery(this).parent().parent().parent().find("#tradesmen_email").val();
        var postal_code = jQuery(this).parent().parent().parent().find("#tradesmen_postal_code").val();

        if((first_name!=='') && (last_name!=='') && (trading_name!=='') && (email!=='') && (postal_code!==''))
        {
                jQuery.ajax(
                {
                    type:"POST",
                    url: ajaxurl,
                    data: {action: 'validate_trademen_personal_details','email':email},
                    success:function(data){
                     //console.log(data);
                        if(jQuery.trim(data) == jQuery.trim('fail1'))
                            jQuery('#error_msg').html("Email already exist.");
                        else
                        {   if(jQuery.trim(data) == jQuery.trim('fail2'))
                            jQuery('#error_msg').html("Invalid emailid.");
                            else
                            {
                                jQuery('#error_msg').html();
                                jQuery("#personal_det_td").removeClass("active");
                                jQuery("#personal_det_td").addClass("inactive");
                                jQuery("#trade_td").removeClass("inactive");
                                jQuery("#trade_td").addClass("active");
                                jQuery('#sectionA').hide();
                                jQuery('#sectionC').hide();
                                jQuery('#sectionD').hide();
                                jQuery('#sectionE').hide();
                                jQuery('#sectionB').show();
                            }
                        }
                }
              }
            );
        }
        else
        {
          jQuery('#error_msg').html("Please fill required fields");
        }
    });


    jQuery(document).on('click', '#trades_submit',function(e)
    {   e.preventDefault();
        var trade_category = jQuery("input[name=trade_category]:checked").val();
        if(trade_category){
            jQuery('#error_msg').html();
            jQuery("#trade_td").removeClass("active");
            jQuery("#trade_td").addClass("inactive");
            jQuery("#profile_td").removeClass("inactive");
            jQuery("#profile_td").addClass("active");
            jQuery('#sectionA').hide();
            jQuery('#sectionB').hide();
            jQuery('#sectionD').hide();
            jQuery('#sectionE').hide();
            jQuery('#sectionC').show();
        }
        else
        {
          jQuery('#error_msg1').html("Please select category");  
        }

     });

    jQuery(document).on('click', '#profile_submit',function(e)
    {   e.preventDefault();
            jQuery("#profile_td").removeClass("active");
            jQuery("#profile_td").addClass("inactive");
            jQuery("#business_det_td").removeClass("inactive");
            jQuery("#business_det_td").addClass("active");
            jQuery('#sectionA').hide();
            jQuery('#sectionB').hide();
            jQuery('#sectionC').hide();
            jQuery('#sectionE').hide();
            jQuery('#sectionD').show();
     });


    jQuery(document).on('click', '#business_details_submit',function(e)
    {   e.preventDefault();
            jQuery('#error_msg').html();
            jQuery("#business_det_td").removeClass("active");
            jQuery("#business_det_td").addClass("inactive");
            jQuery("#thank_you_td").removeClass("inactive");
            jQuery("#thank_you_td").addClass("active");
            jQuery('#sectionA').hide();
            jQuery('#sectionB').hide();
            jQuery('#sectionD').hide();
            jQuery('#sectionC').hide();
            jQuery('#sectionE').show();
     });
});

    jQuery(document).on('click', '.submit_btn',function(e)
    {  
        jQuery('#register_box').show();
        jQuery('#signup-page').hide();
    });
