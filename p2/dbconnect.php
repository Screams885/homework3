<?php
//ประกาศตัวแปลที่เก็บค่าสำหรับการเชื่อมต่อ
$servername = "localhost"; // ประกาศตัวแปรสำหรับเก็บชื่อ host
$username = "root"; //ประกาศชื่อบัญชีในการเข้าระบบ MySQL
$password = ""; //ประกาศตัวแปรสำหรับเก็บรหัส
$dbname = "provtree"; //ประกาศตัวแปรเพื่อเก็บฐานข้อมูล

//คำสั่งที่ใช้ในการเชื่อมต่อฐานข้อมูล
$conn = mysqli_connect($servername,$username,$password,$dbname);

//แสดงผลการเชื่อมต่อ
// if(!$conn){
//     die("เชื่อมต่อไม่ได้".mysqli_connect_error());
// }
// echo "การเชื่อมต่อสำเร็จแล้ว"

?>