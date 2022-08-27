<?php
$servername = "localhost";
$username="root";
$password="";
$db="blog";
$connect = mysqli_connect("$servername","$username","$password","$db");

if(!$connect){
    die(mysqli_connect_error());
}