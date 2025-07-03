<?php
        include 'config.php'; 
        $st_number = $_GET['number'];
        try {
           $dbh = new PDO($dsn, $user, $password);
           $sql = "update article set valid=0,status=0,charge=0,place=0,page=0 where number=:st_number";
           $stmt = $dbh->prepare($sql);
	       $stmt->bindParam(':st_number', $st_number);
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
header("Location: issue_manage.php") ;
exit ;

?>
