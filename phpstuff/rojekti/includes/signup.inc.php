<?php
//DB hääräys
$sql = "SELECT username from users WHERE username=?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    $msg = 'FAILED: '.mysqli_error($conn);
}

mysqli_stmt_bind_param($stmt, "s", $postUname);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$resultCheck = mysqli_stmt_num_rows($stmt);

if($resultCheck > 0){
    $msg = 'Username is taken';
} else {
    $sql = "SELECT username from users WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        $msg = 'FAILED: '.mysqli_error($conn);
    }

    mysqli_stmt_bind_param($stmt, "s", $postEmail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);

    if($resultCheck > 0){
        $msg = 'Email has an account';
    } else {
        $query = "INSERT INTO users(firstName, lastName, username, email, pw) VALUES('$postFirstName', '$postLastName', '$postUname', '$postEmail', '$kryptedPw')";
        if(mysqli_query($conn, $query)){
            $msg = 'Sign up successfull';
            $msgClass = 'pass';
        } else {
            $msg = 'ERROR: '.mysqli_error($conn);
        }
    }
}



/* $query = "INSERT INTO users(firstName, lastName, username, email, pw) VALUES('$postFirstName', '$postLastName', '$postUname', '$postEmail', '$postPw')";
    if(mysqli_query($conn, $query)){
        $msg = 'Sign up successfull';
        $msgClass = 'pass';
    } else {
        $msg = 'ERROR: '.mysqli_error($conn);
    } */