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

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$strings_count = intval(trim(fgets(STDIN)));

$strings = array();

for ($i = 0; $i < $strings_count; $i++) {
    $strings_item = rtrim(fgets(STDIN), "\r\n");
    $strings[] = $strings_item;
}

$queries_count = intval(trim(fgets(STDIN)));

$queries = array();

for ($i = 0; $i < $queries_count; $i++) {
    $queries_item = rtrim(fgets(STDIN), "\r\n");
    $queries[] = $queries_item;
}

$res = matchingStrings($strings, $queries);

fwrite($fptr, implode("\n", $res) . "\n");

fclose($fptr);
