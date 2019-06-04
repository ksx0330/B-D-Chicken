<?php
//include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";
include "../../sql/connection/dbconnect.php";

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
                이메일 찾기
              </span>

            </div>
          </div>

          <div class="col-lg-12 col-md-6 mb-4">
            <div class="card h-100">
              <div clas="card-body">
                <div class="large_font p-5">
                  <?php
                    $name = $_POST["user_name"];
                    $tel = mysqli_real_escape_string($con, str_replace('-', '', $_POST["user_tel"]));

                    $sql = "SELECT `email` FROM user WHERE name='$name' AND tel='$tel';";
                    mysqli_query($con, "set session character_set_connection=utf8;");
                    mysqli_query($con, "set session character_set_results=utf8;");
                    mysqli_query($con, "set session character_set_client=utf8;");

                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    if (!$row["email"]) {
                      echo "잘못 입력하셨습니다.<br>";
                    }
                    else {
                      echo "당신의 이메일은 " . "<span style=\"color: red;\">" . $row["email"] . "</span> 입니다.<br>";
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
