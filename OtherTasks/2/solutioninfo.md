# Algorithm Explanation: Maximum Result from Array with Operations

## Problem Statement

Given an array of numbers and four mathematical operations (addition, subtraction, multiplication, division), the task is to find the maximum possible result by applying these operations between the numbers in the order they appear in the array.

## Initial Naive Solution

A naive approach to solve this problem is to use recursion to explore all possible combinations of operations between the numbers. However, this approach is inefficient due to its exponential time complexity, making it impractical for larger arrays.

## Optimized Solution with Dynamic Programming

To solve this problem more efficiently, we can use dynamic programming. The key idea is to maintain both the maximum and minimum possible results at each step. This approach ensures that we do not miss out on any potential maximum result due to the presence of negative numbers.

### Why We Need Both Maximum and Minimum Results

When dealing with mathematical operations, especially multiplication and division, the presence of negative numbers can drastically change the outcome. Here are the reasons why maintaining both maximum and minimum results is crucial:

1. **Multiplication with Negative Numbers:**
    - A negative number multiplied by another negative number results in a positive number.
    - If we only keep track of the maximum results, we might miss a scenario where two negative numbers produce a large positive number.

2. **Division with Negative Numbers:**
    - Similar to multiplication, dividing a negative number by another negative number results in a positive number.
    - Keeping track of the minimum results ensures we consider these cases.

3. **Zero Handling:**
    - Multiplication by zero results in zero, which can reset any potential maximum.
    - Division by numbers between 0 and 1 can amplify the result, turning a small negative into a large positive, or vice versa.

### Algorithm Steps

1. **Initialize:**
    - Start with the first number in the array as both the initial maximum and minimum results.

2. **Iterate through the Array:**
    - For each subsequent number, calculate all possible results by applying each of the four operations with both the current maximum and minimum results.
    - Track the new maximum and minimum results obtained from these calculations.

3. **Update Results:**
    - After processing each number, update the maximum and minimum results to include only the highest and lowest values from the current step.

4. **Final Result:**
    - The final maximum result after processing all numbers in the array is the desired output.

## PHP Implementation

Here's the PHP code implementing the above logic:

```php
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

$nums = [1.5, -2.3, 3.6, 0.7];
echo "Maximum Result: " . findMax($nums);
?>
