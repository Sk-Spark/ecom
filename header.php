
<link rel="stylesheet" type="text/css" href="style.css" >

<?php
    session_start();
    $user = ' <a href="login/" > Login </a>';

    if($_SESSION["user"] != "" )
    {
        $user = ' <a href="logout/" >'.$_SESSION["user"].'</a>';
    }
?>

<div class="div_nav" >
    eCom.com

    <div class="div_user"> <?php echo $user; ?> </div>

</div>