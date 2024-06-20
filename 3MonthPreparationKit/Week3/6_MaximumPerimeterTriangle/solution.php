<?php

/*
 * Complete the 'maximumPerimeterTriangle' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY sticks as parameter.
 */

function maximumPerimeterTriangle($sticks) {
    // Write your code here
    $result = [-1];
    $triangleGot =[];
    $triangleGotLength = 0;
    sort($sticks);
    $count = count($sticks);
    $firstElement = $sticks[0];
    $secondElement = $sticks[1];
    $elementsSum = $firstElement + $secondElement;
    for($i = 2; $i < $count; $i++) {
        $stick = $sticks[$i];
        if ($stick < $elementsSum) {
            $triangleLength = $stick + $elementsSum;
            if ($triangleLength > $triangleGotLength) {
                $triangleGot = [$firstElement, $secondElement, $stick];
                $triangleGotLengt = $triangleLength;
            }
        }
        $firstElement = $secondElement;
        $secondElement = $stick;
        $elementsSum = $firstElement + $secondElement;

    }
    if ($triangleGot) {
        $result = $triangleGot;
    }

    return $result;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$sticks_temp = rtrim(fgets(STDIN));

$sticks = array_map('intval', preg_split('/ /', $sticks_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = maximumPerimeterTriangle($sticks);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
