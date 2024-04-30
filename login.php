<?php
session_start()
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
	<div class="col-4"></div>
	<div class="col-4">
	<div>
	<form name="log" action="login.php" method="POST">
	<h1 class="mt-5">Register here</h1>
	<input name="username" class="form-control my-3" type="text"  placeholder="Username" required>
	<input name="password" class="form-control mb-3" type="password"  placeholder="Password" required>
	
	<div>
	<button class="btn btn-success" name="bsave" type="submit">Login</button>
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

    include('connection.php');

    $qry="SELECT * FROM register WHERE username='$user'";
    $result=mysqli_query($con,$qry);
    if (mysqli_affected_rows($con)>0)
    {
        $record=mysqli_fetch_array($result);
        if (password_verify($pass, $record['password'])){
            $_SESSION["user"]=$record["username"];
            header("Location:index.php");
        }
        else{
            echo "Password incorrect"; 
        }
    }	
    else{
        echo "<h1> Invalid username and password </h1>";
    }
}
?>
