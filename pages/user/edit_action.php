<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) {
  echo '<script>
  alert("로그인이 필요합니다.");
  location.href = "../../index.php";
  </script>';
}

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$user_sql = "SELECT `email`, `tel`, `address`, `point` FROM `user` WHERE `userId`=" . $_SESSION['usr_id'];
$result = mysqli_query($con, $user_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
    $p = $row['tel'];
    $address = $row['address'];
    $point = $row['point'];
}

?>
<!DOCTYPE html>
<html>
<head>
  <?php include "../header.php"; ?>

</head>
<body>
  <?php include "../navbar.php"; ?>

  <!-- Page Content -->
  <div class="container-fluid" style="padding-left: 125px; padding-right: 125px; background-image: url('../../assets/images/background-2.png');">
    <div class="row">

      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">

          <div class="col-lg-12 mt-4">
            <div class="btn btn-yellow full_button">
              <span class="huge_font" style="float: left; padding-left: 1.5rem;">
                프로필 수정
              </span>

            </div>
          </div>

          <div class="col-lg-12 col-md-6 mb-4">
            <div class="card h-100 p-5">
              <div clas="card-body">
                <?php
                  $name = $_POST["user_name"];
                  $addr = $_POST["user_addr"];
                  $tel = $_POST["user_tel"];

                  $sql = "UPDATE `user` SET `name`='$name', `address`='$addr', `tel`='$tel' WHERE `userId`=" . $_SESSION['usr_id'];
                  mysqli_query($con, "set session character_set_connection=utf8;");
                  mysqli_query($con, "set session character_set_results=utf8;");
                  mysqli_query($con, "set session character_set_client=utf8;");

                  $result = mysqli_query($con, $sql);

                  if (!$result) {
                    echo "처리 중 오류가 발생하였습니다.<br>";
                  }
                  else {
                    echo "정보가 성공적으로 수정되었습니다.<br>";
                  }
                ?>
              </div>

              <!--<div class="card-footer"></div>-->
            </div>
          </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->


      <?php include "../sidebar.php"; ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include "../footer.php"; ?>

</body>
</html>
