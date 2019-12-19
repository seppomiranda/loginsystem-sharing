<?php
// Tarkistaa että tulit formin kautta
if(!isset($_POST['submit'])) {
    header('Location: '.ROOT_URL.'page/');
    die;
}
//
require 'config.php';
require 'dbh.inc.php';
session_start();
$username = $_SESSION['username'];
$userId = $_SESSION['userId'];

// Formin lähettämät tiedot
$fileName = mysqli_real_escape_string($conn, $_POST['fileName']);
$fileComment = mysqli_real_escape_string($conn, $_POST['comment']);
$files = $_FILES['file']['name'];

// reitti paikkaan minne tiedosto tallennetaan
$filePath = '../uploadedfiles/'.basename($files);

$sql = "INSERT INTO files (user, files, filesName, filesComment) VALUES ('$username', '$files', '$fileName', '$fileComment')";
mysqli_query($conn, $sql);

move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

header('Location: '.ROOT_URL.'page/shared.php');