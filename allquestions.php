
<?php include "connection.php";

?>


<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Quiz game</title>
		 <style>
        
         body {
            background-color: white;
        }
        
        .data-table {
            border: 2px solid black; /* Add a black border to the table */
            border-collapse: collapse; /* Optional: To collapse the border spacing */
        }
        
        .data-table th, .data-table td {
            border: 2px solid black; /* Add a black border to table cells */
            padding: 8px; /* Optional: Add padding to cells for better spacing */
        }


    </style>
  

	</head>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current ="page" href="add.php">Add Question</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current ="page" href="allquestions.php">All Questions</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current ="page" href="players.php">Players</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current ="page" href="exit.php">Logout</a>
        </li>
    </div>
  </div>

</nav><br><br>
<h1 style="text-align:center; color:">All Questions list</h1><br>
	<table class="data-table" style="color: black;">
		<thead>
			<tr>
				<th>Q.NO</th>
				<th>Question</th>
				<th>Option1</th>
				<th>Option2</th>
				<th>Option3</th>
				<th>Option4</th>
				<th>Correct Answer </th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
        
        <?php 
            
            $query = "SELECT * FROM questions ORDER BY qno DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['qno'];
                $question = $row['question'];
                $option1 = $row['ans1'];
                $option2 = $row['ans2'];
                $option3 = $row['ans3'];
                $option4 = $row['ans4'];
                $Answer = $row['correct_answer'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td>$option1</td>";
                echo "<td>$option2</td>";
                echo "<td>$option3</td>";
                echo "<td>$option4</td>";
                echo "<td>$Answer</td>";
                echo "<td> <a href='editquestion.php?qno=$qno'> Edit </a></td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>



