<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="theme_ocean">
    <!--! The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags !-->
    <!--! BEGIN: Apps Title-->
    <title>Duralux || Login Creative</title>
    <!--! END:  Apps Title-->
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>/assets/images/favicon.ico">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/vendors/css/vendors.min.css">
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/css/theme.min.css">
    <!--! END: Custom CSS-->
    <!--! HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries !-->
    <!--! WARNING: Respond.js doesn"t work if you view the page via file: !-->
    <!--[if lt IE 9]>
			<script src="https:oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https:oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <main class="auth-creative-wrapper">
        <div class="auth-creative-inner">
            <div class="creative-card-wrapper">
                <div class="card my-4 overflow-hidden" style="z-index: 1">
                    <div class="row flex-1 g-0">
                        <div class="col-lg-6 h-100 my-auto order-1 order-lg-0">

                            <div class="creative-card-body card-body p-sm-5">
                                <h2 class="fs-20 fw-bolder mb-4">Login</h2>
                                <p class="fs-12 fw-medium text-muted">Web Administrator Portal Berita.</p>
                                <?php if ($this->session->flashdata('failed')) : ?>

                                <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                                    <strong><?php echo $this->session->flashdata('failed'); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('success')) : ?>

                                <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
                                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <?php endif; ?>
                                <form action="<?php echo base_url('submit/login') ?>" method="post"
                                    class="w-100 mt-4 pt-2">
                                    <div class="mb-4">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Email or Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>

                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-lg btn-primary w-100">Login</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="col-lg-6 bg-primary order-0 order-lg-1">
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <img src="assets/images/auth/auth-user.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?php echo base_url() ?>/assets/vendors/js/vendors.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/common-init.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/theme-customizer-init.min.js"></script>

</body>

</html>