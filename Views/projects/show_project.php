<div class="d-flex align-items-baseline justify-content-between">
    <!-- Title -->
    <h1 class="h2">
        Project Details
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
            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project Details</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col">

        <!-- Card -->
        <div class="card border-0">
            <div class="card-body">
                <h4 class="mb-3">Description</h4>
                <hr>
                <p class="mb-3"><?= $project->description ?></p>
            </div>
        </div>

        <!-- Card -->
        <div class="card border-0">
            <div class="card-body">
                <h4 class="mb-3">Evolution</h4>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <?php
                        $date = date('y-m-j&\nb\sp;g:i:s');

                        $date1 = strtotime($project->start);
                        $date2 = strtotime($project->end);
                        $today = time();

                        $dateDiff = $date2 - $date1;
                        $dateDiffForToday = $today - $date1;

                        $percentage = $dateDiffForToday / $dateDiff * 100;
                        $percentageRounded = round($percentage);

                        //echo $percentageRounded . '%';
                    ?>
                    <div class="progress w-100 h-5px">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percentageRounded . '%'?>"  aria-valuenow="<?= $percentageRounded?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="ms-3 text-muted"><?= ($percentageRounded < 0 ) ? 0 .'%': $percentageRounded . '%' ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-xxl-3">

        <!-- Card -->
        <div class="card border-0">

            <div class="card-body">
                <h2><?= $project->name ?></h2>
                <hr>

                <div class="row mb-3">
                    <div class="col-5 text-muted d-flex align-items-center text-truncate">
                        Assignee
                    </div>
                    <div class="col d-flex align-items-center">
                        <?php
                            $staffModel = new App\Models\StaffsModel;
                            $onstaff = $staffModel->find( $project->executor);
                            
                            $categoryModel = new App\Models\CategoriesModel;
                            $oncategory = $categoryModel->find( $project->category);
                            
                        ?>
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
                        <span class="fw-semibold mx-3"><?= $onstaff->firstname. ' ' . $onstaff->lastname ?></span>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4 d-flex align-items-center">
                    <div class="col-6 text-muted d-flex align-items-center">
                        State
                    </div>
                    <div class="col d-flex align-items-center">
                        <span class="fw-semibold"><?= $project->state ?></span>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                        Category
                    </div>
                    <div class="col">
                        <?= $oncategory->name ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                        Priority
                    </div>
                    <div class="col">
                        <?= $project->priority ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                        Start date
                    </div>
                    <div class="col">
                        <?= $project->start .' at ' . $project->timeStart?>
                    </div>
                </div> <!-- / .row -->

                <div class="row">
                    <div class="col-6 text-muted text-truncate">
                        End date
                    </div>
                    <div class="col">
                    <?= $project->end .' at ' . $project->timeEnd?>
                    </div>
                </div> <!-- / .row --><br>

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                    Remaining Time
                    </div>
                    <div class="col">
                    <?= $diff = \App\Models\Model::RemainingTime($project->end) ?></small>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>
</div> <!-- / .row -->

<div class="row">
    <div class="col">
        <!-- Card -->
        <div class="card border-0 flex-fill w-100" id="users">
            <div class="card-header border-0 card-header-space-between">

                <!-- Title -->
                <h2 class="card-header-title h4 text-uppercase">
                Staff executing the project
                </h2>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-middle table-edge table-hover table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th> Staff number </th>
                            <th> Staff name </th>
                            <th> Task perform </th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr>
                            <td class="id"><?= $onstaff->staffnum ?></td>
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
                                <span class="name fw-bold"><?= $onstaff->firstname. ' ' . $onstaff->lastname ?></span>
                            </td>
                            <td class="email">supervisor</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>           
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <!-- Card -->
        <div class="card border-0 flex-fill w-100" id="users">
            <div class="card-header border-0 card-header-space-between">

                <!-- Title -->
                <h2 class="card-header-title h4 text-uppercase">
                All tasks of this project
                </h2>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-middle table-edge table-hover table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th> Staff number </th>
                            <th> Staff name </th>
                            <th> Task perform </th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr>
                            <td class="id"><?= $onstaff->staffnum ?></td>
                            <td>
                                <span class="name fw-bold"><?= $onstaff->firstname. ' ' . $onstaff->lastname ?></span>
                            </td>
                            <td class="email">supervisor</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>           
        </div>
    </div>
</div>


<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="/tasks/create_task_to_project/<?= $project->id ?>" method="POST"  enctype="multipart/form-data">
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
                            <label for="name" class="col-form-label">Task name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Please add a  task name</div>
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
                                <?php foreach ($staffs as $staff) : ?>
                                    <option value="<?=$staff->id ?>" ><?= $staff->firstname . ' ' . $staff->lastname ?></option>
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