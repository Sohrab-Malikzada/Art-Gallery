<?php
include("templates/header.php");
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include("./connect.php");
    $sqlEdit = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($conn, $sqlEdit);
}
else {
    echo "No post found";
}
?>


        <div class="create-form w-100 mx-auto p-4" style="max-width:700px;">
            <form action="templates/process.php" method="post">
                <?php
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                
                <div class="form-feild mb-4">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter Title:" value="<?php echo $data['title']; ?>">
                </div>
                <div class="form-feild mb-4">
                    <textarea name="summary" class="form-control" id="" cols="30" rows="10" placeholder="Enter Summary:"><?php echo $data['summary']; ?></textarea>
                </div>
                <div class="form-feild mb-4">
                    <textarea name="content" class="form-control" id="" cols="30" rows="10" placeholder="Enter Content:"><?php echo $data['content']; ?></textarea>
                </div>
                <input type="hidden" class="form-control" name="date" value="<?php echo date("Y/M/D");?>">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">

                <div class="form-feild">
                    <input type="submit" class="btn btn-info" value="Edit" name="update">
                </div>
                <?php
                }
                ?>
            </form>
        </div>
        <?php
include("templates/footer.php");
?>
