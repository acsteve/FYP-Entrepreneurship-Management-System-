<?php
    session_start();
    include ("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $lotid= $_POST['lotid'];
        $date= $_POST['date'];
        $today = date("Y-m-d");
        $status=1;
        $queryx= "SELECT * FROM rental WHERE user_matric= '".$_SESSION['matric']."' AND lot_id='$lotid' AND rental_date='$date'";
			
		$result= mysqli_query($con, $queryx);
			
		if($result){
				
			if($result && mysqli_num_rows($result)>0){	
					
				?>
					<script language="javascript">
					window.alert("This date is not available");
                    window.location.href = "rental.php";
					</script>
				<?php
					
			}
            else{
					
				$query= "insert into rental (lot_id, user_matric, form_date, rental_date, status) values ('$lotid', '".$_SESSION['matric']."', '$today', '$date', '$status')";
			
				mysqli_query($con, $query);
					
				?>
					<script language="javascript">
					window.alert("Rental application was sent");
					window.location.href = "rental.php";
					</script>
				<?php
					
				
				die;
						
			}
        }
    }

    

?>

<html>
<head>
    <title>Rent Service</title>
    <title>Rental</title>
    <link rel="stylesheet" href="css/rental.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body onload="displayfunc()">
 <div id="mySidenav" class="sidenav">
        <a id="navstyle" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
        <a class="sidebtn" href="dashboardx.php">Activities</a>
        <a href="modules.php" class="sidebtn">Modules</a>
        <a href="rental.php" class="sidebtn">Rent</a>
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
                <h2>Rent Service</h2>
            </div>

        </div>


    </div>
    
    <div class="maincont">
        
        <div id="info" class="info">

            <table class="tbstyle">

                <tr>
                    <th>No</th>
                    <th>Property Available</th>
                    <th>Charge</th>
                    <th>Action</th>                    
                </tr>

                <?php
                                               

                $sql= "SELECT * from lot";
                $result= $con-> query($sql);
                $x=1;
                $y=0;

                if ($result-> num_rows > 0){
                
                    while ($row= $result-> fetch_assoc()){
                        
                        $id[$y]=$row['lot_id'];
                        
                        echo
                        "<tr>
                        <td>". $x."</td>
                        <td>". $row["lotname"]."</td>
                        <td>". "RM".$row["charge"]."</td>
                        <td>"."<button onclick=rent($id[$y])>Apply for rent</button>"."</td>
                        </tr>";
                        $x=$x+1;
                        $y=$y+1;
                    }
                }

                ?>

            </table>
        </div>
               
        <div id="containerx">
        <form method="post">
            <h2>Rent Property</h2>
        
            <div id="inputcontainer">

            <div class="inputdiv">
                <label for="date">Select Date</label><br>
                <input id="date" class"tbox" name="date" type="date" placeholder="E.g 50.00" required="required"><br><br>
            </div>

            <input type="hidden" name="lotid" id="lotid">

            <button id="addbtn" class="addbtn">Apply</button>
            </div> 

        </form>

        </div>

        <div id="containery">
            <table class="tbstyle">

                <tr>
                    <th>No</th>   
                    <th>Property Name</th>
                    <th>Apply Date</th>
                    <th>Rent Date</th>
                    <th>Status</th>                    
                </tr>

                <?php
                                               

                $sql= "SELECT * FROM rental WHERE user_matric='".$_SESSION['matric']."'";
                $result= $con-> query($sql);
                               

                if ($result-> num_rows > 0){
               
                    $x=1;
                    $status;
                    while ($row= $result-> fetch_assoc()){

                        if($row['status']==0){
                            $status="Not enrolled";
                        }
                        else if($row['status']==1){
                            $status="Enrollment request sent";
                        }
                        else if($row['status']==2){
                            $status="Enrolled";
                        }
                        if($row['status']==3){
                            $status="Enrollment failed";
                        }
                        echo                        
                        "<tr>
                        <td>".$x."</td>
                        <td>".$row["lot_id"]."</td>
                        <td>".$row["form_date"]."</td>
                        <td>".$row["rental_date"]."</td>
                        <td>".$status."</td>
                        </tr>";
                        $x=$x+1;
                    }
                }

                ?>

            </table>
            
        </div>

        <div class="centerbtn">        
            <button id="backbtn" onclick="status()">Rent Applications</button>
            <button id="backbtnx" onclick="back()">Back</button>
        </div>

       
    </div>
        
<script>
    function displayfunc() {               
        var a = document.getElementById("containerx");
        var b = document.getElementById("containery");
        var c = document.getElementById("backbtnx");
        a.style.display = "none";
        b.style.display = "none";
        c.style.display = "none";

    }

    function rent($id){
        var a = document.getElementById("info");
        var b = document.getElementById("containerx");
        var c = document.getElementById("backbtn");
        var d = document.getElementById("backbtnx");
        c.style.display="none";
        document.getElementById('lotid').value = $id;

        if(b.style.display === "none"){
            a.style.display="none";  
            b.style.display="block";
            d.style.display="block";     
        }
        else{
            a.style.display="block";
            b.style.display="none";
            b.style.display="block";
        }
    }

    function status(){
        var a = document.getElementById("info");
        var b = document.getElementById("containerx");
        var c = document.getElementById("containery");
        var d = document.getElementById("backbtn");

        if(c.style.display === "none"){
            a.style.display="none";  
            b.style.display="none";
            c.style.display="block";
            d.innerHTML = "Back";        
        }
        else{
            a.style.display="block";  
            b.style.display="none";
            c.style.display="none";
            d.innerHTML = "Rent Applications";
        }
    }
    function back(){
        var a = document.getElementById("info");
        var b = document.getElementById("containerx");
        var c = document.getElementById("containery");
        var d = document.getElementById("backbtn");
        var e = document.getElementById("backbtnx");

        a.style.display="block";  
        b.style.display="none";
        c.style.display="none";
        d.style.display="block";
        e.style.display="none";
        
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