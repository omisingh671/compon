<?php
session_start();
require_once "config/crud.php";
$crud = new Crud;

class Compon{
    
    private function __construct(){
		die("Initialization of layout class not allowed!");
	}
	
    private static $site_title = "Compon";
    
    # tables start
    private static $table_users = "compon_users";
    private static $table_publications = "compon_publications";
    private static $table_members = "compon_members";
    # tables start

    /* CRUD Functions Start Here */
    
    public static function auth($username, $password){
        global $crud;
        $user = null;
        $where_condition = "username='$username' AND userauth='$password' LIMIT 1";
        $user = $crud->getRow(self::$table_users, "*", $where_condition);
        return $user;
    }

    public static function getPublications($columns, $where_condition){
        global $crud;
        return $records = $crud->getRow(self::$table_publications, $columns, $where_condition);
    }
    
    /* CRUD Functions End Here */

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

    /* Utility Functions End Here */

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
                            <a class="nav-link" href="projects.php">Projects</a>
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
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/custom.js"></script>
        <?php
    }
    # admin page scripts end

    # admin navbar start
    public static function adminNavbar(){
        ?>
        <div id="admin-navbar" class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark">
            
            <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Compon Dashboard</span>
            </a>
            
            <hr>

            <ul class="nav nav-pills flex-column mb-auto">
                <li><a href="index.php" class="nav-link text-white"><i class="bi bi-speedometer"></i> <span class="ms-2">Dashboard</span></a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" id="publicationsDMLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-journal-check"></i> <span class="ms-2">Publications</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="publicationsDMLink">
                        <li>
                            <a class="dropdown-item" href="create-publication.php">
                                <i class="bi bi-pencil"></i> <span class="ms-2">Create New</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i> <span class="ms-2">Manage</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" id="caseTeamsDMLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people"></i> <span class="ms-2">Case Teams</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="caseTeamsDMLink">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-pencil"></i> <span class="ms-2">Create New</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i> <span class="ms-2">Manage</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" id="projectsDMLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-briefcase"></i> <span class="ms-2">Projects</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="projectsDMLink">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-pencil"></i> <span class="ms-2">Create New</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="bi bi-gear"></i> <span class="ms-2">Manage</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="#" class="nav-link text-white"><i class="bi bi-bar-chart"></i> <span class="ms-2">Charts</span></a></li>
            </ul>

            <hr>
            
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"><strong>Admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>

        </div>
        <?php
    }
    # admin navbar end

    /* Page Layout Functions End Here */
}