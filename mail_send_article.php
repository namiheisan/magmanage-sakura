<?php
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    include 'config.php';

    $receive = $argv[1];
    $mail_receiver = $argv[2];
    $mail_sender = $argv[3];
    $mail_issue = $argv[4];
    $mail_status = $argv[5];
    $mail_addtext = $argv[6];
    
    if ($receive == 1){
        $mail_recv_address = $production_address;
        $mail_send_address = $editor_address;
    }else{
        $mail_recv_address = $editor_address;
        $mail_send_address = $production_address;
    }
    
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->Encoding = "7bit";
    $mailer->CharSet = '"iso-2022-jp"';

    $mailer->Host = $mail_smtp_server;
    $mailer->Port = $mail_smtp_port;
    $mailer->SMTPAuth = TRUE;
    $mailer->SMTPSecure = $mail_secure;
    $mailer->Username = $mail_address;
    $mailer->Password = $mail_password;
/*    $mailer->From     = $mail_send_address; */
    $mailer->From     = $mail_address;
    $mailer->FromName = mb_encode_mimeheader(mb_convert_encoding($mail_sender,"JIS","UTF-8"));
/*    $mailer->AddCC($mail_send_address); */
    $mailer->AddCC($mail_address);
    $mailer->Subject  = mb_encode_mimeheader(mb_convert_encoding('【'.$magazine.'】'.$mail_issue.'の'.$mail_status,"JIS","UTF-8"));
    $mailer->Body     = mb_convert_encoding($mail_receiver." 御中\n".$mail_issue.'の'.$mail_status."原稿を入れましたので、ご確認ください。作業よろしくお願いします。".$mail_addtext."　".$mail_sender,"JIS","UTF-8");
    $mailer->AddAddress($mail_recv_address); 

    if($mailer->Send()){
        print("メールを送信しました");
    }
    else{
        print("エラー　".$mailer->ErrorInfo);
    }
?>