<?php
include("connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['student_id']){
    $id = $_GET['student_id'];
    $sql = "DELETE from tb_enrollment WHERE student_id = $id";
    $result = mysqli_query($conn, $sql);

if($result){
echo "Success";
}


?>