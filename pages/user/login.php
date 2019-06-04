<?php
session_start();
//include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";
include "../../sql/connection/dbconnect.php";

if(!isset($_POST['email'])) exit;
if(!isset($_POST['password'])) exit;

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = hash('sha256', (mysqli_real_escape_string($con, $_POST['password']) . "LTaeng01100"));

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$result = mysqli_query($con, "SELECT * FROM user WHERE email = '" . $email. "' and password = '" . $password . "'");
if ($row = mysqli_fetch_array($result)) {
	$_SESSION['usr_id'] = $row['userId'];
	$_SESSION['usr_name'] = $row['name'];

    $URL = '../../index.php';
    ?>
	<script>
		alert("<?php echo"로그인이 성공했습니다!"?>");
		location.replace("<?php echo $URL ?>");
	</script>
    <?php

} else
    echo "FAIL! " . mysqli_error($con);

?>
