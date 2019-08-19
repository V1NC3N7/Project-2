<?php
include "connectDB.php";
$loader=new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);

function get_data($db){
  $result = $db->People->find();
  $data = iterator_to_array($result);
  return $data;
}
$list = get_data($db); 

foreach ($list as $people) {
  $listing[]= $people;
  }
echo $twig -> render('index.html', array('queryData'=> $listing));
?>