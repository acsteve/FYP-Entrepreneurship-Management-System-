<?php
	session_start();
	
	include("connection.php");

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		//if something was posted
		$name= $_POST['name'];
		$matric= $_POST['matric'];
		$age= $_POST['age'];
		$password= $_POST['password'];
		$type="Student";
		
		
			
		$queryx= "SELECT * FROM user WHERE matric= '$matric'";
			
		$result= mysqli_query($con, $queryx);
			
		if($result){
				
			if($result && mysqli_num_rows($result)>0){	
					
				?>
					<script language="javascript">
					window.alert("This account already exist");
					window.history.go(-1);
					</script>
				<?php
					
			}

			else{
					
				$query= "insert into user (name, matric, age, password, type) values ('$name','$matric','$age','$password','$type')";
			
				mysqli_query($con, $query);
					
				?>
					<script language="javascript">
					window.alert("Registration successful. You can login now.");
					window.location.href = "index.html";
					</script>
				<?php
					
				
				die;
						
			}
		}
		
	}
?>	