<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['otp']) && isset($_SESSION['currentDateTime'])) {
    $email = $_SESSION['email'];
    $otp = $_SESSION['otp'];
    $currentDateTime=$_SESSION['currentDateTime'];
}

else{
    header("location:login.php");
    exit();
}
// $currentDateTime = time();

// Add 10 minutes to the current time
$tenMinutesAhead = strtotime('+10 minutes', $currentDateTime);
// echo time();
// echo $tenMinutesAhead;
$to_email = $email;
$subject = "Unlock Your Account with a New Password";
// $image_url="SDP_Project/public/img/ff logo.jpeg";
// $body = "Your Otp is " . $otp;
// $headers = "From: footfusion16@gmail.com";
$body = '
    <html>
    <head>
        <style>
            body {
                font-family: "Arial", sans-serif;
                background-color: #f4f4f4;
            }

            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2.sub {
                color: green;
            }

            h3 {
                font-size: 16px;
                line-height: 1.5;
                color: #666;
            }

            h2.otp {
                background-color: #4CAF50;
                color: #fff;
                padding: 10px 15px;
                display: inline-block;
                border-radius: 5px;
                font-weight: bold;
                margin: 0 auto; /* Center-align the OTP */
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="sub">' . $subject . '</h2>
            <h3>Hello user,</h3>
            <h3>Please use the verification code below on the FootFusion Website <br>to change your password </h3><center><h2 class="otp">' . $otp . '</h2></center>
            <h3>If You did not request this then you can ignore the email</h3>
            <h3>Thanks!<br>FootFusion Team</h3>
        </div>
    </body>
    </html>
';

// Use PHPMailer to send email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Prevent email sending on every page refresh
if (!isset($_SESSION['email_sent'])) {
    $mail = new PHPMailer(true);

    try {
        // Server settings - Disable debug for security
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'omk738774@gmail.com'; // Your Gmail address
        $mail->Password   = 'exnj lhrv ejdw vjhj'; // Your App Password (16 characters)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('omk738774@gmail.com', 'FootFusion');
        $mail->addAddress($to_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'Your OTP is: ' . $otp;

        $mail->send();
        $_SESSION['email_sent'] = true;
        $emailSent = true;

    } catch (Exception $e) {
        $emailSent = false;
        $errorMessage = $mail->ErrorInfo;
    }
} else {
    // Email already sent, just check the status
    $emailSent = true;
}

if ($emailSent) {
    echo <<<_END
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Email successfully sent to $to_email...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    _END;
} else {
    echo <<<_END
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Email Sending Failed
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    _END;
}

if(isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['n3']) && isset($_POST['n4']))
{
    $n1=$_POST['n1'];
    $n2=$_POST['n2'];
    $n3=$_POST['n3'];
    $n4=$_POST['n4'];

    $otp1=$n1.$n2.$n3.$n4;
    
    // Validate OTP input - must be digits
    if (!ctype_digit($otp1)) {
        echo<<<_END
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Invalid OTP format
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        _END;
    }
    elseif (time() <= $tenMinutesAhead){
        if($otp1==$otp)
        {
            echo<<<_END
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congrats! You can change your password
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            _END;
            
            // Clear session after successful verification
            unset($_SESSION['otp']);
            unset($_SESSION['currentDateTime']);
            unset($_SESSION['email_sent']);
            
            // Use proper header redirect (avoid output before header)
            header("Location: changepassclick.php");
            exit();
        }
        else
        {
            echo<<<_END
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Please write correct otp
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            _END;
        }
    }
    else{
        echo<<<_END
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>OTP Expired
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        _END;
        
        // Clear expired session
        unset($_SESSION['otp']);
        unset($_SESSION['currentDateTime']);
        unset($_SESSION['email_sent']);
        
        header("Location: forgotpass.php");
        exit();
    }
   
}


?>
<?php

echo<<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public\img\ff logo.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Forgot Password</title>
    <style>
    body{
        background-color: #f8f9fa;
        height: 100vh;
        align-items: center;
        justify-content: center;
        background-image: linear-gradient(to left,#B0E0E6,#66CDAA);
        border-radius:20px;
    }
    .butt{
        padding-left:80px;
    }
    .pad{
        padding-top:70px;
    }
    .icon{
        padding-top:20px;
        padding-left:150px;
    }
    .text{
        padding-left:70px;
        padding-top:50px;
    }
</style>
</head>
<body>
<form action="otp.php" method="post">
    <div class="container col-lg-4 mt-4 mx-auto pad">
        <div class="card">
            <div class="row">
                <div class="icon">
                    <img src="public/img/fogot.jpeg" height="130" width="130">
                </div>
                <div class="text">Enter OTP </div>
                <div class="col-2 ms-5 mt-3 ps-3">
                    <input type="text" name="n1" class="form-control" id="otp1" maxlength="1" oninput="moveFocus(this,'otp2'); remfocus(this, 'null')" required>
                </div>
                <div class="col-2 mt-3">
                    <input type="text" name="n2" class="form-control" id="otp2" maxlength="1" oninput="moveFocus(this,'otp3'); remfocus(this, 'otp1')" required>
                </div>
                <div class="col-2 mt-3">
                    <input type="text" name="n3" class="form-control" id="otp3" maxlength="1" oninput="moveFocus(this,'otp4'); remfocus(this, 'otp2')" required>
                </div>
                <div class="col-2 mt-3">
                    <input type="text" name="n4" class="form-control" id="otp4" maxlength="1" oninput="remfocus(this, 'otp3')" required>
                </div>
                <div class="col-8 ms-5 mt-3 pt-4 butt">
                    <button type="submit" class="form-control" style="background-image: linear-gradient(to left,#90EE90,#87CEFA);">Verify</button><br>
                </div>
            </div>
         </div>
    </div>
</form>
<script>
function moveFocus(current, next) {
  if (current.value.length === current.maxLength) {
    document.getElementById(next).focus();
  }
}
function remfocus(current, prev) {
    if (current.value.length === 0) {
      document.getElementById(prev).focus();
    }
  }
</script>
</body>
</html>
_END;

?>


<!-- $to=$_SESSION['email'];
        $from="harshwadhwani268@gmail.com";
        $name="Wbesite name";
        $subject="OTP";
        $message="Your message is".$otp;
        $header="From :".$name."<".$from.">";
        if(mail($to,$subject,$message,$header))
        {
            $msg="successful";
            echo $msg;
        }
        else
        {
            echo "message unsuccessful";
        } -->
