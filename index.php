<?php
session_start();
include "connection.php";
?>
<?php 
if (isset($_SESSION['id'])) {
	header("location: home.php");
}
?>
<?php
if (isset($_POST['email'])) {
$email = mysqli_real_escape_string($conn , $_POST['email']);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$checkmail = "SELECT * from users WHERE email = '$email'";
	$runcheck = mysqli_query($conn , $checkmail) or die(mysqli_error($conn));
	if (mysqli_num_rows($runcheck) > 0) {
		$played_on = date('Y-m-d H:i:s');
		$update = "UPDATE users SET played_on = '$played_on' WHERE email = '$email' ";
		$runupdate = mysqli_query($conn , $update) or die(mysqli_error($conn));
		$row = mysqli_fetch_array($runcheck);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
		header("location: home.php");
	}
	else {
		$played_on = date('Y-m-d H:i:s');
	$query = "INSERT INTO users(email,played_on) VALUES ('$email','$played_on')";
	$run = mysqli_query($conn, $query) or die(mysqli_error($conn)) ;
	if (mysqli_affected_rows($conn) > 0) {
		$query2 = "SELECT * FROM users WHERE email = '$email' ";
		$run2 = mysqli_query($conn , $query2) or die(mysqli_error($conn));
		if (mysqli_num_rows($run2) > 0) {
			$row = mysqli_fetch_array($run2);
			$id = $row['id'];
			$_SESSION['id'] = $id;
			$_SESSION['email'] = $row['email'];
			header("location: home.php");
		}
}
	else {
		echo "<script> alert('something is wrong'); </script>";
	}
}
}
else {
	echo "<script> alert('Invalid Email'); </script>";
}
}



?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Quiz game</title>
   <style>
 body {
            background-color: #663399;
        }

        .image-container {
            display: flex;
            justify-content: space-between; /* Arrange elements with space between them */
            align-items: center;
        }

        .image-container1 {
            text-align: right;
            margin-right: 10%;
        }
</style>


	</head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Quiz Game</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current ="page" href="admin.php">Admin Panel</a>
        </li>
    </div>
  </div>
</nav>


	<body bgcolor="#663399">
		<div class="image-container">
    <div>
 		 <img src="image/tom1.png" alt="Image 1">
 		</div>
 	 <div class="image-container1" style="text-align:center;">
 	 	<h1  style = "color:yellow;">Quiz Game !</h1><br><br><br><br><br><br>
   <h3  style = "color:white;">Enter Your Email</h3><br>
        <form method="POST" action="">
            <input type="email" name="email" required> &nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" value="PLAY NOW">
        </form>
    </div>
</div>
		

	</body><br><br><br><br><br>
<footer style="color:white; text-align: center;"><b>
			Copyright &copy; by Sohin Ali</b>
			</footer>

</html>