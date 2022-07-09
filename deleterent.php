<?php
$rn=$_GET['rn'];

include ("connection.php");     

$query= "DELETE FROM lot WHERE lot_id='$rn'";

mysqli_query($con, $query);
				
	?>
	<script language="javascript">
	window.alert("Data has been deleted.");
	window.location.href = "adminrent.php";
	</script>
	<?php
					
die;                
?>