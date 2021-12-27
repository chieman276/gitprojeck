<?php
$json_users = file_get_contents('user.json');
if ($json_users) {
    $users = json_decode($json_users);
} else {
    $users = [];
}

// echo "<pre>";
// print_r($users);
// echo "</pre>";
$errors = [];
// khai báo biến id để nhận biến id ở $_REQUEST["id"]
$id = (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) ? $_REQUEST["id"] : "";

$users = json_decode($json_users);
// tìm id user để tìm đc user của cái id đó 
$foundId    = "";
foreach ($users as $key => $user) {
    if ($user->id == $id) {
        $foundId = $user;
        break;
    }
}
echo "<pre>";
print_r($foundId);
echo "</pre>";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* 
            Array
         (
             [username] => admin
             [email] => admin@gmail.com
             [password] => 123456
         )
            */
    $username  =  $_REQUEST['username'];
    $email     =  $_REQUEST['email'];
    $password  =  $_REQUEST['password'];

    if ($username == '') {
        $errors['username'] = 'Username is required field !';
    }

    if ($email == '') {
        $errors['email'] = 'Email is required field !';
    }

    if ($password == '') {
        $errors['password'] = 'Password is required field !';
    }

    if (count($errors) == 0) {
     // khai báo $data = mảng $_REQUEST; để $data nhận đc các post và get của mảng $_REQUEST;
        $data = $_REQUEST;
       // xử lý vòng lặp
        foreach($users as $key => $user)
        {
            if($user->id == $id)
            {
                // thay đổi các phần tử trong mảng:$users có id = ở trên url
                $users[$key]->email         = $data["email"];
                $users[$key]->password      = $data["password"];
                $users[$key]->username      = $data["username"];
                break;
            }
        }//push vào json lại:
        $userString = json_encode($users);
        file_put_contents("user.json",$userString);

        //redirect to login page
        //chuyển hướng trang users;
      header("location:users.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" value="<?= $foundId->username ?>" name="username">
        <input type="text" value="<?= $foundId->email ?>" name="email">
        <input type="text" value="<?= $foundId->password ?>" name="password">
<button type="submit" >submit</button>
    </form>
</body>

</html>