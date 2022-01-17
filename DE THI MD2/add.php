<?php
include "db.php";
if ($_POST && $_POST['tenhang'] && $_POST['tenhang'] ) {
    $db = new db();
    $connect = $db->connect();
    $sql ="INSERT INTO products (tenhang, loaihang, gia, soluong, ngaytao, mota) VALUES (
        '".$_POST['tenhang']."',
        '".$_POST['loaihang']."',
        '".$_POST['gia']."',
        '".$_POST['soluong']."',
        '".$_POST['ngaytao']."',
        '".$_POST['mota']."')";
        $connect->exec($sql);
        header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <h1 class="text-center">Thêm mặt hàng </h1>
            <div class="mb-3">
                <label class="form-label">Tên hàng</label>
                <input type="text" class="form-control" name="tenhang">
            </div>
            <div class="mb-3">
                <label class="form-label">Loại hàng</label>
                <input type="text" class="form-control" name="loaihang">
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="text" class="form-control" name="gia">
            </div>
            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="text" class="form-control" name="soluong">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input type="text" class="form-control" name="mota">
            </div>
            <button type="submit" class="btn btn-info">Nhập mặt hàng</button>
            <a href="index.php" class="btn btn-info">Thoát</a>
        </form>

    </div>
</body>

</html>