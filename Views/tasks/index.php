<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        tasks
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center" id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#taskModal" id="btnAddTask">Add New task</button>
            </span>
        </h1>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">tasks</a></li>
            <li class="breadcrumb-item active" aria-current="page">All task</li>
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
                    tasks
                </h2>
                
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table id="tasksTable" class="table align-middle table-edge table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="w-60px"><a href="/tasks/index" class="text-muted list-sort" data-sort="name">#</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#name">task name</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#project">task project</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#priority">task priority</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#state">task state</a></th>
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#executor">task executor</a></th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task): 
                            $staffModel = new App\Models\StaffsModel;
                            $onstaff = $staffModel->find( $task->executor);

                            $projectModel = new App\Models\ProjectsModel;
                            $onproject = $projectModel->find($task->project);
                            ?>
                            <tr>
                                <td><?= $task->id ?></td>
                                <td><?= $task->name ?></td>
                                <td><?= $onproject->name?></td>
                                <td><?= $task->priority ?></td>
                                <td><?= $task->state ?></td>
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
                                    <a class="p-3" href="/tasks/show_task/<?= $task->id ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/tasks/edit/<?= $task->id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/tasks/delete/<?= $task->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div> <!-- / .table-responsive -->
        </div>
    </div>
</div> <!-- / .row -->

<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="/tasks/create_task" method="POST"  enctype="multipart/form-data">
                <!-- Header -->
                <div class="modal-header pb-0">
                    <h3 id="taskModalTitle" class="modal-title">Create New task</h3>

                    <!-- Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="name" class="col-form-label">task name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Please add a  task name</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="project" class="col-form-label">task project</label>
                            <select class="form-select" id="project" name="project" required>
                                <option > </option>
                                <?php foreach ($projects as $project) : ?>
                                    <option value="<?=$project->id ?>" ><?= $project->name ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">Please select a  project</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="priority" class="col-form-label">task priority</label>
                            <select class="form-select" id="priority" name="priority" required>
                                <option > </option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                            <div class="invalid-feedback">Please select a  priority</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="assign" class="col-form-label">task executor</label>
                            <select class="form-select" id="assign" name="assign" required>
                                <option > </option>
                                <?php foreach ($staffs as $staf) : ?>
                                    <option value="<?=$staf->id ?>" ><?= $staf->firstname . ' ' . $staf->lastname ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">Please select the executor</div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="start" class="col-form-label">Start of the task</label>
                            <input type="date" class="form-control" id="start" value="" name="start" required>
                            <div class="invalid-feedback">Please add a  start date of task</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="timestart" class="col-form-label">Time start of the task</label>
                            <input type="time" class="form-control" id="timestart" value="" name="timestart" required>
                            <div class="invalid-feedback">Please add a  time start of task</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="end" class="col-form-label">End of the task</label>
                            <input type="date" class="form-control" id="end" value="" name="end" required>
                            <div class="invalid-feedback">Please add a  end date of task</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="timeend" class="col-form-label">Time end of the task</label>
                            <input type="time" class="form-control" id="timeend" value="" name="timeend" required>
                            <div class="invalid-feedback">Please add a  time end of task</div>
                        </div>

                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg">
                            <label for="start" class="col-form-label"> task description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                            <div class="invalid-feedback">Please add a  description of task</div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg">
                            <label for="start" class="col-form-label"> Attachement task </label>
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
                        <button type="submit" class="btn btn-primary">Save task</button>
                    </div>
                    
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
</div>