<?php

function findMax($array) {
    if (count($array) === 0) {
        return 0;
    }

    $tmpMin = $array[0];
    $tmpMax = $array[0];
    $mins = array_fill(0, 4, PHP_INT_MAX);
    $maxs = array_fill(0, 4, 0);

    $length = count($array);
    for ($i = 1; $i < $length; $i++) {
        $mins[0] = $tmpMin - $array[$i];
        $maxs[0] = $tmpMax - $array[$i];

        $mins[1] = $tmpMin + $array[$i];
        $maxs[1] = $tmpMax + $array[$i];

        $mins[2] = $tmpMin * $array[$i];
        $maxs[2] = $tmpMax * $array[$i];

        if ($array[$i] != 0) {
            $mins[3] = $tmpMin / $array[$i];
            $maxs[3] = $tmpMax / $array[$i];
        }

        $tmpMax = max(max($mins), max($maxs));
        $tmpMin = min(min($mins), min($maxs));
    }

    return $tmpMax;
}




// Testing the function
$nums = [1, 2, 3, 4];
echo findMax($nums) . PHP_EOL;



$nums = [1.5, -2.3, 3.6, 0.7];
echo "Maximum Result: " . findMax($nums) . PHP_EOL. PHP_EOL;


$nums = [1, -3, 0.1, -5]; // 1 * (-3) / 0.1 * (-5) = 150
echo "Maximum Result: " . findMax($nums) . PHP_EOL;
?>
