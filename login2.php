<?php


include("database.php");



?>

<html>
<head>
	<style >
     body{background-color: 000000;

     		color: ffffff;}
     h2{color: red;
     	font-size: 35px;
        font-family: arial;
        border: 2px solid blue hidden;
        padding: 2px;}

    p{border: 2px solid hidden;
     font-size: 25px;}


	</style>
<title>Form Trial</title>


</head>
<body>

	<h2>Login </h2>

 <?php

 		if(array_key_exists('login', $_POST)){


     			$error = [];

     		if(empty($_POST['name'])){
     			
          $error[]="Please enter a valid username";
     		
        }else{

     			$username= mysqli_real_escape_string($db,$_POST['username']);
     		}

     		if(empty($_POST['password'])){
     		
        	$error[]="please enter your password";
     		
        }else{
     			
                $password= mysqli_real_escape_string($db,$_POST['password']);
     		}

     	

              if(empty($error)){

    
                 $query = mysqli_query($db, "SELECT * FROM login WHERE username ='".$username."' AND password ='".$password."'") or die (mysqli_error($db));


                    if(mysqli_num_rows($query) == 1){


          while($line = mysqli_fetch_array($query)) {


            $_SESSION['login_id'] = $line['login_id'];
            $_SESSION['username'] = $line['username'];


                header("Location:home.php");

            }

        } else{

            $error_msg = "Invalid Account Number and/or Password";
            header("Location:form.php?error_message=$error_msg");
          }
    
        }else {//IF THE ERROR ARRAY IS NOT EMPTY
      
            foreach($error as $error){

            echo'<p>*'.$error.'</p>';



         }
      }




   }

   if(isset($_GET['error message'])){
    
    echo '<p>' .$_GET['error_message']. '</p>' ;
   
   }


?>


<form action="" method="POST">


	<p>Username:<input type="text" name="username"/></p>
	<p>Password:<input type="password" name="password"/></p>
	<input type="submit" name="login" value="login"/>


</form>



</body>
</html>