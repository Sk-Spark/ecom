<?php

include 'DatabaseHelper.php';

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
    
    $rs = addCustomer( $FName, $LName, $Email, $Pass, $Country, $State, $City, $Pincode, $HouseNo, $LandMark, $Gender );

    if($rs === true)
    {
        echo "Customer add successfully !!!";
        header("Location: verify.php");
    }
    else
    {
        echo "error while adding customer.";
    }
        
}




?>