<?php
include "/home/ltaeng/Downloads/con/dbconnect.php";

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
                    이 달의 추천 메뉴
                </span>
                <a href="./list.php" class="btn btn-lg btn-secondary text-left" style="float: right">
                    일반 메뉴 조회
                    <div style="padding-left: 20px; float: right;"><img src="../../assets/images/arrow.svg" width=30 height=30 /></div>
                </a>

            </div>
          </div>

          <?php
          mysqli_query($con, "set session character_set_connection=utf8;");
          mysqli_query($con, "set session character_set_results=utf8;");
          mysqli_query($con, "set session character_set_client=utf8;");

          $sql = "SELECT `ID`, `title`, `price`, `context`, (SELECT `url` FROM `item_images` WHERE `itemId` = `items`.`ID`) as `url` FROM `items` WHERE `rec` = 1";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
              echo '
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="../../' . $row['url'] . '" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#">' . $row['title'] . '</a>
                    </h4>
                    <h5>' . $row['price'] . '원</h5>
                    <p class="card-text">' . $row['context'] . '</p>
                  </div>
                  <div class="card-footer"></div>
                </div>
              </div>';
          }

          ?>


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
