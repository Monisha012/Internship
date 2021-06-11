<!Doctype html>
<html>
<head>
	<title>Transfer History</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
	<style>
table {
	font-color:#5f0594;
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;margin-left: auto; 
  margin-right: auto;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 10px;margin-left: auto; 
  margin-right: auto;
}

table tr:nth-child(even){background-color: rgb(161, 158, 158);}

table tr:hover {background-color: rgb(161, 158, 158);}

table th {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align:center;
  background-color: #a7acf1;
  color: white;
 
</style>
	
</head>
<body>
	<div class="topnav">
  <a class="active" href="index.php">HOME</a>
  <div class="topnav-left">
  <a class="active" href="transferdetails.php">TRANSFER HISTORY</a>
  <a class="active" href="viewusers.php">VIEW USERS</a>

  </div>
</div>
</div>  
<table >
	<p style="text-align:center;color:#5f0594;
  font-family: Arial, Helvetica, sans-serif;font-size:50px";>
        TRANSFER HISTORY</p><br><h2>
	<tr>
		<th>SENDER</th>
		<th>RECEIVER</th>
		<th>CREDIT</th>
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "banking");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}

	$sql = "SELECT * FROM transfer_history";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["from_user"] ."</td><td>".  $row["to_user"] ."</td><td>" .  $row["Credit"] ."</td></tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
    $conn-> close();
	?>
</table>

</div>	
</body>
</html>