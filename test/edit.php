<?php

include 'navbar2.php';

?>

  <form name = '12345' method = "POST" action = 'edit.php'>
    <br><br>
    <table width = '50%' align = 'center'>
      <tr align = 'center'>
        <td>
          <table class = 'table table-bordered' align = 'center' width = '100%'>
            <tr>
              <td>
                <label>ชื่อผู้ใช้งาน</label>
                <input class = 'form-control' name = 'textbox11' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Username']; ?>" readonly/>
                <label>อีเมลล์</label>
                <input class = 'form-control' name = 'textbox21' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Email']; ?>" readonly/>
                <label>เบอร์โทร</label>
                <input class = 'form-control' name = 'textbox31' id = 'p1' type = 'text' value = "<?php echo $_SESSION['Tel']; ?>" readonly/>
                <label>ชื่อ-นามสกุล</label>
                <input class = 'form-control' name = 'name1' id = 'p1' type = 'text' value = "<?php echo $_SESSION['name']; ?>" autofocus required placeholder = 'ชื่อ-นามสกุล : '/>
                <label>ชื่อเล่น</label>
                <input class = 'form-control' name = 'nick1' id = 'p1' type = 'text' value = "<?php echo $_SESSION['nick']; ?>" required placeholder = 'ชื่อเล่น : '/>
                <label>ที่อยู่</label>
                <input class = 'form-control' name = 'address1' id = 'p1' type = 'text' value = "<?php echo $_SESSION['address']; ?>" required placeholder = 'ที่อยู่ : '/>
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
  if ($_SESSION['Status'] == 0){
    $query1 = "update member set name = ?, nickname = ?, address = ? where id = ?";
    $name1 = $_POST['name1'];
    $nick1 = $_POST['nick1'];
    $address1 = $_POST['address1'];
    $id = $_SESSION['id'];
    $p2 = new myclass();
    $p2 -> member($query1, $name1, $nick1, $address1, $id);
  }
}

?>
