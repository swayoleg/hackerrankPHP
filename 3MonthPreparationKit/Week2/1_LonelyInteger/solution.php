<?php

/*
 * Complete the 'lonelyinteger' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function lonelyinteger($a) {
    // Write your code here
    sort($a);
    $len = count($a);
    for ($i = 0; $i < $len; $i+=2) {
        if (isset($a[$i+1]) && (($a[$i] + $a[$i+1]) / 2 != $a[$i])) {
            // one of this elements are lonely integer
            if (isset($a[$i+2]) && $a[$i+1] == $a[$i+2]) {
                return $a[$i];
            } elseif(isset($a[$i+2]) && $a[$i+1] != $a[$i+2]) {
                return $a[$i+1];
            } elseif(isset($a[$i+1])) {
                return $a[$i+1]; // Unused case
            } else {
                return $a[$i];
            }
        } elseif(!isset($a[$i+1])) {
            return $a[$i];
        }
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = lonelyinteger($a);

fwrite($fptr, $result . "\n");

fclose($fptr);
