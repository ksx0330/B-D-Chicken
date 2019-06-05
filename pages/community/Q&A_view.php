<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

$kind = mysqli_real_escape_string($con, $_GET['kind']);

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
					<?php
						echo 'Q&A';
					?>
                </span>
            </div>
          </div>
		
		
		  <div class="card">
			  <div class="card-body">
			<?php
				mysqli_query($con, "set session character_set_connection=utf8;");
				mysqli_query($con, "set session character_set_results=utf8;");
				mysqli_query($con, "set session character_set_client=utf8;");
			
				$ID = mysqli_real_escape_string($con, $_GET['ID']);
				$hit = "update question set hit=hit+1 where ID=$ID";
                $con->query($hit);
				
				$query = "select title, context, answer, time, hit, userId, (SELECT `name` FROM `user` WHERE `userId` = `question`.`userId`) as `name` from question where ID = '$ID'";
				$result = $con->query($query);
				$rows = mysqli_fetch_assoc($result);

				$admin = 'IS_ADMIN';
			?>
	 
			<table class="table table-bordered" align=center>
			<tr>
					<td colspan="4" class="view_title"><?php echo $rows['title']?></td>
			</tr>
			<tr>
					<td class="view_id">작성자</td>
					<td class="view_id2"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $rows['name']?></td>
					<td class="view_hit">조회수</td>
					<td class="view_hit2"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" . $rows['hit']?></td>
			</tr>
	
			<tr>
					<td colspan="4" class="view_content" valign="top">
					<?php echo $rows['context']?></td>
			</tr>
			</table>
			
			<?php
				if($rows['answer'] != null){?>
					<table class="table table-bordered" align=center>
					<tr>
							<td colspan="4" class="view_title"><?php echo 'Answer - ' . $rows['title']?></td>
					</tr>	
					<tr>
							<td colspan="4" class="" valign="top">
							<?php echo $rows['answer']?></td>
					</tr>
					</table>		
			<?php }
			
				else if(!strcmp($row2[0], $admin)){
					if (isset($_SESSION['usr_id'])){
					$query2 = "SELECT `role` FROM authorities WHERE `userId` = $_SESSION[usr_id]";		
					$result2 = $con->query($query2);
					$row2 = mysqli_fetch_array($result2);
					?>
					<div class="card text-center">
						<div class="card-body">
							<form method="post" action="answer_action.php">
								<table class="table">
									<tr>
										<td>답변</td>
										<td><textarea class="form-control" name = "answer" cols=85 rows=15></textarea></td>
									</tr>
								</table>
								<input type="hidden" name="kind" value="<?php echo $kind; ?>">
								<input type="hidden" name="ID" value="<?php echo $ID;?>">
								<input class="btn btn-yellow btn-radius mx-1 my-2" type = "submit" value="작성">
							</form>

						</div>
					</div>
		
			 <?php }
				}?>
	 
			<!-- MODIFY & DELETE -->
			<div class="text-center">
				<center>
					<button class="btn btn-yellow btn-radius mx-1 my-2" onclick="location.href='./notice.php?kind=<?php echo $kind; ?>'">목록</button>
					<?php 
						if($rows2['answer'] == null){
							if($rows2[0] == $_SESSION['usr_id']){
						?>
						<button class="btn btn-yellow btn-radius mx-1 my-2" onclick="location.href='./modify.php?ID=<?=$ID?>&kind=<?php echo $kind; ?>'">수정</button>
						<button class="btn btn-yellow btn-radius mx-1 my-2" onclick="del()">삭제</button>
					  <?php } ?>

					<?php }
						if(!strcmp($row2[0], $admin)){ ?>
							<button class="btn btn-yellow btn-radius mx-1 my-2" onclick="location.href='./Q&A_del.php?ID=<?=$ID?>&kind=<?php echo $kind; ?>'">삭제</button>
							<?php
						}
					?>
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
<script>
	function del(){
		var quest = confirm('정말로 게시글을 삭제하시겠습니까?');
		if(quest){
			location.href='./delete.php?ID=<?=$ID?>&kind=<?php echo $kind; ?>';
		}
		else{
			location.href='./notice.php';
		}
	}
</script>