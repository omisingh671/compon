<?php
error_reporting(E_ALL);

session_start();
require_once "config/crud.php";
$crud = new Crud;

class Compon{
    
    private function __construct(){
		die("Initialization of layout class not allowed!");
	}
	
    /* Page Layout Functions Start Here */

    # ie responsive fix start
	public static function ieResponsiveFix(){
		?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
	}
    # ie responsive fix end

    # page styles start
	public static function stylesSheets(){
        ?>
        <link href="css/google-font.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <?php
    }
    # page styles end

    # page scripts start
	public static function scripts(){
        ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/custom.js"></script>
        <?php
    }
    # page scripts end

    # navbar start
	public static function navbar(){
        ?>
        <!--navbar start-->
        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <strong>Compon</strong>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="publications.php">Publications</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="case-teams.php">Case Teams</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--navbar end-->
        <?php
    }
    # navbar end

    # footer start
	public static function footer(){
        ?>
        <!--footer start-->
        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <p class="copyright-text mb-0 text-center">&copy; Copyright 2009 - 2021 The Compon Project</p>
                    </div>

                </div>
            </section>
        </footer>
        <!--footer end-->
        <?php
    }
    # footer end

    # admin page styles start
	public static function adminStylesSheets(){
        ?>
        <link href="../css/google-font.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <?php
    }
    # admin page styles end

    # admin page scripts start
	public static function adminScripts(){
        ?>
        <script src="../js/jqueryv3.6.0.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/custom.js"></script>
        <?php
    }
    # admin page scripts end

    # admin navbar start
    public static function adminNavbar(){
        ?>
        <div id="admin-navbar" class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark">
            
            <a href="index.php" class="d-flex justify-content-center text-decoration-none d-title">
                Compon
            </a>

            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="index.php" class="nav-link text-white">
                        <i class="bi bi-speedometer"></i> <span class="ms-2">Dashboard</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a href="manage-publications.php" class="nav-link text-white">
                        <i class="bi bi-journal-check"></i> <span class="ms-2">Manage Publications</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a href="manage-publications.php" class="nav-link text-white">
                        <i class="bi bi-people"></i> <span class="ms-2">Manage Case Teams</span>
                    </a>
                </li>
            </ul>

            <hr>
            
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span style="margin-right: 10px;" class="fs-3"><i class="bi bi-sliders"></i></span> <strong>Control Panel</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-fill"></i> Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> Sign Out</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../index.php" target="_blank"><i class="bi bi-globe"></i> Visit Compon</a></li>
                </ul>
            </div>

        </div>
        <?php
    }
    # admin navbar end

    /* Page Layout Functions End Here */

    # tables start
    private static $table_users = "compon_users";
    private static $table_publications = "compon_publications";
    private static $table_members = "compon_members";
    # tables start

    ################### CRUD Functions Start Here ###################

    private static $site_title = "Compon";
    
    # auth start
    public static function auth($username, $password){
        global $crud;
        $user = null;
        $password = md5($password);
        $where_condition = "username='$username' AND userauth='$password' LIMIT 1";
        $user = $crud->getRow(self::$table_users, "*", $where_condition);
        return $user;
    }

    public static function isLoggedIn(){
        if(isset($_SESSION["user"]) && ($_SESSION["user"] != "")){
            return true;
        }
        else{
            return false;
        }
    }

    public static function isAdmin(){
        if(isset($_SESSION["user"]) && ($_SESSION["user"] != "")){
            return true;
        }
        else{
            header('Location: ../index.php'); exit;
        }
    }
    # auth end

    public static function rawSQL($sql){
        global $crud;
        $stmt = $crud->runQuery($sql);
        return $stmt;
    }

    # total page - for paging start
    public static function totalPublicationPages($records_per_page, $where){
        global $crud;
        $tp_table = self::$table_publications;
        $tp_sql = "SELECT `id` FROM $tp_table WHERE $where";
        $total_pages = $crud->getTotalPages($records_per_page, $tp_sql);
        return $total_pages;
    }

    public static function totalTMPages($records_per_page, $where){
        global $crud;
        $tp_table = self::$table_members;
        $tp_sql = "SELECT `id` FROM $tp_table WHERE $where";
        $total_pages = $crud->getTotalPages($records_per_page, $tp_sql);
        return $total_pages;
    }
    # total page - for paging end

    #paging range start
    public static function pagingRange($page, $total_pages, $adjacents){
        global $crud;
        $pagination_range = $crud->paginationRange($page, $total_pages, $adjacents);
        return $pagination_range;
    }
    # paging range end

    # publication start
    public static function getPublications($columns, $where_condition){
        global $crud;
        $records = $crud->getRow(self::$table_publications, $columns, $where_condition);
        return $records;
    }

    public static function createPublication($form_data){
        global $crud;
        $id = $crud->insertRow(self::$table_publications, $form_data);
        return $id;
    }

    public static function updatePublication($form_data, $id){
        global $crud;
        $where = "id=$id";
        $status = $crud->updateRow(self::$table_publications, $form_data, $where);
        return $status;
    }
    # publication end

    # case team start
    public static function getCaseTeamMembers($columns, $where_condition){
        global $crud;
        $records = $crud->getRow(self::$table_members, $columns, $where_condition);
        return $records;
    }
    # case team end

    /* Utility Functions Start Here */

    # actual link method start
    public static function actualLink(){
        return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
    # actual link method end

	# site title method start
	public static function siteTitle($title){
		echo self::$site_title." | ".$title;
	}
    # site title end

    # reset filter start
    public static function resetFilter(){
        unset($_SESSION["orderby"]);
        unset($_SESSION["orderby_filter"]);
        unset($_SESSION["journals"]);
        unset($_SESSION["journals_filter"]);
        unset($_SESSION["membertype"]);
    }
    public static function resetAllFilterAndSearch(){
        unset($_SESSION["orderby"]);
        unset($_SESSION["orderby_filter"]);
        unset($_SESSION["journals"]);
        unset($_SESSION["journals_filter"]);
        unset($_SESSION["keyword_publication"]);
        unset($_SESSION["keyword_tm"]);
    }
    public static function resetSearch(){
        unset($_SESSION["keyword_publication"]);
        unset($_SESSION["keyword_tm"]);
    }
    # reset filter end

    /* Utility Functions End Here */
}