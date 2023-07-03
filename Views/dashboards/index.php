<!-- Title -->
<h1 class="h2">
    Dashboard
</h1>
<h1 class="h2 d-flex align-items-center justify-content-between">
    <span>
        My panel
        <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#taskModal" id="btnAddTask">Add New Element</button>
    </span>
</h1>
                
<div class="row">
    <div class="col-xxl">
        <div class="row">
            <div class="col-md-6">

                <!-- Card -->
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-between">

                                <div>
                                    <!-- Title -->
                                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                        <span class="legend-circle-sm bg-success"></span>
                                        Total projets
                                    </h5>
        
                                    <!-- Subtitle -->
                                    <h2 class="mb-0">
                                        <?= count($projects) ?>
                                    </h2>

                                    <!-- Comment -->
                                    <p class="fs-6 text-muted mb-0">
                                        projets
                                    </p>
                                </div>

                                <span class="text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 0 512 512" width="32px" class="my-icon" ><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 60.7 28.7 32 64 32H196.1c19.1 0 37.4 7.6 50.9 21.1L289.9 96H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V160c0-8.8-7.2-16-16-16H286.6c-10.6 0-20.8-4.2-28.3-11.7L213.1 87c-4.5-4.5-10.6-7-17-7H64z"/></svg>
                                </span>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>
        
            <div class="col-md-6">
                <!-- Card -->
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-between">

                                <div>
                                    <!-- Title -->
                                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                        <span class="legend-circle-sm bg-danger"></span>
                                        total task
                                    </h5>

                                    <!-- Subtitle -->
                                    <h2 class="mb-0">
                                    <?= count($projects) ?>
                                    </h2>

                                    <!-- Comment -->
                                    <p class="fs-6 text-muted mb-0 text-truncate">
                                        tasks
                                    </p>
                                </div>
        
                                <span class="text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 0 512 512" class="my-icon"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                </span>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>        
        </div> <!-- / .row -->
    </div>

</div> <!-- / .row -->
<div class="row">
    <div class="col-xxl">
        <div class="row">
            <div class="col-md-6">

                <!-- Card -->
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-between">

                                <div>
                                    <!-- Title -->
                                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                        <span class="legend-circle-sm bg-success"></span>
                                        Staffs
                                    </h5>

                                    <!-- Subtitle -->
                                    <h2 class="mb-0">
                                    <?= count($staffs) ?>
                                    </h2>

                                    <!-- Comment -->
                                    <p class="fs-6 text-muted mb-0 text-truncate">
                                        staffs
                                    </p>
                                </div>

                                <span class="text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 0 448 512" class="my-icon"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
                                </span>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Card -->
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-flex justify-content-between">

                                <div>
                                    <!-- Title -->
                                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                                        <span class="legend-circle-sm bg-danger"></span>
                                        Customers
                                    </h5>

                                    <!-- Subtitle -->
                                    <h2 class="mb-0">
                                        67
                                    </h2>

                                    <p class="fs-6 text-muted mb-0 text-truncate">
                                        customers
                                    </p>
                                </div>

                                <span class="text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 0 448 512" class="my-icon"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z"/></svg>
                                </span>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>
            </div>        
        </div> <!-- / .row -->
    </div>

</div> <!-- / .row -->