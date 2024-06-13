<?php

/*
 * Complete the 'flippingBits' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER n as parameter.
 */

function flippingBits($n) {
    // Write your code here
    $converted = decbin($n);

    $lengthCurrent = strlen($converted);
    $prefix = str_repeat(0, 32 - $lengthCurrent);
    $inNewFormat = $prefix . $converted;
    $arr = str_split($inNewFormat);

    foreach ($arr as $k=>$item) {
        if ($item == 1) {
            $arr[$k] = 0;
        } else {
            $arr[$k] = 1;
        }
    }
    $resultString = implode('', $arr);
    $resultInt = bindec($resultString);
    return $resultInt;
}

for($i = 1; $i < 4; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    array_shift($a);
    $results=[];
    foreach ($a as $digit) {
        $results[] = flippingBits($digit);
    }

    $output = implode("\n", $results);
    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

    echo 'testcase '.$i.':' . PHP_EOL;
    echo (trim($expectedOutput) == trim($output)) ? 'pass' : 'fail';
    echo PHP_EOL;
}