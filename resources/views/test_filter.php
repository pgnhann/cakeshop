<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test filter</h1>
    <h2>Chọn filter vài cái i </h2>
    <form action="/api/get_pdf_file" method="GET">
    <label >Chọn nơi bạn muốn xem báo cáo :</label>
    <select name="Recipient_District" id="Recipient_District">
        <option value="Thủ Đức">Thủ Đức</option>
        <option value="Quận 2">Quận 2</option>
        
    </select>
    <br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>