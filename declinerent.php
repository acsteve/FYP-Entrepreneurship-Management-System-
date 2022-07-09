<?php 

include ("connection.php");        

error_reporting(0);

$rn=$_GET['rn'];

$status=3;

$query="UPDATE rental set status='$status' WHERE rental_id='$rn'";

mysqli_query($con, $query);
				
	?>
	<script language="javascript">
	window.alert("Enrollment rejected.");
	window.location.href = "adminrent.php";
	</script>
	<?php
					
die;                
?>