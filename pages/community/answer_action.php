<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])){
	echo'alert("로그인이 필요합니다.");';
	header("location: ../user/login.php");
}

if (!isset($_POST['answer'])) {
	echo '<script>
	alert("잘못된 접근입니다.");
	history.back();
	</script>';
	exit();
}

if (trim(preg_replace('/\r\n|\r|\n/','', $_POST['answer'])) == '') {
	echo '<script>
	alert("입력값을 다 채워주시길 바랍니다.");
	history.back();
	</script>';
	exit();
}

$answer = mysqli_real_escape_string($con, $_POST['answer']);
$kind = mysqli_real_escape_string($con, $_POST['kind']);
$ID = mysqli_real_escape_string($con, $_POST['ID']);
$time = date('Y-m-d H:i:s');

$URL = './notice.php?kind=' . $kind;

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$query = "UPDATE `question` SET `answer` = '$answer' WHERE `question`.`ID` = $ID";
$result = $con->query($query);

if($result){
?>		
	<script>
		alert("<?php echo"글이 등록되었습니다!"?>");
		location.replace("<?php echo $URL ?>");
	</script>
<?php
}

else{
	echo "FAIL! " . mysqli_error($con);
}
mysqli_close($con);
?>