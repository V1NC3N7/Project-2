<?php //echo phpversion("mongodb");

require 'vendor/autoload.php';
try {

        $client = new MongoDB\Client;
        $companydb = $client->companydb;

        $result1 = $companydb->createCollection('mycollection');

        var_dump($result1);

	} catch (MongoDB\Driver\Exception\Exception $e) {

		$filename = basename(__FILE__);
		
		echo "The $filename script has experienced an error.\n"; 
		echo "It failed with the following exception:\n";
		
		echo "Exception:", $e->getMessage(), "\n";
		echo "In file:", $e->getFile(), "\n";
		echo "On line:", $e->getLine(), "\n";       
    }
?>