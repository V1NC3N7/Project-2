<?php //echo phpinfo();

require 'vendor/autoload.php';
try {

        $conn = new MongoDB\Driver\Manager;
        echo "Connection to database successfully" . "<br>";
        $db = $conn->Guestbook;
        echo "Database examplesdb selected" . "<br>";
        $collection = $db->createCollection("msg");
        echo "Collection created succsessfully" . "<br>";
        
	} catch (MongoDB\Driver\Exception\Exception $e) {

		$filename = basename(__FILE__);
		
		echo "The $filename script has experienced an error.\n"; 
		echo "It failed with the following exception:\n";
		
		echo "Exception:", $e->getMessage(), "\n";
		echo "In file:", $e->getFile(), "\n";
		echo "On line:", $e->getLine(), "\n";       
    }

    $result1 = $collection->insert([
        'u_name'=>'Vince',
        'email'=>'vince@test.com',
        'comment'=>'Hey World!',
        'reply'=>'T',
        'visibility'=>'T',
    ]);


    printf("Inserted %d document(s)\n", $result1->getInsertedCount());

    var_dump($result1->getInsertedId());