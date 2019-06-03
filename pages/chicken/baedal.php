<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) {
    echo '<script>
            alert("로그인이 필요합니다.");
            location.href = "../../index.php";
          </script>';
}

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$resultCnt = 0;

$baedal_list_sql = "SELECT `ID`, `itemId`, `itemName`, `itemNum`, `peopleName`, `addressName`, `phone1`, `phone2`, `address`, `memo`, `usedCupon`, `usedPoint`, `price`, `orderedTime`, `completeTime`, (SELECT url FROM `item_images` WHERE `itemId` = `baedal_list`.`itemId`) as `url` FROM `baedal_list` WHERE `userId` = " . $_SESSION['usr_id'] . " ORDER BY `ID` DESC";
$result = mysqli_query($con, $baedal_list_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $baedal[$resultCnt]['ID'] = $row['ID'];
    $baedal[$resultCnt]['itemId'] = $row['itemId'];
    $baedal[$resultCnt]['itemName'] = $row['itemName'];
    $baedal[$resultCnt]['itemNum'] = $row['itemNum'];
    $baedal[$resultCnt]['peopleName'] = $row['peopleName'];
    $baedal[$resultCnt]['addressName'] = $row['addressName'];
    $baedal[$resultCnt]['phone1'] = $row['phone1'];
    $baedal[$resultCnt]['phone2'] = $row['phone2'];
    $baedal[$resultCnt]['address'] = $row['address'];
    $baedal[$resultCnt]['memo'] = $row['memo'];
    $baedal[$resultCnt]['usedCupon'] = $row['usedCupon'];
    $baedal[$resultCnt]['usedPoint'] = $row['usedPoint'];
    $baedal[$resultCnt]['price'] = $row['price'];
    $baedal[$resultCnt]['orderedTime'] = $row['orderedTime'];
    $baedal[$resultCnt]['completeTime'] = $row['completeTime'];
    $baedal[$resultCnt]['url'] = $row['url'];

    if ($baedal[$resultCnt]['completeTime'] == NULL)
        $baedal[$resultCnt]['isComplete'] = '배달중 ~';
    else
        $baedal[$resultCnt]['isComplete'] = $baedal[$resultCnt]['completeTime'];

    $cuponCnt = 0;
    $cupon_list = json_decode($row['usedCupon']);
    foreach ($cupon_list as $c) {
        $cupon_sql = "SELECT `name`, `price` FROM `cupon_list` WHERE `ID` = " . $c;
        $cupon_result = mysqli_query($con, $cupon_sql);
        while ($cupon_row = mysqli_fetch_assoc($cupon_result)) {
            $baedal[$resultCnt]['cupon'][$cuponCnt][0] = $cupon_row['name'];
            $baedal[$resultCnt]['cupon'][$cuponCnt][1] = $cupon_row['price'];

            $cuponCnt++;
        }
    }

    $resultCnt++;
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
                    배달 조회
                </span>

            </div>
          </div>

        <div class="card">
            <div class="card-body text-center">
                <?php

                for ($i = 0; $i < count($baedal); $i++) {
                    echo '
                    <div class="card">
                        <div class="card-body text-left">
                            <a href="./details.php?id=' . $baedal[$i]['itemId'] . '" .>
                                <img class="float-left" src="../../' . $baedal[$i]['url'] . '" width=220 height=120>
                            </a>
                            <div class="large_font float-left px-4" style="width: calc(100% - 220px)">
                                <span class="btn btn-secondary float-right">
                                    ' . $baedal[$i]['isComplete'] . '
                                </span>

                                <div>
                                    <span>이름: </span>
                                    <span>' . $baedal[$i]['itemName'] . '</span>
                                </div>
                                <div>
                                    <span>개수: </span>
                                    <span>' . $baedal[$i]['itemNum'] . ' 개</span>
                                </div>

                                <div class="float-right">
                                    <span>' . $baedal[$i]['price'] . ' 원</span>
                                </div>
                            </div>

                        </div>
                        <a data-toggle="collapse" href="#item' . $baedal[$i]['ID'] . '" role="button" aria-expanded="false" aria-controls="item' . $baedal[$i]['ID'] . '">
                            <span class="fa fa-sort-down p-2"></span>
                        </a>

                    </div>
                    <div id=item' . $baedal[$i]['ID'] . ' class="collapse">
                        <div class="card m-0">
                            <div class="card-body text-left">
                                <div class="large_font">배송지 정보</div>

                                <div class="row">
                                    <div class="col-2  text-right form-group">
                                        수령인
                                    </div>
                                    <div class="col-10">
                                        ' . $baedal[$i]['peopleName'] . '
                                    </div>

                                    <div class="col-2 text-right form-group">
                                        배송지명
                                    </div>
                                    <div class="col-10">
                                        ' . $baedal[$i]['addressName'] . '
                                    </div>

                                    <div class="col-2 text-right form-group">
                                        연락처1
                                    </div>
                                    <div class="col-10">
                                        ' . $baedal[$i]['phone1'] . '
                                    </div>

                                    <div class="col-2 text-right form-group">
                                        연락처2
                                    </div>
                                    <div class="col-10">
                                        ' . $baedal[$i]['phone2'] . '
                                    </div>

                                    <div class="col-2 text-right form-group">
                                        배송지 주소
                                    </div>
                                    <div class="col-10">
                                        ' . $baedal[$i]['address'] . '
                                    </div>

                                    <div class="col-2 text-right form-group">
                                        배송 메모
                                    </div>
                                    <div class="col-10">
                                        ' . $baedal[$i]['memo'] . '
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="card m-0">
                            <div class="card-body text-left">
                                <div class="large_font">할인 정보</div>

                                <div class="row">
                                    <div class="col-2  text-right form-group">
                                        포인트
                                    </div>
                                    <div class="col-10">
                                        ' . number_format($baedal[$i]['usedPoint']) . '
                                    </div>';

                                    for ($j = 0; $j < count($baedal[$i]['cupon']); $j++)

                                    echo '<div class="col-2  text-right form-group">
                                        ' . $baedal[$i]['cupon'][$j][0] . '
                                    </div>
                                    <div class="col-10">
                                        ' . number_format($baedal[$i]['cupon'][$j][1]) . '원
                                    </div>';

                                echo'</div>

                            </div>
                        </div>
                    </div>';
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

    </body>
</html>
