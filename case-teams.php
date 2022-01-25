<?php
include_once "compon.php";

# reset filter form submit start
if(isset($_POST["resetfilter"])){
    Compon::resetFilter();
	header('Location: case-teams.php'); exit;
}
if(isset($_POST["resetallfilter"])){
    Compon::resetAllFilterAndSearch();
	header('Location: case-teams.php'); exit;
}
# reset filter form submit end

# apply filter form submit start
if(isset($_POST["applyfilter"])){
    Compon::resetSearch();
    Compon::resetFilter();
    $orderby = isset($_POST["membertype"]) ? addslashes($_POST["membertype"]) : "";
    $_SESSION["membertype"] = $_POST["membertype"];
    
    //echo $_SESSION["membertype"];exit;
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
        header('Location: case-teams.php'); exit;
    }
    $_SESSION["keyword_tm"] = $keyword;
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
$total_pages = Compon::totalTMPages($records_per_page, $where);
$columns = "*";
$condition = "`id`!='' AND `status`='published' ORDER BY `country` ASC $limit";

if(isset($_SESSION["membertype"]) && ($_SESSION["membertype"] != "")){
    $membertype = $_SESSION["membertype"];
    $where = "`id`!='' AND `status`='published' AND `membertype`='".$membertype."'";
    $condition = $where." ".$limit;
    $total_pages = Compon::totalTMPages($records_per_page, $where);
}
if(isset($_SESSION["keyword_tm"])){
    $keyword_tm = $_SESSION["keyword_tm"];
    if($keyword_tm == ""){
        $where = "`id`!='' AND `status`='published' AND `name` NOT LIKE '%".$keyword_tm."%'";
    }
    else{
        $where = "`id`!='' AND `status`='published' AND `name` LIKE '%".$keyword_tm."%'";
    }
    $total_pages = Compon::totalTMPages($records_per_page, $where);
    $condition = $where." ORDER BY `country` ASC "."$limit";
}
/* filter + search + pagination end */

//echo $condition;exit;

$members = Compon::getCaseTeamMembers($columns, $condition);
//echo "<pre>";var_dump($total_pages);exit;

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
                        <h2 class="mb-3 text-center uppercase">Case Teams</h2>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-2"></div>

                    <!-- content panel start -->
                    <div class="col-lg-8 col-12">

                        <div class="search-header d-flex flex-column flex-lg-row justify-content-between align-items-center rounded">
                            <div class="search-heading">
                                <?php if(isset($members)) echo sizeof($members)." of ".$total_pages[1]." Team Members"; else echo "No Team Members Found"; ?>
                            </div>
                            <div class="search-box">
                                <form class="row g-3 align-items-center" name="search-case-team-form" method="post" action="case-teams.php" enctype="multipart/form-data">
                                    <div class="col-auto" style="width: calc(100% - 164px);">
                                        <label for="search-input" class="visually-hidden">Search</label>
                                        <input type="text" class="form-control" name="search-input" id="search-input" value="<?php if(isset($_SESSION["keyword_tm"])) echo $_SESSION["keyword_tm"]; ?>" placeholder="Enter keywords to search...">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-3" name="search-case-team">Search</button>
                                        <button type="submit" class="btn btn-warning flex-fill" name="resetallfilter">Clear</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- publication start -->
                        <?php
                        foreach($members as $members){
                            $country_arr = explode(", ", $members["country"]);
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card ct-card d-flex flex-row justify-content-start align-items-center">
                                        <div class="ct-image">
                                            <img class="img-fluid rounded-circle" src="images/members/<?php if(isset($members["photo"]) && $members["photo"] != "") echo $members["photo"]; else echo "ct-dummy.jpg"; ?>" />
                                        </div>
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
                                                <p><?php echo $members["name"]; ?></p>
                                            </div>
                                            <div class="ct-affiliation">
                                                <p><?php echo $members["university"]; ?></p>
                                            </div>
                                            <div class="ct-contact">
                                                <p><a title="<?php echo $members["email"]; ?>" href="mailto:<?php echo $members["website"]; ?>"><?php echo $members["email"]; ?></a></p>
                                            </div>
                                            <div class="ct-links">
                                                <ul class="list-unstyled d-flex justify-content-start">
                                                    <li><a title="<?php echo $members["website"]; ?>" href="<?php echo $members["website"]; ?>" class="social-icon-link bi-arrow-up-right-square"></a></li>
                                                    <li><a title="<?php echo $members["website"]; ?>" href="<?php echo $members["website"]; ?>" class="social-icon-link bi-twitter"></a></li>
                                                </ul>
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
                                                <a class="page-link" href="case-teams.php?page=1">First</a>
                                            </li>

                                            <li class="page-item <?php ($page <= 1 ? print "disabled" : "")?>">
                                                <a class="page-link" href="case-teams.php?page=<?php ($page>1 ? print($page-1) : print 1)?>"><i class="bi bi-chevron-left"></i></a>
                                            </li>

                                            <?php for($i = $start; $i <= $end; $i++) { ?>
                                            <li class="page-item <?php ($i == $page ? print "active" : "")?>">
                                                <a class="page-link" href="case-teams.php?page=<?php echo $i;?>">
                                                    <?php echo $i;?>
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <li class="page-item <?php ($page >= $total_pages[0] ? print "disabled" : "")?>">
                                                <a class="page-link" href="case-teams.php?page=<?php ($page < $total_pages[0] ? print($page+1) : print $total_pages[0])?>"><i class="bi bi-chevron-right"></i></a>
                                            </li>

                                            <li class="page-item <?php ($page >= $total_pages[0] ? print "disabled" : "")?>">
                                                <a class="page-link" href="case-teams.php?page=<?php echo $total_pages[0];?>">Last</a>
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

                    <div class="col-lg-2"></div>
                </div>
            </div>
        </section>
        <!--case teams section end-->

    </main>

    <?php Compon::footer(); ?>
    <?php Compon::scripts(); ?>

</body>

</html>