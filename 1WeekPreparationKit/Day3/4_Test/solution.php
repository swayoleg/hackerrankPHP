<?php


function palindromeIndex($s) {
    // Write your code here
    if ($s === strrev($s)) {
        return -1;
    }
    $start = 0;
    $end = strlen($s) - 1;
    while($start < $end) {
        if ($s[$start] !== $s[$end]) {
            $stringWithoutStart = substr_replace($s, '', $start, 1);
            if ($stringWithoutStart == strrev($stringWithoutStart)) {
                return $start;
            }
            $stringWithoutEnd = substr_replace($s, '', $end, 1);
            if ($stringWithoutEnd == strrev($stringWithoutEnd)) {
                return $end;
            }

        }
        ++$start;
        --$end;
    }
}