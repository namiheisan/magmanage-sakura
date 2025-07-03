<?php
    //Database
    $dsn = 'mysql:host=mysqxxxxx.db.sakura.ne.jp;dbname=magmanage_db;charser=utf8';
    $user = 'magmanage_db';
    $password = 'xxxxxxxxxxx';

    //Data
    $status = array('出稿前', '出稿', '第1校', '第1校戻し', '第2校', '第2校戻し', '第3校', '第3校戻し', '第4校', '第4校戻し', '第5校', '第5校戻し', '第6校', '第6校戻し', '第7校', '第7校戻し', '第8校', '第8校戻し', '第9校', '第9校戻し', '第10校', '第10校戻し', '第11校', '第11校戻し', '第12校', '第12校戻し', '第13校', '第13校戻し', '第14校', '第14校戻し', '第15校', '第15校戻し');
    $status_count = count($status) - 1;
    $charge = array('－', '編集者1', '編集者2', '編集者3');
    $charge_count = count($charge) - 1;
    $place = array('－', '制作会社', '出版社');
    $sum = 0;

    $editor_address = 'editor@example.com';
    $production_address = 'production@example.com';
    $magazine = '某マガジン';
    
    $mail_address = 'notification@?????.sakura.ne.jp';
    $mail_password = 'yyyyyyyyyyyyy';
    $mail_smtp_server = '?????.sakura.ne.jp';
    $mail_smtp_port = '587';
    $mail_secure = 'tls';
?>
