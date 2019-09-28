<?php
    include 'mail.php';
    $rst = false;

    if( $_SERVER["REQUEST_METHOD"] == "POST" )
    {
        $id = $_POST["id"];
        $sub = $_POST["sub"];
        $msg = $_POST["msg"];
        echo "id:".$id."<br>";
        echo "sub:".$sub."<br>";
        echo "msg:".$msg."<br>";
        echo "<br>";

        $rst = sendMail($id, $sub, $msg);
        echo "#2<br>";

        if($rst==true)
            echo "<h2> Mail Send </h2><br>";
        else
            echo "<h2> Mail was not send</h2><br>";

    }
?>

<form method="POST" action="mailTest.php">

    Mail    : <input name="id" type="email" required="true"><br>
    Subject : <input name="sub" type="text" required="true"><br>
    Msg     : <input name="msg" type="text" required="true"><br>

    <button>Send</button>

</form>