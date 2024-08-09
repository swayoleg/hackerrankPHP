<?php

/*
 * Complete the 'minimumAbsoluteDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function minimumAbsoluteDifference($arr) {
    // Write your code here

    sort($arr);
    $len = count($arr);
    $minDiff = PHP_INT_MAX;
    for($i = 1; $i < $len; $i++) {
        $curDiff = abs($arr[$i] - $arr[$i-1]);
        if ($curDiff <= $minDiff) {
            $minDiff = $curDiff;
        }
    }
    ;
    return $minDiff;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = minimumAbsoluteDifference($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
