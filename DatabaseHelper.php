<?php

    function getConn()
    {
        $serverName = "localhost";
        $user = "root";
        $pass = "spark@root";
        $database = "ecom";
    
        $conn = new mysqli($serverName,$user,$pass);
    
        if($conn->connect_error)
        {
            echo "Error while connecting !!!<br>";
        }
        else
        {
            echo "Connected Successfully !!!<br>";
        }
        
        $conn->query("use ".$database);

        return $conn;       
    } 

    function addCustomer( $FName, $LName, $Email, $Pass, $Country, $State, $City, $Pincode, $HouseNo, $LandMark, $Gender )
    {
        $conn = getConn();

        $vk = md5(time().$FName);
        
        $sql = " insert into customer(Fname, Lname, Email, Pass, Country, Sate, City, Pincode, HouseNo, LandMark, Gender, Valid )
             values(
            '$FName',
            '$LName',
            '$Email',
            '$Pass',
            '$Country',
            '$State',
            '$City',
              $Pincode,
              $HouseNo,
            '$LandMark',
            '$Gender',
             '$vk'
             ); ";

        echo $sql."<br>";

        if( $conn->query($sql) === true )
        {
            echo "true <br>";
            return true;
        }
        else
        {
            echo "false <br>";
            $error = "Erorr: ". $sql. "\n".$conn->error."\n\n";
            echo $error."<br>";
            $logFile = fopen("sqlLogs.log","w") or die("Unable to open file.");
            fwrite($logFile,$error);
            fclose($myfile);

            return false;
        }
    }

    
?>