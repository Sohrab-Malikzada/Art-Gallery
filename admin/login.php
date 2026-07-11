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
    <title>Login Form</title>
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
    <div class="container">

    <!-- PHP Code Block -->
    <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "connect.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: home.php");
                    die();
                }
                else{
                    echo "<div class='alert alter-danger'>Password does not match</div>" ;
                }
            }
        }
    ?>
        <form action="login.php" method="post">

            <!-- Email -->
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter Your Email" class="form-control">
            </div>
            <!-- password -->
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter Your Password" class="form-control">
            </div>
            <!-- Submit Button -->
            <div class="form-btn">
                <input type="submit" value="Loin" name="login" class="btn-primary">
            </div>
        </form>
        <div style="margin-top:8px;"><p style="color:white;">Not Registered yet ? <a style="color:rgb(170, 170, 170);" href="registration.php">Register Here.</a></p></div>
    </div>
</body>
</html>