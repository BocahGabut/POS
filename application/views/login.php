<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/themes/semi-dark-layout.min.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/template/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class=" col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <?php echo $this->session->flashdata('pesan') ?>
                                                <form action="<?php echo base_url(); ?>login/aksi_login" method="post">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input name="username" type="text" class="form-control" id="user-name" placeholder="Username" required>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input name="password" type="password" class="form-control" id="user-password" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="fa fa-key"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <center><button type="submit" class="btn btn-primary">Login</button></center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/template/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url(); ?>assets/template/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url(); ?>assets/template/js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/core/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/js/scripts/components.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/horizontal-menu-template/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Oct 2019 02:19:02 GMT -->

</html>