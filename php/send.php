<?php
 require_once 'connect.php';
 $name = $_POST['name'];
 $phone= $_POST['phone'];
 $address= $_POST['address'];
 $price= $_POST['price'];
 $dishlist= $_POST['dishlist'];

 $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
 $query ="SELECT `id` FROM `orders` WHERE 1";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
  $id = mysqli_num_rows($result)+1;
 $query ="INSERT INTO `orders`(`id`, `Client`, `Phone number`, `Address`, `FinalSum`, `Dishes`) VALUES ($id ,'$name','$phone','$address',$price,'$dishlist')";
 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
?>
 