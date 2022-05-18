<?php include("conn.php");

session_start();

$name=$_SESSION["sname"];
$email=$_SESSION["semail"];
$gender=$_SESSION["sgender"];

$namecap=ucwords($name);

?>

<!DOCTYPE html>
<html>
<style>
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
  background-color: blue;
  background-size: cover;

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
.boxtwo{
  background-size: cover;
   border:solid 1px;
  
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
  color: white;
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
  background: red;
  height: 50px;
}
.box-cnt{

  background:rgba(0,0,0,0.38);
  overflow: auto;
  width: 100%;
  overflow:hidden;
}
.box-cnt-h{
    color:white;
    text-align: center;
    padding-top:2px;
    padding-bottom: 2px;
    background:#660000;
}

    .box-table{
        color: white;
        text-align: center;
        border-collapse: collapse;
        margin:1%;
        width: 100%;
    }
    .box-table td,tr{
        border: 1px solid white;
    }
    
    a{
        color: white;
        text-decoration: none;
    }
    

    </style>
    
    
    
    
  
    
    
    
<head><title>Student_DashBoard</title></head>
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
    <input style="margin-top: 13px" type="text" id ="myInput"  onkeyup="search()" placeholder= "Tìm kiếm">
  </nav>
       
    <div class="box-cnt">
         <table class="box-table" id = "myTable">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Tác giả</th>
                    <th>Số lượng</th>   
                    <th>File</th>
                </tr>
               
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      
                        echo "<tr>";
                          $bookid_cse=NULL;
                          $bookid_cse=$row["b_id"];
                          $lg1="<a href='view_book.php?id=$bookid_cse&detail=1'>";
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg1"; echo $row["booksname"]; echo "</a>"; echo "</td>";
                        echo "<td>"; echo $row["authorname"]; echo "</td>";
                        echo "<td>"; echo $row["avl_cpy"]; echo "</td>";
                        echo "<td>"; echo $row["file_name"]; echo "</td>";
                        echo "</tr>";
                          $bookid_cse=NULL;
                    }

	            ?>
                </table>
                <script>
                    function search(){
    var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
                </script>
          </br/clear>

  </div>
      </div>

    </div>
  

</body>
<html>
