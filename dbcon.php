<?php
$conn=mysqli_connect("localhost","root","Leooffice@123","myDB");
if(!$conn)
{
    die("Connection Failed.".mysqli_connect_error());
}
?>