<?php
include_once "compon.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Compon::siteTitle("Contact Us"); ?></title>

    <?php Compon::stylesSheets(); ?>

    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>

    <main>

        <?php Compon::navbar(); ?>

        <!--projects section start-->
        <section class="projects section-padding">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <h2 class="mt-2 mb-3 text-center">Grant Details</h2>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="responsive-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 190px;" scope="col">Name of the Country</th>
                                        <th style="width: 310px;" scope="col">Name of the Funding organization</th>
                                        <th style="width: 140px;" scope="col">Name of the PI</th>
                                        <th scope="col">Project Name</th>
                                        <th  style="width: 100px;" scope="col">Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Canada</td>
                                        <td>SSHRC (Social Sciences and Humanities Research Council of Canada)</td>
                                        <td>David B. Tindall</td>
                                        <td>Social Networks and Climate Change Discourse, and the Role of Environmental Movements in Climate Change Policy Networks: An International Comparison</td>
                                        <td>2011-2016</td>
                                    </tr>
                                    <tr>
                                        <td>Canada</td>
                                        <td>SSHRC (Social Sciences and Humanities Research Council of Canada)</td>
                                        <td>Mark CJ Stoddart</td>
                                        <td>Canadian News Media and Climate Change Discourse Networks, 1997-2010</td>
                                        <td>2011-2014</td>
                                    </tr>
                                    <tr>
                                        <td>Canada</td>
                                        <td>Ocean Frontier Institute</td>
                                        <td>Paul Foley and Lorenzo Moro</td>
                                        <td>Future Ocean and Coastal Infrastructures (FOCI): Designing Safe, Sustainable and Inclusive Coastal Communities and Industries for Atlantic Canada</td>
                                        <td>2020-2023</td>
                                    </tr>
                                    <tr>
                                        <td>Finland</td>
                                        <td>Academy of Finland</td>
                                        <td>Tuomas Ylä-Anttila</td>
                                        <td>Echo Chambers, Experts and Activists: Networks of Mediated Political Communication (ECANET)</td>
                                        <td>2019-2022</td>
                                    </tr>
                                    <tr>
                                        <td>Finland</td>
                                        <td>Kone Foundation</td>
                                        <td>Tuomas Ylä-Anttila</td>
                                        <td>Scientific Information and Policy Networks in Climate Change Policy Making</td>
                                        <td>2019-2022</td>
                                    </tr>
                                    <tr>
                                        <td>Finland</td>
                                        <td>Academy of Finland</td>
                                        <td>Tuomas Ylä-Anttila</td>
                                        <td>Climate Change Policy Networks in World Society</td>
                                        <td>2020-2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--projects section end-->

    </main>

    <?php Compon::footer(); ?>
    <?php Compon::scripts(); ?>

</body>

</html>