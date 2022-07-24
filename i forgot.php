<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');

    require_once("parca/header.php");

    require_once("parca/navbar.php");
    include "connect.php";
    $email=trim(@$_POST['email']);
    $password=trim(@$_POST['password']);

    if(isset($_POST["approve"])){
    $result = $vt->query("SELECT * FROM user WHERE email = '$email'");
    $row = $result->fetch_assoc();
    $count = count($row['email']);

    if($count == 1){
        $sql2= "UPDATE user set password='$password' where email='$email'";
        $vt->query($sql2);
        header('location:login(2).php');
    }else if($count == 0){
        ?>
        <script>
            swal("There is no such an e-mail address.","","error");
        </script>
        

<?php 

}
   
   
   
   
    }


?>
<div class="col-sm-10 col-md-10 padding-10 thumbnail padding-10 box-sizing" style="width: 400px; height:100px; margin-left:35%;margin-top:10%">
<form action="" method="post" name="s-form"   onsubmit="return validatepwd()">
<table>
<tr>
<td>E-Mail:</td><td><input required type="email" name="email"/></td>
</tr>
<tr>
<td>New-Password:</td><td><input required type="password" name="password"/></td>
</tr>
<tr>
<td></td><td><input style="margin-left:50px;" type="submit" class="btn btn-danger  " value="
Approve"name="approve"/></td>

</tr>


</table>

</form> 
</div>
<script>	


function validatepwd() {
    var valid = 1;
	var y = document.forms["s-form"]["password"].value;
	if(y == null || y == "") {
		alert("Password must be filled out");
		valid = 0;
	}
	var pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*[^a-zA-Z0-9])(.{6,})$/;
	if(!pass.test(y)){
			alert("password must be valid");
			valid = 0;
	}	
	
	if(valid == 0)
	return false;
	else 
	return true;
}

	</script>





<?php
require_once("parca/footer.php");
?>