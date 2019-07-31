<?php

include 'navbar2.php';

if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size = $_FILES['image']['size'];
   $file_tmp = $_FILES['image']['tmp_name'];
   $file_type = $_FILES['image']['type'];

   $exit1 = explode('.', $_FILES['image']['name']);

   $exit2 = end($exit1);

   $file_ext = strtolower($exit2);

   //$file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));

   $expensions= array("jpeg","jpg","png");

   if(in_array($file_ext,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }

   if($file_size > 10097152) {
      $errors[]='File size must be excately 10 MB';
   }

   if(empty($errors)==true) {
      move_uploaded_file($file_tmp,"images/".$file_name);
      $id = $_SESSION['id'];
      $name_img = "./images/".$file_name;
      $query = "update member set img = ? where id = ?";
      $result = $object1 -> prepare($query);
      $result -> bindParam('1', $name_img);
      $result -> bindParam('2', $id);
      $result -> execute();
      //echo "<table align = 'center' width = '300px'><tr><td><p class = 'alert alert-success alert-dismissible fade in' align = 'center'>Upload รูปภาพสำเร็จ</p></td></tr></table>";
      //header('location: ./home.php');
      echo "<script>alert('Success');</script>";

   }else{
      print_r($errors);
   }
}

?>

<form action = "" method = "POST" enctype = "multipart/form-data">
  <br><br>
  <body background="img/bg.jpg" width="100%" height="100%"/>
<div class="container card" width = '300px' style="margin-top:-30px">
            <tr style = 'margin-left:1020px'>
		<center>
		<br>
      <td>
        <img src = './img/cloud_upload-512.png' width = '200px' height = '200px' id = 'p1'/>
        <table align = 'center' width = '350px'>
          <tr>
            <td>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input name = 'image' type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
              <input class = 'btn btn-warning btn-lg btn-block' type = 'submit' value = 'Upload'/>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <br>
</form>
