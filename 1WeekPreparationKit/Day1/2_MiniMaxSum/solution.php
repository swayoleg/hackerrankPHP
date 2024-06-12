<?php

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function miniMaxSum($arr) {
    // Write your code here
    sort($arr);
    $min = 0;
    $max = 0;
    foreach($arr as $index => $value) {
        if ($index < 4) {
            $min +=$value;
        }
        if ($index > 0) {
            $max += $value;
        }
    }
    echo $min . ' ';
    echo $max . PHP_EOL;
}

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

miniMaxSum($arr);
