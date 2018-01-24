/*=========================================================================================
    File Name: jquery-file-upload.js
    Description: jQuery File Upload
    --------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Theme
    Version: 1.2
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function() {

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({

    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '../../../app-assets/jquery-file-upload/cors/result.html?%s'
        )
    );


    // Upload server status check for browsers with CORS support:
    if ($.support.cors) {
        $.ajax({
            type: 'HEAD'
        }).fail(function() {
            $('<div class="alert alert-danger"/>')
                .text('Upload server currently unavailable - ' +
                    new Date())
                .appendTo('#fileupload');
        });
    }

    // // Load existing files:
    $('#fileupload').addClass('fileupload-processing');
    $.ajax({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: $('#fileupload').fileupload('option', 'url'),
        dataType: 'json',
        context: $('#fileupload')[0]
    }).always(function() {
        $(this).removeClass('fileupload-processing');
    }).done(function(result) {
        $(this).fileupload('option', 'done')
            .call(this, $.Event('done'), {
                result: result
            });
    });

});
