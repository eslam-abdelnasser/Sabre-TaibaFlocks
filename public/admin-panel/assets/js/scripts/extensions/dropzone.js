/*=========================================================================================
    File Name: dropzone.js
    Description: dropzone
    --------------------------------------------------------------------------------------
    Item Name: Robust - Responsive Admin Theme
    Version: 1.2
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/




	// Defaults
    Dropzone.autoDiscover = false;


    /****************************************
    *				Single File				*
    ****************************************/





    /********************************************************
    *               Use Button To Select Files              *
    ********************************************************/
    // new Dropzone(document.body, { // Make the whole body a dropzone
    //     url: "#", // Set the url
    //     previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
    //     clickable: "#select-files" // Define the element that should be used as click trigger to select files.
    // });


    /****************************************************************
    *				Limit File Size and No. Of Files				*
    ****************************************************************/
    $("#dpz_file_limits").dropzone({
        paramName: "file", // The name that will be used to transfer the file
        maxFileSize : 8,
        parallelUploads : 10,
        uploadMultiple: true,
        autoProcessQueue : false,
        addRemoveLinks : true,
        init: function() {
            var submitButton = document.querySelector("#act-on-upload")
            myDropzone = this;
            submitButton.addEventListener("click", function() {
                myDropzone.processQueue();
            });

            myDropzone.on("complete", function(file) {
                window.location.href=$('#go_back').val();
            });


        },
    });




