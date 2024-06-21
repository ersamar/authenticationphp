<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Sign Up Form</title>
    <style>
        body {
            box-sizing: border-box;
        }
        .container {
            border: 0px solid #000;
            border-radius: 7px;
            background: lightblue;
            max-width: 400px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5 pt-5 pb-3">
        <div class="col-lg-6 m-auto">
    <form method="post" action="signup.php" onsubmit="return getData()">
        <div class="form-group">
            <label for="user_name">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="user_name">
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="user_email">
        </div>
        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" id="password" name="user_password">
        </div>
        <button type="submit" class="btn btn-info">Signup</button>
    </form>
    <p class="mt-3">Have an account? <a href="signin.php">Sign in</a></p>
    </div>
    </div>
    

<script>
    function getData() {
        var name = document.getElementById('user_name').value;
        var email = document.getElementById('user_email').value;
        var password = document.getElementById('user_password').value;

        if (name === "" || email === "" || password === "") {
            alert("Please fill in all fields");
            return false; 
        }
       return true;
    }
</script>

</body>
</html>
