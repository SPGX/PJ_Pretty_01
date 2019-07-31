<?php

include 'navbar2.php';

$name_view = $_SESSION['name_view'];

$query_view = "select * from member where name_view = ?";
$result_view = $object1 -> prepare($query_view);
$result_view -> bindParam('1', $name_view);
$result_view -> execute();
$row_view = $result_view -> fetch(PDO::FETCH_ASSOC);

$query_select = "select * from member where name_view = ?";
$result_select = $object1 -> prepare($query_select);
$result_select -> bindParam('1', $name_view);
$result_select -> execute();

while ($row_select = $result_select -> fetch(PDO::FETCH_ASSOC)){
  $sum_value = $row_select['r_view'] + 1;
  $date_check = date('d');
  $query_check = "update member set check_date = ? where name_view = ?";
  $result_check = $object1 -> prepare($query_check);
  $result_check -> bindParam('1', $date_check);
  $result_check -> bindParam('2', $name_view);
  $result_check -> execute();

  $query_date = "update member set r_view = ? where name_view = ?";
  $result_date = $object1 -> prepare($query_date);

  if ($date_check != $row_select['check_date']){
    $result_date -> bindParam('1', $sum_value);
    $result_date -> bindParam('2', $name_view);
    $result_date -> execute();
  }else{
    //exit();
  }
}


?>

<form method = "POST" action = 'view.php'>
  <br><br>
  <table align = 'center' width = '50%'>
    <tr align = 'center'>
      <td>
        <table class = 'table table-bordered' width = '100%' align = 'center'>

          <tr align = 'center'>
            <th>ข้อมูล พริตตี้</th>
          </tr>

          <tr align = 'center'>
            <td>
              <img src = "<?php echo $row_view['img']; ?>"/>
            </td>
          </tr>

          <tr align = 'left'>
            <td>
              <b>ชื่อ-นามสกุล</b> : <?php echo $row_view['name']; ?>
              <br>
              <b>ชื่อเล่น</b> : <?php echo $row_view['nickname']; ?>
              <br>
              <b>อายุ</b> : <?php echo $row_view['age'].' '.'ปี'; ?>
              <br>
              <b>น้ำหนัก</b> : <?php echo $row_view['weight'].' '.'กิโลกรัม'; ?>
              <br>
              <b>ส่วนสูง</b> : <?php echo $row_view['height'].' '.'เซนติเมตร'; ?>
              <br>
              <b>สัดส่วน</b> : <?php echo $row_view['size']; ?>
              <br>
              <b>ประเภทงาน</b> : <?php echo $row_view['type']; ?>
              <br>
              <b>ค่าตัว</b> : <?php echo $row_view['rate'].' '.'บาท'; ?>
              <br>
              <b>ประสบการณ์</b> : <?php echo $row_view['work']; ?>
              <br>
              <b>อีเมลล์</b> : <?php echo $row_view['Email']; ?>
              <br>
              <b>เบอร์โทร</b> : <?php echo $row_view['Tel']; ?>
              <br>
              <b>ที่อยู่</b> : <?php echo $row_view['address']; ?>
            </td>
          </tr>

          <tr align = 'center'>
            <td>
              <input class = 'btn btn-primary' name = "<?php echo $row_view['name_like']; ?>" id = 'p1' type = 'submit' value = 'Like'/>
              <input class = 'btn btn-warning' name = "<?php echo $row_view['name_view']; ?>" id = 'p1' type = 'submit' value = 'View'/>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</form>
