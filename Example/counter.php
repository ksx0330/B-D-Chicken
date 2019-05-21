<?php
$FileName = "counter.txt";
$count=0;
if(!file_exists($FileName)) {
    touch ($FileName);
    // 파일이 없으면 새로 만들라
    $pFile = fopen ($FileName, 'r+');
    $strData = "<?php \$count=0 ?>";
}
else {
    include "counter.txt";
    $count++;

    $strData = "<?php \$count=".$count." ?>";
    $pFile = fopen ($FileName, 'r+');
}
fwrite($pFile, $strData);
fclose($pFile);

echo "페이지 접속 횟수 = " . $count;
?>
