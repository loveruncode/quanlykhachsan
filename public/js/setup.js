
var token = jQuery('meta[name="csrf-token"]').attr('content'),
urlHome = jQuery('meta[name="url-home"]').attr('content'),
currency = jQuery('meta[name="currency"]').attr('content'),
positionCurrency = jQuery('meta[name="position_currency"]').attr('content'),
columns;



//  animation loading
$(document).ready(function(){
    $(".load").click(function(){
        $("#loading-overlay").fadeIn();
        setTimeout(function(){
            $("#loading-overlay").fadeOut();
        }, 1000);
    });
});


