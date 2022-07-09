<html>

<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/adminactivity.css">
</head>
<body onload="displayfunc()">

  <div id="mySidenav" class="sidenav">
        <a id="navstyle" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
        <a class="sidebtn" href="admindashboard.php">Activities</a>
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
                <?php
                session_start();
                $x=$_SESSION['userid'];

                echo
                               
                "<h2>".$x." Activity List"."</h2>";
                
                ?>
            </div>

        </div>


    </div>
    
    <div class="maincont">
        
        <div id="info" class="info">

            <table class="tbstyle">

                <tr>
                    <th>No</th>
                    <th>Activity</th>                  
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th>Nett Profit</th>
                </tr>
        
            <?php
                
                include ("connection.php");                               
                
                $sql= "SELECT * from info WHERE user_matric='".$_SESSION['userid']."'";
                    $today = date("Y-m-d");
                    $result= $con-> query($sql);
                    
                    $x=1;
                    if ($result-> num_rows > 0){
                    
                        while ($row= $result-> fetch_assoc()){
                            if($today > $row["date_end"]){
                                $status="Ended";
                            }
                            else{
                                $status="Ongoing";
                            }                       

                            echo
                            "<tr>
                            <td>".$x."</td>
                            <td>".$row["activity"]."</td>
                            <td>".$row["date_start"]." - ". $row["date_end"]."</td>
                            <td>".$row["duration"]." Days "."</td>
                            <td>"."$status"."</td>
                            <td>"." RM ".$row["nett"]."</td>
                            </tr>";
                            $x=$x+1;
                        }
                    }
                ?>
            
            </table>

        </div>

        <div class="totaldiv" id="totaldiv">
            <div class="boxtotal">
            
                <table>

                    <?php
                        $sql= "SELECT nett from info WHERE user_matric='".$_SESSION['userid']."'";
               
                        $result= $con-> query($sql);
                        
                        $totalnett=0;
                        if ($result-> num_rows > 0){
                
                            while ($row= $result-> fetch_assoc()){

                                $totalnett=$totalnett+$row['nett'];   
                            }
                            echo "<td>"."Total Nett Profit: RM ".number_format($totalnett, 2)."</td>";         
                        }
                    ?>
                         
                </table>
                

            </div>
        </div>

        <div class="centerbtn">
        <a href="admindashboard.php">
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