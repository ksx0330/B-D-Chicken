<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) {
    echo '<script>
            alert("로그인이 필요합니다.");
            location.href = "../../index.php";
          </script>';
}

$basket = $_COOKIE["baskets"];

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
                        foreach($basket as $val) {
                          echo $val . "<br>";
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

                <form method="post" action="./payment_action.php">
                    <input type="hidden" name="id" value="<?php echo $chickenId; ?>">
                    <input type="hidden" name="num" value="<?php echo $num; ?>">
                    <input type="hidden" name="cupon">

                    <div class="card">
                        <div class="card-body text-left">
                            <div class="large_font">배송지 정보</div>

                            <div class="row text-right">
                                <div class="col-2 p-2">
                                    수령인<sup class="text-danger">*</sup>
                                </div>

                                <div class="col-10 form-group">
                                    <input type="text" name="peopleName" class="form-control" value="<?php echo $_SESSION['usr_name']; ?>" required>
                                </div>

                                <div class="col-2 p-2 text-secondary">
                                    배송지명
                                </div>

                                <div class="col-10 form-group">
                                    <input type="text" name="addressName" class="form-control">
                                </div>

                                <div class="col-2 p-2">
                                    연락처1<sup class="text-danger">*</sup>
                                </div>

                                <div class="col-10 form-group">
                                    <input type="text" name="phone1" class="form-control" value="<?php echo $tel; ?>" required>
                                </div>

                                <div class="col-2 p-2 text-secondary">
                                    연락처2
                                </div>

                                <div class="col-10 form-group">
                                    <input type="text"  name="phone2" class="form-control">
                                </div>

                                <div class="col-2 p-2">
                                    배송지 주소<sup class="text-danger">*</sup>
                                </div>

                                <div class="col-10 form-group">
                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" required>
                                </div>

                                <div class="col-12"> <hr> </div>
                                <div class="col-2 p-2 text-secondary">
                                    배송 메모
                                </div>

                                <div class="col-10 form-group">
                                    <textarea name="memo" class="form-control"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-left">
                            <div class="large_font">할인 및 포인트</div>

                            <div class="row text-right">
                                <div class="col-2 p-2">
                                    포인트
                                </div>

                                <div class="col-9 form-group form-row" style="margin-right: 5px">
                                    <div class="col-6">
                                        <input id="point" name="point" type="number" min=0 max="<?php echo $point; ?>" class="form-control">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" value="<?php echo number_format($point) ?>원" readonly>
                                    </div>
                                </div>

                                <div class="col-1 text-left">
                                    <div class="btn btn-secondary" onclick="usePoint()">사용</div>
                                </div>

                                <div class="col-2 p-2">
                                    적용된 쿠폰
                                </div>

                                <div class="col-9 form-group">
                                    <select size="4" id="usedCupon" class="form-control">
                                    </select>
                                </div>

                                <div class="col-1 text-left">
                                    <div class="btn btn-secondary" onclick="delCupon()">삭제</div>
                                </div>

                                <div class="col-2 p-2">
                                    사용 가능한 쿠폰
                                </div>

                                <div class="col-9 form-group">
                                    <select id="unusedCupon" class="form-control">
                                        <?php
                                        echo count($cupon);
                                        for ($i = 0; $i < count($cupon); $i++)
                                            echo "<option name=" . $cupon[$i]['id'] . " price=" . $cupon[$i]['price'] . ">" . $cupon[$i]['name'] ." (" . number_format($cupon[$i]['price']) . "원)</option>";
                                        ?>
                                    </select>
                                </div>

                                <div class="col-1 text-left">
                                    <div class="btn btn-secondary" onclick="useCupon()">사용</div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-left">
                            <div class="large_font">가격</div>

                            <div class="row text-right">
                                <div class="col-2">
                                    원가
                                </div>

                                <div class="col-10 form-group text-left large_font">
                                    <?php echo $price * $num . " 원"; ?>
                                </div>


                                <div class="col-2">
                                    할인
                                </div>

                                <div id="discountPrice" class="col-10 form-group text-left large_font">
                                    <?php echo /* $price . */ "0 원"; ?>
                                </div>

                                <div class="col-2">
                                    구매가
                                </div>

                                <div id="totalPrice" class="col-10 form-group text-left large_font"><?php echo $price * $num . " 원"; ?>
                                </div>

                            </div>

                        </div>
                    </div>

                    <input type="submit" class="btn btn-yellow full_button large_font" value="구매">

                </form>

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
        var originalPrice = Number($("#totalPrice").text().split(" ")[0]);
        var cuponPrice = 0;
        var pointPrice = 0;

        $(document).ready(function() {
            var allInputs = $('.form-control');
            $(".form-control").not("#point").keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    var nextInput = allInputs.get(allInputs.index(this) + 1);
                    if (nextInput) {
                        nextInput.focus();
                    }
                }
            });

            $("#point").keydown(function(event) {
                if (event.keyCode == 13) {

                    if (Number($(this).val()) <= Number($(this).attr("max")))
                        usePoint();
                    event.preventDefault();
                }
            });

        });

        function usePoint() {
            var point = $("#point");

            if (Number(point.val()) < (originalPrice - cuponPrice)) {
                pointPrice = Number(point.val());
                updatePrice();
            } else {
                pointPrice = originalPrice - cuponPrice;
                point.val(pointPrice);
                updatePrice();
            }
        }

        function useCupon() {
            var nowCupon = $("#unusedCupon option:selected");
            if (nowCupon.length == 0) return;

            if (Number(nowCupon.attr("price")) <= (originalPrice - cuponPrice - pointPrice)) {
                $("#usedCupon").append("<option name=" + nowCupon.attr("name") + " price=" + nowCupon.attr("price") + ">" + nowCupon.text() + "</option>");
                nowCupon.remove();

                cuponPrice += Number(nowCupon.attr("price"));
                updatePrice();
                updateCupon();
            }
        }

        function delCupon() {
            var nowCupon = $("#usedCupon option:selected");
            if (nowCupon.length == 0) return;

            $("#unusedCupon").append("<option name=" + nowCupon.attr("name") + " price=" + nowCupon.attr("price") + ">" + nowCupon.text() + "</option>");
            nowCupon.remove();

            cuponPrice -= Number(nowCupon.attr("price"));
            updatePrice();
            updateCupon();
        }

        function updatePrice() {
            $("#discountPrice").text( cuponPrice + pointPrice + " 원");
            $("#totalPrice").text( originalPrice - (cuponPrice + pointPrice) + " 원");
        }

        function updateCupon() {
            var values = $.map($('#usedCupon option'), function(e) { return $(e).attr('name'); });
            $("input[name='cupon']").val(JSON.stringify(values));
        }



    </script>

    </body>
</html>
