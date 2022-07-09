<?php
$rn=$_GET['rn'];

include ("connection.php");     

$query= "DELETE FROM modules WHERE module_code='$rn'";

mysqli_query($con, $query);
				
	?>
	<script language="javascript">
	window.alert("Data has been deleted.");
	window.location.href = "adminmodules.php";
	</script>
	<?php
					
die;                
?>