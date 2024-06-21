<?php

/*
 * Complete the 'kangaroo' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER x1
 *  2. INTEGER v1
 *  3. INTEGER x2
 *  4. INTEGER v2
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

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$x1 = intval($first_multiple_input[0]);

$v1 = intval($first_multiple_input[1]);

$x2 = intval($first_multiple_input[2]);

$v2 = intval($first_multiple_input[3]);

$result = kangaroo($x1, $v1, $x2, $v2);

fwrite($fptr, $result . "\n");

fclose($fptr);
