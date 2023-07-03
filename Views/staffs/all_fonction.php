
<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        Functions
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center" id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#functionsModal" id="btnAddTask">Add New function</button>
            </span>
        </h1>

    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">staffs</a></li>
            <li class="breadcrumb-item active" aria-current="page">All functions</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col">
        <!-- Card -->
        <div class="card border-0 flex-fill w-100" id="users">
            <div class="card-header border-0 card-header-space-between">

                <!-- Title -->
                <h2 class="card-header-title h4 text-uppercase">
                    functions
                </h2>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-middle table-edge table-hover table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th> # </th>
                            <th> Name function </th>
                            <th> Description </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php foreach ($functions as $function): ?>
                            <tr>
                                <td class="id"><?= $function->id ?></td>
                                <td class="id"><?= $function->name ?></td>
                                <td class="email"><?= substr($function->description, 0 , 80) . ' ...' ?></td>
                                <td class="date" data-signed="1627858800">
                                    <a class="p-3" href="/staffs/edit_function/<?= $function->id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/staffs/delete_function/<?= $function->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>           
        </div>
    </div>
</div>

<div class="modal fade" id="functionsModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="/staffs/create_function" method="POST">
                <!-- Header -->
                <div class="modal-header pb-0">
                    <h3 id="taskModalTitle" class="modal-title">Create New function</h3>

                    <!-- Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">Please add a  name</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" required name="description" rows="5"></textarea>
                        <div class="invalid-feedback">Please add a  description</div>
                    </div>
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
                        <button type="submit" class="btn btn-primary">Save function</button>
                    </div>
                    
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
</div>