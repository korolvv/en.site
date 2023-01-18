<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['text'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP(true);                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'site@korolvv.org';                 // Наш логин
$mail->Password = 'kOrol24914mAil_koroL_Vv';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('site@korolvv.org', 'korolvv.org');   // От кого письмо 
$mail->addAddress('mailforwork.vv@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Работа';
$mail->Body    = '
		Пользователь оставил данные <br> 
		Имя: ' . $name . ' <br>
		E-mail: ' . $email . '<br>
		Сообщение: ' . $text . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($result);

?>