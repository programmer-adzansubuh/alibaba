<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <?php if (isset($_GET['from-order'])) : ?>
                <a class="my-auto aback" href="<?= base_url('transaction/create?id=') . $group['group_product_id'] ?>"><i
                            class="icon ion-md-arrow-back"></i> Back to Transaction Page  </a> &#8212;
            <?php endif; ?>
            <h4 class="page-title my-auto ml-2"><?= $title; ?></h4>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <form class="form-sample" method="post" action="<?= base_url('customer') ?>">
                            <input type="hidden" name="id" id="id" />
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <label id="label" class="col-sm-9 col-form-label display-2">Add New Customer</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-lg-right">Customer</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="<?= set_value('name') ?>"/>
                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
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
                                <label class="col-sm-3 col-form-label  text-lg-right">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="address" name="address"><?= set_value('address') ?></textarea>
                                    <?= form_error('address', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="<?= set_value('email') ?>"/>
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Customer Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="type" id="type">
                                        <option selected disabled>Select..</option>
                                        <?php foreach ($cust_type as $row) : ?>
                                        <option value="<?= $row['cust_type_id'] ?>"><?= $row['cust_type_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('type', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-lg-right"></label>
                                <div class="col-sm-9">
                                    <button id="add" type="submit" class="btn btn-primary"><i class="icon ion-md-checkmark-circle"></i>
                                        Save Changes </button>
                                    <a href="<?= base_url('customer') ?>" class="btn btn-secondary"> Clear</a>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-lg-8 mt-4">
                        <table class="table table-sm table-bordered" id="menu-data" style="width: 100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Customer Type</th>
                                <th>Phone Number</th>
                                <th>Email Address</th>
                                <th class="text-center">Actiont
                            </tr>
                            </thead>
                            <tbody class="member">
                            <?php
                            $i = 1;
                            foreach ($cust as $row) : ?>
                                <tr class="changeItem"
                                    data-id="<?= $row['customer_id'] ?>"
                                    data-name="<?= $row['customer_name'] ?>"
                                    data-phone="<?= $row['customer_phone'] ?>"
                                    data-address="<?= $row['customer_address'] ?>"
                                    data-email="<?= $row['customer_email'] ?>"
                                    data-type="<?= $row['customer_type_id'] ?>">
                                    <th><?= $i++ ?></th>
                                    <td><?= strtoupper($row['customer_name']) ?></td>
                                    <td><?= $row['cust_type_name'] ?></td>
                                    <td><?= $row['customer_phone'] ?></td>
                                    <td><?= $row['customer_email'] ?></td>
                                    <td class="text-center">

                                        <a class="changeItem text-secondary"
                                           href="#"
                                           data-id="<?= $row['customer_id'] ?>"
                                           data-name="<?= $row['customer_name'] ?>"
                                           data-phone="<?= $row['customer_phone'] ?>"
                                           data-address="<?= $row['customer_address'] ?>"
                                           data-email="<?= $row['customer_email'] ?>"
                                           data-type="<?= $row['customer_type_id'] ?>" >
                                            <i class="icon ion-md-create icon-sm"></i>
                                        </a>
                                        &nbsp;
                                        <a onclick="return confirm('Are you sure?')"
                                           href="<?= base_url('customer/delete?delete_id=') . $row['customer_id'] ?>" class="text-secondary"><i
                                                    class="icon ion-md-trash icon-sm"></i></a>
                                    </td>

                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<script>

    $(document).ready(function () {

        $('#menu-data').DataTable({
            "scrollY": "300px",
            "scrollX": true
        });

        $('.changeItem').css('cursor', 'pointer');
        $('.changeItem').on('click', function () {

            let id = $(this).data('id');
            let name = $(this).data('name');
            let phone = $(this).data('phone');
            let email = $(this).data('email');
            let address = $(this).data('address');
            let type = $(this).data('type');

            $('#id').val(id);
            $('#name').val(name);
            $('#phone').val(phone);
            $('#email').val(email);
            $('#address').val(address);
            $('#type').val(type);

            $('#name').focus();
            $('#label').text('Update Customer');
            $('#label').addClass('text-success');
            $('#add').removeClass('btn-primary');
            $('#add').addClass('btn-success');
        })

    });

</script>