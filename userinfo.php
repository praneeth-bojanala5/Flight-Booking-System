<?php 

include 'connect.php';
require_once("parca/header.php");

require_once("parca/navbar.php");


if(isset($_POST["mailbutn"])){	
	
	$checking = $vt->query("SELECT email FROM user WHERE email = '$_POST[email]'");
    $row = $checking->fetch_assoc();
	$count = count($row['email']);
	
    if($count>=1){
        $_SESSION['mail_alert'] = "This E-mail has already taken";

	  
    }
else{

	$sql = "UPDATE user SET email='$_POST[email]' WHERE id='$_SESSION[login_id]'";
   $vt->query($sql);

	$_SESSION['email']=$_POST['email'];
?> <script> swal({
	title: "Your e-mail successfully changed",
	
	icon: "success",
	
	
   
  }).then((redirect) => {
  if(redirect) {
	  window.location="userinfo.php";
  }
  
  }); </script> <?php	 
	
	
} }



if(isset($_POST["butn"])) {

    $sql = "UPDATE user SET cellno='$_POST[cellno]',creditcard='$_POST[creditcard]',cvv='$_POST[cvv]',password='$_POST[password]'
     WHERE id='$_SESSION[login_id]'";
	$vt->query($sql);

    $_SESSION['cellno']=$_POST['cellno'];
    $_SESSION['creditcard']=$_POST['creditcard'];
    $_SESSION['cvv']=$_POST['cvv'];
	$_SESSION['password']=$_POST['password'];
	

} 

$result=$vt->query("SELECT * from details where purchaserid='$_SESSION[login_id]'");

if(isset($_POST["butnn"])) {
    
    $sql = "DELETE from details
     WHERE pnr=trim('$_POST[pnr]')";
    $vt->query($sql);

    $sql2= "UPDATE flights set capacity=capacity+1 where id=trim('$_POST[flightid]') ";
    $vt->query($sql2);
    header('location:userinfo.php');
}

?>
<h3 style="margin-left:44%">Update Information </h3>   
<div class="col-sm-10 col-md-6 padding-10"  style="border-style: groove; background: rgb(220,220,255,.7); margin-top:30px; margin-left:25% ;float:left; clear:left;">

<form action="userinfo.php" method="POST" name="s-form" onsubmit="return validateUpdate()">
<div class="form-group valid-feedback col-md-5">cellno:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="textbox" maxlength="10" name="cellno"  value="<?php echo @$_SESSION['cellno']; ?>" /><br></div>
<div class="form-group valid-feedback col-md-5">creditcard:&nbsp&nbsp&nbsp<input type="textbox" name="creditcard" maxlength="16" value="<?php echo @$_SESSION['creditcard']; ?>"/><br></div>    
<div class="form-group valid-feedback col-md-5"> Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="textbox" name="password"  value="<?php echo @$_SESSION['password']; ?>" /> <br></div>
<div class="form-group valid-feedback col-md-5">CCV:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="textbox" maxlength="3" name="ccv"  value="<?php echo @$_SESSION['ccv']; ?>" /><br></div> 

<div><input  style="width:400px; margin-left:20%" class="btn btn-danger  "type="submit" value="Set" name="butn" /></div>


 </form>
 <div style="margin-top:3%;padding-top:10px; border-top:groove;">
 <form action="userinfo.php" method="POST" name="email-form" onsubmit="return mailcontrol()" >
<div class="form-group valid-feedback col-md-4">E-mail:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input  type="email" name="email"  value="<?php echo @$_SESSION['email']; ?>" /><br></div>
<input  style="width:140px;height:29px;" class="btn btn-warning  "type="submit" value="Change E-mail" name="mailbutn" />
</form>
</div>
</div>



<?php

if (isset($_SESSION['mail_alert']));?>

<script> <?php

$alert=$_SESSION['mail_alert']; 

?> var a="<?php echo $alert ?>"
swal({
  title: "Sorry",
  text: a,
  icon: "error",
  
  
 
}).then((redirect) => {
if(redirect) {
    window.location="userinfo.php";
}

});

 </script>
<?php
unset($_SESSION['mail_alert']); ?>




<h3 style=" margin-left: 44%; color:Black; clear:left; margin-top:13%" >My Flights </h3>      
<div style=" width:90%; margin-top:1%;height:33%; overflow-x: hidden; overflow-y: scroll; margin-left:3%;margin-right:3%;">

<table class="container table" >
       


<thead style=" margin-left:3%;margin-right:3%;">

                <tr >
                  
                   <th >Cities</th>
                   <th>Date</th>  
                   <th>Price</th>  
                   <th>Owner</th>
                   <th>PNR</th>
                   <th>Flight id</th>
                           
                </tr>
</thead>
                   
             <?php 
               while($row = $result->fetch_assoc()): ?> 
               <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
               <tr>
                  
                  <td style="color:#004d99; font-weight:bold; border: 1px inset olive;"><input style=" background:rgba(250, 250,250, 0.8);" readonly type="text" name="cities" value=" <?php echo $row["cities"]; ?>"> </td>
                  <td style="color:#004d99; font-weight:bold; border: 1px inset olive;"><input  style=" background:rgba(250, 250,250, 0.8);" readonly type="text"  name="date" value=" <?php echo $row["date"]; ?>"> </td>
                  <td style="color:#004d99; font-weight:bold; border: 1px inset olive;"><input  style=" background:rgba(250, 250,250, 0.8);" readonly type="text" name="price" value=" <?php echo $row["price"]; ?> "></td>
                  <td style="color:#004d99; font-weight:bold; border: 1px inset olive;"><input  style=" background:rgba(250, 250,250, 0.8);" readonly type="text" name="owner" value=" <?php echo $row["owner"]; ?>"> </td>
                  <td style="color:#004d99; font-weight:bold; border: 1px inset olive;"><input  style=" background:rgba(250, 250,250, 0.8);" readonly type="text" name="pnr" value=" <?php echo $row["pnr"]; ?> "></td>
                  <td style="color:#004d99; font-weight:bold; border: 1px inset olive;"><input  style=" background:rgba(250, 250,250, 0.8);" readonly type="text" name="flightid" value=" <?php echo $row["flightid"]; ?> "></td>               
                  <td style="border: 1px inset olive;"> <input type="submit" name="butnn"value="Delete"style="background-color:red; width:80px; height:27px;">
                  </td>
               </tr>
               </form>
                
               <?php endwhile; ?>

            
      </table>

      </div>
      <script>	
function mailcontrol(){
	var valid = 1;
	var v = document.forms["email-form"]["email"].value;
	if(v == null || v == "") {
		swal("Error!", "E-mail must be filled out", "error");
		valid = 0;
	}

	if(valid == 0)
	return false;
	else 
	return true;
}

function validateUpdate() {
	var valid = 1;
	var y = document.forms["s-form"]["password"].value;
	if(y == null || y == "") {
		alert("Password must be filled out");
		valid = 0;
	}
	var pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*[^a-zA-Z0-9])(.{6,})$/;
	if(!pass.test(y)){
			alert("password must be valid !!! Use 1 uppercase 1 lowercase 1 number and minimum length is 6" );
			valid = 0;
	}
	
	var z = document.forms["s-form"]["ccv"].value;
	if(z == null || z == "") {
		alert("CCV must be filled out");
		valid = 0;
	}
	var ccv3 = /^(?=.*\d)(?!.*[^0-9])(.{3})$/;
	if(!ccv3.test(z)){
			alert("CCV must be valid");
			valid = 0;
	}
	
	var w = document.forms["s-form"]["creditcard"].value;
	if(w == null || w == "") {
		alert("Credit Card Number must be filled out");
		valid = 0;
	}
	var credit16 = /^(?=.*\d)(?!.*[^0-9])(.{16})$/;
	if(!credit16.test(w)){
			alert("Credit Card Number must be valid");
			valid = 0;
	}
	
	
	var u = document.forms["s-form"]["cellno"].value;
	if(u == null || u == "") {
		alert("Phone Number must be filled out");
		valid = 0;
	}
	var phone10 = /^(?=.*\d)(?!.*[^0-9])(.{10})$/;
	if(!phone10.test(u)){
			alert("Phone Number must be valid");
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