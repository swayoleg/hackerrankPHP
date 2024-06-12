<?php

/*
 * Complete the 'breakingRecords' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY scores as parameter.
 */

function breakingRecords($scores) {
    // Write your code here
    $return[0] = 0;
    $return[1] = 0;

    $maxIn = 0;
    $minIn = pow(10,8) + 1;//The maximum number can be given by the problem
    foreach($scores as $index => $score) {
        if ($index == 0) {
            $maxIn = $score;
            $minIn = $score;
        }
        else {
            if ($score > $maxIn) {
                $maxIn = $score;
                ++$return[0];
            }
            if ($score < $minIn) {
                $minIn = $score;
                ++$return[1];
            }
        }
    }
    return $return;
}

for($i = 1; $i < 4; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

    $result = breakingRecords($a);
    $output = rtrim(implode("\n", $result));

    echo 'testcase '.$i.':' . PHP_EOL;
    echo (trim($expectedOutput) == trim($output)) ? 'pass' : 'fail';
    echo PHP_EOL;
}
