<?php
include_once('db.php');
$db = new db();
$connect = $db->connect();
if ($_GET && $_GET['mahang']) {
    $sql = "SELECT * FROM products WHERE mahang= '" . $_GET['mahang'] . "'";
    $query = $connect->prepare($sql);
    $query->execute();
    $product = array();
    while ($result = $query->fetch(PDO::FETCH_OBJ)) {
        $product = $result;

    
    }
}
if ($_POST && $_POST['tenhang'] && $_POST['loaihang'] && $_POST['gia'] && $_POST['soluong']  && $_POST['mota']  ) {
    $sql = "UPDATE products SET 
    tenhang = '".$_POST['tenhang']."',
    loaihang ='".$_POST['loaihang']."',
    gia = '".$_POST['gia']."',
    soluong ='".$_POST['soluong']."',
    mota = '".$_POST['mota']."'
    WHERE mahang = '".$_POST['mahang']."';";


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
        <form action="edit.php" method="POST">
            <h1 class="text-center">Chỉnh sửa mặt hàng </h1>
            <input name="mahang" type="hidden" value="<?= $product->mahang; ?>">

            <div class="mb-3">
                <label class="form-label">Tên Hàng</label>
                <input type="text" class="form-control" name="tenhang" value="<?= $product->tenhang; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Loại hàng</label>
                <input type="text" class="form-control" name="loaihang" value="<?= $product->loaihang; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="text" class="form-control" name="gia" value="<?= $product->gia; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="text" class="form-control" name="soluong" value="<?= $product->soluong; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <input type="text" class="form-control" name="mota" value="<?= $product->mota; ?>">
            </div>
            <button type="submit" class="btn btn-success">Sửa mặt hàng</button>
            <a href="index.php" class="btn btn-success">Thoát</a>
        </form>

    </div>
</body>

</html>