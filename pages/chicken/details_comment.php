<?php
session_start();
include "C:/Bitnami/wampstack-7.1.27-0/apache2/htdocs/B-D-Chicken/sql/connection/dbconnect.php";

$id = mysqli_real_escape_string($con, $_POST['id']);
$title = mysqli_real_escape_string($con, $_POST['title']);
$context = mysqli_real_escape_string($con, $_POST['context']);

if (!isset($_SESSION['usr_id'])) {
  echo '<script>
          alert("로그인이 필요합니다.");
          location.replace("./details.php?id='.$id.'");
        </script>';
}

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$sql = "INSERT INTO `items_comment`(`itemsId`, `userId`, `name`, `title`, `context`) VALUES (".$id.", " .  $_SESSION['usr_id'] . ", '" . $_SESSION['usr_name'] . "', '" . $title . "', '" . $context . "')";
mysqli_query($con, $sql);

$url = './details.php?id=' . $id;
?>
<script>
  alert("<?php echo"댓글이 등록되었습니다!"?>");
  location.replace("<?php echo $url ?>");
</script>
