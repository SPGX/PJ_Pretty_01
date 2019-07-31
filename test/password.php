<?php

include 'navbar2.php';

?>

<form method = "POST" action = 'password.php'>
  <br><br>
  <body background="img/bg.jpg" width="100%" height="100%"/>
<div class="container card" width = '300px' style="margin-top:-30px">
            <tr style = 'margin-left:1020px'>
		<center>
		<br>
      <td>
        <img src = './img/password.png' width = '200px' height = '200px' id = 'p1'/>
        <table align = 'center' width = '270px'>
          <tr>
            <td>
              <label>รหัสผ่านปัจจุบัน</label>
              <input class = 'form-control' name = 'textbox1' id = 'p1' type = 'password' autofocus required placeholder = 'รหัสผ่านปัจจุบัน : '/>
              <label>รหัสผ่านใหม่</label>
              <input class = 'form-control' name = 'textbox2' id = 'p1' type = 'password' required placeholder = 'รหัสผ่านใหม่ : '/>
              <label>ยืนยันรหัสผ่าน</label>
              <input class = 'form-control' name = 'textbox3' id = 'p1' type = 'password' required placeholder = 'ยืนยันรหัสผ่าน : '/>
              <input class = 'btn btn-warning btn-lg btn-block' name = 'button1' type = 'submit' value = 'เปลี่ยนรหัสผ่าน'/>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <br>
</form>

<?php

if (isset($_POST['button1'])){
  $id = $_SESSION['id'];
  $pass1 = $_POST['textbox1'];
  $pass2 = $_POST['textbox2'];
  $pass3 = $_POST['textbox3'];

  $query_check = "select * from member";
  $result_check = $object1 -> prepare($query_check);
  $result_check -> execute();
  $row_check = $result_check -> fetch(PDO::FETCH_ASSOC);

  $query_password = "update member set Password = ? where id = ?";
  $result_password = $object1 -> prepare($query_password);
  $result_password -> bindParam('1', $pass2);
  $result_password -> bindParam('2', $id);
  //$check_password = $result_password -> execute();
  //$row_password = $result_password -> fetch(PDO::FETCH_ASSOC);

  if ($pass2 != $pass3){
    echo "<table align = 'center' width = '300px'><tr><td><p class = 'alert alert-danger' align = 'center'>รหัสผ่านไม่ตรงกัน</p></td></tr></table>";
    exit();
  }else if (($pass1 == $row_check['Password']) && ($pass2 == $pass3)){
    $result_password -> execute();
    echo "<table align = 'center' width = '300px'><tr><td><p class = 'alert alert-success' align = 'center'>เปลี่ยนรหัสผ่านสำเร็จ</p></td></tr></table>";
  }else{
    echo "<table align = 'center' width = '300px'><tr><td><p class = 'alert alert-danger' align = 'center'>รหัสผ่านผิด</p></td></tr></table>";
    exit();
  }



  //if ($pass1 ==  $row_check['Password'] && $pass2 == $pass3)
}













?>
