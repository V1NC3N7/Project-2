<?php

require 'vendor/autoload.php';
try {
        $conn = new MongoDB\Client("mongodb://172.17.0.2:27017");
        $db = $conn->People;
        
	} catch (MongoDB\Driver\Exception\Exception $e) {

		$filename = basename(__FILE__);
		
		echo "The $filename script has experienced an error.\n"; 
		echo "It failed with the following exception:\n";
		
		echo "Exception:", $e->getMessage(), "\n";
		echo "In file:", $e->getFile(), "\n";
		echo "On line:", $e->getLine(), "\n";       
    }