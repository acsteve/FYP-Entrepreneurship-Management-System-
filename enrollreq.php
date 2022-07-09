<?php 

session_start();
include ("connection.php");        


$rn=$_GET['rn'];

	$queryx= "SELECT * FROM register_module WHERE user_matric= '".$_SESSION['matric']."' && module_id='$rn'";
	$today = date("Y-m-d");	
	$status=1;
		$result= mysqli_query($con, $queryx);
			
		if($result){

			if($result && mysqli_num_rows($result)>0){	
					
				?>
					<script language="javascript">
					window.alert("You already sent enrollment request");
					window.location.href = "modules.php";
					</script>
				<?php
					
			}

			else{
					
				$query= "insert into register_module (user_matric, module_id, registration_date, status) values ('".$_SESSION['matric']."','$rn','$today','$status')";
			
				mysqli_query($con, $query);
					
				?>
					<script language="javascript">
					window.alert("Enrollment request was sent");
					window.location.href = "modules.php";
					</script>
				<?php
					
				
				die;
						
			}
		}

?>