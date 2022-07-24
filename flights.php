<?php
require_once("parca/header.php");
require_once("parca/navbar.php");
include "connect.php";
$result=$vt->query("SELECT * from flights");


?>
<div class="flightsdiv" style=" background:rgba(100, 100, 100, 0.4);margin-top:5%; width:90%;height:60%;overflow-x: hidden; overflow-y: auto;margin-left:3%;margin-right:3%;"> 
<table class="container table">
             <thead>
                <tr>
                 
                   <th style="color: rgb(255, 174, 0); font-size:25px;">City</th>
                   <th style="color: rgb(255, 174, 0); font-size:25px;">Date</th>
                   <th style="color: rgb(255, 174, 0); font-size:25px;">Capacity</th>  
                   <th style="color: rgb(255, 174, 0); font-size:25px;">Price</th>            
                </tr>
             </thead>
<?php
if(isset($_SESSION['login_id'])){
?>

             <?php 
               while($row = $result->fetch_assoc()):  ?> 
               
               <tr>
               
                  <td style="color:white; font-weight:bold; "> <?php echo $row["cities"]; ?> </td>
                  <td style="color:white; font-weight:bold; "> <?php echo $row["date"]; ?> </td>
                  <td style="color:white; font-weight:bold;"> <?php echo $row["capacity"]; ?> </td>
                  <td style="color:white; font-weight:bold; "> <?php echo $row["price"]; ?> </td>
                  <td style="color:white; font-weight:bold; "><a href="pnr.php?id=<?php echo $row['id'];?>"name="buton"   class="btn btn-success"  style="color: white;"> BUY</a>  </td>
               </tr>
               <?php endwhile; ?>

      </table>



</div>
<?php } else ?>

             <?php 
               while($row = $result->fetch_assoc()):  ?> 
               
               <tr>
               
                  <td style="color:white; font-weight:bold; "> <?php echo $row["cities"]; ?> </td>
                  <td style="color:white; font-weight:bold; "> <?php echo $row["date"]; ?> </td>
                  <td style="color:white; font-weight:bold;"> <?php echo $row["capacity"]; ?> </td>
                  <td style="color:white; font-weight:bold; "> <?php echo $row["price"]; ?> </td>
                  <td style="color:white; font-weight:bold; "><a href="login(2).php"name="buton"   class="btn btn-success"  style="color: white;"> BUY</a>  </td>
               </tr>
               <?php endwhile; ?>

      </table>



</div>

<?php
require_once("parca/footer.php");
?>