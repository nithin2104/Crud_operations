<?php
include("dbcon.php");


if(isset($_GET["uid"])){
    $id=$_GET["uid"];

    $sql= "delete from employee where id='$id';";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        die("Error ".mysqli_error($conn));
    }
    else{
        $q="update employee set id = (id-1) where id > '$id';";
        $result=mysqli_query($conn,$q);
        header("location:index.php?dltmsg=Deleted successfully");
    }
}

?>