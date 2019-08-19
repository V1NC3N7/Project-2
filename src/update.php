<?php
include "connectDB.php";

    $info = $db->People->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    $name  = $info ->Name;
    $age = $info ->Age;
    $gender = $info ->Gender;
    $id =$_GET['id'];
?>

<html>
  <body>
    <form action="post_process.php" method="post">
      <input type="hidden" name="id" value=<?php echo $id?>>
      Name: <input type="text" name="name" value=<?php echo $name ?>><br><?php echo $nameErr?><br><br>
      Gender: 
      <?php if ($gender == "M"){
        echo '<input type="radio" name="gender" value="M" checked> Male <input type="radio" name="gender" value="F"> Female<br><?php echo $gendErr?><br><br>';
      } elseif ($gender == "F"){
        echo '<input type="radio" name="gender" value="M"> Male <input type="radio" name="gender" value="F" checked> Female<br><?php echo $gendErr?><br><br>';
      }?>
      Age: <input type="text" name="age" value=<?php echo $age ?>><br><?php echo $ageErr?><br><br>
      <input type="hidden" name="action" value="edit">
      <input type="submit" name="submit">
    </form>

        <?php 
        function get_data($db){
            $result = $db->People->find();
            $data = iterator_to_array($result);
            return $data;
          }
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