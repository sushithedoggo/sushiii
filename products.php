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
  $result = $mysqli->query("SELECT * FROM product") or die ($mysqli->error);
  //pre_r($result); gives stastics of the table
  //pre_r($result->fetch_assoc()); prints first result


   ?>
   <div class="d-flex justify-content-center">
     <table class="table">
       <thead>
         <tr>
           <th>Product name</th>
           <th>Weight</th>
           <th>Quantity</th>
           <th>Type</th>
           <th>Price</th>
         </tr>
       </thead>
       <?php
          while ($row = $result->fetch_assoc()): ?>
          <tr>
                                  <form method="post" action="products.php?action=add&id=<?php echo $row["product_id"]; ?>">
              <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['weight']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                          <td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['price']; ?></td>



          </tr>
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
 </div>





</body>
</html>
