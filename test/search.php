<?php

include 'navbar2.php';

$query_province = "select * from provinces";
$result_province = $object1 -> prepare($query_province);
$result_province -> execute();

$query_name = "select * from member";
$result_name = $object1 -> prepare($query_name);
$result_name -> execute();
$row_name = $result_name -> fetch(PDO::FETCH_ASSOC);

?>

<br><br>

<form action="search.php" method="post">
  <div class="container">
    <table class = 'table table-bordered'>
      <tr>
        <td>
          <div class="row">
          <div class="col-md-5 mb-3">
            <label>ชื่อ-นามสกุล หรือ ชื่อเล่น</label>
            <input class = 'form-control' name = 'search' id = 'p1' type = 'search'/>
          </div>

          <div class="col-md-4 mb-3">
            <label>ประเภทงาน</label>
            <select class="form-control" name="search1">
              <option></option>
              <option>ถ่ายแบบ</option>
              <option>รีวิวสินค้า</option>
              <option>เอนเตอร์เทน ให้ความสนุกสนาน</option>
              <option>นำเสนอสินค้า</option>
              <option>โชว์รถ</option>
            </select>
          </div>

          <div class="col-md-3 mb-3">
            <label>จังหวัด</label>
            <select class="form-control" name="search2">
              <option></option>
              <?php while ($row_province = $result_province -> fetch(PDO::FETCH_ASSOC)){ ?>
                <option><?php echo $row_province['name_th']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>

          <input class = 'btn btn-primary btn-lg btn-block' name = 'btn_search' type = 'submit' value = 'ค้นหา'/>
        </td>
      </tr>
    </table>
  </div>

  <?php

  if (isset($_POST['search']) && isset($_POST['search1']) && isset($_POST['search2'])){

    $search = $_POST['search'];

    $search1 = $_POST['search1'];

    $search2 = $_POST['search2'];

    $name = $row_name['name'];

    $nickname = $row_name['nickname'];

    $strKeyword1 = "%$search%";
    $strKeyword2 = "%$search1%";
    $strKeyword3 = "%$search2%";

    $query_search = "select * from member where name like ? and type like ? and address like ?";
    $result_search = $object1 -> prepare($query_search);

    $result_search -> bindParam('1', $strKeyword1);
    $result_search -> bindParam('2', $strKeyword2);
    $result_search -> bindParam('3', $strKeyword3);
    $result_search -> execute();

    while ($row_search = $result_search -> fetch(PDO::FETCH_ASSOC)){
      $row_button_view = $row_search['name_view'];

      if (isset($_POST['btn_search']) || isset($_POST[$row_button_view])){

          $btn_view = $row_search['name_view'];
          $get_array = 0;
          if($row_search['img'] != ''){

            if (isset($_POST[$btn_view])){
              //echo $btn_view;
              $_SESSION['name_view'] = $btn_view;
              echo "<script>location.href='./view.php';</script>";
            }
  ?>

  <div class="container">
    <table class = 'table table-bordered' align = 'center'>
      <tr align = 'center'>
        <td>
          <?php $row_img = $row_search['img']; echo "<img src = '$row_img' width = '250px' height = '300px'/>"; ?>
            <br>
            ชื่อจริง: <span class="badge badge-dark"><?php echo $row_search['name']; ?></span>
            <br>
            ชื่อเล่น: <span class="badge badge-dark"><?php echo $row_search['nickname']; ?></span>
            <br>
            อายุ: <span class="badge badge-info"><?php echo $row_search['age']; ?> ปี</span>
            <br>
            รับงาน: <span class="badge badge-secondary"><?php echo $row_search['type']; ?></span>
            <br>
            จังหวัด: <span class="badge badge-success"><?php echo $row_search['address']; ?></span>
            <br>
            Like: <span class="badge badge-success"><?php echo $row_search['r_like']; ?></span>
            <br>
            View: <span class="badge badge-success"><?php echo $row_search['r_view']; ?></span>
            <br>
            <input class = 'btn btn-warning' name = "<?php echo $row_search['name_view'] ?>" id = 'p1' type = 'submit' value = 'View'/>
        </td>
      </tr>
    </table>
  </div>

  <?php }} ?>

<?php }} ?>

</form>
