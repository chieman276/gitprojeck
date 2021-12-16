<?php
//kiểm tra xem đã submit form hay chua?
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //kiểm trả xem đã hiển thị form hay chưa/
    // echo "<Pre>";
    // print_r($_POST);
    // echo "</pre>";
    $number = $_POST['number'];
    if ($number <=100){
        echo $number;
    }else{
        echo "Không hợp lệ!!";
    }

}
?>
<form action="" method="POST">
    Nhập số<input type="text" name="number" placeholder="Nhập số từ 0 đến 100"><br><br>
    <input type="submit" name="submit" value="submit"> 
</form>


