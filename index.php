<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="삶과 죽음 사이엔 치킨이 있다. Birth & Death 치킨">
        <title>Birth & Death 치킨</title>
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png" />
        <!-- Bootstrap core CSS -->
        <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css?v=0.0.1">

        <!-- JavaScript -->
        <script src="./vendor/jquery/jquery.min.js"></script>
        <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    </head>
    <body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-chicken fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./assets/images/Text_Logo_Horizonal_White.svg" width=100 height=35 /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h4 class="mx-2 my-0" style="padding-left: 2rem; padding-right: 2rem;"> <a href="./pages/chicken/index.php">메뉴</a></h4>
            </li>
            <li class="nav-item">
                <h4 class="mx-2 my-0"> | </h4>
            </li>
            <li class="nav-item">
                <h4 class="mx-2 my-0" style="padding-left: 2rem; padding-right: 2rem;"> <a href="./pages/chicken/baedal.php">배달조회</a> </h4>
            </li>
            <li class="nav-item">
                <h4 class="mx-2 my-0"> | </h4>
            </li>
            <li class="nav-item">
                <h4 class="mx-2 my-0" style="padding-left: 2rem; padding-right: 2rem;"> <a href="./pages/community/notice.php">커뮤니티</a> </h4>
            </li>
            <li class="nav-item">
                <h4 class="mx-2 my-0"> | </h4>
            </li>
            <li class="nav-item">
                <h4 class="mx-2 my-0" style="padding-left: 2rem; padding-right: 2rem;"> <a href="./pages/user/basket.php">장바구니</a> </h4>
            </li>
        </ul>

      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container-fluid" style="padding-left: 125px; padding-right: 125px; background-image: url('./assets/images/background-2.png');">
    <div class="row">

      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <!--
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            -->
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php
            $carousel_sql = "SELECT * FROM `items_carousel`";
            $result = mysqli_query($con, $carousel_sql);
            while ($row = mysqli_fetch_assoc($result))
                echo '
                    <a class="carousel-item" href="./pages/chicken/details.php?id=' . $row['itemId'] . '">
                      <img class="d-block img-fluid" src="' . $row['img'] . '">
                    </a>
                ';
            ?>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          <?php


          $sql = "SELECT `ID`, `title`, `price`, `context`, (SELECT `url` FROM `item_images` WHERE `itemId` = `items`.`ID`) as `url` FROM `items` WHERE `rec` = 1 ORDER BY `ID` DESC LIMIT 0, 6";
          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
              echo '
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href="./pages/chicken/details.php?id=' . $row['ID'] . '"><img class="card-img-top" src="./' . $row['url'] . '" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#">' . $row['title'] . '</a>
                    </h4>
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

      </div>
      <!-- /.col-lg-9 -->


      <div class="col-lg-3" style="padding-right: 3%; padding-left: 2%">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <?php

                    if (!isset($_SESSION['usr_id'])) {
                    ?>
                    <div class="text-center">
                        <img src="./assets/images/Text_Logo.svg" height=100 class="img_top" style="width: 5rem;" />
                        <img src="./assets/images/Chicken_Logo.svg" height=150 style="width: 7rem;" />
                    </div>
                    <h5 class="card-title">로그인</h5>
                    <form method="POST" action="./pages/user/login.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="이메일" name="email" >
                            <input type="password" class="form-control" placeholder="패스워드" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary form-control">로그인</button>

                        <div class="my-1">
                            <div class="float-left">
                                <a href="./pages/user/register.php">회원가입</a>
                            </div>

                            <div class="float-right">
                                <a href="./pages/user/idfind.php">이메일 찾기</a>
                                <a href="./pages/user/pwfind.php">비밀번호 찾기</a>
                            </div>
                        </div>
                    </form>
                    <?php
                    } else {
                    $role_sql = "SELECT `role` FROM `authorities` WHERE `userId` = " . $_SESSION['usr_id'];
                    $result = mysqli_query($con, $role_sql);
                    while ($row = mysqli_fetch_assoc($result))
                        $auth[] = $row['role'];

                    if (in_array("IS_ADMIN", $auth))
                        $isAdmin = true;
                    else
                        $isAdmin = false;

                    $notBaedal = 0;
                    $isBaedal = 0;
                    $completeBaedal = 0;

                    $point_sql = "SELECT `point` FROM `user` WHERE `userId` = " . $_SESSION['usr_id'];
                    $user_sql = "SELECT `baedal`, `completeTime` FROM `baedal_list`";
                    if (!$isAdmin)
                        $user_sql .= " WHERE `userId` = " . $_SESSION['usr_id'];

                    $result = mysqli_query($con, $point_sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $point = $row['point'];
                    }

                    $result = mysqli_query($con, $user_sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['baedal'] == 0 && $row['completeTime'] == NULL) {
                            $notBaedal++;
                        } else if ($row['completeTime'] == NULL) {
                            $isBaedal++;
                        } else {
                            $completeBaedal++;
                        }
                    }

                    ?>
                    <h5 class="text-title">회원정보
                    <?php
                    if ($isAdmin)
                        echo "[관리자]";
                    ?>
                    </h5>
                    <div class="card m-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6 form-group">이름</div>
                                <div class="col-6"><?php echo $_SESSION['usr_name']; ?></div>

                                <div class="col-6">포인트</div>
                                <div class="col-6"><?php echo $point; ?></div>

                                <div class="col-6">주문완료</div>
                                <div class="col-6"><?php echo $notBaedal; ?> 건</div>

                                <div class="col-6">배송중</div>
                                <div class="col-6"><?php echo $isBaedal; ?> 건</div>

                                <div class="col-6">배송완료</div>
                                <div class="col-6"><?php echo $completeBaedal; ?> 건</div>
                            </div>

                        </div>
                    </div>
                    <a class="btn btn-secondary full_button text-white" href="./pages/user/profile.php">내 정보</a>
                    <div class="text-right my-1">
                        <a href="./pages/user/logout.php">로그아웃</a>
                    </div>
                    <?php
                    }

                    ?>
                  </div>
                </div>

            <div class="card" onclick="location.href='./pages/chicken/baedal.php'">
                <div class="card-body">
                    <div class="btn btn-lg btn-red full_button text-left">
                        <span class="large_font">배달조회</span>
                        <div style="float: right;"><img src="./assets/images/box.svg" style="width: 6rem; height: 7rem" /></div>
                    </div>
                </div>
            </div>

            <div class="card" onclick="location.href='./pages/community/notice.php'">
                <div class="card-body">
                    <div class="btn btn-lg btn-yellow full_button text-left">
                        <span class="large_font">
                            커뮤니티
                            <div style="float: right; padding-top: 10px;">
                                <img src="./assets/images/Q&A.svg" style="width: 4rem; height: 4rem;" />
                            </div>
                            <br>& 자유게시판
                        </span>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="btn btn-lg btn-gray full_button text-center">
                        <span class="one_line_height large_font">
                            스포츠 중계
                            <br>
                            사이트 연결
                            <br>
                        </span>
                        <img src="./assets/images/sports.png" style="height: 11.5rem" onclick="window.open('./popup/sports.php', '_blank', 'width=523, height=530, toolbar=no, scrollbars=no, resizable=yes');">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; B&D Chicken (LTaeng Venture)</p>
    </div>
    <!-- /.container -->
  </footer>

    <script>
        $($(".carousel-item")[0]).addClass("active");

    </script>
    </body>
</html>
