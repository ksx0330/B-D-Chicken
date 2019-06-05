<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chicken/sql/connection/dbconnect.php";

if (isset($_GET['kind']))
    $kind = mysqli_real_escape_string($con, $_GET['kind']);
else
    $kind = 1;

if ($kind == 2)
	$community = "free";
elseif ($kind == 3)
	$community = "question";
else {
	$community = "notice";
	$kind = 1;
}

if (isset($_SESSION['usr_id'])){
	$role_sql = "SELECT `role` FROM `authorities` WHERE `userId` = " . $_SESSION['usr_id'];
	$result = mysqli_query($con, $role_sql);
	while ($row = mysqli_fetch_assoc($result))
		$auth[] = $row['role'];
}

$maxItem = 15;

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = mysqli_real_escape_string($con, $_GET['page']);
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
					if ($community == 'question')
						echo 'Q&A';
					else if ($community == 'free')
						echo '자유 게시판';
					else
						echo '공지 사항';
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
								<?php
									if($kind == 3)
										echo '<td width = "70" align = "center">답변여부</td>';
								?>
			                </tr>
			            </thead>
			            <tbody>
			            <?php
				            mysqli_query($con, "set session character_set_results=utf8;");
				            if($kind == 3)
								$query = "SELECT `ID`, `userId`, `title`, `time`, `hit`, `answer`, (SELECT `name` FROM `user` WHERE `userId` = `$community`.`userId`)
										as `name` FROM `$community` ORDER BY `ID` DESC LIMIT " .
										($page - 1) * $maxItem . ", $maxItem";
							else
								$query = "SELECT `ID`, `userId`, `title`, `time`, `hit`, (SELECT `name` FROM `user` WHERE `userId` = `$community`.`userId`)
										as `name` FROM `$community` ORDER BY `ID` DESC LIMIT " .
										($page - 1) * $maxItem . ", $maxItem";

							$result = mysqli_query($con, $query);

				            while($rows = mysqli_fetch_assoc($result)){
								if($kind == 3){
									if($rows['answer'] == null)
										$answer = '미답변';

									else
										$answer = '답변완료';

									echo '<tr>
										<td width = "50" align = "center">' . $rows['ID'] . '</td>
										<td width = "500" align = "center">
											<a href = "Q&A_view.php?ID=' . $rows['ID'] . '&kind=' . $kind . '">
											' . $rows['title'] . '
										</td>
										<td width = "100" align = "center">' . $rows['name'] . ' </td>
										<td width = "200" align = "center">' . $rows['time'] . ' </td>
										<td width = "50" align = "center">' . $rows['hit'] . ' </td>
										<td width = "50" align = "center">' . $answer . ' </td>
									</tr>';
								}
								else{
									echo '<tr>
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
				            }
			            ?>
			            </tbody>
			        </table>
		            <div class="text-center text-primary">
                        <?php
				            $count_sql = "SELECT count(`ID`) as 'cnt' FROM `$community`";
				            $result = mysqli_query($con, $count_sql);
				            while ($row = mysqli_fetch_assoc($result)) {
					            $cnt = $row['cnt'];
				            }

				            $minPage = 1;
				            $maxPage = (int)($cnt / $maxItem) + 1;

				            echo "<a class='text-primary' href='./notice.php?page=$minPage&kind=$kind'><</a>";
				            for ($i = 1; $i < $cnt / $maxItem; $i++)
					            echo "<a class='text-primary' href='./notice.php?page=$i&kind=$kind'>$i</a>, ";
				            echo "<a class='text-primary' href='./notice.php?page=$i&kind=$kind'>$i</a>";
				            echo "<a class='text-primary' href='./notice.php?page=$maxPage&kind=$kind'>></a>";
                        ?>
                    </div>


                    <?php
					if (isset($_SESSION['usr_id'])){
						if ($kind != 1 && !in_array("IS_ADMIN", $auth))
							echo "<a href='./write.php?kind=<?php echo $kind; ?>'>글쓰기</a>";
					}
                    ?>

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
