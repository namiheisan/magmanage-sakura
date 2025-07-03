<?php
    include 'config.php'; 
    $set_number = $_GET['number'];
    $set_charge = $_GET['charge'];
    $set_page = $_GET['page'];
	print("今号の記事登録が完了しました<br>\n");
	print('<a href="issue_manage.php">記事管理ページ</a>に戻る');
       try {
            $dbh = new PDO($dsn, $user, $password);
	        $sql = "update article set valid=1,charge=:set_charge,page=:set_page where number=:set_number";
	        $stmt = $dbh->prepare($sql);
	        $stmt->bindParam(':set_number', $set_number);
	        $stmt->bindParam(':set_charge', $set_charge);
            $stmt->bindParam(':set_page',$set_page);
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
header( "Location: issue_manage.php" ) ;
exit ;

?>
