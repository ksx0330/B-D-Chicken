<?php
session_start();
//include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";
include "../../sql/connection/dbconnect.php";

if (isset($_SESSION['usr_id'])) {
    echo '<script>
            alert("로그아웃을 먼저 해주세요.");
            location.href = "../../index.php";
          </script>';
}

?>
<!DOCTYPE html>
<html>
<head>
  <?php include "../header.php"; ?>
  <style>
  .labelname {
    font-size: 1.25rem;
  }
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
                회원가입
              </span>

            </div>
          </div>

          <div class="col-lg-12 col-md-6 mb-4">
            <div class="card h-100">
              <div class="card-body labelname" style="padding: 50px">
                <form method="post" action="register_action.php">
                  <input type="hidden" name="title" value="회원 가입 양식">
                  <table class="table" border="0" width="50%" cellspacing="1" cellpadding="4" align="center">
                    <tr>
                      <td align="right">이름<sup>*</sup></td>
                      <td><input type="text" class="form-control form-group" name="name" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">이메일<sup>*</sup></td>
                      <td><input type="text" class="form-control form-group" name="email" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">비밀번호<sup>*</sup></td>
                      <td><input type="password" class="form-control form-group" name="passwd" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">비밀번호 확인<sup>*</sup></td>
                      <td><input type="password" class="form-control form-group" name="passwd_confirm" value=""></td>
                    </tr>
                    <tr>
                      <td align="right">휴대전화</td>
                      <td>
                        <div class="input-group form-group">
                          <div class="input-group-append">
                            <select class="form-control custom-select" name="phone1">
                              <option>선택</option>
                              <option value="010">010</option>
                              <option value="011">011</option>
                              <option value="017">017</option>
                            </select>
                          </div>
                          <div class="input-group-text">
                            -
                          </div>
                          <div class="input-group-prepend">
                            <input type="text" class="form-control" size="4" name="phone2" maxlength="4">
                          </div>
                          <div class="input-group-text">
                            -
                          </div>
                          <div class="input-group-prepend">
                            <input type="text" class="form-control" size="4" name="phone3" maxlength="4">
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td align="right">주소</td>
                      <td><input class="form-control form-group" type="text" size="50" name="address"></td>
                    </tr>
                  </table>
                  <input type="submit" class="btn btn-primary form-control w-25 form-group float-right" value="가입하기">
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
