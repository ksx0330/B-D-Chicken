<?php
include "/home/ltaeng/Downloads/con/dbconnect.php";

$kind = mysqli_real_escape_string($con, $_GET['kind']);

if ($kind == 2)
	$community = "free";
else {
	$community = "notice";
	$kind = 1;
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
		
        <div class="col-lg-9 text-center">
		  <div class="col-lg-12 mt-4">
            <div class="btn btn-yellow full_button">
                <span class="huge_font" style="float: left; padding-left: 1.5rem;">
					<?php
					if ($community == 'notice')
						echo '공지 사항';
					else if ($community == 'free')
						echo '자유 게시판';
					?>			
                </span>
				
				<div class="dropdown" style="float: right">
					<button class="btn btn-lg btn-secondary dropdown-toggle text-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						게시판 목록
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="./notice.php?kind=1">공지 사항</a>
						<a class="dropdown-item" href="./notice.php?kind=2">자유 게시판</a>
						<a class="dropdown-item" href="./notice.php?kind=3">Q & A</a>
					</div>
				</div>
            </div>
          </div>

            <div class="card">
                <div class="card-body">
			        <table class="table table-striped">
			            <thead>
			                <tr>
				                <td width = "50" align = "center">번호</td>
				                <td width = "500" align = "center">제목</td>
				                <td width = "100" align = "center">작성자</td>
				                <td width = "200" align = "center">날짜</td>
				                <td width = "70" align = "center">조회수</td>
			                </tr>
			            </thead>
			            <tbody>
			            <?php
				            mysqli_query($con, "set session character_set_results=utf8;");
				            $query = "SELECT `ID`, `userId`, `title`, `context`, `time`, `hit`, (SELECT `name` FROM `user` WHERE `userId` = `$community`.`userId`) as `name` FROM `$community` ORDER BY `ID` DESC";
				            $result = mysqli_query($con, $query);

				            while($rows = mysqli_fetch_assoc($result)){

                                echo '
                                <tr>
					                <td width = "50" align = "center">' . $rows['ID'] . '</td>
					                <td width = "500" align = "center">
						                <a href = "view.php?ID=' . $rows['ID'] . '&kind=' . $kind . '">
						                ' . $rows['title'] . '
					                </td>
					                <td width = "100" align = "center">' . $rows['name'] . ' </td>	
					                <td width = "200" align = "center">' . $rows['time'] . ' </td>	
					                <td width = "50" align = "center">' . $rows['hit'] . ' </td>
					            </tr>';
                                
				            }
			            ?>
			            </tbody>
			        </table>
			        
			        <a href='./write.php?kind=<?php echo $kind; ?>'>글쓰기</a>

                </div>
            </div>
        </div>
        <!-- /.col-lg-9 -->

        <?php include "../sidebar.php"; ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
	<div style = "padding-top : 2rem"></div>
  <?php include "../footer.php"; ?>

    </body>
</html>
