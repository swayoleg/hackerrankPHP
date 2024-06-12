<?php

/*
 * Complete the 'timeConversion' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function timeConversion($s) {
    // Write your code here
    $type = substr($s, -2);
    $time = substr($s, 0, -2);
    $ex = explode(':', $time);

    if ($type == 'AM') {
        if ($ex[0] == '12') {
            $ex[0] = '00';
        }
    }
    if ($type == 'PM') {
        $ex[0] += 12;
        if ($ex[0] == 24) {
            $ex[0] = 12;
        }
    }
    return implode(':', $ex);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = timeConversion($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
