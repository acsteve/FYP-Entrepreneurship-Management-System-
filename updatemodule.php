<?php

    include ("connection.php");
    $rn=$_GET['rn'];

    if($_SERVER['REQUEST_METHOD']=="POST"){
		
	    //if something was posted
		$name= $_POST['name'];
        $date= $_POST['date'];
        $capacity=$_POST['capacity'];
        $query= "UPDATE modules set module_name='$name', date='$date', capacity='$capacity' WHERE module_code='$rn'";
        
			
				mysqli_query($con, $query);
					
				?>
					<script language="javascript">
					window.alert("Data has been updated.");
					window.location.href = "adminmodules.php";
					</script>
				<?php
					
				
				die;
    }

?>

<html>
<head>
<title>Online Module</title>
<link rel="stylesheet" href="css/updatemodule.css">
</head>

<body>

  <div id="mySidenav" class="sidenav">
        <a id="navstyle" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
        <a class="sidebtn" href="admindashboard.php">Users</a>
        <a href="adminmodules.php" class="sidebtn">Modules</a>
        <a href="adminrent.php" class="sidebtn">Rent</a>
        <a onclick="preventBack()" class="sidebtn">Logout</a>
    </div>


    <div class="container">

        <div class="content">

            <div class="navbtn">
                <span onclick="openNav()">&#9776;</span>
            </div>



            <div class="logo">
                <img class="resize" src="css/pic/logo.png" />
                <h2>Entrepreneurship Management</h2>

            </div>



            <div class="topdiv">
                <h2>Modules</h2>

            </div>

        </div>


    </div>
    
    <div class="maincont">

        <div id="containerx">
        <form method="post">
            
            <?php
            $rn=$_GET['rn'];
            echo
            "<h2>Update ".$rn." Module</h2>";
            ?>

            <div id="inputcontainer">

            <div class="inputdiv">
                <label for="name">Module Name</label><br>
                <input id="name" class"tbox" name="name" type="text" placeholder="E.g Entrepreneurship Course" required="required"><br><br>
            </div>

            <div class="inputdiv">
                <label for="date">Date</label><br>
                <input id="date" type="date" name="date" required="required"><br><br>
            </div>

            <div class="inputdiv">
                <label for="capacity">Capacity</label><br>
                <input id="capacity" name="capacity" type="number" placeholder="Eg.30" required="required"><br>
            </div>
            
            <button id="addbtn" class="addbtn">Update</button>
            </div> 

        </form>
            
        </div>


        <div class="centerbtn">        
            <a href="adminrent.php">
		    <button id="backbtn">Back</button>
            </a>
        </div>

    </div>

    
<script>
    
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function preventBack() {
        
        if(window.confirm("Do you want to log out?") == true)
        {

			window.location = "logout.php";

		}
		else{
			event.preventDefault();
		}

        window.history.forward();
        
    }

       window.onunload = function () { null };
</script>

</body>
</html>