<?php

	//session_start();

	include('db/database.php');

?>

	<html>

		<head>

			
			<title>Registration Page</title>


		</head>
		
		<body>

			<h1>Student Registration</h1>

			<h3>Please kindly fill the details below</h3>

				<?php

					if(array_key_exists('register', $_POST)){

						$error = array();

						if(empty($_POST['fullname'])){

							$error[] = "Please enter your Fullname";
						
						} else {

							$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
						}

						if(empty($_POST['email'])){

							$error[] = "Please enter your Email";
						
						} else {

							$email = mysqli_real_escape_string($db, $_POST['email']);
						}

						if(empty($_POST['phone'])){

							$error[] = "Please enter your Phone Number";
						
						} else {

							$phone = mysqli_real_escape_string($db, $_POST['phone']);
						}

						if(empty($_POST['username'])){

							$error[] = "Please enter your username";
						
						} else {

							$username = mysqli_real_escape_string($db, $_POST['username']);
						}

						if(empty($_POST['password'])){

							$error[] = "Please enter your Password";
						
						} else {

							$password = mysqli_real_escape_string($db, $_POST['password']);
						}

						if(empty($error)){

							$query = mysqli_query($db, "INSERT INTO reg VALUES

														(NULL,
														 '".$fullname."',
														 '".$email."',
														 '".$phone."',
														 '".$username."',
														 '".$password."')")
							or die(mysqli_error($db));

							$success = "You have successfully registered. Login in your Username and Password";

							header("Location:registration.php?success=$success");


						} else {

							foreach($error as $errors){

								echo "<p>".$errors."</p>";
							}
						}
					}

				?>

				<form action="" method="post">

					<p>Full Name: <input type="text" name="fullname"/></p>
					<p>Email Address: <input type="text" name="email"/></p>
					<p>Phone Number: <input type="text" name="phone"/></p>
					<p>Username: <input type="text" name='username'/></p>
					<p>Password: <input type="password" name="password"/></p>

					<input type="submit" name="register" value="Click to Register"/>

				</form>
				
			</body>
			
	 	</html>				