<?php

include 'navbar2.php';

$Username = $_SESSION['Username'];

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

                if (isset($_POST[$row11])){
                  //while ($row_pretty = $result_pretty -> fetch(PDO::FETCH_ASSOC)){
                    $query_pretty = "select sum(sum), Username, name_pretty from history where Username = ? and name_pretty = ?";
                    $result_pretty = $object1 -> prepare($query_pretty);
                    $result_pretty -> bindParam('1', $Username);
                    $result_pretty -> bindParam('2', $row0);
                    $result_pretty -> execute();
                    $row_pretty = $result_pretty -> fetch(PDO::FETCH_ASSOC);
                    if ($row_pretty['sum(sum)'] >= 1){
                      echo "<script>alert('Pretty คนนี้กดถูกใจไปแล้ว');</script>";
                    }else{
                      $r_like = $row['r_like'] + 1;
                      $like_query = "update member set r_like = ? where name_like = ?";
                      $result_like = $object1 -> prepare($like_query);
                      $result_like -> bindParam('1', $r_like);
                      $result_like -> bindParam('2', $row11);
                      $result_like -> execute();

                      $query_btn_like = "insert into history (Username, name_pretty, btn_like) values (?, ?, ?)";
                      $result_btn_like = $object1 -> prepare($query_btn_like);
                      $result_btn_like -> bindParam('1', $Username);
                      $result_btn_like -> bindParam('2', $row0);
                      $result_btn_like -> bindParam('3', $row11);
                      $result_btn_like -> execute();
                    }
                }

                if (isset($_POST[$row12])){
                  $_SESSION['name_view'] = $row12;
                  echo "<script>location.href='./view.php';</script>";
                }

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
                รับงาน: <span class="badge badge-secondary"><?php echo $row4; ?></span>
                <br>
                จังหวัด: <span class="badge badge-success"><?php echo $row8; ?></span>
                <br>
                <b>Like: <span class="badge badge-success"></b><?php echo $row9; ?></span> ถูกใจ
                <br>
                <b>View: <span class="badge badge-success"></b><?php echo $row10; ?></span> เข้าชม
                <br><br>
                <input class = 'btn btn-primary' name = "<?php echo $row5; ?>" id = 'p1' type = 'submit' value = 'Like'/>
                <input class = 'btn btn-warning' name = "<?php echo $row6; ?>" id = 'p1' type = 'submit' value = 'View'/>
              </td>
            <?php }} ?>
            <?php echo "</tr>"; ?>
          </tr>
        </table>
      </div>
</form>
