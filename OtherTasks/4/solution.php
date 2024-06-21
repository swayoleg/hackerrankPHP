<?php

function rob($nums) {
    $n = count($nums);
    if ($n == 0) return 0;
    if ($n == 1) return $nums[0];

    $dp = array_fill(0, $n, 0);
    $dp[0] = $nums[0];
    $dp[1] = max($nums[0], $nums[1]);

    for ($i = 2; $i < $n; $i++) {
        $dp[$i] = max($dp[$i - 1], $nums[$i] + $dp[$i - 2]);
    }

    return $dp[$n - 1];
}

// Example usage:
$houses = [2, 7, 9, 3, 1];
echo rob($houses); // Output should be 12