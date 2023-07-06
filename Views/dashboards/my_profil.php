<div class="d-flex align-items-baseline justify-content-between">

    <!-- Title -->
    <h1 class="h2">
        My profile
    </h1>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
            <li class="breadcrumb-item active" aria-current="page">My profile</li>
        </ol>
    </nav>
</div>
<br><br><br>
<ul class="nav nav-tabs" id="userTab">
    <li class="nav-item" role="presentation">
        <a href="javascript: void(0);" class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
            Profile
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="javascript: void(0);" class="nav-link" id="projects-tab" data-bs-toggle="tab" data-bs-target="#projects" role="tab" aria-controls="projects" aria-selected="false">
            Projects
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="javascript: void(0);" class="nav-link" id="files-tab" data-bs-toggle="tab" data-bs-target="#files" role="tab" aria-controls="files" aria-selected="false">
            Files
        </a>
    </li>
</ul>
<br>


<div class="tab-content pt-6" id="userTabContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <div class="col-md-4 col-xxl-3">
            <form action="/dashboards/update_profil/<?= $_SESSION['id'] ?>" method="POST" enctype="multipart/form-data">
                <!-- Card -->
                <div class="card border-0 sticky-md-top top-10px">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <form action="/dashboards/update_profil/<?= $_SESSION['id'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="avatar avatar-xxl avatar-circle mb-5">
                                    <?php if(empty($staff->profil)) {
                                        $a = strtoupper(substr($staff->firstname, 0, 1));
                                        $b = strtoupper(substr($staff->lastname, 0, 1)); ?>
                                        <div class="avatar avatar-circle avatar-xxl">
                                            <span class="avatar-title text-bg-danger-soft" style="color: purple; width:112px; height:112px;"><?= $a.$b ?></span>
                                        </div>
                                    <?php } else { ?>
                                        <img src="/img/staffs/<?= $staff->profil ?>" alt="Profile picture" class="avatar-img" width="200" height="200" id="image">
                                    <?php } ?>
                                    <label class="d-block cursor-pointer">
                                        <span class="position-absolute bottom-0 end-0 m-0 text-bg-primary w-30px h-30px rounded-circle d-flex align-items-center justify-content-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="14" width="14"><g><path d="M2.65,16.4a.5.5,0,0,0-.49-.13.52.52,0,0,0-.35.38L.39,23a.51.51,0,0,0,.6.6l6.36-1.42a.52.52,0,0,0,.38-.35.5.5,0,0,0-.13-.49Z" style="fill: currentColor"/><path d="M17.85,7.21l-11,11a.24.24,0,0,0,0,.35l1.77,1.77a.5.5,0,0,0,.71,0L20,9.68A.48.48,0,0,0,20,9L18.21,7.21A.25.25,0,0,0,17.85,7.21Z" style="fill: currentColor"/><path d="M16.79,5.79,15,4a.48.48,0,0,0-.7,0L3.71,14.63a.51.51,0,0,0,0,.71l1.77,1.77a.24.24,0,0,0,.35,0l11-11A.25.25,0,0,0,16.79,5.79Z" style="fill: currentColor"/><path d="M22.45,1.55a4,4,0,0,0-5.66,0l-.71.71a.51.51,0,0,0,0,.71l5,4.95a.52.52,0,0,0,.71,0l.71-.71A4,4,0,0,0,22.45,1.55Z" style="fill: currentColor"/></g></svg>
                                        </span>
                                        <input type="file" name="profil" class="d-none" id="profil" onChange="this.form.submit();">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-center mt-5">

                                    <!-- Button -->
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            <br>
                            <?php $posteModel = new App\Models\PostesModel; $onposte = $posteModel->find($staff->role); ?>
                            <h3 class="mb-0"><?= $staff->firstname. ' ' . $staff->otherfirstname . ' ' . $staff->lastname ?></h3><br>
                            <span class="small text-secondary fw-semibold">Staff poste : <?= $onposte->name ?></span>
                            <br><br>
                            <span class="small text-secondary fw-semibold">Login : <?= $staff->username ?></span><br><br>
                            <span class="small text-secondary fw-semibold">Evaluation : <?= empty($staff->evaluation) ? 0 : $staff->staffevaluation ?></span>
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
                            <input type="text" class="form-control" id="firstame" value="<?= $staff->firstname ?>">
                            <div class="invalid-feedback">Please add a  firstname </div>
                        </div>
                       
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="firstnameother" class="col-form-label">Other first name</label>
                        </div>

                        <div class="col-lg">
                            <input type="text" class="form-control" id="firstameother" value="<?= $staff->otherfirstname ?>">
                            <div class="invalid-feedback">Please add a  other firstname </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="lastname" class="col-form-label">Last name</label>
                        </div>

                        <div class="col-lg">
                            <input type="text" class="form-control" id="lastname"value="<?= $staff->lastname ?>">
                            <div class="invalid-feedback">Please add a  lastname </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="dateofbirth" class="col-form-label">Date of birth</label>
                        </div>
 
                        <div class="col-lg">
                            <input type="text" class="form-control" id="dateofbirth" value="<?= $staff->dateofbirth ?>">
                            <div class="invalid-feedback">Please add a  date of birth </div>
                        </div>
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="placeofbirth" class="col-form-label">Place of birth</label>
                        </div>

                        <div class="col-lg">
                            <input type="text" class="form-control" id="placeofbirth" value="<?= $staff->placeofbirth ?>">
                            <div class="invalid-feedback">Please add a  place of birth </div>
                        </div>

                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="" class="col-form-label">Sex</label>
                        </div>

                        <div class="col-lg">
                            
                            <div class="col-md-6 dateOf">
                                <input type="radio" id="sex" name="sex" value="male" <?php if($staff->sex === 'male')  echo 'checked'; ?>>
                                <label for="male">Male</label>
                                <input type="radio" id="sex" name="sex" value="female" <?php if($staff->sex === 'female')  echo 'checked'; ?>>
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
                    <form action="/dashboards/update_contact/<?= $_SESSION['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-lg-3">
                                <label for="email" class="col-form-label">Email</label>
                            </div>

                            <div class="col-lg">
                                <div class="input-group">
                                    <span class="input-group-text" id="email-addon">
                                        <svg viewBox="0 0 24 24" height="10" width="10" xmlns="http://www.w3.org/2000/svg"><path d="M17.25,12A5.25,5.25,0,1,1,12,6.75,5.25,5.25,0,0,1,17.25,12Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M17.25,12v2.25a3,3,0,0,0,6,0V12a11.249,11.249,0,1,0-4.5,9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                    </span>
                                    <input type="email" class="form-control" id="email"  value="<?= $staff->email ?>" aria-describedby="email-addon" name="email" required email>
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
                                    
                                    <input type="text" class="form-control" id="phone" required value="<?= $staff->phone ?>" aria-describedby="email-addon" name="phone">
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
                                    
                                    <input type="text" class="form-control" id="address" required value="<?= $staff->address ?>" aria-describedby="email-addon" name="address">
                                    <div class="invalid-feedback">Please add a  address </div>
                                </div>
                            </div>
                            
                        </div> <!-- / .row -->


                        <div class="d-flex justify-content-end mt-5">

                            <!-- Button -->
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Card -->
            <div class="card border-0 scroll-mt-3" id="professionnalSection">
                <div class="card-header">
                    <h2 class="h3 mb-0">Professionnal information</h2>
                </div>

                <div class="card-body">
                    
                    <?php $posteModel = new App\Models\PostesModel; $onposte = $posteModel->find($staff->role); ?>
                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="dateofbirth" class="col-form-label">Poste</label>
                        </div>

                        <div class="col-lg">
                            <input type="text" class="form-control" id="dateofbirth" value="<?= $onposte->name ?>">
                            <div class="invalid-feedback">Please add a  date of birth </div>
                        </div>
                    </div> <!-- / .row -->

                </div>
            </div>
        </div>   <!-- Card -->
    </div>
</div>

    <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
        <div class="row mb-6">
            <div class="col">
                <!-- Card -->
                <div class="card border-0">
                    <div class="card-header border-0 card-header-space-between">
                
                        <!-- Title -->
                        <h2 class="card-header-title h4 text-uppercase">
                            Projects
                        </h2>
                        
                        <a href="" data-toggle="tabLink" class="small fw-bold">
                            
                        </a>
                    </div>
        
                    <!-- Table -->
                    <div class="table-responsive">
                        <table id="projectsTable" class="table align-middle table-edge table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th class="w-50">Progress</th>
                                    <th class="w-150px text-end">Hours spent</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="fw-bold">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="avatar-img" viewBox="0 0 240 180.037"><path d="M238.553 22.362s-6.882-5.327-29.168-13.512C189.83 1.653 174.893 0 174.893 0l.074 42.679c0 18.039-20.385 37.194-55.199 37.194h-.996c-34.81 0-55.188-19.155-55.188-37.194L63.652 0S48.729 1.652 29.166 8.85C6.881 17.035 0 22.362 0 22.362c1.652 34.229 54.826 62.43 119.263 62.445h.015c64.441-.015 117.628-28.216 119.275-62.445"/><path d="M238.582 118.203s-6.881 5.312-29.167 13.504c-19.569 7.198-34.493 8.843-34.493 8.843l.075-42.672c0-18.035-20.386-37.183-55.199-37.183l-.49-.015h-.015l-.483.015c-34.817 0-55.195 19.148-55.195 37.183l.076 42.672s-14.931-1.645-34.493-8.843C6.919 123.515.024 118.203.024 118.203c1.652-34.226 54.84-62.427 119.285-62.449 64.44.022 117.629 28.223 119.273 62.449M11.611 179.946c-5.432 0-5.53-4.135-5.53-5.733v-7.528c0-.469-.03-1.072.936-1.072h2.799c.92 0 .868.635.868 1.072v7.528c0 .543.091 1.978 2.067 1.978h4.708c1.939 0 2.052-1.435 2.052-1.978v-7.528c0-.438-.062-1.072.853-1.072H23.2c1.02 0 .928.635.928 1.072v7.528c0 1.601-.106 5.733-5.545 5.733M37.632 179.026c-1.916-2.58-4.655-5.824-7.446-9.266v9.174c0 .407.098 1.012-.86 1.012h-2.618c-.943 0-.837-.604-.837-1.012v-12.268c0-.422-.038-1.057.837-1.057h5.107c1.441 0 3.501 2.897 4.844 4.828 1.049 1.449 2.965 3.651 4.255 5.312v-9.084c0-.422-.053-1.057.898-1.057h2.844c.905 0 .854.635.854 1.057v13.277h-5.243c-1.126.004-1.609.08-2.635-.916M47.244 179.946v-14.319h12.652c.77 0 5.968-.104 5.968 5.356 0 5.568.596 8.963-5.862 8.963h-6.82l-1.471-2.987v2.987m7.513-3.772c2.301 0 2.127-2.202 2.127-3.214 0-3.38-.951-3.518-2.467-3.518h-7.22v6.73l7.56.002zM70.813 165.718h11.664c.981 0 .853.646.853 1.84 0 1.116.151 1.75-.853 1.75h-9.219c-.242 0-1.086-.119-1.086.74 0 .875-.159 1.223.762 1.223h8.148l1.313 2.609c.188.362.166.68-.551.68h-8.436l-1.305-2.551v3.758c0 .875.777.709 1.003.709h9.574c.951 0 .868.664.868 1.75 0 1.162.083 1.812-.868 1.812H70.563c-1.011 0-2.98-.315-2.98-3.472v-7.891c0-.83.43-2.957 3.23-2.957M86.475 165.626h12.758c1.712 0 4.202-.016 4.202 4.604 0 3.018-.641 3.168-2.015 4.104 2.301.393 1.992 3.334 1.992 4.857 0 .771-.279.754-.506.754h-3.742c-.785 0-.596-1.236-.596-1.885 0-1.75-.981-1.676-1.366-1.676h-5.507c-.528-.921-1.554-2.973-1.554-2.973v5.945l-.702.588h-3.765l-.377-.469v-12.613c.001-.888.627-1.236 1.178-1.236m10.162 3.788h-5.681c-.951 0-.905.315-.905.604v2.563h5.847c2.837 0 2.837-.709 2.837-1.448-.001-1.478-.121-1.719-2.098-1.719M125.404 165.718c.936 0 1.848.422 2.832 2.338.664 1.373 5.297 9.748 6.277 11.498v.482h-4.828l-1.39-2.52h-5.872l-1.27-2.883c-.361.588-2.3 4.27-2.964 5.401h-4.843v-.315c.988-1.857 7.733-14.004 7.733-14.004m2.817 3.972l-2.369 4.299.219.213h4.391l.219-.213-2.24-4.314-.22.015M137.576 165.626h12.766c1.705 0 4.195-.016 4.195 4.604 0 3.018-.635 3.168-2.008 4.104 2.311.393 1.992 3.334 1.992 4.857 0 .771-.287.754-.514.754h-3.742c-.783 0-.588-1.236-.588-1.885 0-1.75-.98-1.676-1.357-1.676h-5.521c-.529-.921-1.557-2.973-1.557-2.973v5.945l-.691.588h-3.773l-.377-.469v-12.613c-.001-.888.632-1.236 1.175-1.236m10.171 3.788h-5.688c-.951 0-.904.315-.904.604v2.563h5.854c2.821 0 2.821-.709 2.821-1.448-.001-1.478-.105-1.719-2.083-1.719M165.688 179.946c-.949-1.78-3.59-6.699-5.371-9.928v8.933c0 .377.061.995-.859.995h-2.58c-.966 0-.891-.618-.891-.995v-12.269c0-.438-.061-1.057.891-1.057h4.467c.664 0 1.613-.15 2.67 1.977.801 1.705 2.489 5.252 3.668 7.123 1.176-1.871 2.912-5.418 3.711-7.123 1.041-2.127 1.961-1.977 2.717-1.977h4.451c.904 0 .799.619.799 1.057v12.269c0 .377.137.995-.799.995h-2.611c-.95 0-.875-.618-.875-.995v-8.933c-1.811 3.229-4.422 8.146-5.416 9.928M185.092 179.976c-4.225 0-4.043-4.525-4.043-7.482 0-2.688-.303-6.896 4.993-6.941h9.416c5.312 0 4.964 4.271 4.964 6.941 0 2.957.213 7.482-4.089 7.482m-2.731-3.682c2.144 0 2.067-2.218 2.067-3.695 0-1.344.317-3.427-2.476-3.427h-4.736c-2.775 0-2.445 2.083-2.445 3.427 0 1.479-.136 3.695 2.008 3.695h5.582zM207.499 179.946c-5.417 0-5.522-4.135-5.522-5.733v-7.528c0-.469-.029-1.072.937-1.072h2.808c.92 0 .858.635.858 1.072v7.528c0 .543.091 1.978 2.067 1.978h4.707c1.947 0 2.053-1.435 2.053-1.978v-7.528c0-.438-.045-1.072.859-1.072h2.821c1.026 0 .937.635.937 1.072v7.528c0 1.601-.092 5.733-5.553 5.733M223.04 165.626h12.767c1.705 0 4.193-.016 4.193 4.604 0 3.018-.648 3.168-2.021 4.104 2.31.393 2.008 3.334 2.008 4.857 0 .771-.287.754-.514.754h-3.742c-.77 0-.588-1.236-.588-1.885 0-1.75-.996-1.676-1.373-1.676h-5.508c-.527-.921-1.555-2.973-1.555-2.973v5.945l-.709.588h-3.758l-.377-.469v-12.613c0-.888.634-1.236 1.177-1.236m10.155 3.788h-5.674c-.951 0-.906.315-.906.604v2.563h5.855c2.821 0 2.821-.709 2.821-1.448.002-1.478-.119-1.719-2.096-1.719"/></svg>
                                            </span>
                                            Under Armour campaign
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress w-100 h-5px">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 81%"  aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="ms-3 text-muted">81%</span>
                                        </div>
                                    </td>
                                    <td class="text-end">23 hrs</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="avatar-img" viewBox="0 0 192.756 192.756"><g fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M0 0h192.756v192.756H0V0z"/><path d="M178.691 171.004c-22.973-15.594-52.488-47.338-52.488-64.881 0-16.428 20.328-28.262 20.328-44.969 0-14.758-11.277-31.464-19.492-39.401H45.452c7.657 8.354 19.074 24.644 19.074 39.401 0 16.707-19.91 28.542-19.91 44.969.14 20.328 29.377 48.73 47.477 64.881h86.598z" fill="#c9222f"/><path d="M29.858 164.461v-2.646c0-.834-.139-1.531-.417-1.809-.139-.279-.557-.559-1.252-.559-.557 0-.975.279-1.253.559-.278.277-.417.975-.417 1.947v2.508h3.339zm10.164 5.707H22.201v-8.631c0-2.646.417-4.455 1.253-5.568.835-1.254 2.088-1.811 3.897-1.811 1.114 0 1.95.277 2.646.695.696.557 1.392 1.254 1.811 2.229a3.779 3.779 0 0 1 1.113-2.229c.696-.418 1.531-.695 2.784-.695l2.367-.141h.139c.696 0 1.114-.139 1.114-.418h.695v5.711c-.417.137-.834.137-1.113.277h-2.505c-.975 0-1.671.277-1.95.557-.417.416-.557.975-.557 1.949v2.367h6.125v5.708h.002zm-17.821-24.781h17.821v5.848H22.201v-5.848zm10.86-15.037v-5.291c2.367.141 4.177.975 5.43 2.367 1.392 1.531 1.949 3.48 1.949 6.127 0 2.785-.835 5.012-2.506 6.682-1.67 1.67-3.898 2.367-6.822 2.367-2.923 0-5.151-.697-6.822-2.367s-2.505-3.76-2.505-6.543c0-2.646.556-4.596 1.81-6.127 1.252-1.531 3.063-2.227 5.29-2.506v5.43c-.835.141-1.532.418-1.949.975-.557.418-.696 1.254-.696 2.09 0 1.113.418 1.949 1.113 2.506.836.557 2.089.834 3.76.834s2.785-.277 3.62-.834 1.253-1.533 1.253-2.645c0-.836-.279-1.533-.696-2.09-.558-.557-1.254-.837-2.229-.975zm6.961-7.797H22.201v-5.709h5.987v-5.15h-5.987v-5.709h17.821v5.709h-6.961v5.15h6.961v5.709zm0-25.061v5.15H22.201v-6.96l8.911-2.506c.14 0 .418-.14.835-.14.418-.139.975-.278 1.671-.417-.557-.139-.975-.278-1.531-.417-.417 0-.696-.14-.975-.14l-8.911-2.506v-6.961h17.821v5.151H29.719c-.557-.139-1.113-.139-1.531-.139.835.278 1.81.417 2.923.696l.14.139 8.771 2.089v4.038l-8.492 2.229c-.418.139-.835.139-1.393.277-.418.139-1.113.279-1.949.418h11.834v-.001zm-8.91-23.251c1.671 0 2.924-.278 3.759-.835.696-.557 1.114-1.393 1.114-2.646s-.417-2.088-1.114-2.646c-.835-.556-2.088-.835-3.759-.835s-2.923.279-3.76.835c-.695.557-1.113 1.393-1.113 2.646s.418 2.089 1.113 2.646c.836.557 2.089.835 3.76.835zm0 5.708c-2.923 0-5.151-.835-6.822-2.506-1.671-1.531-2.505-3.759-2.505-6.683 0-2.784.834-5.012 2.505-6.683s3.899-2.506 6.822-2.506c2.924 0 5.152.835 6.822 2.506 1.671 1.671 2.506 3.898 2.506 6.683 0 2.924-.835 5.152-2.506 6.683-1.67 1.671-3.898 2.506-6.822 2.506zm8.91-21.023H22.201v-5.43l8.354-4.873c.139-.14.557-.418.975-.557.417-.139.835-.279 1.531-.557-.418.139-.696.139-1.114.139H22.201v-5.429h17.821v5.429l-8.213 5.012-1.114.557c-.417.139-.836.278-1.392.557.277-.139.556-.139.975-.139.278 0 .834-.14 1.392-.14h8.353v5.431h-.001zm-4.594-25.758v-1.53c0-1.393-.279-2.367-.975-2.924-.557-.557-1.67-.835-3.341-.835-1.532 0-2.646.278-3.341.835-.696.557-.975 1.532-.975 2.924v1.53h8.632zm4.594 5.709H22.201v-6.822c0-1.81.139-3.062.279-3.898.139-.975.417-1.67.695-2.366.836-1.114 1.811-2.089 3.063-2.646 1.393-.696 2.924-.975 4.873-.975s3.759.417 5.013 1.113c1.392.835 2.506 1.95 3.063 3.342.278.697.556 1.392.556 2.227.139.836.278 2.228.278 4.177v5.848h.001z"/></g></svg>
                                            </span>
                                                Richmond Systems
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress w-100 h-5px">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 39%"  aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="ms-3 text-muted">39%</span>
                                        </div>
                                    </td>
                                    <td class="text-end">19 hrs</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar avatar-xs me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="avatar-img" viewBox="0 0 192.756 192.756"><g fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M0 0h192.756v192.756H0V0z"/><path d="M42.741 71.477c-9.881 11.604-19.355 25.994-19.45 36.75-.037 4.047 1.255 7.58 4.354 10.256 4.46 3.854 9.374 5.213 14.264 5.221 7.146.01 14.242-2.873 19.798-5.096 9.357-3.742 112.79-48.659 112.79-48.659.998-.5.811-1.123-.438-.812-.504.126-112.603 30.505-112.603 30.505a24.771 24.771 0 0 1-6.524.934c-8.615.051-16.281-4.731-16.219-14.808.024-3.943 1.231-8.698 4.028-14.291z"/></g></svg>
                                            </span>
                                            Nike microsite
                                        </div>
                                    </td>
                                    <td class="text-muted">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="progress w-100 h-5px">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="ms-3 text-muted">0%</span>
                                        </div>
                                    </td>
                                    <td class="text-end">1 hr</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- / .table-responsive -->
                </div>
            </div>
            
            <div class="card border-0">
                <div class="card-header border-0 card-header-space-between">
                
                    <!-- Title -->
                    <h2 class="card-header-title h4 text-uppercase">
                        Tasks
                    </h2>
                    
                    <a href="" data-toggle="tabLink" class="small fw-bold">
                        
                    </a>
                </div>
        
                <!-- Table -->
                <div class="table-responsive">
                    <table id="projectsTable" class="table align-middle table-edge table-nowrap mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th class="w-50">Progress</th>
                                <th class="w-150px text-end">Hours spent</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="fw-bold">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="avatar-img" viewBox="0 0 240 180.037"><path d="M238.553 22.362s-6.882-5.327-29.168-13.512C189.83 1.653 174.893 0 174.893 0l.074 42.679c0 18.039-20.385 37.194-55.199 37.194h-.996c-34.81 0-55.188-19.155-55.188-37.194L63.652 0S48.729 1.652 29.166 8.85C6.881 17.035 0 22.362 0 22.362c1.652 34.229 54.826 62.43 119.263 62.445h.015c64.441-.015 117.628-28.216 119.275-62.445"/><path d="M238.582 118.203s-6.881 5.312-29.167 13.504c-19.569 7.198-34.493 8.843-34.493 8.843l.075-42.672c0-18.035-20.386-37.183-55.199-37.183l-.49-.015h-.015l-.483.015c-34.817 0-55.195 19.148-55.195 37.183l.076 42.672s-14.931-1.645-34.493-8.843C6.919 123.515.024 118.203.024 118.203c1.652-34.226 54.84-62.427 119.285-62.449 64.44.022 117.629 28.223 119.273 62.449M11.611 179.946c-5.432 0-5.53-4.135-5.53-5.733v-7.528c0-.469-.03-1.072.936-1.072h2.799c.92 0 .868.635.868 1.072v7.528c0 .543.091 1.978 2.067 1.978h4.708c1.939 0 2.052-1.435 2.052-1.978v-7.528c0-.438-.062-1.072.853-1.072H23.2c1.02 0 .928.635.928 1.072v7.528c0 1.601-.106 5.733-5.545 5.733M37.632 179.026c-1.916-2.58-4.655-5.824-7.446-9.266v9.174c0 .407.098 1.012-.86 1.012h-2.618c-.943 0-.837-.604-.837-1.012v-12.268c0-.422-.038-1.057.837-1.057h5.107c1.441 0 3.501 2.897 4.844 4.828 1.049 1.449 2.965 3.651 4.255 5.312v-9.084c0-.422-.053-1.057.898-1.057h2.844c.905 0 .854.635.854 1.057v13.277h-5.243c-1.126.004-1.609.08-2.635-.916M47.244 179.946v-14.319h12.652c.77 0 5.968-.104 5.968 5.356 0 5.568.596 8.963-5.862 8.963h-6.82l-1.471-2.987v2.987m7.513-3.772c2.301 0 2.127-2.202 2.127-3.214 0-3.38-.951-3.518-2.467-3.518h-7.22v6.73l7.56.002zM70.813 165.718h11.664c.981 0 .853.646.853 1.84 0 1.116.151 1.75-.853 1.75h-9.219c-.242 0-1.086-.119-1.086.74 0 .875-.159 1.223.762 1.223h8.148l1.313 2.609c.188.362.166.68-.551.68h-8.436l-1.305-2.551v3.758c0 .875.777.709 1.003.709h9.574c.951 0 .868.664.868 1.75 0 1.162.083 1.812-.868 1.812H70.563c-1.011 0-2.98-.315-2.98-3.472v-7.891c0-.83.43-2.957 3.23-2.957M86.475 165.626h12.758c1.712 0 4.202-.016 4.202 4.604 0 3.018-.641 3.168-2.015 4.104 2.301.393 1.992 3.334 1.992 4.857 0 .771-.279.754-.506.754h-3.742c-.785 0-.596-1.236-.596-1.885 0-1.75-.981-1.676-1.366-1.676h-5.507c-.528-.921-1.554-2.973-1.554-2.973v5.945l-.702.588h-3.765l-.377-.469v-12.613c.001-.888.627-1.236 1.178-1.236m10.162 3.788h-5.681c-.951 0-.905.315-.905.604v2.563h5.847c2.837 0 2.837-.709 2.837-1.448-.001-1.478-.121-1.719-2.098-1.719M125.404 165.718c.936 0 1.848.422 2.832 2.338.664 1.373 5.297 9.748 6.277 11.498v.482h-4.828l-1.39-2.52h-5.872l-1.27-2.883c-.361.588-2.3 4.27-2.964 5.401h-4.843v-.315c.988-1.857 7.733-14.004 7.733-14.004m2.817 3.972l-2.369 4.299.219.213h4.391l.219-.213-2.24-4.314-.22.015M137.576 165.626h12.766c1.705 0 4.195-.016 4.195 4.604 0 3.018-.635 3.168-2.008 4.104 2.311.393 1.992 3.334 1.992 4.857 0 .771-.287.754-.514.754h-3.742c-.783 0-.588-1.236-.588-1.885 0-1.75-.98-1.676-1.357-1.676h-5.521c-.529-.921-1.557-2.973-1.557-2.973v5.945l-.691.588h-3.773l-.377-.469v-12.613c-.001-.888.632-1.236 1.175-1.236m10.171 3.788h-5.688c-.951 0-.904.315-.904.604v2.563h5.854c2.821 0 2.821-.709 2.821-1.448-.001-1.478-.105-1.719-2.083-1.719M165.688 179.946c-.949-1.78-3.59-6.699-5.371-9.928v8.933c0 .377.061.995-.859.995h-2.58c-.966 0-.891-.618-.891-.995v-12.269c0-.438-.061-1.057.891-1.057h4.467c.664 0 1.613-.15 2.67 1.977.801 1.705 2.489 5.252 3.668 7.123 1.176-1.871 2.912-5.418 3.711-7.123 1.041-2.127 1.961-1.977 2.717-1.977h4.451c.904 0 .799.619.799 1.057v12.269c0 .377.137.995-.799.995h-2.611c-.95 0-.875-.618-.875-.995v-8.933c-1.811 3.229-4.422 8.146-5.416 9.928M185.092 179.976c-4.225 0-4.043-4.525-4.043-7.482 0-2.688-.303-6.896 4.993-6.941h9.416c5.312 0 4.964 4.271 4.964 6.941 0 2.957.213 7.482-4.089 7.482m-2.731-3.682c2.144 0 2.067-2.218 2.067-3.695 0-1.344.317-3.427-2.476-3.427h-4.736c-2.775 0-2.445 2.083-2.445 3.427 0 1.479-.136 3.695 2.008 3.695h5.582zM207.499 179.946c-5.417 0-5.522-4.135-5.522-5.733v-7.528c0-.469-.029-1.072.937-1.072h2.808c.92 0 .858.635.858 1.072v7.528c0 .543.091 1.978 2.067 1.978h4.707c1.947 0 2.053-1.435 2.053-1.978v-7.528c0-.438-.045-1.072.859-1.072h2.821c1.026 0 .937.635.937 1.072v7.528c0 1.601-.092 5.733-5.553 5.733M223.04 165.626h12.767c1.705 0 4.193-.016 4.193 4.604 0 3.018-.648 3.168-2.021 4.104 2.31.393 2.008 3.334 2.008 4.857 0 .771-.287.754-.514.754h-3.742c-.77 0-.588-1.236-.588-1.885 0-1.75-.996-1.676-1.373-1.676h-5.508c-.527-.921-1.555-2.973-1.555-2.973v5.945l-.709.588h-3.758l-.377-.469v-12.613c0-.888.634-1.236 1.177-1.236m10.155 3.788h-5.674c-.951 0-.906.315-.906.604v2.563h5.855c2.821 0 2.821-.709 2.821-1.448.002-1.478-.119-1.719-2.096-1.719"/></svg>
                                        </span>
                                        Under Armour campaign
                                    </div>
                                </td>
                                <td class="text-muted">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="progress w-100 h-5px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 81%"  aria-valuenow="81" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ms-3 text-muted">81%</span>
                                    </div>
                                </td>
                                <td class="text-end">23 hrs</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="avatar-img" viewBox="0 0 192.756 192.756"><g fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M0 0h192.756v192.756H0V0z"/><path d="M178.691 171.004c-22.973-15.594-52.488-47.338-52.488-64.881 0-16.428 20.328-28.262 20.328-44.969 0-14.758-11.277-31.464-19.492-39.401H45.452c7.657 8.354 19.074 24.644 19.074 39.401 0 16.707-19.91 28.542-19.91 44.969.14 20.328 29.377 48.73 47.477 64.881h86.598z" fill="#c9222f"/><path d="M29.858 164.461v-2.646c0-.834-.139-1.531-.417-1.809-.139-.279-.557-.559-1.252-.559-.557 0-.975.279-1.253.559-.278.277-.417.975-.417 1.947v2.508h3.339zm10.164 5.707H22.201v-8.631c0-2.646.417-4.455 1.253-5.568.835-1.254 2.088-1.811 3.897-1.811 1.114 0 1.95.277 2.646.695.696.557 1.392 1.254 1.811 2.229a3.779 3.779 0 0 1 1.113-2.229c.696-.418 1.531-.695 2.784-.695l2.367-.141h.139c.696 0 1.114-.139 1.114-.418h.695v5.711c-.417.137-.834.137-1.113.277h-2.505c-.975 0-1.671.277-1.95.557-.417.416-.557.975-.557 1.949v2.367h6.125v5.708h.002zm-17.821-24.781h17.821v5.848H22.201v-5.848zm10.86-15.037v-5.291c2.367.141 4.177.975 5.43 2.367 1.392 1.531 1.949 3.48 1.949 6.127 0 2.785-.835 5.012-2.506 6.682-1.67 1.67-3.898 2.367-6.822 2.367-2.923 0-5.151-.697-6.822-2.367s-2.505-3.76-2.505-6.543c0-2.646.556-4.596 1.81-6.127 1.252-1.531 3.063-2.227 5.29-2.506v5.43c-.835.141-1.532.418-1.949.975-.557.418-.696 1.254-.696 2.09 0 1.113.418 1.949 1.113 2.506.836.557 2.089.834 3.76.834s2.785-.277 3.62-.834 1.253-1.533 1.253-2.645c0-.836-.279-1.533-.696-2.09-.558-.557-1.254-.837-2.229-.975zm6.961-7.797H22.201v-5.709h5.987v-5.15h-5.987v-5.709h17.821v5.709h-6.961v5.15h6.961v5.709zm0-25.061v5.15H22.201v-6.96l8.911-2.506c.14 0 .418-.14.835-.14.418-.139.975-.278 1.671-.417-.557-.139-.975-.278-1.531-.417-.417 0-.696-.14-.975-.14l-8.911-2.506v-6.961h17.821v5.151H29.719c-.557-.139-1.113-.139-1.531-.139.835.278 1.81.417 2.923.696l.14.139 8.771 2.089v4.038l-8.492 2.229c-.418.139-.835.139-1.393.277-.418.139-1.113.279-1.949.418h11.834v-.001zm-8.91-23.251c1.671 0 2.924-.278 3.759-.835.696-.557 1.114-1.393 1.114-2.646s-.417-2.088-1.114-2.646c-.835-.556-2.088-.835-3.759-.835s-2.923.279-3.76.835c-.695.557-1.113 1.393-1.113 2.646s.418 2.089 1.113 2.646c.836.557 2.089.835 3.76.835zm0 5.708c-2.923 0-5.151-.835-6.822-2.506-1.671-1.531-2.505-3.759-2.505-6.683 0-2.784.834-5.012 2.505-6.683s3.899-2.506 6.822-2.506c2.924 0 5.152.835 6.822 2.506 1.671 1.671 2.506 3.898 2.506 6.683 0 2.924-.835 5.152-2.506 6.683-1.67 1.671-3.898 2.506-6.822 2.506zm8.91-21.023H22.201v-5.43l8.354-4.873c.139-.14.557-.418.975-.557.417-.139.835-.279 1.531-.557-.418.139-.696.139-1.114.139H22.201v-5.429h17.821v5.429l-8.213 5.012-1.114.557c-.417.139-.836.278-1.392.557.277-.139.556-.139.975-.139.278 0 .834-.14 1.392-.14h8.353v5.431h-.001zm-4.594-25.758v-1.53c0-1.393-.279-2.367-.975-2.924-.557-.557-1.67-.835-3.341-.835-1.532 0-2.646.278-3.341.835-.696.557-.975 1.532-.975 2.924v1.53h8.632zm4.594 5.709H22.201v-6.822c0-1.81.139-3.062.279-3.898.139-.975.417-1.67.695-2.366.836-1.114 1.811-2.089 3.063-2.646 1.393-.696 2.924-.975 4.873-.975s3.759.417 5.013 1.113c1.392.835 2.506 1.95 3.063 3.342.278.697.556 1.392.556 2.227.139.836.278 2.228.278 4.177v5.848h.001z"/></g></svg>
                                        </span>
                                            Richmond Systems
                                    </div>
                                </td>
                                <td class="text-muted">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="progress w-100 h-5px">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 39%"  aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ms-3 text-muted">39%</span>
                                    </div>
                                </td>
                                <td class="text-end">19 hrs</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="avatar-img" viewBox="0 0 192.756 192.756"><g fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M0 0h192.756v192.756H0V0z"/><path d="M42.741 71.477c-9.881 11.604-19.355 25.994-19.45 36.75-.037 4.047 1.255 7.58 4.354 10.256 4.46 3.854 9.374 5.213 14.264 5.221 7.146.01 14.242-2.873 19.798-5.096 9.357-3.742 112.79-48.659 112.79-48.659.998-.5.811-1.123-.438-.812-.504.126-112.603 30.505-112.603 30.505a24.771 24.771 0 0 1-6.524.934c-8.615.051-16.281-4.731-16.219-14.808.024-3.943 1.231-8.698 4.028-14.291z"/></g></svg>
                                        </span>
                                        Nike microsite
                                    </div>
                                </td>
                                <td class="text-muted">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="progress w-100 h-5px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 0%"  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ms-3 text-muted">0%</span>
                                    </div>
                                </td>
                                <td class="text-end">1 hr</td>
                            </tr>
                        </tbody>
                        </table>
                    </div> <!-- / .table-responsive -->
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
        <div class="row mb-6">
            <div class="col">
                <!-- Card -->
                <div class="card border-0 flex-fill w-100" data-list='{"valueNames": ["title", {"name": "updated", "attr": "data-updated"}, {"name": "size", "attr": "data-size"}], "page": 10}' id="filesTable">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-end">
                            <!-- Title -->
                            <h2 class="card-header-title h4 text-uppercase text-left">
                                Files
                            </h2>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-middle table-hover table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>
                                        <a href="javascript: void(0);" class="text-muted list-sort" data-sort="title">
                                            Title
                                        </a>
                                    </th>
                                    <th>
                                        <a href="javascript: void(0);" class="text-muted list-sort" data-sort="updated">
                                            Last updated
                                        </a>
                                    </th>
                                    <th>
                                        <a href="javascript: void(0);" class="text-muted list-sort" data-sort="size">
                                            Size
                                        </a>
                                    </th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="list">
                                <tr>
                                    <td class="title">
                                        <div class="d-flex align-items-center">
                                            <svg width="23" height="30" class="me-3" viewBox="0 0 32 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>google-docs</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-143.000000, -703.000000)" fill-rule="nonzero">
                                                        <g transform="translate(29.000000, 595.000000)">
                                                            <g transform="translate(0.922481, 42.000000)">
                                                                <g transform="translate(113.077519, 66.000000)">
                                                                    <path d="M29,41.7882353 L3,41.7882353 C1.343,41.7882353 0,40.4520067 0,38.8033613 L0,2.98487395 C0,1.33622857 1.343,0 3,0 L22,0 L32,9.94957983 L32,38.8033613 C32,40.4520067 30.657,41.7882353 29,41.7882353 Z" fill="#2196F3"></path>
                                                                    <polygon fill="#BBDEFB" points="32 9.78823529 22.2117647 9.78823529 22.2117647 0"></polygon>
                                                                    <polygon fill="#1565C0" points="22.2117647 10.1647059 32 19.9529412 32 10.1647059"></polygon>
                                                                    <path d="M6.77647059,19.9529412 L24.8470588,19.9529412 L24.8470588,21.9428571 L6.77647059,21.9428571 L6.77647059,19.9529412 Z M6.77647059,23.9327731 L24.8470588,23.9327731 L24.8470588,25.9226891 L6.77647059,25.9226891 L6.77647059,23.9327731 Z M6.77647059,27.912605 L24.8470588,27.912605 L24.8470588,29.902521 L6.77647059,29.902521 L6.77647059,27.912605 Z M6.77647059,31.892437 L16.8156863,31.892437 L16.8156863,33.8823529 L6.77647059,33.8823529 L6.77647059,31.892437 Z" fill="#E3F2FD"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>

                                        <div class="d-flex flex-column">
                                            <span class="fw-bold d-block">Employee handbook</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="updated" data-updated="1652267547">
                                    Updated 17 mins ago
                                </td>
                                <td class="size" data-size="18432">
                                    18 kb
                                </td>
                                <td>
                                    <!-- Dropdown -->
                                        <div class="dropdown float-end">
                                            <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex text-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="14" width="14"><g><circle cx="12" cy="3.25" r="3.25" style="fill: currentColor"/><circle cx="12" cy="12" r="3.25" style="fill: currentColor"/><circle cx="12" cy="20.75" r="3.25" style="fill: currentColor"/></g></svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <span class="dropdown-header">SETTINGS</span>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript: void(0);">
                                                        <svg viewBox="0 0 24 24" height="14" width="14" class="me-2" xmlns="http://www.w3.org/2000/svg"><path d="M12,5.251C7.969,5.183,3.8,8,1.179,10.885a1.663,1.663,0,0,0,0,2.226C3.743,15.935,7.9,18.817,12,18.748c4.1.069,8.258-2.813,10.824-5.637a1.663,1.663,0,0,0,0-2.226C20.2,8,16.031,5.183,12,5.251Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M15.75,12A3.75,3.75,0,1,1,12,8.249,3.749,3.749,0,0,1,15.75,12Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                                        Preview
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript: void(0);">
                                                        <svg viewBox="0 0 24 24" height="14" width="14" class="me-2" xmlns="http://www.w3.org/2000/svg"><path d="M12.001 3.75L12.001 15.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M7.501 11.25L12.001 15.75 16.501 11.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M23.251,15.75v1.5a3,3,0,0,1-3,3H3.751a3,3,0,0,1-3-3v-1.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                                        Download
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript: void(0);">
                                                        <svg viewBox="0 0 24 24" height="14" width="14" class="me-2" xmlns="http://www.w3.org/2000/svg"><path d="M11.250 18.000 A2.250 2.250 0 1 0 15.750 18.000 A2.250 2.250 0 1 0 11.250 18.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M18.750 21.000 A2.250 2.250 0 1 0 23.250 21.000 A2.250 2.250 0 1 0 18.750 21.000 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M18.750 13.500 A2.250 2.250 0 1 0 23.250 13.500 A2.250 2.250 0 1 0 18.750 13.500 Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M15.425 16.845L19.075 14.655" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M15.588 18.835L18.912 20.165" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M8.25,20.25h-6a1.5,1.5,0,0,1-1.5-1.5V2.25A1.5,1.5,0,0,1,2.25.75H12.879a1.5,1.5,0,0,1,1.06.439l2.872,2.872a1.5,1.5,0,0,1,.439,1.06V8.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                                        Share
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript: void(0);">
                                                        <svg viewBox="0 0 24 24" height="14" width="14" class="me-2" xmlns="http://www.w3.org/2000/svg"><path d="M12.712,16.386,9,16.916,9.53,13.2l9.546-9.546A2.25,2.25,0,1,1,22.258,6.84Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M5.25,15h-3a1.5,1.5,0,0,0-1.5,1.5v3A1.5,1.5,0,0,0,2.25,21h19.5a1.5,1.5,0,0,0,1.5-1.5v-3a1.5,1.5,0,0,0-1.5-1.5h-3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                                        Rename
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript: void(0);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="12" width="14" class="me-2"><g><line x1="1" y1="5" x2="23" y2="5" style="fill: none;stroke: currentColor;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5"/><path d="M14.25,1H9.75a1.5,1.5,0,0,0-1.5,1.5V5h7.5V2.5A1.5,1.5,0,0,0,14.25,1Z" style="fill: none;stroke: currentColor;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5"/><line x1="9.75" y1="17.75" x2="9.75" y2="10.25" style="fill: none;stroke: currentColor;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5"/><line x1="14.25" y1="17.75" x2="14.25" y2="10.25" style="fill: none;stroke: currentColor;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5"/><path d="M18.86,21.62A1.49,1.49,0,0,1,17.37,23H6.63a1.49,1.49,0,0,1-1.49-1.38L3.75,5h16.5Z" style="fill: none;stroke: currentColor;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.5px"/></g></svg>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                    
                            </tbody>
                        </table>
                    </div> <!-- / .table-responsive -->
                    <div class="card-footer">
                        <!-- Pagination -->
                        <ul class="pagination justify-content-end list-pagination mb-0"></ul>
                    </div>
                </div>
            </div>
        </div>
    <div>
</div>     