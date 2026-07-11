<?php
    if (isset($_SESSION["user"])) {
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
      <link rel="stylesheet" href="style.css">
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}

body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #0f172a, #1e293b, #2563eb);
    padding: 20px;
}

.container {
    width: 100%;
    max-width: 450px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 24px;
    padding: 40px;
    box-shadow:
        0 8px 32px rgba(0, 0, 0, 0.35),
        inset 0 1px 1px rgba(255, 255, 255, 0.15);
    animation: fadeIn 0.7s ease;
}

.container h2 {
    color: white;
    text-align: center;
    margin-bottom: 30px;
    font-size: 32px;
    font-weight: 700;
    letter-spacing: 1px;
}


.form-group {
    margin-bottom: 22px;
}

.form-control {
    width: 100%;
    padding: 16px 18px;
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.07);
    color: white;
    font-size: 15px;
    transition: all 0.3s ease;
    outline: none;
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.65);
}

.form-control:focus {
    border-color: #60a5fa;
    background: rgba(255, 255, 255, 0.12);
    box-shadow: 0 0 15px rgba(96, 165, 250, 0.35);
    transform: translateY(-2px);
}

.form-btn {
    margin-top: 10px;
}

.btn-primary {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s ease;
    box-shadow: 0 5px 20px rgba(37, 99, 235, 0.4);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.6);
}

.btn-primary:active {
    transform: scale(0.98);
}

.alert {
    padding: 14px 18px;
    border-radius: 12px;
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: 500;
}

.alert-danger {
    background: rgba(239, 68, 68, 0.15);
    border: 1px solid rgba(239, 68, 68, 0.4);
    color: #fecaca;
}

.alert-success {
    background: rgba(34, 197, 94, 0.15);
    border: 1px solid rgba(34, 197, 94, 0.4);
    color: #bbf7d0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media(max-width: 500px) {

    .container {
        padding: 30px 22px;
    }

    .container h2 {
        font-size: 26px;
    }


</style>
<body>
    
<?php

// شروع سشن برای ذخیره پیام‌ها مثل موفقیت ثبت‌نام
// و اینکه در دیگر صفحه وقتی یوزر برود دوباره به همان صفحه نرود برای حفظ امنیت یعنی هر کس را اجازه ندهد
    session_start();

// بررسی اینکه آیا فرم ارسال (Submit) شده است یا نه
    if (isset($_POST["submit"])) {
        
    // گرفتن داده‌ها از فرم (User Input)
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $PasswordRepeat = $_POST["repeat_password"];
    
    // هش کردن پسورد برای ذخیره امن در دیتابیس
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    // آرایه برای ذخیره خطاها (Error Handling System)
    $errors = array();
    
    // بررسی اینکه هیچ فیلدی خالی نباشد
    //  در اینجا و میباشد  OR   || 
    if (empty($fullName) || empty($email) || empty($password) || empty($PasswordRepeat)) {
        array_push($errors, "All fields are required.");
    }
    
    // اعتبارسنجی ایمیل (Email Validation)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid.");
    }
    
    // بررسی طول پسورد (حداقل امنیت)
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long.");
    }
    
    // بررسی تطابق پسورد و تکرار آن
    if ($password !== $PasswordRepeat) {
        array_push($errors, "Passwords do not match.");
    }
    
    // اگر خطا وجود داشته باشد، نمایش آن‌ها به کاربر
    if (count($errors) > 0) {
    
    // Loop روی تمام خطاها و نمایش آن‌ها
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }

    } else {
    
    // اتصال به دیتابیس (فایل جداگانه برای امنیت و ساختار بهتر)
        require_once "connect.php";

    
        // CHECK: آیا ایمیل قبلاً ثبت شده است؟
        $sql = "SELECT * FROM users WHERE email = ?";
    
        // ساخت prepared statement برای جلوگیری از SQL Injection
        $stmt = mysqli_stmt_init($conn);
    
        // آماده‌سازی Query
        mysqli_stmt_prepare($stmt, $sql);
    
        // Bind کردن ایمیل به کوئری
        mysqli_stmt_bind_param($stmt, "s", $email);
    
        // اجرای کوئری
        mysqli_stmt_execute($stmt);
    
        // گرفتن نتیجه
        $result = mysqli_stmt_get_result($stmt);
    
        // تعداد ریکاردهای مشابه
        $rowCount = mysqli_num_rows($result);
    
        // اگر ایمیل موجود باشد
        if ($rowCount > 0) {

            echo "<div class='alert alert-danger'>Email already exists!</div>";

        } else {

    
        // INSERT: ثبت کاربر جدید در دیتابیس
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";

            $stmt = mysqli_stmt_init($conn);

            $preparestmt = mysqli_stmt_prepare($stmt, $sql);

            if ($preparestmt) {
    
            // Bind داده‌ها به کوئری
                mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
    
                // اجرای Insert
                mysqli_stmt_execute($stmt);
    
                // ذخیره پیام موفقیت در Session
                $_SESSION["success"] = "You are registered successfully!";
    
                // ریدایرکت به همان صفحه (برای جلوگیری از دوبار submit شدن فرم)
                header("Location: login.php");

                exit();

            } else {
    
            // در صورت خطای سیستمی
                die("Something went wrong");

            }
        }
    }
    }

    // نمایش پیام موفقیت بعد از Redirect
    if (isset($_SESSION["success"])) {

        echo "<div class='alert alert-success'>" . $_SESSION["success"] . "</div>";

        // حذف پیام از سشن بعد از نمایش (one-time message)
        unset($_SESSION["success"]);
    }
?>

<!-- HTML FORM SECTION -->

        <div class="container">

        <h2>Create Account</h2>

        <!-- فرم ثبت‌نام -->
        <form action="registration.php" method="post">

        <!-- نام کامل -->
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
            

            <!-- ایمیل -->
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <!-- پسورد -->
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <!-- تکرار پسورد -->
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>

            <!-- دکمه ثبت -->
            <div class="form-btn">
                <input type="submit" class="btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div style="margin-top:8px;"><p style="color:white;">Already Registered ? <a style="color:rgb(170, 170, 170);" href="login.php">Login Here.</a></p></div>

    </div>
</body>
</html>