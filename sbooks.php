<?php
include("conn.php");
session_start();
$name=$_SESSION["sname"];
$email=$_SESSION["semail"];
$gender=$_SESSION["sgender"];
if (isset($_GET['id'])){
  $id = $_GET['id'];
  $b_id = $_GET['detail'];
  $sql1="DELETE FROM `student_book` WHERE student_book.id = '$id'";
  mysqli_query($conn, $sql1);
  $sql2="UPDATE `book`SET book.avl_cpy = book.avl_cpy+1 WHERE book.b_id = '$b_id'";
  mysqli_query($conn, $sql2);
}
?>
<html>
<head>
<title>book info</title>
<script type="text/javascript" src="script.js"></script>
<style>
  body{
        background-image: url(bg2.jpg);
  }
    *{
    padding 0;
    margin: 0;
  }
.container{
  width:980px;
  margin: 0 auto;
}
.box{
  height:160px;
  background-size: cover;
  background-color: MediumTurquoise;
}
.boxtwo{
  background-size: cover;
  border-radius:12px;
  border:solid 1px;
  border-radius: 10px; 
  width:84%; height:100%; 
  margin-left:0%;
  margin-top:10px;
  background-color:white
}
ul{
  padding: 0  ;
  list-style: none;
}
ul li{
  float: left;
  margin-right: 40px;
  text-transform: uppercase;
  line-height: 50px
}
ul li a{
  text-decoration: none;
  color: black;
  font-size: 13pt;
  display: block;
}
ul li a:hover{
  color: black;
}
ul li ul li{
  display: none;
}
nav{
  padding-left:200px;
  display: block;
  background: PaleGreen;
  height: 50px;
}
.but{
  background-color: red
}
.but:hover{
  background-color: #800000;
}
.three{
  margin-left: 15%;
  margin-top: 5px;
}
table,tr,td{
    text-align: center;
}
a{
        color: black;
        text-decoration: none;
}
.btn{
  display: flex;
  background-color: #fff;
  color: darkred;
  width: 100%;
  height: 100%;
  text-decoration: none;
  align-items: center;
  justify-content: center;
}
.btn:hover{
  background-color: red;
}
.view{
  display: flex;
  background-color: #fff;
  color: darkred;
  width: 100%;
  height: 100%;
  text-decoration: none;
  align-items: center;
  justify-content: center;
}
.view:hover{
  background-color: green;
}
.logout{
    float: right;
    margin-right: 20px;
    width: 90px;
    height: 20px;
    border: 1px solid;
    text-align: center;
    background-color: white;  
}
</style>


</head>
<body>
  <div class="container">
  <head><title>LOGIN_PAGE</title></head>
  <body>
    <div class="box">
    <div class="logout">
          <a href="index.php" style="color: black;  text-decoration: none">Đăng xuất</a>
        </div>
    </div>


    <nav>
    <ul>
      <li><a href="home.php">trang chủ</a></li>
      <li><a href="sbooks.php">SÁCH CỦA BẠN</a></li>
      <li><a href="">Giới thiệu</a></li>
      <li><a href="">Liên hệ</a></li>
    </ul>
  
<br><br>
  </nav>
          
          
      
      

    <table name="tb" width="100%" border="1"  align="center" style="color:white;  background:SteelBlue;">
      <tr>
        <th height="50">STT</th>
        <th>Tên</th>
        <th>Ngày mượn</th>
        <th>Hạn trả sách</th>
      </tr>
      
        
        
        <?php $query1="SELECT * FROM `student_book`  where `student_book`.`emailid` = '$email'";
        
        $data=mysqli_query($conn,$query1);
        
	             $stt = 1;
                      while( $row = mysqli_fetch_array($data)){   
                        echo "<tr>";
                        $bookid_cse=NULL;
                        $bookid_cse=$row["book_id"];
                        $id = $row["id"];
                        echo "<td>";echo $stt; echo "</td>";
                        echo "<td>";echo $row["book"]; echo "</td>";
                        echo "<td>"; echo $row["recive_date"]; echo "</td>";
                        echo "<td>"; echo $row["submisson_date"]; echo "</td>";
                        echo "<td> <a href='view_book.php?id=$bookid_cse&detail=2' class='view'> Xem </a></td>";
                        echo "<td> <a href='sbooks.php?id=$id&detail=$bookid_cse' class='btn'> Trả sách </a></td>"; 
                        echo "</tr>";
                        $stt = $stt +1;
                        $bookid_cse=NULL;
                     }
	            ?>
    </table>


  </div>

  </div>
</body>
</html>