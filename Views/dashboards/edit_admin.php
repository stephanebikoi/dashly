<div class="row">
    <div class="col">
        <!-- Card -->
        <div class="card border-0 scroll-mt-3" id="basicInformationSection">
            <div class="card-header">
                <h2 class="h3 mb-0">Admin information</h2>
            </div>
            <form action="/dashboards/confirm_edit" method="POST" class="needs-validation" novalidate>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="login" class="col-form-label">Login</label>
                        </div>

                        <div class="col-lg">
                            <input type="text" class="form-control" id="login" value="" name="login" required>
                            <div class="invalid-feedback">Please add login </div>
                        </div>
                    
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="password" class="col-form-label">Password</label>
                        </div>

                        <div class="col-lg">
                            <input type="password" class="form-control" id="password" value="" name="password" required>
                            <div class="invalid-feedback">Please add the password </div>
                        </div>
                    </div> <!-- / .row -->
                    <div class="d-flex justify-content-end mt-5">
                        <!-- Button -->
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </from>
        </div>
    </div>
</div>