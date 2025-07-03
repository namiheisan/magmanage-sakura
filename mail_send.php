<?php
    include 'config.php';
    $st_receive = $_GET['receive'];
    $st_send = $_GET['send'];
    $st_issue = $_GET['issue'];
    $st_status = $_GET['status'];
    $st_place = $_GET['place'];
    $st_number = $_GET['number'];
    $addtext = $_GET['addtext'];

    $status_name = $status[$st_status];
    $place_receive = $place[$st_receive];
    $place_send = $place[$st_send];

    try {
        $dbh = new PDO($dsn, $user, $password);
        $sql = "update article set status=:st_status,place=:st_place where number=:st_number";
	    $stmt = $dbh->prepare($sql);
	    $stmt->bindParam(':st_number', $st_number);
	    $stmt->bindParam(':st_status', $st_status);
	    $stmt->bindParam(':st_place', $st_place);
	    $stmt->execute();
       }catch (PDOException $e){
           print('Error:'.$e->getMessage());
           die();
       }

       $dbh = null;

    exec("php ./mail_send_article.php $st_receive $place_receive $place_send $st_issue $status_name $addtext > /dev/null");

    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", FALSE);
    header("Pragma: no-cache");
    http_response_code(301);
    header("Location: issue_manage.php");
    exit ;

?>
