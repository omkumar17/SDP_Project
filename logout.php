<?php

include_once 'connection.php';
if(isset($_COOKIE['userID']))
{
    setcookie("userID", "", time()-3600,'/');
    echo 'you are logged out';
}

header("refresh:1;url=index.php");


?>