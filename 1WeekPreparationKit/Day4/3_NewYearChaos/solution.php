<?php

/*
 * Complete the 'minimumBribes' function below.
 *
 * The function accepts INTEGER_ARRAY q as parameter.
 */

function minimumBribes($q) {
    // Write your code here
    $swapsCount = 0;
    $length = count($q);
    for($i = $length - 1; $i >= 0; $i--) {
        if ($q[$i] != $i + 1) {
            if ($q[$i-1] == ($i+1)) {
                $temp = $q[$i-1];
                $q[$i-1] = $q[$i];
                $q[$i] = $temp;
                ++$swapsCount;
            } elseif( $q[$i-2] == ($i +1)) {
                $q[$i-2] = $q[$i-1];
                $q[$i-1] = $q[$i];
                $q[$i] = $q[$i-2];
                $swapsCount +=2;
            } else {
                echo 'Too chaotic' . PHP_EOL;
                return;
            }
        }
    }

    echo $swapsCount. PHP_EOL;
}

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $q_temp = rtrim(fgets(STDIN));

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribes($q);
}
