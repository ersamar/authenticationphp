<?php
$server_name="localhost";
$username="root";
$password="erham2029";
$database="authentication";
$conn=new mysqli($server_name,$username,$password,$database);
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    
}
else
echo "";

?>