<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>記事名更新</title>
<head>
<body>
<?php
    $st_number = $_GET['number'];
	$st_issue = $_GET['issue'];
    $st_pkey = $_GET['pkey'];
    print('<form action="update_db.php" method="get">'."\n");
    print('<input type="hidden" name="pkey" value="'.$st_pkey.'">');
    print('<p><label>記事番号：<input type="text" name="number" size="5" value="'.$st_number.'"><label></p>');
    print('<p><label>記事名：<input type="text" name="issue" size="40" value="'.$st_issue.'"><label></p>');
?>
<p>
    <input type="submit" value="更新">
    <input type="reset" value="リセット">    
</p>
</form>     
</body>
</html>