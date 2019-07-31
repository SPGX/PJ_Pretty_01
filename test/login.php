<?php

include 'navbar1.php';

?>

<form method = "POST" action = 'login.php'>
  <br><br>
  <body background="img/bg.jpg" width="100%" height="100%"/>
<div class="container card" width = '300px' style="margin-top:-30px">
            <tr style = 'margin-left:1020px'>
		<center>
		<br>
      <td>
        <img src = './img/login.png' width = '200px' height = '200px' id = 'p1'/>
        <table align = 'center' width = '270px'>
          <tr>
            <td>
              <label>ชื่อผู้ใช้งาน</label>
              <input class = 'form-control' name = 'textbox1' id = 'p1' type = 'text' autofocus required placeholder = 'ชื่อผู้ใช้'/>
              <label>รหัสผ่าน</label>
              <input class = 'form-control' name = 'textbox2' id = 'p1' type = 'password' required placeholder = 'รหัสผ่าน'/>
              <input class = 'btn btn-primary btn-lg btn-block' name = 'button1' type = 'submit' value = 'เข้าสู่ระบบ'/>
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
  $user = $_POST['textbox1'];
  $pass = $_POST['textbox2'];
  $query = "select * from member where Username = ? and Password = ?";
  $p1 = new myclass();
  $p1 -> login($query, $user, $pass);
}

?>
