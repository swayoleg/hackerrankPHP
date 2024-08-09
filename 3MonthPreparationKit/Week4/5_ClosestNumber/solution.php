<?php

/*
 * Complete the 'closestNumbers' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function closestNumbers($arr) {
    // Write your code here
    sort($arr);
    $len = count($arr);
    $minDiff = PHP_INT_MAX;
    $results = [];
    for($i = 1; $i < $len; $i++) {
        $curDiff = abs($arr[$i] - $arr[$i-1]);
        if ($curDiff <= $minDiff) {
            $minDiff = $curDiff;
            $results[$curDiff][] = $arr[$i-1];
            $results[$curDiff][] = $arr[$i];
        }
    }
    ;
    return $results[$minDiff] ?? [];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = closestNumbers($arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
