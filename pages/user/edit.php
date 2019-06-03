<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

$_SESSION['usr_id'] = 3;
$_SESSION['name'] = '김득규';
$_SESSION['email'] = 'emrrb44@naver.com';
$_SESSION['password'] = 'asdf1234';
$_SESSION['tel'] = '01112345678';
$_SESSION['address'] = '경상북도 울릉군 울릉읍 독도리';

if (!isset($_SESSION['usr_id'])) {
  echo '<script>
  alert("로그인이 필요합니다.");
  location.href = "../../index.php";
  </script>';
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
                <form method="post" action="edit_action.php">
                  <div class="large_font row align-items-center">
                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      이름
                    </span>
                    <span class="col-5">
                      <?php
                        $name = $_SESSION['name'];
                        echo "<input type='text' class='form-control' name='user_name' value='$name'>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      이메일
                    </span>
                    <span class="col-5">
                      <?php
                        $email = $_SESSION['email'];
                        echo "<input type='text' class='form-control' name='user_email' value='$email' disabled>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      주소
                    </span>
                    <span class="col-5">
                      <?php
                        $addr = $_SESSION['address'];
                        echo "<input type='text' class='form-control' name='user_addr' value='$addr'>";
                      ?>
                    </span>
                    <span class="col-2"></span>

                    <span class="col-2 my-5"></span>
                    <span class="col-3 text-right">
                      핸드폰 번호
                    </span>
                    <span class="col-5">
                      <?php
                        $p = $_SESSION['tel'];
                        $p1 = substr($p, 0, 3);
                        $p2 = substr($p, 3, 4);
                        $p3 = substr($p, 7, 4);
                        $tel = $p1 . "-" . $p2 . "-" . $p3;

                        echo "<input type='text' class='form-control' name='user_tel' value='$tel'>";
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
