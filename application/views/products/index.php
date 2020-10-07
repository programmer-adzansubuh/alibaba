<!-- Page Title Header Starts-->
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title my-auto">Group <?= $title; ?></h4>
        </div>
    </div>

    <?php foreach ($group as $row) : ?>

    <a href="<?= base_url('products/group?id=') . $row['group_product_id'] ?>"
       class="col-lg-4 grid-margin stretch-card average-price-card">
        <div class="card text-white cardp">
            <div class="card-body">
                <div class="d-flex justify-content-between pb-2 align-items-center">
                    <h2 class="font-weight-semibold mb-0"><?= $row['group_product_name'] ?></h2>
                    <div class="icon-holder">
                        <i class="icon ion-md-bookmark"></i>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <h5 class=" mb-0"><?= $row['group_product_note'] ?></h5>
                </div>
            </div>
        </div>
    </a>

    <?php endforeach; ?>

</div>