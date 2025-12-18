<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === 'LOCALLYADMIN@gmail.com' && $password === 'GROUP2VIRAL') {
        $_SESSION['is_admin'] = true;
        header('Location: index.php');
    } else {
        $error = "Incorrect email or password.";
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_login.css">
</head>
<body>

    <div class="login-form">
        <div class="wrapper">
            <div class="form-box login">
                <h2>ADMIN LOG IN</h2>

                <?php if (!empty($error)): ?>
                    <p style="color:red;"><?php echo $error; ?></p>
                <?php endif; ?>

                <form action="#" method="POST">
                    <div class="input-box">
                        <input type="email" name="email" required>
                        <label>EMAIL</label>
                    </div>

                    <div class="input-box">
                        <input type="password" name="password" required>
                        <label>PASSWORD</label>
                    </div>

                    <button type="submit" class="btn">Log In</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>