<?php

		
include("database.php");




?>




<html>

  <head>

       <title>Login Page</title>

  </head>

<body>

    <h2>Welcome!!!!!</h2>

    <p>Fill in your login details</p>



    <?php

    		if(array_key_exists('login', $_POST)){


    			$error = [] ;

    		  }else{

    			if (empty($_POST['username'])) {


             $error[] = "Please enter your username";
    				
    			
          }else{

            
            $username = mysqli_real_escape_string($db,$_POST['username']);
         
          }

          if(empty($_POST['password'])){

              $error[] ="Please enter your password"; 

          }else{

             
             $password = mysqli_real_escape_string($db,$_POST['password']);
          }


          if(empty($error)){

             $query = mysqli_query($db, "SELECT * from login WHERE username = '".$username."' AND password = '".$password."'") or die (mysqli_error($db));


             
                 if(mysqli_num_rows($query) == 1){


                 while($line = mysqli_fetch_array($query)) {


                        $_SESSION['login_id'] = $line['login_id'];
                        $_SESSION['username'] = $line['username'];


                            header("Location:home.php");

            }

          } else{

                        $error_msg = "Invalid Account Number and/or Password";
                        header("Location:login.php?error_message=$error_msg");
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

 


           <form action ="" method="">

		                <p>Username<input type= "text" name ="username"/></p>

		        
                    <p>Password<input type= "password" name ="password"/></p>

		        
                     <input type="submit" name="login" value="Login"/></p> 

            
            </form>



</body>
</html>