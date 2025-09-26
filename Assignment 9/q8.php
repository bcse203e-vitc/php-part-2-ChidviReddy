<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$inputFile = "/opt/lampp/htdocs/web lab9/data.txt";
$outputFile = "/opt/lampp/htdocs/web lab9/numbers.txt";

if (!file_exists($inputFile)) {
    die("Input file does not exist.");
}

$content = file_get_contents($inputFile);

$pattern = "/\b[6-9]\d{9}\b/";

preg_match_all($pattern, $content, $matches);

if (!empty($matches[0])) {
    if (file_put_contents($outputFile, implode(PHP_EOL, $matches[0]) . PHP_EOL, FILE_APPEND) === false) {
        die("Cannot write to $outputFile. Check folder permissions.");
    }
    echo "Extracted numbers saved to $outputFile:<br>";
    echo "<pre>" . implode(PHP_EOL, $matches[0]) . "</pre>";
} else {
    echo "No valid mobile numbers found.";
}
?>
