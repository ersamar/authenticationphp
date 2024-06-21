<?php
session_start();
include("connection.php");
$email=$_POST['user_email'];
$password=$_POST['user_password'];
$sqlQuery="SELECT * FROM users where user_email='$email' and user_password='$password' ";
$result=$conn->query($sqlQuery);
if($result->num_rows==1){
echo "Signin Successful";
$_SESSION['user_email']=$email;
header('location:comment.php');
}else{
    echo "Signin Failed ->";
}

$conn->close();
?>