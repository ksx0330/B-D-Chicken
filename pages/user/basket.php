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

if (!isset($_COOKIE['baskets'])) {
    setcookie('baskets', '[]', time() + 60 * 60 * 24, '../');
    $baskets = [];
} else {
    $baskets = json_decode($_COOKIE['baskets'], true);
}

$resultCnt = 0;

if (!empty($baskets)) {
  for($i = 0; $i < count($baskets); $i++) {
    $ID = $baskets[$i]['id'];

    $sql = "SELECT `title`, `price`, (SELECT url FROM `item_images` WHERE `itemId`='$ID') as `url` FROM `items` WHERE `ID`=" . $ID;
    $result = $con->query($sql);
    $row = mysqli_fetch_assoc($result);

    $item[$resultCnt]['ID'] = $ID;
    $item[$resultCnt]['price'] = $row['price'];
    $item[$resultCnt]['url'] = $row['url'];
    $item[$resultCnt]['title'] = $row['title'];
    $item[$resultCnt]['num'] = $baskets[$i]['num'];

    $resultCnt++;
  }
}

if (empty($item))
  $item = [];

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
                <?php

                for ($i = 0; $i < count($item); $i++) {
                    echo '
                    <div class="card" id="chicken' . $item[$i]['ID'] . '">
                        <div class="card-body text-left">
                            <a href="./details.php?id=' . $item[$i]['ID'] . '" .>
                                <img class="float-left" src="../../' . $item[$i]['url'] . '" width=220 height=120>
                            </a>
                            <div class="large_font float-left px-4" style="width: calc(100% - 220px)">
                                <form method="post" action="../chicken/payment.php">
                                  <input type="hidden" name="id" value="' . $item[$i]['ID'] . '">
                                  <input type="hidden" name="num" value="' . $item[$i]['num'] . '">
                                  <input type="submit" class="btn btn-primary float-right" value="주문하기">
                                  <input type="button" class="btn btn-yellow float-right mx-2" value="삭제하기" onclick="myRemove(' . $item[$i]['ID'] . ');">
                                </form>

                                <div>
                                    <span>이름: </span>
                                    <span>' . $item[$i]['title'] . '</span>
                                </div>
                                <div>
                                    <span>개수: </span>
                                    <span>' . $item[$i]['num'] . ' 개</span>
                                </div>

                                <div class="float-right">
                                    <span>' . number_format($item[$i]['price'] * $item[$i]['num']) . ' 원</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    ';
                }

                ?>

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

    <script>
        function myRemove(id) {
            var baskets = <?php echo $_COOKIE['baskets']; ?>;
            baskets.splice(baskets.findIndex(x => x.id === id), 1);

            Cookies.remove('baskets', { path: '../' });
            Cookies.set('baskets', JSON.stringify(baskets));

            location.reload();

            $('div').remove('#chicken' + id);

        }
    </script>

    </body>
</html>
