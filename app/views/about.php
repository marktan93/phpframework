<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>About | GMT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src='<?php echo LIBS?>assets/plugins/common/modernizr.js'></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo LIBS?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/select2/select2.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/datepicker/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/clockface/css/clockface.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/timepicker/css/bootstrap-timepicker.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/iCheck-master/skins/all.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/uniform/css/uniform.aristo.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/bootstrap/css/jasny-bootstrap.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/plugins/summernote/summernote-bs3.css" rel="stylesheet">

    <link href="<?php echo LIBS?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/css/style-default.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php load_file('cms/header.php');?>

        <div id="main-container">
            

            <div class="inner-continer">
                <div class="row">
                    <div class="col-md-12">
                        <h3>About Us Editor</h3>
                        <form method="POST" action="<?php echo url("company/about_process"); ?>" >
                        <div class="panel bg-white">
                            <textarea name="about" class="summernote bg-white" style="height: 500px;"><?php echo viewbag('about'); ?></textarea>
                        </div> 
                          <label for="save_about" class="btn btn-primary"><i class="fs-download"></i>  Save</label>          
                          <input type="submit" id="save_about" value="Save" style="display: none;" />
                          </form>
                    </div>

                </div><br>


                
                <div class="row">
                    <div class="col-md-12 clearfix">
                        	<div class="well">
                            <h3>Guide Notes</h3>
                            <ul>
                                <li>There are <strong>no limited</strong> character.</li>
                                <li>Just <strong>edited the text and press save</strong>, the content copy will be updated on time at your website.</li>
                            </ul>
                        </div>
                    </div>
</div>
                
            </div>

        </div><!-- /main-container -->
        
        <?php load_file("cms/footer.php")?>
        
    </div><!-- /wrapper -->
    
    <div class="modal fade" id="panel-config">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>

    <!-- Jquery -->
    <script src="<?php echo LIBS?>assets/js/jquery.js"></script>
    <script src="<?php echo LIBS?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src='<?php echo LIBS?>assets/plugins/slimScroll/jquery.slimscroll.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/select2/select2.min.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/tagsinput/bootstrap-tagsinput.min.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/daterangepicker/moment.min.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/daterangepicker/daterangepicker.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/datepicker/js/bootstrap-datepicker.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/clockface/js/clockface.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/timepicker/js/bootstrap-timepicker.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/iCheck-master/jquery.icheck.min.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/uniform/js/jquery.uniform.min.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/bootstrap/js/jasny-bootstrap.min.js'></script>
    <script src='<?php echo LIBS?>assets/plugins/summernote/summernote.min.js'></script>

    <script src="<?php echo LIBS?>assets/js/app.js"></script>
    <script>
        jQuery(document).ready(function(){
            App.init();
        });
    </script>

</body>
</html>
