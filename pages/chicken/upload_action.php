<?php

// FILE UPLOAD
$target_dir = "../../assets/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$isUploadSuccess = True;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
  // File already exists;
  $isUploadSuccess = False;
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $isUploadSuccess = True;
    } else {
      $isUploadSuccess = False;
    }
}

// DB INFO UPLOAD
include "/var/www/html/WebProgramming/sql/connection/dbconnect.php";
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");

$target_file = mysqli_real_escape_string($con, $target_file);
$title = mysqli_real_escape_string($con, $_POST['title']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$context = mysqli_real_escape_string($con, $_POST['context']);
$rec = mysqli_real_escape_string($con, $_POST['rec']);

$target_file = substr($target_file, 4);
$sql1 = "INSERT INTO items(title, price, context, rec) VALUES('$title', '$price', '$context', $rec)";
$sql2 = "INSERT INTO item_images(itemId, url) SELECT ID, '$target_file' FROM items WHERE title = '$title'";

mysqli_query($con, $sql1);
mysqli_query($con, $sql2);

$url = './index.php';
?>
<script>
  alert("<?php
   if($isUploadSuccess) { echo "Info Uploaded"; } else { echo "Info not uploaded"; }
  ?>");
  location.replace("<?php echo $url ?>");
</script>
