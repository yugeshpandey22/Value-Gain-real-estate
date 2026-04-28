<?php
session_start();
require_once '../includes/db.php';

if (isset($_SESSION['admin_logged_in'])) {
    header('Location: dashboard.php');
    exit;
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM admins WHERE username = '$username'");
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Admin not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Value Gain & Associates</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0b0c0f;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .login-card {
            background: #121418;
            padding: 3rem;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
        }
        .login-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: radial-gradient(rgba(203, 161, 83, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header img {
            height: 80px;
            margin-bottom: 1rem;
            filter: brightness(0) invert(1);
        }
        .login-header h2 {
            font-size: 1.8rem;
            color: #fff;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            color: #888;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .form-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            background: #1a1c21;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #fff;
            border-radius: 6px;
            outline: none;
            transition: 0.3s;
        }
        .form-group input:focus {
            border-color: var(--primary);
        }
        .btn-login {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: #000;
            border: none;
            border-radius: 6px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(203, 161, 83, 0.3);
        }
        .error-msg {
            color: #ff4d4d;
            background: rgba(255, 77, 77, 0.1);
            padding: 0.8rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <img src="../assets/images/logo.png" alt="Logo">
            <h2>Admin Portal</h2>
        </div>

        <?php if($error): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required placeholder="Enter username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Enter password">
            </div>
            <button type="submit" class="btn-login">Login to Dashboard</button>
        </form>
    </div>
</body>
</html>
