<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <a class="my-auto" href="<?= base_url('user') ?>"><i class="icon ion-md-arrow-back"></i> back</a>
            <h4 class="page-title my-auto ml-2"> &#8212; Tambah <?= $title; ?></h4>
            <a href="<?= base_url('user') ?>" class="btn btn-secondary ml-auto"><i class="icon ion-md-close-circle"></i>Cancel</a>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <form class="form-sample" method="post" action="<?= base_url('user/add') ?>">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-lg-right">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fullname" id="fullname"
                                           value="<?= set_value('fullname') ?>"/>
                                    <?= form_error('fullname', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="username"
                                           value="<?= set_value('username') ?>"/>
                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                           value="<?= set_value('phone') ?>"/>
                                    <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="you@email.com"
                                           value="<?= set_value('email') ?>"/>
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="address" name="address"><?= set_value('address') ?></textarea>
                                    <?= form_error('address', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">User Role</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role" id="role">
                                        <option selected disabled>Select..</option>
                                        <option value="1">Administator</option>
                                        <option value="2">User</option>
                                        <option value="3">Production</option>
                                    </select>
                                    <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">User Activation</label>
                                <div class="col-sm-4">
                                    <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="active" id="is_active_1" value="1" checked>
                                            Active </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="active" id="is_active_0" value="0"> Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Create Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password1" id="password1"/>
                                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Confirm</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password2" id="password2"/>
                                    <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"><i class="icon ion-md-checkmark-circle"></i>Save Changes</button>
                        <button href="<?= base_url('user') ?>" type="button" class="btn btn-secondary"><i
                                    class="icon ion-md-close-circle"></i>Clear
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<script>

    $(document).ready(function () {
        $('#fullname').focus();
    });

</script>

