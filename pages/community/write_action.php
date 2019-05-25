<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/sql/co_/dbconnect.php";

/*
$URL = '././index.php';
if (!isset($_SESSION['usr_id'])){
	<script>
		alert("로그인이 필요합니다.");
	</script>
	location.replace("<?php echo $URL ?>");
}
*/

if (trim(preg_replace('/\r\n|\r|\n/','', $_POST['title'])) == '' || trim(preg_replace('/\r\n|\r|\n/','', $_POST['context'])) == '') {
	echo '<script>
	alert("입력값을 다 채워주시길 바랍니다.");
	history.back();
	</script>';
	exit();
}

$title = mysqli_real_escape_string($con, $_POST['title']);
$context = mysqli_real_escape_string($con, $_POST['context']);
$time = date('Y-m-d H:i:s');

$URL = './notice.php';

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");


$query = "insert into board (ID, userId, context, title, time, hit) 
		values(null, '" . $_SESSION['usr_id'] . "', '$context', '$title', '$time', 0)";
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
*/
?>
