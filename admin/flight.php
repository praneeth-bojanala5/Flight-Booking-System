<?php
    session_start();

    include '../connect.php';
    $result=$vt->query("SELECT * from flights");
    if(isset($_POST["butn"])) {
    
        $sql = "UPDATE flights SET  cities=trim('$_POST[cities]'),date=trim('$_POST[date]'),capacity=trim('$_POST[capacity]'),price=trim('$_POST[price]') WHERE id=$_POST[id]";
        $vt->query($sql);
        header('location:flight.php');
    }
    if(isset($_POST["butnn"])) {
    
        $sql = "DELETE from flights
         WHERE id=$_POST[id]";
        $vt->query($sql);
        header('location:flight.php');
    }
    if((@$_POST["insert"])) {
    
        $sql = "INSERT INTO flights ( cities,date,capacity,price) values (trim('$_POST[cities]'),trim('$_POST[date]'),trim('$_POST[capacity]'),trim('$_POST[price]')) ";
        $vt->query($sql);
        header('location:flight.php');
    }
    
?>

<head>


   </head>
<body style="background-image: url(../img/admin.jpg)" >
    
<table class="container table" style="margin-top: 5%; margin-left:15%" >
<h1 style="margin-left: 40%; color:white;">Flight Configuration</h1>             


<thead>
                <tr style="color: white;">
                   <th>Flight id*</th>
                   <th>Cities</th>
                   <th>Date</th>  
                   <th>Capacity</th>  
                   <th>Price</th>
                             
                </tr>
             </thead>
             <?php 
               while($row = $result->fetch_assoc()): ?> 
               <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
               <tr>
                  <td><input style="text-align: center" type="text" readonly required name="id" value="<?php echo $row["id"];?>">  </td>
                  <td><input  style="text-align: center"type="text"  required name="cities" value="<?php echo $row["cities"];?>"> </td>
                  <td><input style="text-align: center"type="text"  required name="date" value="<?php echo $row["date"];?>"> </td>
                  <td><input style="text-align: center"type="text"  required name="capacity" value="<?php echo $row["capacity"];?> "></td>
                  <td><input style="text-align: center"type="text"  required name="price" value="<?php echo $row["price"];?>"> </td>
                 
                  <td> <input type="submit" name="butn"value="Update" style="background-color: aqua" ></td>
                  <td> <input type="submit" name="butnn"value="Delete"style="background-color: red"></td>
               </tr>
               </form>
               <?php endwhile; ?>

      </table>
     <br>
     <br>
     
     <table class="container table" style="margin-top: 5%; margin-left:25%" >
<h1 style="margin-left: 42%; color:white;">Flight Insert</h1>             


<thead>
                <tr style="color: white;">
                   
                   <th>Cities</th>
                   <th>Date</th>  
                   <th>Capacity</th>  
                   <th>Price</th>
                             
                </tr>
             </thead>
             
              
               <form method="POST" >
               <tr>
                  
                  <td><input required type="text" name="cities" > </td>
                  <td><input required  type="text" name="date" > </td>
                  <td><input  required type="text" name="capacity"  ></td>
                  <td><input required type="text" name="price" > </td>
                 
                  <td> <input type="submit" name="insert"value="Insert" style="background-color: Green" ></td>
                 
               </tr>
               </form>
               

      </table>
      <br>
     <br>
      <h3 style="color: white"><a href="admin.php"style="color: white; text-decoration:none; border:outset; border-color:pink; margin-left:47%; margin-top:50%;" >Admin Homapage </a></h3>


   
    
  
    
           
    
    </div>
    </body>