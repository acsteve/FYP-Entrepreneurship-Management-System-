<?php
    session_start();
    include ("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        $module_id= $_POST['module_id'];
        

        $query= "insert into register_module (user_matric, module_id, registration_date) values ('".$_SESSION['matric']."', '$module_id', NOW())";
		mysqli_query($con, $query);
					
		?>
		<script language="javascript">
		window.alert("Module Registration Successful.");
		window.location.href = "modules.php";
		</script>
		<?php
					
				
		die;
    }

?>

<html>
<head>
    <title>Online Module</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    
body {
    margin:0px;
    font-family: "Lato", sans-serif;
    background-color: gainsboro;
}

h2{
    color:darkcyan;

}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: darkcyan;
    overflow-x: hidden;
    transition: 0.3s;
    padding-top: 60px;
}

.sidebtn {
    font-family: Verdana, sans-serif;
    padding-top:20px;
    padding-left:20px;
    padding-right:20px;
    padding-bottom:20px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: block;
    transition: 0.1s;
}

.sidebtn:hover {
    color: white;
    background-color:rgb(51, 203, 189, 0.91);
}

.sidenav .closebtn {
    position: absolute;
    top: -2px;
    right: 10px;
    font-size: 35px;
    margin-left: 8px;
    margin-right: 8px;
    margin-top: 8px;
    text-decoration: none;
    color:white;
}

@media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }

        .sidenav a {
            font-size: 18px;
        }
}


span {
    font-size: 30px;
    cursor: pointer;
}

.container {
    
    display: flex;
    justify-content:flex-start;
    min-height: 10%;   
}

.content {
    border-bottom-style: solid;
    border-bottom-color: darkcyan;
    border-bottom-width: 5px;
    margin-top:0px;
    width: 100%;
    min-height: 10%;
    overflow: hidden;   
    display: flex;
}

.navbtn {
    
    flex-basis: 5%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color:white;
    
}

.logo {
    flex-basis: 8%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: white;
    
   
}

    .logo h2 {
        margin-top: 5px;
        margin-bottom: 5px;
        text-align: center;
        font-size: 0.55em;
        color: #15317e;
    }

.topdiv {
    flex-basis: 87%;    
    display: flex;
    justify-content: center;    
    flex-direction: column;
    background: white;
}

    .topdiv h2{
         font-size:18px;
         margin-left:310px;
         margin-top:55px;

    }

.resize {
    width: 108px;
    height: 52.56px;
}
.maincont{

    margin: auto;
    justify-content: center;
    align-items: center;
    height:87.5%;
    padding-top:20px;
    text-align:center;
    width:100%;
    background-color:white;
}

.info {
    width:95%;
    margin:auto;
    box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 darkgrey;
    border-radius:5px;
    height:600px;
    max-height:800px;
    overflow-y:scroll;  
}

table {
    margin:auto;
    border-collapse: collapse;
    width: 100%;
    font-family: "Lato", sans-serif;
    font-size: 18px;
    text-align:left;

}

th {
    background-color: darkcyan;
    position: sticky;
    top: 0px;
    color:white;
}

tr:nth-child(even) {background-color: #f2f2f2;}
    
th, td {
    padding: 15px;
    
}
.containerx {
    margin:auto;
    width:95%;
    height: 600px;
    background:white;
    border-radius: 5px;
    overflow-y:scroll;
    border: none;
    box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 darkgrey;
}

.tbox input {

    background:white;
    width: 30%;
    height: 50px;
    outline: none;
    border: 2px solid darkcyan;
    padding-left: 5px;
    border-radius: 3px;
    font-size: 16px;
    color:darkcyan;
}

    .tbox input[type=text]:focus {
        border: 3px solid darkcyan;
        border-radius: 3px;
    }

    .tbox input[type=password]:focus {
        border: 1px solid blue;
        border-radius: 3px;
    }


::placeholder {
    color: lightgray;
    font-size: 16px;
}

#inputcontainer{
    margin:auto;
    width:60%;
    height:400px;    
    background: rgba(0, 0, 100%, 100%);
    
}

.inputdiv{
    width: 100%;
}

.inputdiv2{
    margin-bottom:-90px;
    width: 100%;
}

label{
    margin-top:10px;
    float: left;
    color:darkcyan;
}


input{
    padding:5px;
    border: 2px solid darkcyan;
    font-size:17px;
    width:100%;
    border-radius: 3px;
    height:50px;
}

.centerbtn{
    width:10%;
    border-radius: 5px;
    margin:auto;
}

#back_btn{
    margin-top: 40px;
    margin-bottom: -60px;
    width: 100%;
    border: solid #15317e;
    border-radius: 5px;
    background: #15317e;
    color: white;
    padding: 12px;
    font-size: 18px;
    cursor: pointer;
    transition-duration: 0.2s;
}

    #back_btn:hover {
        box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 #15317e;
    }

</style>
</head>

<body onload="displayfunc()">

 <div id="mySidenav" class="sidenav">
        <a id="navstyle" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#9776;</a>
        <a class="sidebtn" href="dashboardx.php">Activities</a>
        <a href="modules.php" class="sidebtn">Modules</a>
        <a href="rental.php" class="sidebtn">Rent</a>
        <a href="logout.php" onclick="return preventBack();" class="sidebtn">Logout</a>
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
                <h2>Online Modules</h2>

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
                    <th>Date</th>
                    <th>Capacity</th>
                    <th>Action</th>

                    
                </tr>

                <?php
                                               

                $sql= "SELECT * FROM modules";
                $result= $con-> query($sql);
                               

                if ($result-> num_rows > 0){
               
                    $x=1;
                    
                    while ($row= $result-> fetch_assoc()){
                        echo                        
                        "<tr>
                        <td>".$x."</td>
                        <td>".$row["module_code"]."</td>
                        <td>".$row["module_name"]."</td>
                        <td>".$row["date"]."</td>
                        <td>".$row["capacity"]."</td>
                        <td><a href = 'enrollreq.php?rn=$row[module_code]'><button>Enroll</button></a></td>
                        </tr>";
                        $x=$x+1;
                    }
                }

                ?>

            </table>
        </div>

        <div id="register" class="containerx">
        
        
            <table class="tbstyle">

                <tr>
                    <th>No</th>   
                    <th>Module Code</th>
                    <th>Registration Date</th>
                    <th>Status</th>                    
                </tr>

                <?php
                                               

                $sql= "SELECT * FROM register_module";
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
                        <td>".$row["module_id"]."</td>
                        <td>".$row["registration_date"]."</td>
                        <td>".$status."</td>
                        </tr>";
                        $x=$x+1;
                    }
                }

                ?>

            </table>

        </div>
        <div class="centerbtn">
            <button id="back_btn" onclick="enrollfunc()">View Enrollment</button>
        </div>
       
    </div>
        
<script>
        
    function displayfunc() {
               
        var a = document.getElementById("register");
        a.style.display = "none";               
    }
    
    function enrollfunc(){
        var a = document.getElementById("register");
        var b = document.getElementById("info");
        var c = document.getElementById("back_btn");

        if(a.style.display === "none"){
            a.style.display="block";
            b.style.display="none";
            
            c.innerHTML = "Back";
        }
        else{
            a.style.display="none";
            b.style.display="block";
            c.innerHTML = "View Enrollment";
        }
    }
    
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
            
</script>

</body>
</html>