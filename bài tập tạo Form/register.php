<?php
class User {
   public $username;
   public $email;
   public $password;

   // public function save() {

   // }
}
$errors = [];
$show_alert = (isset ($_REQUEST['show_alert'])) ? $_REQUEST['show_alert'] : 0;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
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

  if( $username == ''){
     $errors['username'] = 'Username is required field !';
  }

  if( $email == ''){
     $errors['email'] = 'Email is required field !';
  }

  if( $password == ''){
     $errors['password'] = 'Password is required field !';
  }

  if(count($errors) == 0 ){
     $objUser = new User($username,$password,$email,3);

     $objUser->username = $username;
     $objUser->id = time();
     $objUser->email = $email;
     $objUser->password = $password;

   $json_users = file_get_contents('user.json');
   if( $json_users){
      $users = json_decode($json_users);
   }else{
      $users = [];
   }
   //push to users array
   $users[] = $objUser;
   //convert to json string 
   $users = json_encode($users);
   file_put_contents( 'user.json', $users);

   //redirect to login page
   header("Location: register.php?show_alert=1");

  }

}
?>
<?php include 'layouts/header.php' ;?>
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h3 class="text-center">Register</h3>
               <?php if( $show_alert): ?>
                  <div class="alert alert-success" role="alert">
                     Đăng ký thành công, Vui lòng nhấn vào <a href="login.php"> đây</a>
                     để tới trang đăng nhập
                </div>
                <?php endif; ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <form action="" method="POST">
                  <div class="form-group">
                     <label >Username</label>
                     <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Username" name="username">
                     <small  class="form-text text-danger" >
                        <?php echo (isset( $errors['username'])) ? $errors['username'] :""; ?>
                     </small>
                  </div>
                  <div class="form-group">
                     <label >Email</label>
                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
                     <small  class="form-text text-danger">
                     <?php echo (isset( $errors['email'])) ? $errors['email'] :""; ?>
                     </small>
                  </div>
                  <div class="form-group">
                     <label >Password</label>
                     <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" name="password" >
                     <small  class="form-text text-danger">
                     <?php echo (isset( $errors['password'])) ? $errors['password'] :""; ?>
                     </small>
                  </div>
                
                  <button type="submit" class="btn btn-primary">Register</button>
               </form>
            </div>
         </div>
      </div>
<?php include 'layouts/footer.php' ;?>
