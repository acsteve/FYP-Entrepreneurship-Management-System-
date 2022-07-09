<?php 

session_start();
include ("connection.php");        

$id=$_POST['id'];
$sql="SELECT capital,gross,nett FROM info WHERE id='$id'";

$retval = mysqli_query($con, $sql);
$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);

$gross= $_POST['gross'];  

$totalgross=$gross+$row['gross'];
$totalnett=$totalgross-$row['capital'];

$query="UPDATE info set gross='$totalgross',nett='$totalnett' WHERE id='$id'";

mysqli_query($con, $query);
				
	?>
	<script language="javascript">
	window.alert("Data has been added.");
	window.location.href = "dashboardx.php";
	</script>
	<?php
					
die;                
?>