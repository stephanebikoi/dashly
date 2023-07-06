<div class="d-flex align-items-baseline justify-content-between">
    <!-- Title -->
    <h1 class="h2">
        Task Details
    </h1>
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
            <li class="breadcrumb-item active" aria-current="page">Task Details</li>
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
                <p class="mb-3"><?= $task->description ?></p>
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

                        $date1 = strtotime($task->start);
                        $date2 = strtotime($task->end);
                        $today = time();

                        $dateDiff = $date2 - $date1;
                        $dateDiffForToday = $today - $date1;

                        if ($dateDiff === 0) {
                            $percentageRounded = 0;
                        } else {
                            $percentage = $dateDiffForToday / $dateDiff * 100;

                            //($percentage < 0 ) ? $percentageRounded = 0 : $percentageRounded = round($percentage);

                            $percentageRounded = round($percentage);
                        }
                        
                        

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
                <h2><?= $task->name ?></h2>
                <hr>

                <div class="row mb-3">
                    <div class="col-5 text-muted d-flex align-items-center text-truncate">
                        Assignee
                    </div>
                    <div class="col d-flex align-items-center">
                        <?php
                            $staffModel = new App\Models\StaffsModel;
                            $onstaff = $staffModel->find( $task->executor);
                            
                            $projectModel = new App\Models\ProjectsModel;
                            $onproject = $projectModel->find( $task->project);
                            
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
                        <span class="fw-semibold"><?= $task->state ?></span>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                        Project
                    </div>
                    <div class="col">
                        <?= $onproject->name ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                        Priority
                    </div>
                    <div class="col">
                        <?= $task->priority ?>
                    </div>
                </div> <!-- / .row -->

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                        Start date
                    </div>
                    <div class="col">
                        <?= $task->start .' at ' . $task->timeStart?>
                    </div>
                </div> <!-- / .row -->

                <div class="row">
                    <div class="col-6 text-muted text-truncate">
                        End date
                    </div>
                    <div class="col">
                    <?= $task->end .' at ' . $task->timeEnd?>
                    </div>
                </div> <!-- / .row --><br>

                <div class="row mb-4">
                    <div class="col-6 text-muted text-truncate">
                    Remaining Time
                    </div>
                    <div class="col">
                    <?= $diff = \App\Models\Model::RemainingTime($task->end) ?></small>
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
                Staff executing the task
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
