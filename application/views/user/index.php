<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title my-auto"><?= $title; ?></h4>
        </div>
    </div>

    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm ml-auto"><i class="icon ion-md-add-circle"></i>Tambah Data</a>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered" id="menu-data" style="width: 100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Role <small>(Level)</small></th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody class="member">
                    <?php
                    $i = 1;
                    foreach ($user as $row) : ?>
                        <tr class="changeItem" data-id="<?= $row['user_id'] ?>">
                            <th><?= $i++ ?></th>
                            <td><?= strtoupper($row['user_fullname']) ?></td>
                            <td><?= $row['user_name'] ?></td>
                            <td><?= $row['user_phone'] ?></td>
                            <td><?= $row['user_email'] ?></td>
                            <td><?= $row['role_name'] ?></td>
                            <td class="text-center"><?php if ($row['user_status'] == 1) {
                                    echo '<span class="badge badge-pill badge-success text-white">Active</span>';
                                } else {
                                    echo '<span class="badge badge-pill badge-danger text-white">Inactive</span>';
                                } ?></td>
                            <td class="text-center">

                                <a class="text-secondary" href="<?= base_url('user/update?id=') . $row['user_id'] ?>">
                                    <i class="icon ion-md-create icon-sm"></i></a>
                                &nbsp;
                                <a onclick="return confirm('Are you sure?')"
                                   href="<?= base_url('user/delete?delete_id=') . $row['user_id'] ?>" class="text-secondary"><i
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

<script src="<?= base_url() ?>assets/vendors/jquery/jquery.js"></script>

<script>

    $(document).ready(function () {

        $('#menu-data').DataTable( {
            "scrollY":   "300px",
        });

        $('.changeItem').css('cursor', 'pointer');
        $('.changeItem').on('click', function () {
            let dataid = $(this).data('id');
            document.location.href = 'user/update?id=' + dataid
        })

    });

</script>

