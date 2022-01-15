<?php
include_once "compon.php";

$columns = "*";
$condition = "`id`!='' AND `status`='published' ORDER BY `orderno` ASC";
$publications = Compon::getPublications($columns, $condition);

$journals = array();
foreach($publications as $publication){
    $journals[] = $publication["journal"];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php Compon::siteTitle("Case Teams"); ?></title>

    <?php Compon::stylesSheets(); ?>

    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>

    <main>

        <?php Compon::navbar(); ?>

        <!--case teams section start-->
        <section class="section-padding" id="case-teams-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3 text-center uppercase">Publications</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5 col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="filter-heading-main rounded"><i class="bi bi-funnel"></i> Refine</div>
                            </div>

                            <div class="col-12">
                                <div class="filter-btns d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary flex-fill">Reset Filter</button>
                                    <button type="button" class="btn btn-danger flex-fill">Apply Filter</button>
                                </div>
                            </div>

                            <div class="col-12 member-types">
                                <div class="filter-heading text-uppercase mt-3">Filter by</div>
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="year" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Year
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="country" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Country
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="filter-heading text-uppercase mb-2">Generals</div>

                                <div class="d-grid gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                    <?php
                                    if(sizeof($journals) > 0){
                                        $count = 1;
                                        foreach($journals as $journal){
                                            ?>
                                            <input type="checkbox" class="btn-check" name="journal" id="journal-<?php echo $count; ?>" value="<?php echo $journal; ?>" autocomplete="off">
                                            <label class="btn btn-outline-success" for="journal-<?php echo $count; ?>"><?php echo $journal; ?></label>
                                            <?php
                                            $count++;
                                        }
                                    }
                                    else{
                                        ?><label class="btn btn-outline-secondary">No Journal Found</label><?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="filter-btns d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary flex-fill">Reset Filter</button>
                                    <button type="button" class="btn btn-danger flex-fill">Apply Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-7 col-12">

                        <div class="search-header d-flex flex-column flex-lg-row justify-content-between align-items-center rounded">
                            <div class="search-heading">
                                9 matching results found
                            </div>
                            <div class="search-box">
                                <form class="row g-3 align-items-center" method="post">
                                    <div class="col-auto" style="width: calc(100% - 94px);">
                                        <label for="search-input" class="visually-hidden">Search</label>
                                        <input type="text" class="form-control" id="search-input" placeholder="Enter keywords to search...">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-3" disabled>Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <!--<div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/mark-cj.png" />
                                    </div>-->
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">India</span>
                                        </div>
                                        <div class="ct-name">
                                            <p><a href="https://www.tandfonline.com/doi/full/10.1080/17524032.2021.1973528?src=">Beliefs and Networks: Mapping the Indian Climate Policy Discourse Surrounding</a></p>
                                        </div>
                                        <div class="news-year">
                                            <span class="badge bg-danger">2021</span>
                                            <p><i>Environmental Communication</i></p>
                                        </div>
                                        <div class="ct-affiliation">
                                            <p>Author: Pradip Swarnakar, Rajshri Shukla, and Jeffrey Broadbent</p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a href="https://www.tandfonline.com/doi/full/10.1080/17524032.2021.1973528?src=">Read More</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <ul class="list-unstyled d-flex justify-content-start">
                                                <!--<li><a title="https://markstoddart.academia.edu/" href="https://markstoddart.academia.edu/" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                <li><a title="@mcjs13" href="https://twitter.com/mcjs13" class="social-icon-link bi-twitter"></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <!--<div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/petr-ocelik.png" />
                                    </div>-->
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">Finland</span>
                                        </div>
                                        <div class="ct-name">
                                            <p><a href="https://www.sciencedirect.com/science/article/pii/S0959378021001278"> Polarization of climate politics results from partisan sorting: Evidence from Finnish Twittersphere</a></p>
                                        </div>

                                        <div class="news-year">
                                            <span class="badge bg-danger">2021</span>
                                            <p><i>Global Environmental Change</i></p>
                                        </div>

                                        <div class="ct-affiliation">
                                            <p>Author: Ted Hsuan Yun Chen, Ali Salloum, Antti Gronow, TuomasYlä-Anttila, Mikko Kivelä </p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a href="https://www.sciencedirect.com/science/article/pii/S0959378021001278">Read More</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <ul class="list-unstyled d-flex justify-content-start">
                                                <!--<li><a title="https://www.researchgate.net/profile/PetrOcelik" href="https://www.researchgate.net/profile/PetrOcelik" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                <li><a title="@PetrOcelik" href="https://twitter.com/PetrOcelik" class="social-icon-link bi-twitter"></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <!--<div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/ted-hasuan.png" />
                                    </div>-->
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">Finland</span>
                                            <span class="country badge bg-secondary">Sweden</span>
                                        </div>
                                        <div class="ct-name">
                                            <p><a href="https://onlinelibrary.wiley.com/doi/10.1111/psj.12450"> The Advocacy Coalition Index: A new approach for identifying advocacy coalitions</a></p>
                                        </div>

                                        <div class="news-year">
                                            <span class="badge bg-danger">2021</span>
                                            <p><i>Policy Studies Journal</i></p>
                                        </div>

                                        <div class="ct-affiliation">
                                            <p>Author: Keiichi Satoh, Antti Gronow, Tuomas Ylä-Anttila</p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a href="https://onlinelibrary.wiley.com/doi/10.1111/psj.12450">Read More</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <ul class="list-unstyled d-flex justify-content-start">
                                                <!--<li><a title="https://tedhchen.com" href="https://tedhchen.com" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                <li><a title="@tedhchen" href="https://twitter.com/tedhchen" class="social-icon-link bi-twitter"></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <!--<div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/tuomas.png" />
                                    </div>-->
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">Canada</span>                
                                        </div>
                                        <div class="ct-name">
                                            <p><a href="https://www.tandfonline.com/doi/abs/10.1080/17524032.2021.1969978"> Competing Crises? Media Coverage and Framing of Climate Change During the COVID-19 Pandemic</a></p>
                                        </div>

                                        <div class="news-year">
                                            <span class="badge bg-danger">2021</span>
                                            <p><i>Environmental Communication</i></p>
                                        </div>

                                        <div class="ct-affiliation">
                                            <p>Author: Mark C. J. Stoddart, Howard Ramos, Karen Foster & Tuomas Ylä-Anttila</p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a href="https://www.tandfonline.com/doi/abs/10.1080/17524032.2021.1969978">Read More</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <!--<ul class="list-unstyled d-flex justify-content-start">
                                                <li><a title="https://bit.ly/tuomas_y" href="https://bit.ly/tuomas_y" class="social-icon-link bi-arrow-up-right-square"></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <!--<div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/anna-kukkonen.png" />
                                    </div>-->
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">Canada</span>
                                        </div>
                                        <div class="ct-name">
                                            <p><a href="https://www.sciencedirect.com/science/article/pii/S0378873321000502"> Drivers of tie formation in the Canadian climate change policy network: Belief homophily</a></p>
                                        </div>

                                        <div class="news-year">
                                            <span class="badge bg-danger">2021</span>
                                            <p><i>Social Networks</i></p>
                                        </div>

                                        <div class="ct-affiliation">
                                            <p>Author: Adam C.Howe, David B.Tindall, Marck C.J.Stoddart</p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a href="https://www.sciencedirect.com/science/article/pii/S0378873321000502">Read More</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <ul class="list-unstyled d-flex justify-content-start">
                                                <!--<li><a title="https://researchportal.helsinki.fi/en/persons/anna-kukkonen" href="https://researchportal.helsinki.fi/en/persons/anna-kukkonen" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                <li><a title="@kukkonen_anna" href="https://twitter.com/kukkonen_anna" class="social-icon-link bi-twitter"></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <!--<div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/arttu.png" />
                                    </div>-->
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">Canada</span>
                                        </div>
                                        <div class="ct-name">
                                            <p><a href="https://journals.sagepub.com/doi/abs/10.1177/0731121420908886"> Drivers of tie formation in the Canadian climate change policy network: Belief homophily</a></p>
                                        </div>

                                         <div class="news-year">
                                            <span class="badge bg-danger">2021</span>
                                            <p><i>Sociological Perspectives</i></p>
                                        </div>

                                        <div class="ct-affiliation">
                                            <p>Author: David B Tindall, Adam C Howe, Céline Mauboulès </p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a href="https://journals.sagepub.com/doi/abs/10.1177/0731121420908886">Read More</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <ul class="list-unstyled d-flex justify-content-start">
                                                <!--<li><a title="https://researchportal.helsinki.fi/en/persons/arttu-malkam%C3%A4ki" href="https://researchportal.helsinki.fi/en/persons/arttu-malkam%C3%A4ki" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                <li><a title="@ArttuMalkamaki" href="https://twitter.com/ArttuMalkamaki" class="social-icon-link bi-twitter"></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/paul-wagner.png" />
                                    </div>
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">Ireland</span>
                                        </div>
                                        <div class="ct-name">
                                            <p>Paul Wagner</p>
                                        </div>
                                        <div class="ct-affiliation">
                                            <p>Northumbria University</p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a title="paul.wagner@northumbria.ac.uk" href="mailto:paul.wagner@northumbria.ac.uk">paul.wagner@northumbria.ac.uk</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <ul class="list-unstyled d-flex justify-content-start">
                                                <li><a title="@mpaulwagner" href="https://twitter.com/mpaulwagner" class="social-icon-link bi-twitter"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/pradeep.png" />
                                    </div>
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">India</span>
                                        </div>
                                        <div class="ct-name">
                                            <p>Pradip Swarnakar</p>
                                        </div>
                                        <div class="ct-affiliation">
                                            <p>Indian Institute of Technology Kanpur</p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a title="spradip@iitk.ac.in" href="mailto:spradip@iitk.ac.in">spradip@iitk.ac.in</a></p>
                                        </div>
                                        <div class="ct-links">
                                            <ul class="list-unstyled d-flex justify-content-start">
                                                <li><a title="https://home.iitk.ac.in/~spradip" href="https://home.iitk.ac.in/~spradip" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                <li><a title="@ps_iitk" href="https://twitter.com/ps_iitk" class="social-icon-link bi-twitter"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                    <div class="ct-image">
                                        <img class="img-fluid rounded-circle" src="images/teams/jeffery.png" />
                                    </div>
                                    <div class="ct-details">
                                        <div class="ct-country-wrapper">
                                            <span class="country badge bg-secondary">US</span>
                                            <span class="country badge bg-secondary">Japan</span>
                                            <span class="country badge bg-secondary">meta-analysis</span>
                                        </div>
                                        <div class="ct-name">
                                            <p>Jeff Broadbent</p>
                                        </div>
                                        <div class="ct-affiliation">
                                            <p>University of Minnesota</p>
                                        </div>
                                        <div class="ct-contact">
                                            <p><a title="broad001@umn.edu" href="broad001@umn.edu">mailto:broad001@umn.edu</a></p>
                                        </div>
                                        <div class="ct-links d-none">
                                            <!-- <ul class="list-unstyled d-flex justify-content-start">
                                                <li><a title="https://markstoddart.academia.edu/" href="https://markstoddart.academia.edu/" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                <li><a title="@mcjs13" href="https://twitter.com/mcjs13" class="social-icon-link bi-twitter"></a></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--case teams section end-->

    </main>

    <?php Compon::footer(); ?>
    <?php Compon::scripts(); ?>

</body>

</html>