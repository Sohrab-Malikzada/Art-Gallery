<?php
// ================= CREATE =================
if (isset($_POST["create"])) {

    include("./connect.php");

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $artist = mysqli_real_escape_string($conn, $_POST["artist"]);
    $year = mysqli_real_escape_string($conn, $_POST["year"]);
    $size = mysqli_real_escape_string($conn, $_POST["size"]);
    $technique = mysqli_real_escape_string($conn, $_POST["technique"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $image = "";

    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){

        $image = time() . "_" . basename($_FILES["image"]["name"]);

        $target = "./image/" . $image;

        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        $allowed = ["jpg","jpeg","png","gif","webp"];

        if(in_array($ext,$allowed)){

            move_uploaded_file($_FILES["image"]["tmp_name"],$target);

        }else{

            die("Image type is not supported.");

        }

    }

    $sql = "INSERT INTO paintings
            (title,artist,year,size,technique,price,description,image)
            VALUES
            ('$title','$artist','$year','$size','$technique','$price','$description','$image')";

    if(mysqli_query($conn,$sql)){

        session_start();

        $_SESSION["create"]="Painting Added Successfully";

        header("Location:./index.php");

        exit();

    }else{

        die(mysqli_error($conn));

    }

}
?>


<?php
// ================= UPDATE =================

if(isset($_POST["update"])){

    include("./connect.php");

    $id = mysqli_real_escape_string($conn,$_POST["id"]);

    $title = mysqli_real_escape_string($conn,$_POST["title"]);
    $artist = mysqli_real_escape_string($conn,$_POST["artist"]);
    $year = mysqli_real_escape_string($conn,$_POST["year"]);
    $size = mysqli_real_escape_string($conn,$_POST["size"]);
    $technique = mysqli_real_escape_string($conn,$_POST["technique"]);
    $price = mysqli_real_escape_string($conn,$_POST["price"]);
    $description = mysqli_real_escape_string($conn,$_POST["description"]);

    if(isset($_FILES["image"]) && $_FILES["image"]["error"]==0){

        $image = time()."_".basename($_FILES["image"]["name"]);

        $target="./image/".$image;

        move_uploaded_file($_FILES["image"]["tmp_name"],$target);

        $sql="UPDATE paintings SET

        title='$title',
        artist='$artist',
        year='$year',
        size='$size',
        technique='$technique',
        price='$price',
        description='$description',
        image='$image'

        WHERE id='$id'";

    }else{

        $sql="UPDATE paintings SET

        title='$title',
        artist='$artist',
        year='$year',
        size='$size',
        technique='$technique',
        price='$price',
        description='$description'

        WHERE id='$id'";

    }

    if(mysqli_query($conn,$sql)){

        session_start();

        $_SESSION["update"]="Painting Updated Successfully";

        header("Location:./index.php");

        exit();

    }else{

        die(mysqli_error($conn));

    }

}
?>