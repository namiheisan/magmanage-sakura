<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<title>記事名管理</title>
<head>
<body>
<h2>記事名追加</h2>
<form action="add_issue.php" method="get">
<p>
	<label>記事番号：<input type="text" name="number" size="5"></label>
</p>
<p>
	<label>記事名：<input type="text" name="issue" size="40"></label>
</p>
<p>
	<input type="submit" value="追加">
	<input type="reset" value="リセット">
</p>
</form>

<?php
    include '../config.php';
	try {
		$dbh = new PDO($dsn, $user, $password);
		$sql = 'select * from article order by number';
		print('<table border="1"><tr><th>番号</th><th>記事名</th><th>編集</th></tr>');
        foreach ($dbh->query($sql) as $row) {
			print('<tr><th>');
                        print($row['number']);
			print('</th>');
			print('<th align="left">');
                        print($row['issue']);
			print('</th>');
            print('<th>');              
            print('<a href="edit_issue.php?number='.$row['number'].'&issue='.$row['issue'].'&pkey='.$row['pkey'].'">編集</a>');
            print('</th></tr>');
                }
		print('</table>');

	}catch (PDOException $e){
    			print('Error:'.$e->getMessage());
    			die();
	}

$dbh = null;

?>

<h2>記事名削除</h2>
<form action="del_issue.php" method="get">
<p>
        <label>記事番号：<input type="text" name="number" size="5"></label>
</p>
<p>
        <input type="submit" value="削除">
        <input type="reset" value="リセット">
</p>
</form>
<p><a href="../issue_manage.php">記事管理システム</a>を開く</p>
</body>
</html>
