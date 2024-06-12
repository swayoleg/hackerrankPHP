<?php

/*
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus($arr) {
    $returnResult = [];
    // Write your code here
    $length = count($arr);
    $counters = ['positive' => 0, 'negative' => 0, 'zero' => 0];
    foreach($arr as $element) {
        if ($element < 0) {
            ++$counters['negative'];
        } elseif( $element > 0) {
            ++$counters['positive'];
        } else {
            ++$counters['zero'];
        }
    }
    foreach ($counters as $v) {
        $result = $v / $length;
        $returnResult[] = number_format($result, 6, '.','');
    }
    return $returnResult;
}

for($i = 1; $i < 3; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

    $result = plusMinus($a);
    $output = rtrim(implode("\n", $result));
    echo 'testcase '.$i.':' . PHP_EOL;
    echo ($expectedOutput == $output) ? 'pass' : 'fail';
    echo PHP_EOL;
}
