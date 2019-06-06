<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

$URL = '././index.php';
if (!isset($_SESSION['usr_id'])){
?>
	<script>
		alert("로그인이 필요합니다.");
        location.replace("<?php echo $URL ?>");
	</script>
<?php
}

$ID = mysqli_real_escape_string($con, $_GET['ID']);
$kind = mysqli_real_escape_string($con, $_GET['kind']);
if ($kind == 2)
	$community = "free";
elseif ($kind == 3)
	$community = "question";
else {
	$community = "notice";
	$kind = 1;
}

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$query = "SELECT `userId` FROM $community WHERE `userId` = $_SESSION[usr_id]";				          
$result = $con->query($query);
$rows = mysqli_fetch_row($result);

if($rows[0] != $_SESSION['usr_id']){
	echo '<script>
		alert("본인이 작성한 정보만 수정이 가능합니다.");
		history.back();
	</script>';
	exit();
}


$ID = $_GET['ID'];
$query = "select title, context, time, hit, userId from $community where ID = '$ID'";
$result = $con->query($query);
$rows = mysqli_fetch_assoc($result);

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
					<?php
					if ($community == 'question')
						echo 'Q&A';
					else if ($community == 'free')
						echo '자유 게시판';
					else
						echo '공지 사항';	
					?>
                </span>
            </div>
          </div>

            <div class="card text-center">
                <div class="card-body">
				
				
			        <form method="POST" action="modify_action.php">
			            <table class="table">
				            <tr class="text-left">
					            <td>작성자</td>
					            <td><input class="form-control" type="hidden" name="ID" value="<?=$_SESSION['usr_id']?>"><?=$_SESSION['usr_name']?></td>
				            </tr>
				            <tr>
					            <td>제목</td>
					            <td><input class="form-control" type = "text" name = "title" size=60 value="<?php echo $rows['title']?>"></td>
				            </tr>

				            <tr>
					            <td>내용</td>
					            <td><textarea class="form-control" name = "context" cols=85 rows=15 ><?php echo $rows['context']?></textarea></td>
				            </tr>	
			            </table>
						<input type = "hidden" value="<?= $ID?>" name="ID">
						<input type="hidden" name="kind" value="<?php echo $kind; ?>">
			            <input class="btn btn-yellow btn-radius mx-1 my-2" type = "submit" value="작성">
                        <a class="btn btn-yellow btn-radius mx-1 my-2 text-white" href='./notice.php'>목록</a>
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
