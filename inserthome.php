<?php 
include("dbcon.php");
if(isset($_POST["add"])){
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $pwd=md5($_POST['pwd']);
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $dept=$_POST['dept'];
    $salary=$_POST['salary'];
    $q="select * from employee";
    $result=mysqli_query($conn,$q);
    $count = mysqli_num_rows( $result );;
    $count+=1;
    
    if( $fname== '' || empty($fname) ||
        $email== '' || empty($email)|| 
        $pwd== '' || empty($pwd)||  
        $age== '' || empty($age)|| 
        $gender== '' || empty($gender)|| 
        $dept== '' || empty($dept)|| 
        $salary== '' || empty($salary)){
        header('location:home.php?message=fill all the details');
    }
    $q="select * from employee where email='$email';";
    $r=mysqli_query($conn,$q);
    if(mysqli_num_rows($r)== 0){
    $sql="insert into employee (id,fullName,email,pword,Age,gender,department,salary) 
    values ('$count','$fname','$email','$pwd','$age','$gender','$dept','$salary')";

    $result=mysqli_query($conn,$sql);

    if(!$result)
    {
        echo"Error : " . mysqli_error( $conn);
    }
    else
    {
        header("location:home.php?insert=New row inserted successfully.");
    }
}
else
{
    header("location:home.php?uexist=user details found. please use different email");
}


}

?>