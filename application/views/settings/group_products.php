<div class="row">
    <div class="col-lg">
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
                <a class="nav-link " href="<?= base_url('settings/menu') ?>">Menu Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('settings/group_products') ?>">Group Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('settings/unit_products') ?>">Unit Products <small>(Satuan)</small></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('settings/user') ?>">User Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Other Settings</a>
            </li>
        </ul>
    </div>

    <div class="col-12 grid-margin mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Group Product Management</h4>
            </div>
            <div class="card-body">
                <form class="form-sample" method="post" action="<?= base_url('settings/group_products') ?>">
                    <div class="row">
                        <div class="col-md-4">

                            <!--DATAID-->
                            <input type="hidden" name="id" id="id">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Group Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name"/>
                                    <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alias Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alias" id="alias"/>
                                    <?= form_error('alias', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="note" id="note" />
                                    <?= form_error('note', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="form-radio ml-3 mt-1">
                                    <button type="submit" class="btn btn-primary" name="add" id="add">Submit Changes</button>
                                    <a href="<?= base_url('settings/group_products') ?>" class="btn btn-secondary" id="clear">Clear</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="ml-4">
                                <table class="table table-sm table-bordered" id="menu-data" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Group Product ID</th>
                                            <th>Group Product Name</th>
                                            <th>Group Product Alias</th>
                                            <th>Group Product Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="member">
                                        <?php foreach ($group as $row) : ?>

                                        <tr class="update" data-id="<?= $row['group_product_id'] ?>"
                                             data-name="<?= $row['group_product_name'] ?>"
                                             data-alias="<?= $row['group_product_alias'] ?>"
                                             data-note="<?= $row['group_product_note'] ?>" >

                                                <th><?= strtoupper($row['group_product_id']) ?></th>
                                                <td><?= strtoupper($row['group_product_name']) ?></td>
                                                <td><?= $row['group_product_alias'] ?></td>
                                                <td><?= $row['group_product_note'] ?></td>
                                                <td>
                                                    <a href="#" class="update text-success"
                                                       data-id="<?= $row['group_product_id'] ?>"
                                                       data-name="<?= $row['group_product_name'] ?>"
                                                       data-alias="<?= $row['group_product_alias'] ?>"
                                                       data-note="<?= $row['group_product_note'] ?>">
                                                        <i class="icon ion-md-create icon-sm"></i></a>
                                                    &nbsp;
                                                    <a onclick="return confirm('Are you sure?')" href="<?= base_url('settings/deleteGroup?delete_id=') . $row['group_product_id'] ?>" class="text-danger"><i class="icon ion-md-trash icon-sm"></i></a>
                                                </td>

                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<script>

    $(document).ready(function () {

        $('#menu-data').DataTable( {
            "scrollY":   "300px",
            "scrollX" : true
        } );

        $('.update').on('click', function () {

            let id = $(this).data('id');
            let name = $(this).data('name');
            let note = $(this).data('note');
            let alias = $(this).data('alias');

            $('#id').val(id);
            $('#name').val(name);
            $('#note').val(note);
            $('#alias').val(alias);

            $('#name').focus();
            $('#add').removeClass('btn-primary');
            $('#add').addClass('btn-success');
        })

    });


</script>