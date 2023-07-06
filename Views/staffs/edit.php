<div class="d-flex align-items-baseline justify-content-between">
    <!-- Title -->
    <h1 class="h2">
        Edit staff
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Staffs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit staff</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-md-4 col-xxl-3">

        <!-- Card -->
        <div class="card border-0 sticky-md-top top-10px">
            <div class="card-body">
                <div class="text-center mb-5">
                    
                        <div class="avatar avatar-xxl avatar-circle mb-5">
                            <?php if(empty($staf->profil)) {
                                $a = strtoupper(substr($staf->firstname, 0, 1));
                                $b = strtoupper(substr($staf->lastname, 0, 1)); ?>
                                <div class="avatar avatar-circle avatar-xxl">
                                    <span class="avatar-title text-bg-danger-soft" style="color: purple; width:112px; height:112px;"><?= $a.$b ?></span>
                                </div>
                            <?php } else { ?>
                                <img src="/img/staffs/<?= $staf->profil ?>" alt="Profile picture" class="avatar-img" width="200" height="200" id="image">
                            <?php } ?>
                        </div>

                    <h3 class="mb-0"><?= $staf->firstname. ' ' . $staf->otherfirstname . ' ' . $staf->lastname ?></h3><br>
                    <span class="small text-secondary fw-semibold">Staf function : <?= $staf->function ?></span><br>
                    <span class="small text-secondary fw-semibold">Staf role : <?= $staf->role ?></span>
                </div>
                
                <!-- Divider -->
                <hr class="mb-0">
            </div>

            <ul class="scrollspy mb-5" id="account" data-scrollspy='{"offset": "30"}'>
                <li class="active">
                    <a href="#basicInformationSection" class="d-flex align-items-center py-3">
                        <svg viewBox="0 0 24 24" height="14" width="14" class="me-3" xmlns="http://www.w3.org/2000/svg"><path d="M6.750 6.000 A5.250 5.250 0 1 0 17.250 6.000 A5.250 5.250 0 1 0 6.750 6.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M2.25,23.25a9.75,9.75,0,0,1,19.5,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                        Basic information
                    </a>
                </li>
                
                <li>
                    <a href="#contactSection" class="d-flex align-items-center py-3">
                        <svg viewBox="0 0 24 24" height="14" width="14" class="me-3" xmlns="http://www.w3.org/2000/svg"><path d="M17.25,12A5.25,5.25,0,1,1,12,6.75,5.25,5.25,0,0,1,17.25,12Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M17.25,12v2.25a3,3,0,0,0,6,0V12a11.249,11.249,0,1,0-4.5,9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                        Contact
                    </a>
                </li>
                                
                <li>
                    <a href="#professionnalSection" class="d-flex align-items-center py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  height="14" width="14" class="me-3"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.75 9.75H5.25C4.42157 9.75 3.75 10.4216 3.75 11.25V21.75C3.75 22.5784 4.42157 23.25 5.25 23.25H18.75C19.5784 23.25 20.25 22.5784 20.25 21.75V11.25C20.25 10.4216 19.5784 9.75 18.75 9.75Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 9.75V6C6.75 4.60761 7.30312 3.27226 8.28769 2.28769C9.27226 1.30312 10.6076 0.75 12 0.75C13.3924 0.75 14.7277 1.30312 15.7123 2.28769C16.6969 3.27226 17.25 4.60761 17.25 6V9.75"/><path stroke="currentColor" stroke-width="1.5" d="M8.625 15C8.41789 15 8.25 14.8321 8.25 14.625C8.25 14.4179 8.41789 14.25 8.625 14.25"/><path stroke="currentColor" stroke-width="1.5" d="M8.625 15C8.83211 15 9 14.8321 9 14.625C9 14.4179 8.83211 14.25 8.625 14.25"/><path stroke="currentColor" stroke-width="1.5" d="M8.625 18.75C8.41789 18.75 8.25 18.5821 8.25 18.375C8.25 18.1679 8.41789 18 8.625 18"/><path stroke="currentColor" stroke-width="1.5" d="M8.625 18.75C8.83211 18.75 9 18.5821 9 18.375C9 18.1679 8.83211 18 8.625 18"/><path stroke="currentColor" stroke-width="1.5" d="M12 15C11.7929 15 11.625 14.8321 11.625 14.625C11.625 14.4179 11.7929 14.25 12 14.25"/><path stroke="currentColor" stroke-width="1.5" d="M12 15C12.2071 15 12.375 14.8321 12.375 14.625C12.375 14.4179 12.2071 14.25 12 14.25"/><g><path stroke="currentColor" stroke-width="1.5" d="M12 18.75C11.7929 18.75 11.625 18.5821 11.625 18.375C11.625 18.1679 11.7929 18 12 18"/><path stroke="currentColor" stroke-width="1.5" d="M12 18.75C12.2071 18.75 12.375 18.5821 12.375 18.375C12.375 18.1679 12.2071 18 12 18"/></g><g><path stroke="currentColor" stroke-width="1.5" d="M15.375 15C15.1679 15 15 14.8321 15 14.625C15 14.4179 15.1679 14.25 15.375 14.25"/><path stroke="currentColor" stroke-width="1.5" d="M15.375 15C15.5821 15 15.75 14.8321 15.75 14.625C15.75 14.4179 15.5821 14.25 15.375 14.25"/></g><g><path stroke="currentColor" stroke-width="1.5" d="M15.375 18.75C15.1679 18.75 15 18.5821 15 18.375C15 18.1679 15.1679 18 15.375 18"/><path stroke="currentColor" stroke-width="1.5" d="M15.375 18.75C15.5821 18.75 15.75 18.5821 15.75 18.375C15.75 18.1679 15.5821 18 15.375 18"/></g></svg>
                        Professionnal information
                    </a>
                </li>
                
            </ul>

        </div>
    </div>

    <div class="col">
        <form action="/staffs/save_edit/<?=$staf->id?>" method="POST" id="form">
            <div class="col">
                <!-- Card -->
                <div class="card border-0 scroll-mt-3" id="basicInformationSection">
                    <div class="card-header">
                        <h2 class="h3 mb-0">Basic information</h2>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="firstname" class="col-form-label">First name</label>
                            </div>

                            <div class="col-lg">
                                <input type="text" class="form-control" id="firstame" required value="<?= $staf->firstname ?>">
                                <div class="invalid-feedback">Please add a  firstname </div>
                            </div>
                        
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="firstnameother" class="col-form-label">Other first name</label>
                            </div>

                            <div class="col-lg">
                                <input type="text" class="form-control" id="firstameother" required value="<?= $staf->otherfirstname ?>">
                                <div class="invalid-feedback">Please add a  other firstname </div>
                            </div>
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="lastname" class="col-form-label">Last name</label>
                            </div>

                            <div class="col-lg">
                                <input type="text" class="form-control" id="lastname" value="<?= $staf->lastname ?>" required>
                                <div class="invalid-feedback">Please add a  lastname </div>
                            </div>
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="dateofbirth" class="col-form-label">Date of birth</label>
                            </div>
    
                            <div class="col-lg">
                                <input type="text" class="form-control" id="dateofbirth" required value="<?= $staf->dateofbirth ?>">
                                <div class="invalid-feedback">Please add a  date of birth </div>
                            </div>
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="placeofbirth" class="col-form-label">Place of birth</label>
                            </div>

                            <div class="col-lg">
                                <input type="text" class="form-control" id="placeofbirth" required value="<?= $staf->placeofbirth ?>">
                                <div class="invalid-feedback">Please add a  place of birth </div>
                            </div>

                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="" class="col-form-label">Sex</label>
                            </div>

                            <div class="col-lg">
                                
                                <div class="col-md-6 dateOf">
                                    <input type="radio" id="sex" name="sex" value="male" <?php if($staf->sex === 'male')  echo 'checked'; ?>>
                                    <label for="male">Male</label>
                                    <input type="radio" id="sex" name="sex" value="female" <?php if($staf->sex === 'female')  echo 'checked'; ?>>
                                    <label for="female"> female</label>
                                </div>
                                <div class="col-md-6 dateOf">
                                    
                                </div>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

                <!-- Card -->
                <div class="card border-0 scroll-mt-3" id="contactSection">
                    <div class="card-header">
                        <h2 class="h3 mb-0">Contact</h2>
                    </div>
 
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="email" class="col-form-label">Email</label>
                            </div>

                            <div class="col-lg">
                                <div class="input-group">
                                    <span class="input-group-text" id="email-addon">
                                        <svg viewBox="0 0 24 24" height="10" width="10" xmlns="http://www.w3.org/2000/svg"><path d="M17.25,12A5.25,5.25,0,1,1,12,6.75,5.25,5.25,0,0,1,17.25,12Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M17.25,12v2.25a3,3,0,0,0,6,0V12a11.249,11.249,0,1,0-4.5,9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                    </span>
                                    <input type="email" class="form-control" id="email"  value="<?= $staf->email ?>" aria-describedby="email-addon" name="email" required email>
                                    <div class="invalid-feedback">Please add a  email </div>
                                </div>
                            </div>
                            
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="phone" class="col-form-label">Phone</label>
                            </div>

                            <div class="col-lg">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" id="phone" required value="<?= $staf->phone ?>" aria-describedby="email-addon" name="phone">
                                    <div class="invalid-feedback">Please add a  phone </div>
                                </div>
                            </div>
                            
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="address" class="col-form-label">Residential address</label>
                            </div>

                            <div class="col-lg">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" id="address" required value="<?= $staf->address ?>" aria-describedby="email-addon" name="address">
                                    <div class="invalid-feedback">Please add a  address </div>
                                </div>
                            </div>
                            
                        </div> <!-- / .row -->
                    </div>
                 </div>
                <!-- Card -->
                <div class="card border-0 scroll-mt-3" id="professionnalSection">
                    <div class="card-header">
                        <h2 class="h3 mb-0">Professionnal information</h2>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="function" class="col-form-label">Staff function</label>
                            </div>

                            <div class="col-lg">
                                <?php
                                    $functionModel = new App\Models\FonctionsModel;
                                    $onfunction = $functionModel->find( $staf->function);

                                ?>
                                <select class="form-select" id="function" name="function" required>
                                    <option  value="<?=$onfunction->id ?>" ><?= $onfunction->name?></option>
                                    <?php foreach ($functions as $function) : ?>
                                        <option value="<?=$function->id ?>" ><?= $function->name?></option>
                                    <?php endforeach ?> 
                                </select>
                                
                            </div>
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="role" class="col-form-label">Staff role</label>
                            </div>

                            <div class="col-lg">
                                <?php
                                    $posteModel = new App\Models\PostesModel;
                                    $onposte = $posteModel->find( $staf->role);

                                ?>
                                <select class="form-select" id="poste" name="poste" required>
                                    <option  value="<?=$onposte->id ?>" ><?= $onposte->name?></option>
                                    <?php foreach ($postes as $poste) : ?>
                                        <option value="<?=$poste->id ?>" ><?= $poste->name?></option>
                                    <?php endforeach ?> 
                                </select>
                                
                            </div>
                        </div> <!-- / .row -->

                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="evaluation" class="col-form-label">Evakuation</label>
                            </div>

                            <div class="col-lg">
                                <input type="text" class="form-control" id="evaluation" name="evaluation" required >
                            </div>
                        
                        </div> <!-- / .row -->

                    </div>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <!-- Button -->
                    <button type="submit" class="btn btn-primary">Edit staff</button>
                </div>
            <br><br><br>
        </form>
    </div>
</div>