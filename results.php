<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	?>
	<?php if(!isset($_SESSION['score'])) {
		header("location: question.php?n=1");
	}
	?>
<html>
	<head>
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
	 <body bgcolor="#253398">
	 <h1 style="text-align:center; color:yellow;">Congratulations!</h1>
<div style="text-align:center;" >
				<p style="font-size:30px; color: white;">You have successfully completed the test</p>
				<p  style= "font-size:25px; color: white;">Total points: <?php if (isset($_SESSION['score'])) {
echo $_SESSION['score']; 
}; ?> </p>
		<a href="question.php?n=1" class="start" style="font-size:30px; color: white;"><button style="background-color: red; font-size: 20px; margin-right: 10px;">Start Again</button></a>
		<a href="home.php" class="start" style="font-size:30px; color: white;">Go Home</a>
		</div>
		</main>
		</body>
		</html>

		<?php 
		$score = $_SESSION['score'];
		$email = $_SESSION['email'];
		$query = "UPDATE users SET score = '$score' WHERE email = '$email'";
		$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
 		?>


<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>
<?php }
else {
	header("location: home.php");
}
?>

