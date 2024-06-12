<?php

/*
* Complete the 'findMedian' function below.
*
* The function is expected to return an INTEGER.
* The function accepts INTEGER_ARRAY arr as parameter.
*/
function findMedian($arr) {
    // Write your code here
    sort($arr);
    $leng = count($arr);
    return $arr[floor($leng / 2)];
}