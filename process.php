<?php
session_start();

$mysqli = new mysqli ("localhost", "root", "", "kaninedb") or die(mysqli_error($mysqli));
$update = false;
$first_name='';
$shipping_address='';
$product_id='';
$customer_id = 0;
$email='';
$username='';
if(isset($_POST['save'])){
  $first_name = $_POST['first_name'];
  $shipping_address = $_POST['shipping_address'];
  $email = $_POST['email'];
    $username = $_POST['username'];
  $mysqli->query("INSERT INTO customer (first_name, shipping_address, email, username) VALUES ('$first_name', '$shipping_address', '$email', '$username')") or die($mysqli->error);
  $_SESSION['message'] = "You signed up successfully!";
  $_SESSION['msg_type'] = "primary";

  header("location: index.php");
}
if(isset($_GET['delete'])){
  $customer_id = $_GET['delete'];
  $mysqli->query("DELETE from customer WHERE customer_id=$customer_id") or die($mysqli->error());

  $_SESSION['message'] = "Record has been deleted!";
  $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

if(isset($_GET['edit'])){
  $customer_id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM customer WHERE customer_id=$customer_id") or die($mysqli->error());

  if(count($result)==1){
    $row = $result->fetch_array();
    $first_name = $row['first_name'];
    $shipping_address = $row['shipping_address'];
    $email = $row['email'];
    $username = $row['username'];
  }
}
if (isset($_POST['update'])){
  $customer_id = $_POST['customer_id'];
  $first_name = $_POST ['first_name'];
  $shipping_address = $_POST['shipping_address'];
  $email = $_POST['email'];
  $username = $_POST['username'];

  $mysqli->query("UPDATE customer SET first_name = '$first_name', shipping_address = '$shipping_address', email = '$email', username = '$username' WHERE customer_id=$customer_id") or die($mysqli->error);

  $_SESSION['message'] = "Record has been updated!";
  $_SESSION['msg_type'] = "warning";

  header('location: index.php');
}
