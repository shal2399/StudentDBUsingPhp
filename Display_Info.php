<!DOCTYPE html>
<html>
<head>
	<title>Display Info</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		.header{
			display: flex;
			flex-direction: row;
		}
		.body{
			display: flex;
			flex-direction: column;
			width: 100%;
		}
		.block{
			display: none;
		}
	</style>
	
</head>
<body>
<div class="container">


	<div class="Header">
		<H3 style="float: left;">DISPLAY STUDENT'S RECORD</H2>
		<a href="./Student_Info.php" style="float: right;">HOME</a>
	</div>
	
	<div class="body">
		<form action="Display_Info.php" method="post">
		<p>Record:         </p>
		<label for="1">ALL:</label>
		<input id="1" type="radio" name="option" value="1" checked onchange="hand1(this)">
		<label for="2">SEARCH:</label>
		<input id="2" type="radio" name="option" value="2" onchange="hand2(this)">
		<br>
		<div class="block" id="block">
			<label for="stream">Select Stream:</label>
		<input id="stream" type="text" name="stream" placeholder="CSE/IT/ECE/MCA/M.Tech">
		<p>           </p>
		<label for="roll">Enter Roll:</label>
		<input id="roll" type="number" name="roll">
		<br>
		</div>
		<span style="align-items: center;">
		<input type="submit" name="submit" value="SUBMIT">
		</span>
	</form>
	</div>
	<div>
	<?php 
		$hostname = "localhost";
				$username = "root";
				$password = "";
				$dbname = "STUDENT";
				$con = mysqli_connect($hostname,$username,$password,$dbname);

				if(isset($_POST['submit'])){
					if($_POST['option']=="2"){
						$roll = $_POST['roll'];
						$stream = $_POST['stream'];
						$query_run=mysqli_query($con,"select * from personal_information where Roll='$roll' and Stream='$stream'");
					}else{
						$query_run=mysqli_query($con,"select * from personal_information");
					}
					if(mysqli_num_rows($query_run)>0){
						while($row  = mysqli_fetch_assoc($query_run)){
							echo "".$row['Name']."-".$row['Roll']."-".$row['Address']."-".$row['Address']."-".$row['Phone_No']."-".$row['Stream']."-".$row['Email_Id']."-".$row['Gender']."";
						}
					}else{
						echo "No Such Data Found";
					}
				}
	 ?>
</div>
</div>
</body>
<script type="text/javascript">
		function hand1(arg) {
			var block = document.getElementById("block");
			block.style.display =  "none";
		}
		function hand2(arg) {
			var block = document.getElementById("block");
			block.style.display =  "block";
		}
	</script>
</html>