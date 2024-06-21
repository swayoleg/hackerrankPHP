<?php

/*
 * Complete the 'divisibleSumPairs' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER k
 *  3. INTEGER_ARRAY ar
 */

function divisibleSumPairs($n, $k, $ar) {
    // Write your code here
    $pairsCount = 0;

    $len = $n;

    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len; $j++) {
            if ($i < $j && (($ar[$i] + $ar[$j]) % $k == 0)) {
                ++$pairsCount;
            }
        }
    }


    return $pairsCount;
}

for($i = 1; $i<3; $i++) {

    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    $ex1 = explode(' ', $a[0]);
    $ex2 = explode(' ', $a[1]);
    $n = intval($ex1[0]);
    $k = intval($ex1[1]);
    $ex2 = array_map('trim', $ex2);
    $ex2 = array_map('intval', $ex2);
    $result = divisibleSumPairs($n, $k, $ex2);
    $expectedResult = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $i . '-output.txt');
    echo 'testcase '.$i.':' . PHP_EOL;
    echo (trim($expectedResult) == trim($result)) ? 'pass' : 'fail';
    echo PHP_EOL;
}


