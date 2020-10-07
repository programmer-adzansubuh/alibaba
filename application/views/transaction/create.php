<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <a class="my-auto aback" href="<?= base_url('transaction') ?>"><i class="icon ion-md-arrow-back"></i> back</a>
            <h4 class="page-title my-auto ml-2"> &#8212; <?= $title; ?>
                &#187; <span class="text-black-50 font-weight-light"><?= $group['group_product_name']; ?></span>
            </h4>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-header bg-primary">
                <span class="text-light text-left">Buat <?= $title ?> Baru</span>
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
                                                    data-phone="<?= $row['customer_phone']; ?>"><?= $row['customer_name'] ?></option>
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
                                    <input type="text" class="form-control" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-sm-3 col-form-label">Alamat Email</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon ion-md-mail"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="email">
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
                                    <input type="text" class="form-control" value="<?= $inv; ?>" id="code">
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
                        <span class="text-muted text-left"><i class="icon ion-md-list-box" l></i>&nbsp; Pilih Order Item : </span>
                        <div id="table-listing" class="mt-2">
                            <div class="table-scrollable table-bordered">
                                <table data-count-fixed-columns="2" class="table" id="transactionTable" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Produk</th>
                                            <th colspan="2">Jenis <?= $group['group_product_note'] ?></th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataItem">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="dropdown-divider mt-5">
                        <div class="form-group row mt-3">
                            <label class="col-lg-2 col-sm-4 col-form-label">Jumlah Order </label>
                            <div class="col-sm-7 col-form-label">
                                <div>: <b><span id="jumlahItem">0</span></b> Items</div>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -10px">
                            <label class="col-lg-2 col-sm-4 col-form-label ">Catatan
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="note" id="note" placeholder="Tambahkan Catatan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-top: -10px">
                            <label class="col-lg-2 col-sm-4 col-form-label "> Status
                            </label>
                            <div class="col-sm-7 col-form-label">
                                <div id="status">: </div>
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
                                    <h3 id="totalHarga" class="col-sm-8 text-right text-dark font-weight-semibold"></h3>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-dark">Di Bayar</label>
                                    <div class="col-sm-6 col-md-4 col-lg-7 offset-sm-2 offset-md-4 offset-lg-1 text-right form-group">
                                        <div class="input-group" id="bayar">
                                            <div class="input-group-prepend bg-success">
                                                <span class="input-group-text">Rp </span>
                                            </div>
                                            <input id="jumlahBayar" class="text-dark form-control text-right" type="text"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" style="margin-top: -20px">
                                    <label id="textSisaBayar" class="col-sm-4 col-form-label text-dark">Sisa Bayar</label>
                                    <h5 id="sisaBayar" class="col-sm-8 text-right font-weight-semibold" style="color: #dc3545;"><b></b></h5>
                                </div>
                                <button onclick="submitAll()" class="btn btn-dark btn-lg mt-3 btn-block"><i
                                            class="icon ion-md-checkmark-circle"></i>Submit Changes
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
            startDate: moment(),
            locale: {
                format: 'DD/MM/YYYY HH:mm:ss',
            }
        });

        $('#order-finish').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            singleDatePicker: true,
            startDate: moment(),
            locale: {
                format: 'DD/MM/YYYY HH:mm:ss',

            }
        });

        loadItems('');

        $('#totalHarga').text('Rp 0,-');
        $('#sisaBayar').text('Rp 0,-');
        $('#jumlahBayar').mask('0.000.000.000.000', {reverse: true});
    });

    function loadItems(data) {

        let ids = createID();
        let productId = data ? ids : 'product_id';
        let number = data ? listID.length + 1 : '1';

        $('#dataItem').append(
            `<tr>
                <td width="10px" data-toggle="tooltip"
                    title="Delete"><a onclick="return confirm('Are you sure?')" href="#" id="` + productId + `Delete" class="text-danger"><i class="icon ion-md-trash "></i></a></div>
                <td width="250px" class="selected-table">
                    <select id="` + productId + `" class="form-control mr-3" data-live-search="true" data-container="body"
                            name="product_name" data-placeholder="Select a product...">
                    <option value="">Select a product...</option>
                    </select>
                </td>
                <td width="200px" class="selected-table" id="` + productId + `Td"></td>
                <td width="0" class="selected-table" id="` + productId + `Td2"></td>
                <td class="selected-table" width="50px">
                    <input style="width: 100px" placeholder="Harga..." type="text" class="input-editable" id="` + productId + `Td3">
                </td>
                <td class="selected-table" width="80px">
                    <input style="width: 80px" placeholder="Quantity..." type="text" class="input-editable" id="` + productId + `Td4">
                </td>
                <td class="selected-table">
                    <input disabled style="width: 80px; background-color: white" type="text" class="input-editable" id="` + productId + `Td5">
                </td>
                <td class="selected-table">
                    <input disabled style="width: 100px; background-color: white" type="text" class="input-editable" id="` + productId + `Td6">
                </td>
            </tr>`
        );

        //init view
        $('#product_idTd3').mask('0.000.000.000.000', {reverse: true});
        deleteRow(productId);
        app_handle_listing_horisontal_scroll($('#table-listing'));


        //load select option product
        $.ajax({
            url: '<?= base_url('transaction/getProducts') ?>',
            type: 'GET',
            data: {id: '<?= $group['group_product_id'] ?>'},
            error: function () {
            },
            success: function (opt) {
                $('#' + productId).selectize({
                    persist: false,
                    maxItems: 1,
                    valueField: 'product_id',
                    labelField: 'product_name',
                    searchField: ['product_name', 'product_type_name'],
                    options: JSON.parse(opt),
                    render: {
                        option: function (item) {
                            return '<div class="p-2">'
                                + '<span class="text-uppercase"><b>' + item.product_name + '</b></span class="text-uppercase"><br>'
                                + '<span class="text-small">' + item.product_type_name + '</span> '
                                + '</div>';
                        }
                    },
                    onChange: function (val) {
                        let data = this.options[val];
                        if (data != null) {

                            console.log(data.product_stock);
                            if (data.product_stock < 1) {
                                let row = $('#' + productId + 'Delete').closest('tr');
                                let elemToCheckIsNotNull = row.find('.selectize-input');
                                if (elemToCheckIsNotNull.text() === '') {
                                    row.remove();
                                    loadItems('');
                                } else  {
                                    row.remove();
                                }
                                toastr["warning"]("Stock habis!");
                            }

                            let dataItem = {
                                item_id: productId,
                                product_id: data.product_id,
                                product_price_id: '',
                                product_finisihing_id: '',
                                unit_id: '',
                                price: '',
                                quantity: '',
                                total_price: '',
                                stock_value: data.product_stock,
                                min: data.product_min_order
                            };

                            //load select options type 1
                            getProductPriceName(productId, data.product_id, data.product_min_order, data.unit_name, dataItem);

                            //check if in array is alredy
                            if ($.inArray(ids, listID) > -1) {
                            } else {
                                listID.push(ids);
                                loadItems(data);
                            }
                        }
                    },
                    onFocus: function (e) {
                        $('.table-scrollable').css("overflow", "inherit");
                    },
                    onBlur: function () {
                        $('.table-scrollable').css("overflow", "auto");
                    }
                });
            }
        });
    }

    //TYPE 1
    function getProductPriceName(productId, id, min, unit, dataItem) {
        $('#' + productId + 'Td').html('');
        $('#' + productId + 'Td2').html('');
        $('#' + productId + 'Td2').css('width', '0px');
        $('#' + productId + 'Td3').val('');
        $('#' + productId + 'Td4').val('');
        $('#' + productId + 'Td5').val('');
        $('#' + productId + 'Td6').val('');
        $('#' + productId + 'Td').attr('colspan', '0');
        $('#' + productId + 'Td').html(`
            <select id="` + productId + `PriceName" class="form-control mr-3"
                    data-live-search="true" name="product_name" data-placeholder="Select a type...">
                <option value="">Select a type...</option>
            </select>
        `);

        $.ajax({
            url: '<?= base_url('transaction/getProductPrice') ?>',
            type: 'GET',
            data: {id: id},
            error: function () {
            },
            success: function (opt) {
                $('#' + productId + 'PriceName').selectize({
                    persist: false,
                    maxItems: 1,
                    valueField: 'product_price_id',
                    labelField: 'product_price_name',
                    searchField: 'product_price_name',
                    options: JSON.parse(opt),
                    render: {
                        option: function (item) {
                            return '<div class="p-2">'
                                + '<span class="text-uppercase"><b>' + item.product_price_name + '</b></span class="text-uppercase"><br>'
                                + '<span>Rp ' + convertToRupiah(item.product_price_hj) + '/' + item.unit_name + '</span> '
                                + '</div>';
                        }
                    },
                    onChange: function (val) {
                        let data = this.options[val];
                        if (data != null) {
                            //Data item object

                            if (dataItem.stock_value < min) {
                                min = dataItem.stock_value;
                            }

                            dataItem = {
                                item_id: dataItem.item_id,
                                product_id: dataItem.product_id,
                                product_price_id: data.product_price_id,
                                product_finisihing_id: '',
                                unit_id: data.unit_id,
                                price: data.product_price_hj,
                                quantity: min,
                                total_price: parseInt(min) * parseInt(data.product_price_hj),
                                stock_value: dataItem.stock_value,
                                min: dataItem.min
                            };

                            $('#' + productId + 'Td2').focus();
                            $('#' + productId + 'Td3').mask('0.000.000.000.000', {reverse: true});
                            $('#' + productId + 'Td3').val(convertToRupiah(dataItem.price));
                            $('#' + productId + 'Td4').val(dataItem.quantity);
                            $('#' + productId + 'Td5').val(unit);
                            $('#' + productId + 'Td6').val(convertToRupiah(dataItem.total_price));

                            //load select options for other type
                            //count price default
                            $('#totalHarga').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');
                            $('#sisaBayar').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');

                            addItemObject(dataItem);
                            countPriceItemChange(listItem, dataItem);
                            getProductFinishingName(productId, id, dataItem);
                        }
                    },
                    onFocus: function (e) {
                        $('.table-scrollable').css("overflow", "inherit");
                    },
                    onBlur: function () {
                        $('.table-scrollable').css("overflow", "auto");
                    }
                });
            }
        });
    }

    //TYPE 2
    function getProductFinishingName(productId, id, dataItem) {
        $('#' + productId + 'Td2').html('');
        $('#' + productId + 'Td2').css('width', '200px');
        $('#' + productId + 'Td2').html(`
            <select id="` + productId + `PriceNameF" class="form-control mr-3"
                    data-live-search="true" name="product_name" data-placeholder="More type...">
                <option value="">More type...</option>
            </select>
        `);

        $.ajax({
            url: '<?= base_url('transaction/getProductPriceF') ?>',
            type: 'GET',
            data: {id: id},
            error: function () {
            },
            success: function (opt) {
                if (opt !== '[]') {
                    $('#' + productId + 'Td2').show();
                    $('#' + productId + 'PriceNameF').selectize({
                        persist: false,
                        maxItems: 1,
                        valueField: 'product_finishing_id',
                        labelField: 'product_finishing_name',
                        searchField: 'product_finishing_name',
                        options: JSON.parse(opt),
                        render: {
                            option: function (item) {
                                return '<div class="p-2">'
                                    + '<span class="text-uppercase"><b>' + item.product_finishing_name + '</b></span class="text-uppercase"><br>'
                                    + '<span>+ Rp ' + convertToRupiah(item.product_finishing_price) + '/' + item.unit_name + '</span> '
                                    + '</div>';
                            }
                        },
                        onChange: function (val) {
                            let data = this.options[val];
                            if (data != null) {

                                dataItem = {
                                    item_id: dataItem.item_id,
                                    product_id: dataItem.product_id,
                                    product_price_id: dataItem.product_price_id,
                                    product_finisihing_id: data.product_finishing_id,
                                    unit_id: dataItem.unit_id,
                                    price: parseInt(dataItem.price) + parseInt(data.product_finishing_price),
                                    quantity: parseInt(dataItem.quantity),
                                    total_price: parseInt(dataItem.quantity) * (parseInt(data.product_finishing_price) + parseInt(dataItem.price)),
                                    stock_value: dataItem.stock_value,
                                    min: dataItem.min
                                };

                                $('#' + productId + 'Td3').mask('0.000.000.000.000', {reverse: true});
                                $('#' + productId + 'Td3').val(convertToRupiah(parseInt(dataItem.price)));
                                $('#' + productId + 'Td4').focus();
                                $('#' + productId + 'Td6').val(convertToRupiah(dataItem.total_price));

                                addItemObject(dataItem);
                                countPriceItemChange(listItem, dataItem);
                            }
                        },
                        onFocus: function (e) {
                            $('.table-scrollable').css("overflow", "inherit");
                        },
                        onBlur: function () {
                            $('.table-scrollable').css("overflow", "auto");
                        }
                    });
                } else {

                    dataItem = {
                        item_id: dataItem.item_id,
                        product_id: dataItem.product_id,
                        product_price_id: dataItem.product_price_id,
                        product_finisihing_id: '',
                        unit_id: dataItem.unit_id,
                        price: parseInt(dataItem.price),
                        quantity: parseInt(dataItem.quantity),
                        total_price: parseInt(dataItem.quantity) * parseInt(dataItem.price),
                        stock_value: dataItem.stock_value,
                        min: dataItem.min
                    };

                    $('#' + productId + 'Td').attr('colspan', '2');
                    $('#' + productId + 'Td2').hide();
                    $('#' + productId + 'Td2').css('width', '0px');
                    $('#' + productId + 'Td4').focus();

                    addItemObject(dataItem);
                    countPriceItemChange(listItem, dataItem);
                }
            }
        });
    }

    //check object same or not
    function checkObject(listItem, id) {
        let found = false;
        for (let i = 0; i < listItem.length; i++) {
            if (listItem[i].item_id === id) {
                found = true;
                return i;
            }
        }
        return found;
    }

    function addItemObject(dataItem) {

        // if same its can be update
        const index = checkObject(listItem, dataItem.item_id);
        if (index !== false) {
            /*update*/
            dataItem = {
                item_id: dataItem.item_id,
                product_id: dataItem.product_id,
                product_price_id: dataItem.product_price_id,
                product_finisihing_id: dataItem.product_finisihing_id,
                unit_id: dataItem.unit_id,
                price: dataItem.price,
                quantity: dataItem.quantity,
                total_price: dataItem.total_price,
                stock_value: dataItem.stock_value,
                min: dataItem.min
            };

            listItem[index] = dataItem;
        } else {
            /*add new*/
            dataItem = {
                item_id: dataItem.item_id,
                product_id: dataItem.product_id,
                product_price_id: dataItem.product_price_id,
                product_finisihing_id: dataItem.product_finisihing_id,
                unit_id: dataItem.unit_id,
                price: dataItem.price,
                quantity: dataItem.quantity,
                total_price: dataItem.total_price,
                stock_value: dataItem.stock_value,
                min: dataItem.min
            };
            listItem.push(dataItem);
        }

        //count price default
        $('#totalHarga').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');
        $('#sisaBayar').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');
    }

    function countPriceDefault(listItem) {
        let total = 0;
        for (let i = 0; i < listItem.length; i++) {
            total += listItem[i].total_price
        }
        return total;
    }

    function status() {
        if (convertToAngka($('#jumlahBayar').val()) < convertToAngka($('#totalHarga').text().replace('Rp ', '')) || isNaN(convertToAngka($('#jumlahBayar').val()))) {
            $('#status').html(`
                <span class="badge badge-danger badge-lg" id="status"><i class="icon ion-md-checkmark-circle"></i>Belum Lunas</span>
                `);
            return 0;
        } else {
            $('#status').html(`
                <span class="badge badge-success badge-lg" id="status"><i class="icon ion-md-checkmark-circle"></i>Lunas</span>
                `);
            return 1;
        }
    }

    function countPriceItemChange(listItem, dataItem) {

        $('#jumlahItem').text(listItem.length);
        status();

        $('#' + dataItem.item_id + 'Td3').keyup(function () {

            $('#jumlahItem').text(listItem.length);

            let index = checkObject(listItem, dataItem.item_id);
            let harga = $('#' + dataItem.item_id + 'Td3').val();
            let qty = $('#' + dataItem.item_id + 'Td4').val();

            if (harga !== '' && qty !== '') {
                if (parseInt(qty) < dataItem.min) {
                    setTimeout(function () {
                        if ($('#' + dataItem.item_id + 'Td4').val() < dataItem.min ){
                            $('#' + dataItem.item_id + 'Td4').val(dataItem.min);
                            toastr["warning"]("Minimal Order is  : " + dataItem.min);
                        }
                    }, 2000)

                } else {

                    let dataItemTmp = {
                        item_id: dataItem.item_id,
                        product_id: dataItem.product_id,
                        product_price_id: dataItem.product_price_id,
                        product_finisihing_id: dataItem.product_finisihing_id,
                        unit_id: dataItem.unit_id,
                        price: convertToAngka(harga),
                        quantity: dataItem.quantity,
                        total_price: parseInt(qty) * convertToAngka(harga)
                    };

                    listItem[index] = dataItemTmp;

                    $('#' + dataItem.item_id + 'Td6').val(convertToRupiah(dataItemTmp.total_price));
                    $('#totalHarga').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');
                    $('#sisaBayar').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');
                }
            } else {
                $('#jumlahItem').text(listItem.length);
                $('#' + dataItem.item_id + 'Td3').val(convertToRupiah(dataItem.price));
                toastr["warning"]("Please input required data! <br>Harga tidak boleh kosong..");
            }
        });

        $('#' + dataItem.item_id + 'Td4').keyup(function () {

            if (dataItem.stock_value < $(this).val()) {
                $(this).val(dataItem.stock_value);
                toastr["warning"]("Stock habis! (sisa stok : " + dataItem.stock_value + ")");
            }

            let index = checkObject(listItem, dataItem.item_id);
            let harga = $('#' + dataItem.item_id + 'Td3').val();
            let qty = $('#' + dataItem.item_id + 'Td4').val();

            if (harga !== '' && qty !== '') {
                if (parseInt(qty) < dataItem.min) {
                    setTimeout(function () {
                        if ($('#' + dataItem.item_id + 'Td4').val() < dataItem.min ){
                            $('#' + dataItem.item_id + 'Td4').val(dataItem.min);
                            toastr["warning"]("Minimal Order is  : " + dataItem.min);
                        }
                    }, 2000)
                } else {

                    let dataItemTmp = {
                        item_id: dataItem.item_id,
                        product_id: dataItem.product_id,
                        product_price_id: dataItem.product_price_id,
                        product_finisihing_id: dataItem.product_finisihing_id,
                        unit_id: dataItem.unit_id,
                        price: convertToAngka(harga),
                        quantity: parseInt(qty),
                        total_price: parseInt(qty) * convertToAngka(harga)
                    };

                    listItem[index] = dataItemTmp;

                    $('#' + dataItem.item_id + 'Td6').val(convertToRupiah(dataItemTmp.total_price));
                    $('#totalHarga').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');
                    $('#sisaBayar').text('Rp ' + convertToRupiah(countPriceDefault(listItem)) + ',-');
                }
            } else {
                $('#' + dataItem.item_id + 'Td3').val(convertToRupiah(dataItem.price));
                toastr["warning"]("Please input required data!");
            }
        });

        //hitung sisa bayar
        $('#jumlahBayar').keyup(function () {

            let sisaBayar;
            let total = countPriceDefault(listItem);
            sisaBayar = total - convertToAngka($(this).val());

            if (convertToAngka($(this).val()) > total) {
                $('#sisaBayar').text('Rp ' + convertToRupiah(sisaBayar).replace('-', '') + ',-');
                $('#sisaBayar').css('color', '#252C46');
                $('#textSisaBayar').text('Kembalian')
            } else {
                $('#sisaBayar').text('Rp ' + convertToRupiah(sisaBayar).replace('-', '') + ',-');
                $('#sisaBayar').css('color', '#dc3545');
                $('#textSisaBayar').text('Sisa Bayar')
            }

            status();
        });

    }

    function createID() {
        let time = new Date($.now());
        return time.getTime();
    }

    function setEndOfContenteditable(contentEditableElement) {
        var range, selection;
        if (document.createRange)//Firefox, Chrome, Opera, Safari, IE 9+
        {
            range = document.createRange();//Create a range (a range is a like the selection but invisible)
            range.selectNodeContents(contentEditableElement);//Select the entire contents of the element with the range
            range.collapse(false);//collapse the range to the end point. false means collapse to end rather than the start
            selection = window.getSelection();//get the selection object (allows you to change selection)
            selection.removeAllRanges();//remove any selections already made
            selection.addRange(range);//make the range you have just created the visible selection
        } else if (document.selection)//IE 8 and lower
        {
            range = document.body.createTextRange();//Create a range (a range is a like the selection but invisible)
            range.moveToElementText(contentEditableElement);//Select the entire contents of the element with the range
            range.collapse(false);//collapse the range to the end point. false means collapse to end rather than the start
            range.select();//Select the range (make it the visible selection
        }
    }

    function addCustomer() {
        $('#modalAddCust').on('shown.bs.modal', function () {
            $('#name').trigger('focus');
        }).modal('show');
    }

    function deleteRow(id) {
        $('#' + id + 'Delete').click(function () {
            if (id === 'product_id') {
                let row = $(this).closest('tr');
                let elemToCheckIsNotNull = row.find('.selectize-input');
                if (elemToCheckIsNotNull.text() === '') {
                    row.remove();
                    loadItems('');
                } else  {
                    row.remove();
                }

            } else {
                let row = $(this).closest('tr');
                let elemToCheckIsNotNull = row.find('.selectize-input');
                if (elemToCheckIsNotNull.text() === '') {
                    if (row.remove())  {
                        let ids = createID();
                        listID.push(ids);
                        loadItems(ids);
                    }
                } else  {
                    row.remove();
                }
            }
            return false;
        });
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

        if (listItem.length === 0 ||cust_id === '' || email === '' || phone === '' || code === '' || order_date === null || order_finish === null) {
            toastr["warning"]("Please input required data!");
        } else {
            $('#transaction-body').addClass('loading-mask');
            $.ajax({
                url: '<?= base_url('transaction/saveTransaction?id=') . $group['group_product_id'] ?>',
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
                    order_finish: getTimeFromPicker(order_finish),
                    order_item: listItem
                },
                success: function (result) {
                    // console.log(result);
                    setTimeout(function () {
                        $('#transaction-body').removeClass('loading-mask');
                        if (result === 'success') {
                            window.document.location.href = '<?= base_url('transaction/create?id=') . $group['group_product_id'] ?>';
                        } else {
                            toastr["warning"]("Order gagal ditambahkan!");
                        }
                    }, 800);
                },
                error: function (err) {
                    setTimeout(function () {
                        $('#transaction-body').removeClass('loading-mask');
                        toastr["warning"]('Server Error');
                    }, 800);
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