<?php
require_once("parca/header.php");

require_once("parca/navbar.php");


$email=trim(@$_POST['email']);
$password=trim(@$_POST['password']);

if(!empty($email)&&!empty($password)){
    $query= $vt->prepare("SELECT * FROM user WHERE email=? and password=?");
    $query->execute(array($email,$password));
    $operation=$query->fetch();
    if($operation){
        $_SESSION['email']=$operation['email'];
        $_SESSION['fullname']=$operation['fullname'];
        $_SESSION['cellno']=$operation['cellno'];
        $_SESSION['password']=$operation['password'];
        $_SESSION['tc']=$operation['tc'];
        $_SESSION['creditcard']=$operation['creditcard'];
        $_SESSION['ccv']=$operation['ccv'];
        

        header('location:login.php');
        
    }else{
        echo "login failed.";
          
    }
} 

?> 
<section>
<div class="container" >
<div class="background-img">
<div class="box">
    <span> </span>
    <span> </span>
    <span> </span>
    <span> </span>
    <div class="content">
    <h2 style="margin-bottom:4%;font-size:30px;">Login </h2>
    
<form action="login.php" method="post">
<i class="fas fa-user"></i> <input style="margin-left:30%;width:40%;"class="form-control" placeholder="E-Mail" required type="email" name="email"/>
<i class="fas fa-unlock"></i><input class="form-control" required type="password" name="password" placeholder="Password" style="width:40%; margin-left:30%; margin-top:2%; ";/>
<input style="margin-left:40%; margin-top:4%; width:20%; float:left; background-color:rgb(0, 50, 180,0.5);" type="submit" class="btn btn-info  " value="Log In"name="login"/>

<a style="margin-left: 75%; color:white;text-decoration:none; float:left; margin-top:5%" href="i forgot.php">
I forgot my password?</a>

<a style=" color:white; font-size:14px; text-decoration:none;float:left;margin-top:-2.5% " href="register.php">
Not Registered Yet?</a>
</form> 


</div>
</div>
</div>
</div>
</section>
<?php
require_once("parca/footer.php");
?>