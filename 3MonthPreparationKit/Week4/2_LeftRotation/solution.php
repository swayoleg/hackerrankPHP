<?php

/*
 * Complete the 'rotateLeft' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER d
 *  2. INTEGER_ARRAY arr
 */

function rotateLeft($d, $arr) {
    // Write your code here
    for($i =0; $i<$d; $i++) {
        $value = array_shift($arr);
        array_push($arr, $value);
    }

    return $arr;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$d = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = rotateLeft($d, $arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
