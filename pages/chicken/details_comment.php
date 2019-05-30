<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";

if (!isset($_SESSION['usr_id'])) exit(0);

mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$id = mysqli_real_escape_string($con, $_POST['id']);
$title = mysqli_real_escape_string($con, $_POST['title']);
$context = mysqli_real_escape_string($con, $_POST['context']);

// Need to implement session access(for insert userId value into items_comment)
$sql = "INSERT INTO `items_comment`(`itemsId`, `userId`, `name`, `title`, `context`) VALUES (".$id.", " .  $_SESSION['usr_id'] . ", '" . $_SESSION['usr_name'] . "', '" . $title . "', '" . $context . "')";
mysqli_query($con, $sql);

$url = './details.php?id=' . $id;
?>
<script>
  alert("<?php echo"댓글이 등록되었습니다!"?>");
  location.replace("<?php echo $url ?>");
</script>
