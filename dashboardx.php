<?php
    session_start();
    include ("connection.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
		
	    //if something was posted
	    $activity= $_POST['activity'];
		$date_start= $_POST['date_start'];
        $date_end= $_POST['date_end'];
        $capital=$_POST['capital'];
        $gross=0;
        $nett=$gross-$capital;

        $datetime1 = strtotime($_POST['date_start']);
        $datetime2 = strtotime($_POST['date_end']);

        $secs = $datetime2 - $datetime1;// == <seconds between the two times>
        $days = $secs / 86400;

        $query= "insert into info (activity, user_matric, date_start, date_end, duration, capital, gross, nett) 
        values 
        ('$activity','".$_SESSION['matric']."','$date_start','$date_end','$days','$capital','$gross','$nett')";
        
			
				mysqli_query($con, $query);
					
				?>
					<script language="javascript">
					window.alert("Data has been added.");
					window.location.href = "dashboardx.php";
					</script>
				<?php
					
				
				die;
    }
		

?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>

<style>

body {
    margin:0px;
    font-family: "Lato", sans-serif;
    background-color: white;
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
    top: -2;
    right: 10;
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
    font-size:30px;
    cursor:pointer;
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
    align-items: left;
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
    margin-top:0px;
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
    width:40%;
    height: 570px;
    background:white;
    border-radius: 5px;
    border: none;
    box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 darkgrey;
    padding:20px;
}

#inputcontainer{
    margin:auto;
    width:60%;
    height:400px;    
    background: rgba(0, 0, 100%, 100%);
    
}

#inputcontainerprofit{
    margin:auto;
    width:60%;
    height:300px;    
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

::placeholder {
    color: lightgray;
    font-size: 16px;
}

#switch{
    
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

    #switch:hover {
        box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 #15317e;
    }

.addbtn{
    margin-top:0px;
    width: 60%;
    border-radius: 5px;
    border: solid #15317e;
    background: #15317e;
    color: white;
    padding: 12px;
    font-size: 18px;
    cursor: pointer;
    transition-duration: 0.2s;
}

    .addbtn:hover {
        box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 #15317e;
    }

.desc{
    
    background: white;
    width: 40%;
    height: 80px;
    outline: none;
    border: 2px solid darkcyan;
    margin-top: 15px;
    padding-left: 5px;
    border-radius: 3px;
    font-size: 16px;
    font-family: "Lato", sans-serif;
    resize:none;
}
    .desc:focus {
        border: 3px solid darkcyan;
        border-radius: 3px;
    
}

#back_btn{
    margin-top: 100px;
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

.centerbtn{
    width:10%;
    background: red;
    border-radius: 5px;
    margin:auto;
}

.containery {
    margin:auto;
    width:40%;
    height: 300px;
    background:white;
    border-radius: 5px;
    border: none;
    box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 darkgrey;
    padding:20px;
}
	
.totaldiv {	 
    margin:auto;
    width:90%;
    background:rgba(0, 0, 100%, 100%);
    height:50px;
    
	
}	

.boxtotal{
    float:right;
}

.addbtnx{
    margin-top:30px;
    width: 100%;
    border-radius: 5px;
    border: solid #15317e;
    background: #15317e;
    color: white;
    padding: 12px;
    font-size: 18px;
    cursor: pointer;
    transition-duration: 0.2s;
}

    .addbtn:hover {
        box-shadow: 0 1px 3px 0 darkgrey,0 5px 10px 0 #15317e;
    }

</style>

</head>

<body onload="displayfunc()">
    <input type="hidden" value="$previous" />
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
                <h2>Entrepreneurship Activity</h2>

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
                    <th>Gross Profit</th>
                    <th>Net Profit</th>
                    <th>Action</th>
                </tr>

                <?php
                
           
                $sql= "SELECT id, activity, user_matric, date_start, date_end, duration, capital, gross, nett from info WHERE user_matric='".$_SESSION['matric']."'";
                $today = date("Y-m-d");
                
                
                $result= $con-> query($sql);
                $x=1;
                $y=0;
                

                if ($result-> num_rows > 0){
                
                    while ($row= $result-> fetch_assoc()){

                        if($today > $row["date_end"]){
                            $status="Ended";
                        }
                        else{
                            $status="Ongoing";
                        }

                        $id[$y]=$row['id'];
                        echo
                        "<tr>                       
                        <td>". $x."</td>
                        <td>". $row["activity"]."</td>
                        <td>". $row["date_start"]." - ". $row["date_end"]."</td>
                        <td>". $row["duration"]." Days "."</td>
                        <td>".$status."</td>
                        <td>"." RM ". $row["gross"]."</td>
                        <td>"." RM ". $row["nett"]."</td>
                        <td>". "<button onclick=dayprofit($id[$y])>Insert Daily Profit</button>"."</td>
                        </tr>";
                        $x=$x+1;
                        $y=$y+1;
                    }
                }

                ?>

            </table>
			
        </div>
		
        
		
        <form method="post">
        <div id="add" class="containerx">
        
            <h2>Add Activity</h2>
        
            <div id="inputcontainer">

            <div class="inputdiv">
                <label for="activity">Activity</label><br>
                <input id="activity" class"tbox" name="activity" type="text" placeholder="Activity" required="required"><br><br>
            </div>

            <div class="inputdiv">
                <label for="date_start">Date start</label><br>
                <input id="date_start" type="date" name="date_start" required="required">

                <label for="date_end">Date end</label><br>
                <input id="date_end" type="date" name="date_end" required="required"><br><br>
            </div>

            <div class="inputdiv2">
                <label for="capital">Starting capital(RM)</label><br>
                <input id="capital" name="capital" type="number" placeholder="Eg.100.00" required="required"><br>
            </div>
            
            
            </div>
            <button id="addbtn" class="addbtn">Add</button>
        </div>

        </form>

        <form action="profitupdate.php" method="post">

        <div id="dayprofit" class="containery">
        <div id="inputcontainerprofit">

        <h2>Daily Profit</h2>
            <div class="inputdiv">
                <label for="profit">Profit(RM)</label><br>
                <input id="gross" name="gross" type="number" step="0.01" placeholder="Eg.100.00" required="required"><br>
                <input type="hidden" name="id" id="actid">
            </div>
            
            <input class="addbtnx" type="submit" value="Insert">
        </div>
        </div>

        </form>

        <div class="totaldiv" id="totaldiv">
            <div class="boxtotal">
            
                <table>

                    <?php
                        $sql= "SELECT nett from info WHERE user_matric='".$_SESSION['matric']."'";
               
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
		    <button id="switch" onclick="addfunc()">Add Activity</button>
            <button id="back_btn" onclick="backfuncx()">Back</button>
		</div>
		
        
		
    </div>
        
<script>

    function displayfunc() {
               
        var a = document.getElementById("add");
        var b = document.getElementById("addbtn");
        var c = document.getElementById("dayprofit");
        var d = document.getElementById("back_btn");
       

        a.style.display = "none";
        c.style.display = "none";
        d.style.display = "none";
        
    }

    function addfunc() {

        var x = document.getElementById("add");
        var y = document.getElementById("info");
        var btn = document.getElementById("switch");
        var box= document.getElementById("totaldiv");
       

        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            box.style.display="none";
            btn.innerHTML = "Back";           
        }

        else {
            x.style.display = "none";
            y.style.display = "block";
            box.style.display="block";
            btn.innerHTML = "Add Activities";            
        }
    }

    function dayprofit($id){
        
        var x = document.getElementById("info");
        var y = document.getElementById("dayprofit");
        var btn = document.getElementById("switch");
        var backbtn = document.getElementById("back_btn");
        var box= document.getElementById("totaldiv");
        document.getElementById('actid').value = $id;


        if(y.style.display==="none"){

            box.style.display="none";
            x.style.display="none";
            y.style.display="block";
            btn.style.display="none";
            backbtn.style.display="block";
        }

    }
    function backfuncx(){
        
        var a = document.getElementById("add");
        var x = document.getElementById("info");
        var y = document.getElementById("dayprofit");
        var btn = document.getElementById("switch");
        var backbtn = document.getElementById("back_btn");
        var box= document.getElementById("totaldiv");

        a.style.display="none";
        x.style.display="block";
        y.style.display="none";
        btn.style.display="block";
        backbtn.style.display="none";
        box.style.display="block";

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