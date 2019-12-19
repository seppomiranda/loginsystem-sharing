<?php
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

if (mysqli_connect_errno()){
    echo 'Failed to connect to MySQL: '. mysqli_connect_errno();
}