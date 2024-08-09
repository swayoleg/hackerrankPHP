<?php

/*
 * Complete the 'caesarCipher' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. INTEGER k
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

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$s = rtrim(fgets(STDIN), "\r\n");

$k = intval(trim(fgets(STDIN)));

$result = caesarCipher($s, $k);

fwrite($fptr, $result . "\n");

fclose($fptr);
