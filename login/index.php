<!-- LOGIN INDEX Page -->

<!DOCTYPE html>
<html>
<head>
    <title> E-Com </title>
    <link rel="stylesheet" type="text/css" href="../style.css" >
</head>

<body>

<?php include 'header.php'; ?>

<script>
    <?php
        if($_GET["error"] != null)
        {
            $error = $_GET["error"];
            if($error == 1)
                echo(" alert('Email ID already exist.'); ");
        }
    ?>
</script>

<div class="div_main">
    <div class="div_heading">
        Login
    </div>

    <form id="form_register" method="POST" action="login.php" >
    
        <input name="email" required="true" class="input" type="email" placeholder="E-Mail " > <br>
        <input name="pass" required="true" class="input" type="password" placeholder="Password "> <br>

        <button id="btn_register" > Login </button>

    </form>


</div>

</body>

<script>

    function allnumeric(inputtxt)
    {
       var numbers = /^[0-9]+$/;
       if(inputtxt.value.match(numbers))
       {
           return true;
       }
       else
       {            
            return false;
       }
    }
   
</script>

</html> 