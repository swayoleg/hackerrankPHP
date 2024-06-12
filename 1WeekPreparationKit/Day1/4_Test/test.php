<?php



/*
 * Complete the 'findMedian' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function findMedian($arr) {
    // Write your code here
    sort($arr);
    $leng = count($arr);
    return $arr[floor($leng / 2)];
}


for($i = 1; $i<2; $i++) {

    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $ex2 = explode(' ', $a[1]);

    array_map('trim', $ex2);
    array_map('intval', $ex2);

    $result = findMedian($ex2);
    $expectedResult = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $i . '-output.txt');
    echo 'testcase '.$i.':' . PHP_EOL;
    echo (trim($expectedResult) == trim($result)) ? 'pass' : 'fail';
    echo PHP_EOL;
}

