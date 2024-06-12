<?php


/*
 * Complete the 'runningMedian' function below.
 *
 * The function is expected to return a DOUBLE_ARRAY.
 * The function accepts INTEGER_ARRAY a as parameter.
 */


function addNumber($number, &$minHeap, &$maxHeap)
{
    if (!$maxHeap->count() || $number < $maxHeap->top()) {
        //array_push($maxHeap, -$number);
        $maxHeap->insert($number);
    } else {
        $minHeap->insert($number);
    }
}

function balance(&$minHeap, &$maxHeap)
{
    $countMin = $minHeap->count();
    $countMax = $maxHeap->count();
    if ($countMin - $countMax >= 2) {
        $valToPush = $minHeap->extract();
        $maxHeap->insert($valToPush);
    }
    if ($countMax - $countMin >= 2) {
        $valToPush = $maxHeap->extract();
        $minHeap->insert($valToPush);
    }
}

function getMedian($minHeap, $maxHeap)
{
    $countMin = $minHeap->count();
    $countMax = $maxHeap->count();
    if ($countMin == $countMax) {
        return ($minHeap->top() + $maxHeap->top()) / 2;
    } elseif ($countMin > $countMax) {
        return $minHeap->top();
    } else {
        return ($maxHeap->top());
    }
}

function runningMedian($a)
{
    // Write your code here
    $result = [];
    $minHeap = new SplMinHeap();
    $maxHeap = new SplMaxHeap();
    foreach ($a as $k => $v) {
        addNumber($v, $minHeap, $maxHeap);
        balance($minHeap, $maxHeap);
        if ($k == 0) {
            $resultValue = $v;
            $result[] = number_format($resultValue, '1', '.', '');
            continue;
        }
        $resultValue = getMedian($minHeap, $maxHeap);
        $result[] = number_format($resultValue, '1', '.', '');
    }
    return $result;
}


for($i = 1; $i < 4; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

    $result = runningMedian($a);
    $output = implode("\n", $result);
    echo 'testcase '.$i.':' . PHP_EOL;
    echo ($expectedOutput == $output) ? 'pass' : 'fail';
    echo PHP_EOL;
}


