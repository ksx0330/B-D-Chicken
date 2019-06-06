<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) {
  echo '<script>
          alert("로그인이 필요합니다.");
          history.back();
        </script>';
	exit();
}

if (trim(preg_replace('/\r\n|\r|\n/','', $_POST['title'])) == '' || trim(preg_replace('/\r\n|\r|\n/','', $_POST['context'])) == '') {
	echo '<script>
	alert("입력값을 다 채워주시길 바랍니다.");
	history.back();
	</script>';
	exit();
}

$title = mysqli_real_escape_string($con, $_POST['title']);
$context = mysqli_real_escape_string($con, $_POST['context']);
$ID = mysqli_real_escape_string($con, $_POST['ID']);
$kind = mysqli_real_escape_string($con, $_POST['kind']);
$time = date('Y-m-d H:i:s');

if ($kind == 2)
	$community = "free";
elseif ($kind == 3){
	$community = "question";
}
else {
	$community = "notice";
	$kind = 1;
}
$URL = './notice.php?kind=' . $kind;

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$query = "UPDATE $community SET title = '$title', context = '$context', time = '$time' WHERE $community.ID = '$ID'";
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
