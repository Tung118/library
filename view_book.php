<?php
$msg="";
include("conn.php");
session_start();

$name=$_SESSION["sname"];
$email=$_SESSION["semail"];
$id=$_GET['id'];
$detail = $_GET['detail'];

$query="select * from book where `book`.`b_id`= '$id'";
$query1=mysqli_query($conn,$query);
$ros=mysqli_fetch_array($query1);
$book_name=$ros['booksname'];
$auth_name=$ros['authorname'];
$avl_cpy=$ros['avl_cpy'];


if($avl_cpy>0){




if(isset($_POST['sub'])){
    
$query="select * from book where `book`.`b_id`= '$id'";
$query1=mysqli_query($conn,$query);
$ros=mysqli_fetch_array($query1);
$path=$ros['path'];
header('content-Disposition: attachment;filename = '.$id.'');
header('content-type:application/pdf');
header('content-length='.filesize($path));
readfile($path);

}





if(isset($_POST['rqst'])){
    
    
    $query="select * from student_book where `student_book`.`emailid`= '$email'";
    $query1=mysqli_query($conn,$query);
    $ros=mysqli_fetch_array($query1);
    
  
      $sql1= "select date_format(curdate(),'%d-%m-%Y')" ;
	     $res1 = mysqli_query ($conn,$sql1);
	     $row1 = mysqli_fetch_row($res1);
	     $recive=$row1[0];
            
       $sql2= "select date_format(DATE_ADD(curdate(), INTERVAL 14 DAY),'%d-%m-%Y')" ;
	     $res2 = mysqli_query ($conn,$sql2);
	     $row2 = mysqli_fetch_row($res2);
	     $submit=$row2[0];
            
            $insert="INSERT INTO `student_book`(`emailid`,`book_id`,`book`,`recive_date`,`submisson_date`) VALUES('".$email."','".$id."','".$book_name."','".$recive."','".$submit."')";
            
           
            $data=mysqli_query($conn,$insert); 
            
            $cur=$avl_cpy-1;
            
            $sql2="UPDATE `book` SET". "`avl_cpy` ='$cur'"." WHERE `book`.`b_id` ="."'$id'";
            mysqli_query($conn,$sql2);
            
              if($data)
              {
                $msg= "Mượn thành công!";
              }
              else{
                  $msg="Không thành công";
                   }
            }
}

else{
    $msg="Đã hết sách!";
}

?>

<html>
<head><title>View Book</title>
    
<style>
  *{
    padding 0;
    margin: 0;
  }
.container{
  width:980px;
  margin: 0 auto;
}
#table1{
		width: 70%;
		text-align: center;
		height: 40px;
    margin-left: 15%;
    font-size: 20px;
   
	}
	#table2{
		color: white;
	
	}
  nav{
  padding-left:200px;
  display: block;
  background: red;
  height: 50px;
}
 nav ul{
  padding: 0  ;
  list-style: none;
}
nav ul li{
  float: left;
  margin-right: 40px;
  text-transform: uppercase;
  line-height: 50px
}
nav ul li a{
  text-decoration: none;
  color: white;
  font-size: 13pt;
  display: block;
}
nav ul li a:hover{
  color: black;
}
nav ul li ul li{
  display: none;
}
	.td1{
		padding: 1px;
		background-color: purple;
		
	}
	.td1:hover{
		background: green;
	}
	.td2{
		padding: 5px;
    font-size: 18px;
	}
	a{
		text-decoration: none;
		color: white;
		
	}
  .box{
    height:160px;
    opacity: .9;
    background-color: blue;
  }
  .boxtwo{
    background-size: cover;

  }

.five{
  padding:10px 0px 10px 10px;
	width: 500PX;
  margin-top: 20px;
  margin-left: 23%;
  height:300px;
  border-radius:12px;
  margin-right: 5%;
  font-size:22px;


}
   .five input[type="submit"]
          {

		    font-size:15px;
		    text-align:center;
			border:none;
			height:40px;
			margin-left:40% ;
			background:#660000;
			color:#FFFFFF;
			}
      .five input[type="submit"]:hover
          {
            color: blue;
		  
			}
    .td3{
        font-size: 18px;
        font-family: cambria;
        color: bisque;
        font-weight: bold;
    }
ul{
	list-style: none;
}
ul li{
	font-size: 25px;
}
.butt{
	margin-left: 300px;
	width: 150px;
	height: 100px;
}
.logout{
    float: right;
    margin-right: 20px;
    width: 90px;
    height: 20px;
    border: 1px solid;
    text-align: center;
    background-color: red;  
}
</style>
</head>

<body>
  <div class="container">
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
  </nav>

   <div  class="boxtwo" style="border:solid 1px;">
   <form method="post">
	<ul >
		<li>Tên:  <?php echo $book_name; ?></li>
	   <li>Tác giả:  <?php echo $auth_name; ?></li>
	   <li>Số lượng: <?php echo $avl_cpy; ?></li>
	</ul>
       
		<div class="butt">
			<?php
    		if($detail==2)
    		{
     		?>     
            <input type="submit" name="sub" value="Tải xuống" style="cursor: pointer;background-color: red;text-align: right"> 
           
    		<?php
    		}
    		else{
    		?>
        	<input type="submit" value="Mượn sách" name="rqst" style="cursor: pointer;background: #f0ad4e">
          <p style="color: red;font-weight:bold;text-align:center;padding-top:30px"> <?php echo $msg; ?> </p>
    		<?php
			}
			?></div>
	</form>
    </div >
    </div>

  </div>
  
  </body>
</html>