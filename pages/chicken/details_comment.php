<?php
session_start();
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

// Need to implement session access(for insert userId value into items_comment)
$sql = "INSERT INTO items_comment(itemsId, userId, name, title, context) VALUES (".$_POST['id'].", 1, '".$_POST['name']."', '".$_POST['title']."', '".$_POST['context']."')";
mysqli_query($con, $sql);

$url = './details.php?id='.$_POST['id'];
?>
<script>
  alert("<?php echo"댓글이 등록되었습니다!"?>");
  location.replace("<?php echo $url ?>");
</script>
