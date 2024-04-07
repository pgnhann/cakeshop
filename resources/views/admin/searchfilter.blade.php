<!-- Form tìm kiếm sản phẩm -->
<form method="GET" action="">
    <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm">
    <button type="submit">Tìm kiếm</button>
</form>

<!-- Form lọc sản phẩm theo giá -->
<form method="GET" action="">
    <label>Giá từ:</label>
    <input type="text" name="min_price">
    <label>đến:</label>
    <input type="text" name="max_price">
    <button type="submit">Lọc</button>
</form>