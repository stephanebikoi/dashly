<div class="d-flex align-items-baseline justify-content-between">
    <!-- Title -->
    <h1 class="h2">
        Edit category
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit category</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col">
        <form action="/projects/save_edit_category/<?= $category->id ?>" method="POST" id="form">

            <!-- Card -->
            <div class="card border-0 scroll-mt-3" id="basicInformationSection">
                <div class="card-header">
                    <h2 class="h3 mb-0">Information</h2>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="name" class="col-form-label">Name category</label>
                        </div>

                        <div class="col-lg">
                            <input type="text" class="form-control" id="name" value="<?= $category->name ?>" name="name" required>
                        </div>
                       
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="description" class="col-form-label">Description</label>
                        </div>

                        <div class="col-lg">
                            <textarea class="form-control" id="description" name="description" rows="4" required><?= $category->description ?></textarea>
                        </div>
                    </div> <!-- / .row -->

                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <!-- Button -->
                <button type="submit" class="btn btn-primary">Save category</button>
            </div>
            <br><br><br>
        </form>
    </div>
</div>