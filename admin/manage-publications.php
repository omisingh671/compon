<?php
include_once "../compon.php";

if(isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    $action = "";
}
if(isset($_GET["message"])){
    $message = $_GET["message"];
}
else{
    $message = "";
}
?>
<?php

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
            <div class="container-fluid border-bottom border-secondary d-flex align-items-center dash-header-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="dash-header pb-2">
                            <h2>Manage Publications</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!--page header end-->

            <!--response message start-->
            <div class="response-wrapper">
                <?php
                if($action == "" || ($action == "create" && $message == "") || ($action == "update" && $message == "")){
                    ?>
                    <div class="container-fluid br-0 alert alert-info" role="alert">
                        Kindly fill all required fields*
                    </div>
                    <?php
                }
                if($action == "create" && $message == "success"){
                    ?>
                    <div class="container-fluid br-0 alert alert-success" role="alert">
                        <i class="bi bi-check-lg"></i> New publication created successfully.
                    </div>
                    <?php
                }
                if($action == "create" && $message == "failure"){
                    ?>
                    <div class="container-fluid br-0 alert alert-danger" role="alert">
                        <i class="bi bi-info-lg"></i> Unexpected error occured. Unable to create new publication.
                    </div>
                    <?php
                }
                if($action == "update" && $message == "success"){
                    ?>
                    <div class="container-fluid br-0 alert alert-success" role="alert">
                        <i class="bi bi-check-lg"></i> Publication updated successfully.
                    </div>
                    <?php
                }
                if($action == "update" && $message == "failure"){
                    ?>
                    <div class="container-fluid br-0 alert alert-danger" role="alert">
                        <i class="bi bi-info-lg"></i> Unexpected error occured. Unable to update the publication.
                    </div>
                    <?php
                }
                if($action == "delete" && $message == "success"){
                    ?>
                    <div class="container-fluid br-0 alert alert-success" role="alert">
                        <i class="bi bi-check-lg"></i> Publication deleted successfully.
                    </div>
                    <?php
                }
                if($action == "delete" && $message == "failure"){
                    ?>
                    <div class="container-fluid br-0 alert alert-danger" role="alert">
                        <i class="bi bi-info-lg"></i> Unexpected error occured. Unable to deleted the publication.
                    </div>
                    <?php
                }
                ?>
            </div>
            <!--response message end-->

            <!--page content wrapper start-->
            <div class="scrollarea">
                <div class="container-fluid">
                    <form action="forms.php" class="g-3" method="post" enctype="multipart/form-data">
                        <?php
                            $form_action = "create";

                            if($action == "update"){
                                $form_action = "update";
                                $id = addslashes(base64_decode($_GET["id"]));
                                $publication = Compon::getPublications("*", "id='$id' LIMIT 1");
                                if(sizeof($publication) > 0){
                                    $p_title = $publication[0]["title"];
                                    $p_journal = $publication[0]["journal"];
                                    $p_authors = $publication[0]["authors"];
                                    $p_link = $publication[0]["publicationlink"];
                                    $p_country = $publication[0]["country"];
                                    $p_year = $publication[0]["year"];
                                    $p_order = $publication[0]["orderno"];
                                    $p_featured = $publication[0]["isfeatured"];
                                }
                            }
                        ?>
                        <input type="hidden" name="action" value="<?php echo $form_action; ?>" />
                        <input type="hidden" name="id" value="<?php echo base64_encode($id); ?>" />
                        <div class="row">
                            <div class="col-md-12">
                                <label for="title" class="form-label">Title*</label>
                                <textarea class="form-control" rows="1" name="title" id="title" placeholder="Enter publication title here..." required><?php if(isset($p_title)) echo $p_title; ?></textarea>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="journal" class="form-label">Journal*</label>
                                <input type="text" class="form-control" name="journal" id="journal" value="<?php if(isset($p_journal)) echo $p_journal; ?>" placeholder="Enter journal name..." required />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="authors" class="form-label">Authors*</label>
                                <input type="text" class="form-control" name="authors" id="authors" value="<?php if(isset($p_authors)) echo $p_authors; ?>" placeholder="Enter authors name..." required />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="publicationlink" class="form-label">Publication Link*</label>
                                <input type="text" class="form-control" name="publicationlink" id="publicationlink" value="<?php if(isset($p_link)) echo $p_link; ?>" placeholder="https://www.xyz/" required />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="country" class="form-label">Country Name*</label>
                                <input type="text" class="form-control" name="country" id="country" value="<?php if(isset($p_country)) echo $p_country; ?>" placeholder="Ex: India, Finland" required />
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="year" class="form-label">Publication Year*</label>
                                <?php
                                    if(isset($p_year)){
                                        ?>
                                        <option selected value="" hidden></option>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <option selected value="" hidden>Choose Publication Year</option>
                                        <?php
                                    }
                                ?>
                                <select name="year" id="year" class="form-select" required>
                                    <option selected value="<?php if(isset($p_year) && $p_year !="") echo $p_year; else echo ""; ?>" hidden><?php if(isset($p_year) && $p_year !="") echo $p_year; else echo "Choose Publication Year"; ?></option>
                                    <?php
                                        for($i=2022; $i>=1990; $i--){
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="orderno" class="form-label">Publication Order</label>
                                <select name="orderno" id="orderno" class="form-select">
                                    <option selected value="<?php if(isset($p_order) && $p_order !="") echo $p_order; else echo ""; ?>" hidden><?php if(isset($p_order) && $p_order !="") echo $p_order; else echo "Choose Publication Order"; ?></option>
                                    <?php
                                        for($i=1; $i<=100; $i++){
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="isfeatured" class="form-label">Make This Publication Featured</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="isfeatured" id="isfeatured" value="1" <?php if($p_featured == 1) echo "checked"; ?> />
                                    <label class="form-check-label" for="isfeatured">
                                        Yes
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <?php
                                    if($action == "update"){
                                        ?>
                                        <button type="submit" class="btn btn-success" name="submit-publication"><i class="bi bi-pencil-square"></i> Update Publication</button>
                                        <a href="manage-publications.php" class="btn btn-warning"><i class="bi bi-plus-lg"></i> Create New Publication</a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button type="submit" class="btn btn-success" name="submit-publication"><i class="bi bi-send-fill"></i> Submit</button>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="dt-table" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#SN</th>
                                        <th>Title</th>
                                        <th>Journal</th>
                                        <th>Country</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $publications = Compon::getPublications("*", "id!='' AND status='published' ORDER BY id DESC");
                                //echo "<pre>"; var_dump($publications); exit;
                                if(sizeof($publications) > 0){
                                    $counter = 0;
                                    foreach($publications as $publication){
                                        $id = base64_encode($publication["id"]);
                                        ?>
                                        <tr>
                                            <td><?php echo ++$counter; ?></td>
                                            <td><?php echo substr($publication["title"], 0, 33)."..."; ?></td>
                                            <td><?php echo substr($publication["journal"], 0, 20)."..."; ?></td>
                                            <td><?php echo $publication["country"]; ?></td>
                                            <td><?php echo $publication["year"]; ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="manage-publications.php?action=update&id=<?php echo $id; ?>"><i class="bi bi-pencil-square"></i> Update</a>
                                                <a class="btn btn-danger" href="forms.php?action=delete-publication&id=<?php echo $id; ?>" onclick="return confirm('Are you sure, you want to delete it?')"><i class="bi bi-trash-fill"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                    <tr>
                                        <td colspan="6">No records found!</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--page content wrapper end-->

        </div>
    </section>

    <?php Compon::adminScripts(); ?>
</body>

</html>