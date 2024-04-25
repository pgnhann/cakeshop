<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group select {
            height: 40px;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>Form Đăng ký</h2>
        <form action="submit.php" method="POST">
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="fullname">Họ và tên:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính:</label>
                <input type="radio" id="male" name="gender" value="male" checked>
                <label for="male">Nam</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Nữ</label>
            </div>
            <div class="form-group">
                <label for="birthday">Ngày sinh:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="district">Quận:</label>
                <select id="district" name="district">
                    <option value="">Chọn quận/huyện</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">Thành phố:</label>
                <select id="province" name="province" onchange="loadDistricts()">
                    <option value="">Chọn tỉnh/thành phố</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Đăng ký">
            </div>
        </form>
    </div>
    
    <script>
        fetch('/api/city')
        .then(response => response.json())
        .then(data => {
            const provinceSelect = document.getElementById('province');
            data.LtsItem.forEach(province => {
                const option = document.createElement('option');
                option.value = province.ID;
                option.textContent = province.Title;
                provinceSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));

        function loadDistricts() {
            const provinceId = document.getElementById('province').value;
            const districtSelect = document.getElementById('district');
            districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
            if (provinceId !== '') {
                fetch(`/api/city/${provinceId}/district`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(district => {
                        const option = document.createElement('option');
                        option.value = district.ID;
                        option.textContent = district.Title;
                        districtSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));
            }
        }

    </script>

</body>
</html>
