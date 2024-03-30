<?php

require 'dbconnect.php';

$fam_id =$_GET['fam_id'];

$sql = "SELECT * from fam_data WHERE fam_id = '$fam_id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แทรกข้อมูลต้นไม้</title>
</head>
<body>
<h2>แทรกข้อมูลต้นไม้</h2>
<form action=fam_update.php method="post">
  <label for="fam_id">รหัสวงศ์</label><br>
  <input type="text" id="fam_id" name="fam_id" value="<?php echo $row['fam_id']?>"><br>
  <label for="fam_name">ชื่อวงศ์</label><br>
  <input type="text" id="fam_name" name="fam_name" value="<?php echo $row['fam_name']?>"><br>
  <p><input type="submit" value="แทรกข้อมูล">
</form>
</body>
</html>