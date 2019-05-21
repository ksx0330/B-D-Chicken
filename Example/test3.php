<?php
$name = "이태연";
$id = "990125-*******";
$phone = "010-3675-5868";
$address = "주우우웅소ㅗ소소솟";
?>

<html>
    <head>
        <meta charset="utf-8">
        <style>
            table {
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
            th {
                background-color: #2e2e2e33;
            }

            table, td, th {
                border: 2px solid;
            }

            caption {
                font-size: 1.5rem;
                margin-bottom: 12px;
            }

        </style>

    </head>
    <body>
        <table>
            <caption><b>학과별 학생 분포<b></caption>
            <colgroup>
                <col width="10%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
            </colgroup>

            <tbody>
                <tr>
                    <th>이름</th>
                    <th>주민번호</th>
                    <th>휴대폰 번호</th>
                    <th>주소</th>
                <tr>
                <?php
                for ($i = 0; $i < 20; $i++)
                    echo "<tr>
                        <td>$name</td>
                        <td>$id</td>
                        <td>$phone</td>
                        <td>$address</td>
                    </tr>";

                ?>

        </table>
    </body>
</html>
