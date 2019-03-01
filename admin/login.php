<?php 
    include "../libs/AdminLogin.php";
    $user = new AdminLogin();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $login = $user->UserLogin($username, $password);
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>

<body>
    <div class="contact-form">
        <section class="content">
            <img src="img/man.png" alt="">
            <h1>Login Here</h1>
            
            <?php 
            if (isset($login)) {
                 echo $login;
            } ?>
            <form action="" method="post">
                <div class="login-ipbox">
                    <label for="email">E-Mail*</label>
                    <input type="text" placeholder="Email" id="email" name="username" />
                </div>
                <div class="login-ipbox">
                    <label for="password">Password*</label>
                    <input type="password" placeholder="Password" id="password" name="password" />
                </div>
                <div class="login-submit-box">
                    <button type="submit" name="submit">Login</button>
                </div>
            </form>
            <!-- form -->
            <div class="button">
                <a href="#">zaman-io.blogspot.com</a>
            </div>
        </section>
    </div>
</body>

</html>
