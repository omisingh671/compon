<?php include_once "../compon.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Compon::siteTitle("Climate Change Policy Networks"); ?></title>

    <?php Compon::adminStylesSheets(); ?>

    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>
    <section id="dashboard" class="d-flex">
        <div class="sidebar">
            <?php Compon::adminNavbar(); ?>
        </div>
        <div class="main-content">

            <!--page header start-->
            <div class="admin-page-header">
                <div class="dash-header">
                    <h2>Compon :: Admin Login</h2>
                    <p>Please login first to proceed further.</p>
                </div>
            </div>
            <!--page header end-->

            <!--page content wrapper start-->
            <div class="container-fluid d-flex align-items-center" style="height:calc(100vh - 80px) !important;">
                <div class="rounded d-flex justify-content-center" style="width: 100%;">
                    <div class="col-lg-6 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Sign In</h3>
                        </div>
                        <form action="../handle-requests.php" method="post" enctype="multipart/form-data" name="auth-form">
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <button class="btn btn-primary text-center mt-2" type="submit" name="auth" value="auth">
                                    Login
                                </button>
                                <p style="margin-top: 30px;" class="text-center2"><a class="text-primary" href="password-reset.php">Forgot your password?</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--page content wrapper end-->
        </div>
    </section>

    <?php Compon::adminScripts(); ?>

</body>

</html>