<?php
/*
* Complete the 'truckTour' function below.
*
* The function is expected to return an INTEGER.
* The function accepts 2D_INTEGER_ARRAY petrolpumps as parameter.
*/
function truckTour($petrolpumps) {
    $n = count($petrolpumps);
    $start = 0;
    $deficit = 0;
    $capacity = 0;
    for ($i = 0; $i < $n; $i++) {
        $capacity += $petrolpumps[$i][0] - $petrolpumps[$i][1];
        if ($capacity < 0) {
            $start = $i + 1;
            $deficit += $capacity;
            $capacity = 0;
        }
    }
    if ($capacity + $deficit >= 0) {
        return $start;
    }
    return -1;
}
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
$petrolpumps = [];
for ($i = 0; $i < $n; $i++) {
    fscanf($stdin, "%d %d\n", $petrol, $distance);
    $petrolpumps[] = [$petrol, $distance];
}
fclose($stdin);
$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$result = truckTour($petrolpumps);
fwrite($fptr, $result . "\n");
fclose($fptr);