<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>校了</title>
<head>
<body>
    <?php
    include 'config.php';
    $st_number = $_GET['number'];
	$st_issue = $_GET['issue'];
    print("<p>ジーズバンク 御中<br>\n");
	print("お世話になっております。\n");
	print($st_issue."は校了でお願いします。</p>\n");
	print('<div align="right">USP研究所</div>');
    exec("php ./mail_end_article.php $st_issue > /dev/null");
    print('<p><a href="issue_manage.php">記事管理ページ</a>に戻る</p>');
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
    ?>
</body>
</html>
