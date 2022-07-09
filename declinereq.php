<?php 

include ("connection.php");        

error_reporting(0);

$rn=$_GET['rn'];

$status=3;

$query="UPDATE register_module set status='$status' WHERE id='$rn'";

mysqli_query($con, $query);
				
	?>
	<script language="javascript">
	window.alert("Enrollment rejected.");
	window.location.href = "adminmodules.php";
	</script>
	<?php
					
die;                
?>