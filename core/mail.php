<?
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class email {

static function request($login,$message){
	
ini_set('display_errors',0);

require $_SERVER['DOCUMENT_ROOT'].'/phpmail/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'].'/phpmail/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/phpmail/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "..."; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 465; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = '<username>';
$mail->Password = '<password>';
$mail->setFrom('...');

$mail->addAddress($login[0]);
if (isset($login[1])){$mail->addAddress($login[1]);}

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Subject = 'Request from AFF';
$mess = "$message";

$mail->msgHTML($mess); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported';
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    //echo "Message sent!";
	$rs='ok';
}	
	
return $rs;}

}
?>