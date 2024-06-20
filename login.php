<?php
include("dbcon.php");

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $pwd = md5($_POST["pwd"]);
    if($email== '' || empty($email)|| 
        $pwd== '' || empty($pwd)){
            header('location:home.php?uidmsg=fill all the details');
    }
    else{

        $sql="select * from employee where email='$email' and pword='$pwd';";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)> 0){
            header("location:index.php?uid=user login successful.");
    
        }
        else{
            header("location:home.php?details=Enter correct details");
        }
    }


}

?>