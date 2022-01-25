<?php
include_once "compon.php";

if(isset($_POST["reset-filter"])){
	header('Location: publications.php'); exit;
}

if(isset($_POST["apply-filter"])){
	$orderby = isset($_POST["filterby"]) ? addslashes($_POST["filterby"]) : "orderno";
	$pageno = isset($_POST["pageno"]) ? addslashes($_POST["pageno"]) : "orderno";

	if(isset($_POST["journal"]) && is_array($_POST["journal"])){
		for($i=0; $i<=sizeof($_POST["journal"]); $i++){
            $journals_filter = "'".$_POST["journal"][$i]."'"; echo $journal. "<br /><br />";
        }
	}
	else{
		$journals_filter = isset($_POST["journal"]) ? addslashes($_POST["journal"]) : "";
	}

    $condition = "`id`!='' AND `status`='published' AND (`journal`='') ORDER BY `orderno` ASC $limit";
}
?>