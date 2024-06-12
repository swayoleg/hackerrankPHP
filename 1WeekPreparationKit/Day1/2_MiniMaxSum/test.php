<?php

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function miniMaxSum($arr) {
    // Write your code here
    sort($arr);
    $min = 0;
    $max = 0;
    foreach($arr as $index => $value) {
        if ($index < 4) {
            $min +=$value;
        }
        if ($index > 0) {
            $max += $value;
        }
    }
    return [$min, $max];
}

for($i = 1; $i < 3; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

    $result = miniMaxSum($a);
    $output = rtrim(implode("\n", $result));
    echo 'testcase '.$i.':' . PHP_EOL;
    echo ($expectedOutput == $output) ? 'pass' : 'fail';
    echo PHP_EOL;
}