<?php
    session_start();
    include ("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $name= $_POST['name'];
        $charge=$_POST['charge'];
        $availability=1;
        

        $query= "INSERT INTO lot (lotname, charge) values ('$name','$charge')";
		mysqli_query($con, $query);
					
		?>
		<script language="javascript">
		window.alert("Property registration successfull.");
		window.location.href = "adminrent.php";
		</script>
		<?php
					
				
		die;
    }

?>

<html>

<head>
<title>Rental</title>
<link rel="stylesheet" href="css/adminrent.css">
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
                <h2>Rental</h2>

            </div>

        </div>


    </div>
    
    <div class="maincont">
        
        <div id="info" class="info">

            <table class="tbstyle">

                <tr>
                    <th>No</th>   
                    <th>Property Name</th>
                    <th>Rental Charge</th>
                    <th>Action</th>

                    
                </tr>

                <?php
                include ("connection.php");                               

                $sql= "SELECT * from lot";
                $result= $con-> query($sql);

                if ($result-> num_rows > 0){
                $x=1;
                    while ($row= $result-> fetch_assoc()){
                    
                        echo
                        "<tr>
                        <td>".$x."</td>
                        <td>".$row["lotname"]."</td>
                        <td>"."RM".$row["charge"]."</td>     
                        <td><a href = 'adminrentreq.php?rn=$row[lot_id]'><button>Rent Application List</button></a>"."&nbsp"."
                            <a href = 'updaterent.php?rn=$row[lot_id] && rm=$row[lotname]'><button>Update</button></a>"."&nbsp"."
                            <a href = 'deleterent.php?rn=$row[lot_id]'><button>Delete</button></a>"."&nbsp"." </td>
                        </tr>";
                        $x=$x+1;
                    }
                }

                ?>

            </table>

        </div>

        <div id="containerx">
        <form method="post">
            
            
            <h2>Add Property</h2>
        
            <div id="inputcontainer">

            <div class="inputdiv">
                <label for="name">Property Name</label><br>
                <input id="name" class"tbox" name="name" type="text" placeholder="E.g Property x" required="required"><br><br>
            </div>

            <div class="inputdiv">
                <label for="charge">Property Charge(RM)</label><br>
                <input id="charge" class"tbox" name="charge" type="number" placeholder="E.g 50.00" required="required"><br><br>
            </div>
            
            <button id="addbtn" class="addbtn">Add</button>
            </div> 

        </form>
            
        </div>


        <div class="centerbtn">
            
            <button id="backbtn" onclick="addmodule()">Add Property</button>
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
            c.innerHTML = "Add Property";
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