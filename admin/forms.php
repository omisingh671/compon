<?php
require_once "../compon.php";

// $uploadFolder = "../uploads/";
// if (!file_exists('../uploads/')){
//     mkdir('uploads', 0777, true);
// }

$draft = "draft";
$published = "published";
$trash = "trash";

# publication delete start
if(isset($_GET["action"]) && ($_GET["action"] == "delete-publication")){
    $id = isset($_GET["id"]) ? addslashes(base64_decode($_GET["id"])) : "";
    $status = $draft;
    $form_data = array("status"=>$status);

    $response = Compon::updatePublication($form_data, $id);

    if($response == true){
        header('Location: manage-publications.php?action=delete&message=success'); exit;
    }
    else{
        header('Location: manage-publications.php?action=delete&message=failure'); exit;
    }
}
# publication delete end

if(isset($_POST["auth"])){
    $username = addslashes(isset($_POST["username"]) ? $_POST["username"] : "");
    $password = addslashes(isset($_POST["password"]) ? $_POST["password"] : "");

    $user = Compon::auth($username, $password);

    if(sizeof($user) > 0){
        $userJson =  json_encode($user);
        $_SESSION["user"] = $userJson;
        
        header('Location: index.php'); exit;
    }
    else{
        echo "Invalid Username or Password!";
    }
}

if(isset($_POST["submit-publication"])){
    
    //echo "<pre>"; print_r($_POST);exit;
    
    $title = isset($_POST["title"]) ? addslashes($_POST["title"]) : "";
    $journal = isset($_POST["journal"]) ? addslashes($_POST["journal"]) : "";
    $authors = isset($_POST["authors"]) ? addslashes($_POST["authors"]) : "";
    $publicationlink = isset($_POST["publicationlink"]) ? addslashes($_POST["publicationlink"]) : "";
    $country = isset($_POST["country"]) ? addslashes($_POST["country"]) : "";
    $year = isset($_POST["year"]) ? addslashes($_POST["year"]) : "";
    $orderno = isset($_POST["orderno"]) ? addslashes($_POST["orderno"]) : "";
    $isfeatured = isset($_POST["isfeatured"]) ? addslashes($_POST["isfeatured"]) : "0";
    $status = $published;
    $action = isset($_POST["action"]) ? addslashes($_POST["action"]) : "create";

    $form_data = array("title"=>$title, "journal"=>$journal, "authors"=>$authors, "publicationlink"=>$publicationlink, "country"=>$country, "year"=>$year, "orderno"=>$orderno, "isfeatured"=>$isfeatured, "status"=>$status);
    
    //echo "<pre>";var_dump($form_data);exit;

    if($action == "create"){
        $insert_id = Compon::createPublication($form_data);

        if($insert_id > 0){
            header('Location: manage-publications.php?action=create&message=success'); exit;
        }
        else{
            header('Location: manage-publications.php?action=create&message=failure'); exit;
        }
    }
    if($action == "update"){
        $id = isset($_POST["id"]) ? addslashes(base64_decode($_POST["id"])) : "";
        $response = Compon::updatePublication($form_data, $id);
        $id = base64_encode($id);

        if($response == true){
            header('Location: manage-publications.php?action=update&message=success&id='.$id); exit;
        }
        else{
            header('Location: manage-publications.php?action=update&message=failure&id='.$id); exit;
        }
    }
}
?>