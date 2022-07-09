<?php

function check_login($con){
	
	if(isset($_SESSION['matrric'])){   //checking the session if it have user_id
		
		$id= $_SESSION['matric'];  
		$query= "select* from user where matric = '$matric' limit 1";  //check the database whether it have the matric or not
		
		$result= mysqli_query($con,$query);   // read from the database
		if($result && mysqli_num_rows($result)>0){	
			
			$user_data= mysqli_fetch_assoc($result);	
			return $user_data;	//return user data
		}
	}
	//redirect to login
	header("Location: dashboard.php");
	die;
}