<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) {
  echo '<script>
  alert("로그인이 필요합니다.");
  location.href = "../../index.php";
  </script>';
}

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$user_sql = "SELECT `email`, `tel`, `address`, `point` FROM `user` WHERE `userId`=" . $_SESSION['usr_id'];
$result = mysqli_query($con, $user_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
    $p = $row['tel'];
    $address = $row['address'];
    $point = $row['point'];
}


$name = mysqli_real_escape_string($con, $_POST["user_name"]);
$addr = mysqli_real_escape_string($con, $_POST["user_addr"]);
$tel = mysqli_real_escape_string($con, str_replace('-', '', $_POST["user_tel"]));

$sql = "UPDATE `user` SET `name`='$name', `address`='$addr', `tel`='$tel' WHERE `userId`=" . $_SESSION['usr_id'];
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$result = mysqli_query($con, $sql);

$URL = '../../index.php';
if($result){
?>		
	<script>
		alert("<?php echo"정보가 성공적으로 수정되었습니다."?>");
		location.replace("<?php echo $URL ?>");
	</script>
<?php
}

else{
	echo "FAIL! " . mysqli_error($con);
}
?>

