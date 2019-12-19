<?php
require 'includes/config.php';
require 'includes/dbh.inc.php';
//Virheiden tutkija
$msg = '';
$sent = NULL;
$msgClass = 'error';
if(isset($_POST['submit'])){
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $uname = htmlspecialchars($_POST['uname']);
    $email = htmlspecialchars($_POST['email']);
    $pw = htmlspecialchars($_POST['spw']);
    $pw2 = htmlspecialchars($_POST['spw2']);

    //tarkistetaan vaaditut kentät
    if(empty($firstName) || empty($lastName) || empty($uname) || empty($email) || empty($pw) || empty($pw2)){
        //Failed, tyhjä input
        $msg = 'Please fill in all fields';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Failed, sposti ei ollut oikea
        $msg = 'Invalid email';
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
        //Failed, käyttäjänimessä oli muita merkkejä kuin a-z, A-Z tai 0-9
        $msg = 'Invalid username';
    } else if (!preg_match("/^[a-zA-Z]*$/", $firstName)) {
        //Failed, Etunimessä oli muita merkkejä kuin a-z tai A-Z
        $msg = 'Invalid first name';
    } else if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
        //Failed, Etunimessä oli muita merkkejä kuin a-z tai A-Z
        $msg = 'Invalid last name';
    } else if ($pw !== $pw2) {
        //Failed, Salasanat eivät täsmää
        $msg = 'Passwords don\'t match';
    } else {
        $sent = TRUE;
        $postFirstName = mysqli_real_escape_string($conn, $firstName);
        $postLastName = mysqli_real_escape_string($conn, $lastName);
        $postUname = mysqli_real_escape_string($conn, $uname);
        $postEmail = mysqli_real_escape_string($conn, $email);
        $postPw = mysqli_real_escape_string($conn, $pw);
        $kryptedPw = password_hash($postPw, PASSWORD_DEFAULT);

        require 'includes/signup.inc.php';
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
    <script src="js/login.js"></script>
    <title>Log in</title>
</head>
<body>
    <nav>
        <a href="<?php echo ROOT_URL;?>">
            <img src="img/icon/logo.png" alt="LOGO">
        </a>
    </nav>
    <form name="signform" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <label><h2>Sign up</h2></label>

        <?php if($msg != ''): ?>
            <p class="<?php echo $msgClass;?>"><?php echo $msg;?></p>
        <?php endif; ?>

        <input type="text" name="firstName" placeholder="First name" value="<?php echo isset($_POST['firstName']) ? $firstName : ''; ?>">
        <input type="text" name="lastName" placeholder="Last name" value="<?php echo isset($_POST['lastName']) ? $lastName : ''; ?>">
        <input type="text" name="uname" placeholder="Username" value="<?php echo isset($_POST['uname']) ? $uname : ''; ?>">
        <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
        <input type="password" name="spw" placeholder="Password">
        <input type="password" name="spw2" placeholder="Repeat password">
        <br>
        <a id="signupbtn" class="button" href="<?php echo ROOT_URL;?>">Login</a>
        <input type="submit" class="button" name="submit" value="Sign up">
    </form>
</body>
</html>