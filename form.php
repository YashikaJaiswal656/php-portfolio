<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>

<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                              // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';        // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                     // Enable SMTP authentication
        $mail->Username   = ''; // SMTP email
        $mail->Password   = '';      // SMTP password
        $mail->SMTPSecure = 'ssl';                    // Enable implicit SSL encryption
        $mail->Port       = 465;                      // TCP port to connect to

        // Recipients
        $mail->setFrom($_POST["email"], $_POST["name"]); // Sender Email and Name
        $mail->addAddress('');   // Add recipient email
        $mail->addReplyTo($_POST["email"], $_POST["name"]); // Reply to sender email

        // Content
        $mail->isHTML(true);                    // Set email format to HTML
        $mail->Subject = "Resume Enquiry";       // Email subject
        $mail->Body    = "{$_POST["message"]}, {$_POST["phone"]}, {$_POST["name"]}"; // Email message

        // Send email
        if ($mail->send()) {
            echo "
            <script>
                setTimeout(function() {
                    swal({
                        title: 'Success!',
                        text: 'Your message has been sent successfully!',
                        type: 'success'
                    }, function() {
                        window.location.href = 'index.php';  // Redirect back after clicking OK
                    });
                }, 100);
            </script>";
        } else {
            echo "
            <script>
                setTimeout(function() {
                    swal({
                        title: 'Error!',
                        text: 'Message could not be sent. Please try again.',
                        type: 'error'
                    });
                }, 100);
            </script>";
        }
    } catch (Exception $e) {
        echo "
        <script>
            setTimeout(function() {
                swal({
                    title: 'Error!',
                    text: 'Mailer Error: " . $mail->ErrorInfo . "',
                    type: 'error'
                });
            }, 100);
        </script>";
    }
}
?>

</body>
</html>

