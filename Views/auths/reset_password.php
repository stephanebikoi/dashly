<div class="row align-items-center justify-content-center">
    <div class="col-md-7 col-lg-6 col-xl-5 px-lg-4 px-xl-8 d-flex flex-column vh-100 py-6">

        <!-- Brand -->
        <a class="navbar-brand mb-auto" href="index.html">
                <img src="https://d33wubrfki0l68.cloudfront.net/ba6b91b7d508187d153e48318c22d0773a9cedfc/36afa/assets/images/logo.svg" class="navbar-brand-img logo-light logo-large" alt="..." width="125" height="25">
                <img src="https://d33wubrfki0l68.cloudfront.net/55307694d1a6b107d2d87c838a1aaede85cd3d84/66f18/assets/images/logo-dark.svg" class="navbar-brand-img logo-dark logo-large" alt="..." width="125" height="25">
        </a>

        <div>
            <!-- Title -->
            <h1 class="mb-2">
                Forgot password?
            </h1>

            <!-- Subtitle -->
            <p class="text-secondary">
                Enter your login and email address and we'll send you<br class="d-none d-lg-block">an email with instructions to reset your password
            </p>

            <!-- Form -->
            <form action="/auths/reset" method="POST">

                <div class="mb-4">

                    <!-- Label -->
                    <label class="form-label">
                        Login
                    </label>

                    <!-- Input -->
                    <input type="text" class="form-control" placeholder="Enter your login" name="login">
                </div>

                <div class="mb-4">

                    <!-- Label -->
                    <label class="form-label">
                        Email Address
                    </label>

                    <!-- Input -->
                    <input type="email" class="form-control" placeholder="Enter your email address" name="email">
                </div>

                <!-- Button -->
                <button type="submit" class="btn btn-primary mt-3">
                    Reset password
                </button>
            </form>
        </div>

        <div class="mt-auto">

            <!-- Link -->
            <small class="mb-0 text-muted">
                Back to <a href="/auths/login" class="fw-semibold">Sign in</a>
            </small>
        </div>
        
    </div>

    <div class="col-md-5 col-lg-6 col-xl-7 d-none d-lg-block">

        <!-- Image -->
        <div class="bg-size-cover bg-position-center bg-repeat-no-repeat overlay overlay-dark overlay-50 vh-100 me-n4" style="background-image: url(/img/sign-in-cover.jpg);"></div>
    </div>
</div> <!-- / .row -->