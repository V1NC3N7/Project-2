<?php
include "connectDB.php";
$loader=new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

$info = $db->People->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

$name  = $info ->Name;
$age = $info ->Age;
$gender = $info ->Gender;
$id =$_GET['id'];

function get_data($db){
  $filter = array();
  $options = array(
    "sort" => array("_id" => -1),
  );
  $result = $db->People->find($filter, $options);
  $data = iterator_to_array($result);
  return $data;
}
$list = get_data($db); 

foreach ($list as $people) {
  $listing[]= $people;
  }
echo $twig -> render('index.html', array('queryData'=> $listing,
'id' => $id,
'name'=> $name,
'age'=> $age,
'gender'=> $gender
));