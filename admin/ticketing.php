<?php
    session_start();

    include '../connect.php';
    $result=$vt->query("SELECT * from details");
    if(isset($_POST["butn"])) {
    
        $sql = "UPDATE details SET  cities=trim('$_POST[cities]'),date=trim('$_POST[date]'),price=trim('$_POST[price]'),owner=trim('$_POST[owner]'),pnr=trim('$_POST[pnr]')
         WHERE id=$_POST[id]";
        $vt->query($sql);
        header('location:ticketing.php');
    }
    if(isset($_POST["butnn"])) {
    
        $sql = "DELETE from details
         WHERE id=$_POST[id]";
        $vt->query($sql);
        header('location:ticketing.php');
    }
    
?>

<head>


   </head>
<body style="background-image: url(../img/admin.jpg)" >
    
<table class="container table" style="margin-top: 5%;" >
<h1 style="margin-left: 40%; color:white;">Ticket Configuration</h1>             


<thead>
                <tr style="color: white;">
                   <th>Ticket id*</th>
                   <th>Cities</th>
                   <th>Date</th>  
                   <th>Price</th>  
                   <th>Owner*</th>
                   <th>PNR</th>
                           
                </tr>
             </thead>
             <?php 
               while($row = $result->fetch_assoc()): ?> 
               <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
               <tr>
                  <td><input type="text" readonly name="id" value="<?php echo $row["id"]; ?>">  </td>
                  <td><input type="text" name="cities" value=" <?php echo $row["cities"]; ?>"> </td>
                  <td><input type="text" name="date" value=" <?php echo $row["date"]; ?>"> </td>
                  <td><input type="text" name="price" value=" <?php echo $row["price"]; ?> "></td>
                  <td><input type="text" name="owner" readonly value=" <?php echo $row["owner"]; ?>"> </td>
                  <td><input type="text" name="pnr" value=" <?php echo $row["pnr"]; ?> "></td>
                 
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