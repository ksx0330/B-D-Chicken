<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) {
    echo '<script>
            alert("로그인이 필요합니다.");
            location.href = "../../index.php";
          </script>';
}

$id = mysqli_real_escape_string($con, $_POST['id']);
$num = mysqli_real_escape_string($con, $_POST['num']);
$cuponAll = json_decode($_POST['cupon']);
foreach ($cuponAll as $c)
    $cupon[] = mysqli_real_escape_string($con, $c);
$point = mysqli_real_escape_string($con, $_POST['point']);

$peopleName = mysqli_real_escape_string($con, $_POST['peopleName']);
$addressName = mysqli_real_escape_string($con, $_POST['addressName']);
$phone1 = mysqli_real_escape_string($con, $_POST['phone1']);
$phone2 = mysqli_real_escape_string($con, $_POST['phone2']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$memo = mysqli_real_escape_string($con, $_POST['memo']);


mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$item_sql = "SELECT `title`, `price` FROM `items` WHERE `ID` = '$id'";
$result = mysqli_query($con, $item_sql);
if ($result == False) exit();
while ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $price = str_replace(',', '', $row['price']);
}
$price *= $num;

$cuponVerified = [];

$date = date("Y-m-d", time());
$cupon_sql = "SELECT `ID`, `price` FROM `cupon_list` WHERE `ID` in (SELECT `cuponId` FROM `cupon` WHERE `userId` = " . $_SESSION['usr_id'] . ") AND `minPrice` <= " . $price . " AND `startTime` <= '$date' AND `endTime` >= '$date'";

$result = mysqli_query($con, $cupon_sql);
while ($row = mysqli_fetch_assoc($result)) {
    if (in_array($row['ID'], $cupon)) {
        $cuponVerified[] = $row['ID'];
        $price -= $row['price'];
    }
}

if ($point == '')
    $point = 0;

$point_sql = "SELECT `point` FROM `user` WHERE `userId`=" . $_SESSION['usr_id'];
$result = mysqli_query($con, $point_sql);
while ($row = mysqli_fetch_assoc($result)) {
    if ($point <= $point) {
        $price -= $point;
        $lastPoint = $row['point'] - $point;
    }
}

$usedCupon = json_encode($cuponVerified);

$insert_sql = "INSERT INTO `baedal_list`(`userId`, `itemId`, `itemName`, `itemNum`, `peopleName`, `addressName`, `phone1`, `phone2`, `address`, `memo`, `usedCupon`, `usedPoint`, `price`) VALUES(" . $_SESSION['usr_id'] . ", $id, '$title', $num, '$peopleName', '$addressName', '$phone1', '$phone2', '$address', '$memo', '$usedCupon', $point, '$price')";
$result = mysqli_query($con, $insert_sql);

$lastPoint += $price / 100;
$point_reduce_sql = "UPDATE `user` SET `point` = $lastPoint WHERE `user`.`userId` = " . $_SESSION['usr_id'];
$result = mysqli_query($con, $point_reduce_sql);

foreach ($cuponVerified as $c) {
    $cupon_reduce_sql = "DELETE FROM `cupon` WHERE `userId` = " . $_SESSION['usr_id'] . " AND `cupon`.`cuponId` = $c ";
    $result = mysqli_query($con, $cupon_reduce_sql);
}

$URL = './baedal.php';
if($result){
?>		
	<script>
		alert("<?php echo"주문이 완료되었습니다!"?>");
		location.replace("<?php echo $URL ?>");
	</script>
<?php
}

else{
	echo "FAIL! " . mysqli_error($con);
}

?>
