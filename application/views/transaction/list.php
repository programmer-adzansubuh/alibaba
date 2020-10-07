<!-- Page Title Header Starts-->
<style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>

</style>
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
            <div class="card-header bg-success">
                <span class="text-light text-left">Daftar <?= $title ?> Order</span>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered table-responsive-sm" id="data-table" style="width: 100%">
                    <thead>
                    <tr >
                        <th></th>
                        <th> <b>Invoice No. </b></th>
                        <th> <b>Tanggal Pesan </b></th>
                        <th> <b>Tanggal Selesai </b></th>
                        <th> <b>Customer </b></th>
                        <th> <b>Order Item </b></th>
                        <th class="text-right"> <b>Total Harga</b></th>
                        <th> <b>Status </b></th>
                        <th> <b>Dibuat Oleh</b></th>
                        <th class="text-center" ><b>Action</b></th>
                    </tr>
                    </thead>
                    <tbody class="member-trans">
                    <?php
                    $i = 1;
                    foreach ($order as $row) : ?>
                        <tr class="changeItem" data-id="<?= $row['order_id'] ?>">
                            <td style="width: 10px !important; border-right: 0 solid;">
                                <a class="text-secondary details-control" id="btn-show-all-children"
                                   data-toggle="tooltip" title="Expand">
                                    <i class="icon ion-ios-arrow-down icon-sm"></i></a>
                            </td>
                            <td data-id="<?= $row['order_id'] ?>"
                                class="text-black changeItems invoice-no"><?= strtoupper($row['order_code']) ?></td>
                            <td data-id="<?= $row['order_id'] ?>"
                                class="changeItems"><?= date('d M Y H:i', $row['order_date']) ?></td>
                            <td data-id="<?= $row['order_id'] ?>"
                                class="changeItems"><?= date('d M Y H:i', $row['order_finish']) ?></td>
                            <td data-id="<?= $row['order_id'] ?>"
                                class="changeItems"><?= $row['customer_name'] ?></td>
                            <td data-id="<?= $row['order_id'] ?>"
                                class="changeItems"><?= $row['order_item'] ?> <small class="text-muted">Produk</small></td>
                            <td data-id="<?= $row['order_id'] ?>"
                                class="changeItems text-right"><?= 'Rp '.rupiahFormat($row['total_harga']) ?></td>
                            <td data-id="<?= $row['order_id'] ?>"
                                class="changeItems">
                                <?php if ($row['order_status'] == 1) {
                                    echo '<span class="badge badge-pill badge-success text-white">Lunas</span>';
                                } else {
                                    echo '<span class="badge badge-pill badge-danger text-white">Belum Lunas</span>';
                                } ?>
                            </td>
                            <td class="changeItems" data-id="<?= $row['order_id'] ?>">
                                <?= $row['user_fullname']?> &#8212;
                                <small class="text-muted"><?= date('d M Y H:i', $row['date']) ?></small>
                            </td>
                            <td class="text-center">
                                <a class="text-secondary"
                                   href="<?= base_url('transaction/item?id=') .
                                   $group['group_product_id'] . '&order_id=' . $row['order_id'] ?>"
                                   data-toggle="tooltip" title="View Detail">
                                    <i class="icon ion-ios-list icon-sm"></i></a>
                                &nbsp;

                                <a class="text-secondary"
                                   href="<?= base_url('transaction/item?id=') .
                                   $group['group_product_id'] .
                                   '&order_id=' . $row['product_id'] ?>"
                                   data-toggle="tooltip" title="Update Data">
                                    <i class="icon ion-md-create icon-sm"></i></a>
                                &nbsp;

                                <a onclick="return confirm('Are you sure?')"
                                   href="<?= base_url('transaction/delete?id=') .
                                   $group['group_product_id'] .
                                   '&order_id=' . $row['product_id'] ?>"
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

    function itemList(id, item, index) {
        let finishing = '&#8212;';
        if(item.product_finishing_name !== null) { finishing = item.product_finishing_name; }

        $('#' + id).append(`
            <tr>
                <td>`+parseInt(index+1)+`</td>
                <td>`+item.product_name+`</td>
                <td>`+item.product_price_name+`</td>
                <td>`+finishing+`</td>
                <td class="text-right">Rp `+convertToRupiah(item.order_price)+`</td>
                <td class="text-right">`+item.order_quantity+`</td>
                <td class="text-right">Rp `+convertToRupiah(parseInt(item.order_price) * parseInt(item.order_quantity))+`</td>
            </tr>
        `);
    }

    function format ( data, id) {

        return `
            <div class="slider" style="background-color: #fafafa">
            <table class="table table-borderless table-sm p-0" border="0" style="padding-left:50px;">
                <tr>
                    <td rowspan="4" style="width: 13px"></td>
                    <td colspan="2" class="align-text-top">
                        <p class="text-black font-weight-semibold mt-2">Order Detail</p>
                           <table>
                                <tr>
                                    <td class="pl-0" style="width: 100px">Nama Customer</td>
                                    <td style="width: 140px" class="font-weight-medium">: `+ data.order_data.customer_name +`</td>
                                </tr>
                                <tr>
                                    <td class="pl-0" >Telepon</td>
                                    <td>: `+ data.order_data.customer_phone+`</td>
                                </tr>
                                <tr>
                                    <td class="pl-0" >Alamat</td>
                                    <td>: `+ data.order_data.customer_address+`</td>
                                </tr>
                            </table>
                    </td>
                    <td colspan="3" rowspan="4" class="align-text-top">
                        <table class="table table-bordered table-sm" border="1">
                            <thead class="bg-secondary">
                               <tr>
                                   <th>#</th>
                                   <th>Product Order Detail</th>
                                   <th colspan="2"></th>
                                   <th class="text-right">Harga Satuan</th>
                                   <th class="text-right">Qty</th>
                                   <th class="text-right">Subtotal</th>
                               </tr>
                            </thead>
                            <tbody id="`+id+`">

                            </tbody>
                            <tr class="bg-secondary"><th colspan="4" >#</th>
                            <td class="font-weight-medium text-right" colspan="2">Grand Total</td>
                            <td class="text-right font-weight-semibold">Rp `+convertToRupiah(countTotalPrice(data.order_item))+`</td></tr>

                            <tr class="bg-secondary"><th colspan="4" ></th>
                            <td class="font-weight-medium text-right" colspan="2">Dibayar</td>
                            <td class="text-right font-weight-semibold">Rp `+convertToRupiah(parseInt(data.order_data.order_paid))+`</td></tr>

                            <tr class="bg-secondary"><th colspan="4" ></th>
                            <td class="font-weight-medium text-right" colspan="2">Sisa</td>
                            <td class="text-right font-weight-semibold">Rp `+convertToRupiah(countTotalPrice(data.order_item) - parseInt(data.order_data.order_paid))+`</td></tr>
                        </table>
                    </td>
                </tr>
                <tr rowspan="3"></tr>
            </table>

            </div>`;

    }

    $(document).ready(function () {

        const table = $('#data-table').DataTable( {
            "scrollY":   "300px",
            scrollX: true
        });

        // Add event listener for opening and closing details
        $('#data-table tbody').on('click', 'td a.details-control', function () {
            let tr = $(this).closest('tr');
            let row = table.row( tr );
            let id = tr.data('id');

            if ( row.child.isShown() ) {
                // This row is already open - close it
                $('div.slider', row.child()).slideUp(90, function () {
                    tr.removeClass('shown');
                    row.child.hide();
                    tr.find('a.details-control').html('<i class="icon ion-ios-arrow-down icon-sm"></i>');
                    tr.removeClass('font-weight-semibold');
                } );
            }
            else {

                //get data item
                $.getJSON('<?= base_url('transaction/getOrderItem?order_id=') ?>'+id, function(data) {
                    // Open this row
                    tr.addClass('shown');
                    row.child( format(data, id), 'no-padding' ).show();
                    tr.find('a.details-control').html('<i class="text-primary icon ion-ios-arrow-up icon-sm"></i>');
                    tr.addClass('font-weight-semibold');

                    $('div.slider', row.child()).slideDown(90);
                    $('#itemOrder').html('');
                    data.order_item.forEach(function (item, index) {
                        itemList(id, item, index);
                    });
                });
            }
        } );


        $('.changeItem').css('cursor', 'pointer');
        $('.changeItems').on('click', function () {
            let id = $(this).data('id');
            let tr = $(this).closest('tr');
            let row = table.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                $('div.slider', row.child()).slideUp(90, function () {
                    tr.removeClass('shown');
                    row.child.hide();
                    tr.find('a.details-control').html('<i class="icon ion-ios-arrow-down icon-sm"></i>');
                    tr.removeClass('font-weight-semibold');
                } );
            }
            else {
                //get data item
                $.getJSON('<?= base_url('transaction/getOrderItem?order_id=') ?>'+id, function(data) {
                    // Open this row
                    tr.addClass('shown');
                    row.child( format(data, id), 'no-padding' ).show();
                    tr.find('a.details-control').html('<i class="text-primary icon ion-ios-arrow-up icon-sm"></i>');
                    tr.addClass('font-weight-semibold');

                    $('div.slider', row.child()).slideDown(90);
                    data.order_item.forEach(function (item, index) {
                        itemList(id, item, index);
                    });

                });
            }
        });
    });

    function countTotalPrice(listItem) {
        let total = 0;
        for (let i = 0; i < listItem.length; i++) {
            total += listItem[i].order_price * listItem[i].order_quantity
        }
        return total;
    }

</script>