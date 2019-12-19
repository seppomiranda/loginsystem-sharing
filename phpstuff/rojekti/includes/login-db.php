<?php

//DB hääräys
$sql = "SELECT * FROM users WHERE username=? OR email=?;";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    $msg = 'Failed: '.mysqli_error($conn);
} else {
    mysqli_stmt_bind_param($stmt, "ss", $postUname, $postUname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $pwCheck = password_verify($postPw, $row['pw']);
        if ($pwCheck == true) {
            //salis oli oikein
            session_start();
            $_SESSION['userId'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            $msg = 'Login successful';
            $msgClass = 'pass';
            header("Location: http://localhost/phpstuff/rojekti/page/");
        } else {
            //salis oli väärin
            $msg = 'Incorrect password';

        }
    } else {
        $msg = 'User not found';
    }
}