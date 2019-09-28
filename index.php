<!DOCTYPE html>
<html>
<head>
    <title> E-Com </title>
    <link rel="stylesheet" type="text/css" href="style.css" >
</head>

<body>

<?php include 'header.html'; ?>
<!-- 
<div class="div_nav" >

    eCom.com

</div> -->

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
        Create a new Account
    </div>

    <form id="form_register" method="POST" action="register.php" onsubmit="return validate()" >
        <input name="FName" required="true" class="input" type="text" placeholder="First Name "> 
        <input name="LName" required="true" class="input" type="text" placeholder="Second Name " > <br>
        <input name="email" required="true" class="input" type="email" placeholder="E-Mail " > 

        <fieldset>
            <legend> Password </legend>
            <input id="pass" name="pass"   required="true" class="input" type="password" placeholder="password" > <br>
            <input id="repass" name="repass" required="true" class="input" type="password" placeholder="re-type password" > 
        </fieldset>

        <fieldset>
            <legend> Address </legend>
            <input name="country"  required="true" class="input" type="text" placeholder="Country" >  
            <input name="state"    required="true" class="input" type="text" placeholder="State" > <br>
            <input name="city"     required="true" class="input" type="text" placeholder="City" > <br>
            <input name="pincode"  id="pincode" required="true" class="input" type="text" placeholder="Pincode" > <br>
            <input name="houseNo"  id="houseNo" required="true" class="input" type="text" placeholder="House Number" > 
            <input name="landMark" required="true" class="input" type="text" placeholder="Land Mark" > <br>
        </fieldset>

        <fieldset>
            <legend> Gender </legend>
            <input id="gender_m" type="radio" name="gender" value="male"> Male<br>
            <input id="gender_f" type="radio" name="gender" value="female"> Female<br>
        </fieldset>

        <button id="btn_register" > Register </button>

    </form>

    <!-- <button id="btn_register" onclick="validate()"> Register </button> -->

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
   
    function validate()
    {
        let pass   = document.getElementById("pass").value;
        let repass = document.getElementById("repass").value;

        let m = document.getElementById("gender_m");
        let f = document.getElementById("gender_f");
        
        if(allnumeric(document.getElementById('pincode')) == false)
        {
            alert('Enter Number only in pincode.');
            allnumeric(document.getElementById('pincode')).focus();
            return false;
        }

        if(allnumeric(document.getElementById('houseNo')) == false)
        {
            alert('Enter Number only in House No.');
            document.getElementById('houseNo').focus();
            return false;
        }


        console.log(pass+" : "+repass);

        if(pass=="")
            return false;

        if(pass!=repass)        
        {
            alert("password does not match !!!");
            return false;
        }

        if(!m.checked && !f.checked)
        {
            alert("Gender NOT espacified !!!");
            return false;
        }

        return true;

    }
</script>

</html> 