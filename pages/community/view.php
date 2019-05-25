<?php
session_start();
include "/home/ltaeng/Downloads/con/dbconnect.php";

/*
if (!isset($_SESSION['usr_id']))
	header("location: ../user/login.php");
*/

$_SESSION['usr_id'] = 1;
$_SESSION['usr_name'] = "조선주";
?>
<!DOCTYPE html>
<html>
    <head>
    <?php include "../header.php"; ?>
	
    </head>
	<style>
		.view_table {
			border: 1px solid #444444;
			margin-top: 30px;
		}
		.view_title {
			height: 50px;
			text-align: center;
			background-color: #cccccc;
			color: white;
			width: 1000px;
		}
		.view_id {
			text-align: center;
			background-color: #EEEEEE;
			width: 30px;
		}
		.view_id2 {
			background-color: white;
			width: 60px;
			height: 40px;
		}
		.view_hit {
			background-color: #EEEEEE;
			width: 30px;
			text-align: center;
		}
		.view_hit2 {
			background-color: white;
			width: 60px;
			height: 40px;
		}
		.view_content {
			padding-top: 20px;
			border-top: 1px solid #444444;
			height: 500px;
		}

		.view_comment_input {
			width: 700px;
			height: 500px;
			text-align: center;
			margin: auto;
		}
		.view_text3 {
			font-weight: bold;
			float: left;
			margin-left: 20px;
		}
		.view_com_id {
			width: 100px;
		}
		.view_comment {
			width: 500px;
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
		
		
		  <div class="card">
			  <div class="card-body">
			<?php
				mysqli_query($con, "set session character_set_connection=utf8;");
				mysqli_query($con, "set session character_set_results=utf8;");
				mysqli_query($con, "set session character_set_client=utf8;");
			
				$id = $_GET['ID'];
				$query = "select title, context, time, hit, userId from board where ID = '$id'";
				$result = $con->query($query);
				$rows = mysqli_fetch_assoc($result);
				
				$hit = "update board set hit=hit+1 where ID=$id";
                $con->query($hit);
			?>
	 
			<table class="table table-bordered" align=center>
			<tr>
					<td colspan="4" class="view_title"><?php echo $rows['title']?></td>
			</tr>
			<tr>
					<td class="view_id">작성자</td>
					<td class="view_id2"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $_SESSION['usr_id']?></td>
					<td class="view_hit">조회수</td>
					<td class="view_hit2"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $rows['hit']?></td>
			</tr>
	
			<tr>
					<td colspan="4" class="view_content" valign="top">
					<?php echo $rows['context']?></td>
			</tr>
			</table>
	 
	 
			<!-- MODIFY & DELETE -->
			<div class="text-center">
				<center>
					<button class="btn btn-yellow btn-radius mx-1 my-2" onclick="location.href='./notice.php'">목록</button>
					<button class="btn btn-yellow btn-radius mx-1 my-2" onclick="location.href='./modify.php?number=<?=$ID?>&id=<?=$_SESSION['usrid']?>'">수정</button>
					<button class="btn btn-yellow btn-radius mx-1 my-2" onclick="location.href='./delete.php?number=<?=$ID?>&id=<?=$_SESSION['usrid']?>'">삭제</button>
				</center>
			</div>			
			
			
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
