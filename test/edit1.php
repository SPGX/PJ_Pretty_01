<?php

include 'navbar2.php';

$q0 = "select * from age";
$r0 = $object1 -> prepare($q0);
$r0 -> execute();

$q1 = "select * from age";
$r1 = $object1 -> prepare($q1);
$r1 -> execute();

$q2 = "select * from height";
$r2 = $object1 -> prepare($q2);
$r2 -> execute();

?>

  <form name = '12345' method = "POST" action = 'edit1.php' enctype="multipart/form-data">
    <br><br>
  <table width = '50%' align = 'center'>
    <tr align = 'center'>
      <td>
        <table class = 'table table-bordered' align = 'center' width = '100%'>
          <tr>
            <td>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>ชื่อผู้ใช้งาน</label>
                  <input class = 'form-control' name = 'textbox1' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Username']; ?>" readonly/>
                </div>
                <div class="col-md-6 mb-3">
                  <label>อีเมล</label>
                  <input class = 'form-control' name = 'textbox2' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Email']; ?>" readonly/>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>เบอร์โทร</label>
                  <input class = 'form-control' name = 'textbox3' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Tel']; ?>" readonly/>
                </div>
                <div class="col-md-6 mb-3">
                  <label>ชื่อ-นามสกุล</label>
                  <input class = 'form-control' name = 'name' id = 'p1' type = 'text' value = "<?php echo $_SESSION['name']; ?>" autofocus required placeholder = 'ชื่อ-นามสกุล : '/>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>ชื่อเล่น</label>
                  <input class = 'form-control' name = 'nick' id = 'p1' type = 'text' value = "<?php echo $_SESSION['nick']; ?>" required placeholder = 'ชื่อเล่น : '/>
                </div>
                <div class="col-md-6 mb-3">
                  <label>น้ำหนัก</label>
                  <select class = "form-control" name = "weight">
                    <option><?php echo $_SESSION['weight']; ?></option>
                    <?php while ($row0 = $r0 -> fetch(PDO::FETCH_ASSOC)){ ?>
                      <option><?php echo $row0['number']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>อายุ</label>
                  <select class = "form-control" name = "age">
                    <option><?php echo $_SESSION['age']; ?></option>
                    <?php while ($row1 = $r1 -> fetch(PDO::FETCH_ASSOC)){ ?>
                      <option><?php echo $row1['number']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label>ส่วนสูง</label>
                  <select class = "form-control" name = "height">
                    <option><?php echo $_SESSION['height']; ?></option>
                    <?php while ($row2 = $r2 -> fetch(PDO::FETCH_ASSOC)){ ?>
                      <option><?php echo $row2['number']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>สัดส่วน</label>
                  <input class = 'form-control' name = 'size' id = 'p1' type = 'text' value = "<?php echo $_SESSION['size']; ?>" required placeholder = 'สัดส่วน : '/>
                </div>
                <div class="col-md-6 mb-3">
                  <label>ประเภทงาน</label>
                  <select class="form-control" name="type">
                    <option>ถ่ายแบบ</option>
                    <option>รีวิวสินค้า</option>
                    <option>เอนเตอร์เทน ให้ความสนุกสนาน</option>
                    <option>นำเสนอสินค้า</option>
                    <option>โชว์รถ</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>ค่าตัว</label>
                  <input class = 'form-control' name = 'rate' id = 'p1' type = 'number' value = "<?php echo $_SESSION['rate']; ?>" required placeholder = 'ค่าตัว : '/>
                </div>
                <div class="col-md-6 mb-3">
                  <label>ที่อยู่</label>
                  <select class="form-control" name="address">
                    <option><?php echo $_SESSION['address']; ?></option>
                    <?php
                        $qu = "select * from provinces";
                        $re = $object1 -> prepare($qu);
                        $re -> execute();
                        while ($row = $re -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                      <option><?php echo $row['name_th']; ?></option>
                      <?php } ?>
                  </select>
                </div>
              </div>

              <label>ประสบการณ์</label>
              <input class = 'form-control' name = 'work' id = 'p1' type = 'text' value = "<?php echo $_SESSION['work']; ?>" required placeholder = 'ประสบการณ์ : '/>
              <input class = 'btn btn-warning btn-lg btn-block' name = 'button1' type = 'submit' value = 'แก้ไขข้อมูล'/>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  </form>

<?php
if (isset($_POST['button1'])){
  if ($_SESSION['Status'] == 1){
    $query = "update member set name = ?, nickname = ?, weight = ?, age = ?, height = ?, size = ?, type = ?, rate = ?, address = ?, work = ? where id = ?";
    $name = $_POST['name'];
    $nick = $_POST['nick'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $size = $_POST['size'];
    $type = $_POST['type'];
    $rate = $_POST['rate'];
    $address = $_POST['address'];
    $work = $_POST['work'];
    $id = $_SESSION['id'];

    $p1 = new myclass();
    $p1 -> pretty($query, $name, $nick, $weight, $age, $height, $size, $type, $rate, $address, $work, $id);
  }
}

?>
