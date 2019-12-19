<?php 
    session_start();
    require '../includes/main-config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/nav-footer.css">
    <link rel="stylesheet" href="../css/main.css">
    <script>
        function nav(){
            const btn = document.querySelector('#links');
            if (btn.style.display == 'block') {
                btn.style.display = 'none';
            } else {
                btn.style.display = 'block';
            }
        };
        window.onresize = () => {
            const nav = document.querySelector('#links');
            const p = document.querySelector('p');
            x = window.innerWidth;
            if (x >= 800) {
                nav.style.display = 'flex';
            } else if(x <= 799) {
                nav.style.display = 'none';
            }
        }
    </script>
    <title><?php echo $title; ?></title>
</head>
<body>
    <nav>
        <div id="nav">
            <a href="<?php echo ROOT_URL;?>"><img class="column" src="../img/icon/main-logo.png" alt="LOGO"><label class="column">StudentHelper</label></a>
            <label class="hamburger" onclick="nav()">&#9776;</label>
        </div>
        <div id="links">
            <ul>
                <li>
                    <a href="<?php echo ROOT_URL; ?>">Home</a>
                </li>
                <li>
                    <a href="shared.php">Shared</a>
                </li>
                <li>
                    <form action="../includes/logout.inc.php" method="post">
                    <button name="logout" type="submit"><strong>Log out</strong></button>
                    </form>
                </li>
        </div>
    </nav>
    <?php
        if(!isset($_SESSION['userId'])){
            echo '<h1 style="text-align:center;">You aren\'t logged in!</h1>';
            echo '<a href="http://localhost/phpstuff/rojekti/" style="font-size:1.5em;">Please log in</a>';
            die;
        }
    ?>