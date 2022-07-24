<?php
require_once("parca/header.php");

require_once("parca/navbar.php");
include 'connect.php';


?>
 
    <div class="Home">
    <h1>PRANEETH AIRLINES</h1>
    <p></p>
   <a href="flights.php" > <button class="Book a flight">Fly With Us </button></a> 
  
  
   
   </div>
   <div id="flight"> <img style="height:17%; width:30%;" id='illustrate' src='img/uucak.png'></div>


   <script>
bounce()
function bounce()
{
$('#illustrate')
.animate( { left:'68%' }, 3500, 'linear')

}
</script>
  
    

    
  
<?php
require_once("parca/footer.php");

?>