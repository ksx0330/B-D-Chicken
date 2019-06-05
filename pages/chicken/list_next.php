<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chicken/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) {
    echo '<script>
            alert("로그인이 필요합니다.");
            location.href = "../../index.php";
          </script>';
}

$role_sql = "SELECT `role` FROM `authorities` WHERE `userId` = " . $_SESSION['usr_id'];
$result = mysqli_query($con, $role_sql);
while ($row = mysqli_fetch_assoc($result))
    $auth[] = $row['role'];

if (!in_array("IS_ADMIN", $auth))
    echo '<script>
            alert("관리자만 접근할 수 있습니다.");
            location.href = "../../index.php";
          </script>';

$id = mysqli_real_escape_string($con, $_GET['id']);

$sequence = [1, 0];

$item_status_sql = "SELECT `rec` FROM `items` WHERE `ID` = " . $id;
$result = mysqli_query($con, $item_status_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $rec = $row['rec'];
}

$item_set_sql = "UPDATE `items` SET `rec` = " . $sequence[$rec] . " WHERE `ID`=" . $id;
$result = mysqli_query($con, $item_set_sql);

$url = './index.php';
if($result){
?>		
	<script>
		alert("<?php echo"변경 완료"?>");
		location.replace("<?php echo $url ?>");
	</script>
<?php
}

else{
	echo "FAIL! " . mysqli_error($con);
}


?>
