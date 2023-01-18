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
$mail->Username = 'mailforwork.vv@gmail.com';                 // Наш логин
$mail->Password = 'k4903940mr';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('mailforwork.vv@gmail.com', 'korolvv.org');   // От кого письмо 
$mail->addAddress('vadymkorol1@gmail.com');     // Add a recipient
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