<?php

include '../DatabaseHelper.php';

$email = $_POST["email"];
$pass = $_POST["pass"];

echo "email: ".$email."<br>";
echo "pass: ".$pass."<br>";

$rst = verifyLogin($email, $pass);
//if rst == 0 login is NOT successfull

// echo "rst: ".$rst."<br>";

if($rst > 0)
{
    session_start();
    $result = getUserData($rst);
    $row = $result->fetch_assoc();
    $_SESSION["user"] = $row["Fname"];
    $_SESSION["id"] = $rst;

    echo $_SESSION["user"].$_SESSION["id"];

    header("Location: ../index.php");

}


?>