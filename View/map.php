<?php
if(isset($_POST["submit1"]))
{
    $adresse=$_POST["adresse"];
    ?>
    <iframe widht="1000%" height="500" src="https://maps.google.com/maps?q=<?php echo $adresse ; ?>&output=embed"> </iframe> 
<?php }
?>
