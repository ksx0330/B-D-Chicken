<?php

function man_age($birth_time) {
    $time = explode("-", date("Y-m-d"));
    $b_time = explode("-", $birth_time);

    if ((int)$b_time[1] < (int)$time[1])
        $age = (int)$time[0] - (int)$b_time[0];
    else if ((int)$b_time[1] == (int)$time[1]) {
        if ((int)$b_time[2] <= (int)$time[2])
            $age = (int)$time[0] - (int)$b_time[0];
        else
            $age = (int)$time[0] - (int)$b_time[0] - 1;
    } else
        $age = (int)$time[0] - (int)$b_time[1] - 1;

    return $age;
}

$id = "1999-01-25";
$age = man_age("1999-01-25");

echo "오늘 날짜 : " . date("Y년 m월 d일") . "<br>";
echo "생년 월일 : " . explode("-", $id)[0] . "년 " . explode("-", $id)[1] . "월 " . explode("-", $id)[2] . "일 <br>";
echo "만 나이 : $age 세"  
?>

