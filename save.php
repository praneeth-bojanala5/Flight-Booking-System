<?php 
 include "connect.php";
 require_once("parca/header.php");

if(isset($_POST["s-register"])) {
    
    $aa="asd"; 
    $fullname = $_POST["s-name"];
    $email = $_POST["s-email"];
    $cellno = $_POST["s-cellno"];
    $password = $_POST["s-password"];
    
    $creditcard = $_POST["s-credit"];
    $cvv = $_POST["s-cvv"];
    
    $checking = $vt->query("SELECT email FROM user WHERE email = '$email'");
    $row = $checking->fetch_assoc();
    $count = count($row['email']);
    if($count>=1){
        $_SESSION['mail_alert'] = "This E-mail has already taken";
        Header("Location:register.php?status=failed");
    }


    else{
    $sql = "INSERT INTO user (fullname,email,cellno,password,creditcard,cvv)
    VALUES('$fullname','$email','$cellno','$password','$creditcard','$cvv')";
    $vt->query($sql);
    Header("Location:login(2).php?status=ok");
}    
 }
    
   

?>