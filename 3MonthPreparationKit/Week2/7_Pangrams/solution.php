<?php

/*
 * Complete the 'pangrams' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function pangrams($s) {
    // Write your code here
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $alphabetArray = str_split($alphabet);
    $arr = str_split(strtolower(str_replace(' ', '', $s)));
    $unique = array_unique($arr);
    $filteredChars = array_filter($unique, function($char) {
        return ctype_alpha($char);
    });
    if (count($filteredChars) == strlen($alphabet)) {
        return 'pangram';
    }
    return 'not pangram';

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = pangrams($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
