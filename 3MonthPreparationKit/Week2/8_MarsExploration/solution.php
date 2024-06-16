<?php

/*
 * Complete the 'marsExploration' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts STRING s as parameter.
 */

function marsExploration($s) {
    // Write your code here
    $count = 0;
    $array = str_split($s);
    $letterCounter = 0;
    foreach($array as $index => $v) {
        ++$letterCounter;

        if ($letterCounter == 1 || $letterCounter == 3) {
            if ($v != 'S') {
                ++$count;
            }
        } elseif($letterCounter == 2 && $v != 'O' ) {
            ++$count;
        }

        if ($letterCounter == 3) {
            $letterCounter = 0;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = marsExploration($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
