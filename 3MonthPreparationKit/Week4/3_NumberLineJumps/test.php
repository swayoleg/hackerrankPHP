<?php

/*
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function kangaroo($x1, $v1, $x2, $v2) {
    // Write your code here
    $firstPointK1 = $x1 + $v1;
    $firstPointK2 = $x2 + $v2;
    if ($firstPointK1 == $firstPointK2) {
        return 'YES';
    }
    if ($x1 == $x2) {
        return 'YES';
    }
    if ($firstPointK1 > $firstPointK2 && $v1 > $v2) {
        return 'NO';
    }
    if ($firstPointK2 > $firstPointK1 && $v2 > $v1) {
        return 'NO';
    }
    if ($v2 == $v1 && $firstPointK1 !== $firstPointK2) {
        return 'NO';
    }

    if ($v1 > $v2) { // point 2 > point 1
        $i = $firstPointK1;
        $j = $firstPointK2;

        while($j >= $i) {
            if ($j == $i) {
                return 'YES';
            }
            $i+=$v1;
            $j+=$v2;
        }
    }
    elseif ($v2 > $v1) { // point 2 < point 1
        $i = $firstPointK2;
        $j = $firstPointK1;

        while($j >= $i) {

            if ($j == $i) {
                return 'YES';
            }
            $i+=$v2;
            $j+=$v1;
        }
    }


    return 'NO';

}

$testcases = glob(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . '*-input.txt');
$testcasesCount  = count($testcases);

foreach($testcases as $i => $testcase) {
    $testCaseRealIndex = explode('-', basename($testcase))[0];
    $a = file($testcase, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $numbers = explode(' ', $a[0]);
    $numbers = array_map('trim', $numbers);
    $numbers = array_map('intval', $numbers);

    // if ($testCaseRealIndex == 6) {
    $result = kangaroo(...$numbers);
    $output = $result;
    //echo $result . PHP_EOL;;
    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $testCaseRealIndex . '-output.txt');

    echo 'testcase '.$testCaseRealIndex.':' . PHP_EOL;
    echo (trim($expectedOutput) == trim($output)) ? 'pass' : 'fail';
    echo PHP_EOL;
    // }





}