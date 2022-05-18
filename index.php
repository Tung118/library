<?php
include("conn.php");

$error="";
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
{  
   $count=0;
   $data=mysqli_query($conn,"select * from student_registration where emailid='$_POST[username]' && password='$_POST[password]'");
   $count=mysqli_num_rows($data);
   $row = mysqli_fetch_array($data);
   
   if($count==0)
   {
      $error= "Sai tên đăng nhập hoặc mật khẩu!";
   }
   
else 
    
    
{
        if($row["type"]=="admin")
         {
          header("Location:admindas.php"); 
         }
       else{
           $_SESSION["sname"]=$row["name"];
           $_SESSION["semail"]=$row["emailid"];
           $_SESSION["sgender"]=$row["gender"];
           header("Location:home.php");
           }
}
   
}

 
?>

<!DOCTYPE html>
<html>

<head><title>HOME PAGE</title></head>
<script type="text/javascript" src="script.js"></script>
<style>
  .box{
    width:74%;
    height:160px;
    background-size: cover;
    margin-left: 13%;
    opacity: .9;
  }
  .boxtwo{
    background-size: cover;
  }

.five{
  padding:10px 0px 10px 10px;
  margin-top: 30px;
  margin-left: 55%;
  border-radius:10px;
  margin-right: 5%;
  font-size:25px;

}
   .five input[type="submit"]
          {
            background: green;
            color: white;
		    font-size:22px;
		    text-align:center;
			border:none;
			height:40px;
			margin-left:90% ;
            margin-top: 20px;
			border-radius:18px;

			}

</style>





<body>
  <div class="box">

  </div>
    <br>
    <br>

    <form method="post" action="">
      <div  class="boxtwo" style="width:73.5%; height:360px; margin-left:13%;margin-top:15px;background-color:white">

        <fieldset align="center" style="  color:blue;" class="five" class="one">
          <div class="boxfour">
            <h3 style="color: white;text-align:center;;padding-top:1px;padding-bottom: 1px;background-color: #49bf67!important;;border-radius:12px;margin-top:-13px;margin-left:-12px;height:40px">Đăng Nhập</h3>


          </div>

        <table style="font-size:16pt;width:300px;height:50px;margin-right:45px;" align="Right">
          <tr>
            <td><br></td>
          </tr>
          <tr>
            <td><label style="color:black">Tên truy cập:</label></td>
            <td><input type="text" name="username" placeholder="Tên truy cập"></td>
          </tr>

          <tr>
            <td><label style="color:black">Mật khẩu:</label></td>
            <td><input type="password" name="password" placeholder="Mật khẩu"></td>
          </tr>
          <tr>
            <td align="center" style="margin-left:200px"><input type="submit" name="submit" value="Đăng nhập"></td>
          </tr>
          <p style="color:red;font-weight:bold;font-size:17px;text-align:center;background:rgba(255, 255, 255, 0.8)"><?php echo $error ?>
          </p>
          <tr>
            <td style="font-size:10pt"><a href="registration.php" style="color: black ;text-decoration: none;">Đăng ký</a></td>
          </tr>
          <tr>
            <td ><br></td>
            <td><br></td>
          </tr>
        </table>
      </fieldset>
      </div >
    </form>

    </div>
