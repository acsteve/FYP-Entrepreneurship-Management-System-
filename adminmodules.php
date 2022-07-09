<?php
    include ("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
		
	    //if something was posted
	    $code= $_POST['code'];
		$name= $_POST['name'];
        $date= $_POST['date'];
        $capacity=$_POST['capacity'];
        $totalenroll=0;
        $query= "insert into modules (module_code, module_name, date, capacity) 
        values 
        ('$code','".$name."','$date','$capacity')";
        
			
				mysqli_query($con, $query);
					
				?>
					<script language="javascript">
					window.alert("Data has been added.");
					window.location.href = "adminmodules.php";
					</script>
				<?php
					
				
				die;
    }

?>

<html>

<head>
<title>Online Module</title>
<link rel="stylesheet" href="css/adminmodules.css">
</head>

<body onload="displayfunc()">

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
        
        <div id="info" class="info">

            <table class="tbstyle">

                <tr>
                    <th>No</th>   
                    <th>Module Code</th>
                    <th>Module Name</th>
                    <th>Capacity</th>
                    <th>Date</th>
                    <th>Action</th>

                    
                </tr>

                <?php
                include ("connection.php");                               

                $sql= "SELECT * from modules";
                $result= $con-> query($sql);

                if ($result-> num_rows > 0){
                $x=1;
                    while ($row= $result-> fetch_assoc()){
                    
                        echo
                        "<tr>
                        <td>".$x."</td>
                        <td>".$row["module_code"]."</td>
                        <td>".$row["module_name"]."</td>
                        <td>".$row["capacity"]."</td>     
                        <td>".$row["date"]."</td>
                        <td><a href = 'adminenrollreq.php?rn=$row[module_code]'><button>View Enrollment List</button></a> "."&nbsp"." 
                            <a href = 'updatemodule.php?rn=$row[module_code]'><button>Update</button></a> "."&nbsp"." 
                            <a href = 'deletemodule.php?rn=$row[module_code]'><button>Delete</button></a></td>
                        </tr>";
                        $x=$x+1;
                    }
                }

                ?>

            </table>

        </div>

        <div id="containerx">
        <form method="post">
            
            
            <h2>Add Module</h2>
        
            <div id="inputcontainer">

            <div class="inputdiv">
                <label for="code">Module Code</label><br>
                <input id="code" class"tbox" name="code" type="text" placeholder="E.g HC22002" required="required"><br><br>
            </div>

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
            
            <button id="addbtn" class="addbtn">Add</button>
            </div> 

        </form>
            
        </div>


        <div class="centerbtn">        
            <button id="backbtn" onclick="addmodule()">Add Modules</button>
        </div>

    </div>

    
<script>
        
    function displayfunc() {
               
        var a = document.getElementById("containerx");
        a.style.display = "none";
    }
    
    function addmodule(){
        var a = document.getElementById("info");
        var b = document.getElementById("containerx");
        var c = document.getElementById("backbtn");

        if(b.style.display === "none"){
            a.style.display="none";  
            b.style.display="block";
            c.innerHTML = "Back";          
        }
        else{
            a.style.display="block";
            b.style.display="none";
            c.innerHTML = "Add Modules"; 
        }
    }
    function backfunc(){
        var x= document.getElementById("userinfox");
        var y= document.getElementById("info");
        
        x.style.display="none";
        y.style.display="block";
    }
    
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