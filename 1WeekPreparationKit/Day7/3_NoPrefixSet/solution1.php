<?php

/*
 * Complete the 'noPrefix' function below.
 *
 * The function accepts STRING_ARRAY words as parameter.
 */


function createNestedArray($string, &$hashMap = []) {
    $arr = str_split($string);
    $tmbString = '';
    foreach ($arr as $key => $value) {
        $tmbString .= $value;
        $hashMap[$tmbString] = $string;
    }

}

function noPrefix($words)
{
    $hashMap = [];
    $hashMapSub = [];
    $length = count($words);
    $isBad = false;
    $wordToFind = '';

    for ($i = 0; $i < $length; $i++) {
        $word = $words[$i];

        if(isset($hashMap[$word])) {
            $isBad = true;
            $wordToFind = $word;
            break;
        }

        $splittedWord = str_split($word);
        $tmpWord = '';
        foreach ($splittedWord as  $splittedChar) {
            $tmpWord .= $splittedChar;
            if(isset($hashMap[$tmpWord])) {
                $isBad = true;
                $wordToFind = $word;
                break;
            }
        }

        if (isset($hashMapSub[$word])) {
            $isBad = true;
            $wordToFind = $word;
            break;
        }

        if ($isBad) {
            break;
        }

        $hashMap[$word] = $word;
        createNestedArray($word, $hashMapSub);
    }

    if ($isBad) {
        echo  'BAD SET' . PHP_EOL . $wordToFind;
    } else {
        echo 'GOOD SET';
    }

}

$n = intval(trim(fgets(STDIN)));

$words = array();

for ($i = 0; $i < $n; $i++) {
    $words_item = rtrim(fgets(STDIN), "\r\n");
    $words[] = $words_item;
}

noPrefix($words);
