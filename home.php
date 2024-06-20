<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operations</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar bg-dark navbar-expand-sm border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#addemp" href="#">Registration</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <div id="home" class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1122&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Learning" class="img-fluid" style="position: absolute; z-index: -1; width: 100vw;height: 100vh;" />
        <div class="text-center p-2" style="width: 30%;">
            <p class="text-primary">
                <strong>Hello, <br />This is developed for learning crud operations.</strong>
            </p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Login</button>        
        </div>
    </div>

<?php
if(isset($_GET['message'])){
?>
<div class="position-absolute top-0 start-50 translate-middle-x alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Fill all the details..!</strong><button onclick="location.replace('home.php')" type="button"
        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['uexist'])){
?>
<div class="position-absolute top-0 start-50 translate-middle-x alert alert-warning alert-dismissible fade show" role="alert">
    <strong>User with email exist plase use different email</strong><button onclick="location.replace('home.php')" type="button"
        class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['insert'])){
?>
<div class="position-absolute top-0 start-50 translate-middle-x alert alert-success alert-dismissible fade show" role="alert">
    <strong> New record inserted successfully.</strong>
    <button type="button" onclick="location.replace('home.php')" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['uidmsg'])){
?>
<div class="position-absolute top-0 start-50 translate-middle-x alert alert-warning alert-dismissible fade show" role="alert">
    <strong> Fill all details.</strong>
    <button type="button" onclick="location.replace('home.php')" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<?php
if(isset($_GET['details'])){
?>
<div class="position-absolute top-0 start-50 translate-middle-x alert alert-danger alert-dismissible fade show" role="alert">
    <strong> Enter correct details.</strong>
    <button type="button" onclick="location.replace('home.php')" class="btn-close" data-bs-dismiss="alert"
        aria-label="Close"></button>
</div>
<?php
}
?>

<!-- Modal Insert-->
<form action="inserthome.php" method="post" id="addForm">
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
                        <input class="form-check-input" type="radio" value="Male" name="gender" id="gender">
                        <label class="form-check-label" for="gender" value="Male" name="gender">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Female" name="gender" id="gender">
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
                    <input type="submit" class="btn btn-primary" name="add" id="addId" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

    <!-- Modal Login-->
<form action="login.php" method="post" id="loginForm">
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <div class="form-group mb-3">
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="email form-control" id="lemailId" name="email">
                        <div id="lemailError" class="text-danger">please enter valid email address</div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" class="form-control" id="lpassId" name="pwd">
                        <div id="lpassError" class="text-danger">
                            <ul>
                                <li>please enter password</li>
                                <li>It should conatin minimum 8 characters</li>
                                <li>it should contain 1 capital alphabet 1 small aplhabet and 1 number 1 special charatcer</li>
                            </ul>
                        </div>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" name="login" id="loginId" value="Login">
            </div>
          </div>
        </div>
      </div>
</form>

<script src="registrationvalidation.js"></script>
<script src="loginvalidation.js"></script>
<script>
    (() => {
  'use strict'

  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>

</html>