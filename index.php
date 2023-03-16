<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaundryKu</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/png" href="css/images/icon.png" />
</head>
<body>
    <section class="container">
        <div class="login-wrapper">
            <h1>LaundryKu</h1>
            <h2>Silahkan Login</h2>
            <form method="POST" action="ceklogin.php" class="form">
                <?php if (isset($_GET['msg'])) : ?>
                <div class="alert" role="alert">
                    <small><?= $_GET['msg']; ?></small>
                </div>
                <?php endif ?>
                <label for="username">Username</label>
                <input type="text" name="username" autocomplete="off">
                <label for="password">Password</label>
                <input type="password" name="password" autocomlete="off">
                <input type="submit" value="Login">
            </form>
        </div>
    </section>
</body>
</html>