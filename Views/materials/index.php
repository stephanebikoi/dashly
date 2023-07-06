<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        Materials
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center" id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#materialModal" id="btnAddTask">Add New material</button>
            </span>
        </h1>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Materials</a></li>
            <li class="breadcrumb-item active" aria-current="page">All materials</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-xxl d-flex">

        <!-- Card -->
        <div class="card border-0 flex-fill w-100">
            <div class="card-header border-0 card-header-space-between">
                
                <!-- Title -->
                <h2 class="card-header-title h4 text-uppercase">
                    Materials
                </h2>
                
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table id="MaterialsTable" class="table align-middle table-edge table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="w-60px"><a href="/materials/index" class="text-muted list-sort" data-sort="name">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#name">Name</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#category">Brand</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#priority">serial number</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#state">State</a></th>
                            <th class="">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materials as $material): ?>
                            <tr>
                                <td><?= $material->id ?></td>
                                <td>
                                    <?php if(empty($material->image)) { ?>
                                        
                                    <?php } else { ?>
                                        <div class="avatar avatar-circle avatar-sm">
                                            <img src="/img/materials/<?= $material->image ?>" alt="Profile picture" class="avatar-img" width="40" height="40">
                                        </div>
                                    <?php } ?>
                                    <span class="name fw-bold mx-3"><?= $material->name ?></span>
                                </td>
                                <td><?= $material->brand?></td>
                                <td><?= $material->num_serie ?></td>
                                <td><?= $material->state ?></td>
                                <td class="date" data-signed="1627858800">
                                    <a class="p-3" href="/materials/show_material/<?= $material->id ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/materials/edit/<?= $material->id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/materials/delete/<?= $material->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div> <!-- / .table-responsive -->
        </div>
    </div>
</div> <!-- / .row -->

<div class="modal fade" id="materialModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="/materials/create_material" method="POST"  enctype="multipart/form-data">
                <!-- Header -->
                <div class="modal-header pb-0">
                    <h3 id="taskModalTitle" class="modal-title">Create New material</h3>

                    <!-- Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="name" class="col-form-label">Material name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Please add a  material name</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="brand" class="col-form-label">Material brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" required>
                            <div class="invalid-feedback">Please select a  material brand</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="serial" class="col-form-label">Material serial number</label>
                            <input type="text" class="form-control" id="serial" name="serial" required>
                            <div class="invalid-feedback">Please add the  serial number</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="date" class="col-form-label">Date purchase</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                            <div class="invalid-feedback">Please add the datepurchase</div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="price" class="col-form-label">Purchase price</label>
                            <input type="text" class="form-control" id="price" value="" name="price" required>
                            <div class="invalid-feedback">Please add a  purchase price</div>
                        </div>

                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg">
                            <label for="start" class="col-form-label"> Material description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            <div class="invalid-feedback">Please add a  description of Material</div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg">
                            <label for="start" class="col-form-label"> Attachement Material </label>
                            <input type="file" class="form-control" id="attachement" name="attachement">
                        </div>
                    </div> <!-- / .row -->
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer pt-0">
                    <div class="d-flex justify-content-end mt-5">
                        <!-- Button -->
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    </div>

                    <div class="d-flex justify-content-end mt-5">
                        <!-- Button -->
                        <button type="submit" class="btn btn-primary">Save Material</button>
                    </div>
                    
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
</div>