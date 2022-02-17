<?php
include_once "compon.php";

# reset filter form submit start
if(isset($_POST["resetfilter"])){
    Compon::resetFilter();
	header('Location: publications.php'); exit;
}
if(isset($_POST["resetallfilter"])){
    Compon::resetAllFilterAndSearch();
	header('Location: publications.php'); exit;
}
# reset filter form submit end

# apply filter form submit start
if(isset($_POST["applyfilter"])){
    Compon::resetSearch();
    Compon::resetFilter();
    $orderby = isset($_POST["orderby"]) ? addslashes("`".$_POST["orderby"]."`") : "`orderno`";
    $_SESSION["orderby_filter"] = $orderby;
    
    //echo $_SESSION["orderby_filter"];exit;
}
# apply filter form submit end

if(isset($_POST["search-input"])){
    Compon::resetFilter();
    $keyword = addslashes($_POST["search-input"]);
    
    if(str_contains($keyword, "DROP") || str_contains($keyword, "drop") || str_contains($keyword, "DELETE") || str_contains($keyword, "delete") || str_contains($keyword, "UPDATE") || str_contains($keyword, "update") || str_contains($keyword, "INSERT") || str_contains($keyword, "insert") || str_contains($keyword, "=") || str_contains($keyword, "1=1") || ($keyword == "")) {
        $keyword = "";
    }
    if(($_POST["search-input"] == "")){
        Compon::resetSearch();
        header('Location: publications.php'); exit;
    }
    $_SESSION["keyword_publication"] = $keyword;
}

/* filter + search + pagination start */
$records_per_page = 4;
$adjacents = 1;

if (isset($_GET['page']) && $_GET['page'] != "") {
    $page = $_GET['page'];
    if($page == 0) $page = 1;
    if(is_numeric($page) != 1) $page = 1;
    $offset = $records_per_page * ($page - 1);
}
else {
    $page = 1;
    $offset = 0;
}

$limit = "LIMIT $offset, $records_per_page";
$where = "`id`!='' AND `status`='published'";
$total_pages = Compon::totalPublicationPages($records_per_page, $where);
$columns = "*";
$condition = "`id`!='' AND `status`='published' ORDER BY `year` DESC $limit";

if(isset($_SESSION["orderby_filter"]) && !isset($_SESSION["journals_filter"])){
    $orderby_filter = $_SESSION["orderby_filter"];
    if($orderby_filter == "`year`"){
        $orderby_filter = "ORDER BY $orderby_filter DESC";
    }
    if($orderby_filter == "`country`"){
        $orderby_filter = "ORDER BY $orderby_filter ASC";
    }
    if($orderby_filter == "`orderno`"){
        $orderby_filter = "ORDER BY $orderby_filter ASC";
    }

    $condition = "`id`!='' AND `status`='published' $orderby_filter $limit";
}
if(isset($_SESSION["keyword_publication"])){
    $keyword_publication = $_SESSION["keyword_publication"];
    if($keyword_publication == ""){
        $where = "`id`!='' AND `status`='published'";
    }
    else{
        $where = "`id`!='' AND `status`='published' AND `title` LIKE '%".$keyword_publication."%'";
    }
    $total_pages = Compon::totalPublicationPages($records_per_page, $where);
    $condition = $where." ORDER BY `year` DESC "."$limit";
    //echo $condition;exit;
}
/* filter + search + pagination end */

//echo $condition;exit;

$publications = Compon::getPublications($columns, $condition);

$pagination_range = Compon::pagingRange($page, $total_pages[0], $adjacents);
$start = $pagination_range["start"];
$end = $pagination_range["end"];
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

                    <!-- filter panel start -->
                    <div class="col-lg-4 col-sm-5 col-12">
                        <form name="filter-publication-form" method="post" action="publications.php" enctype="multipart/form-data">
                            <input type="hidden" name="pageno" value="<?php echo $page; ?>" />
                            <div class="row">
                                <div class="col-12">
                                    <div class="filter-btns d-flex justify-content-between">
                                        <button type="submit" class="btn btn-danger flex-fill" name="applyfilter">Apply Filter</button>
                                        <button type="submit" class="btn btn-secondary flex-fill" name="resetfilter">Reset Filter</button>
                                    </div>
                                </div>

                                <div class="col-12 member-types">
                                    <div class="filter-heading text-uppercase mt-0">Filter by</div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="orderby" id="orderbyYear" value="year" <?php if(isset($_SESSION["orderby_filter"]) && $_SESSION["orderby_filter"] == "`year`") echo "checked"; ?>>
                                        <label class="form-check-label" for="orderbyYear">
                                            Year
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="orderby" id="orderbyCountry" value="country" <?php if(isset($_SESSION["orderby_filter"]) && $_SESSION["orderby_filter"] == "`country`") echo "checked"; ?>>
                                        <label class="form-check-label" for="orderbyCountry">
                                            Country
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- filter panel end -->

                    <!-- content panel start -->
                    <div class="col-lg-8 col-sm-7 col-12">

                        <div class="search-header d-flex flex-column flex-lg-row justify-content-between align-items-center rounded">
                            <div class="search-heading">
                                <?php echo "Total ".$total_pages[1]." Publications Found"; ?>
                            </div>
                            <div class="search-box">
                                <form class="row g-3 align-items-center" name="search-publication-form" method="post" action="publications.php" enctype="multipart/form-data">
                                    <div class="col-auto" style="width: calc(100% - 164px);">
                                        <label for="search-input" class="visually-hidden">Search</label>
                                        <input type="text" class="form-control" name="search-input" id="search-input" value="<?php if(isset($_SESSION["keyword_publication"])) echo $_SESSION["keyword_publication"]; ?>" placeholder="Enter keywords to search...">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-3" name="search-publication">Search</button>
                                        <button type="submit" class="btn btn-warning flex-fill" name="resetallfilter">Clear</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- publication start -->
                        <?php
                        foreach($publications as $publication){
                            $country_arr = explode(", ", $publication["country"]);
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                        <div class="ct-details">
                                            <div class="ct-country-wrapper">
                                                <?php
                                                if(sizeof($country_arr) > 0){
                                                    foreach($country_arr as $country){
                                                        ?><span class="country badge bg-secondary me-1 mb-1"><?php echo $country; ?></span><?php
                                                    }
                                                }
                                                else{
                                                    ?><span class="country badge bg-secondary">N/A</span><?php
                                                }
                                                ?>
                                            </div>
                                            <div class="ct-name">
                                                <p>
                                                    <a href="<?php echo $publication["publicationlink"]; ?>">
                                                        <?php echo $publication["title"]; ?>
                                                    </a>
                                                </p>
                                            </div>
                                            <div class="news-year">
                                                <span class="badge bg-danger"><?php echo $publication["year"]; ?></span>
                                                <p><i><?php echo $publication["journal"]; ?></i></p>
                                            </div>
                                            <div class="ct-affiliation">
                                                <p><strong>Author:</strong> <?php echo $publication["authors"]; ?></p>
                                            </div>
                                            <div class="ct-contact">
                                                <p><a href="<?php echo $publication["publicationlink"]; ?>">Read More</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-12">
                                <?php
                                if($total_pages[0] > 1){
                                    ?>
                                    <nav aria-label="Page Navigation">
                                        <ul class="pagination">
                                            <li class="page-item <?php ($page <= 1 ? print "disabled" : "")?>">
                                                <a class="page-link" href="publications.php?page=1">First</a>
                                            </li>

                                            <li class="page-item <?php ($page <= 1 ? print "disabled" : "")?>">
                                                <a class="page-link" href="publications.php?page=<?php ($page>1 ? print($page-1) : print 1)?>"><i class="bi bi-chevron-left"></i></a>
                                            </li>

                                            <?php for($i = $start; $i <= $end; $i++) { ?>
                                            <li class="page-item <?php ($i == $page ? print "active" : "")?>">
                                                <a class="page-link" href="publications.php?page=<?php echo $i;?>">
                                                    <?php echo $i;?>
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <li class="page-item <?php ($page >= $total_pages[0] ? print "disabled" : "")?>">
                                                <a class="page-link" href="publications.php?page=<?php ($page < $total_pages[0] ? print($page+1) : print $total_pages)?>"><i class="bi bi-chevron-right"></i></a>
                                            </li>

                                            <li class="page-item <?php ($page >= $total_pages ? print "disabled" : "")?>">
                                                <a class="page-link" href="publications.php?page=<?php echo $total_pages[0];?>">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- publication end -->
                    </div>
                    <!-- content panel end -->
                </div>
            </div>
        </section>
        <!--case teams section end-->

    </main>

    <?php Compon::footer(); ?>
    <?php Compon::scripts(); ?>

</body>

</html>