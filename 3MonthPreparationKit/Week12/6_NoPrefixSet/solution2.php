<?php

/*
 * Complete the 'noPrefix' function below.
 *
 * The function accepts STRING_ARRAY words as parameter.
 */

function noPrefix($words) {
    // Write your code here
    /*usort($words, function($a, $b) {
        return strlen($a) - strlen($b);
    });*/
    $n = count($words);
    $pritned = false;

    $mapaHashLength = [];
    $mapaHashWords = [];
    $duplicatesMap = [];
    $isUnique = true;
    for($i = 0; $i < $n; $i++) {
        $w = $words[$i];
        $mapaHashLength[$w] = strlen($w);
        $lengthVariantsMap[$mapaHashLength[$w]] = $mapaHashLength[$w];
        if (!isset($mapaHashWords[$w])) {
            $mapaHashWords[$w] = 1;
        } else {
            $isUnique = false;
            ++$mapaHashWords[$w];
            $duplicatesMap[] = $w;
        }
    }

    $variationLengthCount = count($lengthVariantsMap);
    if ($variationLengthCount == 1 && $isUnique) {
        echo 'GOOD SET' . PHP_EOL;
        return;
    } elseif($variationLengthCount == 1 && isset($duplicatesMap[0])){
        echo 'BAD SET' . PHP_EOL;
        echo $duplicatesMap[0];
        return;
    } else {
        for($i = 0; $i < $n; $i++) {
            $j = $i + 1;
            while($j >= 0) {
                if ($i != $j && $j < $n) {
                    $strlenwI = strlen($words[$i]);
                    $strlenwJ = strlen($words[$j]);
                    if ($strlenwI > $strlenwJ && strpos($words[$i], $words[$j]) === 0) {
                        echo 'BAD SET' . PHP_EOL;
                        $pritned = true;
                    } elseif($strlenwJ > $strlenwI && strpos($words[$j], $words[$i]) === 0) {
                        echo 'BAD SET' . PHP_EOL;
                        $pritned = true;
                    } elseif($words[$j] == $words[$i]) {
                        echo 'BAD SET' . PHP_EOL;
                        $pritned = true;
                    }
                    if ($pritned) {
                        if ($j > $i) {
                            echo $words[$j] . PHP_EOL;
                        } else {
                            echo $words[$i] . PHP_EOL;
                        }
                        return;
                    }
                }
                $j --;
            }
        }
        echo 'GOOD SET' . PHP_EOL;
    }
}

$n = intval(trim(fgets(STDIN)));

$words = array();

for ($i = 0; $i < $n; $i++) {
    $words_item = rtrim(fgets(STDIN), "\r\n");
    $words[] = $words_item;
}

noPrefix($words);
