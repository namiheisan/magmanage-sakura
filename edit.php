<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>記事登録修正</title>
<head>
<body>
    <?php
    include 'config.php'; 
    $st_number = $_GET['number'];
	$st_issue = $_GET['issue'];
    $st_status = $_GET['status'];
	$st_charge = $_GET['charge'];
    $st_place = $_GET['place'];
	$st_page = $_GET['page'];

    print('<form action="update_article_db.php" method="get">'."\n");
    print('<p><input type="hidden" name="number" value="'.$st_number.'">');
    print('<p><label>記事名：<input type="text" name="issue" size="40" value="'.$st_issue.'"><label></p>');
    print('<p><label>担当：<select name="charge">');
    for ($i = 0; $i <= $charge_count; $i++){
        if ($i == $st_charge){
            print('<option value="'.$i.'" selected>'.$charge[$i].'</option>'); 
        }else{
            print('<option value="'.$i.'">'.$charge[$i].'</option>'); 
        }            
    }
    print('</select></label></p>');
    print('<p><label>ページ数：<input type="text" name="page" size="5" value="'.$st_page.'"><label></p>');
    print('<p><label>状態：<select name="status" value="'.$status[$st_status].'">');
    for ($i = 0; $i <= $status_count; $i++){
        if ($i == $st_status){
            print('<option value="'.$i.'" selected>'.$status[$i].'</option>'); 
        }else{
            print('<option value="'.$i.'">'.$status[$i].'</option>');
        }
    }
    print('</select></label></p>');
    print('<p><label>場所：<select name="place" value="'.$place[$st_place].'">');
    for ($i = 0; $i <=2; $i++){
        if ($i == $st_place){
            print('<option value="'.$i.'" selected>'.$place[$i].'</option>'); 
        }else{
            print('<option value="'.$i.'">'.$place[$i].'</option>'); 
        }         
    }
    print('</select></label></p>');	
?>
<p>
    <input type="submit" value="更新">
    <input type="reset" value="リセット">
</p>
</form>     
</body>
</html>
