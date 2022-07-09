<?php 

include ("connection.php");        

error_reporting(0);

$rn=$_GET['rn'];

$status=2;

$query="UPDATE register_module set status='$status' WHERE id='$rn'";

mysqli_query($con, $query);
				
	?>
	<script language="javascript">
	window.alert("Enrollment accepted.");
	window.location.href = "adminmodules.php";
	</script>
	<?php
					
die;                
?>