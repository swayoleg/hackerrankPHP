<?php


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
        return  'BAD SET' . PHP_EOL . $wordToFind;
    } else {
        return 'GOOD SET';
    }
}

$testcases = glob(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . '*-input.txt');
$testcasesCount  = count($testcases);

foreach($testcases as $i => $testcase) {
    $testCaseRealIndex = explode('-', basename($testcase))[0];
    $a = file($testcase, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $length = array_shift($a);

   // if ($testCaseRealIndex == 6) {
        $result = noPrefix($a);
        $output = $result;
        //echo $result . PHP_EOL;;
        $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases' . DIRECTORY_SEPARATOR . $testCaseRealIndex . '-output.txt');

        echo 'testcase '.$testCaseRealIndex.':' . PHP_EOL;
        echo (trim($expectedOutput) == trim($output)) ? 'pass' : 'fail';
        echo PHP_EOL;
   // }





}