<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        All staffs
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center" id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#taskModal" id="btnAddTask">Add New staff</button>
            </span>
        </h1>

    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Staffs</a></li>
            <li class="breadcrumb-item active" aria-current="page">All staffs</li>
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
                    Staffs
                </h2>
            </div>
            <!-- Table -->
            <div class="table-responsive">
                <table class="table align-middle table-edge table-hover table-nowrap mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th> Staff number </th>
                            <th> Staff name </th>
                            <th> Function </th>
                            <th> Poste </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <?php foreach ($staffs as $staff): 

                            $functionModel = new App\Models\FonctionsModel;
                            $onfunction = $functionModel->find($staff->function);

                            $posteModel = new App\Models\PostesModel;
                            $onposte = $posteModel->find($staff->role);
                            ?>
                            <tr>
                                <td class="id"><?= $staff->staffnum ?></td>
                                <td>
                                    <?php if(empty($staff->profil)) {
                                        $a = strtoupper(substr($staff->firstname, 0, 1));
                                        $b = strtoupper(substr($staff->lastname, 0, 1)); ?>
                                        <div class="avatar avatar-circle avatar-xs me-2">
                                            <span class="avatar-title text-bg-danger-soft" style="color: purple; width:40px; height:40px;"><?= $a.$b ?></span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="avatar avatar-circle avatar-sm avatar-online">
                                            <img src="/img/staffs/<?= $staff->profil ?>" alt="Profile picture" class="avatar-img" width="40" height="40">
                                        </div>
                                    <?php } ?>
                                    <span class="name fw-bold mx-3"><?= $staff->firstname . ' '. $staff->otherfirstname . ' '. $staff->lastname ?></span>
                                </td>
                                <td class="email"><?= $onfunction->name ?></td>
                                <td class="id"><?= $onposte->name ?></td>
                                <td class="date" data-signed="1627858800">
                                    <a class="p-3" href="/staffs/show_staff/<?= $staff->id ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/staffs/edit/<?= $staff->id ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="p-3" href="/staffs/delete/<?= $staff->id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>           
        </div>
    </div>
</div>

<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate id="taskForm" action="/staffs/create_staff" method="POST">
                <!-- Header -->
                <div class="modal-header pb-0">
                    <h3 id="taskModalTitle" class="modal-title">add new staff</h3>

                    <!-- Button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="firstname" class="col-form-label">Firstname</label>
                            <input type="text" class="form-control" id="firstame" name="firstname" required>
                            <div class="invalid-feedback">Please add a  firstname </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="otherfirstname" class="col-form-label">Other firstname</label>
                            <input type="text" class="form-control" id="otherfirstname" name="otherfirstname" >
                            <div class="invalid-feedback">Please add a  otherfirstname </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="lastname" class="col-form-label">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                            <div class="invalid-feedback">Please add a  lastname </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="firstname" class="col-form-label">Date of birth</label>
                            <input type="date" class="form-control" id="dateofbirth" value="" name="date" required>
                            <div class="invalid-feedback">Please add a  date of birth </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="otherfirstname" class="col-form-label">Place of birth</label>
                            <input type="text" class="form-control" id="placeofbirth" value="" name="place" required>
                            <div class="invalid-feedback">Please add a  place of birth </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="lastname" class="col-form-label">Sex</label><br>
                            <input type="radio" id="sex" name="sex" value="male" checked>
                            <label for="male">Male</label>
                            <input type="radio" id="sex" name="sex" value="female">
                            <label for="female"> female</label>
                        </div>

                    </div> <!-- / .row -->
                    <div class="row mb-4">
                        <div class="col-lg">
                            <label for="email" class="col-form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text" id="email-addon">
                                    <svg viewBox="0 0 24 24" height="10" width="10" xmlns="http://www.w3.org/2000/svg"><path d="M17.25,12A5.25,5.25,0,1,1,12,6.75,5.25,5.25,0,0,1,17.25,12Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M17.25,12v2.25a3,3,0,0,0,6,0V12a11.249,11.249,0,1,0-4.5,9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                </span>
                                <input type="email" class="form-control" id="email"  value="" aria-describedby="email-addon" name="email" required email>
                            </div>
                            <div class="invalid-feedback">Please add a  email </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="phone" class="col-form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" required value="" aria-describedby="email-addon" name="phone">
                            <div class="invalid-feedback">Please add a  phone</div>
                        </div>

                        <div class="col-lg-6">
                            <label for="address" class="col-form-label">Residential address</label><br>
                            <input type="text" class="form-control" id="address" required value="" aria-describedby="email-addon" name="address">
                        </div>

                    </div> <!-- / .row -->
                     
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <label for="poste" class="col-form-label">Staff function</label>
                            <select class="form-select" id="poste" name="poste" required>
                                <option > </option>
                                <?php foreach ($functions as $function) : ?>
                                    <option value="<?=$function->id ?>" ><?= $function->name ?></option>
                                <?php endforeach ?>
                            </select>
                        <div class="invalid-feedback">Please add a  function </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="role" class="col-form-label">Staff poste</label>
                        <select class="form-select" id="role" name="role" required>
                            <option > </option>
                                <?php foreach ($postes as $poste) : ?>
                                    <option value="<?=$poste->id ?>" ><?= $poste->name ?></option>
                                <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">Please add a  poste</div>
                    </div>

                </div> <!-- / .row -->
                    
                </div>
                <!-- End Body -->
        
                <!-- Footer -->
                <div class="modal-footer pt-0">

                    <!-- Button -->
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>

                    <!-- Button -->
                    <button type="submit" class="btn btn-primary" id="btnSaveEvent">Save staff</button>
                </div>
                <!-- End Footer -->
            </form>
        </div>
    </div>
</div>