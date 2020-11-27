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
<body class="lockScreen">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 unlock-content">
                <img class="profile-img" src="<?php echo LIBS?>assets/images/item_demo.jpg">

                <h3>GMT Admin</h3>
                <h5><?php echo viewbag("email");?></h5>
                <div class="error-msg">
                <?php echo viewbag("msg")?>
                </div>
                <form action="<?php echo url("account/password_process")?>" method="POST" >
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" class="form-control"><br>
<br>

                    <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
                    
                  <br><br>

                    <input type="submit" value="Change Password" class="btn btn-success" />
                </div><!-- /input-group -->
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="<?php echo LIBS?>assets/js/jquery.js"></script>
    <script src="<?php echo LIBS?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
