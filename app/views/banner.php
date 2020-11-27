<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Banner Slider | GMT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src='<?php echo LIBS?>assets/plugins/common/modernizr.js'></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo LIBS?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href="<?php echo LIBS?>assets/plugins/dropzone/css/dropzone.css">
    
    <link href="<?php echo LIBS?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/css/style-default.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php
            load_file("cms/header.php");
        ?>

        <div id="main-container">

            <div class="inner-continer">
                <div class="row">

                    <div class="col-md-12">
                        <form action="<?php echo url("company/banner_upload");?>" class="dropzone" id="my-awesome-dropzone">
                            
                        </form>
                        
                   
                </div>
                 </div>
                  <div class="row">
                    <div class="col-md-12 clearfix">
                        	<div class="well">
                            <h3>Guide Notes</h3>
                            <ul>
                                <li>The maximum file size for uploads in this demo is <strong>2 MB</strong> </li>
                                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed to upload.</li>
                                <li>Can be uploaded <strong>multiple</strong> banners in 1 time.</li>
                                <li>Maximum <strong>5 banners</strong> can be upload to prevent website heavy loaded.</li>
                                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage with Google Chrome, Mozilla Firefox and Apple Safari.</li>
                            </ul>
                        </div>
                    </div>
</div>
            </div>

        </div><!-- /main-container -->
        <?php
            load_file("cms/footer.php");
        ?>
    </div><!-- /wrapper -->

    <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

    <!-- Jquery -->
    <script src="<?php echo LIBS?>assets/js/jquery.js"></script>
    <script src="<?php echo LIBS?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src='<?php echo LIBS?>assets/plugins/slimScroll/jquery.slimscroll.js'></script>
    <script src="<?php echo LIBS?>assets/plugins/common/jquery.blockUI.js"></script>
    <script type="text/javascript" src="<?php echo LIBS?>assets/plugins/dropzone/dropzone.min.js"></script>
    
    <script src="<?php echo LIBS?>assets/js/app.js"></script>
    <script src="<?php echo LIBS?>assets/js/constant.js"></script>
    <script>
        jQuery(document).ready(function(){
            App.init();
            var init_banner = [];
            var added_count = 0;
            var banner_count = 0;
            var error = false;
            $("#my-awesome-dropzone").dropzone({
            addRemoveLinks: true,
            maxFilesize: 2, // MB
            maxFiles: 5,
            autoProcessQueue: true,
            parallelUploads: 5,
            dictMaxFilesExceeded: "You can only upload upto 5 images",
            dictRemoveFile: "Delete",
            dictCancelUploadConfirmation: "Are you sure to cancel upload?",
            autoDiscover: false,
            accept: function (file, done) {
                var thisDropzone = this;
                
                for (var i=0; i<init_banner.length; i++) {
                    if (init_banner[i] == file.name) {
                        thisDropzone.removeFile(file);
                        error = true;
                        alert("Duplicated file name");
                        done("Duplicated file name");
                    }
                }
                added_count++;
                
                if (banner_count >= 5 || (added_count + banner_count) > 5 ) {
                    done("You can only upload onto 5 images");
                }
                
                if ((file.type).toLowerCase() != "image/jpg" &&
                        (file.type).toLowerCase() != "image/gif" &&
                        (file.type).toLowerCase() != "image/jpeg" &&
                        (file.type).toLowerCase() != "image/png"
                        ) {
                    done("Invalid file");
                }
                else {
                    done();
                }
            },
            init: function () {
                init(this);
            }, 
            sending: function(file) {
                console.log(file);
            },
            removedfile: function(file) {
                if (!error) {
                    var name = file.name;        
                    $.ajax({
                        type: 'POST',
                        url: ROOT+'company/banner_delete',
                        data: "name="+name,
                        dataType: 'html'
                    });
                    banner_count--;
                 }
                 
                 reload_json();
                    var _ref;
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
                
            }, 
            complete: function(file) {
                
                reload_json();
                
            }
        });
        
            function init (thisDropzone) {
                thisDropzone.options.params = true;

                    $.getJSON(ROOT+'company/banner_json', function(data) { // get the json response

                        $.each(data, function(key,value){ //loop through it
                            init_banner.push(value.name);
                            var mockFile = { name: value.name, size: value.size }; // here we get the file name and size as response 

                            thisDropzone.options.addedfile.call(thisDropzone, mockFile);

                            thisDropzone.options.thumbnail.call(thisDropzone, mockFile, ROOT+"app/libs/banners/"+value.name);//uploadsfolder is the folder where you have all those uploaded files
                            banner_count++;
                        });

                    });
            }
            
            function reload_json() {
                init_banner = [];
                
                $.getJSON(ROOT+'company/banner_json', function(data) { // get the json response

                        $.each(data, function(key,value){ //loop through it
                            init_banner.push(value.name);
                        });

                    });
            }
        
        });
        
        
        
    </script>

</body>
</html>
