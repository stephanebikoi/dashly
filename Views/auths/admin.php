<div class="row align-items-center justify-content-center">
    <div class="col-md-7 col-lg-6 px-lg-4 px-xl-8 d-flex flex-column vh-100 py-6">

        <!-- Brand -->
        <a class="navbar-brand mb-auto" href="index.html">
                <img src="https://d33wubrfki0l68.cloudfront.net/ba6b91b7d508187d153e48318c22d0773a9cedfc/36afa/assets/images/logo.svg" class="navbar-brand-img logo-light logo-large" alt="..." width="125" height="25">
                <img src="https://d33wubrfki0l68.cloudfront.net/55307694d1a6b107d2d87c838a1aaede85cd3d84/66f18/assets/images/logo-dark.svg" class="navbar-brand-img logo-dark logo-large" alt="..." width="125" height="25">
        </a>

        <div>
            <!-- Title -->
            <h1 class="mb-2">
                Sign In
            </h1>

            <!-- Subtitle -->
            
            <?php if (isset($_SESSION['errors'])) {  ?>
                <p class="text-secondary"> your login or password is incorrect</p>   
            <?php } else { ?>
                <p class="text-secondary">
                    Enter your login and password to access in your pannel
                </p>
            <?php } ?>
            <?php session_destroy() ?>
            <!-- Form -->
            <form action="/auths/commect_admin" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">

                            <!-- Label -->
                            <label class="form-label">
                                Login
                            </label>

                            <!-- Input -->
                            <input type="text" class="form-control" placeholder="Your login" required name="login">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Password -->
                        <div class="mb-4">

                            <div class="row">
                                <div class="col">

                                    <!-- Label -->
                                    <label class="form-label">
                                        Password
                                    </label>
                                </div>

                                <div class="col-auto">
                                                    
                                    <!-- Help text -->
                                    <a href="reset-password-cover.html" class="form-text small text-muted link-primary">Forgot password</a>
                                </div>
                            </div> <!-- / .row -->

                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="password" class="form-control" autocomplete="off" data-toggle-password-input placeholder="Your password" required name="password">
                                
                                <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password></button>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .row -->

                <div class="form-check">

                    <!-- Input -->
                    <input type="checkbox" class="form-check-input" id="remember">

                    <!-- Label -->
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                <!-- Button -->
                <button type="submit" class="btn btn-primary mt-3">
                    Sign in
                </button>
            </form>
        </div>

        <div class="mt-auto">

            <!-- Link -->
            <small class="mb-0 text-muted">
                Connect with other account <a href="/auths/login" class="fw-semibold">Sign up</a>
            </small>
        </div>
                
        </div>

        <div class="col-md-5 col-lg-6 d-none d-lg-block">

        <!-- Image -->
            <div class="bg-size-cover bg-position-center bg-repeat-no-repeat overlay overlay-dark overlay-50 vh-100 me-n4" style="background-image: url(/img/sign-in-cover.jpg);"></div>
        </div>
    </div>
</div>