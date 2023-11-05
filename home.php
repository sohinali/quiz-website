<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM questions";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$total = mysqli_num_rows($run);
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
	 <h1 style="text-align:center; color:yellow;">Welcome to Quiz !</h1>
<div >
<main>
			<div style="text-align: center;">
    <p style="font-size: 50px; color: white;">This is just a simple quiz game to test your knowledge!</p>
    <ul style="list-style-position: inside; text-align: left; color: white;">
        <li style="font-size: 25px;"><strong>Number of questions: </strong><?php echo $total; ?></li>
        <li style="font-size: 25px;"><strong>Type: </strong>Multiple Choice</li>
        <li style="font-size: 25px;"><strong>Estimated time for each question: </strong><?php echo $total * 0.019 * 60; ?> seconds</li>
        <li style="font-size: 25px;"><strong>Score: </strong>&nbsp; +1 point for each correct answer</li>
    </ul>
    <div>
    <a href="question.php?n=1" class="start">
        <button style="background-color: red; font-size: 20px; margin-right: 10px;">Start quiz</button>
    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="exit.php" class="add" style="text-decoration: none; color: white; font-size:20px;"><b>Exit</b></a>
</div>


</div>


		</main>

		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer style="color: white; text-align: center;"><b>
			Copyright &copy; by Sohin ali</b>
			</footer>

	</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php }
else {
	header("location: index.php");
}
?>