<?php 

include 'connect.php';

?>
<nav>
<?php
 if(isset($_SESSION['email'])){
  ?>
         <div style="line-height:20px; margin-right:7%;">
       <img src="img/logo.png" style="width:120px; margin-right:60px" >
        <a href="index.php">HOME</a>
        <a href="about.php">ABOUT</a>
        <a href="flights.php">FLIGHTS</a>
        <a href="contact.php">CONTACT</a>   
        <a style=" text-transform: uppercase;" href="userinfo.php"><?php echo @$_SESSION['fullname']; ?></a>    
        <a href="logout.php">Logout</a>
 </div>
        <?php
                }else{
                  ?>
      <div style="line-height:20px; margin-right:7%;">
       <img src="img/logo.png" style="width:120px; margin-right:60px" >
               
        <a href="index.php">HOME</a>
        <a href="about.php">ABOUT</a>
        <a href="flights.php">FLIGHTS</a>
        <a href="contact.php">CONTACT</a>
        <a href="login(2).php">LOGIN</a>
        <a href="register.php">REGISTER</a>
        <?php
                }
              ?>
        </div>
    </nav>