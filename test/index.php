<?php

include 'navbar1.php';

$query = "select * from member";

$result = $object1 -> prepare($query);

$result -> execute();

?>

  <form method = "POST" action = 'home.php'>
    <br><br>
    <div class="container">
          <table class = 'table table-bordered' align = 'center' width = '100%'>
            <tr align = 'center'>
              <?php
                $get_n = 0;
                while($row = $result -> fetch(PDO::FETCH_ASSOC)){
                  $row0 = $row['Username'];
                  $row1 = $row['img'];
                  $row2 = $row['name'];
                  $row3 = $row['age'];
                  $row4 = $row['type'];
                  $row5 = $row['name_like'];
                  $row6 = $row['name_view'];
                  $row7 = $row['nickname'];
                  $row8 = $row['address'];
                  $row9 = $row['r_like'];
                  $row10 = $row['r_view'];
                  $row11 = $row['name_like'];
                  $row12 = $row['name_view'];

                  //$query_btn_like = "insert into history (Username, )"

                  if ($get_n){
                    echo "<tr align = 'center' width = '100%'>";
                  }
                  $get_n++;
              ?>
              <?php if($row1 != ''){ ?>
                <td>
                  <?php echo "<img src = '$row1' width = '250px' height = '300px'/>"; ?>
                  <br>
                  ชื่อจริง: <span class="badge badge-dark"><?php echo $row2; ?></span>
                  <br>
                  ชื่อเล่น: <span class="badge badge-dark"><?php echo $row7; ?></span>
                  <br>
                  อายุ: <span class="badge badge-info"><?php echo $row3; ?> ปี</span>
                  <br>
                  ยอดถูกใจ: <span class="badge badge-success"><?php echo $row9; ?></span>
                  <br>
                  ยอดเข้าชม: <span class="badge badge-success"><?php echo $row10; ?></span>
                  <br><br>
                </td>
              <?php }} ?>
              <?php echo "</tr>"; ?>
            </tr>
          </table>
        </div>
  </form>
