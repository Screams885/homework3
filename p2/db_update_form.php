<?php
//แก้ไขข้อมูล

//เชื่อมต่อฐานข้อมูล จาก DB insert from
require 'dbconnect.php';

$sql_fam = "SELECT * FROM fam_data";

$result_fam = mysqli_query($conn,$sql_fam);

$sql_prov = "SELECT * FROM prov_data";

$result_prov = mysqli_query($conn,$sql_prov);


//รับค่าจากฟอร์ม
$tree_id = $_GET['tree_id'];

//กำหนดคำสั่ง MySQL เพื่อเรียกข้อมูลที่มีค่า tree_id ตรงกับผู้ใช้เลือก
$sql= "SELECT * from treedata WHERE tree_id ='$tree_id'";

//สั่งให้คำสั่ง $sql ทำงาน
$result = mysqli_query($conn,$sql);

//ดึงข้อมูล array มาจากตัวแปร $result
$row_update = mysqli_fetch_array($result,MYSQLI_ASSOC);

//กำหนดตัวแปร array รูปแบบการขยายพันธุ์เพื่อนำไปเปรียบเทียบกับรูปแบบที่ถูกบันทึกในฐานข้อมูล
$propagation_arr = array("เพาะเมล็ด","ตอนกิ่ง","ปักชำกิ่ง","แยกหน่อ","ปักชำราก");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แกไขข้อมูลต้นไม้</title>
</head>
<body>

<a href="http://localhost/p2/dbshow.php">HOME</a> 

<h2>แก้ไขข้อมูลต้นไม้</h2>

<!-- เพิ่ม enctype="multipart/form-data" ใน form เพื่อรองรับการนำเข้าไฟล์ภาพ" -->
<form action="db_update.php" method="post" enctype="multipart/form-data">
  <label for="tree_id">รหัสต้นไม้</label><br>
  <input type="text" id="tree_id" name="tree_id" value="<?php echo $row_update['tree_id']?>"><br>
  <label for="c_name">ชื่อสามัญ</label><br>
  <input type="text" id="c_name" name="c_name" value="<?php echo $row_update['c_name']?>"><br>
  <label for="s_name">ชื่อวิทยาศาสตร์</label><br>
  <input type="text" id="s_name" name="s_name" value="<?php echo $row_update['s_name']?>"><br>


  <p><label for="family">เลือกชื่อวงศ์:</label><br> 
  <select name="fam_id" id="family">
    <option value = "" disabled selected > เลือกชื่อวงศ์ </option>
<?php
    while($row=mysqli_fetch_array($result_fam,MYSQLI_NUM)){
      if ($row[0]==$row_update['fam_id']){
      echo "<option value='$row[0]'selected >$row[1]</option>";
      } else {
      echo "<option value='$row[0]'>$row[1]</option>";
      }
    }
 ?> 
  </select>

  

<p>เลือกชนิดใบ : <br>
<input type="radio" id="single" name="leaf_type" value="ใบเดี่ยว"<?php if($row_update['leaf_type'] == 'ใบเดี่ยว') echo 'checked'?>>
<label for="single">ใบเดี่ยว</label><br>
<input type="radio" id="compound" name="leaf_type" value="ใบประกอบ" <?php if($row_update['leaf_type'] == 'ใบประกอบ') echo 'checked'?>>
<label for="compound">ใบประกอบ</label><br>

<!-- การดึงข้อมูลจากตารางข้อมูลมาแสดงใน Checkbox -->
การขยายพันธุ์:<br>
  <?php
  //รับค่ารูปแบบการขยายพันธุ์จาก treedata มาไว้กับตัวแปรอาเรย์ propagation_ex
  $propagation_ex=explode(",",$row_update["propagation"]);
  //จับคู่เพื่อเลือก checkbox ที่ตรงกันกับข้อมูลใน treedata
  foreach($propagation_arr as $value){
      if(in_array($value,$propagation_ex)){
          echo "<input type='checkbox' name='propagation[]' value='$value' checked> $value";
      }else{
          echo "<input type='checkbox' name='propagation[]' value='$value'> $value";                    
      }
  }
  ?>

  <p><label for="ct">ลักษณะทั่วไป</label><br>
  <input type="text" id="ct" name="ct" value="<?php echo $row_update['ct']?>"><br>

  <p><label for="province">เลือกชื่อจังหวัด:</label><br>
  <select name="prov_id" id="province">
  <option value = "" disabled selected > เลือกจังหวัด </option>
  <?php
   while($row=mysqli_fetch_array($result_prov,MYSQLI_NUM)){
    if ($row[0]==$row_update['prov_id']){
      echo "<option value='$row[0]'selected >$row[1]</option>";
      } else {
      echo "<option value='$row[0]'>$row[1]</option>";
      }
    }
    ?>
    </select>
    <p>
      <img src="images/<?php echo $row_update['photo']; ?>" width ="100px"><br>                    
      รูปพันธุ์ไม้:<br>
      <input type="file" name="tree_image">
      <p>
      <!--ส่งรหัสต้นไม้และชื่อต้นไม้เดิมไปกับฟอร์ม กรณีที่ไม่มีการเปลี่ยนรูปจะใช้ไฟล์รูปเดิม -->
      <input type="hidden" name="tree_id" value="<?php echo $row_update['tree_id']; ?>">
      <input type="hidden" name="tree_image_old" value="<?php echo $row_update['photo']; ?>">

  <p><input type="submit" value="ปรับปรุงข้อมูล">

</form>
</body>
</html>