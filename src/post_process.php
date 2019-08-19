<?php
include "connectDB.php";
if($_POST['action']=="create"){
    $db->People->insertOne(array(
        'Name'=> $_POST['name'],
        'Age' => $_POST['age'],
        'Gender'=> $_POST['gender']
    ));
}elseif($_POST['action']=="edit"){
    $db->People->updateOne(['_id' => new \MongoDB\BSON\ObjectID($_POST['id'])],
    ['$set' => ['Name' => $_POST['name'], 'Age' => $_POST['age'], 'Gender' => $_POST['gender'],]]
);
}


    header("location: index.php");