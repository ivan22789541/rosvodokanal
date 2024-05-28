<?php 

$connect = mysqli_connect("localhost", "root", "", "rosvodokanal");

if(!$connect) {
    die('error connect database');
}