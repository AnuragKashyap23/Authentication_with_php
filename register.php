<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registeration</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
	<div class="col-4"></div>
	<div class="col-4">
	<div>
	<form name="reg" action="register.php" method="POST">
	<h1 class="mt-5">Register here</h1>
    <input name="fullname" class="form-control mb-3" type="text"  placeholder="Fullname" required>
	<input name="username" class="form-control my-3" type="text"  placeholder="Username" required>
	<input name="password" class="form-control mb-3" type="password"  placeholder="Password" required>
	<input name="mobile" class="form-control mb-3" type="tel" placeholder="Mobile" required>
	
	<div>
	<button class="btn btn-success" name="bsave" type="submit">Register</button>
	</div>
	</div>
	</div>
	<div class="col-4"></div>
	</div>
</form>
</body>
</html>

<?php
if (isset($_REQUEST["bsave"])){
    $user=$_REQUEST["username"];
    $pass=$_REQUEST["password"];
    $mob=$_REQUEST["mobile"];
    $fname=$_REQUEST["fullname"];

    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    include('connection.php');

    $qry="INSERT INTO register(fullname, username, password, mobile) 
    VALUES('$fname','$user','$hashed_password','$mob')";

    if (mysqli_query($con,$qry)){
        echo "Succefully Registered";
    }
    else{
        echo "Error";
    }

}

?>