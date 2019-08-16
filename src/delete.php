<?php
include "connectDB.php";
$id = $_GET['id'];

$db->People->deleteOne(['_id'=> new MongoDB\BSON\ObjectID($_GET['id'])]);

header("Location: index.php");