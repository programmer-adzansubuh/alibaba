<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/selectize/selectize.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/daterangepicker/daterangepicker.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/star-admin.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <div class="header text-dark">
        <h2>CV. ALIBABA KARYA UTAMA</h2>
    </div>
    <nav class="navbar navbar-expand-lg navbar-info bg-dark" id="navbar">
        <a class="navbar-brand ml-3" href="#">ALIBABA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <?php foreach ($menu as $row) : ?>
                    <li class="nav-item">
                        <a class="nav-link
                        <?php if ($title == $row['menu_title']) { echo 'active'; } ?>" href="<?= base_url($row['menu_url']) ?>"><?= $row['menu_title'] ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="nav-item dropdown my-lg-0">
                <a class="nav-link dropdown-toggle text-white text-sm" href="#" id="UserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <small><?= $user_data['user_fullname'] ?></small>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <a class="dropdown-item" href="#"><i class="mdi mdi-account"></i>&nbsp; Profile</a>
                    <a class="dropdown-item" onclick="return confirm('Are you sure for logout!')" href="<?= base_url('auth/logout') ?>"><i class="mdi mdi-logout"></i>&nbsp; Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">