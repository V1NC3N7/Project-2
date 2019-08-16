<?php
include "connectDB.php";

function get_data($db){
  $result = $db->People->find();
  $data = iterator_to_array($result);
  return $data;
}
?>

<html>
  <body>
    <form action="post_process.php" method="post">
      Name: <input type="text" name="name"><br><?php echo $nameErr?><br><br>
      Gender: <input type="radio" name="gender" value="M"> Male <input type="radio" name="gender" value="F"> Female<br><?php echo $gendErr?><br><br>
      Age: <input type="text" name="age"><br><?php echo $ageErr?><br><br>
      <input type="submit" name="submit">
    </form>

        <?php 
        $data = get_data($db); 
        foreach ($data as $people) {
          
          echo 'Name:' . $people['Name'] . '<br><br>';
          echo 'Age:' . $people['Age'] . '<br><br>';
          echo 'Gender:' . $people['Gender'] . '<br><br>';
          echo '<a href= "delete.php?id=' . $people['_id'] . '">Delete</a> . ';
          echo '<a href= "update.php?id=' . $people['_id'] . '">Update</a><hr><br><br>';
          }
          ?>
</html>