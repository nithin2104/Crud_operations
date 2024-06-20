<?php 
include("dbcon.php");
if(isset($_POST["update"])){
    $id=$_POST['id'];
    $fname=$_POST['fname'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $dept=$_POST['dept'];
    $salary=$_POST['salary'];

    if( $fname== '' || empty($fname) || 
        $age== '' || empty($age)|| 
        $gender== '' || empty($gender)|| 
        $dept== '' || empty($dept)|| 
        $salary== '' || empty($salary)){
        header('location:index.php?umsg=fill all the details');
    }
    else{

        $sql="update employee set fullName='$fname', Age='$age', gender='$gender', 
        department='$dept', salary='$salary' where id='$id';";
    
        $result=mysqli_query($conn,$sql);
    
        if(!$result)
        {
            echo"Error : " . mysqli_error( $conn);
        }
        else
        {
            header("location:index.php?updateID=updated successfully.");
        }
    }


}

?>