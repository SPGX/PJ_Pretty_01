<?php

session_start();

class myclass{
  private $db_con = "mysql:host=localhost;dbname=test;charset=utf8";
  private $user = "root";
  private $pass = '26751';

  public function connect(){
    $result = new PDO($this -> db_con, $this -> user, $this -> pass);
    return $result;
  }

  public function login($query, $user, $pass){
    //$query = "select * from member where Username = ? and Password = ?";
    $result = $this -> connect() -> prepare($query);
    $result -> bindParam('1', $user);
    $result -> bindParam('2', $pass);
    $result -> execute();
    $row = $result -> fetch(PDO::FETCH_ASSOC);
    if ($result -> rowCount() >= 1){
      $_SESSION['id'] = $row['id'];
      $_SESSION['Username'] = $row['Username'];
      $_SESSION['Email'] = $row['Email'];
      $_SESSION['Tel'] = $row['Tel'];
      $_SESSION['Status'] = $row['Status'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['nick'] = $row['nickname'];
      $_SESSION['weight'] = $row['weight'];
      $_SESSION['age'] = $row['age'];
      $_SESSION['height'] = $row['height'];
      $_SESSION['size'] = $row['size'];
      $_SESSION['type'] = $row['type'];
      $_SESSION['rate'] = $row['rate'];
      $_SESSION['address'] = $row['address'];
      $_SESSION['work'] = $row['work'];
      header('location: ./home.php');
    }else{
      echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-danger' align = 'center'>ชื่อผู้ใช้ หรือ รหัสผ่าน ผิด</p></td></tr></table>";
    }
  }

  public function register($query, $user, $pass, $email, $tel, $status, $name_like, $name_view){
    $result = $this -> connect() -> prepare($query);
    $result -> bindParam('1', $user);
    $result -> bindParam('2', $pass);
    $result -> bindParam('3', $email);
    $result -> bindParam('4', $tel);
    $result -> bindParam('5', $status);
    $result -> bindParam('6', $name_like);
    $result -> bindParam('7', $name_view);
    if ($result -> execute()){
      echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-success' align = 'center'>สมัครสมาชิกสำเร็จ โปรดรอ3วินาที...</p></td></tr></table>";
			header("Refresh:4; url=login.php");
    }else{
      echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-danger' align = 'center'>ชื่อผู้ใช้งาน หรือ อีเมล ซ้ำกันในระบบ</p></td></tr></table>";
    }
  }

  public function pretty($query, $name, $nick, $weight, $age, $height, $size, $type, $rate, $address, $work, $id){
    $result = $this -> connect() -> prepare($query);
    $result -> bindParam('1', $name);
    $result -> bindParam('2', $nick);
    $result -> bindParam('3', $weight);
    $result -> bindParam('4', $age);
    $result -> bindParam('5', $height);
    $result -> bindParam('6', $size);
    $result -> bindParam('7', $type);
    $result -> bindParam('8', $rate);
    $result -> bindParam('9', $address);
    $result -> bindParam('10', $work);
    $result -> bindParam('11', $id);
    if ($result -> execute()){
      echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-success' align = 'center'>แก้ไขข้อมูล สำเร็จ</p></td></tr></table>";
    }else{
      echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-danger' align = 'center'>แก้ไขข้อมูล ไม่สำเร็จ</p></td></tr></table>";
    }
  }

  public function member($query, $name, $nick, $address, $id){
    $result = $this -> connect() -> prepare($query);
    $result -> bindParam('1', $name);
    $result -> bindParam('2', $nick);
    $result -> bindParam('3', $address);
    $result -> bindParam('4', $id);
    if ($result -> execute()){
      echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-success' align = 'center'>แก้ไขข้อมูล สำเร็จ</p></td></tr></table>";
    }else{
      echo "<table align = 'center' width = '270px'><tr><td><p class = 'alert alert-danger' align = 'center'>แก้ไขข้อมูล ไม่สำเร็จ</p></td></tr></table>";
    }
  }
}

$query1 = "mysql:host=localhost;dbname=test;charset=utf8";
$user1 = 'root';
$pass1 = '26751';

try {
  $object1 = new PDO($query1, $user1, $pass1);
} catch (\Exception $e) {

}

?>
