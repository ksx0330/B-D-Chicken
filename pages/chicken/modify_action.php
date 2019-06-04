<?php

$isUploadSuccess = True;
$isFileModified = False;
// FILE UPLOAD
if($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
  $isFileModified = True;
  $target_dir = "../../assets/images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (copy($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  } else {
    $isUploadSuccess = False;
  }
}

// ================================================== //
// DB INFO UPLOAD
$con = mysqli_connect("220.68.91.224", "chicken", "passwd", "chicken") or die("ERROR" . mysqli_error($con));
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

// GET ORIGINAL INFO(for non-modified values)
$sql = "SELECT `ID`, `title`, `price`, `context` FROM `items` WHERE `title` = '".$_POST['target']."'";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_assoc($result);
if(empty($rows['title'])) {
  echo '
  <script>
    alert("존재하지 않는 치킨입니다");
    location.replace("./modify.php");
  </script>
  ';
}
echo $rows['context'];
// Check if title is set
if(!empty($_POST['title'])) {
  $title = mysqli_real_escape_string($con, $_POST['title']);
} else {
  $title = $rows['title'];
}
// Check if price is set
if(!empty($_POST['price'])) {
  $price = mysqli_real_escape_string($con, $_POST['price']);
} else {
  $price = $rows['price'];
}
// Check if context is set
if (strlen(trim($_POST['context']))) {
  $context = mysqli_real_escape_string($con, $_POST['context']);
} else {
  $context = $rows['context'];
}

// ================================================== //
// UPDATE CHICKEN INFO
$sql1 = "UPDATE `items` SET `title` = '$title', `price` = '$price', `context` = '$context' WHERE `ID` = '".$rows['ID']."'";
echo $sql1;
mysqli_query($con, $sql1);

// UPDATE IMAGE
if($isFileModified) {
  $target_file = mysqli_real_escape_string($con, $target_file);
  $target_file = substr($target_file, 4);
  $sql2 = "UPDATE `item_images` SET `url` = '$target_file' WHERE `itemId` = '".$rows['ID']."'";
  mysqli_query($con, $sql2);
}

$url = './index.php';
?>
<script>
  alert("<?php
   if($isUploadSuccess) { echo "Info Modified"; } else { echo "Info not Modified"; }
  ?>");
  location.replace("<?php echo $url ?>");
</script>
