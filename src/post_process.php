<?php
include "connectDB.php";

$db->People->insertOne(array(
    'Name'=> $_POST['name'],
    'Age' => $_POST['age'],
    'Gender'=> $_POST['gender']
    
));

    header("location: index.php");