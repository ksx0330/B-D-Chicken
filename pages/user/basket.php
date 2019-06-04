<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

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

          <div class="col-lg-12 mt-4">
            <div class="btn btn-yellow full_button">
                <span class="huge_font" style="float: left; padding-left: 1.5rem;">
                    장바구니
                </span>

            </div>
          </div>

        <div class="card">
            <div class="card-body text-center">

                <div class="card">
                    <div class="card-body text-left">
                      <?php
                        mysqli_query($con, "set session character_set_connection=utf8;");
                        mysqli_query($con, "set session character_set_results=utf8;");
                        mysqli_query($con, "set session character_set_client=utf8;");

                        $basket = $_COOKIE["baskets"];

                        $item_sql = "SELECT `title`, `price`, `context`, (SELECT url FROM `item_images` WHERE `itemId` = `items`.`ID`) as `url` FROM `items` WHERE `ID` = '$chickenId'";
                        $result = mysqli_query($con, $item_sql);
                        if ($result == False) exit();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $title = $row['title'];
                            $price = str_replace(',', '', $row['price']);
                            $context = $row['context'];
                            $url = $row['url'];
                        }

                        foreach($basket as $val) {

                        }
                      ?>
                        <img class="float-left" src="../../<?php echo $url; ?>" width=220 height=120>
                        <div class="large_font float-left px-4" style="width: calc(100% - 220px)">
                            <div>
                                <span>이름: </span>
                                <span><?php echo $title; ?></span>
                            </div>
                            <div>
                                <span>개수: </span>
                                <span><?php echo $num; ?> 개</span>
                            </div>

                            <div class="float-right">
                                <span><?php echo number_format($price * $num); ?> 원</span>
                            </div>
                        </div>

                    </div>
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
