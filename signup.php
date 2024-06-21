<?php

include("connection.php");
$Name=$_POST['user_name'];
$email=$_POST['user_email'];
$password=$_POST['user_password'];

$sqlQuery="INSERT INTO users(user_name,user_password,user_email) values ('$Name','$password','$email') ";
$result=$conn->query($sqlQuery);
if($result===TRUE){
echo "SignUp Successful";
header('location:signin.php');
}else
echo "SignUp Failed";
$conn->close();

?>