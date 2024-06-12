<?php

/*
 * Complete the 'matchingStrings' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. STRING_ARRAY strings
 *  2. STRING_ARRAY queries
 */

function matchingStrings($strings, $queries) {
    // Write your code here
    $counterMap = [];
    foreach($strings as $v) {
        if (isset($counterMap[$v])) {
            ++$counterMap[$v];
        } else {
            $counterMap[$v] = 1;
        }
    }
    $results = [];
    foreach($queries as $v) {
        if (isset($counterMap[$v])) {
            $results[] = $counterMap[$v];
        } else {
            $results[] = 0;
        }
    }
    return $results;
}
for($i = 1; $i<4; $i++) {

    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    $strings = [];
    $queries = [];
    $strings = array();
    $strings_count = (int)$a[0];

    for ($j = 1; $j < $strings_count + 1; $j++) {
        $strings_item = trim($a[$j]);
        $strings[] = $strings_item;
    }

    $queries_count = (int)$a[$strings_count + 1];

    $queries = array();

    for ($q = $strings_count+2; $q < $strings_count+$queries_count+2; $q++) {
        $queries_item =  trim($a[$q]);
        $queries[] = $queries_item;
    }
    $result = matchingStrings($strings, $queries);
    $output = implode("\n", $result);
    $expectedResult = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $i . '-output.txt');
    echo 'testcase '.$i.':' . PHP_EOL;
    echo (trim($expectedResult) == trim($output)) ? 'pass' : 'fail';
    echo PHP_EOL;
}
