<?php

$arr = [1, 102, 3, 41, 21, 23, 12, 32, 11, 42, 10];

for ($i = 0; $i < count($arr); $i++)
    echo $arr[$i] . " ";
echo "<br>";

sort($arr);

for ($i = 0; $i < count($arr); $i++)
    echo $arr[$i] . " ";
echo "<br>";

?>
