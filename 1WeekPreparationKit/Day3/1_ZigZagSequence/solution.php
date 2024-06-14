<?php

/* Enter your code here. Read input from STDIN. Print output to STDOUT */

function findZigZagSequence($a, $n){

    sort($a);
    $a = array_map('trim', $a);
    $a =array_map('intval', $a);
    $n = intval($n);
    $mid = floor(($n + 1) / 2) - 1;
    $temp = $a[$mid];
    $a[$mid] = $a[$n - 1];
    $a[$n - 1] = $temp;

    $st = $mid + 1;
    $ed = $n - 2;
    while($st <= $ed){
        $temp = $a[$st];
        $a[$st] = $a[$ed];
        $a[$ed] = $temp;
        $st = $st + 1;
        $ed = $ed - 1;
    }
    foreach ($a as $i => $val) {
        if ($i == $n - 1) {
            echo $val;
        } else {
            echo $val . " ";
        }
    }
}

$_fp = fopen("php://stdin", "r");
$t = trim(fgets($_fp));

for ($i = 0; $i < $t; $i++) {
    $n = trim(fgets($_fp));
    $a = array_map('trim', explode(' ', trim(fgets($_fp))));
    $a = array_map('intval', $a);
    findZigZagSequence($a, $n);
}
fclose($_fp);
?>