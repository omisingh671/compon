<?php
error_reporting(1);

require_once "config.php";

class CRUD{
	function runQuery($query){
		try{	
			$pdo = Database::connect();
			$stmt = $pdo->prepare($query);
			$stmt->execute();
			Database::disconnect();
			
			return $stmt;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	function getRow($table, $col, $where){
		$whereSQL = "";
		if(! empty($where)){
			if(substr((strtoupper(trim($where))), 0, 4) != "WHERE"){
				$whereSQL = " WHERE ".$where;
			}
			else{
				$whereSQL = " ".$where;
			}
		}
		$sql = "SELECT ".$col." FROM ".$table." ".$whereSQL;
		try{
			$pdo = Database::connect();
			$stmt = $pdo->prepare($sql);
			Database::disconnect();

			if(! $stmt->execute()){
				return false;
				//$error = $stmt->errorInfo();
				//echo $error[2];exit;
			}
			else{
				$records = array();
				if($stmt->rowCount()>0){
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$records[] = $row;
					}
				}
				return $records;
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
	
	function insertRow($table, $data){
		$fields = array_keys($data);
		try{
			$pdo = Database::connect();
			$sql = "INSERT INTO ".$table."(".implode(', ', $fields).") VALUES('".implode("', '", $data)."')";
			//echo $sql;exit;
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			Database::disconnect();
			$lastid = $pdo->lastInsertId();
			if($lastid > 0){
				return $lastid;
			}
			else{
				$error = $stmt->errorInfo();
				//echo $error[2];exit;
				return false;
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
	
	function updateRow($table, $form_data, $where){
		$whereSQL = "";
		if(!empty($where)){
			if(substr(strtoupper(trim($where)), 0, 5) != "WHERE"){
				$whereSQL = " WHERE ".$where;
			}
			else{
				$whereSQL = " ".$where;
			}
		}
		$sql= "UPDATE ".$table." SET ";
		$sets = array();
    	foreach($form_data as $column => $value){	
         	$sets[] = "".$column." = '".$value."'";
    	}
    	$sql .= implode(', ', $sets);
		$sql .= $whereSQL;
		//echo $sql; exit;
		try{
			$pdo = Database::connect();
			$stmt = $pdo->prepare($sql);
			if(!$stmt->execute()){
				//$sql_error = $stmt->errorInfo();
				//echo $sql_error[2];exit;
				return false;
			}
			else{
				return true;	
			}
			
		}
		catch(PDOException $e){
			echo $e->getMessage();	
			return FALSE;	
		}
	}
	
	function deleteRow($table, $where){
    	$whereSQL = "";
   		if(!empty($where)){
        	if(substr(strtoupper(trim($where)), 0, 5) != "WHERE"){   
            	$whereSQL = " WHERE ".$where;
        	} 
			else{
            	$whereSQL = " ".trim($where);
        	}
    	}
		
    	$sql = "DELETE FROM ".$table.$whereSQL;
		try{
			$pdo = Database::connect();
			$stmt = $pdo->prepare($sql);
			if(!$stmt->execute()){
				$sql_erroe=$stmt->errorInfo();
				echo $sql_erroe[2];
				return FALSE;
			}
			else{
				return TRUE;	
			}
		}
		catch(PDOException  $e){
			echo $e->getMessage();	
			return FALSE;
		}
	}
	
	function deleteFile($path){
		if(file_exists($path)){
			unlink($path);
			return TRUE;
		}
	}
	
	function maxid($table, $col, $initval){
		try{	
			$pdo = Database::connect();
			$query = "SELECT MAX($col) FROM $table";
			$stmt = $pdo->prepare($query);
			$stmt->execute();
			$maxID = $stmt->fetchColumn();
			
			if($maxID==NULL){
				return $initval;
			}
			else{
				return $maxID;
			}
		}
		catch(PDOException $e){
			echo  $e;
		}
	}
	
	function checkValidFileInArray($fileHandler, $fileType, $maxUploadSize, $fileDimension){
		$status = 1;
		$fileTypeOk = 0;
		foreach($_FILES[$fileHandler]["name"] as $iname => $value){
			$fileSize = $_FILES["$fileHandler"]["size"][$iname];
			$fileName =  basename($_FILES["$fileHandler"]["name"][$iname]);
			$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
			$tempName = $_FILES[$fileHandler]["tmp_name"][$iname];
			list($width,$height) = getimagesize($tempName);
			$ext_arr[] = $fileExt;
			foreach($fileType as $valid_type){
				if($fileExt == $valid_type){
					$fileTypeOk = 1;
					break;
				}
				else{
					$fileTypeOk = 0;
				}
			}
			if($fileTypeOk == 0){
				$status = "Sorry, only ".implode(", ",$fileType)." files are allowed.";
				break;
			}
			else if($fileSize > $maxUploadSize){
				$status = "Sorry, file size exceeds the max upload limit of (".($fileSize/1024)."KB).";
				break;
			}
			else if(($fileExt != "pdf") && ($width < $fileDimension[0] || $height < $fileDimension[1])){
				$status = "Sorry, your file is too small according to suggested picture dimension (".$fileDimension[0]." X ".$fileDimension[1].")";
				break;
			}
		}
		return $status;
	}
	
	function fileUplode($fileHandler, $fileType, $maxUploadSize, $fileDimension, $targetPath){
		$fileSize = $_FILES["$fileHandler"]["size"];	
		$fileName =  basename($_FILES["$fileHandler"]["name"]);	
		$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
		$tempName = $_FILES["$fileHandler"]["tmp_name"];
		list($width,$height) = getimagesize($tempName);
		
		$status = 1;
		$filetypeok=0;
		
		foreach($fileType as $typevalues){
			if($fileExt == $typevalues){
				$filetypeok = 1;
			}		
		}
		if($filetypeok == 0){
			$status = "Sorry, only ".implode(", ",$fileType)." files are allowed.";		
			return $status;		
		}
		else if($fileSize > $maxUploadSize){
			$status = "Sorry, file size exceeds the max upload limit of (".($fileSize/1024)."KB).";
			return $status;
		}
		else if(($fileDimension[0] > 0) && ($width < $fileDimension[0] || $height < $fileDimension[1])){
			$status = "Sorry, your file ".$fileName." is too small according to suggested picture dimension (".$fileDimension[0]." X ".$fileDimension[1].")";
			return $status;
		}
		else{ 							
			if (move_uploaded_file($tempName, $targetPath)){
				$status = true;
				return $status;
			}
			else{
				return "Unable to upload file, Try after some time!";
			}			
		}	
	}
	
	function multiFileUplode($fileHandler, $targetPath, $iname){
		$tempName = $_FILES["$fileHandler"]["tmp_name"][$iname];
		$uploadStatus = 1;
		if(move_uploaded_file($tempName, $targetPath)){
			return $uploadStatus;
		}
		else{
			$uploadStatus = 0;
			return $uploadStatus;
		}
	}

	function getTotalPages($records_per_page, $tp_sql){
		$stmt = $this->runQuery($tp_sql);
    	$total_rows_count = $stmt->rowCount();
		$total_pages = ceil($total_rows_count / $records_per_page);
		return $total_pages;
	}

	function paginationRange($page, $total_pages, $adjacents){
		if($total_pages <= (1+($adjacents * 2))){
			$start = 1;
			$end = $total_pages;
		}
		else{
			if(($page - $adjacents) > 1){ 
				if(($page + $adjacents) < $total_pages){ 
					$start = ($page - $adjacents);            
					$end = ($page + $adjacents);         
				}
				else{             
					$start = ($total_pages - (1+($adjacents*2)));  
					$end   = $total_pages;               
				}
			}
			else{               
				$start = 1;                                
				$end = (1+($adjacents * 2));             
			}
		}

		return array("start"=>$start, "end"=>$end);
	}

	function paginationLink($page, $total_pages, $adjacents){
		if($total_pages <= (1+($adjacents * 2))){
			$start = 1;
			$end = $total_pages;
		}
		else{
			if(($page - $adjacents) > 1){ 
				if(($page + $adjacents) < $total_pages){ 
					$start = ($page - $adjacents);            
					$end = ($page + $adjacents);         
				}
				else{             
					$start = ($total_pages - (1+($adjacents*2)));  
					$end   = $total_pages;               
				}
			}
			else{               
				$start = 1;                                
				$end = (1+($adjacents * 2));             
			}
		}
		if($total_pages > 1){
		?>
			<ul class="pagination pagination-sm justify-content-center">
				<!-- Link of the first page -->
				<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
					<a class='page-link' href='blog.php?page=1'><<</a>
				</li>
				<!-- Link of the previous page -->
				<li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
					<a class='page-link' href='blog.php?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
				</li>
				<!-- Links of the pages with page number -->
				<?php for($i = $start; $i <= $end; $i++) { ?>
				<li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
					<a class='page-link' href='blog.php?page=<?php echo $i;?>'><?php echo $i;?></a>
				</li>
				<?php } ?>
				<!-- Link of the next page -->
				<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
					<a class='page-link' href='blog.php?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
				</li>
				<!-- Link of the last page -->
				<li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
					<a class='page-link' href='blog.php?page=<?php echo $total_pages;?>'>>></a>
				</li>
			</ul>
		<?php
		}
	}
}
?>