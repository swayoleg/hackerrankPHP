<?php

/*
 * Complete the 'breakingRecords' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY scores as parameter.
 */

function breakingRecords($scores) {
    // Write your code here
    $return[0] = 0;
    $return[1] = 0;

    $maxIn = 0;
    $minIn = pow(10,8) + 1;//The maximum number can be given by the problem
    foreach($scores as $index => $score) {
        if ($index == 0) {
            $maxIn = $score;
            $minIn = $score;
        }
        else {
            if ($score > $maxIn) {
                $maxIn = $score;
                ++$return[0];
            }
            if ($score < $minIn) {
                $minIn = $score;
                ++$return[1];
            }
        }
    }
    return $return;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$scores_temp = rtrim(fgets(STDIN));

$scores = array_map('intval', preg_split('/ /', $scores_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = breakingRecords($scores);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
