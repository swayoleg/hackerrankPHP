<?php

/*
 * Complete the 'pickingNumbers' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function pickingNumbers($a) {
    // Write your code here

    sort($a);
    $maxLength = 0;
    $left = 0;
    $right = 0;
    $n = count($a);

    while ($right < $n) {

        while ($right < $n && (abs($a[$right] - $a[$left]) <= 1)) {
            $right++;
        }
        // Update the maxLength with the size of the current window
        $maxLength = max($maxLength, $right - $left);
        // Move the left pointer to start a new window
        $left++;
    }

    return $maxLength;

}

$testcases = glob(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . '*-input.txt');
$testcasesCount  = count($testcases);

foreach($testcases as $i => $testcase) {
    $testCaseRealIndex = explode('-', basename($testcase))[0];
    $a = file($testcase, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $length = array_shift($a);

    $numbers = explode(' ', $a[0]);
    $numbers = array_map('trim', $numbers);
    $numbers = array_map('intval', $numbers);

    // if ($testCaseRealIndex == 6) {
    $result = pickingNumbers($numbers);
    $output = $result;
    //echo $result . PHP_EOL;;
    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $testCaseRealIndex . '-output.txt');

    echo 'testcase '.$testCaseRealIndex.':' . PHP_EOL;
    echo (trim($expectedOutput) == trim($output)) ? 'pass' : 'fail';
    echo PHP_EOL;
    // }





}