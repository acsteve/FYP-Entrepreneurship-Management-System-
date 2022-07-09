<?php
	
	session_start();
	include ("connection.php");

	if($_SERVER['REQUEST_METHOD']=="POST"){


		$matric= $_POST['matric'];
		$password= $_POST['password'];
		$type=$_POST['type'];

		$_SESSION['matric']=$matric;
		$_SESSION['type']=$type;

		$query= "SELECT * FROM user WHERE matric= '$matric' limit 1";
			
		$result= mysqli_query($con, $query);

		if($result){
				
			if($result && mysqli_num_rows($result)>0){	

				$user_data= mysqli_fetch_assoc($result);
				
				if($user_data['password']==$password && $user_data['type']==$type){

					$_SESSION['matric']= $user_data['matric'];

					if($user_data['type']== "Admin"){
						header("Location:admindashboard.php");
						die;				
					}

					else{
						header("Location:dashboardx.php");
						die;
					}

						
				}

				else if($user_data['password']!==$password){
					?>
					<script language="javascript">
					window.alert("Incorrect Matric, Role, or Password. Please try again.");
					window.history.go(-1);
					</script>
					<?php
				}

				else{
					?>
					<script language="javascript">
					window.alert("Incorrect  Role. Please try again.");
					window.history.go(-1);
					</script>
					<?php
				}
			}

			else if($result && mysqli_num_rows($result)<1){
				?>
				<script language="javascript">
				window.alert("Incorrect Matric or Password. Please try again.");
				window.history.go(-1);
				</script>
				<?php
					
			}
					
					
			
		}	

		
	}
?>