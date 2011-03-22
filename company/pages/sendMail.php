<?php
$name = $_POST['Name'];

$to = $_POST['Contact'];
$subject = "SDA";
$message = $_POST['msg'];
$from = "SDA";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

echo "<p>Thank you for your Email we will get back to you shortly</p>";
?> 
