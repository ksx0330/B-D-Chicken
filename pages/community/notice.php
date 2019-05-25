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
		
        <div class="col-lg-9 text-center">
		  <div class="col-lg-12 mt-4">
            <div class="btn btn-yellow full_button">
                <span class="huge_font" style="float: left; padding-left: 1.5rem;">
                    공지 사항
                </span>


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

				            $query = "SELECT `ID`, `userId`, `title`, `context`, `time`, `hit`, (SELECT `name` FROM `user` WHERE `userId` = `board`.`userId`) as `name` FROM `board` ORDER BY `ID` DESC";
				            $result = mysqli_query($con, $query);

				            while($rows = mysqli_fetch_assoc($result)){

                                echo '
                                <tr>
					                <td width = "50" align = "center">' . $rows['ID'] . '</td>
					                <td width = "500" align = "center">
						                <a href = "view.php?ID=' . $rows['ID'] . '">
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
			        
			        <a href='./write.php'>글쓰기</a>

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
