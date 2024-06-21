<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Add Comment Form</title>
</head>
<body>
    
<div class="container mt-5 pt-5 pb-3">
    <div class="col-lg-6 m-auto">
    <form action="commentadd.php" method="post">
    <textarea name="comment" id="" cols="30" rows="5" >Enter comment</textarea></br>
    <button class="btn btn-dark" onclick="Back()">Back</button>
    <button type="submit" class="btn btn-warning">Add comment</button>
    </form>
    </div>
</div>
<script>
    function Back() {
        window.location.href = 'comment.php';
    }
</script>
</body>
</html>