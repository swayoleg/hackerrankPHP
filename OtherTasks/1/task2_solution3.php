<?php

function subArraySum($arr, $k)
{
    $answer = 0;
    $pairs = [];
    $hashmapCounter[0] = 1;
    $hashMapSubArrays = [];
    $length = count($arr);
    $sum = 0;
    $processedNumbers = [];
    for ($i = 0; $i <$length; $i++) {
        $sum += $arr[$i];
        $processedNumbers[] = $arr[$i];
        $toRemove = $sum - $k;
        $oldAnswer = $answer;
        $answer += $hashmapCounter[$toRemove] ?? 0;
        $previosCount = $hashmapCounter[$sum] ?? 0;
        $hashmapCounter[$sum] = $previosCount + 1;
        $hashMapSubArrays[$sum][] = $processedNumbers;

        if (isset($hashMapSubArrays[$toRemove]) ) {
            foreach ($hashMapSubArrays[$toRemove] as $pairToAdd) {
                $tmpPairs = array_diff_assoc($processedNumbers, $pairToAdd);
                $pairs[] = $tmpPairs;
            }
        } elseif($answer != $oldAnswer) {
            $pairs[] = $processedNumbers;
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