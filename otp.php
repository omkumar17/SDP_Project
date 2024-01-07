<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['otp']))
{
    $email=$_SESSION['email'];
    $otp=$_SESSION['otp'];

}
        
        $to_email=$email;
        $subject="Simple email test via php";
        $body="Your Otp is ".$otp;
        $headers="From: harshwadhwani268@gmail.com";
    
        if(mail($to_email,$subject,$body,$headers))
        {
            echo<<<_END
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Email successfully sent to $to_email...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            _END;
        }
        else
        {
            echo<<<_END
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
    if($otp1==$otp)
    {
        echo<<<_END
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congrats! You can change your password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        _END;
        header("Refresh:1;url=changepassclick.php");
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

echo<<<_END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <input type="text" name="n1" class="form-control"  size="1" maxlength="1" required>
                </div>
                <div class="col-2 mt-3">
                    <input type="text" name="n2" class="form-control" size="1" maxlength="1"required>
                </div>
                <div class="col-2 mt-3">
                    <input type="text" name="n3" class="form-control" size="1" maxlength="1"required>
                </div>
                <div class="col-2 mt-3">
                    <input type="text" name="n4" class="form-control" size="1" maxlength="1"required>
                </div>
                <div class="col-8 ms-5 mt-3 pt-4 butt">
                    <button type="submit" class="form-control" style="background-image: linear-gradient(to left,#90EE90,#87CEFA);">Verify</button><br>
                </div>
            </div>
         </div>
    </div>
</form>
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