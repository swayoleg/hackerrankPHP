<?php

/*
 * Complete the 'flippingBits' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER n as parameter.
 */

function flippingBits($n) {
    // Write your code here
    $converted = decbin($n);

    $lengthCurrent = strlen($converted);
    $prefix = str_repeat(0, 32 - $lengthCurrent);
    $inNewFormat = $prefix . $converted;
    $arr = str_split($inNewFormat);

    foreach ($arr as $k=>$item) {
        if ($item == 1) {
            $arr[$k] = 0;
        } else {
            $arr[$k] = 1;
        }
    }
    $resultString = implode('', $arr);
    $resultInt = bindec($resultString);
    return $resultInt;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $result = flippingBits($n);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
