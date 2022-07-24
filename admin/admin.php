<?php
    session_start();

    include '../connect.php';





?>
<header>
   
</header>
<body style="background-image: url(../img/admin.jpg)">
<a href="../logout.php" style="margin-left:90%; color:white; border:groove;border-color:white; "> LogOut</a>  
<div style=" width:100%; height: 100%; padding-top:20%; position:fixed;" >
        
        <div style=" border:groove; border-color:white; margin-left:40%;    width:250px; color:purple; ">
        <li><a  href="useraction.php" style="font-size: 30px;color:orange"> user operations</a></li> <br>
        <li><a href="ticketing.php" style="font-size: 30px;color:orange"> ticket operations</a></li> <br>
        <li><a href="flight.php" style="font-size: 30px;color:orange"> flight operations</a></li>
    
        </div>
    
  
    
           
    
    </div>
    </body>