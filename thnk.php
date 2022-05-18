<?php 
session_start(); 
$name2=$_SESSION["sname"];
$email=$_SESSION["semail"];
?>

<?php header('Refresh: 5; URL=index.php'); ?>

<!DOCTYPE html>
<html>
    <head>
       
    
    </head>
    
    <bod>
        <div style="border:1px solid red;margin:5% 10%;">
        <center>
        <h1>Thank You <?php echo $name2; ?> </h1>
        <h1>Email đăng ký của bạn là:<u><?php echo $email; ?></u></h1>
            </div>
            <?php session_destroy();  ?>
    </bod>

</html>