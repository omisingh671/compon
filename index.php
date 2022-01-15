<?php
include_once "compon.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Compon::siteTitle("Climate Change Policy Networks"); ?></title>

    <?php Compon::stylesSheets(); ?>

    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>

    <main>

        <?php Compon::navbar(); ?>

        <!--hero section start-->
        <section class="hero-section" style="position: relative;">
            <img style="max-width: 100%;" src="images/bg1.jpg" />
            <div class="overlay"></div>
        </section>
        <!--hero section end-->

        <!--about section start-->
        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3 text-center uppercase">Comparing Climate Change Policy Networks<br />compon</h2>
                        <p class="mb-2 text-center">Research focussing on meso-level policy networks sheds light on what organizations exert influence on policy making</p>

                        <div class="text-center mt-3"><a class="btn btn-primary text-center" href="about.php">About Compon</a></div>
                    </div>

                </div>
            </div>
        </section>
        <!--about section end-->

        <!--publications start-->
        <section class="publications section-padding" id="publications">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-4 text-center">Most Recent Publications</h2>
                    </div>
                    <?php
                        $p_fields = "*";
                        $p_condition = "`id`!='' AND `status`='published' ORDER BY `orderno` ASC";
                        $publications = Compon::getPublications($p_fields, $p_condition);
                        
                        if(sizeof($publications) > 0){
                            foreach($publications as $publication){
                                ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="news-card card mb-3">
                                        <h6>
                                            <a target="_blank" href="<?php echo $publication["publicationlink"]; ?>">
                                                <?php echo $publication["title"]; ?>
                                            </a>
                                        </h6>
                                        <div class="news-year">
                                            <span class="badge bg-danger"><?php echo $publication["year"]; ?></span>
                                        </div>
                                        <div class="news-journal">
                                            <em><?php echo $publication["journal"]; ?></em></div>

                                        <div class="news-authors">
                                            <strong>Authors:</strong> <?php echo $publication["authors"]; ?>
                                        </div>
                                        <a class="custom-link" href="<?php echo $publication["publicationlink"]; ?>">Read More</a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else{
                            ?><div class="col-12"><div class="card"><h6 class="text-center">No Publication found!</h6></div></div><?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <!--publications end-->

        <!--steering committee section start-->
        <section class="case-teams section-padding" id="case-teams">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-4 text-center">Steering Committee</h2>
                    </div>

                    <div class="col-lg-4 col-sm-6 team-box-wrapper mb-3">
                        <div class="team-box">
                            <img class="team-image" src="images/teams/jeffery.png" />
                            <h3 class="text-center">Jeffrey Broadbent</h3>
                            <p class="text-center">University of Minnesota</p>
                            <p class="text-center">United States</p>

                            <ul class="team-links list-unstyled d-flex justify-content-evenly">
                                <li><a href="javascript:void(0);" class="social-icon-link bi-twitter"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-linkedin"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-arrow-up-right-square"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 team-box-wrapper mb-3">
                        <div class="team-box">
                            <img class="team-image" src="images/teams/tuomas.png" />
                            <h3 class="text-center">Tuomas Ylä-Anttila</h3>
                            <p class="text-center">University of Helsinki</p>
                            <p class="text-center">Finland</p>

                            <ul class="team-links list-unstyled d-flex justify-content-evenly">
                                <li><a href="javascript:void(0);" class="social-icon-link bi-twitter"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-linkedin"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-arrow-up-right-square"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 team-box-wrapper mb-3">
                        <div class="team-box">
                            <img class="team-image" src="images/teams/pradeep.png" />
                            <h3 class="text-center">Pradip Swarnakar</h3>
                            <p class="text-center">Indian Institute of Technology Kanpur</p>
                            <p class="text-center">India</p>

                            <ul class="team-links list-unstyled d-flex justify-content-evenly">
                                <li><a href="javascript:void(0);" class="social-icon-link bi-twitter"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-linkedin"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-arrow-up-right-square"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 team-box-wrapper">
                        <div class="team-box">
                            <img class="team-image" src="images/teams/antti.png" />
                            <h3 class="text-center">Antti Gronow</h3>
                            <p class="text-center">University of Helsinki</p>
                            <p class="text-center">Finland</p>

                            <ul class="team-links list-unstyled d-flex justify-content-evenly">
                                <li><a href="javascript:void(0);" class="social-icon-link bi-twitter"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-linkedin"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-arrow-up-right-square"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 team-box-wrapper">
                        <div class="team-box">
                            <img class="team-image" src="images/teams/keiichi.png" />
                            <h3 class="text-center">Keiichi Satoh</h3>
                            <p class="text-center">Hitotsubashi University</p>
                            <p class="text-center">Japan</p>

                            <ul class="team-links list-unstyled d-flex justify-content-evenly">
                                <li><a href="javascript:void(0);" class="social-icon-link bi-twitter"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-linkedin"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-arrow-up-right-square"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 team-box-wrapper">
                        <div class="team-box">
                            <img class="team-image" src="images/teams/marlene.png" />
                            <h3 class="text-center">Marlene Kammerer</h3>
                            <p class="text-center">Universität Bern</p>
                            <p class="text-center">Switzerland</p>

                            <ul class="team-links list-unstyled d-flex justify-content-evenly">
                                <li><a href="javascript:void(0);" class="social-icon-link bi-twitter"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-linkedin"></a></li>
                                <li><a href="javascript:void(0);" class="social-icon-link bi-arrow-up-right-square"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--steering committee section end-->
    </main>

    <?php Layout::footer(); ?>
    <?php Layout::scripts(); ?>

</body>

</html>