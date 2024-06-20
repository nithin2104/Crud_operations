<?php 
    include("header.php");
    include("dbcon.php");
?>
<?php
if(isset($_GET['uid'])|| isset($_GET['message'])||isset($_GET['umsg'])||
isset($_GET['uexist'])||isset($_GET['insert'])||isset($_GET['uidmsg'])||
isset($_GET['details'])||isset($_GET['dltmsg'])||isset($_GET['updateID'])){
?>
<div class="d-flex justify-content-between align-items-center my-2">
    <h3 class="h3">Employee Details</h3>
    <button type="button" role="button" class="btn  btn-primary" data-bs-toggle="modal" data-bs-target="#addemp">Add
        Employee</button>
    <a href="home.php" class="btn btn-primary text-center">Logout</a>
</div>
<div class="text-center">
<table id="crudTable" style="display:initial;"
    class="table text-center table-hover table-light table-bordered table-stripes">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
                $sql="Select * from employee";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    die("Error". mysqli_error($conn));
                }
                else{

                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
        <tr class="edittr">
            <td class="id"><?php echo $row["id"]; ?></td>
            <td><?php echo $row["fullName"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["Age"]; ?></td>
            <td><?php echo $row["gender"]; ?></td>
            <td><?php echo $row["department"]; ?></td>
            <td><?php echo $row["salary"]; ?></td>
            <td><button type="button" class="btn btn-success editbtn">Update</button></td>
            <td><a href="delete.php?uid=<?php echo $row["id"]; ?>" type="button" class="btn btn-danger">Delete</a>
            </td>
        </tr>

        <?php
                    }
                }
                ?>

    </tbody>
</table>
</div>
<?php
}
else
{
?>
<a href="home.php">Click here to go home</a>
<?php
}
?>
<?php
if(isset($_GET['message'])){
?>
<div class="m-2 alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Fill all the details..!</strong><button type="button"
        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if(isset($_GET['umsg'])){
?>
<div class="m-2 alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Fill all the details..! check Gender</strong><button type="button"
        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php
if(isset($_GET['uexist'])){
?>
<div class="m-2 alert alert-warning alert-dismissible fade show" role="alert">
    <strong>User with email exist plase use different email</strong><button
        type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['insert'])){
?>
<div class="m-2 alert alert-success alert-dismissible fade show" role="alert">
    <strong> New record inserted successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['uidmsg'])){
?>
<div class="m-2 alert alert-warning alert-dismissible fade show" role="alert">
    <strong> Fill all details.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['uid'])){
?>
<div class=" m-2 alert alert-success alert-dismissible fade show" role="alert">
    <strong> User login successful.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['details'])){
?>
<div class="m-2 alert alert-danger alert-dismissible fade show" role="alert">
    <strong> Enter correct details.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['dltmsg'])){
?>
<div class="m-2 alert alert-success alert-dismissible fade show" role="alert">
    <strong> Record deleted successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['updateID'])){
?>
<div class="m-2 alert alert-success alert-dismissible fade show" role="alert">
    <strong> Updated successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<!-- Modal Insert-->
<form action="insert.php" method="post">
    <div class="modal fade" id="addemp" tabindex="-1" aria-labelledby="AddEmp" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="fname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fname" id="nameId">
                        <div class="text-danger" id="nameError">please enter name (min 2 characters)</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="email form-control" name="email" id="emailId">
                        <div class="text-danger" id="emailError">please enter valid email address</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" minlength=8 name="pwd" id="passId">
                        <div class="text-danger" id="passError">
                            <ul>
                                <li>please enter password</li>
                                <li>It should conatin minimum 8 characters</li>
                                <li>it should contain 1 capital alphabet 1 small aplhabet and 1 number 1 special charatcer</li>
                            </ul>

                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="age" id="ageId">
                        <div class="text-danger" id="ageError">please enter age</div>
                    </div>
                    <label for="genderName" class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Male" name="gender" id="gender" >
                        <label class="form-check-label" for="gender" value="Male" name="gender">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Female" name="gender" id="gender" >
                        <label class="form-check-label" for="gender" value="Female" name="gender">Female</label>
                    </div>
                    <p class="text-danger" id="genderError" style="display:none;">Select Gender</p>
                    <div class="form-group mb-3">
                        <label for="dept" class="form-label">Department</label>
                        <input type="text" class="form-control" name="dept" id="deptId">
                        <div class="text-danger" id="deptError">please enter depratment name</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="salary" id="salaryId">
                        <div class="text-danger" id="salaryError">please enter salary</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add" value="ADD" id="addId">
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Update-->
<form action="update.php" method="post" class="needs-validation" novalidate>
    <div class="modal fade" id="editemp" tabindex="-1" aria-labelledby="update" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Details</h1>
                    <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="update_id">
                    <div class="form-group mb-3">
                        <label for="fname" class="form-label">Full Name</label>
                        <input type="text" id="fname" class="form-control" name="fname" required>
                        <div class="invalid-feedback">please enter name (min 2 characters)</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" id="age"  onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="age" required>
                        <div class="invalid-feedback">please enter age</div>
                    </div>
                    <label for="genderName" class="form-label">Gender</label>
                    <div class="form-check">
                        <input id="gender" class="form-check-input" type="radio" value="Male" name="gender"
                            required>
                        <label class="form-check-label" for="gender" value="Male" name="gender">Male</label>
                        <div class="invalid-feedback">please select gender</div>
                    </div>
                    <div class="form-check">
                        <input id="gender" class="form-check-input" type="radio" value="Female" name="gender"
                            required>
                        <label class="form-check-label" for="gender" value="Female" name="gender">Female</label>
                        <div class="invalid-feedback">please select gender</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="dept" class="form-label">Department</label>
                        <input id="dept" type="text" class="form-control" name="dept" required>
                        <div class="invalid-feedback">please enter depratment name</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input id="salary" type="text" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" name="salary" required>
                        <div class="invalid-feedback">please enter salary</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="update" value="Update">
                </div>
            </div>
        </div>
    </div>
</form>

<script src="registrationvalidation.js"></script>

<script>
$(document).ready(function() {

    $('.editbtn').on('click', function() {

        $('#editemp').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        //console.log(data);

        $('#update_id').val(data[0]);
        $('#fname').val(data[1]);
        $('#age').val(data[3]);
        $('#dept').val(data[5]);
        $('#salary').val(data[6]);

    });
});
</script>
</body>

</html>