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
    <section class="dashboard" id="dashboard" class="d-flex">
        <div class="admin-sidebar">
            <div id="admin-navbar" class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark">

                <a href="index.php" class="d-flex justify-content-center text-decoration-none d-title">
                    Compon
                </a>

            </div>
        </div>
        <div class="main-content d-flex flex-column align-items-stretch bg-white">

            <!--page header start-->
            <div class="container-fluid border-bottom mb-2 dash-header-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="dash-header pb-2">
                            <h2>Compon Dashboard</h2>
                            <p>Comparing Climate Change Policy Networks Compon</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--page header end-->

            <?php
            // $publications = Compon::auth("admin", "amar@compon");
            // echo "<pre>" . var_dump($publications) . "</pre>";
            // echo $publications[0]["username"]."<br />";
            // echo sizeof($publications);
            ?>
            <!--page content wrapper start-->
            <div class="scrollarea">
                <!--page content wrapper start-->
                <div class="rounded d-flex justify-content-center" style="width: 100%;">
                    <div class="col-lg-6 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Sign In</h3>
                        </div>
                        <form action="forms.php" method="post" enctype="multipart/form-data" name="auth-form">
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
                                <p style="margin-top: 30px;" class="text-center2"><a class="text-primary" href="javascript:void(0);">Forgot your password?</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!--page content wrapper end-->
            </div>
            <!--page content wrapper end-->

        </div>
    </section>

    <?php Compon::adminScripts(); ?>

</body>

</html>