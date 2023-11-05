<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
	
	if (isset($_GET['n']) && is_numeric($_GET['n'])) {
	        $qno = $_GET['n'];
	        if ($qno == 1) {
	        	$_SESSION['quiz'] = 1;
	        }
	        }
	        else {
	        	header('location: question.php?n='.$_SESSION['quiz']);
	        } 
	        if (isset($_SESSION['quiz']) && $_SESSION['quiz'] == $qno) {
			$query = "SELECT * FROM questions WHERE qno = '$qno'" ;
			$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
			if (mysqli_num_rows($run) > 0) {
				$row = mysqli_fetch_array($run);
				$qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
                 $_SESSION['quiz'] = $qno;
                 $checkqsn = "SELECT * FROM questions" ;
                 $runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
                 $countqsn = mysqli_num_rows($runcheck);
                 $time = time();
                 $_SESSION['start_time'] = $time;
                 $allowed_time = $countqsn * 0.05;
                 $_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time * 60) ;
                 

			}
			else {
				echo "<script> alert('something went wrong');
			window.location.href = 'home.php'; </script> " ;
			}
		}
		else {
		echo "<script> alert('error');
			window.location.href = 'home.php'; </script> " ;
	}
?>
<?php 
$total = "SELECT * FROM questions ";
$run = mysqli_query($conn , $total) or die(mysqli_error($conn));
$totalqn = mysqli_num_rows($run);

?>
<?php } 
else {
	header("location: home.php");
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
	 <body bgcolor="green">
	 <h1 style="text-align:center; color:black;">Welcome to Quiz !</h1>
<div >
<main>
			<div style="font-size:30px; color: white;">
				<div class= "current"  style="font-size:30px; color: white;">Question <?php echo $qno; ?> to <?php echo $totalqn; ?></div>
				<p class="question" style="font-size: 25px; color: white;"><?php echo $question; ?></p>
				<form method="post" action="process.php">
					<ul class="choices" style="font-size: 25px; color: white;">
					   <li><input name="choice" type="radio" value="a" required="" style="font-size: 50px; color: white;"><?php echo $ans1; ?></li>
					   <li><input name="choice" type="radio" value="b" required="" style="font-size: 50px; color: white;"><?php echo $ans2; ?></li>
					   <li><input name="choice" type="radio" value="c" required=""style="font-size: 50px; color: white;"><?php echo $ans3; ?></li>
					   <li><input name="choice" type="radio" value="d" required="" style="font-size: 50px; color: white;"><?php echo $ans4; ?></li>
					 
					</ul>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Submit" style="background-color: red; font-size: 20px; margin-right: 10px; color: white;" >
					<input type="hidden" name="number" value="<?php echo $qno;?>">
					<br>
					<br>
					<a href="results.php" class="start" style="font-size: 30px; color: white;">Stop Quiz</a>
				</form>
			</div>
		</main>

		<br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer style="color: white; text-align: center;"><b>
			Copyright &copy; by Sohin ali</b>
			</footer>

	</body>
</html>