<?php
    session_start();

    include '../connect.php';
    $result=$vt->query("SELECT * from user");
    if(isset($_POST["butn"])) {
    
        $sql = "UPDATE user SET  email=trim('$_POST[email]'),cellno=trim('$_POST[cellno]'),creditcard=trim('$_POST[creditcard]'),cvv=trim('$_POST[cvv]'),password=trim('$_POST[password]')
         WHERE id=$_POST[id]";
        $vt->query($sql);
        header('location:useraction.php');
    }
    if(isset($_POST["butnn"])) {
    
        $sql = "DELETE from user
         WHERE id=$_POST[id]";
        $vt->query($sql);
        header('location:useraction.php');
    }
    
?>

<head>


   </head>
<body style="background-image: url(../img/admin.jpg)" >
    
<table class="container table" style="margin-top: 5%;" >
<h1 style="margin-left: 40%; color:white;">User Configuration</h1>             


<thead>
                <tr style="color: white;">
                   <th>id*</th>
                   <th>Name&Surname*</th>
                   <th>E-mail</th>  
                   <th>cellno</th>  
                   <th>password</th>                  
                   <th>creditcard</th>  
                   <th>CVV</th>           
                </tr>
             </thead>
             <?php 
               while($row = $result->fetch_assoc()): ?> 
               <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
               <tr>
                  <td><input readonly type="text" name="id" value="<?php echo $row["id"]; ?>">  </td>
                  <td><input readonly type="text" name="fullname" value=" <?php echo $row["fullname"]; ?>"> </td>
                  <td><input type="text" name="email" value=" <?php echo $row["email"]; ?>"> </td>
                  <td><input type="text" name="cellno" value=" <?php echo $row["cellno"]; ?>"> </td>
                  <td><input type="text" name="password" value=" <?php echo $row["password"]; ?>"> </td>                 
                  <td><input type="text" name="creditcard" value=" <?php echo $row["creditcard"]; ?>"> </td>
                  <td><input type="text" name="cvv" value=" <?php echo $row["cvv"]; ?>"> </td>
                  <td> <input type="submit" name="butn"value="Update" style="background-color: aqua"></td>
                  <td> <input type="submit" name="butnn"value="Delete"style="background-color: red"></td>
               </tr>
               </form>
               <?php endwhile; ?>

      </table>
     <br>
     <br>
     <br>
     <br>
     
      <h3 style="color: white"><a href="admin.php"style="color: white; text-decoration:none; border:outset; border-color:pink; margin-left:47%; margin-top:50%;" >Admin Homapage </a></h3>


   
    
  
    
           
    
    </div>
    </body>