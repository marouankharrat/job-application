<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Adjust the path based on your project structure

use  App\TextProcessor;

$textProcessor = new TextProcessor();
$result = $textProcessor->processText('test', 4);

$jsonResult = json_encode($result, JSON_PRETTY_PRINT);

// Output the JSON result
echo $jsonResult;

// $result will contain the processed array