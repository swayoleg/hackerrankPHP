<?php

/*
 * Complete the 'flippingBits' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts LONG_INTEGER n as parameter.
 */


function rotateAlphabet($k) {
    $original = 'abcdefghijklmnopqrstuvwxyz';
    if ($k > strlen($original)) {
        $k = $k % strlen($original);
    }
    $subAl = substr($original, $k) . substr($original, 0, $k);
    $subAl .= strtoupper($subAl);

    return $subAl;
}

function caesarCipher($s, $k) {
    // Write your code here
    $rotated = rotateAlphabet($k);
    $rotatedArray = str_split($rotated);
    $splitInput = str_split($s);
    $original = 'abcdefghijklmnopqrstuvwxyz';
    $originalSplit = str_split($original.  strtoupper($original));
    $return = '';
    foreach($splitInput as $ind => $v) {
        $indexInOriginal = array_search($v, $originalSplit);
        if (in_array($v, $rotatedArray)) {
            $return .= $rotatedArray[$indexInOriginal];
        } else {
            $return .= $v;
        }

    }
    return $return;
}


$testcases = glob(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . '*-input.txt');
$testcasesCount  = count($testcases);

for($i = 1; $i <= $testcasesCount; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $length = array_shift($a);
    $s = array_shift($a);
    $k = array_shift($a);

    $result = caesarCipher($s, $k);
    $output = $result;
    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

        echo 'testcase '.$i.':' . PHP_EOL;
        echo (trim($expectedOutput) == trim($output)) ? 'pass' : 'fail';
        echo PHP_EOL;



}