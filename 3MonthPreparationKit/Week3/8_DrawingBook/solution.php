<?php

/*
 * Complete the 'pageCount' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER p
 */

function pageCount($n, $p) {
    // Write your code here
    $isOdd = true;
    if ($n % 2 == 0) {
        $isOdd = false;
    }
    if ($p == 1 || $p == $n || ( $isOdd && $p == $n -1)) {
        return 0;
    }  elseif(!$isOdd && $p == $n-1) {
        return 1;
    }
    $diff = $n - $p;
    $fromTheBack = intdiv($diff, 2);
    $fromTheStart = intdiv($p, 2);
    return min($fromTheBack, $fromTheStart);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$p = intval(trim(fgets(STDIN)));

$result = pageCount($n, $p);

fwrite($fptr, $result . "\n");

fclose($fptr);
