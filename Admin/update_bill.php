<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
.form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.title {
    color: #A13C1E;
    margin-bottom: 30px;
}

.form-control {
    margin-bottom: 15px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #00EE00;
    color: black;
    border-radius: 5px;
    align-items: center; 
}

button:hover {
    background-color: #4c1d0f;
}

select.form-control {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    width: 100%;
}
</style>

<body>
    <div class="content">
        <div class="container mt-5">
            <div class="form-container">
                <h2 class="text-center title">Cập nhật đơn hàng</h2>
                <form action="../controller/c_update_bill.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id" class="form-label">Mã đơn hàng</label>
                        <input type="number" id="id" name="id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="CustomerID" class="form-label">Mã khách hàng </label>
                        <input type="number" id="CustomerID" name="CustomerID" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="Total" class="form-label">Tổng tiền </label>
                        <input type="number" id="Total" name="Total" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="ShipAdd" class="form-label">Địa chỉ giao hàng</label>
                        <input type="text" id="ShipAdd" name="ShipAdd" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select id="status" name="status" class="form-control">
                            <option value="Pending">Pending (Chờ xử lý)</option>
                            <option value="Processing">Processing (Đang xử lý)</option>
                            <option value="Shipped">Shipped (Đã giao cho đơn vị vận chuyển)</option>
                            <option value="Delivered">Delivered (Đã giao hàng)</option>
                            <option value="Cancelled">Cancelled (Đã hủy)</option>
                            <option value="Refunded">Refunded (Đã hoàn tiền)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


