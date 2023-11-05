<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
?>

<?php
if (isset($_POST['submit'])) {
    $pass = $_POST['pass']; // Assuming 'Password' is the name of your input field
    if ($pass == "admin") {
    	echo "<script>window.location.href='adminhome.php'</script>";
       
    } else {
    	 echo "<script>alert('Invalid Password');</script>";
        
    }
} 
?><html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quiz game</title>
   <style>
  header {
    background-color: black;
    color: white;
    text-align: right; /* Align the text to the right */
  }
  .container {
    background-color: black;
    display: flex;
    justify-content: flex-end; /* Align the container to the right */
    align-items: center;
    padding: 2px;
  }
  .start {
    margin-left: 10px; /* Add some margin to the left to separate the links */
    color: white;
    text-decoration: none;
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
    </div>
  </div>
</nav><br><br>

		<main style="text-align: center;"> <!-- Add inline style to center-align the content -->
    <div>
       <h2 style = "color:red;">  Admin Panel</h2><br>
        <h2 style = "color:black;">Enter Your password</h2><br>
        <form method="POST" action="">
            <input type="password" name="pass" required>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>

		

	</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer style="color: black; text-align: center;"><b>
			Copyright &copy; by Sohin Ali</b>
			</footer>

</html>