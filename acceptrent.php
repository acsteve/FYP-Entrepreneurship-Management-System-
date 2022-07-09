<?php 

include ("connection.php");        

error_reporting(0);

$rn=$_GET['rn'];

$status=2;

$query="UPDATE rental set status='$status' WHERE rental_id='$rn'";

mysqli_query($con, $query);
				
	?>
	<script language="javascript">
	window.alert("Enrollment accepted.");
	window.location.href = "adminrent.php";
	</script>
	<?php
					
die;                
?>