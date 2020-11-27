<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GMT Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src='<?php echo LIBS?>assets/plugins/common/modernizr.js'></script>
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="<?php echo LIBS?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo LIBS?>assets/css/main.css" rel="stylesheet">
    <link href="<?php echo LIBS?>assets/css/style-default.css" rel="stylesheet">

</head>
<body class="login">
    
    <div class="logo"><!-- BEGIN LOGO -->
        <h3><strong>GMT</strong> Admin</h3>
    </div>  <!-- END LOGO -->
    
    <div class="content">   <!-- BEGIN LOGIN -->
        <form class="form-vertical login-form" method="POST" action="<?php echo url("account/login_process"); ?>">

            <h3 class="form-title">Login to your account</h3>
            <div class="error-msg" ><?php echo viewbag("login_error");?></div>
            <div class="success-msg" ><?php echo viewbag("forget_success");?></div>
            <br />
            <div class="alert alert-danger hide">
                <button class="close" data-dismiss="alert"></button>
                <span>Enter any username and password.</span>
            </div>

            <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-user-2"></i>
                        <input class="form-control" type="text" placeholder="Username" name="username"/>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fs-locked"></i>
                        <input class="form-control" type="password" placeholder="Password" name="password"/>
                    </div>
                </div>
            </div>

            <div>
                <label class="checkbox">
                    <input type="checkbox" name="remember" value="1"/> Remember me
                </label>
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fs-checkmark-2"></i> Login
                </button>            
            </div>

            <div class="forget-password">
                <a href="javascript:;" class="" id="forget-password">Forgot your password ?</a>
            </div>
        </form> <!-- END LOGIN FORM --> 


        <form class="form-vertical forget-form" method="POST" action="<?php echo url("account/forget"); ?>"> <!-- BEGIN FORGOT PASSWORD FORM -->
            <h3 class="form-title">Forget Password ?</h3>
            <p>Enter your e-mail address below to reset your password.</p>

            <div class="control-group">
                <div class="controls">
                    <div class="input-icon left">
                        <i class="fa fa-envelope-o"></i>
                        <input class="form-control" type="text" placeholder="Email" name="email" />
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" id="back-btn" class="btn">
                    <i class="fs-arrow-left"></i> Back
                </button>
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fs-checkmark-2"></i> Submit
                </button>            
            </div>
        </form> <!-- END FORGOT PASSWORD FORM -->


       
    </div>

    <!-- Jquery -->
    <script src="<?php echo LIBS?>assets/js/jquery.js"></script>
    <script src="<?php echo LIBS?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo LIBS?>assets/js/plugins.js"></script>
    <script>
        $(document).ready(function(){
            LoginPage.init();
        });        
    </script>
</body>
</html>
