<div class="d-flex align-items-baseline justify-content-between">
    <!-- Title -->
    <h1 class="h2">
        Add material
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Materials</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add material</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col">
        <form action="/materials/save_edit/<?= $material->id ?>" method="POST" novalidate id="taskForm" class="needs-validation" enctype="multipart/form-data">

            <!-- Card -->
            <div class="card border-0 scroll-mt-3" id="basicInformationSection">
                <div class="card-header">
                    <h2 class="h3 mb-0">Material information</h2>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="name" class="col-form-label">Name material</label>
                        </div>

                        <div class="col-lg">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $material->name ?>" required>
                            <div class="invalid-feedback">Please add the name material</div>
                        </div>
                       
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="brand" class="col-form-label">brand</label>
                        </div>

                        <div class="col-lg">
                            
                            <input type="text" class="form-control" id="brand" name="brand" value="<?= $material->brand ?>" required>
                            <div class="invalid-feedback">Please add the brand </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="serial" class="col-form-label">serial number</label>
                        </div>

                        <div class="col-lg">
                            
                            <input type="text" class="form-control" id="serial" name="serial" value="<?= $material->num_serie ?>" required>
                            <div class="invalid-feedback">Please add a serial number </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="state" class="col-form-label">State</label>
                        </div>

                        <div class="col-lg">
                            
                            <select class="form-select" id="state" name="state" required>
                                <option value="<?= $material->state ?>"><?= $material->state ?></option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <div class="invalid-feedback">Please select the mkaterial state </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="date" class="col-form-label">Date purchase</label>
                        </div>

                        <div class="col-lg">
                            
                            <input type="date" class="form-control" id="date" name="date" value="<?= $material->datepurchase ?>" required>
                            <div class="invalid-feedback">Please the material date purchase </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="price" class="col-form-label">Purchase price</label>
                        </div>

                        <div class="col-lg">
                            
                            <input type="number" class="form-control" id="price" name="price" value="<?= $material->purchaseprice ?>" required>
                            <div class="invalid-feedback">Please the material purchase price </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="price" class="col-form-label">Description</label>
                        </div>

                        <div class="col-lg">
                            
                            <textarea class="form-control" id="description" name="description" rows="4" required><?= $material->description ?></textarea>
                            <div class="invalid-feedback">Please the material description </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="image" class="col-form-label">Image</label>
                        </div>

                        <div class="col-lg">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                       
                    </div> <!-- / .row -->

                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <!-- Button -->
                <button type="submit" class="btn btn-primary">Save material</button>
            </div>
            <br><br><br>
        </form>
    </div>
</div>