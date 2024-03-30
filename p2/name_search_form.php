<html>
    <head>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>แบบสืบค้นชื่อต้นไม้</title>
    </head>
    <body>
    <div class="w3-container">
        <div class="w3-card-4">
            <div class="w3-container w3-green">           
                <h2>แบบสืบค้นชื่อต้นไม้t</h2>
            </div>
            <div class="w3-container">
                <h4>กรอกชื่อต้นไม้ที่ต้องการสืบค้น</h4>
            </div>
            <form class="w3-container"  action="name_search_result.php" method = "post">
                <label for="c_name">ชื่อต้นไม้:</label>
                <input class="w3-input w3-border" type="text" id="c_name" name="c_name">
                <p></p>
                <input type="submit" value="สืบค้น">
                <p></p>
            </form>
    </body>
</html>