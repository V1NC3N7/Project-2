<?php

include "connectDB.php";
$conn = new MongoDB\Client("mongodb://172.17.0.4:27017");
$result = $db->People->find(array(),array('projection' => array('_id'=> false)));

$data= iterator_to_array($result);


?>

<html>
  <body>
    <form action="post_process.php" method="post">
      Name: <input type="text" name="name"><br><?php echo $nameErr?><br><br>
      Gender: <input type="radio" name="gender" value="M"> Male <input type="radio" name="gender" value="F"> Female<br><?php echo $gendErr?><br><br>
      Age: <input type="text" name="age"><br><?php echo $ageErr?><br><br>
      <input type="submit" name="submit">
    </form>

    <table>
      <thead>
        <tr>
          <?php foreach ($data[0] as $key => $value):?>
          <th>
            <?php echo $key; ?>
          </th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $entry) :?>
        <tr>
          <?php foreach($entry as $key=>$value):?>
          <td>
            <?php echo $value;?>
          </td>
          <?php endforeach;?>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </body>
</html>