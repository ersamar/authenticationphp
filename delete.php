<?php
include("connection.php");
if(isset($_GET['user_id'])){
    $id=$_GET['user_id'];
    $sql="DELETE FROM comments WHERE user_id=$id";
$result=$conn->query($sql);
if($result===TRUE){
    echo "Record Deleted Successfully" ;
     header('location:view.php');
}
else
echo "Record Not Deleted";
}
$conn->close();
?>