<?php

/*
 * Complete the 'diagonalDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

function diagonalDifference($arr) {
    // Write your code here
    $left = 0;
    $right = 0;
    $count = count($arr);
    for($i =0; $i < $count; $i++) {
        $left += $arr[$i][$i];
        $right += $arr[$i][$count - 1 - $i];
    }
    return abs($left-$right);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = diagonalDifference($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
