<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <a class="my-auto aback" href="<?= base_url('products') ?>"><i class="icon ion-md-arrow-back"></i> back</a>
            <h4 class="page-title my-auto ml-2"> &#8212; <?= $title; ?>
                &#187; <span class="text-black-50 font-weight-light"><?= $group['group_product_name']; ?></span>
            </h4>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('products/group_add?id=') . $group['group_product_id'] ?>"
                   class="btn btn-primary btn-sm ml-auto"><i class="icon ion-md-add-circle"></i>
                    Tambah Data <?= $group['group_product_alias']; ?>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered" id="data-table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama <?= $group['group_product_alias']; ?></th>
                        <th>Product Type <small>(Category)</small></th>
                        <th>Date Created</th>
                        <th>Date Modifed</th>
                        <th>Stok <?= $group['group_product_alias']; ?></th>
                        <th class="text-center">Stok Transaction</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody class="member2">
                    <?php
                    $i = 1;
                    foreach ($product as $row) : ?>
                        <tr class="changeItem" data-id="<?= $row['product_id'] ?>">
                            <th><?= $i++ ?></th>
                            <td data-id="<?= $row['product_id'] ?>"
                                class="text-black changeItems"><?= strtoupper($row['product_name']) ?></td>
                            <td data-id="<?= $row['product_id'] ?>"
                                class="text-black-50 changeItems"><?= $row['product_type_name'] ?></td>
                            <td data-id="<?= $row['product_id'] ?>"
                                class="changeItems"><?= date('d/m/Y h:m:s', $row['date_created']) ?></td>
                            <td data-id="<?= $row['product_id'] ?>"
                                class="changeItems"><?= date('d/m/Y h:m:s', $row['date_modifed']) ?></td>
                            <td data-id="<?= $row['product_id'] ?>"
                                class="changeItems"><?= $row['product_stock'] . ' ' . $row['unit_name'] ?></td>
                            <td class="text-center">
                                <a data-id="<?= $row['product_id'] ?>"
                                   data-product-name="<?= $row['product_name'] ?>"
                                   data-unit="<?= $row['unit_id'] ?>"
                                   data-stock="<?= $row['product_stock'] ?>"
                                   data-type="1"
                                   href="#" class="stock btn btn-success p-1 text-small pr-2">
                                    <i class="mdi mdi-arrow-down-bold"></i>Stock In</a>
                                <a data-id="<?= $row['product_id'] ?>"
                                   data-product-name="<?= $row['product_name'] ?>"
                                   data-unit="<?= $row['unit_id'] ?>"
                                   data-stock="<?= $row['product_stock'] ?>"
                                   data-type="0"
                                   href="#" class="stock btn btn-danger p-1 text-small pr-2">
                                    <i class="mdi mdi-arrow-up-bold"></i>Stock Out</a>
                            </td>
                            <td class="text-center">
                                <a class="text-secondary"
                                   href="<?= base_url('products/group_update?id=') .
                                   $group['group_product_id'] . '&product_id=' . $row['product_id'] ?>"
                                   data-toggle="tooltip" title="View Detail">
                                    <i class="icon ion-md-list icon-sm"></i></a>
                                &nbsp;
                                <a data-id="<?= $row['product_id'] ?>" class="changeItems text-secondary" href="#"
                                   data-toggle="tooltip" title="Update Data">
                                    <i class="icon ion-md-create icon-sm"></i></a>
                                &nbsp;
                                <a onclick="return confirm('Are you sure?')"
                                   href="<?= base_url('products/deleteProduct?id=') .
                                   $group['group_product_id'] .
                                   '&product_id=' . $row['product_id'] ?>"
                                   class="text-secondary" data-toggle="tooltip" title="Delete Data">
                                    <i class="icon ion-md-trash icon-sm"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<script>

    $(document).ready(function () {

        $('#data-table').DataTable( {
            "scrollY":   "300px",
            scrollX: true
        });

        $('.changeItem').css('cursor', 'pointer');
        $('.changeItems').on('click', function () {
            let dataid = $(this).data('id');
            document.location.href = '<?= base_url('products/group_update?id=') .
            $group['group_product_id'] . '&product_id=' ?>' + dataid
        });

        $('.stock').on('click', function () {
            let id = $(this).data('id');
            let name = $(this).data('product-name');
            let unit = $(this).data('unit');
            let type = $(this).data('type');
            let stockOnHand = $(this).data('stock');
            let inout, noted, st;
            if (type === 1) {
                st = 'Stock In';
                inout = 'ditambahkan';
                noted = 'Menambahkan';
            }  else {
                st = 'Stock Out';
                inout = 'dikurangi';
                noted = 'Mengurangi (Rusak, Hilang, dll)';
            }
            let dial = prompt("Input "+ st +" untuk : " + name);
            if (dial == null || dial === "") {
                toastr["warning"]("Stock can't be empty!");
            } else {
                if (type === 0) {
                    if (dial > stockOnHand) {
                        toastr["warning"]("Jumlah pengurangan melebihi stok yang ada!");
                    } else {
                        let note = prompt("Stock akan " + inout + " sebanyak " + dial + "\nTambahkan catatan : ", noted);
                        if (note == null || note === "") {
                            toastr["warning"]("Note can't be empty!");
                        } else {
                            $.ajax({
                                url : '<?= base_url('products/stock_update') ?>',
                                type : 'post',
                                data : {
                                    product_id  : id,
                                    unit_id     : unit,
                                    stock_type  : type,
                                    note        : note,
                                    stock       : dial
                                },
                                success : function (result) {
                                    if (result === 'success') {
                                        toastr["success"]("Stock data updated!");
                                        window.document.location.href = '<?= base_url('products/group?id=') . $group['group_product_id'] ?>';
                                    } else {
                                        toastr["error"]("Failed to added!");
                                    }
                                },
                                error : function () {
                                    toastr["error"]("Failed to added! (Error)");
                                }
                            })
                        }
                    }
                }
                else {
                    let note = prompt("Stock akan " + inout + " sebanyak " + dial + "\nTambahkan catatan : ", noted);
                    if (note == null || note === "") {
                        toastr["warning"]("Note can't be empty!");
                    } else {
                        $.ajax({
                            url : '<?= base_url('products/stock_update') ?>',
                            type : 'post',
                            data : {
                                product_id  : id,
                                unit_id     : unit,
                                stock_type  : type,
                                note        : note,
                                stock       : dial
                            },
                            success : function (result) {
                                if (result === 'success') {
                                    toastr["success"]("Stock data updated!");
                                    window.document.location.href = '<?= base_url('products/group?id=') . $group['group_product_id'] ?>';
                                } else {
                                    toastr["error"]("Failed to added!");
                                }
                            },
                            error : function () {
                                toastr["error"]("Failed to added! (Error)");
                            }
                        })
                    }
                }
            }
        });
    });

</script>