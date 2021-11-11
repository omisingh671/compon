<?php
include_once "compon.php";

if(isset($_POST["auth"])){
	$username = addslashes($_POST["username"]);
	$password = sha1($_POST["password"]);
	//echo $username.", ".$password; exit;

    $user = Compon::auth($username, $password);
    var_dump($user);
}
?>