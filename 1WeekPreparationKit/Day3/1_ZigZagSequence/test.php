<?php

/*
 * Complete the 'flippingBits' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER n as parameter.
 */

function findZigZagSequence($a, $n){
    sort($a);
    $a = array_map('trim', $a);
    $a = array_map('intval', $a);
    $mid = floor(($n + 1) / 2) - 1;
    $temp = $a[$mid];
    $a[$mid] = $a[$n - 1];
    $a[$n - 1] = $temp;

    $returnValues =[];

    $st = $mid + 1;
    $ed = $n - 2;
    while($st <= $ed){
        $temp = $a[$st];
        $a[$st] = $a[$ed];
        $a[$ed] = $temp;
        $st = $st + 1;
        $ed = $ed - 1;
    }
    foreach ($a as $i => $val) {
        $returnValues[] = $val;
    }
    return $returnValues;
}

$testcases = glob(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . '*-input.txt');
$testcasesCount  = count($testcases);

for($i = 1; $i <= $testcasesCount; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $t = array_shift($a);

    for($j = $i; $j <= $t; $j++) {
        $arrayLength = array_shift($a);
        $arr = explode(' ', $a[0]);
        $results = findZigZagSequence($arr, $arrayLength);
        $output = implode(" ", $results);
        $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

        echo 'testcase '.$i.':' . PHP_EOL;
        echo 'testcase from file '.$j.':' . PHP_EOL;
        echo (trim($expectedOutput) == trim($output)) ? 'pass' : 'fail';
        echo PHP_EOL;

    }

}