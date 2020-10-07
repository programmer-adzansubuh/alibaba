<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <a class="my-auto aback" href="<?= base_url('products/group?id=') . $group['group_product_id'] ?>">
                <i class="icon ion-md-arrow-back"></i> back</a>
            <h4 class="page-title my-auto ml-2"> &#8212; <?= $title; ?>
                &#187; <span class="text-black-50 font-weight-light"><?= $group['group_product_name']; ?></span>
                &#187; <span class="text-black-50 font-weight-light"><i class="icon ion-md-list-box"></i></span>
            </h4>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <form class="form-sample">
            <div class="card">
                <div class="card-header">
                    <b>Detail & Update Data Percetakan</b>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label  text-lg-right">Produk Cetak</label>
                                <input type="hidden" value="<?= $group['group_product_id'] ?>" name="group_id" id="group_id" />
                                <input type="hidden" value="<?= $product['product_id'] ?>" name="product_id" id="product_id" />
                                <div class="col-sm-7">
                                    <select class="form-control" name="type_id" id="type_id">
                                        <option selected disabled>Select..</option>
                                        <?php foreach ($type as $row) : ?>
                                            <option value="<?= $row['product_type_id'] ?>"><?= $row['product_type_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="col-sm-2">
                                    <a href="<?= base_url('products/group_add_type?id=') . $group['group_product_id'] ?>"
                                       class="btn btn-outline-primary btn-sm btn-block">
                                        Add
                                    </a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-lg-right">Nama <?= $group['group_product_alias'] ?></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="<?= $product['product_name'] ?>"/>
                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-lg-right">Stok <?= $group['group_product_alias'] ?></label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="stok" id="stok"
                                           value="<?= $product['product_stock'] ?>" disabled/>
                                    <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="unit_id" id="unit_id" disabled>
                                        <option selected disabled>Select Unit..</option>
                                        <?php foreach ($unit as $row) : ?>
                                            <option value="<?= $row['unit_id'] ?>"><?= $row['unit_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-lg-right">Minimal Order</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="min" id="min"
                                           value="<?= $product['product_min_order'] ?>"/>
                                    <?= form_error('min', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="min_unit_id" id="min_unit_id">
                                        <option value="0" selected disabled>Select Unit..</option>
                                        <?php foreach ($unit as $row) : ?>
                                            <option value="<?= $row['unit_id'] ?>"><?= $row['unit_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <table class="table table-sm table-responsive mt-1" id="menu-data" style="width: 100%">
                                <tr>
                                    <th class="text-center">Tipe Harga</th>
                                    <th class="text-center">Harga Modal
                                        <small>(Rp)</small>
                                    </th>
                                    <th class="text-center">Harga Jual
                                        <small>(Rp)</small>
                                    </th>
                                    <th class="text-center">Unit
                                        <small>(Satuan)</small>
                                    </th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control text-center" name="price_type" id="price_type">
                                            <option selected disabled value="0">Select..</option>
                                            <option value="1 Warna">1 Warna</option>
                                            <option value="2 Warna">2 Warna</option>
                                            <option value="3 Warna">3 Warna</option>
                                            <option value="Full Warna">Full Warna</option>
                                            <option value="Single Price">Tidak Ada</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control text-right" name="hargam" id="hargam">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control text-right" name="hargaj" id="hargaj">
                                    </td>
                                    <td>
                                        <select class="form-control" name="unit" id="unit">
                                            <option selected disabled value="0">Select..</option>
                                            <?php foreach ($unit as $row) : ?>
                                                <option value="<?= $row['unit_id'] ?>"><?= $row['unit_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="add text-primary">
                                            <i class="icon ion-md-add-circle icon-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tbody id="priceTable">
                                    <?php foreach ($price as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $row['product_price_name'] ?></td>
                                            <td class="text-right mr-2">Rp<?= rupiahFormat($row['product_price_hm']) ?></td>
                                            <td class="text-right mr-2">Rp<?= rupiahFormat($row['product_price_hj']) ?></td>
                                            <td class="text-center"><?= $row['unit_name'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('products/deletePrice?id=') .
                                                $group['group_product_id'] .
                                                '&product_id=' . $product['product_id'] .
                                                '&delete_id=' . $row['product_price_id'] ?>"
                                                   class="text-danger" onclick="return confirm('Are you sure?');">
                                                    <i class="icon ion-md-remove-circle icon-sm"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <hr>

                            <table class="table table-sm table-responsive mt-1" id="menu-data" style="width: 100%">
                                <tr>
                                    <th class="text-center">Tipe Finishing</th>
                                    <th class="text-center">Harga Tambahan
                                        <small>(Rp)</small>
                                    </th>
                                    <th class="text-center">Unit
                                        <small>(Satuan)</small>
                                    </th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control text-center" name="price_f" id="price_f">
                                            <option selected disabled value="0">Select..</option>
                                            <option value="Lipatan">Lipatan</option>
                                            <option value="Nomorator">Nomorator</option>
                                            <option value="Doff">Doff</option>
                                            <option value="Glossy">Glossy</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control text-right" name="hargaf" id="hargaf">
                                    </td>
                                    <td>
                                        <select class="form-control" name="unitf" id="unitf">
                                            <option selected disabled value="0">Select..</option>
                                            <?php foreach ($unit as $row) : ?>
                                                <option value="<?= $row['unit_id'] ?>"><?= $row['unit_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="addf text-primary">
                                            <i class="icon ion-md-add-circle icon-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tbody id="priceTablef">
                                <?php foreach ($finishing as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $row['product_finishing_name'] ?></td>
                                        <td class="text-right mr-2">Rp<?= rupiahFormat($row['product_finishing_price']) ?></td>
                                        <td class="text-center"><?= $row['unit_name'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('products/deletePricef?id=') .
                                            $group['group_product_id'] .
                                            '&product_id=' . $product['product_id'] .
                                            '&delete_id=' . $row['product_finishing_id'] ?>"
                                               class="text-danger" onclick="return confirm('Are you sure?');">
                                                <i class="icon ion-md-remove-circle icon-sm"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer mt-5">
                    <div class="float-left ml-3">
                        <button type="button" class="btn btn-success" id="submit">
                            <i class="icon ion-md-checkmark-circle"></i>
                            Update Changes
                        </button>
                        <a href="<?= base_url('products/group?id=') . $group['group_product_id'] ?>" class="btn btn-secondary">
                            <i class="icon ion-md-close-circle"></i>
                            Close
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<script>

    let priceData = [];
    let priceItem = [];
    let priceDataf = [];
    let priceItemf = [];


    $(document).ready(function () {

        $('#type_id').val('<?= $product['product_type_id'] ?>');
        $('#unit_id').val('<?= $product['unit_id'] ?>');
        $('#min_unit_id').val('<?= $product['product_min_order_unit_id'] ?>');
        $('#product_id').val('<?= $product['product_id'] ?>');

        $('.add').on('click', function () {

            let price_type = $('#price_type').val();
            let product_id = $('#product_id').val();
            let hargam = $('#hargam').val();
            let hargaj = $('#hargaj').val();
            let unit = $('#unit').val();
            let unit_name = $('#unit').children('option:selected').text();

            if (price_type == null) {
                toastr["error"]("Silahkan pilih tipe harga!");
                return;
            }
            if (hargam === '' || hargaj === '' || hargam === '0' || hargaj === '0') {
                toastr["error"]("Harga jual atau harga modal tidak boleh kosong!");
                return;
            }

            if (unit == null) {
                toastr["error"]("Silahkan pilih tipe unit / satuan !");
                return;
            }

            priceItem = {
                'id': createUUID(),
                'price_type': price_type,
                'product_id': product_id,
                'hargam': hargam,
                'hargaj': hargaj,
                'unit': unit,
                'unit_name': unit_name,
            };

            priceData.push(priceItem);
            $.ajax({
                url : '<?= base_url('products/group_update?id=') .
                $group['group_product_id'] . '&product_id=' . $product['product_id'] ?>',
                type : 'post',
                data : {
                    name        : $('#name').val(),
                    min         : $('#min').val(),
                    min_unit_id : $('#min_unit_id').val(),
                    type_id     : $('#type_id').val(),
                    group_id    : $('#group_id').val(),
                    product_price : priceData
                },
                success : function (result) {
                    if (result === 'success') {
                        window.document.location.href = '<?= base_url('products/group_update?id=') .
                        $group['group_product_id'] . '&product_id=' . $product['product_id'] ?>';
                    } else {
                        toastr["error"]("Failed to added!");
                    }
                }
            })
        });

        $('.addf').on('click', function () {

            let product_id = $('#product_id').val();
            let price_f = $('#price_f').val();
            let hargaf = $('#hargaf').val();
            let unitf = $('#unitf').val();
            let unitf_name = $('#unitf').children('option:selected').text();

            if (price_f == null) {
                toastr["error"]("Silahkan pilih tipe finising!");
                return;
            }
            if (hargaf === '' || hargaf === '0') {
                toastr["error"]("Harga finishing tidak boleh kosong!");
                return;
            }

            if (unitf == null) {
                toastr["error"]("Silahkan pilih tipe unit / satuan !");
                return;
            }

            priceItemf = {
                'idf': createUUID(),
                'product_id': product_id,
                'price_f': price_f,
                'hargaf': hargaf,
                'unitf': unitf,
                'unitf_name': unitf_name,
            };

            priceDataf.push(priceItemf);
            $.ajax({
                url : '<?= base_url('products/group_update?id=') .
                $group['group_product_id'] . '&product_id=' . $product['product_id'] ?>',
                type : 'post',
                data : {
                    name        : $('#name').val(),
                    min         : $('#min').val(),
                    min_unit_id : $('#min_unit_id').val(),
                    type_id     : $('#type_id').val(),
                    group_id    : $('#group_id').val(),
                    product_pricef : priceDataf
                },
                success : function (result) {
                    if (result === 'success') {
                        window.document.location.href = '<?= base_url('products/group_update?id=') .
                        $group['group_product_id'] . '&product_id=' . $product['product_id'] ?>';
                    } else {
                        toastr["error"]("Failed to added!");
                    }
                }
            })
        });

        $('#submit').on('click', function () {

            $.ajax({
                url : '<?= base_url('products/group_update?id=') .
                $group['group_product_id'] . '&product_id=' . $product['product_id'] ?>',
                type : 'post',
                data : {
                    name        : $('#name').val(),
                    min         : $('#min').val(),
                    min_unit_id : $('#min_unit_id').val(),
                    type_id     : $('#type_id').val(),
                    group_id    : $('#group_id').val()
                },
                success : function (result) {
                    if (result === 'success') {
                        toastr["success"]("New data added!");
                        window.document.location.href = '<?= base_url('products/group?id=') . $group['group_product_id'] ?>';
                    } else {
                        toastr["error"]("Failed to added!");
                    }
                },
                error : function () {
                    toastr["error"]("Failed to added! (Error)");
                }
            })

        });

    });


</script>