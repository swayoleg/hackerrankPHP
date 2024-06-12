<?php

/* Enter your code here. Read input from STDIN. Print output to STDOUT */


function splitMethod($value) {
    $value = rtrim($value);
    $value = str_replace(['(', ')'], ['', ''], $value);
    $arr = str_split(trim($value));
    $result = '';
    foreach($arr as $k => $v) {
        if (strtolower($v) != $v) {
            $result .= ' ';
        }
        $result .= strtolower($v);
    }
    return $result;
}
function splitClass($value) {
    $arr = str_split(trim($value));
    $result = '';
    foreach($arr as $k => $v) {
        if (strtolower($v) != $v && $k != 0) {
            $result .= ' ';
        }
        $result .= strtolower($v);
    }
    return $result;
}
function splitVariable($value) {
    $arr = str_split(trim($value));
    $result = '';
    foreach($arr as $k => $v) {
        if (strtolower($v) != $v) {
            $result .= ' ';
        }
        $result .= strtolower($v);
    }
    return $result;
}

function combineMethod($value) {
    $ex = explode(' ', trim($value));
    foreach($ex as $k => $v) {
        if ($k>0) {
            $ex[$k] = ucfirst($v);
        }
    }
    $imploded = implode('', $ex);
    return ($imploded . '()');
}
function combineClass($value) {
    $ex = explode(' ', trim($value));
    foreach($ex as $k => $v) {
        $ex[$k] = ucfirst($v);
    }
    return implode('', $ex);
}
function combineVariable($value) {
    $ex = explode(' ', $value);
    foreach($ex as $k => $v) {
        if ($k>0) {
            $ex[$k] = ucfirst($v);
        }
    }
    return implode('', $ex);

}


for($i = 1; $i<=3; $i++) {

    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $returns = [];
    foreach ($a as $getString) {

        $ex = explode(';', $getString);
        $operation = $ex[0];
        $type = $ex[1];
        $value = $ex[2];
        $value = trim($value);


        $keyToRun = $operation.$type;

        switch($keyToRun) {
            case 'CM':
                $returns[] = combineMethod($value) ;
                break;
            case 'CC':
                $returns[] = combineClass($value) ;
                break;
            case 'CV':
                $returns[] = combineVariable($value) ;
                break;
            case 'SV':
                $returns[] = splitVariable($value) ;
                break;
            case 'SC':
                $returns[] = splitClass($value) ;
                break;
            case 'SM':
                $returns[] = splitMethod($value) ;
                break;

        }
    }

    $output = implode("\n", $returns);

    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

    echo 'testcase '.$i.':' . PHP_EOL;
    echo ($expectedOutput == $output) ? 'pass' : 'fail';
    echo PHP_EOL;
}



?>
