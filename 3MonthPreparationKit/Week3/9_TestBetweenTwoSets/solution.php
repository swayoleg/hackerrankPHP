<?php



/*
 * Complete the 'getTotalX' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
 */

function gcd($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function lcm($a, $b) {
    return ($a * $b) / gcd($a, $b);
}

function getTotalX($a, $b) {
    // Find LCM of all elements of a
    $lcm_a = $a[0];
    foreach ($a as $num) {
        $lcm_a = lcm($lcm_a, $num);
    }

    // Find GCD of all elements of b
    $gcd_b = $b[0];
    foreach ($b as $num) {
        $gcd_b = gcd($gcd_b, $num);
    }

    // Count multiples of lcm_a that divide gcd_b
    $count = 0;
    for ($i = $lcm_a, $j = 2; $i <= $gcd_b; $i = $lcm_a * $j, $j++) {
        if ($gcd_b % $i == 0) {
            $count++;
        }
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$total = getTotalX($arr, $brr);

fwrite($fptr, $total . "\n");

fclose($fptr);
