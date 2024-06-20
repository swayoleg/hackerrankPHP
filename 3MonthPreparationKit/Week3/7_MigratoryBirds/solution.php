<?php

/*
 * Complete the 'migratoryBirds' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function migratoryBirds($arr) {
    // Write your code here
    $hashMap = [];
    $mostTypesCounter = 0;
    $mpostType = $arr[0];
    foreach($arr as $type) {
        $courrentCounterOfType = 1 + ($hashMap[$type] ?? 0);
        if ($courrentCounterOfType > $mostTypesCounter) {
            $mpostType = $type;
            $mostTypesCounter = $courrentCounterOfType;
        } elseif($courrentCounterOfType == $mostTypesCounter && $type < $mpostType ) {
            $mpostType = $type;
            $mostTypesCounter = $courrentCounterOfType;
        }

        if(!isset($hashMap[$type])) {
            $hashMap[$type] = 0;
        }
        ++$hashMap[$type];
    }

    return $mpostType;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr_count = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = migratoryBirds($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
