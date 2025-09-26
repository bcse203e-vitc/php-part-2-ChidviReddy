<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function calculateAverage($numbers) {
    if (empty($numbers)) {
        throw new Exception("No numbers provided");
    }
    $sum = array_sum($numbers);
    $count = count($numbers);
    return $sum / $count;
}

$numbersArray = [10, 20, 30, 40, 50]; 
try {
    $average = calculateAverage($numbersArray);
    echo "Average of numbers: " . $average;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
