<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <a class="my-auto aback" href="<?= base_url('products/group_add?id=') . $group['group_product_id'] ?>"><i
                        class="icon ion-md-arrow-back"></i> back</a>
            <h4 class="page-title my-auto ml-2"> &#8212; <?= $title; ?>
                &#187; <span class="text-black-50 font-weight-light"><?= $group['group_product_name']; ?> (Category)</span>
            </h4>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <form class="form-sample" method="post" action="<?= base_url('products/group_add_type') . '?id=' . $group['group_product_id'] ?>">
            <div class="card">
                <div class="card-header">
                    Tambah Data Category
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">

                            <!--DATAID-->
                            <input type="hidden" name="id" id="id">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-right">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Tipe Produk"/>
                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label text-right">Note</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="note" id="note" placeholder="Catatan"/>
                                    <?= form_error('note', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9 mt-1">
                                    <button type="submit" class="btn btn-primary" name="add" id="add">Submit Changes</button>
                                    <a href="<?= base_url('products/group_add_type?id=') . $group['group_product_id'] ?>"
                                       class="btn btn-success" id="clear">Clear</a>
                                    <a href="<?= base_url('products/group_add?id=') . $group['group_product_id'] ?>"
                                       class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="ml-4">
                                <table class="table table-sm table-bordered" id="menu-data" style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th>Tipe Product ID</th>
                                        <th>Tipe Product Cetak</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="member">
                                    <?php foreach ($type as $row) : ?>

                                        <tr class="update"
                                            data-id="<?= $row['product_type_id'] ?>"
                                            data-name="<?= $row['product_type_name'] ?>"
                                            data-note="<?= $row['product_type_note'] ?>">

                                            <th><?= strtoupper($row['product_type_id']) ?></th>
                                            <td><?= strtoupper($row['product_type_name']) ?></td>
                                            <td>
                                                <a href="#" class="update text-success"
                                                   data-id="<?= $row['product_type_id'] ?>"
                                                   data-name="<?= $row['product_type_name'] ?>"
                                                   data-note="<?= $row['product_type_note'] ?>">
                                                    <i class="icon ion-md-create icon-sm"></i></a>
                                                &nbsp;
                                                <a onclick="return confirm('Are you sure?')"
                                                   href="<?= base_url('products/deleteType?id=') .
                                                   $group['group_product_id'] . '&delete_id=' . $row['product_type_id'] ?>"
                                                   class="text-danger"><i class="icon ion-md-trash icon-sm"></i></a>
                                            </td>

                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"><i class="icon ion-md-checkmark-circle"></i>Save Changes</button>
                        <button href="<?= base_url('products/group_add_type') ?>" type="button" class="btn btn-secondary"><i
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

        $('#menu-data').DataTable( {
            "scrollY":   "300px",
        } );

        $('.update').on('click', function () {

            let id = $(this).data('id');
            let name = $(this).data('name');
            let note = $(this).data('note');

            $('#id').val(id);
            $('#name').val(name);
            $('#note').val(note);

            $('#name').focus();
            $('#add').removeClass('btn-primary');
            $('#add').addClass('btn-success');
            $('#clear').removeClass('btn-success');
            $('#clear').addClass('btn-secondary');
        })

    });


</script>