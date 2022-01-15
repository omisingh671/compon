<?php
include_once "compon.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Compon::siteTitle("About Us"); ?></title>

    <?php Compon::stylesSheets(); ?>

    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>

    <main>

        <?php Compon::navbar(); ?>

        <!--about section start-->
        <section class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mt-2 mb-3 text-center">About COMPON</h2>

                        <p class="text-center"><strong>Comparing Climate Change Policy Networks (COMPON):</strong></p>

                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Why do some countries enact more ambitious climate change policies than others? The United Nations has strived to create global norms to reduce emissions, but we do not know enough about why countries vary so widely in their adherence to these norms.</p>

                        <p>Macro level economic and political structures, such as the economic weight of fossil fuel industries, play an important role in shaping national policies. But the process by which such macro-structural factors translate into political power and national climate change policies can be analyzed through focussing on meso level policy networks. The COMPON project studies climate change policy networks and media discourse networks in twenty countries.</p>

                        <p>Research focussing on meso-level policy networks sheds light on what organizations exert influence on policymaking, what beliefs they carry, what kind of coalitions these organizations form to push for their agenda, how they are connected to state organizations and how their opponents are organized. Identifying these actor constellations makes it possible to assess the prospects of change towards less carbon intensive societies.</p>

                        <p>The COMPON project is modular; if you are interested in doing the policy network survey in your own country and jointly analyzing it in comparison to other case countries, contact any of the board members listed below. More detailed information on the project can be found in this article Climate change policy networks: Why and how to compare them across countries (open access). https://doi.org/10.1016/j.erss.2018.06.020</p>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <h2 class="mt-4 mb-3 text-center">Funding Institutions</h2>
                    </div>
                </div>
                <div class="row funding-institutions">
                    <div class="col-lg-3 col-sm-6">
                        <img class="img-fluid img-thumbnail" src="images/fi/nsf_logo.png" />
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <img class="img-fluid img-thumbnail" src="images/fi/iitk-logo.png" />
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <img class="img-fluid img-thumbnail" src="images/fi/ofi-logo.png" />
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <img class="img-fluid img-thumbnail" src="images/fi/sshrc-logo.png" />
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <img class="img-fluid img-thumbnail" src="images/fi/kone-foundation-logo.png" />
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <img class="img-fluid img-thumbnail" src="images/fi/academy-of-finland-logo.png" />
                    </div>
                </div>
            </div>
        </section>
        <!--about section end-->

    </main>

    <?php Compon::footer(); ?>
    <?php Compon::scripts(); ?>

</body>

</html>