<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include './connection.php';

$db = new db();                     //khởi tạo đối tượng từ class db ở db.php
$connect = $db->connect();
$sql = "SELECT * FROM product WHERE tenhang LIKE '" .'%'.$_POST['find'].'%'."'";
$query = $connect->prepare($sql);   //chuẩn bị
$query->execute();                  //thực hiện cú pháp
$products = array();               //khởi tạo mảng products
//trả về một số dữ liệu dưới dạng đối tượng
while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($products, $result);    //thêm giá trị $result vào mảng $products
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Danh sách mặt hàng</title>
</head>

<body>
    <div class="col-12 container">
        <div>
        <h1 style="text-align: center;">Danh sách mặt hàng</h1>
        <a href="index.php" class="btn btn-primary">Quay lại</a>
        </div>
<br>


        <table class="table table-border">
        <thead>
                <tr style="background-color: lightgreen">
                    <td>#</td>
                    <td>Tên hàng</td>
                    <td>Loại hàng</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) :
                ?>
                    <tr>
                        <td><?php echo $product->mahang ?></td>
                        <td><?php echo $product->tenhang ?></td>
                        <td><?php echo $product->loaihang ?></td>
                        <td><a href="edit.php?mahang=<?php echo $product->mahang ?>" class="btn btn-primary">Sửa</a></td>
                        <td><a href="delete.php&mahang=<?php echo $product->mahang ?>" class="btn btn-danger" onclick="return confirm('Bạn tự tin với quyết định của mình?');">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>