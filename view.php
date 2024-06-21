<?php
session_start();
include("connection.php");

$email = $_SESSION['user_email'];

if (!empty($email)) {
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $searchTerm = isset($_POST['search']) ? $_POST['search'] : '';

        // Include the search code here
if (!empty($searchTerm)) {
    $searchq = mysqli_real_escape_string($conn, $searchTerm);
    $query = mysqli_query($conn, "SELECT * FROM comments WHERE comment LIKE '%$searchq%'") or die("could not search");
    $count = mysqli_num_rows($query);

    echo '<div class="container m-auto search-results"><h2>Search Results:</h2>';
    
    if ($count > 0) {
        echo '<table class="table table-bordered table-info text-center mt-3">
                <thead>
                    <tr><th>ID</th><th>Comments</th></tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_array($query)) {
            $id = $row['user_id'];
            $comment = $row['comment'];

            echo '<tr>
                    <td>' . $id . '</td>
                    <td>' . $comment . '</td>
                  </tr>';
        }

        echo '</tbody></table></div>';
    } else {
        echo '<div>No Results</div>';
    }

    exit();
}
    }
    // pagination
    $commentsPerPage = 10;

    // Get the current page number from the URL, default to page 1
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Calculate the offset based on the current page
    $offset = ($page - 1) * $commentsPerPage;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<div class="container mt-5">
    <div class="col-lg-6 m-auto">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="input-group mb-3">
                <input type="text" name="search" id="search" class="form-control" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>" placeholder="Search">
                <div class="input-group-append">
                    <input type="submit" class="btn btn-secondary mx-4" value="Search">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    // Select comments with LIMIT and OFFSET
    $sql = "SELECT * FROM comments WHERE user_email=? LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $email, $commentsPerPage, $offset);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<div class="container"> <table class="table table-bordered table-info text-center mt-5" >
        <thead>
        <tr><th>ID</th><th>Comments</th><th colspan="2">Action</th></tr>
        </thead>
        <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
            <td>' . $row['user_id']  . '</td>
            <td>' . $row['comment'] . '</td>
            <td><a class="btn btn-danger" href="delete.php?user_id=' . $row['user_id']  . '" rel="noopener noreferrer">Delete</a></td>
            <td><a class="btn btn-primary" href="edit.php?user_id=' . $row['user_id']  . '" rel="noopener noreferrer">Edit</a></td>
            </tr>';
        }
    echo '</tbody></table> <button class="btn btn-dark" onclick="Back()">Back</button>';

        // Add centered pagination links
        $sqlCount = "SELECT COUNT(*) FROM comments WHERE user_email=?";
        $stmtCount = $conn->prepare($sqlCount);
        $stmtCount->bind_param("s", $email);
        $stmtCount->execute();
        $resultCount = $stmtCount->get_result();
        $rowCount = $resultCount->fetch_assoc();
        $totalPages = ceil($rowCount['COUNT(*)'] / $commentsPerPage);

        echo '<div class="pagination d-flex justify-content-center mt-3">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<a class="btn btn-outline-secondary mx-2 mb-5" href="?page=' . $i . '">' . $i . '</a> ';
        }
        echo '</div></div>';
    } else {
        echo '<div class="container mt-3">0 Results</div>';
    }

    // Close statements
    $stmt->close();
    $stmtCount->close();
    $conn->close();
} else {
    header('location:signin.php');
    exit();
}
?>

<script>
    function Back() {
        window.location.href = 'comment.php';
    }
</script>

</body>
</html>