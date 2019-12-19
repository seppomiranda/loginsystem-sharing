<?php
    require 'includes/config.php';
    require 'includes/dbh.inc.php';
    //Virheiden tutkija
    $msg = '';
    $msgClass = 'error';
    if(isset($_POST['submit'])){
        $uname = htmlspecialchars($_POST['username']);
        $pw = htmlspecialchars($_POST['pw']);
        
        //tarkistetaan vaaditut kentät
        if(!empty($uname) && !empty($pw)){
            //True
            $postUname = mysqli_real_escape_string($conn, $uname);
            $postPw = mysqli_real_escape_string($conn, $pw);
            require 'includes/login-db.php';
        } else {
            //False
            $msg = 'Please fill in all fields';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Log in</title>
</head>
<body>
    <nav>
        <a href="<?php echo ROOT_URL;?>">
            <img src="img/icon/logo.png" alt="LOGO">
        </a>
    </nav>
    <form name="loginform" action="" method="POST">
        <label><h2>Login</h2></label>
            <?php if($msg != ''): ?>
                <p class="<?php echo $msgClass;?>"><?php echo $msg;?></p>
            <?php endif; ?>
        <input type="text" name="username" placeholder="Email or username" value="<?php echo isset($_POST['username']) ? $uname : ''; ?>">
        <br>
        <input type="password" name="pw" placeholder="Password">
        <br>
        <a id="signupbtn" class="button" href="<?php echo ROOT_URL;?>signup.php">Sign up</a>
        <input id="loginbtn" class="button" type="submit" name="submit" value="Login">
    </form>
</body>
</html>