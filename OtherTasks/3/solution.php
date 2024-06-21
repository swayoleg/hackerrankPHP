<?php

class Person {

    private $knows = [];

    public function __construct($knows) {
        $this->knows = $knows;
    }

    public function knows($personIndex) {

        if (in_array($personIndex, $this->knows)) {
            return true;
        }
        return false;

    }
}

function findCelebrity($persons): int|null {

    $count = count($persons);
    $l = 0;
    $r = $count- 1;

    while ($l != $r) {
        if ($persons[$l]->knows($r)) {
            $l++;
        } else {
            $r--;
        }
    }

    for ($i = 0; $i < $count; $i++) {
        if ($i != $l && (!$persons[$i]->knows($l) || $persons[$l]->knows($i))) {
            return null;
        }
    }

    return $l;
}

$arrayLength = 5;
$knownMap[0] = [1,2,3,4];  // 0 knows 1, 2, 3, 4
$knownMap[1] = [0,2,3,4]; // 1 knows 0, 2, 3, 4
$knownMap[2] = [3];  // 2 knows 3
$knownMap[3] = []; // 3 knows no one
$knownMap[4] = [3, 1]; // 4 knows 3, 1
// celebrity is 3 - he doesnt know anyone and everyone knows him

$presons = [];

for ($i = 0; $i < $arrayLength; $i++) {
    $presons[] = new Person($knownMap[$i]);
}

$result = findCelebrity($presons);
var_dump($result);


