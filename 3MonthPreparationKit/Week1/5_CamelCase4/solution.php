<?php
$_fp = fopen("php://stdin", "r");
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


while ($getString = fgets(STDIN)) {
    $getString = trim($getString);
    $ex = explode(';', $getString);
    $operation = $ex[0];
    $type = $ex[1];
    $value = $ex[2];

    $keyToRun = $operation.$type;

    switch($keyToRun) {
        case 'CM':
            echo combineMethod($value) . PHP_EOL;
            break;
        case 'CC':
            echo combineClass($value) . PHP_EOL;
            break;
        case 'CV':
            echo combineVariable($value) . PHP_EOL;
            break;
        case 'SV':
            echo splitVariable($value) . PHP_EOL;
            break;
        case 'SC':
            echo splitClass($value) . PHP_EOL;
            break;
        case 'SM':
            echo splitMethod($value) . PHP_EOL;
            break;

    }
}






?>
