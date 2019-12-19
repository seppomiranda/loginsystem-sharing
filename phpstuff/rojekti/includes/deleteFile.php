<?php
require 'config.php';
require 'dbh.inc.php';
// Tarkistaa että tulit formin kautta
if(!isset($_POST['submit'])) {
    header('Location: '.ROOT_URL.'page/');
    die;
}
//
$picId = $_POST['picId'];

$conn;

$sql = "DELETE FROM files WHERE fileId=$picId";

$result = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: '.ROOT_URL.'page/shared.php');