<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chicken/sql/connection/dbconnect.php";

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
    $tel = $row['tel'];
    $address = $row['address'];
    $point = $row['point'];
}

$coupon_sql = "SELECT `cuponId` FROM `cupon` WHERE `userId`=" . $_SESSION['usr_id'];
$result = $con->query($coupon_sql);
$cupon_list = [];

while ($row = mysqli_fetch_assoc($result)) {
    if (empty($cupon_list[$row['cuponId']])) {
        $cupon_list[$row['cuponId']] = 1;
    }
    else {
        $cupon_list[$row['cuponId']]++;
    }
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
                프로필
              </span>

            </div>
          </div>

          <div class="col-lg-12 col-md-6 mb-4">
            <div class="card h-100 p-5">
              <div clas="card-body">
                <div class="large_font row align-items-center">
                  <span class="col-2 my-5"></span>
                  <span class="col-3 text-right">
                    이름
                  </span>
                  <span class="col-5">
                    <?=$_SESSION['usr_name'] ?>
                  </span>
                  <span class="col-2"></span>

                  <span class="col-2 my-5"></span>
                  <span class="col-3 text-right">
                    이메일
                  </span>
                  <span class="col-5">
                    <?=$email ?>
                  </span>
                  <span class="col-2"></span>

                  <span class="col-2 my-5"></span>
                  <span class="col-3 text-right">
                    주소
                  </span>
                  <span class="col-5">
                    <?=$address ?>
                  </span>
                  <span class="col-2"></span>

                  <span class="col-2 my-5"></span>
                  <span class="col-3 text-right">
                    핸드폰 번호
                  </span>
                  <span class="col-5">
                    <?php
                      $p = $tel;
                      $p1 = substr($p, 0, 3);
                      $p2 = substr($p, 3, 4);
                      $p3 = substr($p, 7, 4);

                      echo $p1 . "-" . $p2 . "-" . $p3;
                    ?>
                  </span>
                  <span class="col-2"></span>

                  <span class="col-2 my-5"></span>
                  <span class="col-3 text-right">
                    포인트
                  </span>
                  <span class="col-5">
                    <?=$point ?>
                  </span>
                  <span class="col-2"></span>

                  <span class="col-2 my-5"></span>
                  <div class="col-3 text-right">
                    보유 쿠폰
                  </div>
                  <div class="col-5">
                    <?php
                      if (count($cupon_list) == 0) echo "없음";
                      else {
                        foreach ($cupon_list as $id => $num) {
                          $sql = "SELECT `name`, `price`, `context` FROM `cupon_list` WHERE `ID`=" . $id;
                          $result = $con->query($sql);
                          $row = mysqli_fetch_assoc($result);

                          echo '
                          <div class="card">
                              <div class="card-body text-left">
                                  <div>
                                      <span style="color: red;">' . $row['name'] . '</span>
                                  </div>
                                  <div>
                                      <span style="font-size: 1.2rem;">' . $row['context'] . '</span>
                                  </div>
                                  <div>
                                      <span class="float-right">' . number_format($row['price']) . '원 (' . $num .'개)</span>
                                  </div>
                              </div>
                          </div>
                          ';
                        }
                      }
                    ?>
                  </div>
                  <span class="col-2"></span>
                </div>

                <a href="./edit.php">
                  <div class="btn btn-primary form-control w-25 form-group float-right my-5">
                    프로필 수정
                  </div>
                </a>
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
