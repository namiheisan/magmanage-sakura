<?php
    include 'config.php';
    $st_number = $_GET['number'];
    $st_issue = $_GET['issue'];
    $st_status = $_GET['status'];
    $st_charge = $_GET['charge'];
    $st_place = $_GET['place'];
	$st_page = $_GET['page'];
	try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "update article set issue=:st_issue,status=:st_status,charge=:st_charge,place=:st_place,page=:st_page where number=:st_number";
	    $stmt = $dbh->prepare($sql);
	    $stmt->bindParam(':st_number', $st_number);
	    $stmt->bindParam(':st_issue', $st_issue);
        $stmt->bindParam(':st_status', $st_status);
        $stmt->bindParam(':st_charge', $st_charge);
	    $stmt->bindParam(':st_place', $st_place);
        $stmt->bindParam(':st_page', $st_page);        
	    $stmt->execute();
       }catch (PDOException $e){
           print('Error:'.$e->getMessage());
           die();
       }

    $dbh = null;

    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", FALSE);
    header("Pragma: no-cache");
    http_response_code( 301 );
	header( "Location: issue_manage.php" );
    exit;

?>
