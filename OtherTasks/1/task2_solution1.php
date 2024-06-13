<?php

function subArraySum($arr, $k) {
    $length = count($arr);
    $answer = 0;
    $pairs = [];
    for($i = 0; $i < $length; $i++) {
        for($j = 0; $j < $length; $j++) {
            $sum = 0;
            $tempPairs = [];
            for($y = $i; $y <= $j; $y++) {
                $sum += $arr[$y];
                $tempPairs[] = $arr[$y];
            }
            if ($sum == $k) {
                ++$answer;
                $pairs[] = $tempPairs;
            }
        }
    }
    return [$answer, $pairs];
}


$examples = [
    [4, 2, 2, 1 ,2, -3, 5, -8],
    [7, 2, -5, 1, 1, -1, 5, -5]
];

$examplesK = [
    5,
    5
];

foreach ($examples as $i => $arr) {
    $k = $examplesK[$i];

    $result =  subArraySum($arr, $k) ;
    echo 'Example: ' . $i + 1 . PHP_EOL;
    echo 'Answer: ' . $result[0] . PHP_EOL;
    echo 'Pairs: ' . PHP_EOL;
    foreach ($result[1] as $pairs) {
        echo implode(' ', $pairs) . PHP_EOL;
    }
}

