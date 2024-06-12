<?php

function flippingMatrix($matrix) {
    // Write your code here
    $n = count($matrix);
    $middle = $n / 2;
    $sum = 0;
    for($i = 0; $i < $middle; $i++) {
        for($j = 0; $j < $middle; $j++) {
            $max = max(
                $matrix[$i][$j],
                $matrix[$i][2 * $middle - $j - 1],
                $matrix[2 * $middle - $i -1][$j],
                $matrix[2 * $middle - $i - 1][2 * $middle - $j - 1]
            );
            $sum += $max;
        }
    }
    return $sum;
}