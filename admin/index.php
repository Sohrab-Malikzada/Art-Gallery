<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
</head>
<body>
<?php 
include("templates/header.php");
?>

<div class="posts-list w-100  p-5">
<?php
    if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["create"];
            ?>
        </div>
        <?php 
        unset($_SESSION["create"]);
    }    
        ?>
        <?php 
        if (isset($_SESSION["update"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["update"];
                ?>
            </div>
            <?php 
            unset($_SESSION["update"]);
        } 
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
?>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th  style="width:10%;">Publication Date</th>
            <th  style="width:10%;">Title</th>
            <th  style="width:10%;">Article</th>
            <th  style="width:10%;">Image Name</th>
            <th  style="width:10%;">Image</th>
            <th  style="width:20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            include("./connect.php");
            $sqlSelect = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sqlSelect);
            if ($result->num_rows>0) {
            while ($data = mysqli_fetch_array($result)) {
                $imageName = $data["imageName"];
                $fileName = $data["fileName"];  // image
                $imageUrl = "./image/".$fileName;
                ?>
                <tr>
                <td><?php echo $data["date"]?></td>
                <td><?php echo $data["title"]?></td>
                <td><?php echo $data["summary"]?></td>
                <td><?php echo $data["imageName"]?></td>
                <td class="text-center align-middle"><img src="<?php echo $imageUrl; ?>" alt="<?php echo $imageName; ?>" width="80" height="80" class="rounded rounded-circle d-block mx-auto"></td>
                <td class="text-center align-middle">
                    <a class="btn btn-info" href="view.php?id=<?php echo $data["id"]?>">View</a>
                    <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"]?>">Edit</a>
                    <a class="btn btn-danger" href="delete.php?id=<?php echo $data["id"]?>">Delete</a>
                </td>
                </tr>
                <?php
            } 
              }
            ?>
            
        </tbody>
    </table>
</div>

<?php 
include("templates/footer.php");
?>
</body>
</html>