<?php
session_start();
include "/home/ltaeng/Downloads/con/dbconnect.php";

/*
if (!isset($_SESSION['usr_id'])){
	echo'alert("로그인이 필요합니다.");';
	header("location: ../user/login.php");
}
*/
$URL = './notice.php';

$ID = mysqli_real_escape_string($con, $_GET['ID']);
$kind = mysqli_real_escape_string($con, $_GET['kind']);
$time = date('Y-m-d H:i:s');

if ($kind == 2)
	$community = "free";
else
	$community = "notice";
$URL = './notice.php?kind=' . $kind;


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
*/
?>
