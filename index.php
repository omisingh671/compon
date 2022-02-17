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

<body id="home">

    <main>

        <?php Compon::navbar(); ?>

        <!--hero section start-->
        <section class="hero-section" style="position: relative;">
            <img style="max-width: 100%;" src="images/bg-main.jpg" />
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
                        $p_condition = "`id`!='' AND `status`='published' AND `isfeatured`='1' ORDER BY `orderno` ASC LIMIT 0, 6";
                        $publications = Compon::getPublications($p_fields, $p_condition);
                        
                        if(sizeof($publications) > 0){
                            foreach($publications as $publication){
                                $country_arr = explode(", ", $publication["country"]);
                                ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="news-card card mb-3">
                                        <div class="ct-country-wrapper">
                                            <?php
                                            if(sizeof($country_arr) > 0){
                                                foreach($country_arr as $country){
                                                    ?><span class="country badge bg-secondary me-1 mb-1"><?php echo ucwords($country); ?></span><?php
                                                }
                                            }
                                            else{
                                                ?><span class="country badge bg-secondary">N/A</span><?php
                                            }
                                            ?>
                                        </div>
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
                    <?php
                    $tm_fields = "*";
                    $tm_condition = "`id`!='' AND `status`='published' AND `membertype`='Steering Committee Member' ORDER BY `orderno` ASC";
                    $members = Compon::getCaseTeamMembers($tm_fields, $tm_condition);
                    if(sizeof($members) > 0){
                        foreach($members as $member){
                            ?>
                            <div class="col-lg-4 col-sm-6 team-box-wrapper mb-3">
                                <div class="team-box">
                                    <img class="team-image" src="images/members/<?php if(isset($member["photo"]) && $member["photo"] != "") echo $member["photo"]; else echo "ct-dummy.jpg"; ?>" />
                                    <h3 class="text-center"><?php echo $member["name"]; ?></h3>
                                    <p class="text-center"><?php echo $member["university"]; ?></p>
                                    <p class="text-center"><?php echo $member["country"]; ?></p>

                                    <ul class="team-links list-unstyled d-flex justify-content-evenly">
                                        <li><a href="<?php if(isset($member["twitter"]) && ($member["twitter"] != "")) echo $member["twitter"]; else echo "javascript:void(0);"; ?>" class="social-icon-link bi-twitter"></a></li>
                                        <li><a href="<?php if(isset($member["linkedin"]) && ($member["linkedin"] != "")) echo $member["linkedin"]; else echo "javascript:void(0);"; ?>" class="social-icon-link bi-linkedin"></a></li>
                                        <li><a href="<?php if(isset($member["website"]) && ($member["website"] != "")) echo $member["website"]; else echo "javascript:void(0);"; ?>" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?><div class="col-12"><div class="card"><h6 class="text-center">No Records Found!</h6></div></div><?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!--steering committee section end-->
    </main>

    <?php Compon::footer(); ?>
    <?php Compon::scripts(); ?>

</body>

</html>