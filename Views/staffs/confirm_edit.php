<div class="row">
    <div class="col">
        <!-- Card -->
        <div class="card border-0 scroll-mt-3" id="basicInformationSection">
            <div class="card-header">
                <h2 class="h3 mb-0">staff information</h2>
            </div>
            <form action="/staffs/confirm/<?= $staff->id ?>" method="POST" class="needs-validation" novalidate>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="login" class="col-form-label">New password</label>
                        </div>

                        <div class="col-lg">
                            <input type="password" class="form-control" id="password" value="" name="password" required>
                            <div class="invalid-feedback">Please add new password </div>
                        </div>
                    
                    </div> <!-- / .row -->

                    <div class="row mb-4">
                        <div class="col-lg-3">
                            <label for="password_confirm" class="col-form-label">confirm password</label>
                        </div>

                        <div class="col-lg">
                            <input type="password" class="form-control" id="password_confirm" value="" name="password_confirm" required>
                            <div class="invalid-feedback">Please confirm the password </div>
                        </div>
                    </div> <!-- / .row -->
                    <div class="d-flex justify-content-end mt-5">
                        <!-- Button -->
                        <button type="submit" class="btn btn-primary">Save change</button>
                    </div>
                </div>
            </from>
        </div>
    </div>
</div>