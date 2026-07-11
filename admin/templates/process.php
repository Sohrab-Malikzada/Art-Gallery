<?php
// Create function (Insert post + upload image)
if (isset($_POST["create"])) {
    include("../connect.php");

    // دریافت داده‌ها از فرم
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $summary = mysqli_real_escape_string($conn, $_POST["summary"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $imageName = mysqli_real_escape_string($conn, $_POST["imageName"]);

    // تنظیمات فایل تصویر
    $fileName = $_FILES["fileName"]["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    $tempname = $_FILES["fileName"]["tmp_name"];
    $targetpath = "../image/" . $fileName;

    // بررسی نوع فایل و آپلود
    if (!empty($fileName) && in_array(strtolower($ext), $allowedTypes)) {
        if (move_uploaded_file($tempname, $targetpath)) {
            // درج داده‌ها در دیتابیس
            $sqlInsert = "INSERT INTO posts (date, title, summary, content, imageName, fileName)
                          VALUES ('$date', '$title', '$summary', '$content', '$imageName', '$fileName')";
        } else {
            die("Error: File upload failed ❌");
        }
    } else {
        // اگر فایل انتخاب نشده یا نوع آن مجاز نیست
        $sqlInsert = "INSERT INTO posts (date, title, summary, content, imageName)
                      VALUES ('$date', '$title', '$summary', '$content', '$imageName')";
    }

    // اجرای دستور SQL
    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "Post Added successfully ✅";
        header("Location: ../index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>

<?php
// Update function
if (isset($_POST["update"])) {
    include("../connect.php");

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $summary = mysqli_real_escape_string($conn, $_POST["summary"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    $sqlUpdate = "UPDATE posts 
                  SET title = '$title', summary = '$summary', content = '$content', date = '$date'
                  WHERE id = $id";

    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Post Updated successfully ✅";
        header("Location: ../index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>
