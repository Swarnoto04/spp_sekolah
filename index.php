<?php

require_once __DIR__ . '/bootstrap.php';

$page = $_GET['page'] ?? false;

if (!checkAuth()) {

    redirect('/login.php');
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

    <div class="wrapper">

        <?php require __DIR__ . '/components/sidebar.php' ?>

        <div class="content-page">
            <div class="content">

                <?php require __DIR__ . '/components/topbar.php' ?>

                <div class="container-fluid">

                    <?php if ($page) { ?>

                        <?php if (file_exists(__DIR__ . '/pages/' . $page . '.php')) { ?>

                            <?php require_once __DIR__ . '/pages/' . $page . '.php' ?>

                        <?php } else { ?>

                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box">
                                            <div class="page-title-right">
                                                <ol class="breadcrumb m-0">
                                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                                    <li class="breadcrumb-item active">404</li>
                                                </ol>
                                            </div>
                                            <h4 class="page-title">404 Error</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4">
                                        <div class="text-center">

                                            <h1 class="text-error mt-4">404</h1>
                                            <h4 class="text-uppercase text-danger mt-3">Page Not Found</h4>
                                            <p class="text-muted mt-3">It's looking like you may have taken a wrong turn. Don't worry... it
                                                happens to the best of us. Here's a
                                                little tip that might help you get back on track.</p>

                                            <a class="btn btn-info mt-3" href="<?php echo APP_URL ?>"><i class="mdi mdi-reply"></i> Return Home</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <?php }  ?>

                    <?php } else { ?>

                        <?php require_once __DIR__ . '/pages/dashboard.php' ?>

                    <?php }  ?>

                </div>

            </div>

        </div>

    </div>

    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar>

            <div class="p-3">
                <div class="alert alert-warning" role="alert">
                    <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                </div>

                <!-- Settings -->
                <h5 class="mt-3">Color Scheme</h5>
                <hr class="mt-1" />

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                    <label class="form-check-label" for="light-mode-check">Light Mode</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                    <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                </div>

                <!-- Width -->
                <h5 class="mt-4">Width</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                    <label class="form-check-label" for="fluid-check">Fluid</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                    <label class="form-check-label" for="boxed-check">Boxed</label>
                </div>


                <!-- Left Sidebar-->
                <h5 class="mt-4">Left Sidebar</h5>
                <hr class="mt-1" />
                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                    <label class="form-check-label" for="default-check">Default</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                    <label class="form-check-label" for="light-check">Light</label>
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                    <label class="form-check-label" for="dark-check">Dark</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                    <label class="form-check-label" for="fixed-check">Fixed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                    <label class="form-check-label" for="condensed-check">Condensed</label>
                </div>

                <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                    <label class="form-check-label" for="scrollable-check">Scrollable</label>
                </div>

                <div class="d-grid mt-4">
                    <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                </div>
            </div>

        </div>
    </div>

    <div class="rightbar-overlay"></div>

    <!-- Bundle -->
    <script src="<?php echo APP_URL . '/assets/js/vendor.min.js' ?>"></script>
    <script src="<?php echo APP_URL . '/assets/js/app.min.js' ?>"></script>

</body>

</html>