<?php
class Layout{
    
    public function __construct(){
		die("Initialization of layout class not allowed!");
	}
	
    private static $site_title = "Compon";

    public static function actualLink(){
        return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }
	# site title method
	public static function siteTitle($title){
		echo self::$site_title." | ".$title;
	}

    # ie responsive fix
	public static function ieResponsiveFix(){
		?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php
	}

    # page styles
	public static function stylesSheets(){
        ?>
        <link href="css/google-font.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <?php
    }
    # page scripts
	public static function scripts(){
        ?>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/custom.js"></script>
        <?php
    }

    # admin page styles
	public static function adminStylesSheets(){
        ?>
        <link href="../css/google-font.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <?php
    }

    # admin page scripts
	public static function adminScripts(){
        ?>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/custom.js"></script>
        <?php
    }

    # navbar
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

    # footer
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

}