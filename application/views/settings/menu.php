<div class="row">
    <div class="col-lg">
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="<?= base_url('settings/menu') ?>">Menu Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('settings/group_products') ?>">Group Products</a>
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
                <h4 class="card-title">Menu Management</h4>
            </div>
            <div class="card-body">
                <form class="form-sample" method="post" action="<?= base_url('settings/menu') ?>">
                    <div class="row">
                        <div class="col-md-4">

                            <!--DATAID-->
                            <input type="hidden" name="id" id="id">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Menu Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" id="title"/>
                                    <?= form_error('title', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Menu URL</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="url" id="url" />
                                    <?= form_error('url', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Position At </label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" name="position" id="position" />
                                    <?= form_error('position', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Menu Visibility</label>
                                <div class="form-radio ml-3 mt-1">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_active" id="is_active_1" value="1" checked> Enable </label>
                                </div>
                                <div class="form-radio ml-4 mt-1">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="is_active" id="is_active_0" value="0"> Disable </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="form-radio ml-3 mt-1">
                                    <button type="submit" class="btn btn-primary" name="add" id="add">Submit Changes</button>
                                    <a href="<?= base_url('settings/menu') ?>" class="btn btn-secondary" id="clear">Clear</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="ml-4">
                                <table class="table table-sm table-bordered" id="menu-data" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu ID</th>
                                            <th>Title</th>
                                            <th>URL</th>
                                            <th>Visibility</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="member">
                                        <?php foreach ($menu as $row) : ?>

                                        <tr class="updateMenu" data-id="<?= $row['menu_id'] ?>"
                                             data-title="<?= $row['menu_title'] ?>"
                                             data-url="<?= $row['menu_url'] ?>"
                                             data-position="<?= $row['menu_position'] ?>"
                                             data-icon="<?= $row['menu_icon'] ?>"
                                             data-active="<?= $row['is_active'] ?>" >

                                                <th><?= $row['menu_position'] ?></th>
                                                <td><?= strtoupper($row['menu_id']) ?></td>
                                                <td><?= $row['menu_title'] ?></td>
                                                <td><?= $row['menu_url'] ?></td>
                                                <td><?php if ($row['is_active'] == 1) {echo 'enable';} else {echo 'disable';} ?></td>
                                                <td>

                                                    <a href="#" class="updateMenu text-success"
                                                       data-id="<?= $row['menu_id'] ?>"
                                                       data-title="<?= $row['menu_title'] ?>"
                                                       data-url="<?= $row['menu_url'] ?>"
                                                       data-position="<?= $row['menu_position'] ?>"
                                                       data-icon="<?= $row['menu_icon'] ?>"
                                                       data-active="<?= $row['is_active'] ?>">
                                                        <i class="icon ion-md-create icon-sm"></i></a>
                                                    &nbsp;
                                                    <a onclick="return confirm('Are you sure?')" href="<?= base_url('settings/deleteMenu?delete_id=') . $row['menu_id'] ?>" class="text-danger"><i class="icon ion-md-trash icon-sm"></i></a>
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

        $('.updateMenu').on('click', function () {

            let id = $(this).data('id');
            let title = $(this).data('title');
            let url = $(this).data('url');
            let position = $(this).data('position');
            let icon = $(this).data('icon');
            let active = $(this).data('active');

            $('#id').val(id);
            $('#title').val(title);
            $('#url').val(url);
            $('#position').val(position);
            $('#icon').val(icon);

            if (active === 1) {
                $('#is_active_1').prop('checked', true);
            } else {
                $('#is_active_0').prop('checked', true);
            }

            $('#title').focus();
            $('#add').removeClass('btn-primary');
            $('#add').addClass('btn-success');
        })

    });


</script>