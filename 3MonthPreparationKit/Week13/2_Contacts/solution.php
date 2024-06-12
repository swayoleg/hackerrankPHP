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
    $length = count($queries);
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

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$queries_rows = intval(trim(fgets(STDIN)));

$queries = array();

for ($i = 0; $i < $queries_rows; $i++) {
    $queries_temp = rtrim(fgets(STDIN));

    $queries[] = preg_split('/ /', $queries_temp, -1, PREG_SPLIT_NO_EMPTY);
}

$result = contacts($queries);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
