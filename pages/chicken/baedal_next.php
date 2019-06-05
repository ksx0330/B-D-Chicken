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

$id = mysqli_real_escape_string($con, $_POST['id']);

$color = [['btn-yellow', '주문 완료!'], ['btn-secondary', '배달 중 ~'], ['btn-success', '배달 완료']];
$sequence = [[0, 1], [1, 2]];

$baedal_status_sql = "SELECT `orderedTime`, `baedal`, `completeTime` FROM `baedal_list` WHERE `ID` = " . $id;
$result = mysqli_query($con, $baedal_status_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $orderedTime = $row['orderedTime'];
    $baedal = $row['baedal'];
    $completeTime = $row['completeTime'];
}

if ($baedal == 0 && $completeTime == NULL) {
    $index = 0;
    $baedal_start_sql = "UPDATE `baedal_list` SET `baedal` = '1' WHERE `ID`=" . $id;
    mysqli_query($con, $baedal_start_sql);

} else if ($completeTime == NULL) {
    $index = 1;
    $baedal_complete_sql = "UPDATE `baedal_list` SET `completeTime` = '" . date("Y-m-d h:i:s", time()) . "' WHERE `ID`=" . $id;
    mysqli_query($con, $baedal_complete_sql);

} else
    exit();

$ret[] = $color[$sequence[$index][0]];
$ret[] = $color[$sequence[$index][1]];

echo json_encode($ret);

?>
