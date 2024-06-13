<?php

function subArraySum($arr, $k) {
    $length = count($arr);
    $answer = 0;
    for($i = 0; $i < $length; $i++) {
        $sum = 0;
        for($j = $i; $j < $length; $j++) {
            $sum += $arr[$j];
            if ($sum == $k) {
                ++$answer;
            }
        }
    }
    return $answer;
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
    echo 'Answer: ' . $result . PHP_EOL;
}