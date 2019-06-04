<?php
<<<<<<< HEAD
//include "/home/ltaeng/Downloads/con/dbconnect.php";
include "../../sql/connection/dbconnect.php";
=======
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";
>>>>>>> upstream/master

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
            <div class="card h-100 p-5">
              <div clas="card-body">
                <div class="large_font">
                  회원가입 하실 때 작성하셨던 이름과 핸드폰 번호를 입력해주세요.
                </div>
                <div class="large_font p-5">
                  <form method="post" action="idfind_action.php">
                    <div class="row p-3">
                      <span class="col-3"></span>
                      <span class="col-2">이름</span>
                      <span class="col-7">
                        <input type="text" class="form-control w-50" name="user_name">
                      </span>
                    </div>

                    <div class="row p-3">
                      <span class="col-3"></span>
                      <span class="col-2">핸드폰 번호</span>
                      <span class="col-7">
                        <input type="text" class="form-control w-50" name="user_tel">
                      </span>
                    </div>

                    <input type="submit" class="btn btn-primary form-control w-25 form-group float-right my-5" value="찾기">
                  </form>
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
