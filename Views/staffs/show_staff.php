<div class="d-flex align-items-baseline justify-content-between">
                    
    <!-- Title -->
    <h1 class="h2">
        Staff detail
    </h1>
    <div class="dropdown d-flex align-items-center justify-content-center id="themeSwitcher">
        <h1 class="h2 d-flex align-items-center justify-content-between">
            <span>
            <a class="btn btn-sm btn-primary ms-4" href="/staffs/form_staff">Add New staff</a>
            </span>
        </h1>

    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Staffs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Staff details </li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-xl-9 d-flex">
        <!-- Card -->
        <div class="card border-0 flex-fill w-100">
            <div class="card-body p-7">
                <div class="row align-items-center h-100">
                    <div class="col-auto d-flex ms-auto ms-md-0">
                        
                        <?php if(empty($staf->profil)) {
                            $a = strtoupper(substr($staf->firstname, 0, 1));
                            $b = strtoupper(substr($staf->lastname, 0, 1)); ?>
                            <div class="avatar avatar-circle avatar-xxl">
                                <span class="avatar-title text-bg-danger-soft" style="color: purple; width:112px; height:112px;"><?= $a.$b ?></span>
                            </div>
                        <?php } else { ?>
                            <div class="avatar avatar-circle avatar-avatar-xxl">
                                <img src="/img/staffs/<?= $staf->profil ?>" alt="Profile picture" class="avatar-img" width="40" height="40">
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                        $posteModel = new App\Models\PostesModel;
                        $onposte = $posteModel->find( $staf->role);

                        $functionModel = new App\Models\FonctionsModel;
                        $onfunction = $functionModel->find( $staf->function);
                    ?>
                    <div class="col-auto me-auto d-flex flex-column">
                        <h3 class="mb-0"><?= $staf->firstname. ' ' . $staf->otherfirstname . ' ' . $staf->lastname ?></h3>
                        <span class="small text-secondary fw-semibold">staf function : <?= $onfunction->name ?></span>
                        <span class="small text-secondary fw-semibold">staf poste : <?= $onposte->name ?></span>
                    </div>

                    <div class="col-12 col-md-auto ms-auto text-center mt-8 mt-md-0">
                        <div class="hstack d-inline-flex gap-6">
                            <div>
                                <h4 class="h2 mb-0"><?= empty($staf->staffevaluation) ? 0 : $staf->staffevaluation ?></h4>
                                <p class="text-secondary mb-0">staff evaluation</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>
</div> <!-- / .row -->

<hr>

<div class="tab-content pt-6" id="userTabContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <div class="col-xl-4 col-xxl-3">

                <!-- Card -->
                <div class="card border-0">
                    <div class="card-header border-0">
                
                        <!-- Title -->
                        <h2 class="card-header-title h4 text-uppercase mb-3">
                            Profile
                        </h2>
                    </div>

                    <div class="card-body pt-0">
                        <h3 class="h6 small text-secondary text-uppercase mb-3">About</h3>

                        <ul class="list-unstyled mb-7">
                            <li class="py-2">
                                <svg viewBox="0 0 24 24" height="18" width="18" class="me-2" xmlns="http://www.w3.org/2000/svg"><path d="M21.476,23.25a10.483,10.483,0,0,0-18.952,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M12,5.25A5.251,5.251,0,0,1,6.75,10.5a5.25,5.25,0,0,0,10.5,0A5.25,5.25,0,0,1,12,5.25Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M17.836,19.027a14.576,14.576,0,0,0,3.391-1.007,1.5,1.5,0,0,0,.763-1.961l-1.376-3.21a4.5,4.5,0,0,1-.364-1.773V9A8.25,8.25,0,0,0,3.75,9v2.076a4.5,4.5,0,0,1-.364,1.773L2.01,16.059a1.5,1.5,0,0,0,.763,1.961,14.576,14.576,0,0,0,3.391,1.007" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                <?= $staf->firstname. ' ' . $staf->otherfirstname . ' ' . $staf->lastname ?>
                            </li>
                            <li class="py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="18" width="18" class="me-2"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M23.25 9.00001V4.65001C23.2501 4.35016 23.1602 4.05718 22.9922 3.80888C22.8241 3.56058 22.5854 3.36835 22.307 3.25701L16.307 0.857006C15.9494 0.714006 15.5506 0.714006 15.193 0.857006L8.80701 3.41201C8.44944 3.55501 8.05058 3.55501 7.69301 3.41201L1.77901 1.04601C1.6649 1.00027 1.5413 0.983292 1.41909 0.996554C1.29687 1.00982 1.17979 1.05292 1.07815 1.12206C0.97651 1.1912 0.893422 1.28427 0.836202 1.39308C0.778981 1.50188 0.749382 1.62308 0.75001 1.74601V16.119C0.74996 16.4189 0.839775 16.7118 1.00786 16.9601C1.17595 17.2084 1.4146 17.4007 1.69301 17.512L7.69301 19.912C8.05058 20.055 8.44944 20.055 8.80701 19.912L11.688 18.759"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 3.519V20.019"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 0.75V8.25"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.75 11.324C19.9435 11.324 21.0881 11.7981 21.932 12.642C22.7759 13.4859 23.25 14.6305 23.25 15.824C23.25 17.745 20.562 21.4 19.341 22.962C19.2709 23.0518 19.1812 23.1244 19.0788 23.1743C18.9764 23.2243 18.8639 23.2502 18.75 23.2502C18.6361 23.2502 18.5236 23.2243 18.4212 23.1743C18.3188 23.1244 18.2291 23.0518 18.159 22.962C16.938 21.401 14.25 17.745 14.25 15.824C14.25 14.6305 14.7241 13.4859 15.568 12.642C16.4119 11.7981 17.5565 11.324 18.75 11.324Z"/><path stroke="currentColor" stroke-width="1.5" d="M18.75 16.2C18.5429 16.2 18.375 16.0321 18.375 15.825C18.375 15.6179 18.5429 15.45 18.75 15.45"/><path stroke="currentColor" stroke-width="1.5" d="M18.75 16.2C18.9571 16.2 19.125 16.0321 19.125 15.825C19.125 15.6179 18.9571 15.45 18.75 15.45"/></svg>
                                <?= $staf->address ?>
                            </li>
                            <li class="py-2">
                                <i class="fa fa-birthday-cake me-2" aria-hidden="true"></i>
                                <?= $staf->dateofbirth ?>
                            </li>
                        </ul>

                        <h3 class="h6 small text-secondary text-uppercase mb-3">Contacts</h3>

                        <ul class="list-unstyled mb-7">
                            <li class="py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="18" width="18" class="me-2"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.285 2.24H4.274C3.27412 2.46215 2.37995 3.01876 1.73921 3.81786C1.09847 4.61696 0.749519 5.61074 0.75 6.635V7.525C0.75 7.92282 0.908036 8.30436 1.18934 8.58566C1.47064 8.86696 1.85218 9.025 2.25 9.025H6C6.39783 9.025 6.77936 8.86696 7.06066 8.58566C7.34197 8.30436 7.5 7.92282 7.5 7.525V7.525C7.5 7.12718 7.65804 6.74564 7.93934 6.46434C8.22064 6.18304 8.60218 6.025 9 6.025H15C15.3978 6.025 15.7794 6.18304 16.0607 6.46434C16.342 6.74564 16.5 7.12718 16.5 7.525C16.5 7.92282 16.658 8.30436 16.9393 8.58566C17.2206 8.86696 17.6022 9.025 18 9.025H21.75C22.1478 9.025 22.5294 8.86696 22.8107 8.58566C23.092 8.30436 23.25 7.92282 23.25 7.525V6.635C23.25 5.61108 22.9009 4.61777 22.2602 3.81908C21.6195 3.02039 20.7255 2.46408 19.726 2.242H19.715C14.6191 1.25482 9.38116 1.25414 4.285 2.24V2.24Z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 12.025V18.025C3.75 19.2185 4.22411 20.3631 5.06802 21.207C5.91193 22.0509 7.05653 22.525 8.25 22.525H15.75C16.9435 22.525 18.0881 22.0509 18.932 21.207C19.7759 20.3631 20.25 19.2185 20.25 18.025V12.025"/><path stroke="currentColor" stroke-width="1.5" d="M7.875 14.275C7.66789 14.275 7.5 14.1071 7.5 13.9C7.5 13.6929 7.66789 13.525 7.875 13.525"/><path stroke="currentColor" stroke-width="1.5" d="M7.875 14.275C8.08211 14.275 8.25 14.1071 8.25 13.9C8.25 13.6929 8.08211 13.525 7.875 13.525"/><path stroke="currentColor" stroke-width="1.5" d="M7.875 18.025C7.66789 18.025 7.5 17.8571 7.5 17.65C7.5 17.4429 7.66789 17.275 7.875 17.275"/><path stroke="currentColor" stroke-width="1.5" d="M7.875 18.025C8.08211 18.025 8.25 17.8571 8.25 17.65C8.25 17.4429 8.08211 17.275 7.875 17.275"/><path stroke="currentColor" stroke-width="1.5" d="M12 14.275C11.7929 14.275 11.625 14.1071 11.625 13.9C11.625 13.6929 11.7929 13.525 12 13.525"/><path stroke="currentColor" stroke-width="1.5" d="M12 14.275C12.2071 14.275 12.375 14.1071 12.375 13.9C12.375 13.6929 12.2071 13.525 12 13.525"/><g><path stroke="currentColor" stroke-width="1.5" d="M12 18.025C11.7929 18.025 11.625 17.8571 11.625 17.65C11.625 17.4429 11.7929 17.275 12 17.275"/><path stroke="currentColor" stroke-width="1.5" d="M12 18.025C12.2071 18.025 12.375 17.8571 12.375 17.65C12.375 17.4429 12.2071 17.275 12 17.275"/></g><g><path stroke="currentColor" stroke-width="1.5" d="M16.125 14.275C15.9179 14.275 15.75 14.1071 15.75 13.9C15.75 13.6929 15.9179 13.525 16.125 13.525"/><path stroke="currentColor" stroke-width="1.5" d="M16.125 14.275C16.3321 14.275 16.5 14.1071 16.5 13.9C16.5 13.6929 16.3321 13.525 16.125 13.525"/></g><g><path stroke="currentColor" stroke-width="1.5" d="M16.125 18.025C15.9179 18.025 15.75 17.8571 15.75 17.65C15.75 17.4429 15.9179 17.275 16.125 17.275"/><path stroke="currentColor" stroke-width="1.5" d="M16.125 18.025C16.3321 18.025 16.5 17.8571 16.5 17.65C16.5 17.4429 16.3321 17.275 16.125 17.275"/></g></svg>                                                  
                                <?= $staf->phone ?>
                            </li>
                            <li class="py-2">
                                <svg viewBox="0 0 24 24" height="18" width="18" class="me-2" xmlns="http://www.w3.org/2000/svg"><path d="M17.25,12A5.25,5.25,0,1,1,12,6.75,5.25,5.25,0,0,1,17.25,12Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path d="M17.25,12v2.25a3,3,0,0,0,6,0V12a11.249,11.249,0,1,0-4.5,9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                <?= $staf->email ?>
                            </li>
                        </ul>
                        <h3 class="h6 small text-secondary text-uppercase mb-3">Teams</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18" class="me-2"><defs><style>.a,.b,.c{fill:none;stroke:currentColor;stroke-width:1.5px;}.a,.b{stroke-miterlimit:10;}.b,.c{stroke-linecap:round;}.c{stroke-linejoin:round;}</style></defs><rect class="a" x="0.75" y="1.25" width="22.5" height="21.5" rx="1"/><line class="a" x1="8.75" y1="1.25" x2="8.75" y2="22.75"/><line class="b" x1="3.25" y1="5.75" x2="6.25" y2="5.75"/><line class="b" x1="12.81" y1="10.577" x2="18.53" y2="10.577"/><line class="b" x1="3.25" y1="10.25" x2="6.25" y2="10.25"/><line class="b" x1="3.25" y1="14.75" x2="6.25" y2="14.75"/><rect class="c" x="12.81" y="4.275" width="5.72" height="3.5"/><line class="b" x1="12.81" y1="19.986" x2="18.53" y2="19.986"/><rect class="c" x="12.81" y="13.75" width="5.72" height="3.5"/></svg>
                                Working on 6 projects
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">

                <!-- Card -->
                <div class="card border-0">
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th class="w-50">Category</th>
                                    <th class="w-50">Description</th>
                                    <th class="w-150px text-end">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($projects as $project): 
                                    $categoryModel = new App\Models\CategoriesModel;
                                    $oncategory = $categoryModel->find($project->category);
                                    ?>
                                    <tr>
                                        <td><?= $project->id ?></td>
                                        <td><?= $project->name ?></td>
                                        <td><?= $oncategory->name?></td>
                                        <td><?= substr($project->description, 0 , 80) . ' ...' ?></td>
                                        <td class="date" data-signed="1627858800">
                                            <a class="p-3" href="/projects/show_project/<?= $project->id ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </td>
                            </tr>
                        <?php endforeach?>
                            
                            </tbody>
                        </table>
                    </div> <!-- / .table-responsive -->
                </div>

                <!-- Card -->
                <div class="card border-0">
                    <div class="card-header border-0 card-header-space-between">
                
                        <!-- Title -->
                        <h2 class="card-header-title h4 text-uppercase">
                            Tasks
                        </h2>
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
                            
                            </tbody>
                        </table>
                    </div> <!-- / .table-responsive -->
                </div>

                <div class="card border-0">
                    <div class="card-header border-0 card-header-space-between">
                
                        <!-- Title -->
                        <h2 class="card-header-title h4 text-uppercase">
                            Files
                        </h2>
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
                            
                            </tbody>
                        </table>
                    </div> <!-- / .table-responsive -->
                </div>
            </div>
        </div> <!-- / .row -->
    </div>
</div>
