<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/sql/co_/dbconnect.php";

$_SESSION['usr_id'] = 1;
$_SESSION['usr_name'] = "조선주";

/*
$URL = '././index.php';
if (!isset($_SESSION['usr_id'])){
	<script>
		alert("로그인이 필요합니다.");
	</script>
	location.replace("<?php echo $URL ?>");
?>
}
*/
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include "../header.php"; ?>
	
    </head>
	<style>
		table.table2{
			border-collapse: separate;
			border-spacing: 1px;
			text-align: left;
			line-height: 1.5;
			border-top: 1px solid #ccc;
			margin : 20px 10px;
        }
        table.table2 tr {
			width: 50px;	
			padding: 10px;
			vertical-align: top;
			border-bottom: 1px solid #ccc;
        }
        table.table2 td {
			width: 120px;
			padding: 10px;
			vertical-align: top;
			border-bottom: 1px solid #ccc;
        }
		table.table2 input {
			width: 680px;
			padding: 10px;
			vertical-align: top;
			border-bottom: 1px solid #ccc;
        }
		.view_button1 {
			font-size: 16px;
			margin: 21px 7px;
			transition-duration: 0.4s;
			cursor: pointer;
			border-radius: 13px;
			padding: 6px 28px;
			text-align: center;
			background-color: #e7e7e7;
			color: black;
			border: 2px solid #e7e7e7;
		}
		.view_button1:hover {
			background-color: white;
		}
	</style>
	
	
    <body>
    <?php include "../navbar.php"; ?>

  <!-- Page Content -->
  <div class="container-fluid" style="padding-left: 125px; padding-right: 125px; background-image: url('../../assets/images/background-2.png');">

   <div class="row">
		
        <div class="col-lg-9">
		  <div class="col-lg-12 mt-4">
            <div class="btn btn-yellow full_button">
                <span class="huge_font" style="float: left; padding-left: 1.5rem;">
                    공지 사항
                </span>
            </div>
          </div>

            <div class="card text-center">
                <div class="card-body">
			        <form method="post" action="write_action.php">
			            <table class="table">
				            <tr class="text-left">
					            <td>작성자</td>
					            <td><input class="form-control" type="hidden" name="id" value="<?=$_SESSION['usr_id']?>"><?=$_SESSION['usr_name']?></td>
				            </tr>
				            <tr>
					            <td>제목</td>
					            <td><input class="form-control" type = "text" name = "title" size=60></td>
				            </tr>

				            <tr>
					            <td>내용</td>
					            <td><textarea class="form-control" name = "context" cols=85 rows=15></textarea></td>
				            </tr>	
			            </table>
			            <input class="btn btn-yellow btn-radius mx-1 my-2" type = "submit" value="작성">
                    </form>

                </div>
			</div>
        </div>
        <!-- /.col-lg-9 -->

        <?php include "../sidebar.php"; ?>
    </div>

  </div>
  <!-- /.container -->
	<div style = "padding-top : 2rem"></div>
  <?php include "../footer.php"; ?>

    </body>
</html>
