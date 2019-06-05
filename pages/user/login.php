<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chicken/sql/connection/dbconnect.php";

if(!isset($_POST['email'])) exit;
if(!isset($_POST['password'])) exit;

$URL = '../../index.php';
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = hash('sha256', (mysqli_real_escape_string($con, $_POST['password']) . "LTaeng01100"));

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$result = mysqli_query($con, "SELECT * FROM user WHERE email = '" . $email. "' and password = '" . $password . "'");
if ($row = mysqli_fetch_array($result)) {
	$_SESSION['usr_id'] = $row['userId'];
	$_SESSION['usr_name'] = $row['name'];

    ?>
	<script>
		alert("<?php echo"로그인이 성공했습니다!"?>");
		location.replace("<?php echo $URL ?>");
	</script>
    <?php

} else
    ?>
	<script>
		alert("<?php echo"로그인에 실패했습니다!"?>");
		location.replace("<?php echo $URL ?>");
	</script>
    <?php

?>
