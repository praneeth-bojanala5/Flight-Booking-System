<?php
require_once("parca/header.php");

require_once("parca/navbar.php");
include "connect.php";
//error_reporting(E_ALL);
ini_set('display_errors', 'Off');


if (isset($_POST['login'])){

    $email = $_POST['email'];
    $pwd = $_POST['password'];
    
    
    #$sql = "SELECT id FROM user WHERE email = '$username' AND pwd = '$pwd'";
    
    $result = $vt->query("SELECT * FROM user WHERE email = '$email' AND password = '$pwd'") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $count = count($row['id']);
    
    
    if($email=='admin@admin.com' && $pwd=="123" ){
        $_SESSION['email'] = $email;
        $_SESSION['login_id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['cellno'] = $row['cellno'];
        $_SESSION['password'] = $row['password'];
        header("location:admin/admin.php");
    }
    
    else if($count == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['login_id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['cellno'] = $row['cellno'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['tc'] = $row['tc'];
        $_SESSION['creditcard'] = $row['creditcard'];
        $_SESSION['cvv'] = $row['cvv'];

    
        
        header("location: index.php");
     }
     
     else {
        ?>
        <script style="background-color: red" type="text/javascript" > 
 

       swal( {
            title:"Invalid E-mail or Password",
            icon:"error",
          
       }    )
       .then((redirect) => {
if(redirect) {
    window.location="login(2).php";
}

});


        </script>
        <?php 
        
     }
     
    }
    
?>
<?php
require_once("parca/footer.php");
?>