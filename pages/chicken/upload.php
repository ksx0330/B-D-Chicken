<?php
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chickensql/connection";
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$rec = mysqli_real_escape_string($con, $_GET['rec']);

?>
<!DOCTYPE html>
<html>
    <head>
    <?php include "../header.php"; ?>
    <style>
    .file-field.medium .file-path-wrapper { height: 3rem; }
    .file-field.medium .file-path-wrapper .file-path { height: 2.8rem; }
    .file-field.big-2 .file-path-wrapper { height: 3.7rem; }
    .file-field.big-2 .file-path-wrapper .file-path { height: 3.5rem; }
    </style>
    </head>
    <body>
    <?php include "../navbar.php"; ?>

    <!-- Page Content -->
    <div class="container-fluid" style="padding-left: 125px; padding-right: 125px; background-image: url('../../assets/images/background-2.png');">
      <div class="row">
           <div class="col-lg-9 text-center">
   		        <div class="col-lg-12 mt-4">
                <div class="btn btn-yellow full_button">
                  <span class="huge_font" style="float: left; padding-left: 1.5rem;">치킨 상세정보 업로드</span>
                </div>
              </div>
              <div class="card">
                <div class="card-title text-left m-3">
                  <span class="huge_font">업로드할 치킨의 정보와 이미지를 반드시 함께 올려주세요</span>
                </div>
                <div class="card-body p-3">
                  <form action="upload_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="rec" value="<?php echo $rec; ?>">
                    <input class="form-control col-4 ml-3" type="text" name="title" placeholder="치킨 이름" value="<?php if(isset($title)){echo $title;} ?>">
                    <input class="form-control col-4 ml-3" type="text" name="price" placeholder="치킨 가격(원, 3자리마다 구분)" value="<?php if(isset($price)){echo $price;} ?>">
                    <textarea class="form-control col-10 ml-3" name="context" cols=85 rows=6 placeholder="치킨 설명" value="<?php if(isset($context)){echo $context;} ?>" ></textarea>
                    <div class="btn float-left">
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <input class="form-control btn btn-primary m-2" type="submit" value="치킨 정보 업로드" name="submit">
                  </form>
                </div>
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
