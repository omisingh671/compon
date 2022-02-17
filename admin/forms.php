<?php
require_once "../compon.php";

$uploadFolder = "../images/members/";
if (!file_exists('../images/members/')){
    mkdir('../images/members/', 0777, true);
}

$draft = "draft";
$published = "published";
$trash = "trash";

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

# case team start
if(isset($_POST["submit-teammember"])){
    //echo "<pre>"; print_r($_POST);print_r($_FILES);exit;
    
    $name = isset($_POST["name"]) ? addslashes($_POST["name"]) : "";
    $university = isset($_POST["university"]) ? addslashes($_POST["university"]) : "";
    $country = isset($_POST["country"]) ? addslashes($_POST["country"]) : "";
    $photoname = $_FILES["photo"]["name"];
    $email = isset($_POST["email"]) ? addslashes($_POST["email"]) : "";
    $membertype = isset($_POST["membertype"]) ? addslashes($_POST["membertype"]) : "";
    $orderno = isset($_POST["orderno"]) ? addslashes($_POST["orderno"]) : "";
    $website = isset($_POST["website"]) ? addslashes($_POST["website"]) : "";
    $linkedin = isset($_POST["linkedin"]) ? addslashes($_POST["linkedin"]) : "";
    $twitter = isset($_POST["twitter"]) ? addslashes($_POST["twitter"]) : "";
    $facebook = isset($_POST["facebook"]) ? addslashes($_POST["facebook"]) : "";
    $action = isset($_POST["action"]) ? addslashes($_POST["action"]) : "create";
    $oldphoto = isset($_POST["oldphoto"]) ? addslashes($_POST["oldphoto"]) : "";
    $status = $published;
    $id = isset($_POST["id"]) ? addslashes(base64_decode($_POST["id"])) : "";
    $idEncode = base64_encode($id);

    $maxUploadSize = 524288;
    $photo = $oldphoto;

    if($photoname != ""){
        $fileType = array("png", "jpg");
        $fileDimension = array("200", "200");
		$fileHandler = "photo";
		$filePrefix = "ct-".strtolower(str_replace(' ','-',$name));
		
		$ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
		$filename = $filePrefix.".".$ext;
		$targetPath = $uploadFolder.$filename;
					
        $filecheck = Compon::fileUplode($fileHandler, $fileType, $maxUploadSize, $fileDimension, $targetPath);
        
        if($filecheck === true){
            $photo = $filename;
        }
		else{
            header('Location: manage-case-teams.php?action=update&id='.$idEncode.'&mediauploaderr='.$filecheck); exit;
		}
    }

    $form_data = array("name"=>$name, "university"=>$university, "country"=>$country, "photo"=>$photo, "email"=>$email, "orderno"=>$orderno, "membertype"=>$membertype, "website"=>$website, "linkedin"=>$linkedin, "twitter"=>$twitter, "facebook"=>$facebook, "status"=>$status);
    
    //echo "<pre>";var_dump($form_data);exit;

    if($action == "create"){
        $insert_id = Compon::createTeamMember($form_data);

        if($insert_id > 0){
            header('Location: manage-case-teams.php?action=create&message=success'); exit;
        }
        else{
            header('Location: manage-case-teams.php?action=create&message=failure'); exit;
        }
    }
    if($action == "update"){
        $response = Compon::updateTeamMember($form_data, $id);
        if($response == true){
            header('Location: manage-case-teams.php?action=update&message=success&id='.$idEncode); exit;
        }
        else{
            header('Location: manage-case-teams.php?action=update&message=failure&id='.$idEncode); exit;
        }
    }
}

if(isset($_GET["action"]) && ($_GET["action"] == "delete-teammembers")){
    $id = isset($_GET["id"]) ? addslashes(base64_decode($_GET["id"])) : "";
    $status = $draft;
    $form_data = array("status"=>$status);

    $response = Compon::updateTeamMember($form_data, $id);

    if($response == true){
        header('Location: manage-case-teams.php?action=delete&message=success'); exit;
    }
    else{
        header('Location: manage-case-teams.php?action=delete&message=failure'); exit;
    }
}
# case team end

# publication start
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
# publication end
?>