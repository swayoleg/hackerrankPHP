<?php

/*
 * Complete the 'gridChallenge' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING_ARRAY grid as parameter.
 */
function isColumnOrderedAlphabetic($grid) {
    for ($i = 0; $i < strlen($grid[0]); $i++) {
        for ($j = 0; $j < count($grid); $j++) {
            if ($j < count($grid) - 1 && $grid[$j][$i] > $grid[$j+1][$i]) {
                return false;
            }
        }
    }
    return true;
}

function gridChallenge($grid) {
    // Sorting
    for ($i = 0; $i < count($grid); $i++) {
        $wordArray = str_split($grid[$i]);
        sort($wordArray);
        $grid[$i] = implode('', $wordArray);
    }
    // End Sorting

    if (isColumnOrderedAlphabetic($grid)) {
        return "YES";
    }
    return "NO";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $grid = array();

    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }

    $result = gridChallenge($grid);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
