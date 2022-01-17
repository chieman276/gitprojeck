<?php
include "db.php";
$db = new db();
$connect = $db->connect();
$sql = "SELECT * FROM products";
$query = $connect->prepare($sql);
$query->execute();
$products = array();

while ($result = $query->fetch(mode:PDO::FETCH_OBJ)) {
  array_push($products, $result);
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
  <table class="table">
  <thead>
    <h1 class="text-center"> Danh sách mặt hàng </h1>
    <form method="post" action="">
        Nhập tên hàng:<input type="text" name="search">
    <button type="submit" class="btn btn-info" href="search.php">Tìm kiếm</button>    
    </form>


    <a class="btn btn-info" style="float: right" href="add.php">Thêm mặt hàng</a>

    <tr>
      <th scope="col" class="success">#</th>
      <th scope="col">Tên hàng</th>
      <th scope="col">Loại hàng</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $key => $product): ?>
    <tr>
      <th scope="row"><?= $key+1; ?></th>
      <td><?= $product->tenhang ?></td>
      <td><?=$product->loaihang ?></td>

      <td>
        <a class="btn btn-info" href="delete.php?mahang=<?= $product->mahang ?>"  onclick="return confirm ('Bạn có chắc muốn xóa không')"  > Xóa </a>
        <a class="btn btn-info" href="edit.php?mahang=<?= $product->mahang ?>">Chỉnh Sửa </a>

       </td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>

  </div>


    
</body>
</html>