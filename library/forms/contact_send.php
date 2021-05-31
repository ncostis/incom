<?php
// your name
$recipientname = $FullName;

// multiple emails
$recipientemails = explode(',', $GetRec['Rec_Field11']);
if($GetRec['Rec_Field12']<>"")
    $recipientemails[] = $GetRec['Rec_Field12']; //add email2 for fallback

foreach($recipientemails as $index=>$val){
    $recipientemails[$index] = trim($val); //trim white spaces left/right for each email
}

// subject of the email sent to you
$subject = $GetRec['Rec_Field10'];

// send an autoresponse to the user?
$autoresponse = $GetRec['Rec_Check1'];

// subject of autoresponse
$autosubject = $GetRec['Rec_Field10'];

// autoresponse message
$automessage = $GetRec['Rec_TextArea2'];

// format message
$body = "<p>".$GetRec["Rec_Field10"]."</p>
        <div style=\"border:1px solid #eee; background:#f5f5f5; width:90%; margin:auto; padding:10px;\">&ldquo;$Comments&rdquo;</div>
        <br>
        Contact Info
        <div style=\"border:1px solid #eee; background:#f5f5f5; width:90%; margin:auto; padding:10px;\">
            Full Name: $FullName<br>
            Email: $Email<br>
            Telephone Number: $Phone<br>
            Message: $Comments<br>
            Consent in data using = $Accept<br>
        </div>";



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/mailer/src/Exception.php';
require __DIR__.'/mailer/src/PHPMailer.php';
require __DIR__.'/mailer/src/SMTP.php';


/*
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail->CharSet = 'UTF-8';

    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;smtp2.example.com';     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
*/

if(PHPMailer::validateAddress($recipientemails[0])){

    $mail = new PHPMailer(true);
    try {
        $mail->CharSet = 'UTF-8';

        //Server settings
        $mail->SMTPDebug = 0;
        // $mail->isSMTP();
        // $mail->Host = $_SERVER['HTTP_HOST'];
        // $mail->SMTPAuth = false;
        // $mail->Username = '';
        // $mail->Password = '';
        // $mail->SMTPSecure = 'ssl';
        $mail->Port = 25;

        //Recipients
        $mail->setFrom($Email);
        $mail->addReplyTo($Email);

        //add emails
        foreach($recipientemails as $email){
            if(PHPMailer::validateAddress($email))
            $mail->addAddress($email);
        }

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();


        if ($autoresponse == 1 && PHPMailer::validateAddress( trim($Email) )) {
            $autosubject = stripslashes($autosubject);
            $automessage = stripslashes($automessage);

            $mail->ClearAllRecipients();
            $mail->addAddress($Email);

            $mail->Subject = $autosubject;
            $mail->Body    = $automessage;

            $mail->send();
        }

        ?>
        <div class='top10'><?= $GetRec["Rec_TextArea1"]?></div>
        <div class="top5">
            <div class='top5'>E-Μail: <?= $Email?></div>
            <div class='top5'>Full Name: <?= $FullName?></div>
            <div class='top5'>Telephone Number: <?= $Phone?></div>
            <div class='top5'>Message: <?= $Comments?></div>
            <div class='top5'>Consent in data using: <?= $Accept?></div>
        </div>
    <?php
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}else{
    echo "Invalid email.";
}
?>
