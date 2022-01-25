<?php include_once
"../compon.php";
Compon::isAdmin();
?>

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
            <?php Compon::adminNavbar(); ?>
        </div>
        <div class="main-content d-flex flex-column align-items-stretch bg-white">

            <!--page header start-->
            <div class="container-fluid border-bottom border-secondary mb-2 dash-header-wrapper d-flex align-items-center">
                <div class="row">
                    <div class="col-12">
                        <div class="dash-header pb-2">
                            <h2>Dashboard</h2>
                            <p>Comparing Climate Change Policy Networks (COMPON)</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--page header end-->

            <!--page content wrapper start-->
            <div class="scrollarea">
                <!--page content wrapper start-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 justify-content-center">
                            
                        </div>
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