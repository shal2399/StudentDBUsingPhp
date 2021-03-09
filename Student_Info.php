<!DOCTYPE html>
<html>
<head>
	<title>My Page</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}

		.container{
			width: 400px;
			height: 200px;
			position: absolute;
			top:50%;
			left:50%;
			
			transform: translate(-50%,-50%);
		}
	</style>
</head>
<body>
	
		<div>
			<?php 
				function insert($c, $name, $roll, $address, $phone, $stream, $email, $gender){
					mysqli_query($c, "insert into personal_information values ('$c', '$name', '$roll', '$address', '$phone', '$stream', '$email', '$gender')");
					echo "<br>Inserted details of".$name."!";
				}
				$hostname = "localhost";
				$username = "root";
				$password = "";
				$dbname = "STUDENT";
				$con = mysqli_connect($hostname,$username,$password,$dbname);

					if(isset($_POST['submit'])){
						$name = $_POST['name'];
						$roll = $_POST['roll'];
						settype($roll,'int');
						$address = $_POST['address'];
						$number = $_POST['phone_number'];
						settype($number,'int');
						$stream = $_POST['stream'];
						$email = $_POST['email'];
						$gender = $_POST['gender'];
						
						$queryres = mysqli_query($con, "insert into personal_information values ('$name','$roll','$address', '$number', '$stream','$email', '$gender')");
						
					}
			?>
		</div>
<div class="container">
	<form action="Student_Info.php" method="post">
		<label for="name">Type your name:</label>
		<input type="text" name="name" placeholder="John Smith"><br>
		<label for="roll">Enter your roll number:</label>
		<input type="number" name="roll" placeholder="27"><br>
		<label for="address">Type your address:</label><br>
		<textarea name="address" placeholder="Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016"></textarea><br>
		<label for="phone_number">Enter your phone number:</label>
		<input type="number" name="phone_number"><br>
		<label for="stream">Enter your stream:</label>
		<input type="text" name="stream" placeholder="CSE"><br>
		<label for="email">Enter your email id:</label>
		<input type="email" name="email" placeholder="johnSmith@email.com"><br>
		<label for="gender">Select your gender:</label>
		<select id="gender" name="gender">
			<option value="M">M</option>
			<option value="F">F</option>
		</select><br>
		<input type="submit" name="submit" value="Submit Data!">
	</form>
	</div>
</body>
</html>