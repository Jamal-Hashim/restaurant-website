<?php

session_start();

include "db.php";

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users 
            WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        if (mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'admin') {

                    header("Location: admin/dashboard.php");
                    exit;
                } elseif ($user['role'] == 'staff') {

                    header("Location: staff/dashboard.php");
                    exit;
                }
            } else {

                $error = "Something went wrong. Please try again.";
            }
        } else {

            $error = "Something went wrong. Please try again.";
        }
    } else {

        $error = "Database error: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Restaurant Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1e293b
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            padding: 20px;
            animation: loginAppear .6s ease
        }

        .login-box {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 40px 35px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .08)
        }

        .logo {
            text-align: center;
            margin-bottom: 30px
        }

        .logo-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            border-radius: 15px;
            background: #fff4d6;
            color: #f59e0b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            transition: .3s
        }

        .logo-icon:hover {
            transform: scale(1.08) rotate(3deg)
        }

        .logo h1 {
            font-size: 25px;
            color: #f59e0b;
            margin-bottom: 6px
        }

        .logo p {
            color: #64748b;
            font-size: 14px
        }

        .form-group {
            margin-bottom: 20px
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 600
        }

        .input-box {
            position: relative
        }

        .input-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px
        }

        .input-box input {
            width: 100%;
            height: 50px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            outline: none;
            padding: 0 45px;
            font-size: 15px;
            color: #1e293b;
            background: #fff;
            transition: .25s
        }

        .input-box input:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 3px rgba(245, 158, 11, .12)
        }

        .input-box input::placeholder {
            color: #94a3b8
        }

        .password-toggle {
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            font-size: 16px;
            transition: .2s
        }

        .password-toggle:hover {
            color: #f59e0b
        }

        .login-btn {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 10px;
            background: #f59e0b;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: .25s;
            margin-top: 5px
        }

        .login-btn:hover {
            background: #e99400;
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(245, 158, 11, .2)
        }

        .login-btn:active {
            transform: translateY(0)
        }

        .footer-text {
            text-align: center;
            margin-top: 25px;
            color: #94a3b8;
            font-size: 13px
        }

        @keyframes loginAppear {
            from {
                opacity: 0;
                transform: translateY(25px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @media(max-width:480px) {
            .login-container {
                padding: 15px
            }

            .login-box {
                padding: 30px 22px
            }

            .logo h1 {
                font-size: 23px
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="login-box">

            <div class="logo">
                <div class="logo-icon">
                    <i class="fa-solid fa-utensils"></i>
                </div>

                <h1>Restaurant Login</h1>
                <p>Login to your dashboard</p>
            </div>

            <form action="login.php" method="POST">

                <div class="form-group">
                    <label for="username">Username</label>

                    <div class="input-box">
                        <i class="fa-solid fa-user"></i>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            placeholder="Enter username"
                            required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter password"
                            required>

                        <span class="password-toggle" onclick="togglePassword()">
                            <i class="fa-solid fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>

                <?php if (!empty($error)) { ?>

                    <div style="
            background:#fee2e2;
            color:#b91c1c;
            padding:12px;
            border-radius:8px;
            margin-bottom:15px;
            text-align:center;
            font-size:14px;
        ">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <?= htmlspecialchars($error) ?>
                    </div>

                <?php } ?>

                <button type="submit" name="login" class="login-btn">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    Login
                </button>

            </form>

            <div class="footer-text">
                Restaurant Management System
            </div>

        </div>

    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>