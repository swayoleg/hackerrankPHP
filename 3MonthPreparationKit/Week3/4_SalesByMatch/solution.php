<?php

/*
 * Complete the 'sockMerchant' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER_ARRAY ar
 */

function sockMerchant($n, $ar) {
    // Write your code here
    $hashMap = [];
    $pairsCounter = 0;
    foreach($ar as $itemColor) {
        if (!isset($hashMap[$itemColor])) {
            $hashMap[$itemColor] = 1;
        } else {
            ++$hashMap[$itemColor];
        }
        if ($hashMap[$itemColor] == 2) {
            unset($hashMap[$itemColor]);
            ++$pairsCounter;
        }
    }
    return $pairsCounter;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$ar_temp = rtrim(fgets(STDIN));

$ar = array_map('intval', preg_split('/ /', $ar_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = sockMerchant($n, $ar);

fwrite($fptr, $result . "\n");

fclose($fptr);
