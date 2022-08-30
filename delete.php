<?php
include "connect.php";
$id=$_GET['id'];
$sql = "delete from posts where id='$id'";
$query = mysqli_query($connect, $sql);
header("location: admin.php?as=1");

?>