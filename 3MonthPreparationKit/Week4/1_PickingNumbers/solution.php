<?php

/*
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function pickingNumbers($a) {
    // Write your code here

    sort($a);
    $maxLength = 0;
    $left = 0;
    $right = 0;
    $n = count($a);

    while ($right < $n) {

        while ($right < $n && (abs($a[$right] - $a[$left]) <= 1)) {
            $right++;
        }
        // Update the maxLength with the size of the current window
        $maxLength = max($maxLength, $right - $left);
        // Move the left pointer to start a new window
        $left++;
    }

    return $maxLength;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = pickingNumbers($a);

fwrite($fptr, $result . "\n");

fclose($fptr);
