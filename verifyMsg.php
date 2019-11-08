<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification</title>
    <style>
        #div_main{
            margin:auto;
            margin-top: auto;
            border: 3px solid #3372ff;
            width: 50%;
            margin-top: 10%;
            padding: 2%;

        }

        #div_head{
            text-align: center;         
        }

        #s_1{
            font-size: 220%;
            color: blueviolet;
        }

        #s_2{
            line-height: 200%;
        }
    </style>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <div id="div_main">
        <div id="div_head">
            <div id="s_1"> Thank You For registering </div> <br>
            <div id="s_2"> 
                <?php 
                    if($_GET["msg"] == '0' ) 
                    {
                        echo " Email Verified Successfully !!!" ;
                    }
                    else
                    {
                        echo " Error While Verification of Email !!!";
                    }
                ?>  
            </div>  
        </div>

    </div>
</body>
</html>