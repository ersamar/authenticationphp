<?php
include("connection.php");
if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];
    $sqlQuery="SELECT * FROM comments WHERE user_id=$id";
    $result=$conn->query($sqlQuery);
    $row=$result->fetch_assoc();
}

if(isset($_POST['update'])){
    $id=$_POST['user_id'];
    $comment=$_POST['comment'];
    $sqlQuery="UPDATE comments SET comment='$comment' where user_id=$id";
    $result=$conn->query($sqlQuery);
    if($result){
        header('location:view.php');
        echo "Updated Successfully";
    }
    else
    echo "Error Updating Record".$result;
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Update</title>
</head>
<body>
    <div class="container mt-3 pt-5 pb-3">
        <div class="col-lg-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label class="form-label" for="">ID</label><input class="form-control" type="text" name="user_id" value="<?php echo $row['user_id']?>" readonly></br>
    <label class="form-label" for="">Comment</label><input class="form-control" type="text" name="comment" value="<?php echo $row['comment']?>"></br>
    <input class="btn btn-warning" type="submit" name="update" value="Update">
    </form>
    </div>
        </div>
</body>
</html>