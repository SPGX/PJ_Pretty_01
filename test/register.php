<?php

include 'navbar1.php';

?>

<form method = "POST" action = 'register.php'>
  <br><br>
  <body background="img/bg.jpg" width="100%" height="100%"/>
<div class="container card" width = '300px' style="margin-top:-30px">
            <tr style = 'margin-left:1020px'>
  <table width = '50%' align = 'center'>
    <tr align = 'center'>
      <td><br>
        <img src = './img/register.png' width = '200px' height = '200px' id = 'p1'/>
        <table align = 'center' width = '270px'>
          <tr>
            <td>
              <input class = 'form-control' name = 'username' id = 'p1' type = 'text' autofocus required placeholder = 'ชื่อผู้ใช้งาน'/>
              <input class = 'form-control' name = 'password1' id = 'p1' type = 'password' required placeholder = 'รหัสผ่าน'/>
              <input class = 'form-control' name = 'password2' id = 'p1' type = 'password' required placeholder = 'ยืนยันรหัสผ่าน'/>
              <input class = 'form-control' name = 'email' id = 'p1' type = 'email' required placeholder = 'อีเมล'/>
              <input class = 'form-control' name = 'tel' id = 'p1' type = 'number' required placeholder = 'เบอร์โทร'/>
              <select class = 'form-control' name = 'select1' id = 'p1'>
                <option value = "0">ผู้ใช้งานทั่วไป</option>
                <option value = "1">พริตตี้</option>
              </select>
              <input class = 'btn btn-primary btn-lg btn-block' name = 'button1' id = 'p1' type = 'submit' value = 'สมัครสมาชิก'/>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</form>

<?php

if (isset($_POST['button1'])){
  $user = $_POST['username'];
  $pass = $_POST['password1'];
  $pass1 = $_POST['password2'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $status = $_POST['select1'];
  $id = md5($user);
  $id1 = md5($id);

  if ($pass != $pass1){
    echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-danger' align = 'center'>รหัสผ่านไม่ตรงกัน</p></td></tr></table>";
    exit();
  }

  $query = "insert into member (Username, Password, Email, Tel, Status, name_like, name_view) values (?, ?, ?, ?, ?, ?, ?)";

  $p1 = new myclass();

  $p1 -> register($query, $user, $pass, $email, $tel, $status, $id, $id1);
}

?>
