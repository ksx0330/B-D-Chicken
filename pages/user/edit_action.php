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

$user_sql = "SELECT `email`, `tel`, `address`, `point`, `password` FROM `user` WHERE `userId`=" . $_SESSION['usr_id'];
$result = mysqli_query($con, $user_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $email = $row['email'];
    $p = $row['tel'];
    $address = $row['address'];
    $point = $row['point'];
    $pw = $row['password'];
}

$password = hash('sha256', mysqli_real_escape_string($con, $_POST["user_pw"]) . "LTaeng01100");

if ($password !== $pw) {
  echo "비밀번호가 일치하지 않습니다.";
  exit();
}

$name = mysqli_real_escape_string($con, $_POST["user_name"]);
$addr = mysqli_real_escape_string($con, $_POST["user_addr"]);
$tel = mysqli_real_escape_string($con, str_replace('-', '', $_POST["user_tel"]));
$changed_pw = hash('sha256', mysqli_real_escape_string($con, $_POST["user_pwch"]) . "LTaeng01100");
$changed_pw2 = hash('sha256', mysqli_real_escape_string($con, $_POST["user_pwch2"]) . "LTaeng01100");

if (!$name) {
  echo "이름을 입력해주세요.";
  exit();
}

if ($changed_pw !== $changed_pw2) {
  echo "재입력한 비밀번호가 일치하지 않습니다.";
  exit();
}

$sql = "UPDATE `user` SET `name`='$name', `address`='$addr', `tel`='$tel'";
if ($changed_pw !== hash('sha256', "LTaeng01100")) $sql .= ", `password`='$changed_pw'";
$sql .= " WHERE `userId`=" . $_SESSION['usr_id'];

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$result = mysqli_query($con, $sql);

$URL = '../../index.php';
if($result){
  $_SESSION['usr_name'] = $name;
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
