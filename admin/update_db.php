<?php
    include '../config.php'; 
    $st_pkey = $_GET['pkey'];
    $st_number = $_GET['number'];
    $st_issue_org = $_GET['issue'];
    $st_issue = str_replace(' ', '_', $st_issue_org); 
	try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "update article set number=:st_number,issue=:st_issue where pkey=:st_pkey";
	    $stmt = $dbh->prepare($sql);
	    $stmt->bindParam(':st_number', $st_number);
	    $stmt->bindParam(':st_issue', $st_issue);
        $stmt->bindParam(':st_pkey', $st_pkey);
	    $stmt->execute();
       }catch (PDOException $e){
           print('Error:'.$e->getMessage());
           die();
       }

    $dbh = null;
    
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", FALSE);
    header("Pragma: no-cache");
    http_response_code( 301 ) ;
	header( "Location: issue_ctrl.php" ) ;
    exit ;

?>
