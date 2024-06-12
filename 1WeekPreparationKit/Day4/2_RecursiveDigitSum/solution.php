<?php

/*
 * Complete the 'superDigit' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. STRING n
 *  2. INTEGER k
 */

function superDigit($n, $k) {
    // Write your code here
    if (strlen($n) == 1) {
        return $n;
    }
    $superValue = array_sum(str_split(strval($n)));
    $superValueRepeaded = $superValue * $k;

    if ($superValueRepeaded < 10) {
        return $superValueRepeaded;
    } else {
        return superDigit($superValueRepeaded, 1);
    }


}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = $first_multiple_input[0];

$k = intval($first_multiple_input[1]);

$result = superDigit($n, $k);

fwrite($fptr, $result . "\n");

fclose($fptr);
