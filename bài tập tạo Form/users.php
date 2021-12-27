<?php
   session_start();
   $json_users = file_get_contents('user.json');
   if( $json_users){
       $users = json_decode($json_users);
   }else{
       $users = [];
   }
 
   $user = (isset($_SESSION['user'])) ? $_SESSION['user'] :''; 
?>
<?php include 'layouts/header.php' ;?>
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <h3 class="text-center">Users</h3>
               <?php if( $user ): ?>
                  <div class="alert alert-success" role="alert">
                    Hello, <?= $user->username; ?>

                  </div>
                  <?php endif; ?>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-12">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($users as $key => $user): ?>
                     <tr>
                        <th scope="row"><?= $key + 1;?></th>
                        <td><?= $user->username; ?></td>
                        <td><?=$user->email; ?></td>
                        <td><!-- href="edit.php?id=<?php //$user->id ?>" đây là quyết định để có thể lấy đc id của user  -->
                           <a href="edit.php?id=<?= $user->id ?>" class="btn btn-infor">Edit</a>
                           <a href="delete.php?id=<?= $user->id ?>" class="btn btn-danger">Delete</a>
                        </td>
                     </tr>
                <?php endforeach;?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
<?php include 'layouts/footer.php' ;?>
