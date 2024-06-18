<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Crisil Infotech">
        <title><?= $basics->site_name ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?><?= $basics->icon ?>">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"  rel="stylesheet">
        <link href="<?= base_url('asset/css/line-awesome.min.css') ?>"
              rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/vendors/css/forms/icheck/icheck.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/vendors/css/forms/icheck/custom.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/css/app.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/css/core/menu/menu-types/horizontal-menu.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/css/core/colors/palette-gradient.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/css/pages/login-register.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url('asset/auth') ?>/css/style.css">
    </head>
    <body class="horizontal-layout horizontal-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page"  data-open="hover" data-menu="horizontal-menu" data-col="1-column">

        <div class="myAlert-top alert alert-success slideRightToLeft" id="success_msg">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> <?= $msg[1] ?>.
        </div>
        <div class="myAlert-top alert alert-danger slideRightToLeft" id="err_msg">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> <?= $msg[1] ?>.
        </div>

        <style>
            .card{
                background-color: rgba(255,255,255,0.8);
            }
            .card-footer, .card-header {
                background-color: transparent;
            }
        </style>
        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-md-4 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                    <div class="card-header border-0">
                                        <div class="card-title text-center">
                                            <img src="<?= base_url($basics->logo) ?>" style="max-width:200px;max-height: 100px;" alt="branding logo">
                                        </div>

                                    </div>
                                    <div class="card-content">

                                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                            <span>Admin Login</span>
                                        </p>
                                        <div class="card-body">
                                            <form class="form-horizontal" method="post" action="<?= base_url('Auth/Login/verifylogin') ?>" novalidate>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control" id="user-name" placeholder="Your Username" name="username" required>
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="user-password" placeholder="Enter Password" name="password" required>
                                                    <div class="form-control-position">
                                                        <i class="ft-lock"></i>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-12 text-center text-sm-left">
                                                        <fieldset>
                                                            <input type="checkbox" id="remember-me" class="chk-remember">
                                                            <label for="remember-me"> Remember Me</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                                                </div>
                                                <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script src="<?= base_url('asset/auth') ?>/vendors/js/vendors.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= base_url('asset/auth') ?>/vendors/js/ui/jquery.sticky.js"></script>
        <script type="text/javascript" src="<?= base_url('asset/auth') ?>/vendors/js/charts/jquery.sparkline.min.js"></script>
        <script src="<?= base_url('asset/auth') ?>/vendors/js/forms/validation/jqBootstrapValidation.js"
        type="text/javascript"></script>
        <script src="<?= base_url('asset/auth') ?>/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
        <script src="<?= base_url('asset/auth') ?>/js/core/app-menu.min.js" type="text/javascript"></script>
        <script src="<?= base_url('asset/auth') ?>/js/core/app.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= base_url('asset/auth') ?>/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
        <script src="<?= base_url('asset/auth') ?>/js/scripts/forms/form-login-register.min.js" type="text/javascript"></script>
        <?php
        if ($msg[0] == 'Error') {
            echo '<script>
            $(document).ready(function () {
                setTimeout(function () {
                    $("#err_msg").addClass("show");
                }, 1000);
                setTimeout(function () {
                    $("#err_msg").removeClass("show");
                }, 5000);
            });
        </script>';
        } elseif ($msg[0] == 'Success') {
            echo '<script>
            $(document).ready(function () {
                setTimeout(function () {
                    $("#success_msg").addClass("show");
                }, 1000);
                setTimeout(function () {
                    $("#success_msg").removeClass("show");
                }, 5000);
            });
        </script>';
        }
        ?>
        <?php ?>

    </body>
</html>