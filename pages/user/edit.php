<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chickensql/connection";

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
  <style>
  sup {
    color: #efc970;
  }
  </style>
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
                <form method="post" action="edit_action.php">
                  <div class="large_font row align-items-center">
                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      이름<sup>*</sup>
                    </span>
                    <span class="col-5">
                      <?php
                        $name = $_SESSION['usr_name'];
                        echo "<input type='text' class='form-control' name='user_name' value='$name'>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      이메일<sup>*</sup>
                    </span>
                    <span class="col-5">
                      <?php
                        echo "<input type='text' class='form-control' name='user_email' value='$email' disabled>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      비밀번호<sup>*</sup>
                    </span>
                    <span class="col-5">
                      <?php
                        echo "<input type='password' class='form-control' name='user_pw' value=''>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      비밀번호 수정
                    </span>
                    <span class="col-5">
                      <?php
                        echo "<input type='password' class='form-control' name='user_pwch' value=''>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      비밀번호 수정 확인
                    </span>
                    <span class="col-5">
                      <?php
                        echo "<input type='password' class='form-control' name='user_pwch2' value=''>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      주소
                    </span>
                    <span class="col-5">
                      <?php
                        echo "<input type='text' class='form-control' name='user_addr' value='$address'>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      핸드폰 번호
                    </span>
                    <span class="col-5">
                      <?php
                        echo "<input type='text' class='form-control' name='user_tel' value='$p'>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      포인트
                    </span>
                    <span class="col-5">
                      <?php
                        echo "<input type='text' class='form-control' name='user_point' value='$point' disabled>";
                      ?>
                    </span>
                    <span class="col-2"></span>
                  </div>

                  <input type="submit" class="btn btn-primary form-control w-25 form-group float-right my-5" value="수정하기">
                </form>
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
