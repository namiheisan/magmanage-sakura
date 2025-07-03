<?php
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    include 'config.php';

    $mail_issue = $argv[1];
    $mail_sender = $place[2];
    
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
    $mailer->From     = $mail_address;
    $mailer->FromName = mb_encode_mimeheader(mb_convert_encoding($mail_sender,"JIS","UTF-8"));
    $mailer->AddCC($editor_address);
    $mailer->Subject  = mb_encode_mimeheader(mb_convert_encoding('【'.$magazine.'】'.$mail_issue.'校了',"JIS","UTF-8"));
    $mailer->Body     = mb_convert_encoding($place[1]." 御中\n".$mail_issue."は校了でお願いいたします。　".$place[2],"JIS","UTF-8");
    $mailer->AddAddress($production_address); 

    if($mailer->Send()){
        print("メールを送信しました");
    }
    else{
        print("エラー ".$mailer->ErrorInfo);
    }
?>