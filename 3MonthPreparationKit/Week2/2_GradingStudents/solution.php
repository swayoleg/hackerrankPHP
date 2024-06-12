<?php

/*
 * Complete the 'gradingStudents' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY grades as parameter.
 */

function gradingStudents($grades) {
    // Write your code here
    $result = [];
    foreach($grades as $gradeBeforeRound) {
        if ($gradeBeforeRound < 38 || $gradeBeforeRound == 100) {
            $result[] = $gradeBeforeRound;
        } else {
            $splitted = str_split($gradeBeforeRound);
            if (in_array($splitted[1], [3,4,8,9])) {
                if (in_array($splitted[1], [3,4])) {
                    $suffix = 5;
                    $result[] = (int)($splitted[0] . $suffix);
                } else {
                    $suffix = 0;
                    $prefix = $splitted[0] + 1;
                    $result[] = (int)($prefix . $suffix);
                }
            } else {
                $result[] = $gradeBeforeRound;
            }
        }
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$grades_count = intval(trim(fgets(STDIN)));

$grades = array();

for ($i = 0; $i < $grades_count; $i++) {
    $grades_item = intval(trim(fgets(STDIN)));
    $grades[] = $grades_item;
}

$result = gradingStudents($grades);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
