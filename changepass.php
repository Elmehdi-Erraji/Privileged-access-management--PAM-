<?php
include 'inc/header.php';
Session::CheckSession();
?>
<?php

if (isset($_GET['id'])) {
  $userid = (int)$_GET['id'];
}


if (isset($_POST['changepass'])) {
  $password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password != $confirm_password) {
    $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong>New Password do not match confirm password !</div>';
    echo $msg;
  }
  exit();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changepass'])) {
  $changePass = $users->changePasswordBysingelUserId($userid, $_POST);
}



if (isset($changePass)) {
  echo  $changePass;
}
?>


<div class="card ">
  <div class="card-header">
    <h3>Change your password <span class="float-right"> <a href="profile.php?id=<?php  ?>" class="btn btn-primary">Back</a> </h3>
  </div>
  <div class="card-body">



    <div style="width:600px; margin:0px auto">

      <form class="" action="" method="POST">
        <div class="form-group">
          <label for="old_password">Old Password</label>
          <input type="password" name="old_password" class="form-control">
        </div>
        <div class="form-group">
          <label for="new_password">New Password</label>
          <input type="password" name="new_password" class="form-control">
        </div>
        <div class="form-group">
          <label for="new_password">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control">
        </div>


        <div class="form-group">
          <button type="submit" name="changepass" class="btn btn-success">Change password</button>
        </div>


      </form>
    </div>


  </div>
</div>


<?php
include 'inc/footer.php';

?>