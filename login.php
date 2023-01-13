<?php

require_once __DIR__ . '/bootstrap.php';

if (checkAuth()) {

    redirect();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App CSS -->
    <link href="<?php echo APP_URL . '/assets/css/icons.min.css' ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo APP_URL . '/assets/css/app.min.css' ?>" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?php echo APP_URL . '/assets/css/app-dark.min.css' ?>" rel="stylesheet" type="text/css" id="dark-style" />

    <title><?php echo APP_NAME ?></title>

</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email address and password to access admin panel.
                                </p>
                            </div>

                            <form action="<?php echo APP_URL . '/actions/login.php' ?>" method="POST">

                                <div class="mb-3">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Bundle -->
    <script src="<?php echo APP_URL . '/assets/js/vendor.min.js' ?>"></script>
    <script src="<?php echo APP_URL . '/assets/js/app.min.js' ?>"></script>

</body>

</html>