
var token = jQuery('meta[name="csrf-token"]').attr('content'),
urlHome = jQuery('meta[name="url-home"]').attr('content'),
currency = jQuery('meta[name="currency"]').attr('content'),
positionCurrency = jQuery('meta[name="position_currency"]').attr('content'),
columns;



// $(document).ready(function () {
//         $.ajax({
//             url: urlHome + '/userName',
//             type: "GET",
//             dataType: "json",
//             success: function(data) {
//                 const userSelect = $('#userSelect');
//                 userSelect.empty();
//                 for (let i = 0; i < data.data.length; i++) {
//                     const user = data.data[i];
//                     $('#userSelect').append('<option value="'+user.id+'">' +user.name+'</option>')
//                 }
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 console.error("AJAX request failed:", textStatus, errorThrown);
//             }
//         });
// });







