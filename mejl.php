<?php
session_start();
require_once 'provjeriToken.php';

$ime = $_POST['ime'];
$email = $_POST['email'];
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
$uid = $_GET['id'];
//echo "AAAAAAAAAA";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
include ('vendor/autoload.php');


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    //Server settings
    $mail->SMTPDebug = 2;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'darioborisevic@gmail.com';                     
    $mail->Password   = 'kvaaycbduowjlwpn';                               
    $mail->SMTPSecure = "tls";         
    $mail->Port       = 587;       

    
    $mail->addAddress($email, $ime);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $naslov;
    $mail->Body    = $tekst;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header_remove();
    ob_clean();
    require_once 'baza.php';
    $stmt = $pdo->prepare('INSERT INTO emails (user_id, naslov, tekst) VALUES (:user_id, :naslov, :tekst)');
    $stmt->execute(['user_id' => $uid, 'naslov' => $naslov, 'tekst' => $tekst]);
   
    echo 'Poruka je uspješno upisana!';
    header('Location: mejlPodaci.php?id='.$uid);
    //echo file_get_contents("index.php");
    /*echo 'Message has been sent';*/
} catch (Exception $e) {
    echo "Message could not be sent.";
}
