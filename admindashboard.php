<html>

<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/admindashboard.css">
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
                <h2>User List</h2>

            </div>

        </div>


    </div>
    
    <div class="maincont">
        
        <div id="info" class="info">

            <table class="tbstyle">

                <tr>
                    <th>No</th>
                    <th>User Matric</th> 
                    <th>Name</th>
                    <th>Age</th>
                    <th>Action</th>                    
                </tr>
        
            <?php
                session_start();
                include ("connection.php");                               
                
                $sql= "SELECT * from user WHERE type='Student'";
                $result= $con-> query($sql);

                $x=1;
                $y=0;
                

                
                if ($result-> num_rows > 0){
                
                    while ($row= $result-> fetch_assoc()){
                         
                        echo"
                        <tr>
                            <td>".$x."</td>
                            <td>".$row['matric']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['age']."</td>
                            <td><a href = 'holdmatric.php?rn=$row[matric]'><button>View Activity</button></a></td>                   
                        <tr>";
                    }   
                    
                }
                else{
                    echo "No records found";
                }
                ?>
            
            </table>

        </div>

<script>
        
    function displayfunc() {
               
        var a = document.getElementById("userinfox");
        a.style.display = "block";
    }
    
    function userinfox($id){
        var x = document.getElementById("userinfox");
        var y = document.getElementById("info");
        var user=$id;

        

        if(x.style.display === "none"){
            x.style.display="block";
            y.style.display="none";
            
        }
        else{
            x.style.display="none";
            y.style.display="block";
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