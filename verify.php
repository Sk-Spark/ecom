<?php

include 'DatabaseHelper.php';

// echo "id : ".$_GET["vk"]."<br>";

$r = validateEmail($_GET["vk"]);
// echo "r: ".$r."<br>";

if($r == 0)
    {
        // echo " Email Verified Successfully !!! ";
        header("Location: verifyMsg.php?msg=0");

    }
    else
    {
        // echo " Error While Verification of Email !!!";
        header("Location: verifyMsg.php?msg=1");

    }
?>

