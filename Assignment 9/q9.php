<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$originalFile = __DIR__ . "/data.txt";

if (!file_exists($originalFile)) {
    die("Original file does not exist.");
}

$dateTime = date("Y-m-d_H-i");

$pathInfo = pathinfo($originalFile);
$backupFile = $pathInfo['dirname'] . "/" . $pathInfo['filename'] . "_$dateTime." . $pathInfo['extension'];

if (copy($originalFile, $backupFile)) {
    echo "Backup created successfully: $backupFile";
} else {
    echo "Failed to create backup. Check folder permissions.";
}
?>
