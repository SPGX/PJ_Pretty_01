<?php

include 'config.php';

if ($_SESSION['id'] == ''){
  header('location: index.php');
}else{

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Pretty</title>
    <style media="screen">
      #p1{
        margin-bottom: 10px;
      }
      #p2{
        margin-left: 50px;
      }
      #p3{
        margin-left: 350px;
      }
      #p4{
        margin-right: 100px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Pretty</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="badge badge-primary" href="#" id = 'p3'>
          Like เยอะสุด :
          <?php
            $query_r = "select name, max(r_like) from member";
            $result_r = $object1 -> prepare($query_r);
            $result_r -> execute();
            $row_r = $result_r -> fetch(PDO::FETCH_ASSOC);
            $max_like = $row_r['max(r_like)'];
            $query_member = "select * from member where r_like = ?";
            $result_member = $object1 -> prepare($query_member);
            $result_member -> bindParam('1', $max_like);
            $result_member -> execute();
            $row_member = $result_member -> fetch(PDO::FETCH_ASSOC);
            echo $row_member['name'].' '.$row_r['max(r_like)'].' '.'Like';
          ?>
        </a>
      </li>
      <p id = 'p3'></p>

      <li class="nav-item">
        <a class="nav-link" href="./home.php"><span class="glyphicon glyphicon-home"></span> หน้าหลัก</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#"><span class="badge badge-warning"> สถานะ :
          <?php
            if($_SESSION['Status'] == 0){
              echo "Member";
            }else if ($_SESSION['Status'] == 1){
              echo "Pretty";
            }
          ?>
      </a></span>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ตั้งค่าการใช้งาน
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if ($_SESSION['Status'] == 0){ ?>
            <a class="dropdown-item" href = "./edit.php"><span class="glyphicon glyphicon-user"></span> ข้อมูลส่วนตัว</a>
            <a class="dropdown-item" href = "./password.php"><span class="glyphicon glyphicon-user"></span> เปลี่ยนรหัสผ่าน</a>
          <?php } ?>
          <?php if ($_SESSION['Status'] == 1){ ?>
            <a class="dropdown-item" href = "./upload.php"><span class="glyphicon glyphicon-user"></span> อัพโหลดรูปภาพ</a>
            <a class="dropdown-item" href = "./edit1.php"><span class="glyphicon glyphicon-user"></span> ข้อมูลส่วนตัว</a>
            <a class="dropdown-item" href = "./password.php"><span class="glyphicon glyphicon-user"></span> เปลี่ยนรหัสผ่าน</a>
            <a class="dropdown-item" href = "./search.php"><span class="glyphicon glyphicon-user"></span> ค้นหาข้อมูล</a>
          <?php } ?>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./logout.php">ออกจากระบบ</a>
        </div>
      </li>
      <p id = 'p2'></p>
    </ul>
  </div>
</nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.slim.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
<?php } ?>
</html>
