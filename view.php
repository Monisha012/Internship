<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style.css">
    <title>view customer

    </title>
</head>
<body >
    <div class="topnav">
                <a class="active" href="index.php">HOME</a>
        <div class="top-left">
                <a class="active" href="viewusers.php">VIEW CUSTOMERS</a>
                <a class="active" href="transferdetails.php">TRANSFER HISTORY</a>
        </div>         
   </div>
    
</body>
</html>
<html>
<head>
</head>
<body>
<?php

$conn = mysqli_connect('localhost','root','','banking');


if(!$conn)
    die("Error while connecting...!").mysqli_connect_error($conn);

error_reporting(0);
 $_GET[ 'sn'];
 $_GET[ 'cn'];
 $_GET[ 'ea'];
 $_GET[ 'bb'];
?>

        
<form method="post" name="tcredit" class="tabletext" ><br>
      <div>
           <table >
                <tr style="color : black;">
                    <th class="head">S_NO</th>
                    <th class="head">CUSTOMER NAME</th>
                    <th class="head">EMAIL ADDRESS</th>
                    <th class="head">CREDIT </th>
                </tr>
                <tr style="color : black;">
                    <td class="py-2"><?php echo $_GET[ 'sn' ] ?></td>
                    <td class="py-2"><?php echo $_GET[ 'cn'] ?></td>
                    <td class="py-2"><?php echo $_GET[ 'ea']?></td>
                    <td class="py-2"><?php echo $_GET[ 'bb'] ?></td>
                </tr>
           </table>
     </div>
        <br><br><br><br><br>
        
        <br><br>
        
            <div>
          
<h2 style="color:black;">SENDING INFO:</h2>
     <table >
	
	<tr style="color :black;  background-color: #a7acf1">
		<th>AMOUNT SENT BY ME</th>
		<th>RECEIVER</th>
		<th>AMOUNT TRANSFERRED</th>
                
		
	</tr>
       
      <?php
	$conn = mysqli_connect("localhost", "root", "", "banking");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}
        $temp=$_GET[ 'cn'];
	$sql = "SELECT * FROM transfer_history WHERE from_user='$temp'";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td><b>". $row["from_user"] ."</b></td><td>".  $row["to_user"] ."</td><td>" .  $row["Credit"] ."</td>
                        
                        </tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
	?>
</table>
  
<br><br><br><br><br><br>
<br><br><br>


<table>
	<h2 style="color:black;">RECEIVING INFO:</h2>
	<tr style="color : black;">
		<th>SENDER</th>
		<th>RECEIVED BY ME</th>
		<th>AMOUNT RECEIVED</th>
                
		
	</tr>
       
      <?php
	$conn = mysqli_connect("localhost", "root", "", "banking");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}
        $temp=$_GET[ 'cn'];
	$sql = "SELECT * FROM transfer_history WHERE to_user='$temp'";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["from_user"] ."</td><td><b>".  $row["to_user"] ."<b></td><td>" .  $row["Credit"] ."</td>
                        
                        </tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
	?>
</table>

     
<style>
table{
             position: absolute;
          
             left: 50%;
             right: 50%;
             transform: translate(-50% ,50%);
            margin-top: 10px;
             width: 70%;
             height: 10vh;
             background: white;
             text-align: center;
             border-collapse: collapse;
             border-spacing: 0;
             border-radius: 12px 12px 0 0;
             overflow: hidden;
             box-shadow: 0 2px 12px  #a7acf1 ;
			   background-color: #a7acf1
}
.head{
             background: #a7acf1;
             font-size: 15px;
}
.btn {
    padding: 10px;
    margin-left: 10px;
    color: white;
    background: #a7acf1;
    
    
   

}


.form{
    padding: 5px;
    top: 50%;
    height: 5vh;
    
    margin-top: 40px;
        width: 500px;
        
        color: black;
        

}
</style>
</body>
</html>