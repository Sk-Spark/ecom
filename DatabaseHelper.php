<?php

    function getConn()
    {
        $serverName = "localhost";
        $user = "root";
        $pass = "spark@root";
        $database = "ecom";
    
        $conn = new mysqli($serverName,$user,$pass);
    
        // if($conn->connect_error)
        // {
        //     echo "Error while connecting !!!<br>";
        // }
        // else
        // {
        //     echo "Connected Successfully !!!<br>";
        // }
        
        $conn->query("use ".$database);

        return $conn;       
    } 

    function addCustomer( $FName, $LName, $Email, $Pass, $Country, $State, $City, $Pincode, $HouseNo, $LandMark, $Gender, $vk )
    {
        $conn = getConn();        
        
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

    function isEmailPresent($email)
    {
        $conn = getConn();

        $sql = "select * from customer where Email='$email'";
        // echo $sql."<br>";
        try{
            $result = $conn->query($sql);

            if($result->num_rows == 0 )
                return 0;
            else
                return 1;

        }
        catch(Exception $e)
        {
            return 2;
        }
    }

    function validateEmail($vk)
    {
        $conn = getConn();

        $sql = "update customer set Valid = 1 where Valid = '$vk'";

        try{
            // $result = $conn->query($sql);
            // return $conn->;
            mysqli_query($conn, $sql);

            if( mysqli_affected_rows($conn) > 0 )
                return 0;
            else
                return 1;

        }
        catch(Exception $e)
        {
            return 2;
        }
        finally{
            $conn->close();
        }

    }

    function verifyLogin($email, $pass)
    {
        $sql = "select id, Fname, Lname from customer where email='$email' and pass=$pass";
        $conn = getConn();

        try{
            $result = $conn->query($sql);

            if($result->num_rows == 0 )
                return 0;
            else
            {
                $row = $result->fetch_assoc();
                return $row["id"];
            }                

        }
        catch(Exception $e)
        {
            return 2;
        }
        finally{
            $conn->close();
        }

        
    }

    function getUserData($id)
    {
        $sql = "select Fname, Lname from customer where id=$id ";
        $conn = getConn();

        try{
            $result = $conn->query($sql);

            if($result->num_rows == 0 )
                return 0;
            else
            {               
                return $result;
            }                

        }
        catch(Exception $e)
        {
            return 2;
        }
        finally{
            $conn->close();
        }

        
    }


    
?>