<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHD CRUD</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>


  <body>

    <style>
body  {
  background-color: #fadadd;
}
</style>
<?php require_once 'process.php' ?>

<?php

if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?> ">

  <?php

  echo $_SESSION['message'];
  unset($_SESSION['message']);
 ?>
</div>
<?php endif ?>
<div class="container">
<?php
$mysqli = new mysqli('localhost', 'root', "", 'kaninedb') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM customer") or die ($mysqli->error);
//pre_r($result); gives stastics of the table
//pre_r($result->fetch_assoc()); prints first result


 ?>
 <div class="d-flex justify-content-center">
   <table class="table">
     <thead>

     </thead>
     <?php
        while ($row = $result->fetch_assoc()): ?>

      <?php endwhile; ?>
   </table>
</div>
 <?php
 function pre_r( $array ){
     echo '<pre>';
     print_r($array);
     echo '</pre>';
 }
 ?>

<div class="row d-flex justify-content-center">
    <form action="process.php" method="POST">
      <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">

      <div class="form-group">
      <label> Name </label>
      <input type="text" name="first_name" class="form-control" value ="<?php echo $first_name; ?>" placeholder="Enter your name">
    </div>

          <div class="form-group">
      <label>shipping address</label>
        <input type="text" name="shipping_address" class="form-control" value ="<?php echo $shipping_address; ?>" placeholder="Enter your shipping address">
      </div>

      <div class="form-group">
  <label>Email</label>
    <input type="text" name="email" class="form-control" value ="<?php echo $email; ?>" placeholder="Enter your email">
  </div>

  <div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" value ="<?php echo $username; ?>" placeholder="Enter your username">
</div>

              <div class="form-group">
                <?php
                if ($update == true):
                   ?>
                           <button type = "submit" class="btn btn-info" name="update"> Update</button>
                         <?php else: ?>
        <button type = "submit" class="btn btn-dark" name="save"> Save</button>
      <?php endif; ?>
      </div>
    </form>

</div>
</div>
  </body>
</html>
