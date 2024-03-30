<?php
require 'dbconnect.php';

//----------------------family---------------------//
$sql_fam = "SELECT * FROM fam_data";

$result_fam = mysqli_query($conn,$sql_fam);

//----------------------province-------------------//
$sql_prov = "SELECT * FROM prov_data";

$result_prov = mysqli_query($conn,$sql_prov);

//-------------------------------------------------//

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แทรกข้อมูลต้นไม้</title>
</head>
<body>

<a href="http://localhost/p2/dbshow.php" >HOME</a> 

  <h2>แทรกข้อมูลต้นไม้</h2>
  <!-- เพิ่ม enctype="multipart/form-data" ใน form เพื่อรองรับการนำเข้าไฟล์ภาพ" --> 
  <form action="db_insert.php" method="post" enctype="multipart/form-data">
      <label for="c_name">ชื่อสามัญ</label><br>
      <input type="text" id="c_name" name="c_name"><br>
      <label for="s_name">ชื่อวิทยาศาสตร์</label><br>
      <input type="text" id="s_name" name="s_name"><br>
      <p><label for="family">เลือกชื่อวงศ์:</label><br> 
      <select name="fam_id" id="family">
      
    
<?php

    while($row=mysqli_fetch_array($result_fam,MYSQLI_NUM)){
      echo "<option value='$row[0]'>$row[1]</option>";
    }

 ?> 
  </select>

  <p>เลือกชนิดใบ : <br>
  <input type="radio" id="single" name="leaf_type" value="ใบเดี่ยว">
<label for="single">ใบเดี่ยว</label><br>
<input type="radio" id="compound" name="leaf_type" value="ใบประกอบ">
<label for="compound">ใบประกอบ</label><br>


  <p><label for="ct">ลักษณะทั่วไป:</label><br>
  <input type="text" id="ct" name="ct"><br>


  <!-- การเพิ่มการขยายพันธุ์ด้วย Checkbox -->
  <p>การขยายพันธุ์:<br>
            <input type="checkbox" id="prop1" name="propagation[]" value="เพาะเมล็ด">
            <label for="prop1">เพาะเมล็ด</label>
            <input type="checkbox" id="prop2" name="propagation[]" value="ตอนกิ่ง">
            <label for="prop2">ตอนกิ่ง</label>
            <input type="checkbox" id="prop3" name="propagation[]" value="ปักชำกิ่ง">
            <label for="prop3">ปักชำกิ่ง</label>
            <input type="checkbox" id="prop4" name="propagation[]" value="แยกหน่อ">
            <label for="prop4">แยกหน่อ</label>
            <input type="checkbox" id="prop5" name="propagation[]" value="ปักชำราก">
            <label for="prop5">ปักชำราก</label><br><br>


  <p><label for="province">เลือกชื่อจังหวัด:</label><br>
  <select name="prov_id" id="province">
  <option value = "" disabled selected > เลือกจังหวัด </option>
  
  <?php

   while($row=mysqli_fetch_array($result_prov,MYSQLI_NUM)){
      echo "<option value='$row[0]'>$row[1]</option>";
    }
    ?>
    </select>

    <p>
      <!--สร้าง input type file เพื่อรับรูปภาพ-->
      รูปภาพต้นไม้:<br>
        <input type="file" name="tree_image">
    <p>

    <p><input type="submit" value="แทรกข้อมูล">

       
    </form>
  </body>
</html>