<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])){
	echo'alert("로그인이 필요합니다.");';
	header("location: ../user/login.php");
}

$URL = './notice.php';

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
$URL = './notice.php?kind=' . $kind;

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

$query = "DELETE FROM `$community` WHERE `$community`.`ID` = '$ID'";
$result = $con->query($query);

if($result){
?>		
	<script>
		alert("<?php echo"글이 삭제되었습니다!"?>");
		location.replace("<?php echo $URL ?>");
	</script>
<?php
}

else{
	echo "FAIL! " . mysqli_error($con);
}
mysqli_close($con);
?>
