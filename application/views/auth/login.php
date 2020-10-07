<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="card auto-form-wrapper">
                        <form action="<?= base_url('auth') ?>" method="post" id="form">
                            <div class="text-block text-center my-3">
                                <img src="<?= base_url() ?>assets/images/auth/undraw_authentication_fsn5.svg" alt="" width="200px" height="200px">
                                <h3 class="text-dark">Login to <span class="font-weight-light">Alibaba</span></h3>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="form-group mt-4">
                                <label class="label">Email Address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control <?= form_error('email', 'form-control-error ', '') ?>" placeholder="masukan email" id="email" name="email"value="<?= set_value('email') ?>" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-account"></i>
                                        </span>
                                    </div>
                                </div>
                                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label class="label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control <?= form_error('password', 'form-control-error ', '') ?>" placeholder="masukan kata sandi" id="password" name="password" >
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                          <i class="mdi mdi-key"></i>
                                        </span>
                                    </div>
                                </div>
                                <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="submit" class="btn btn-primary submit-btn btn-block"><i class="icon ion-md-log-in "> </i> Login</button>
                            </div>
                            <br><br>
                            <div id="transaction-body"></div>
                        </form>
                    </div>
                    <ul class="auth-footer">
                        <li>
                            <a href="#">Conditions</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>
                    <p class="footer-text text-center text-light">Copyright © 2019 <a class="text-light" href="<?= base_url() ?>" target="_blank">Alibaba</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<script>

    $(document).ready(function () {
        $('#submit').click( function() {
            loggedin(true);
        });

    });



    function loggedin(type) {
        if (type) {
            $('#transaction-body').addClass('loading-mask');
            $('#submit').text('Logging in....');
        } else {
            $('#transaction-body').removeClass('loading-mask');
            $('#submit').text('Login');
        }

    }
</script>