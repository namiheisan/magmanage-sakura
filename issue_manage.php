<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="refresh" content="30">
<title>記事進捗管理</title>
<head>
<body>
<?php
    include 'config.php';
    print('<a href="issue_add.php">記事登録ページ</a>に移動する');
	try {
		$dbh = new PDO($dsn, $user, $password);
		$sql = 'select * from article where valid = 1 order by number';
		print('<table border="1"><tr><th>記事名</th><th>担当</th><th>ページ数</th><th>状態</th><th>場所</th><th>操作</th><th>校了</th><th>修正</th><th>削除</th></tr>');
                foreach ($dbh->query($sql) as $row) {
                    print('<tr><th align="left">');
                    print($row['issue']);
                    print('</th>');
                    print('<th>');
                    print($charge[$row['charge']]);
                    print('</th>');
                    print('<th>');
                    print($row['page']);
                    $sum = $sum + $row['page'];
                    print('</th>');
                    print('<th>');
                    print($status[$row['status']]);
                    print('</th>');
                    print('<th>');
                    print($place[$row['place']]);
                    print('</th>');
                    print('<th>');
                    print('<a href="sending.php?number='.$row['number'].'&issue='.$row['issue'].'&status='.$row['status'].'&place='.$row['place'].'">作業完了</a>');
                    print('</th>');
                    print('<th>');
                    print('<a href="end.php?number='.$row['number'].'&issue='.$row['issue'].'">校了</a>');
                    print('</th>');
                    print('<th>');              
                    print('<a href="edit.php?number='.$row['number'].'&issue='.$row['issue'].'&status='.$row['status'].'&charge='.$row['charge'].'&place='.$row['place'].'&page='.$row['page'].'">編集</a>');
                    print('</th>');
                    print('<th>');              
                    print('<a href="delete.php?number='.$row['number'].'">削除</a>');
                    print('</th></tr>');
                }
		print('</table>');
        print('<p>合計ページ数：'.$sum.'</p>');

	}catch (PDOException $e){
    			print('Error:'.$e->getMessage());
    			die();
	}

$dbh = null;

?>

</body>
</html>
