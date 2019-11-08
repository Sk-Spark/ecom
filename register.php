<?php

include 'DatabaseHelper.php';
include 'mail.php';

if( $_SERVER["REQUEST_METHOD"] == "POST")
{
    $FName = $_POST["FName"];
    $LName = $_POST["LName"];
    $Email = $_POST["email"]; 
    $Pass =  $_POST["pass"];
    
    $Country  = $_POST["country"]  ;
    $State    = $_POST["state"];
    $City     = $_POST["city"];
    $Pincode  = $_POST["pincode"] ;
    $HouseNo  = $_POST["houseNo"] ;
    $LandMark = $_POST["landMark"] ;

    $Gender = $_POST["gender"]; 

    if($Gender === "male")
        $Gender = "m";
    else
        $Gender = "f";

    $rs = isEmailPresent($Email);
    // echo "rs:".$rs."<br>";

    if($rs > 0)
    {
        header("Location: indexRegister.php?error=".$rs);
        return;
    }
    $vk = md5(time().$FName);
    $rs = addCustomer( $FName, $LName, $Email, $Pass, $Country, $State, $City, $Pincode, $HouseNo, $LandMark, $Gender,$vk );

    if($rs === true)
    {
        echo "Customer add successfully !!!";
        $msg = "This your link to verify your emailid: <br> http://localhost/ecom/verify.php?vk=$vk";
        $rst = sendMail($Email, 'Email verification', $msg);
        header("Location: registrationMsg.php?k=$rst");
    }
    else
    {
        echo "error while adding customer.";
    }
        
}




?>