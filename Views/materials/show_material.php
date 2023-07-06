<div class="d-flex align-items-baseline justify-content-between">
    <!-- Title -->
    <h1 class="h2">
        Material Details
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Material Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Material Details Details</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col">
        <!-- Card -->
        <div class="card border-0">
            <div class="card-header py-3">
                <p class="m-0 fw-bold">Descripion</p>
            </div>
            <div class="card-body">
                <p><?= $material->description ?></p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-xxl-3">

        <!-- Card -->
        <div class="card border-0">

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-5 text-muted d-flex align-items-center text-truncate">
                        Material
                    </div>
                    <div class="col d-flex align-items-center">
                        <div class="avatar avatar-circle avatar-xs me-2">
                            <img src="/img/materials/<?= $material->image ?>" alt="..." class="avatar-img" width="30" height="30">
                        </div>
                        <span class="fw-semibold"><?= $material->name ?></span>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-5 text-muted text-truncate">
                        Brand
                    </div>
                    <div class="col">
                        <?= $material->brand ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-5 text-muted text-truncate">
                        Serial number
                    </div>
                    <div class="col">
                        <?= $material->num_serie ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-5 text-muted text-truncate">
                        State
                    </div>
                    <div class="col">
                        <?= $material->state ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-5 text-muted text-truncate">
                        Date purchase
                    </div>
                    <div class="col">
                        <?= $material->datepurchase ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row">
                    <div class="col-5 text-muted text-truncate">
                        Purchase price
                    </div>
                    <div class="col">
                    <?= $material->purchaseprice ?>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>
</div> <!-- / .row -->