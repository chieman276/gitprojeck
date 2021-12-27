<?php
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
// khai báo biến id để nhận biến id ở $_REQUEST["id"]

$id = (isset($_REQUEST["id"]) && !empty($_REQUEST["id"])) ? $_REQUEST["id"] : "";

$json_users = file_get_contents('user.json');
if ($json_users) {
    $users = json_decode($json_users);
} else {
    $users = [];
}

foreach($users as $key => $user)
        {
            if($user->id == $id)
            {
                unset($users[$key]);
                break;
            }
        }
        echo "<pre>";
        print_r($users);
        echo "</pre>";
        $users = array_values($users);
        $userString = json_encode($users);
        file_put_contents("user.json",$userString);
      header("location:users.php");
