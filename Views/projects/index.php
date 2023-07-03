<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        Projects
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center" id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#projetModal" id="btnAddTask">Add New project</button>
            </span>
        </h1>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">All projects</li>
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
                    Projects
                </h2>
                
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table id="projectsTable" class="table align-middle table-edge table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="w-60px"><a href="/projects/index" class="text-muted list-sort" data-sort="name">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#name">Project name</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#category">Project category</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#priority">Project priority</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#state">Project state</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#executor">Project executor</a></th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($projects as $project): 
                            $staffModel = new App\Models\StaffsModel;
                            $onstaff = $staffModel->find( $project->executor);

                            $categoryModel = new App\Models\CategoriesModel;
                            $oncategory = $categoryModel->find($project->category);
                            ?>
                            <tr>
                                <td><?= $project->id ?></td>
                                <td><?= $project->name ?></td>
                                <td><?= $oncategory->name?></td>
                                <td><?= $project->priority ?></td>
                                <td><?= $project->state ?></td>
                                <td>
                                    <?php if(empty($onstaff->profil)) {
                                        $a = strtoupper(substr($onstaff->firstname, 0, 1));
                                        $b = strtoupper(substr($onstaff->lastname, 0, 1)); ?>
                                        <div class="avatar avatar-circle avatar-xs me-2">
                                            <span class="avatar-title text-bg-danger-soft" style="color: purple; width:40px; height:40px;"><?= $a.$b ?></span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="avatar avatar-circle avatar-sm avatar-online">
                                            <img src="/img/staffs/<?= $onstaff->profil ?>" alt="Profile picture" class="avatar-img" width="40" height="40">
                                        </div>
                                    <?php } ?>
                                    <span class="fw-semibold"><?= $onstaff->firstname. ' ' . $onstaff->lastname ?></span>
                                </td>
                                <td class="date" data-signed="1627858800">
                                    <a class="p-3" href="/projects/show_project/<?= $project->id ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/projects/edit/<?= $project->id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/projects/delete/<?= $project->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div> <!-- / .table-responsive -->
        </div>
    </div>
</div> <!-- / .row -->

<div class="modal fade" id="projetModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="/projects/create_project" method="POST"  enctype="multipart/form-data">
                <!-- Header -->
                <div class="modal-header pb-0">
                    <h3 id="taskModalTitle" class="modal-title">Create New project</h3>

                    <!-- Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="name" class="col-form-label">Project name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Please add a  project name</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="category" class="col-form-label">Project category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option > </option>
                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?=$category->id ?>" ><?= $category->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">Please select a  category</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="priority" class="col-form-label">Project priority</label>
                            <select class="form-select" id="priority" name="priority" required>
                                <option > </option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <div class="invalid-feedback">Please select a  priority</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="assign" class="col-form-label">Project executor</label>
                            <select class="form-select" id="assign" name="assign" required>
                                <option > </option>
                                <?php foreach ($staffs as $staff) : ?>
                                    <option value="<?=$staff->id ?>" ><?= $staff->firstname . ' ' . $staff->lastname ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">Please select the executor</div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="start" class="col-form-label">Start of the project</label>
                            <input type="date" class="form-control" id="start" value="" name="start" required>
                            <div class="invalid-feedback">Please add a  start date of project</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="timestart" class="col-form-label">Time start of the project</label>
                            <input type="time" class="form-control" id="timestart" value="" name="timestart" required>
                            <div class="invalid-feedback">Please add a  time start of project</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="end" class="col-form-label">End of the project</label>
                            <input type="date" class="form-control" id="end" value="" name="end" required>
                            <div class="invalid-feedback">Please add a  end date of project</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="timeend" class="col-form-label">Time end of the project</label>
                            <input type="time" class="form-control" id="timeend" value="" name="timeend" required>
                            <div class="invalid-feedback">Please add a  time end of project</div>
                        </div>

                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg">
                            <label for="start" class="col-form-label"> Project description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            <div class="invalid-feedback">Please add a  description of project</div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg">
                            <label for="start" class="col-form-label"> Attachement project </label>
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
                        <button type="submit" class="btn btn-primary">Save project</button>
                    </div>
                    
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
</div>