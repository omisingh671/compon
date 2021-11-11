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
                    <h2>Compon Dashboard</h2>
                    <p>Comparing Climate Change Policy Networks Compon</p>
                </div>
            </div>
            <!--page header end-->

            <!--page content wrapper start-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <?php
                        $publications = Compon::getPublications("*", "status='published' ORDER BY orderno ASC");
                        echo "<pre>".var_dump($publications)."</pre>";
                        ?>
                    </div>
                </div>
            </div>
            <!--page content wrapper end-->
        </div>
    </section>

    <?php Compon::adminScripts(); ?>

</body>

</html>