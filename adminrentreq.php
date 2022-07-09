<html>

<head>
<title>Rent Application</title>
<link rel="stylesheet" href="css/adminrentreq.css">
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
                    <th>User Matric</th>
                    <th>Date Requested</th>
                    <th>Rental Date</th>
                    <th>Action</th>

                    
                </tr>

                <?php
                $rn=$_GET['rn'];
                $status=1;
                include ("connection.php");                               

                $sql= "SELECT * from rental WHERE lot_id='$rn' && status='$status'";
                $result= $con-> query($sql);

                if ($result-> num_rows > 0){
                $x=1;
                    while ($row= $result-> fetch_assoc()){
                        
                        echo
                        "<tr>
                        <td>".$x."</td>
                        <td>".$row["user_matric"]."</td>
                        <td>".$row["form_date"]."</td>
                        <td>".$row["rental_date"]."</td>     
                        <td><a href = 'acceptrent.php?rn=$row[rental_id]'><button>Accept</button></a>  <a href = 'declinerent.php?rn=$row[rental_id]'><button>Reject</button></a></td>
                        </tr>";
                        $x=$x+1;
                    }
                }

                ?>

            </table>

        </div>
        <div class="centerbtn">
            <a href="adminrent.php">
		    <button id="back_btn">Back</button>
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