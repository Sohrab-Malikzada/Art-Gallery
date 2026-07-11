<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">

</head>
<body>
    <?php 
include("templates/header.php");
?>

<div class="post w-100 p-5">

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        include("./connect.php");
        $sqlSelectPost = "SELECT * FROM posts WHERE id = $id";
        $result = mysqli_query($conn, $sqlSelectPost);
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <div class="post bg-light p-4">
                <h1><?php echo $data['title']; ?></h1>
                <p><?php echo $data['date']; ?></p>
                <p><?php echo $data['content']; ?></p>
            </div>
</div>
            <?php
        }
    }
    else {
        echo "Post Not Found ❌";
    }
    ?>

</div>

<?php 
include("templates/footer.php");
?>
</body>
</html>
