<?php include("conn.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))

{
  $name=$_POST['name1'];
  $gender=$_POST['gender'];  
  $email=$_POST['email'];
  $password=$_POST['password'];
    
  $_SESSION["sname"]=$name;
  $_SESSION["semail"]=$email;
    
    
    
    if($name!="" && $email!="" && $password!="" )
  { 
        $insert="INSERT INTO `student_registration`(`gender`,`name`,`emailid`,`password`) VALUES('".$gender."','".$name."','".$email."','".$password."')";
      $data=mysqli_query($conn,$insert); 
      if($data)
	  {
	  
	  
          header("Location:thnk.php"); 
	  }
        else
        {
            echo "Something Wrong Occurs..!! Please Try Again";
        }
        
    }
    else{
        echo "Fields Should Not Be Empty..!!";
    }
}


?>

<!DOCTYPE html>
<html>

<style type="text/css">
.box{
  width:200px;
  height:165px;
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
  border-radius:12px;
}
.title h2{
      background: green;
      border:none;
      margin-left:-10px;
      margin-top: -05px;
      padding-top:3px;
      padding-bottom: 2px;
      padding-left:90px;
      padding-right:40px;
      width:77.2%;
      color:white;
           }
.one{
  margin-top: 1.5%;
  margin-left:52%;
  margin-right:2%;
  opacity: .9;
  height:320px;
}
.boxtwo{
  background-size: cover;
  border-radius:12px;
}
.boxtwo input[type="submit"]
       {
    cursor: pointer;
    font-size:15px;
    text-align:center;
    background: green;
   border:none;
   height:40px;
   margin-left:60% ;
   margin-top: 10px;
   }

</style>




<head><title>REGISTRATION</title></head>
<body>
  <div class="box">
   
  </div>
  <br><br>
  <div  class="boxtwo" style="width:73.5%; height:370px; margin-left:13%;margin-top:10px;background-color:white">

<fieldset align="center" style="color:blue;" class="one">
  <div class="title">
  <h2>Thông tin</h2>
    </div>

<form action="" method="post">
<table align="Left" style="color:black;font-size:13pt">
	  <tr>
			<td>Họ tên:</td>
 <td ><input type="text" required="required" name="name1" size="17"
 maxlength="30" style="color:blue"/></td>

	  </tr>
    <tr>
      <td>Giới tính:</td>
      <td>
<input type="radio" name="gender" value="m" checked> Nam
<input type="radio" name="gender" value="f"> Nữ</td>
    </tr>
<tr>
<tr><td>E-MAIL:</td>
 <td><input type="email" name="email" required="required" size="17"
 maxlength="30" style="color:blue"/></td></tr>
<tr>
<td>
Mật khẩu:</td>
 <td><input type="text" name="password" required="required" size="17"
 maxlength="30" style="color:blue"/>
</td>
 </table>
 <input type="submit" name="submit"
   value="Đăng Ký">
</form>
 </fieldset>
</div>
  </div>

 </body>
</html>