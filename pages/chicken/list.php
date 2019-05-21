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
                    일반 메뉴 조회
                </span>
                <a href="./index.php" class="btn btn-lg btn-secondary text-left" style="float: right">
                    이 달의 추천 메뉴
                    <div style="padding-left: 20px; float: right;"><img src="../../assets/images/arrow.svg" width=30 height=30 /></div>
                </a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../../assets/images/foreChicken.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">네조각 치킨</a>
                </h4>
                <h5>4,000원</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../../assets/images/seedChicken.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">씨앗 치킨</a>
                </h4>
                <h5>16,000원</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../../assets/images/mintChicken.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">민트 치킨</a>
                </h4>
                <h5>0원</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../../assets/images/moldiv.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">몰디브 치킨</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="../../assets/images/sunsul.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">선술점 치킨</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Six</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->


      <div class="col-lg-3" style="padding-right: 3%; padding-left: 2%">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="../../assets/images/Text_Logo.svg" width=100 height=100 class="img_top" />
                        <img src="../../assets/images/Chicken_Logo.svg" width=100 height=150 />
                    </div>
                    <h5 class="card-title">로그인</h5>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="이메일" id="staticEmail" >
                            <input type="password" class="form-control" placeholder="패스워드" id="inputPassword">
                        </div>
                        <button type="submit" class="btn btn-primary form-control">로그인</button>
                    </form>
                  </div>
                </div>

            <div class="card">
                <div class="card-body">
                    <div class="btn btn-lg btn-red full_button text-left">
                        <span class="large_font">배달조회</span>
                        <div style="float: right;"><img src="../../assets/images/box.svg" width=100 height=120 /></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="btn btn-lg btn-yellow full_button text-left">
                        <span class="large_font">
                            커뮤니티
                            <div style="float: right; padding-top: 10px;">
                                <img src="../../assets/images/Q&A.svg" width=90 height=65 />
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
                        <div class="url_label"><img src="../../assets/images/lck.png" width=180 height=100 /></div>
                        <div class="url_label"><img src="../../assets/images/kbo.png" width=180 height=100 /></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include "../footer.php"; ?>

    </body>
</html>
