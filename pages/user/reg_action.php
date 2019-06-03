<?php
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

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
                회원가입
              </span>

            </div>
          </div>

          <div class="col-lg-12 col-md-6 mb-4">
            <div class="card h-100">
              <div clas="card-body">
                <div class="large_font p-5">
                  <?php
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $passwd = $_POST["passwd"];
                    $passwd_conf = $_POST["passwd_confirm"];
                    $phone1 = $_POST["phone1"];
                    $phone2 = $_POST["phone2"];
                    $phone3 = $_POST["phone3"];
                    $tel = $phone1 . $phone2 . $phone3;
                    $address = $_POST["address"];

                    if ($passwd != $passwd_conf) {
                      echo "비밀번호가 일치하지 않습니다. 다시 입력해주세요.";
                    }
                    else {
                      $sql = "INSERT INTO user VALUES(NULL, '$name', '$email', '$passwd', '$tel', '$address');";
                      mysqli_query($con, "set session character_set_connection=utf8;");
                      mysqli_query($con, "set session character_set_results=utf8;");
                      mysqli_query($con, "set session character_set_client=utf8;");

                      $result = $con->query($sql);

                      if ($result) {
                        echo "성공적으로 회원가입이 완료되었습니다.<br>";
                      }
                      else {
                        echo "잘못 입력하셨습니다.<br>";
                      }
                    }
                  ?>
                </div>

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
