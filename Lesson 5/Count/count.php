<?php
$numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
$value = 0;
function count_num($numbers, $value)
{
    $count = 0;
    foreach ($numbers as $num) {
        if ($num == $value) {
            $count++;
        }
    }
    echo "Số lần xuất hiện: ", $count;
}

count_num($numbers, $value);

