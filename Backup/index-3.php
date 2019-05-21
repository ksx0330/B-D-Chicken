<?php
include "/home/ltaeng/Downloads/con/dbconnect.php";

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
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <input type="text" class="form-control" placeholder="검색" style="display: inline-block; width: auto;"/>
            <div class="btn btn-info">검색</div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container-fluid" style="padding-left: 125px; padding-right: 125px">
    <div class="row" style="/*background-image: url('./assets/images/background-2.png'); */">

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
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="./assets/images/cherryChicken.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="./assets/images/huneyChili.png" alt="Second slide">
            </div>
            <!--
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/1200x350" alt="Third slide">
            </div>
            -->
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

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="./assets/images/foreChicken.png" alt=""></a>
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
              <a href="#"><img class="card-img-top" src="./assets/images/seedChicken.png" alt=""></a>
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
              <a href="#"><img class="card-img-top" src="./assets/images/mintChicken.png" alt=""></a>
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
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Four</a>
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
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Five</a>
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
                        <img src="./assets/images/Text_Logo.svg" width=100 height=100 class="img_top" />
                        <img src="./assets/images/Chicken_Logo.svg" width=100 height=150 />
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
                    <div class="btn btn-lg btn-success full_button m1_bottom text-left" onclick="window.location.href='./pages/chicken/'">
                        메뉴조회
                        <div style="float: right;"><img src="./assets/images/arrow.svg" width=30 height=30 /></div>
                    </div>
                    <div class="btn btn-lg btn-info full_button m1_bottom text-left">
                        장바구니
                        <div style="float: right;"><img src="./assets/images/arrow.svg" width=30 height=30 /></div>
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
                        <div class="url_label"><img src="./assets/images/lck.png" width=180 height=100 /></div>
                        <div class="url_label"><img src="./assets/images/kbo.png" width=180 height=100 /></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="btn btn-lg btn-red full_button text-left">
                        <span class="large_font">배달조회</span>
                        <div style="float: right;"><img src="./assets/images/box.svg" width=100 height=120 /></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="btn btn-lg btn-yellow full_button text-left">
                        <span class="large_font">
                            커뮤니티
                            <div style="float: right; padding-top: 10px;">
                                <img src="./assets/images/Q&A.svg" width=90 height=65 />
                            </div>
                            <br>& 자유게시판
                        </span>
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
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

    </body>
</html>
