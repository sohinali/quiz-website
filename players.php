
<?php include "connection.php"; ?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Quiz game</title>
		 <style>
       
           body {
            background-color: white;
        }

        .data-table {
            border: 2px solid black;
            border-collapse: collapse;
            margin: 0 auto; /* Center-align the table horizontally */
        }

        .data-table th, .data-table td {
            border: 2px solid black;
            padding: 8px;
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
</nav>
<body><br>
		
	<h1 style="text-align:center;"> All Players</h1><br><br>
	<table class="data-table" style="text-align:center; color:black;">
		<thead>
			<tr>
			<th>Player Id</th>
			<th>Email</th>
			<th>Played On</th>
			<th>Score</th>
			</tr>
		</thead>
		<tbody>
		<?php 
            
            $query = "SELECT * FROM users ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

