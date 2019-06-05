<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = mysqli_real_escape_string($con, $_GET['page']);
}
$maxItem = 9;


if (isset($_SESSION['usr_id'])) {
    $role_sql = "SELECT `role` FROM `authorities` WHERE `userId` = " . $_SESSION['usr_id'];
    $result = mysqli_query($con, $role_sql);
    while ($row = mysqli_fetch_assoc($result))
        $auth[] = $row['role'];

    if (in_array("IS_ADMIN", $auth))
        $isAdmin = true;
    else
        $isAdmin = false;
} else
    $isAdmin = false;

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
                    일반 메뉴 조회
                    <?php
                    if ($isAdmin) {
                    ?>
                     / <a class="text-secondary" href="./upload.php?rec=0">업로드</a>
                     / <a class="text-secondary" href="./modify.php">수정</a>
                    <?php
                    }
                    ?>
                </span>
                <a href="./index.php" class="btn btn-lg btn-secondary text-left text-white" style="float: right">
                    이 달의 추천 메뉴
                    <div style="padding-left: 20px; float: right;"><img src="../../assets/images/arrow.svg" width=30 height=30 /></div>
                </a>

            </div>
          </div>

          <?php
          mysqli_query($con, "set session character_set_connection=utf8;");
          mysqli_query($con, "set session character_set_results=utf8;");
          mysqli_query($con, "set session character_set_client=utf8;");

          $sql = "SELECT `ID`, `title`, `price`, `context`, (SELECT `url` FROM `item_images` WHERE `itemId` = `items`.`ID`) as `url` FROM `items` ORDER BY `ID` DESC LIMIT " . ($page - 1) * $maxItem . ", $maxItem";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
              echo '
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="./details.php?id=' . $row['ID'] . '"><img class="card-img-top" src="../../' . $row['url'] . '" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#">' . $row['title'] . '</a>';

                    if ($isAdmin)
                        echo '<a class="btn btn-success float-right text-white" href="./list_next.php?id=' . $row['ID'] . '">추천 설정</a>';
                    echo '</h4>
                    <h5>' . number_format($row['price']) . '원</h5>
                    <p class="card-text">' . $row['context'] . '</p>
                  </div>
                  <div class="card-footer"></div>
                </div>
              </div>';
          }

          ?>
        </div>
        <!-- /.row -->
        <div class="text-center large_font text-primary">
            <?php
            $count_sql = "SELECT count(`ID`) as 'cnt' FROM `items`";
            $result = mysqli_query($con, $count_sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $cnt = $row['cnt'];
            }

            $minPage = 1;
            $maxPage = (int)($cnt / $maxItem) + 1;

            echo "<a class='text-primary' href='./list.php?page=$minPage'><</a>";
            for ($i = 1; $i < $cnt / $maxItem; $i++)
                echo "<a class='text-primary' href='./list.php?page=$i'>$i</a>, ";
            echo "<a class='text-primary' href='./list.php?page=$i'>$i</a>";
            echo "<a class='text-primary' href='./list.php?page=$maxPage'>></a>";
            ?>
        </div>

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
