<?php

/*
 * Complete the 'separateNumbers' function below.
 *
 * The function accepts STRING s as parameter.
 */

function separateNumbers($s) {
    $len = strlen($s);
    if ($len == 1) {
        echo "NO\n";
        return;
    }
    $toEnd = intval($len / 2);

    for ($i = 1; $i <= $toEnd; $i++) {
        $tmpStr = substr($s, 0, $i);
        $prev = intval($tmpStr);

        while (strlen($tmpStr) < strlen($s)) {
            $next = $prev + 1;
            $tmpStr .= strval($next);
            $prev = $next;
        }

        if ($tmpStr == $s) {
            echo "YES " . substr($s, 0, $i) . "\n";
            return;
        }
    }

    echo "NO\n";
}

$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = rtrim(fgets(STDIN), "\r\n");

    separateNumbers($s);
}
