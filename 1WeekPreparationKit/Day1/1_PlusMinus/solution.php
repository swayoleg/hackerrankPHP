<?php

/*
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus($arr) {
    // Write your code here
    $length = count($arr);
    $counters = ['positive' => 0, 'negative' => 0, 'zero' => 0];
    foreach($arr as $element) {
        if ($element < 0) {
            ++$counters['negative'];
        } elseif( $element > 0) {
            ++$counters['positive'];
        } else {
            ++$counters['zero'];
        }
    }
    foreach ($counters as $v) {
        $result = $v / $length;
        echo number_format($result, 6, '.','') . PHP_EOL;
    }
}

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

plusMinus($arr);
