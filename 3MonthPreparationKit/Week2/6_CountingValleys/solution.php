<?php

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */

function countingValleys($steps, $path) {
    // Write your code here
    $arr = str_split($path);
    $valleyCounts = 0;
    $counter = 0; // sea level
    foreach($arr as $v) {
        $previousCounter = $counter;
        if ($v == 'U') {
            ++$counter;
        }
        if ($v == 'D') {
            --$counter;
        }
        if ($counter < 0 && $previousCounter >= 0) {
            ++$valleyCounts;
        }
    }
    return $valleyCounts;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$steps = intval(trim(fgets(STDIN)));

$path = rtrim(fgets(STDIN), "\r\n");

$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");

fclose($fptr);
