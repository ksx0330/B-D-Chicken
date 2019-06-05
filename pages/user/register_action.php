<?php
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chickensql/connection";
include_once '../../lib/encrypt.php';

if(!isset($_POST['name']) || $_POST['name'] == '') { echo "이름을 입력해 주시길 바랍니다."; exit; }
if(!isset($_POST['email']) || $_POST['email'] == '' ) { echo "이메일을 입력해 주시길 바랍니다."; exit; }
if(!isset($_POST['passwd']) || $_POST['passwd'] == '') { echo "비밀번호를 입력해 주시길 바랍니다."; exit; }
if(!isset($_POST['passwd_confirm']) || $_POST['passwd_confirm'] == '') { echo "비밀번호를 다시 입력해 주시길 바랍니다."; exit; }
if(!isset($_POST['address']) || $_POST['address'] == '') { echo "주소를 입력해 주시길 바랍니다."; exit; }

if(!isset($_POST['phone1']) || $_POST['phone1'] == '') { echo "핸드폰 번호를 입력해 주시길 바랍니다."; exit; }
if(!isset($_POST['phone2']) || $_POST['phone2'] == '') { echo "핸드폰 번호를 입력해 주시길 바랍니다."; exit; }
if(!isset($_POST['phone3']) || $_POST['phone3'] == '') { echo "핸드폰 번호를 입력해 주시길 바랍니다."; exit; }


$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$address = mysqli_real_escape_string($con, $_POST['address']);

$phone1 = mysqli_real_escape_string($con, $_POST['phone1']);
$phone2 = mysqli_real_escape_string($con, $_POST['phone2']);
$phone3 = mysqli_real_escape_string($con, $_POST['phone3']);

$phone = $phone1 . $phone2 . $phone3;

$oriPassword = mysqli_real_escape_string($con, $_POST['passwd']);
$password = hash('sha256', (mysqli_real_escape_string($con, $_POST['passwd']) . "LTaeng01100"));
$password2 = hash('sha256', (mysqli_real_escape_string($con, $_POST['passwd_confirm']) . "LTaeng01100"));

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");


$result = mysqli_query($con, "SELECT * FROM user WHERE email = '" . $email. "'");

$error = false;

if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	$error = true;
	echo "이메일 포맷에 맞게 입력해 주세요.\n";
}

if ($row = mysqli_fetch_array($result)) {
	$error = true;
	echo "이미 가입된 이메일입니다.\n";
}

if(strlen($oriPassword) < 6) {
	$error = true;
	echo "6자 이상의 비밀번호를 사용해주세요.\n";
}

if($password != $password2) {
	$error = true;
	echo "재입력한 비밀번호가 일치하지 않습니다.\n";
}

if (!$error) {
    $insert_user_sql = "INSERT INTO `user` (`name`, `email`, `password`, `tel`, `address`, `point`) VALUES ('" . $name . "', '" . $email . "', '" . $password . "', '" . $phone . "', '" . $address . "', 1000)";
    $result_user = mysqli_query($con, $insert_user_sql);

    $id = mysqli_insert_id($con);
    $insert_role_sql = "INSERT INTO `authorities`(`userId`, `role`) VALUES ($id, 'IS_USER')";
    $result_role = mysqli_query($con, $insert_role_sql);

    $URL = '../../index.php';
    if($result_user and $result_role){
    ?>
	    <script>
		    alert("<?php echo"회원가입이 완료되었습니다!"?>");
		    location.replace("<?php echo $URL ?>");
	    </script>
    <?php
    } else{
	    echo "FAIL! " . mysqli_error($con);
    }

}

?>
