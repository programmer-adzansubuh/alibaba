<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <a class="my-auto aback" href="<?= base_url('transaction/list_of?id=') . $group['group_product_id']; ?>"><i
                        class="icon ion-md-arrow-back"></i> back</a>
            <h4 class="page-title my-auto ml-2"> &#8212; <?= $title; ?>
                &#187; <span class="text-black-50 font-weight-light"><?= $group['group_product_name']; ?></span>
            </h4>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-header bg-success">
                <span class="text-light text-left"><?= $title ?> Order</span>
            </div>
            <div class="card-body">
                <div class="row justify-content-between mt-2">
                    <div class="col-md-7">
                        <div class="form-group row">
                            <label class="col-lg-2 col-sm-3 col-form-label">Pelanggan</label>
                            <input type="hidden" id="customer_id">
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon ion-md-search"></i></span>
                                    </div>
                                    <select class="form-control mr-3" data-live-search="true" name="cust_id" id="cust_id"
                                            placeholder="Select a customer...">
                                        <option value="">Select a customer...</option>
                                        <?php foreach ($cust as $row) : ?>
                                            <option value="<?= $row['customer_id'] ?>"
                                                    data-phone="<?= $row['customer_phone']; ?>"
                                                <?php if ($row['customer_id'] == $cust_order['customer_id']) {
                                                    echo 'selected';
                                                } ?>><?= $row['customer_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button onclick="addCustomer()"
                                            class="btn btn-outline-success btn-sm">
                                        <i class="icon ion-md-add-circle"></i>
                                    </button>
                                </div>
                                <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-sm-3 col-form-label">Telepon</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon ion-md-call"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="phone" value="<?= $cust_order['customer_phone'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon ion-md-mail"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" value="<?= $cust_order['customer_email'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon ion-md-map"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" value="<?= $cust_order['customer_address'] ?>">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4 col-form-label text-lg-right offset-lg-2">Invoice No. #</label>
                            <div class="col-lg-7 col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon ion-md-document"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="<?= $cust_order['order_code']; ?>" id="code">
                                </div>
                                <?= form_error('min', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4 col-form-label text-lg-right offset-lg-2">Tanggal</label>
                            <div class="col-lg-7 col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon ion-md-calendar"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="order-date">
                                </div>
                                <?= form_error('min', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-sm-4 col-form-label text-lg-right offset-lg-2">Tanggal Selesai</label>
                            <div class="col-lg-7 col-md-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon ion-md-calendar"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="order-finish">
                                    </div>
                                </div>
                                <?= form_error('min', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-8" style="margin-top: -7px;">
                        <span class="text-muted text-left"><i class="icon ion-md-list-box" l></i>&nbsp; Order Item : </span>
                        <div id="table-listing" class="mt-2">
                            <div class="table-scrollable table-bordered">
                                <table data-count-fixed-columns="2" class="table" id="transactionTable" cellpadding="0" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th colspan="2">Jenis <?= $group['group_product_note'] ?></th>
                                        <th class="text-right">Harga</th>
                                        <th class="text-right">Qty</th>
                                        <th>Unit</th>
                                        <th class="text-right">Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; $total = 0; foreach ($order_item as $item) :
                                            $i++;
                                            $total += (intval($item['order_price']) * intval($item['order_quantity'])) ?>
                                            <tr>
                                                <td width="10px" data-toggle="tooltip" title="Delete">
                                                    <?= $i ?>
                                                    <!--<a onclick="return confirm('Are you sure?')" href="#" class="text-danger">
                                                        <i class="icon ion-md-trash "></i>
                                                    </a>-->
                                                <td width="220px">
                                                    <?= $item['product_name'] ?>
                                                </td>
                                                <td <?php if ($item['product_finishing_name'] == null) { echo "colspan='2'";}?>>
                                                    <?= $item['product_price_name'] ?>
                                                </td>
                                                <?php if ($item['product_finishing_name'] != null) : ?>
                                                <td width="0" >
                                                    <?= $item['product_finishing_name'] ?>
                                                </td>
                                                <?php endif; ?>
                                                <td class="text-right">
                                                    Rp <?= rupiahFormat($item['order_price']); ?>
                                                </td>
                                                <td width="80px" class="text-right">
                                                    <?= $item['order_quantity'] ?>
                                                </td>
                                                <td>
                                                    <?= $item['unit_name'] ?>
                                                </td>
                                                <td class="text-right">
                                                    Rp <?= rupiahFormat(intval($item['order_price']) * intval($item['order_quantity'])); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="dropdown-divider mt-5">
                        <div class="form-group row mt-3">
                            <label class="col-lg-2 col-sm-4 col-form-label">Jumlah Order </label>
                            <div class="col-sm-7 col-form-label">
                                <div>: <b><span id="jumlahItem"><?= $i; ?></span></b> Items</div>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -10px">
                            <label class="col-lg-2 col-sm-4 col-form-label ">Catatan
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="note" id="note" placeholder="Tambahkan Catatan"><?= $cust_order['order_note'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -10px">
                            <label class="col-lg-2 col-sm-4 col-form-label "> Status
                            </label>
                            <div class="col-sm-7 col-form-label">
                                <div id="status">:

                                    <?php if ($cust_order['order_status'] == 0) : ?>
                                    <span class="badge badge-danger badge-lg" id="status"><i class="icon ion-md-close-circle"></i> Belum Lunas</span>
                                    <?php else: ?>
                                    <span class="badge badge-success badge-lg" id="status"><i class="icon ion-md-checkmark-circle"></i> Lunas</span>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4">
                        <div class="card bg-success" style="box-shadow: none">
                            <div class="card-header bg-dark text-light">
                                Amount
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-dark"><b>Total Harga</b></label>
                                    <h3 id="totalHarga" class="col-sm-8 text-right text-dark font-weight-semibold">Rp <?= rupiahFormat($total) ?>,-</h3>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-dark">Di Bayar</label>
                                    <div class="col-sm-6 col-md-4 col-lg-7 offset-sm-2 offset-md-4 offset-lg-1 text-right form-group">
                                        <div class="input-group" id="bayar">
                                            <div class="input-group-prepend bg-success">
                                                <span class="input-group-text">Rp </span>
                                            </div>
                                            <input value="<?= rupiahFormat($cust_order['order_paid']) ?>" id="jumlahBayar" class="text-dark form-control text-right" type="text"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: -20px">
                                    <label id="textSisaBayar" class="col-sm-4 col-form-label text-dark">Sisa Bayar</label>
                                    <h5 id="sisaBayar" class="col-sm-8 text-right font-weight-semibold" style="color: #dc3545;"><b>Rp <?= rupiahFormat(intval($total) - intval($cust_order['order_paid'])) ?></b></h5>
                                </div>
                                <button onclick="submitAll()" class="btn btn-dark btn-lg mt-3 btn-block"><i
                                            class="icon ion-md-checkmark-circle"></i> Update Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="transaction-body"></div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<style>
    #table-listing {
        width: 100%;
        border-top: 1px solid #dddddd;
    }

    .table-scrollable {
        width: auto;
        overflow-x: auto;
        overflow-y: hidden;
        border: 0px solid #dddddd;
    }

    .table th {
        white-space: nowrap;
    }

    .table td {
        vertical-align: top;
        border-bottom: 1px solid #ddd;
    }
</style>

<!---->
<script>

    let list = [];
    let listItem = [];
    let listID = [];
    let price1;
    let price2;
    let total;

    $(document).ready(function () {

        $('#cust_id').selectize({
            delimiter: ',',
            persist: false,
            maxItems: 1,
            maxOptions: 30,
            labelField: "name",
            valueField: "id",
            sortField: 'name',
            searchField: 'name',
            create: true,
            onChange: function (val) {
                let cust = this.options[val];
                if (cust != null) {
                    $.ajax({
                        url: '<?= base_url('transaction/getCustomer')?>',
                        type: 'post',
                        data: {
                            cust_id: cust.id
                        },
                        success: function (result) {
                            if (result === 'null') {
                                $('#name').val(val);
                                $('#modalAddCust').on('shown.bs.modal', function () {
                                    $('#cphone').trigger('focus');
                                }).modal('show');
                            } else {
                                let cust = JSON.parse(result);
                                $('#phone').val(cust.customer_phone);
                                $('#email').val(cust.customer_email);
                                $('#customer_id').val(cust.customer_id);
                            }
                        },
                        error: function () {
                            toastr["warning"]("Failed to selected! (error)");
                        }
                    })
                }
            }

        });

        $('#addCust').on('click', function () {

            if ($('#name').val() === '' ||
                $('#cphone').val() === '' ||
                $('#cemail').val() === '' ||
                $('#type').val() === null) {

                toastr["warning"]("Please submit all field");

            } else {

                let name = $('#name').val();
                let phone = $('#cphone').val();
                let address = $('#address').text();
                let email = $('#cemail').val();
                let type = $('#type').val();
                $.ajax({
                    url: '<?= base_url('customer/addCustomer')?>',
                    method: 'post',
                    data: {
                        name: name,
                        phone: phone,
                        address: address,
                        email: email,
                        type: type
                    },
                    success: function (result) {
                        if (result != null) {
                            let cust = JSON.parse(result);
                            $('.item').html('');
                            $('.item').html(cust.customer_name);
                            $('#phone').val(cust.customer_phone);
                            $('#email').val(cust.customer_email);
                            $('#customer_id').val(cust.customer_id);
                            $('#modalAddCust').modal('hide');
                        } else {
                            toastr["warning"]("Failed ro saved");
                        }
                    },
                    error: function () {
                        toastr["error"]("Failed to saved! (error)");
                    }
                })

            }
        });

        $('#order-date').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            singleDatePicker: true,
            startDate: `<?= date('d/m/Y H:i:s', $cust_order['order_date']); ?>`,
            locale: {
                format: 'DD/MM/YYYY HH:mm',
            }
        });

        $('#order-finish').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            singleDatePicker: true,
            startDate: `<?= date('d/m/Y H:i:s', $cust_order['order_finish']); ?>`,
            locale: {
                format: 'DD/MM/YYYY HH:mm',

            }
        });

        $('#jumlahBayar').keyup(function () {
            $('#jumlahBayar').mask('0.000.000.000.000', {reverse: true});
        })

    });

    function addCustomer() {
        $('#modalAddCust').on('shown.bs.modal', function () {
            $('#name').trigger('focus');
        }).modal('show');
    }

    function status() {
        if (convertToAngka($('#jumlahBayar').val()) < convertToAngka($('#totalHarga').text().replace('Rp ', '')) || isNaN(convertToAngka($('#jumlahBayar').val()))) {
            return 0;
        } else {
            return 1;
        }
    }

    function getStatus() {
        return status();
    }

    function submitAll() {

        let cust_id = $('#cust_id').val();
        let code = $('#code').val();
        let order_date = new Date($('#order-date').data('daterangepicker').startDate._d);
        let order_finish = new Date($('#order-finish').data('daterangepicker').startDate._d);
        let order_paid = convertToAngka($('#jumlahBayar').val());
        let order_note = $('#note').val();
        let status = getStatus();

        if (cust_id === '' || email === '' || phone === '' || code === '' || order_date === null || order_finish === null) {
            toastr["warning"]("Please input required data!");
        } else {
            $('#transaction-body').addClass('loading-mask');
            $.ajax({
                url: '<?= base_url('transaction/updateTransaction?id=') . $group['group_product_id'] . '&order_id=' . $cust_order['order_id']?>',
                method: 'post',
                data: {
                    order_cust_id: cust_id,
                    order_user_id: '<?= $user_data['user_id'] ?>',
                    group_product_id: '<?= $group['group_product_id']; ?>',
                    order_code: code,
                    order_note: order_note,
                    order_paid: order_paid,
                    order_status: status,
                    order_date: getTimeFromPicker(order_date),
                    order_finish: getTimeFromPicker(order_finish)
                },
                success: function (result) {
                    setTimeout(function () {
                        $('#transaction-body').removeClass('loading-mask');
                        if (result === 'success') {
                            window.document.location.href = '<?= base_url('transaction/list_of?id=') . $group['group_product_id'] ?>';
                        } else {
                            toastr["warning"]("Order gagal ditambahkan!");
                        }
                    }, 800);
                },
                error: function (err) {
                    setTimeout(function () {
                        $('#transaction-body').removeClass('loading-mask');
                        toastr["warning"]('Server Error');
                    }, 100);
                }
            })
        }
    }

</script>

<!-- Modal -->
<div class="modal fade" id="modalAddCust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-sample" method="post" action="" id="addCustomerForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id"/>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-lg-right">Customer</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name"
                                   value="<?= set_value('name') ?>" required/>
                            <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label  text-lg-right">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="cphone" name="phone"
                                   value="<?= set_value('phone') ?>" required/>
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
                            <input type="email" class="form-control" id="cemail" name="email"
                                   value="<?= set_value('email') ?>" required/>
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label  text-lg-right">Customer Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="type" id="type" required>
                                <option selected disabled>Select..</option>
                                <?php foreach ($cust_type as $row) : ?>
                                    <option value="<?= $row['cust_type_id'] ?>"><?= $row['cust_type_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('type', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="addCust" type="button" class="btn btn-primary"><i class="icon ion-md-checkmark-circle"></i>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>