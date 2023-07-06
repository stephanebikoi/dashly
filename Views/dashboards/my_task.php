<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        My task
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center" id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#projetModal" id="btnAddTask">Add New task</button>
            </span>
        </h1>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
            <li class="breadcrumb-item active" aria-current="page">My task</li>
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
                            <th><a href="#" class="text-muted list-sort" data-sort="name" data-bs-toggle="modal" data-bs-target="#category">task project</a></th>
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