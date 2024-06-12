<?php

/*
 * Complete the 'contacts' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts 2D_STRING_ARRAY queries as parameter.
 */


class contactsClass {

    static $db = [];
    static $index = [];
    static public function addContact($name) {
        self::$db[] = $name;
        self::putIndex($name);
    }

    static public function findCount($search) {
        $count = 0;
        if (isset(self::$index[$search])) {
            $count += self::$index[$search];
        }

        return $count;
    }

    static public function putIndex($value) {
        if ($value) {
            $splittedArray = str_split($value);
            if (isset(self::$index[$value])) {
                ++self::$index[$value];
            } else {
                self::$index[$value] = 1;
            }
            array_pop($splittedArray);
            if ($splittedArray) {
                $newValue = implode('', $splittedArray);
                self::putIndex($newValue);
            }
        }
    }
}

function contacts($queries) {
    // Write your code here

    //echo $length . PHP_EOL;
    $result = [];
    foreach ($queries as $query) {
        //$ex = explode(' ', $query);
        $command = $query[0];
        $value = $query[1];
        if ($command == 'add') {
            contactsClass::addContact($value);
        }
        if ($command == 'find') {
            $result[] =  contactsClass::findCount($value);
        }
        //echo $command . ' - ' . $value . PHP_EOL;
    }

    //foreach ($queries as $query) {
    return $result;
}

for($i = 1; $i < 4; $i++) {
    $a = file(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-input.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);

    $queries = array();
    $queries_rows = count($a);
    for ($j = 0; $j < $queries_rows; $j++) {
        $queries_temp = $a[$j];
        $queries[] = preg_split('/ /', $queries_temp, -1, PREG_SPLIT_NO_EMPTY);
    }

    $expectedOutput = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testcases'. DIRECTORY_SEPARATOR . $i . '-output.txt');

    $result = contacts($queries);
    $output = implode("\n", $result);
    echo 'testcase '.$i.':' . PHP_EOL;
    echo ($expectedOutput == $output) ? 'pass' : 'fail';
    echo PHP_EOL;
}