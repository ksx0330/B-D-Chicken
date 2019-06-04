<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])){
	echo'alert("로그인이 필요합니다.");';
	header("location: ../user/login.php");
}

$URL = './notice.php';

$ID = mysqli_real_escape_string($con, $_GET['ID']);
$kind = mysqli_real_escape_string($con, $_GET['kind']);


$URL = './notice.php?kind=' . $kind;

$query = "UPDATE `question` SET `answer` = '' WHERE `question`.`ID` = $ID";
$result = $con->query($query);

if($result){
?>		
	<script>
		alert("<?php echo"답변이 삭제되었습니다!"?>");
		location.replace("<?php echo $URL ?>");
	</script>
<?php
}

else{
	echo "FAIL! " . mysqli_error($con);
}
mysqli_close($con);
?>
