<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>出稿・ゲラ戻し</title>
<head>
<body>
    <?php
    include 'config.php';
	$st_number = $_GET['number'];
	$st_issue = $_GET['issue'];
	$st_status = $_GET['status'];
    $st_place = $_GET['place'];
        
	if ($st_place == 2 || $st_place == 0) {
		$st_place = 1;
        $receive = 1;
        $send = 2;
	}else{
		$st_place = 2;
        $receive = 2;
        $send = 1;
	}
	print('<p>'.$place[$receive]."御中<br>\n");
	print("お世話になっております。\n");
	print($st_issue.'の'.$status[++$st_status]."原稿を入れましたので、ご確認ください。作業よろしくお願いします。</p>\n");
	print('<div align="right">'.$place[$send].'</div>');
    print('<form action="mail_send.php" method="get">'."\n");
    print('<input type="hidden" name="receive" value="'.$receive.'">');
    print('<input type="hidden" name="send" value="'.$send.'">');
    print('<input type="hidden" name="issue" value="'.$st_issue.'">');
    print('<input type="hidden" name="status" value="'.$st_status.'">');
    print('<input type="hidden" name="place" value="'.$st_place.'">');
    print('<input type="hidden" name="number" value="'.$st_number.'">'); 
    
    ?>
    <p><label >追加のコメント（改行や特殊文字不可）</label><br><textarea name="addtext" cols="40" row="10"></textarea></p>
    <p>
    <input type="submit" value="送信">
    <input type="reset" value="リセット">
    </p>
    </form>    
</body>
</html>
